<?php
/*
 * Plugin Name: Amazon Cloud Services
 * Plugin URI: https://code.recuweb.com/download/amazon-cloud-services/
 * Description: This plugin provides the Amazon Web Services SDK and a marketplace of free addons to integrate Amazon Services such as S3 or SES
 * Version: 3.0.1
 * Author: Rafasashi
 * Author URI: https://code.recuweb.com/about-us/
 * Requires at least: 4.6
 * Tested up to: 4.9.6
 *
 * Text Domain: amazon_cloud_services
 * Domain Path: /lang/
 * 
 * Copyright: © 2018 Recuweb.
 * License: GNU General Public License v3.0
 * License URI: https://code.recuweb.com/product-licenses/
 */

	if(!defined('ABSPATH')) exit; // Exit if accessed directly
 
	/**
	* Minimum version required
	*
	*/
	if ( get_bloginfo('version') < 3.3 ) return;
	
	// Load plugin class files
	require_once( 'includes/class-amazon-cloud-services.php' );
	require_once( 'includes/class-amazon-cloud-services-settings.php' );
	
	// Load plugin libraries
	require_once( 'includes/lib/class-amazon-cloud-services-admin-api.php' );
	require_once( 'includes/lib/class-amazon-cloud-services-admin-notices.php' );
	require_once( 'includes/lib/class-amazon-cloud-services-post-type.php' );
	require_once( 'includes/lib/class-amazon-cloud-services-taxonomy.php' );		
	
	/**
	 * Returns the main instance of Amazon_Cloud_Services to prevent the need to use globals.
	 *
	 * @since  1.0.0
	 * @return object Amazon_Cloud_Services
	 */
	function Amazon_Cloud_Services() {
				
		$instance = Amazon_Cloud_Services::instance( __FILE__, time() );	
		
		if ( is_null( $instance->notices ) ) {
			
			$instance->notices = Amazon_Cloud_Services_Admin_Notices::instance( $instance );
		}
		
		if ( is_null( $instance->settings ) ) {
			
			$instance->settings = Amazon_Cloud_Services_Settings::instance( $instance );
		}

		return $instance;
	}	

	Amazon_Cloud_Services();
