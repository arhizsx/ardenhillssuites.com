<?php
/**
 * Static functions used in the OCDI plugin views.
 *
 * @package ocdi
 */

namespace OCDI;

class ViewHelpers {
	/**
	 * The HTML output of the plugin page header.
	 *
	 * @return string HTML output.
	 */
	public static function plugin_header_output() {
		ob_start(); ?>
        <div class="eth-admin-header">
            <div class="eth-admin-header-inner">
                <div class="eth-admin-brand">
                    <a href="https://eagle-themes.com/?utm_source=eth_header_logo" target="_blank" class="eth-admin-logo">
                        <img src="<?php echo get_template_directory_uri().'/assets/images/admin/eth_logo.png'?>" alt="Eagle Themes">
                    </a>
                    <div class="eth-admin-slogan">
                        <span><?php echo HIMARA_THEME_NAME ?> <small><?php echo HIMARA_THEME_VERSION ?></small></span>
                    </div>
                </div>
                <div class="eth-admin-menu">
                        <div class="view-switcher">
                        <a href="admin.php?page=himara_dashboard" class="btn"><?php echo __('Dashboard', 'himara') ?></a>
                        <a href="admin.php?page=himara_demo_importer" class="btn active"><?php echo __('Demo Importer', 'himara') ?></a>
                        <a href="admin.php?page=himara_options" class="btn"><?php echo __('Theme Settings', 'himara' )?></a>
                    </div>
                </div>
            </div>
        </div>
		<?php
		$plugin_title = ob_get_clean();

		// Display the plugin title (can be replaced with custom title text through the filter below).
		return Helpers::apply_filters( 'ocdi/plugin_page_title', $plugin_title );
	}

	/**
	 * The HTML output of a small card with theme screenshot and title.
	 *
	 * @return string HTML output.
	 */
	public static function small_theme_card( $selected = null ) {
		$theme      = wp_get_theme();
		$screenshot = $theme->get_screenshot();
		$name       = $theme->name;

		if ( isset( $selected ) ) {
			$ocdi          = OneClickDemoImport::get_instance();
			$selected_data = $ocdi->import_files[ $selected ];
			$name          = ! empty( $selected_data['import_file_name'] ) ? $selected_data['import_file_name'] : $name;
			$screenshot    = ! empty( $selected_data['import_preview_image_url'] ) ? $selected_data['import_preview_image_url'] : $screenshot;
		}

		ob_start(); ?>
		<div class="ocdi__card ocdi__card--theme">
			<div class="ocdi__card-content">
				<?php if ( $screenshot ) : ?>
					<div class="screenshot"><img src="<?php echo esc_url( $screenshot ); ?>" alt="<?php esc_attr_e( 'Theme screenshot', 'himara' ); ?>" /></div>
				<?php else : ?>
					<div class="screenshot blank"></div>
				<?php endif; ?>
			</div>
			<div class="ocdi__card-footer">
				<h3><?php echo esc_html( $name ); ?></h3>
			</div>
		</div>
		<?php
		return ob_get_clean();
	}
}
