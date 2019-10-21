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
    'icon'            => TOOLBOXSTARTER_DIR . 'modules/user_info.svg',
	'enabled'           => true,
	'settings'    => array(
		'timber_template'         => "{% include 'starter_user_info.twig' %}",
		'settings_form_name'	=> 'toolbox_starter_user_info_settings',
	),
) );


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
