<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * 
 * Making the m3-portfolio plugin a required plugin  *
 * (instructions at http://tgmpluginactivation.com/) *
 * * * * * * * * * * * * * * * * * * * * * * * * * * */

// Include the TGM_Plugin_Activation class.
require_once dirname( __FILE__ ) . '/lib/class-tgm-plugin-activation.php';

// Using the hook.
add_action( 'tgmpa_register', 'm3_register_required_plugins' );

// Register the required plugins for this theme.
function m3_register_required_plugins() {

    // Array of plugin arrays. Required keys are name and slug.
    $plugins = array(
	
        array(
	    'name'     				=> 'm3 Portfolio',
	    'slug'     				=> 'm3-portfolio',
	    'required' 				=> true,
		'source'				=> 'https://maiamcguinness@bitbucket.org/maiamcguinness/m3-portfolio-plugin.git',
	    'force_activation' 		        => false,
	    'force_deactivation' 	        => false
	)
        
    );

    // Theme text domain, used for internationalising strings
    $theme_text_domain = 'm3studios';

    // Global config options
    $config = array(
	'domain'       		=> $theme_text_domain,
	'default_path' 		=> '',
	'parent_menu_slug' 	=> 'plugins.php',
	'parent_url_slug' 	=> 'plugins.php',
	'menu'         		=> 'install-required-plugins',
	'has_notices'      	=> true,
	'is_automatic'    	=> false,
	'strings'      		=> array(
	    'page_title'                        => __( 'Install Required Plugins', $theme_text_domain ),
	    'menu_title'                        => __( 'Required Plugins', $theme_text_domain ),
	    'installing'                        => __( 'Installing Plugin: %s', $theme_text_domain ),
	    'oops'                              => __( 'Something went wrong with the plugin API.', $theme_text_domain ),
	    'notice_can_install_required'       => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ),
	    'notice_can_install_recommended'	=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ),
	    'notice_cannot_install'  		=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ),
	    'notice_can_activate_required'      => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ),
	    'notice_can_activate_recommended'   => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ),
	    'notice_cannot_activate' 		=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ),
	    'notice_ask_to_update' 		=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ),
	    'notice_cannot_update' 	        => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ),
	    'install_link' 		        => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
	    'activate_link' 		        => _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
	    'return'                           	=> __( 'Return to Required Plugins Installer', $theme_text_domain ),
	    'plugin_activated'                 	=> __( 'Plugin activated successfully.', $theme_text_domain ),
	    'complete' 				=> __( 'All plugins installed and activated successfully. %s', $theme_text_domain ),
	    'nag_type'				=> 'updated'
	)
    );
    
    tgmpa( $plugins, $config );

}


/* * * * * * * * * * * * * * * * * * * * * * * *
 * Registering the Portfolio-specific sidebar  *
 * * * * * * * * * * * * * * * * * * * * * * * */

if ( function_exists('register_sidebar') ) { register_sidebar( array('id'=>'sidebar-portfolio', 'name'=>'Portfolio Sidebar', 'description'=>'Portfolio sidebar')); }
?>