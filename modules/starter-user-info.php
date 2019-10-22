<?php

/**
 * Starter Plugin User Info Alias Module
 * USER INFO
 * @since 1.0
 */
\FLBuilder::register_module_alias( 'starter-user-info', array(
	'module'      => 'acftimber',
	'name'        => __( 'User Info', 'textdomain' ),
	'description' => __( 'Starter User Info', 'textdomain' ),
	'group'			=> __( 'Starter Plugin', 'textdomain' ),
	'category'    => __('User', 'textdomain'),
    // path to a custom svg icon (20x20 pixels)
    'icon'            => TOOLBOXSTARTER_DIR . 'modules/user_info.svg',
	'enabled'           => true,
	'settings'    => array(

        // Method 1: include the twig template using twig include, useful for future updates where all instances
        //              of this Alias Module require the same update. Plugin needs to remain installed and active.
		'timber_template'         => "{% include 'starter_user_info.twig' %}",

        // Method 2: this will copy the file's content into the timber templates as a starter template. If there are no
        //              dependecies on plugin files THIS plugin can be deactivated and/or uninstalled. Updates to the twig file
        //              will not propagate to existing instances of the Alias Module, but WILL be used for new instances.
        //
        // 'timber_template'         => file_get_contents( TOOLBOXSTARTER_DIR . 'twig_templates/starter_user_info.twig' ),

        // OPTIONAL: settings_form_name. If your Module takes settings you can refer to the settings_form here. The form
        //              needs to be registered seperately.
		'settings_form_name'	=> 'toolbox_starter_user_info_settings',
	),
) );

/**
 * Callback used to return the users of this WP site
 * @return array
 */
function starter_return_users() {

    $select_options = array();

    // get the list of users
    $users = get_users();

    foreach ( $users as $user ) {
        $select_options[ $user->ID ] = $user->user_nicename;
    }

    return $select_options;
}

\FLBuilder::register_settings_form('toolbox_starter_user_info_settings', array(
        'title' => __('Settings', 'textdomain'),
        'tabs'  => array(
            'general'      => array(
                'title'         => __('General', 'textdomain'),
                'sections'      => array(
                    'general'       => array(
                        'title'         => 'General',
                        'fields'        => array(
                            'starter_user'     => array(
                                'type'          => 'select',
                                'label'         => __( 'Display User', 'textdomain' ),
                                'default'       => get_current_user_id(),
                                'options'       => starter_return_users(),
                                'multi-select'    => false,
                            ),
                        )
                    ),
                )
            )
        )
    )
);
