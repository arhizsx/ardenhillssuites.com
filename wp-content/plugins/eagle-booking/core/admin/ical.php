<?php
/* --------------------------------------------------------------------------
 * @ EB Admin
 * @ Sync Calendars [Admin]
 * @ Since  1.3.6
 * @ Author: Eagle Themes
 * @ Developer: Jomin Muskaj
---------------------------------------------------------------------------*/

// Exit if accessed directly
defined('ABSPATH') || exit;

class EB_ADMIN_SYNC_CALENDARS {

    public function __construct() {

        // Actions
        // add_action( 'admin_menu', array( $this, 'add_admin_sub_page' ) ); // hide for now
        // add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
        // add_action( 'wp_ajax_admin_create_entry', array( $this, 'create') );
        // add_action( 'wp_ajax_admin_update_entry', array( $this, 'update') );
        // add_action( 'wp_ajax_admin_delete_entry', array( $this, 'delete') );

        add_action( 'init', array( $this, 'add_calendar_feed') );
        // add_action( 'init', array( $this, 'export_ics') );

    }

   /**
   * Create the submenu
   */
    public function add_admin_sub_page(){
        add_submenu_page(
            'eb_bookings',
            __('Sync Calendars', 'eagle-booking'),
            __('Sync Calendars', 'eagle-booking'),
            'edit_pages',
            'eb_sync_calendars',
            array( $this, 'render' )
        );
    }

