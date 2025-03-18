<?php $menuitems = wp_nav_menu(array ('menu' => 'himara_main_menu', 'echo' => FALSE, 'fallback_cb' => '__return_false')); ?>
<?php
    $theme_location = 'himara_main_menu';
    $locations = get_nav_menu_locations();
    $menu_id = '';
    if ( isset ( $locations[$theme_location] ) ) {
        $menu_id = $locations[$theme_location];
    }
?>

<?php if ( current_user_can( 'manage_options' ) && has_nav_menu( 'himara_main_menu' ) &&  empty ( $menuitems ) ) : ?>
<ul class="navbar-nav">
    <li class="himara-no-menu">
        <a href="<?php echo esc_url( admin_url( 'nav-menus.php?action=edit&menu='. $menu_id .'' )); ?>">
            <?php echo esc_html__( 'Click here to add items to main navigation [Visible only to Admins]', 'himara' ); ?>
        </a>
    </li>
</ul>
<?php endif; ?>

<?php if ( has_nav_menu( 'himara_main_menu' ) ) : ?>
<?php wp_nav_menu( array( 'theme_location' => 'himara_main_menu', 'depth' => 3, 'container' => false, 'menu_class' => 'menu', 'walker' => new wp_bootstrap_navwalker()));?>

<?php else: ?>

<?php if ( current_user_can( 'manage_options' ) ): ?>
<ul class="navbar-nav">
    <li class="himara-no-menu">
        <a href="<?php echo esc_url( admin_url( 'nav-menus.php' )); ?>">
            <?php echo esc_html__( 'Click here to add main navigation [Visible only to Admins]', 'himara' ); ?>
        </a>
    </li>
</ul>

<?php endif; ?>
<?php endif; ?>
