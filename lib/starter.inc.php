<?php

namespace starter;

/**
 * Filter to add the theme and child-theme dir to the views
 * put theme-child dir first, if not found look in theme dir
 * @param [type] $views [description]
 */
function add_twigs_dir( $views ) {

    return array_merge( $views, array(
                TOOLBOXSTARTER_DIR . 'twig_templates',

            )
		);
}

/**
 * this is where you can add your own functions to twig
 * @param [type] $twig [description]
 */
function add_twig_filters( $twig ) {

        $twig->addExtension( new \Twig_Extension_StringLoader() );

        /**
         * Adds a filter so we can cast strings to int values for comparison
         */
        $twig->addFilter( new \Twig_SimpleFilter( 'int', function ( $value ) {

            return intval( $value );

        }));

	return $twig;
}

/**
 * Register our Toolbox Alias Module(s)
 *
 * @return void
 */
function register_alias_modules() {

    // Check for existence of FLBuilder class, if it doesn't, BB plugin probably turned off for AJAX call
    if ( !class_exists('FLBuilder') ) return;

    include_once( TOOLBOXSTARTER_DIR . 'modules/starter-user-info.php' );

}