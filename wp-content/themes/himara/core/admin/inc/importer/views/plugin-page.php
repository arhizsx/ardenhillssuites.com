<?php
/**
 * The plugin page view - the "settings" page of the plugin.
 *
 * @package ocdi
 */

namespace OCDI;

$predefined_themes = $this->import_files;

if ( ! empty( $this->import_files ) && isset( $_GET['import-mode'] ) && 'manual' === $_GET['import-mode'] ) {
	$predefined_themes = array();
}

/**
 * Hook for adding the custom plugin page header
 */
Helpers::do_action( 'ocdi/plugin_page_header' );
?>

<div class="eth-theme-dashboard ocdi">

	<?php echo wp_kses_post( ViewHelpers::plugin_header_output() ); ?>

	<div class="eth-theme-panel ocdi__content-container">



		<?php
		// Display warrning if PHP safe mode is enabled, since we wont be able to change the max_execution_time.
		if ( ini_get( 'safe_mode' ) ) {
			printf( /* translators: %1$s - the opening div and paragraph HTML tags, %2$s and %3$s - strong HTML tags, %4$s - the closing div and paragraph HTML tags. */
				esc_html__( '%1$sWarning: your server is using %2$sPHP safe mode%3$s. This means that you might experience server timeout errors.%4$s', 'himara' ),
				'<div class="notice  notice-warning  is-dismissible"><p>',
				'<strong>',
				'</strong>',
				'</p></div>'
			);
		}
		?>

		<div class="ocdi__admin-notices js-ocdi-admin-notices-container"></div>

		<?php
		// Start output buffer for displaying the plugin intro text.
		ob_start();
		?>

		<div class="eth-theme-panel-header">
			<h3 class="title"><?php esc_html_e( 'Import Demo Content', 'himara' ); ?></h3>
		</div>

		<div class="eth-theme-panel-inner">

		<?php


		if ( function_exists( 'theme_license_status' ) ) {

				if ( theme_license_status() == true ) {

		?>
				<div class="eth-notice eth-notice-info">
					<i class="dashicons dashicons-info-outline"></i>
					<p>
					<?php
						$message = '';
						$message .= __('Import process will take time needed to download all attachments from the demo web site. ', 'himara');
						$message .= __('If the import stalls and fails to respond after a few minutes you are suffering from PHP configuration limits that are set too low to complete the process.', 'himara');
						$message .= __(' You should contact your hosting provider and ask them to increase those limits.', 'himara');

						echo esc_html ( $message );

					?>

					</p>

			</div>

		<?php
		$plugin_intro_text = ob_get_clean();

		// Display the plugin intro text (can be replaced with custom text through the filter below).
		echo wp_kses_post( Helpers::apply_filters( 'ocdi/plugin_intro_text', $plugin_intro_text ) );
		?>

		<?php if ( empty( $this->import_files ) ) : ?>
			<div class="notice  notice-info">
				<p><?php esc_html_e( 'There are no predefined import files available for this theme. Please upload the import files manually below.', 'himara' ); ?></p>
			</div>
		<?php endif; ?>

		<?php $theme = wp_get_theme(); ?>

		<div class="ocdi__theme-about">
			<div class="ocdi__theme-about-screenshots">
				<?php if ( $theme->get_screenshot() ) : ?>
				<div class="screenshot"><img src="<?php echo esc_url( $theme->get_screenshot() ); ?>" alt="<?php esc_attr_e( 'Theme screenshot', 'himara' ); ?>" /></div>
				<?php else : ?>
				<div class="screenshot blank"></div>
				<?php endif; ?>
			</div>

			<div class="ocdi__theme-about-info">
				<div class="top-content">
					<div class="theme-title">
						<h2 class="theme-name"><?php echo esc_html( $theme->name ); ?></h2>
						<span class="theme-version">
							<?php
							/* translators: %s: Theme version. */
							printf( __( 'Version: %s', 'himara' ), esc_html( $theme->version ) );
							?>
						</span>
					</div>
					<p class="theme-author">
						<?php
						/* translators: %s: Theme author link. */
						printf( __( 'By %s', 'himara' ), wp_kses_post( $theme->author ) );
						?>
					</p>

					<p class="theme-description"><?php echo wp_kses_post( $theme->description ); ?></p>

					<?php if ( ! empty( $theme->tags ) ) : ?>
					<hr>
					<p class="theme-tags"><span><?php echo __('Tags:', 'himara') ?></span> <?php echo esc_html( implode( ', ', $theme->tags ) ); ?></p>
					<?php endif; ?>
				</div>
				<div class="bottom-content">
					<?php if ( ! empty( $this->import_files ) ) : ?>
						<?php if ( empty( $_GET['import-mode'] ) || 'manual' !== $_GET['import-mode'] ) : ?>
							<a href="<?php echo esc_url( $this->get_plugin_settings_url( array( 'import-mode' => 'manual' ) ) ); ?>" class="ocdi-import-mode-switch"><?php esc_html_e( 'Switch to Manual Import', 'himara' ); ?></a>
						<?php else : ?>
							<a href="<?php echo esc_url( $this->get_plugin_settings_url() ); ?>" class="ocdi-import-mode-switch"><?php esc_html_e( 'Switch back to Theme Predefined Imports', 'himara' ); ?></a>
						<?php endif; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>

		<?php if ( empty( $predefined_themes ) ) : ?>

			<div class="ocdi__file-upload-container">
				<div class="ocdi__file-upload-container--header">
					<h2><?php esc_html_e( 'Manual Demo File Import', 'himara' ); ?></h2>
				</div>

				<div class="ocdi__file-upload-container-items">
					<?php $first_row_class = class_exists( 'ReduxFramework' ) ? 'four' : 'three'; ?>
					<div class="ocdi__file-upload ocdi__card ocdi__card--<?php echo esc_attr( $first_row_class ); ?>">
						<div class="ocdi__card-content">
							<label for="ocdi__content-file-upload">
								<div class="ocdi-icon-container">
									<img src="<?php echo esc_url( OCDI_URL . 'assets/images/icons/content.svg' ); ?>" class="ocdi-icon--content" alt="<?php esc_attr_e( 'Content import icon', 'himara' ); ?>">
								</div>
								<h3><?php esc_html_e( 'Import Content', 'himara' ); ?></h3>
								<p><?php esc_html_e( 'Select an XML file to import.', 'himara' ); ?></p>
							</label>
							<a href="https://ocdi.com/user-guide/#import-content" target="_blank" rel="noopener noreferrer" class="ocdi__card-content-info">
								<img src="<?php echo esc_url( OCDI_URL . 'assets/images/icons/info-circle.svg' ); ?>" alt="<?php esc_attr_e( 'Info icon', 'himara' ); ?>">
							</a>
						</div>
						<div class="ocdi__card-footer">
							<label for="ocdi__content-file-upload" class="button button-primary custom-file-upload-button">
								<?php esc_html_e( 'Select a File', 'himara' ); ?>
							</label>
							<input id="ocdi__content-file-upload" type="file" class="ocdi-hide-input" name="content-file-upload">
						</div>
					</div>

					<div class="ocdi__file-upload ocdi__card ocdi__card--<?php echo esc_attr( $first_row_class ); ?>">
						<div class="ocdi__card-content">
							<label for="ocdi__widget-file-upload">
								<div class="ocdi-icon-container">
									<img src="<?php echo esc_url( OCDI_URL . 'assets/images/icons/widgets.svg' ); ?>" class="ocdi-icon--widgets" alt="<?php esc_attr_e( 'Widgets import icon', 'himara' ); ?>">
								</div>
								<h3><?php esc_html_e( 'Import Widgets', 'himara' ); ?></h3>
								<p><?php esc_html_e( 'Select a JSON/WIE file to import.', 'himara' ); ?></p>
							</label>
							<a href="https://ocdi.com/user-guide/#import-widgets" target="_blank" rel="noopener noreferrer" class="ocdi__card-content-info">
								<img src="<?php echo esc_url( OCDI_URL . 'assets/images/icons/info-circle.svg' ); ?>" alt="<?php esc_attr_e( 'Info icon', 'himara' ); ?>">
							</a>
						</div>
						<div class="ocdi__card-footer">
							<label for="ocdi__widget-file-upload" class="button button-primary custom-file-upload-button">
								<?php esc_html_e( 'Select a File', 'himara' ); ?>
							</label>
							<input id="ocdi__widget-file-upload" type="file" class="ocdi-hide-input" name="widget-file-upload">
						</div>
					</div>

					<div class="ocdi__file-upload ocdi__card ocdi__card--<?php echo esc_attr( $first_row_class ); ?>">
						<div class="ocdi__card-content">
							<label for="ocdi__customizer-file-upload">
								<div class="ocdi-icon-container">
									<img src="<?php echo esc_url( OCDI_URL . 'assets/images/icons/brush.svg' ); ?>" class="ocdi-icon--brush" alt="<?php esc_attr_e( 'Customizer import icon', 'himara' ); ?>">
								</div>
								<h3><?php esc_html_e( 'Import Customizer', 'himara' ); ?></h3>
								<p><?php esc_html_e( 'Select a DAT file to import.', 'himara' ); ?></p>
							</label>
							<a href="https://ocdi.com/user-guide/#import-customizer" target="_blank" rel="noopener noreferrer" class="ocdi__card-content-info">
								<img src="<?php echo esc_url( OCDI_URL . 'assets/images/icons/info-circle.svg' ); ?>" alt="<?php esc_attr_e( 'Info icon', 'himara' ); ?>">
							</a>
						</div>
						<div class="ocdi__card-footer">
							<label for="ocdi__customizer-file-upload" class="button button-primary custom-file-upload-button">
								<?php esc_html_e( 'Select a File', 'himara' ); ?>
							</label>
							<input id="ocdi__customizer-file-upload" type="file" class="ocdi-hide-input" name="customizer-file-upload">
						</div>
					</div>

					<?php if ( class_exists( 'ReduxFramework' ) ) : ?>
					<div class="ocdi__file-upload ocdi__card ocdi__card--<?php echo esc_attr( $first_row_class ); ?>">
						<div class="ocdi__card-content">
							<label for="ocdi__redux-file-upload">
								<div class="ocdi-icon-container">
									<img src="<?php echo esc_url( OCDI_URL . 'assets/images/icons/redux.svg' ); ?>" class="ocdi-icon--redux" alt="<?php esc_attr_e( 'Redux import icon', 'himara' ); ?>">
								</div>
								<h3><?php esc_html_e( 'Import Redux', 'himara' ); ?></h3>
								<p><?php esc_html_e( 'Select a JSON file and enter Redux option name.', 'himara' ); ?></p>
							</label>
							<a href="https://ocdi.com/user-guide/#import-redux" target="_blank" rel="noopener noreferrer" class="ocdi__card-content-info">
								<img src="<?php echo esc_url( OCDI_URL . 'assets/images/icons/info-circle.svg' ); ?>" alt="<?php esc_attr_e( 'Info icon', 'himara' ); ?>">
							</a>
						</div>
						<div class="ocdi__card-footer">
							<label for="ocdi__redux-file-upload" class="button button-primary custom-file-upload-button">
								<?php esc_html_e( 'Select a File', 'himara' ); ?>
							</label>
							<input id="ocdi__redux-file-upload" type="file" class="ocdi-hide-input" name="redux-file-upload">
							<input id="ocdi__redux-option-name" class="ocdi__redux-option-name-input" type="text" name="redux-option-name" placeholder="<?php esc_attr_e( 'Enter Option Name', 'himara' ); ?>">
						</div>
					</div>
					<?php endif; ?>

				</div>
				<div class="ocdi__file-upload-container-items ocdi__file-upload-container-items--second-row">
					<div class="ocdi__recommended-plugins ocdi__card ocdi__card--three">
						<div class="ocdi__card-content">
							<label>
								<div class="ocdi-icon-container">
									<img src="<?php echo esc_url( OCDI_URL . 'assets/images/icons/plugins.svg' ); ?>" class="ocdi-icon--plugins" alt="<?php esc_attr_e( 'Recommended plugins icon', 'himara' ); ?>">
								</div>
								<h3><?php esc_html_e( 'Recommended Plugins', 'himara' ); ?></h3>
								<p><?php esc_html_e( 'Install our recommended plugins.', 'himara' ); ?></p>
							</label>
							<a href="https://ocdi.com/user-guide/#recommended-plugins" target="_blank" rel="noopener noreferrer" class="ocdi__card-content-info">
								<img src="<?php echo esc_url( OCDI_URL . 'assets/images/icons/info-circle.svg' ); ?>" alt="<?php esc_attr_e( 'Info icon', 'himara' ); ?>">
							</a>
						</div>
						<div class="ocdi__card-footer">
							<a href="<?php echo esc_url( $this->get_plugin_settings_url( array( 'step' => 'install-plugins' ) ) ); ?>" class="button button-secondary"><?php esc_html_e( 'Install Plugins', 'himara' ); ?></a>
						</div>
					</div>

					<div class="ocdi__create-demo-content ocdi__card ocdi__card--three">
						<div class="ocdi__card-content">
							<label>
								<div class="ocdi-icon-container">
									<img src="<?php echo esc_url( OCDI_URL . 'assets/images/icons/copy.svg' ); ?>" class="ocdi-icon--copy" alt="<?php esc_attr_e( 'Create demo content icon', 'himara' ); ?>">
								</div>
								<h3><?php esc_html_e( 'Create Demo Content', 'himara' ); ?></h3>
								<p><?php esc_html_e( 'Create useful content with a few clicks.', 'himara' ); ?></p>
							</label>
							<a href="https://ocdi.com/user-guide/#create-demo-content" target="_blank" rel="noopener noreferrer" class="ocdi__card-content-info">
								<img src="<?php echo esc_url( OCDI_URL . 'assets/images/icons/info-circle.svg' ); ?>" alt="<?php esc_attr_e( 'Info icon', 'himara' ); ?>">
							</a>
						</div>
						<div class="ocdi__card-footer">
							<a href="<?php echo esc_url( $this->get_plugin_settings_url( array( 'step' => 'create-content' ) ) ); ?>" class="button button-secondary"><?php esc_html_e( 'Create Content', 'himara' ); ?></a>
						</div>
					</div>

					<div class="ocdi__create-landing-pages ocdi__card ocdi__card--three">
						<div class="ocdi__card-content">
							<label>
								<div class="ocdi-icon-container">
									<img src="<?php echo esc_url( OCDI_URL . 'assets/images/icons/layout.svg' ); ?>" class="ocdi-icon--layout" alt="<?php esc_attr_e( 'Create landing pages icon', 'himara' ); ?>">
								</div>
								<h3><?php esc_html_e( 'Create Landing Pages', 'himara' ); ?></h3>
								<p><?php esc_html_e( 'Create beautiful converting pages.', 'himara' ); ?></p>
							</label>
							<a href="https://ocdi.com/user-guide/#create-landing-pages" target="_blank" rel="noopener noreferrer" class="ocdi__card-content-info">
								<img src="<?php echo esc_url( OCDI_URL . 'assets/images/icons/info-circle.svg' ); ?>" alt="<?php esc_attr_e( 'Info icon', 'himara' ); ?>">
							</a>
						</div>
						<div class="ocdi__card-footer">
							<?php
								$plugin_installer = new PluginInstaller();
								$seedprod_active = $plugin_installer->is_plugin_active( 'coming-soon' );
							?>
							<a href="#" class="button button-secondary js-ocdi-install-coming-soon-plugin<?php echo esc_attr( empty( $seedprod_active ) ) ? '' : ' button-disabled'; ?>">
								<?php echo esc_html( empty( $seedprod_active ) ) ? esc_html__( 'Install Plugin', 'himara' ) : esc_html__( 'Installed', 'himara' ); ?>
							</a>
						</div>
					</div>
				</div>
				<div class="ocdi__file-upload-container--footer">
					<button class="ocdi__button button button-hero js-ocdi-cancel-manual-import" disabled><?php esc_html_e( 'Cancel', 'himara' ); ?></button>
					<button class="ocdi__button button button-hero button-primary js-ocdi-start-manual-import" disabled><?php esc_html_e( 'Continue & Import', 'himara' ); ?></button>
				</div>
			</div>

		<?php elseif ( 1 === count( $predefined_themes ) ) : ?>

			<div class="ocdi__demo-import-notice  js-ocdi-demo-import-notice"><?php
				if ( is_array( $predefined_themes ) && ! empty( $predefined_themes[0]['import_notice'] ) ) {
					echo wp_kses_post( $predefined_themes[0]['import_notice'] );
				}
			?></div>

			<p class="ocdi__button-container">
				<a href="<?php echo esc_url( $this->get_plugin_settings_url( [ 'step' => 'import', 'import' => 0 ] ) ); ?>" class="ocdi__button  button  button-hero  button-primary"><?php esc_html_e( 'Import Demo Data', 'himara' ); ?></a>
			</p>

		<?php else : ?>

			<!-- OCDI grid layout -->
			<div class="ocdi__gl  js-ocdi-gl">
			<?php
				// Prepare navigation data.
				$categories = Helpers::get_all_demo_import_categories( $predefined_themes );
			?>
				<?php if ( ! empty( $categories ) ) : ?>
					<div class="ocdi__gl-header  js-ocdi-gl-header">
						<nav class="ocdi__gl-navigation">
							<ul>
								<li class="active"><a href="#all" class="ocdi__gl-navigation-link  js-ocdi-nav-link"><span><?php esc_html_e( 'All Demos', 'himara' ); ?></span></a></li>
								<?php foreach ( $categories as $key => $name ) : ?>
									<li>
										<a href="#<?php echo esc_attr( $key ); ?>" class="ocdi__gl-navigation-link  js-ocdi-nav-link">
											<span>
												<?php echo esc_html( $name ); ?>
											</span>
										</a>
									</li>
								<?php endforeach; ?>
							</ul>
						</nav>
						<div clas="ocdi__gl-search">
							<input type="search" class="ocdi__gl-search-input  js-ocdi-gl-search" name="ocdi-gl-search" value="" placeholder="<?php esc_html_e( 'Search Demos...', 'himara' ); ?>">
						</div>
					</div>
				<?php else : ?>
					<hr>
				<?php endif; ?>
				<div class="ocdi__gl-item-container js-ocdi-gl-item-container">
					<?php foreach ( $predefined_themes as $index => $import_file ) : ?>
						<?php
							// Prepare import item display data.
							$img_src = isset( $import_file['import_preview_image_url'] ) ? $import_file['import_preview_image_url'] : '';
							// Default to the theme screenshot, if a custom preview image is not defined.
							if ( empty( $img_src ) ) {
								$theme = wp_get_theme();
								$img_src = $theme->get_screenshot();
							}

						?>
						<div class="ocdi__gl-item js-ocdi-gl-item" data-categories="<?php echo esc_attr( Helpers::get_demo_import_item_categories( $import_file ) ); ?>" data-name="<?php echo esc_attr( strtolower( $import_file['import_file_name'] ) ); ?>">
							<div class="ocdi__gl-item-image-container">
								<?php if ( ! empty( $img_src ) ) : ?>
									<img class="ocdi__gl-item-image" src="<?php echo esc_url( $img_src ) ?>">
								<?php else : ?>
									<div class="ocdi__gl-item-image  ocdi__gl-item-image--no-image"><?php esc_html_e( 'No preview image.', 'himara' ); ?></div>
								<?php endif; ?>
							</div>
							<div class="ocdi__gl-item-footer<?php echo ! esc_url( empty( $import_file['preview_url'] ) ) ? '  ocdi__gl-item-footer--with-preview' : ''; ?>">
								<h4 class="ocdi__gl-item-title" title="<?php echo esc_attr( $import_file['import_file_name'] ); ?>"><?php echo esc_html( $import_file['import_file_name'] ); ?></h4>
								<span class="ocdi__gl-item-buttons">
									<?php if ( ! empty( $import_file['preview_url'] ) ) : ?>
										<a class="ocdi__gl-item-button  button" href="<?php echo esc_url( $import_file['preview_url'] ); ?>" target="_blank"><?php esc_html_e( 'Preview Demo', 'himara' ); ?></a>
									<?php endif; ?>
									<a class="ocdi__gl-item-button  button  button-primary" href="<?php echo esc_html( $this->get_plugin_settings_url( [ 'step' => 'import', 'import' => esc_attr( $index ) ] ) ); ?>"><?php esc_html_e( 'Import Demo', 'himara' ); ?></a>
								</span>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		<?php endif; ?>
		</div>

		<?php

		} else {

			?>

			<div class="eth-notice eth-notice-info">
				<i class="dashicons dashicons-info-outline"></i>
				<p><?php echo __('Please, activate your theme license in order to use the Demo Importer.', 'himara') ?></p>
			</div>

			<?php

		}

	}

?>

	</div>
</div>

<?php
/**
 * Hook for adding the custom admin page footer
 */
Helpers::do_action( 'ocdi/plugin_page_footer' );
