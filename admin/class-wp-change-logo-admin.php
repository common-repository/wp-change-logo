<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://accentcode.com/
 * @since      1.0.0
 *
 * @package    Wp_Change_Logo
 * @subpackage Wp_Change_Logo/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_Change_Logo
 * @subpackage Wp_Change_Logo/admin
 * @author     Accentcode <accent.coder@gmail.com>
 */
class Wp_Change_Logo_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	* Register admin setting page for quize and tests.
	*
	* @since   1.0.0
	* @author  Accent Code
	* @access  public 
	*/
	public function wcl_add_logo_setting_page() {
    	add_menu_page(__('Logo Settings','wp-change-logo'), __('Logo Settings','wp-change-logo'), 'manage_options', 'logo-setting',  array($this,'wcl_add_logo_settings'));
	}

	/**
	* Display setting page content.
	*
	* @since   1.0.0
	* @author  Accent Code
	* @access  public 
	*/
    public function wcl_add_logo_settings() {
    	$settings = array();
    	$logo = $buttonbg = $buttontxt = $boxbg = $boxtxt = $body = $footer = '';
    	$settings = get_option('wcl_logo_settings');

    	if(!empty($settings)){
    		if(array_key_exists('logo-url', $settings)){
    			$logo = $settings['logo-url'];
    		}

    		if(array_key_exists('button-bg', $settings)){
    			$buttonbg = $settings['button-bg'];
    		}

    		if(array_key_exists('button-txt', $settings)){
    			$buttontxt = $settings['button-txt'];
    		}

    		if(array_key_exists('box-bg', $settings)){
    			$boxbg = $settings['box-bg'];
    		}

    		if(array_key_exists('box-txt', $settings)){
    			$boxtxt = $settings['box-txt'];
    		}
    		if(array_key_exists('body', $settings)){
    			$body = $settings['body'];
    		}

    		if(array_key_exists('footer-txt', $settings)){
    			$footer = $settings['footer-txt'];
    		}
    	}
    	?>
    	<form action="" method="post">
	    	<div class="wcl-container">
	    		<h2><?php _e('Customize WP Login Page','wp-change-logo'); ?> </h2>

	    		<div class="wcl-controll">
	    			<label for="wcl-logo"><?php _e('Enter image full path','wp-change-logo'); ?></label>
	    			<input type="text" name="wcl-logo" class="wcl-text" value="<?php echo !empty($logo)? $logo : '' ; ?>">
	    		</div>
	    		<div class="wcl-controll">
	    			<label for="wcl-button-bg"><?php _e('Select login button background color','wp-change-logo'); ?></label>
	    			<input type="text" name="wcl-button-bg" class="wcl_color_field wcl-color" value="<?php echo !empty($buttonbg)? $buttonbg : '#0073aa'; ?>">
	    		</div>
	    		<div class="wcl-controll">
	    			<label for="wcl-button-text"><?php _e('Select login button text color','wp-change-logo'); ?></label>
	    			<input type="text" name="wcl-button-text" class="wcl_color_field wcl-color" value="<?php echo !empty($buttontxt)? $buttontxt : '#72777c'; ?>">
	    		</div>
	    		<div class="wcl-controll">
	    			<label for="wcl-login-box-bg"><?php _e('Select login box background color','wp-change-logo'); ?></label>
	    			<input type="text" name="wcl-login-box-bg" class="wcl_color_field wcl-color" value="<?php echo !empty($boxbg)? $boxbg : '#72777c' ; ?>">
	    		</div>

	    		<div class="wcl-controll">
	    			<label for="wcl-login-box-txt"><?php _e('Select login box text color','wp-change-logo'); ?></label>
	    			<input type="text" name="wcl-login-box-txt" class="wcl-color wcl_color_field" value="<?php echo !empty($boxtxt)? $boxtxt : '#72777c' ; ?>">

	    		</div>

	    		<div class="wcl-controll">
	    			<label for="wcl-login-body"><?php _e('Select login body background','wp-change-logo'); ?></label>
	    			<input type="text" name="wcl-login-body" class="wcl-color wcl_color_field" value="<?php echo !empty($body)? $body : '#f1f1f1' ; ?>">

	    		</div>
	    		<div class="wcl-controll">
	    			<label for="wcl-login-footer"><?php _e('Select login footer text color','wp-change-logo'); ?></label>
	    			<input type="text" name="wcl-login-footer" class="wcl-color wcl_color_field" value="<?php echo !empty($footer)? $footer : '#555d66' ; ?>">

	    		</div>


	    		<div class="wcl-submit">
	    			<input type="submit" name="wcl-save-login-page-setting" value="Save Settings" class="button button-primary">
	    			<input type="hidden" name="wcl-action" value="wcl-save-login-page-setting">
	    			<?php wp_nonce_field( 'wcl_login_nonce', 'wcl_login_save_nonce' ); ?>
	    		</div>

	    	</div>
	    </form>

    	<?php

    }

	/**
	* Save logo page settings.
	*
	* @since    1.0.0
	* @author   accentcode
	* @access   public 
	*/
    public function wcl_save_logo_settings(){
    	if(isset($_POST['wcl-save-login-page-setting']) && isset( $_POST['wcl_login_save_nonce'] ) && wp_verify_nonce( $_POST['wcl_login_save_nonce'], 'wcl_login_nonce')){
    			$settings 				= array();

    			$settings['logo-url'] 	= sanitize_text_field($_POST['wcl-logo']);
    			$settings['button-bg']  = sanitize_text_field($_POST['wcl-button-bg']);
    			$settings['button-txt']	= sanitize_text_field($_POST['wcl-button-text']);
    			$settings['box-bg'] 	= sanitize_text_field($_POST['wcl-login-box-bg']);
    			$settings['box-txt'] 	= sanitize_text_field($_POST['wcl-login-box-txt']);
    			$settings['body'] 		= sanitize_text_field($_POST['wcl-login-body']);
    			$settings['footer-txt']	= sanitize_text_field($_POST['wcl-login-footer']);
    			update_option('wcl_logo_settings', $settings, true);
    			add_action( 'admin_notices', array($this,'wcl_admin_notice_success') );
    	}
    }

	/**
	* Display admin notice.
	*
	* @since    1.0.0
	* @author   accentcode
	* @access   public 
	*/
	public function wcl_admin_notice_success() {
	?>
		<div class="notice notice-success is-dismissible">
		<p><?php _e( 'Done! Settings updated', 'wp-change-logo' ); ?></p>
		</div>
		<?php
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 * @author   accentcode
	 * @access   public 
	 */
	public function wcl_admin_enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Change_Logo_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Change_Logo_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_style( 'wp-color-picker' ); 
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-change-logo-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 * @author   accentcode
	 * @access   public 
	 */
	public function wcl_admin_enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Change_Logo_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Change_Logo_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		 wp_enqueue_script( 'wp-color-picker');
		 wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp-change-logo-admin.js', array( 'jquery' ), $this->version, false );
	}
}