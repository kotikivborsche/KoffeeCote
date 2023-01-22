<?php
/*
Plugin Name: Innozilla Skins for Contact Form 7
Plugin URI: https://innozilla.com/wordpress-plugins/contact-form-7-skins
Description: Custom Styles for Contact Form 7
Author: Innozilla
Author URI: https://innozilla.com/
Text Domain: cf7-skins-innozilla
Domain Path: /languages/
Version: 1.1.5
*/

define( 'ICF7S_VERSION', '1.0.0' );

define( 'ICF7S_REQUIRED_WP_VERSION', '3.0.0' );

define( 'ICF7S_PLUGIN', __FILE__ );

define( 'ICF7S_PLUGIN_BASENAME', plugin_basename( ICF7S_PLUGIN ) );

define( 'ICF7S_PLUGIN_NAME', trim( dirname( ICF7S_PLUGIN_BASENAME ), '/' ) );

define( 'ICF7S_PLUGIN_DIR', untrailingslashit( dirname( ICF7S_PLUGIN ) ) );

define( 'ICF7S_PLUGIN_URL', untrailingslashit( plugins_url( '', ICF7S_PLUGIN ) ) );

require_once ICF7S_PLUGIN_DIR . '/includes/init.php';

if ( ! class_exists( 'ICF7S_Setup' ) ) {
	require_once dirname( __FILE__ ) . '/classes/Setup.php';
	$ICF7S_setup = new ICF7S_Setup();
	$ICF7S_setup->init();
}