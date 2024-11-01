<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://accentcode.com/
 * @since      1.0.0
 *
 * @package    Wp_Change_Logo
 * @subpackage Wp_Change_Logo/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Wp_Change_Logo
 * @subpackage Wp_Change_Logo/public
 * @author     Accentcode <accent.coder@gmail.com>
 */
class Wp_Change_Logo_Public {

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
	 * @author   Accentcode
	 * @access   public
	 * @param    string    $plugin_name       The name of the plugin.
	 * @param    string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	* Change wp login page logo and design.
	*
	* @since    1.0.0
	* @author   Accentcode
	* @access   public
	*/
	public function wcl_change_login_page() {
		$settings 	= array();
    	$logo 		= '';
    	$buttonbg 	= '#0073aa';
    	$buttontxt 	= '#72777c';
    	$boxbg 		= '#72777c';
    	$boxtxt 	= '#72777c';
    	$body 		= '#f1f1f1';
    	$footer 	= '#555d66';
    	$settings 	= get_option('wcl_logo_settings');
 
    	if(!empty($settings)){
    		if(array_key_exists('logo-url', $settings) && !empty($settings['logo-url'])){
    			$logo = $settings['logo-url'];
    			?>
    			<style type="text/css"> 
				body.login div#login h1 a {
					background-image: url(<?php echo $logo; ?>);  //Add your own logo image in this url 
					padding-bottom: 30px; 
				} 
			</style><?php
    		}


    		if(array_key_exists('button-bg', $settings) && !empty($settings['button-bg'])){
    			$buttonbg = $settings['button-bg'];
    			?>
    			<style type="text/css">
	    			.login .button-primary {
					    background: <?php echo $buttonbg; ?>!important;
					    border-color:<?php echo $buttonbg; ?>!important;
					    box-shadow:none!important;
					    text-decoration: none!important;
					    text-shadow:none!important;
					}
				</style><?php
    		}

    		if(array_key_exists('button-txt', $settings) && !empty($settings['button-txt'])){
    			$buttontxt = $settings['button-txt'];
    			?>
    			<style type="text/css">
	    			.login .button-primary {
					    color: <?php echo $buttontxt; ?>!important;
					}
				</style><?php
    		}

    		if(array_key_exists('box-bg', $settings) && !empty($settings['box-bg'])){
    			$boxbg = $settings['box-bg'];
    			?>
    			<style type="text/css">
	    			.login form{
						background: <?php echo $boxbg; ?>!important;
					}
				</style><?php
    		}

    		if(array_key_exists('box-txt', $settings) && !empty($settings['box-txt'])){
    			$boxtxt = $settings['box-txt'];
    			?>
    			<style type="text/css">
	    			.login label{
						color:<?php echo $boxtxt; ?>!important;
					}
				</style><?php
    		}

    		if(array_key_exists('body', $settings) && !empty($settings['body'])){
    			$body = $settings['body'];
    			?>
    			<style type="text/css">
	    			.login{
						background: <?php echo $body;?>;
					}
				</style><?php
    		}
    		if(array_key_exists('footer-txt', $settings) && !empty($settings['footer-txt'])){
    			$footer = $settings['footer-txt'];
    			?>
    			<style type="text/css">
	    			.login #nav a, .login #backtoblog a{
						color:<?php echo $footer; ?>!important;
					}
				</style><?php
    		}
    	}
		
	} 

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 * @author   Accentcode
	 * @access   public
	 */
	public function wcl_enqueue_styles() {

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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-change-logo-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 * @author   accentcode
	 * @access   public 
	 */
	public function wcl_enqueue_scripts() {

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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp-change-logo-public.js', array( 'jquery' ), $this->version, false );

	}

}
