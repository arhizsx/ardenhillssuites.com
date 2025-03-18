<?php
/**
 * The install plugins page view.
 *
 * @package ocdi
 */

namespace OCDI;

$plugin_installer = new PluginInstaller();
$theme_plugins    = $plugin_installer->get_theme_plugins();
$theme            = wp_get_theme();
?>

<div class="eth-theme-dashboard ocdi ocdi--install-plugins">

	<?php echo wp_kses_post( ViewHelpers::plugin_header_output() ); ?>

	<div class="eth-theme-panel">

		<div class="ocdi__admin-notices js-ocdi-admin-notices-container"></div>

		<div class="ocdi__content-container-content">
			<div class="ocdi__content-container-content--main">
				<?php if ( isset( $_GET['import'] ) ) : ?>
					<div class="ocdi-install-plugins-content js-ocdi-install-plugins-content">
						<div class="eth-theme-panel-header">
							<h3 class="title"><?php esc_html_e( 'Import Demo Content', 'himara' ); ?></h3>


							<?php if ( ! empty( $this->import_files[ $_GET['import'] ]['import_notice'] ) ) : ?>
								<div class="notice  notice-info">
									<p><?php echo wp_kses_post( $this->import_files[ $_GET['import'] ]['import_notice'] ); ?></p>
								</div>
							<?php endif; ?>
						</div>



						<div class="eth-theme-panel-inner ocdi-install-plugins-content-content">

								<div class="eth-notice eth-notice-info">
									<i class="dashicons dashicons-info-outline"></i>
									<p> <?php echo __('Your website needs a few essential plugins. The following plugins will be installed and activated.', 'himara') ?> </p>
								</div>

							<?php if ( empty( $theme_plugins ) ) : ?>
								<div class="ocdi-content-notice">
									<p>
										<?php esc_html_e( 'All required/recommended plugins are already installed. You can import your demo content.' , 'himara' ); ?>
									</p>
								</div>
							<?php else : ?>
								<div>
								<?php foreach ( $theme_plugins as $plugin ) : ?>
									<?php $is_plugin_active = $plugin_installer->is_plugin_active( $plugin['slug'] ); ?>
									<label class="plugin-item plugin-item-<?php echo esc_attr( $plugin['slug'] ); ?><?php echo $is_plugin_active ? ' plugin-item--active' : ''; ?><?php echo ! empty( $plugin['required'] ) ? ' plugin-item--required' : ''; ?>" for="ocdi-<?php echo esc_attr( $plugin['slug'] ); ?>-plugin">
										<div class="plugin-item-content">
											<div class="plugin-item-content-title">
												<h3><?php echo esc_html( $plugin['name'] ); ?><?php echo ! empty( $plugin['required'] ) ? ' <small class="required-plugin">'.__('Required', 'himara').'</small>' : '<small class="suggested-plugin">'. __('Suggested', 'himara'). '</small>'; ?></h3>
												<?php if ( in_array( $plugin['slug'], [ 'wpforms-lite', 'all-in-one-seo-pack', 'google-analytics-for-wordpress' ], true ) ) : ?>
													<span>
														<img src="<?php echo esc_url( OCDI_URL . 'assets/images/icons/star.svg' ); ?>" alt="<?php esc_attr_e( 'Star icon', 'himara' ); ?>">
													</span>
												<?php endif; ?>
											</div>
											<?php if ( ! empty( $plugin['description'] ) ) : ?>
												<p>
													<?php echo wp_kses_post( $plugin['description'] ); ?>
												</p>
											<?php endif; ?>
											<div class="plugin-item-error js-ocdi-plugin-item-error"></div>
											<div class="plugin-item-info js-ocdi-plugin-item-info"></div>
										</div>
										<span class="plugin-item-checkbox">
											<input type="checkbox" id="ocdi-<?php echo esc_attr( $plugin['slug'] ); ?>-plugin" name="<?php echo esc_attr( $plugin['slug'] ); ?>" <?php checked( ! empty( $plugin['preselected'] ) || ! empty( $plugin['required'] ) || $is_plugin_active ); ?><?php disabled( $is_plugin_active ); ?>>
											<span class="checkbox">
												<img src="<?php echo esc_url( OCDI_URL . 'assets/images/icons/check-solid-white.svg' ); ?>" class="ocdi-check-icon" alt="<?php esc_attr_e( 'Checkmark icon', 'himara' ); ?>">
												<?php if ( ! empty( $plugin['required'] ) ) : ?>
													<img src="<?php echo esc_url( OCDI_URL . 'assets/images/icons/lock.svg' ); ?>" class="ocdi-lock-icon" alt="<?php esc_attr_e( 'Lock icon', 'himara' ); ?>">
												<?php endif; ?>
												<img src="<?php echo esc_url( OCDI_URL . 'assets/images/loader.svg' ); ?>" class="ocdi-loading ocdi-loading-md" alt="<?php esc_attr_e( 'Loading...', 'himara' ); ?>">
											</span>
										</span>
									</label>
								<?php endforeach; ?>
								</div>
								<div class="">

								<!-- test -->

								</div>
							<?php endif; ?>
						</div>
						<div class="ocdi-install-plugins-content-footer">
							<a href="<?php echo esc_url( $this->get_plugin_settings_url() ); ?>" class="button"><img src="<?php echo esc_url( OCDI_URL . 'assets/images/icons/long-arrow-alt-left-blue.svg' ); ?>" alt="<?php esc_attr_e( 'Back icon', 'himara' ); ?>"><span><?php esc_html_e( 'Go Back' , 'himara' ); ?></span></a>
							<a href="#" class="button button-primary js-ocdi-install-plugins-before-import"><?php esc_html_e( 'Continue & Import' , 'himara' ); ?></a>
						</div>
					</div>
				<?php else : ?>
					<div class="js-ocdi-auto-start-manual-import"></div>
				<?php endif; ?>

				<div class="ocdi-importing js-ocdi-importing">

					<div class="eth-theme-panel-header ">
						<h3 class="title"><?php esc_html_e( 'Import Demo Content' , 'himara' ); ?></h3>
					</div>

					<div class="eth-theme-panel-inner">

						<div class="ocdi-importing-header">

							<div class="eth-notice eth-notice-info">
								<i class="dashicons dashicons-info-outline"></i>
								<p><?php esc_html_e( 'Please sit tight while we import your content. Do not refresh the page or hit the back button.' , 'himara' ); ?></p>
							</div>

						</div>

						<div class="ocdi-importing-content">
							<img class="ocdi-importing-content-importing" src="<?php echo esc_url( OCDI_URL . 'assets/images/importing.svg' ); ?>" alt="<?php esc_attr_e( 'Importing animation', 'himara' ); ?>">
						</div>

					</div>
				</div>

				<div class="ocdi-imported js-ocdi-imported">

					<div class="eth-theme-panel-header ">
							<h3 class="title js-ocdi-ajax-response-title"><?php esc_html_e( 'Import Demo Content' , 'himara' ); ?></h3>
					</div>


					<div class="eth-theme-panel-inner">

						<div class="ocdi-imported-header">


							<div class="js-ocdi-ajax-response-subtitle">
								<p>
									<?php esc_html_e( 'Congrats, your demo was imported successfully. You can now begin editing your site.' , 'himara' ); ?>
								</p>
							</div>


						</div>

						<div class="ocdi-imported-content">
							<div class="ocdi__response  js-ocdi-ajax-response"></div>
						</div>
						<div class="ocdi-imported-footer">
							<a href="<?php echo esc_url( admin_url( 'admin.php?page=himara_options' ) ); ?>" class="button button-primary button-hero"><?php esc_html_e( 'Theme Settings' , 'himara' ); ?></a>
							<a href="<?php echo esc_url( get_home_url() ); ?>" target="_blank" class="button button-primary button-hero"><?php esc_html_e( 'Visit Site' , 'himara' ); ?></a>
						</div>

					</div>



				</div>
			</div>
			<div class="ocdi__content-container-content--side">
				<?php
					$selected = isset( $_GET['import'] ) ? (int) $_GET['import'] : null;
					echo wp_kses_post( ViewHelpers::small_theme_card( $selected ) );
				?>
			</div>
		</div>

	</div>
</div>
