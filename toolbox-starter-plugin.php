<?php

/**
 Plugin Name: Toolbox Starter Plugin
 Plugin URI: https://www.toolboxstarterplugin.com/
 Description: Starter Plugin for Toolbox, Using Timber
 Version: 1.0
 Author: Didou Schol
 Text Domain: textdomain
 Domain Path: /languages
 Author URI: https://www.badabing.nl
 */

define( 'TOOLBOXSTARTER_VERSION' 	, '1.0' );
define( 'TOOLBOXSTARTER_DIR'		, plugin_dir_path( __FILE__ ) );
define( 'TOOLBOXSTARTER_FILE'		, __FILE__ );
define( 'TOOLBOXSTARTER_URL' 		, plugins_url( '/', __FILE__ ) );


// include the starter.inc.php where functions are namespaced
include_once( 'lib/starter.inc.php' );

/**
 * adds the plugins twig_templates directory to the paths where Timber will look for templates
 */
add_filter( 'toolbox_twig_views_locations'      , '\starter\add_twigs_dir' , 25 ,1  );

add_filter( 'timber/twig' 						, '\starter\add_twig_filters' );

add_action( 'init' 								, '\starter\register_alias_modules' , 100 , 1 );