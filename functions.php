<?php
	
	// Add RSS links to <head> section
	automatic_feed_links();
	
	// Load jQuery
	
	   wp_deregister_script('jquery');
	   wp_register_script('jquery', ("http://www.mattdrew.co.uk/wordpress/amiga-workbench/wp-content/themes/amiga-workbench/js/jquery-1.11.1.min.js"), false);
	   wp_enqueue_script('jquery');
	
	
	// Clean up the <head>
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');
    
    if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'Sidebar Widgets',
    		'id'   => 'sidebar-widgets',
    		'description'   => 'These are widgets for the sidebar.',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
    }
//MATT Add menu
function register_my_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_my_menu' );

//MATT Add menu
function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'extra-menu' => __( 'Extra Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );

//MATT Remove WP bar
add_filter( 'show_admin_bar', '__return_false' );

//MATT Amiga Clock
function theme_name_scripts() {
	wp_enqueue_script( 'amiga-clock', get_template_directory_uri() . '/js/clock.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );

?>