    /**
     * Enqueue the required scripts
     */
     public function enqueue_scripts() {

        wp_enqueue_script( 'eb-admin-taxes-fees', EB_URL .'assets/js/admin/taxesfees.js', array( 'jquery' ), EB_VERSION, true );

        wp_localize_script( 'eb-admin-taxes-fees', 'taxes_fees', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('nonce')
        ));
    }

    /**
     * Create 'eb_calendar' feed
     */
    public function add_calendar_feed(){

        add_feed('eb_calendar', array( $this, 'export_ics') );

    }

    /**
     * Create .ics
     * Select only bookings that end date is after today
     */
    public function export_ics(){

        // DB QUERY
        global $wpdb;

        // Query the rooms first
        $rooms = new WP_Query(array(
            'p' => $_REQUEST['room_id'],
            'post_type' => 'eagle_rooms',
        ));

        // Loop All Rooms
        if ( $rooms->have_posts() ) while ( $rooms->have_posts() ) : $rooms->the_post();

            $room_id = get_the_ID();

            $eb_room_bookings = $wpdb->get_results( $wpdb->prepare ( "SELECT * FROM ".EAGLE_BOOKING_TABLE." WHERE id_post = $room_id " ) );


// Lets start the for loop // Loop all bookings of the room [id]
if ( $eb_room_bookings ) :

// Collect output
// ob_start();


?>


BEGIN:VCALENDAR
VERSION:2.0
PRODID:-//bobbin v0.1//NONSGML iCal Writer//EN
CALSCALE:GREGORIAN
METHOD:PUBLISH

<?php foreach ( $eb_room_bookings as $eb_room_booking ) :

    $booking_id = $eb_room_booking->id_post;

    $room_id = get_the_title($booking_id);

    // $created_date = date_i18n('Ymd\THis\Z',time(), true);


    $start_date = DateTime::createFromFormat("m/d/Y", $eb_room_booking->date_from)->format('Ymd\THis');
    $end_date = DateTime::createFromFormat("m/d/Y", $eb_room_booking->date_to)->format('Ymd\THis');

    $deadline = date_i18n('Ymd\THis\Z',time() - 24, true);  // EDIT THIS WITH YOUR OWN VALUE

    $uid = get_the_ID();

    $created_date = wp_date('Ymd\THis\Z', true, $uid );

    $organiser = get_bloginfo('name');
    $address = '';
    $url = get_the_permalink();
    $summary = get_the_excerpt();
    $content = html_entity_decode(trim(preg_replace('/\s\s+/', ' ', get_the_content())));

    // $title = get_the_title();
    $title = strtolower( str_replace(' ', '_', $room_id) );

    // Give the iCal export a filename
    $filename = urlencode( $title.'.ics' );



    $eol = "\r\n";


// Set the correct headers for this file
header("Content-Description: File Transfer");
header("Content-Disposition: attachment; filename=".$filename);
header('Content-type: text/calendar; charset=utf-8');
header("Pragma: 0");
header("Expires: 0");
?>
BEGIN:VEVENT
DTSTART:<?php echo $start_date.$eol;?>
DTEND:<?php echo $end_date.$eol;?>
DTSTAMP:<?php echo $created_date.$eol; ?>
UID:<?php echo $eb_room_booking->id.$eol;?>
CREATED:<?php echo $created_date.$eol;?>
DESCRIPTION:<?php echo $content.$eol; ?>
SEQUENCE:0
STATUS:CONFIRMED
SUMMARY:<?php echo $title.$eol; ?>
TRANSP:OPAQUE
END:VEVENT
<?php endforeach;  ?>
END:VCALENDAR
<?php

// ob_end_clean();

endif;



endwhile;




$eventsical = ob_get_contents();



echo $eventsical;
// exit();

}

  /**
  * On Load Retrive Rooms
  */
  public function entries() {

    // echo '<pre>'; print_r($entries); echo '</pre>';

    $html = '';

    $args = array(
        'post_type' => 'eagle_rooms',
        'posts_per_page' => -1
    );

    $the_query = new WP_Query( $args );

    while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

        <?php
            // Defaults
            $eb_room_title = get_the_title();
            $eb_room_id = get_the_ID();
            $eb_room_url = get_edit_post_link( $eb_room_id );
            $eb_room_qnt = get_post_meta( $eb_room_id, 'eagle_booking_mtb_room_quantity', true );

            $feed_url = get_feed_link('eb_calendar').'?room_id='.$eb_room_id;



            $html .= "<tr class='eb-entry-line' data-entry-id='$eb_room_id' data-cat='$eb_room_id'>";
            $html .= "<td class=''>$eb_room_title</td>";
            $html .= "<td class=''><code><a href=".$feed_url." target='_blank'>".$feed_url."</a></code></td>";
            $html .= "<td class='eb-entry-global'>Not Available Yet</td>";

            $html .= "<td class='eb-action-buttons'>";
            $html .= "<span class='eb-delete-action eb-delete-entry' data-entry-id='$eb_room_id' data-cat='$eb_room_id'><i class='fas fa-sync'></i></span>";
            $html .= "<span class='eb-edit-action eb-edit-entry' data-entry-id='$eb_room_id' data-cat='$eb_room_id'><i class='far fa-edit'></i></span>";
            $html .= "</td>";
            $html .= "</tr>";




    endwhile;

    return $html;

  }



   /**
   * Render Output
   */
    public function render() {

        ?>

        <div class="eb-admin eb-wrapper">
            <div class="eb-admin-dashboard">

                <?php

                /**
                 * Include the EB admin header
                 *
                 * @since 1.3.2
                 */
                include EB_PATH.''."core/admin/bookings/elements/admin-header.php";

                ?>

                <div class="eb-admin-title">
                    <h1 class="wp-heading-inline"><?php echo __('Sync Calendars', 'eagle-booking') ?></h1>
                </div>

                <div class="eb-admin-dashboard-inner">

                    <form method="POST" action="">

                        <!-- Taxes -->
                        <div class="eb-admin-list-group eb-admin-taxes-fees" data-cat="eb_taxes">

                            <table class="widefat striped">

                                <thead>
                                    <tr>
                                        <th class="row-title" width="20%"><?php echo __('Room Title', 'eagle-booking') ?></th>
                                        <th class="row-title" width="35%"><span data-eb-tooltip="Import the Export URL to external booking provider like Booking.com and Airbnb"><?php echo __('Export URL', 'eagle-booking') ?></span></th>
                                        <th class="row-title" width="35%"><span data-eb-tooltip="Choose if you want to apply this taX globally on all rooms or if you want to assign it under each room's price tab"><?php echo __('Import URL', 'eagle-booking') ?></span></th>
                                        <th class="row-title" width="10%"><?php echo __('Actions', 'eagle-booking') ?></th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php

                                    /**
                                     * Print Existing Entries
                                    */
                                    echo $this->entries();

                                    ?>

                                    <tr class="eb-new-eb_taxes-line " style="display: none;">
                                        <td>
                                            <input id="eb_entry_title" class="" type="text" placeholder="<?php echo __('Title', 'eagle-booking') ?>">
                                            <input id="eb_entry_cat" value="eb_taxes" type="hidden">
                                        </td>
                                        <td>
                                            <input type="text" id="eb_entry_amount" laceholder="<?php echo __('Amount', 'eagle-booking') ?>">
                                        </td>
                                        <td>
                                            <label class="switch">
                                                <input type="checkbox" id="eb_entry_global">
                                                <span class="slider round"></span>
                                            </label>
                                        </td>
                                        <td>
                                            <label class="switch">
                                                <input type="checkbox" id="eb_entry_services">
                                                <span class="slider round"></span>
                                            </label>
                                        </td>
                                        <!-- <td>
                                            <label class="switch">
                                                <input type="checkbox" id="eb_entry_fees">
                                                <span class="slider round"></span>
                                            </label>
                                        </td> -->
                                        <td class="eb-action-buttons">
                                            <span class='eb-edit-action eb-create-entry'><i class='fas fa-check'></i></span>
                                            <span class='eb-delete-action eb-cancel-entry' data-booking-id='2'><i class='fas fa-times'></i></span>
                                        </td>
                                    </tr>

                                </tbody>

                            </table>

                        </div>


                    </form>

                </div>

            </div>

        </div>
    <?php

    }

}

new EB_ADMIN_SYNC_CALENDARS();
