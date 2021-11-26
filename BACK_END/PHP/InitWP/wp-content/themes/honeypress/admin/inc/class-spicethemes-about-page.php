<?php
/**
 * @author SpiceThemes
 */

if (!class_exists('Honeypress_About_Page')) {
	class Honeypress_About_Page {

		protected static $instance;
		private $options;
		private $version = '1.0.0';
		private $theme;
		private $demo_link;
		private $docs_link;
		private $rate_link;
		private $theme_page;
		private $pro_link;
		private $tabs;
		private $action_count;
		private $recommended_actions;

		public static function get_instance() {

			if (is_null(self::$instance)) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		function __construct() {
			$this->theme            = wp_get_theme();
			$actions                   = $this->get_recommended_actions();
			$this->action_count        = $actions['count'];
			$this->recommended_actions = $actions['actions'];

			add_action('admin_menu', array($this, 'add_theme_info_menu'));
			add_action('wp_ajax_honeypress_update_rec_acts', array($this, 'update_recommended_actions_watch'));
			add_action('load-themes.php', array($this, 'activation_admin_notice'));
			/* enqueue script and style for welcome screen */
			add_action( 'admin_enqueue_scripts', array( $this, 'style_and_scripts' ) );

			/* load welcome screen */
			add_action( 'honeypress_info_screen', array( $this, 'getting_started' ), 10 );
			add_action( 'honeypress_info_screen', array( $this, 'recommended_actions' ), 50 );
			add_action( 'honeypress_info_screen', array( $this, 'one_click_demo_actions' ), 	50 );
		}

		/**
	 	* Load welcome screen css and javascript
	 	* @sfunctionse  1.8.2.4
	 	*/
		public function style_and_scripts( $hook_suffix ) {

			if ( 'appearance_page_honeypress-welcome' == $hook_suffix ) {

				wp_enqueue_style( 'honeypress-info-screen-css', HONEYPRESS_THEME_URI . '/admin/assets/css/welcome.css' );

				wp_enqueue_style( 'honeypress-info-css', HONEYPRESS_THEME_URI . '/assets/css/bootstrap.css' );

				wp_enqueue_style('honeypress-theme-info-style', HONEYPRESS_THEME_URI . '/admin/assets/css/welcome-page-styles.css');

				wp_enqueue_style('honeypress-welcome_customizer', HONEYPRESS_THEME_URI . '/admin/assets/css/welcome_customizer.css');
				wp_enqueue_script('plugin-install');
				wp_enqueue_script('updates');
				wp_enqueue_script('honeypress-companion-install', HONEYPRESS_THEME_URI . '/admin/assets/js/plugin-install.js', array('jquery'));
				wp_enqueue_script('honeypress-ajax', HONEYPRESS_THEME_URI . '/admin/assets/js/ajax.js', array('jquery'));
				wp_localize_script('honeypress-companion-install', 'honeypress_companion_install',
				array(
					'installing' => esc_html__('Installing', 'honeypress'),
					'activating' => esc_html__('Activating', 'honeypress'),
					'error'      => esc_html__('Error', 'honeypress'),
					'ajax_url'   => esc_url(admin_url('admin-ajax.php')),
				));
			}
		}

		/**
		 * Load scripts for customizer page
		 * @sfunctionse  1.8.2.4
		 */
		public function scripts_for_customizer() {

			wp_enqueue_style( 'honeypress-info-screen-customizer-css', HONEYPRESS_THEME_URI . '/admin/assets/css/welcome_customizer.css' );
			wp_enqueue_script( 'honeypress-info-screen-customizer-js', HONEYPRESS_THEME_URI . '/admin/assets/js/welcome_customizer.js', array('jquery'), '20120206', true );

			global $honeypress_required_actions;

			$nr_actions_required = 0;

			/* get number of required actions */
			if( get_option('honeypress_show_required_actions') ):
				$honeypress_show_required_actions = get_option('honeypress_show_required_actions');
			else:
				$honeypress_show_required_actions = array();
			endif;

			if( !empty($honeypress_required_actions) ):
				foreach( $honeypress_required_actions as $honeypress_required_action_value ):
					if(( !isset( $honeypress_required_action_value['check'] ) || ( isset( $honeypress_required_action_value['check'] ) && ( $honeypress_required_action_value['check'] == false ) ) ) && ((isset($honeypress_show_required_actions[$honeypress_required_action_value['id']]) && ($honeypress_show_required_actions[$honeypress_required_action_value['id']] == true)) || !isset($honeypress_show_required_actions[$honeypress_required_action_value['id']]) )) :
						$nr_actions_required++;
					endif;
				endforeach;
			endif;

			wp_localize_script( 'honeypress-info-screen-customizer-js', 'honeypressLiteWelcomeScreenCustomizerObject', array(
				'nr_actions_required' => $nr_actions_required,
				'aboutpage' => esc_url( admin_url( 'themes.php?page=honeypress-info' ) ),
				'customizerpage' => esc_url( admin_url( 'customize.php' ) ),
				'themeinfo' => __('View Theme Info','honeypress'),
			) );
		}

		public function add_theme_info_menu() {
			$theme = $this->theme;
			$count = $this->action_count;
			$count = ($count > 0) ? '<span class="awaiting-mod action-count"><span>' . $count . '</span></span>' : '';
			$title = sprintf(esc_html__('About %1$s %2$s', 'honeypress'), esc_html($theme->get('Name')), $count);
			add_theme_page(sprintf(esc_html__('Welcome to %1$s %2$s', 'honeypress'), esc_html($theme->get('Name')), esc_html($theme->get('Version'))), $title, 'edit_theme_options', 'honeypress-welcome', array($this, 'print_welcome_page'));
		}

		public function activation_admin_notice() {
			global $pagenow;
			if (is_admin() && ('themes.php' == $pagenow) && isset($_GET['activated'])) {
				add_action('admin_notices', array($this, 'welcome_admin_notice'), 99);
			}
		}

		public function welcome_admin_notice() {
			?>
			<div class="updated notice is-dismissible">
				<p><?php echo sprintf( esc_html__("Honeypress theme is installed. To take full advantage of the features this theme has to offer visit our %1\$s welcome page %2\$s", "honeypress"), '<a href="' . esc_url( admin_url( 'themes.php?page=honeypress-welcome' ) ) . '">', '</a>' ); ?></p>
				<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=honeypress-welcome' ) ); ?>" class="button" style="text-decoration: none;"><?php _e( 'Get started with HoneyPress', 'honeypress' ); ?></a></p>
			</div>
			<?php
		}

		public function print_welcome_page() {
			$theme = $this->theme;
			?>
	  		<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="wrap theme-info-wrap honeypress-wrap">
							<div style="clear: both;"></div>
							<div class="theme-welcome-container" style="min-height:300px;">
								<div class="theme-welcome-inner">
									<?php
										$tabs = $this->get_tabs_array();
										$tabs_head     = '';
										$tab_file_path = '';
										$active_tab    = 'getting_started';

										if (isset($_GET['tab']) && $_GET['tab']) {
											$active_tab = sanitize_text_field($_GET['tab']);
										}

										foreach ($tabs as $key => $tab) {
											$active_class = '';
											$count        = '';
											if ($active_tab == $tab['link']) {

												$tab_file_path = $tab['file_path'];
											}

											if ($tab['link'] == 'recommended_actions') {
												$count = $this->action_count;
												$count = ($count > 0) ? '<span class="badge-action-count">' . $count . '</span>' : '';
											}

											$tabs_head .= sprintf('<li role="presentation"><a href="%s" class="nav-tab %s" role="tab" data-toggle="tab">%s</a></li>', esc_url(('#' . $tab['link'])), $active_class, $tab['name'] . $count);

										}

									?>
									<ul class="honeypress-nav-tabs" role="tablist">
										<?php echo wp_kses_post($tabs_head); ?>
									</ul>

									<div class="honeypress-tab-content">
										<?php do_action( 'honeypress_info_screen' ); ?>
									</div>

									<div class="tab-content <?php echo esc_attr($active_tab); ?>">
									 	<?php
											if (!empty($tab_file_path) && file_exists($tab_file_path)) {
												require_once $tab_file_path;
											}
										?>
									 	<div style="clear: both;"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
		}

		public function getting_started() {
			require_once( HONEYPRESS_THEME_DIR . '/admin/tab-pages/getting-started.php' );
		}

	    public function one_click_demo_actions() {
			require_once( HONEYPRESS_THEME_DIR . '/admin/tab-pages/one-click-demo-import.php' );
		}

		/**
		 * Recommended Action
		 *
		 */
		public function recommended_actions() {
			require_once( HONEYPRESS_THEME_DIR . '/admin/tab-pages/recommended_actions.php' );
		}

		public function get_tabs_array() {
			$tabs_array = array();

			$tabs_array[]	= array(
					'link'      => 'getting_started',
					'name'      => esc_html__('Getting Started', 'honeypress'),
					'file_path' => HONEYPRESS_THEME_DIR . '/admin/tab-pages/getting-started.php',
				);

			$tabs_array[]	= 	array(
					'link'      => 'recommended_actions',
					'name'      => esc_html__('Recommended Actions', 'honeypress'),
					'file_path' => HONEYPRESS_THEME_DIR . '/admin/tab-pages/recommended-actions.php',
				);

		    $tabs_array[]	= 	array(
					'link'      => 'one_click_demo',
					'name'      => esc_html__('One Click Demo Import', 'honeypress'),
			);

			return $tabs_array;
		}

		public function get_recommended_plugins() {

			$plugins = apply_filters('honeypress_recommended_plugins', array());
			return $plugins;
		}

		public function get_useful_plugins() {
			$plugins = apply_filters('honeypress_useful_plugins', array());
			return $plugins;
		}

		public function get_recommended_actions() {

			$act_count           = 0;
			$actions_todo = get_option( 'recommended_actions', array());

			$plugins = $this->get_recommended_plugins();

			if ($plugins) {
				foreach ($plugins as $key => $plugin) {
					$action = array();
					if (!isset($plugin['slug'])) {
						continue;
					}

					$action['id']   = 'install_' . $plugin['slug'];
					$action['desc'] = '';
					if (isset($plugin['desc'])) {
						$action['desc'] = $plugin['desc'];
					}

					$action['name'] = '';
					if (isset($plugin['name'])) {
						$action['title'] = $plugin['name'];
					}

					$link_and_is_done  = $this->get_plugin_buttion($plugin['slug'], $plugin['name']);
					$action['link']    = $link_and_is_done['button'];
					$action['is_done'] = $link_and_is_done['done'];
					if (!$action['is_done'] && (!isset($actions_todo[$action['id']]) || !$actions_todo[$action['id']])) {
						$act_count++;
					}
					$recommended_actions[] = $action;
					$actions_todo[]        = array('id' => $action['id'], 'watch' => true);
				}
				return array('count' => $act_count, 'actions' => $recommended_actions);
			}

		}

		public function get_plugin_buttion($slug, $name) {
			$is_done      = false;
			$button_html  = '';
			$is_installed = $this->is_plugin_installed($slug);
			$plugin_path  = $this->get_plugin_basename_from_slug($slug);
			$is_activeted = $this->chk_plg($name);
			if (!$is_installed) {
				$plugin_install_url = add_query_arg(
					array(
						'action' => 'install-plugin',
						'plugin' => $slug,
					),
					self_admin_url('update.php')
				);
				$plugin_install_url = wp_nonce_url($plugin_install_url, 'install-plugin_' . $slug);



				$button_html        = sprintf('<a class="spicethemes-plugin-install install-now button-secondary button" data-slug="%1$s" href="%2$s" aria-label="%3$s" data-name="%4$s">%5$s</a>',
					esc_attr($slug),
					esc_url($plugin_install_url),
					sprintf(esc_html__('Install %s now', 'honeypress'), esc_html($name)),
					esc_html($name),
					esc_html__('Install and activate', 'honeypress')
				);
			} elseif ($is_installed && !$is_activeted) {

				$plugin_activate_link = add_query_arg(
					array(
						'action'        => 'activate',
						'plugin'        => rawurlencode($plugin_path),
						'plugin_status' => 'all',
						'paged'         => '1',
						'_wpnonce'      => wp_create_nonce('activate-plugin_' . $plugin_path),
					), self_admin_url('plugins.php')
				);

				$button_html = sprintf('<a class="spicethemes-plugin-activate activate-now button-primary button" data-slug="%1$s" href="%2$s" aria-label="%3$s" data-name="%4$s">%5$s</a>',
					esc_attr($slug),
					esc_url($plugin_activate_link),
					sprintf(esc_html__('Activate %s now', 'honeypress'), esc_html($name)),
					esc_html($name),
					esc_html__('Activate', 'honeypress')
				);
			} elseif ($is_activeted) {
				$button_html = sprintf('<div class="action-link button disabled"><span class="dashicons dashicons-yes"></span> %s</div>', esc_html__('Active', 'honeypress'));
				$is_done     = true;
			}

			return array('done' => $is_done, 'button' => $button_html);
		}

		public function chk_plg($name)
		{
			if (  function_exists( 'spiceb_activate' ) && ($name=='SpiceBox'))
			{
				return true;
			}
			if( class_exists('WPCF7') && ($name=='Contact Form 7'))
			{
				return true;
			}
			if( class_exists('Unique_Headers_Instantiate') && ($name=='Unique Headers'))
			{
				return true;
			}
			if( function_exists('wpseo_init') && ($name=='Yoast SEO'))
			{
				return true;
			}
		}

		public function get_plugin_basename_from_slug($slug) {
			$keys = array_keys($this->get_installed_plugins());
			foreach ($keys as $key) {
				if (preg_match('|^' . $slug . '/|', $key)) {
					return $key;
				}
			}
			return $slug;
		}

		public function is_plugin_installed($slug) {
			$installed_plugins = $this->get_installed_plugins(); // Retrieve a list of all installed plugins (WP cached).
			$file_path         = $this->get_plugin_basename_from_slug($slug);
			return (!empty($installed_plugins[$file_path]));
		}

		public function get_installed_plugins() {

			if (!function_exists('get_plugins')) {
				require_once ABSPATH . 'wp-admin/includes/plugin.php';
			}

			return get_plugins();
		}

		public function update_recommended_actions_watch() {
			if (isset($_POST['action_id'])) {
				$action_id    = sanitize_text_field($_POST['action_id']);
				$actions_todo = get_option('recommended_actions', array());

				if ((!isset($actions_todo[$action_id]) || !$actions_todo[$action_id])) {
					$actions_todo[$action_id] = true;
				} else {
					$actions_todo[$action_id] = false;
				}
				update_option('recommended_actions', $actions_todo);
			}
			echo json_encode(get_option('recommended_actions'));
			wp_die();
		}


		public function get_plugin_info_api( $slug ) {
			require_once ABSPATH . 'wp-admin/includes/plugin-install.php';
			$call_api = get_transient( 'st_about_plugin_info_' . $slug );

			if ( false === $call_api ) {
				$call_api = plugins_api(
					'plugin_information', array(
						'slug'   => $slug,
						'fields' => array(
							'downloaded'        => false,
							'rating'            => false,
							'description'       => false,
							'short_description' => true,
							'donate_link'       => false,
							'tags'              => false,
							'sections'          => true,
							'homepage'          => true,
							'added'             => false,
							'last_updated'      => false,
							'compatibility'     => false,
							'tested'            => false,
							'requires'          => false,
							'downloadlink'      => false,
							'icons'             => true,
						),
					)
				);
				set_transient( 'st_about_plugin_info_' . $slug, $call_api, 30 * MINUTE_IN_SECONDS );
			}

			return $call_api;
		}

		public function get_plugin_icon( $icons ) {

			if ( ! empty( $icons['svg'] ) ) {
				$plugin_icon_url = $icons['svg'];
			} elseif ( ! empty( $icons['2x'] ) ) {
				$plugin_icon_url = $icons['2x'];
			} elseif ( ! empty( $icons['1x'] ) ) {
				$plugin_icon_url = $icons['1x'];
			} else {
				$plugin_icon_url = HONEYPRESS_THEME_URI . '/admin/assets/images/placeholder_plugin.png';
			}
			return $plugin_icon_url;
		}
	}
}

function honeypress_useful_plugins_array($plugins){
	$plugins[] = array(
					'slug'     => 'elementor',
				);

	return $plugins;
}
add_filter('honeypress_useful_plugins', 'honeypress_useful_plugins_array');

function honeypress_recommended_plugins_array($plugins){

		$plugins[] = array(
					'name'     => esc_html__('SpiceBox', 'honeypress'),
					'slug'     => 'spicebox',
					'desc'     => esc_html__('To access the advanced Frontpage sections and the other features, please install the SpiceBox plugin.', 'honeypress'),
					);

		$plugins[] = array(
					'name'     => esc_html__('Contact Form 7', 'honeypress'),
					'slug'     => 'contact-form-7',
					'desc'     => esc_html__('To display the contact form, please install the Contact Form 7 plugin.', 'honeypress'),
				    );

		$plugins[] = array(
			        'name' => esc_html__('Unique Headers', 'honeypress'),
			        'slug' => 'unique-headers',
			        'desc' => esc_html__('You can add different banner image for a different page or post according to you', 'honeypress'),
	                );

		$plugins[] = array(
					'name'     => esc_html__('Yoast SEO', 'honeypress'),
					'slug'     => 'wordpress-seo',
					'desc'     => esc_html__('To display breadcrumbs, please install the Yoast SEO plugin.', 'honeypress'),
				    );
	return $plugins;
}
add_filter('honeypress_recommended_plugins', 'honeypress_recommended_plugins_array');

function Honeypress_About_Page() {
	return Honeypress_About_Page::get_instance();
}
global $Honeypress_About_Page;
$Honeypress_About_Page = Honeypress_About_Page();
