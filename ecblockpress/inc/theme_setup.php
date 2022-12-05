<?php

/**
 * Theme setup.
 */
function ecblockpress_setup() {
  
	add_theme_support( 'menus' );

	add_theme_support( 'title-tag' );

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

    add_theme_support( 'custom-logo' );
	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'wp-block-styles' );

	add_theme_support( 'editor-styles' );
	
	// Removes all patterns that we haven't made
	remove_theme_support('core-block-patterns');

	
}

add_action( 'after_setup_theme', 'ecblockpress_setup' );

// Enables Carbon Field custom fields
add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
	require_once( get_template_directory() . '/vendor/autoload.php' );
    \Carbon_Fields\Carbon_Fields::boot();
}

// Enable SVG Support
function enable_svg_upload( $upload_mimes ) {
    $upload_mimes['svg'] = 'image/svg+xml';
    $upload_mimes['svgz'] = 'image/svg+xml';
    return $upload_mimes;
}
add_filter( 'upload_mimes', 'enable_svg_upload', 10, 1 );

//remove user persmissions
  add_action( 'admin_menu', 'members_remove_menu_pages' );
  function members_remove_menu_pages() {
	$user = wp_get_current_user();
	if ( in_array('editor', $user->roles) ) {
		remove_menu_page( 'tools.php' );  //tools           
		remove_menu_page( 'options-general.php' ); //settings    
		remove_menu_page( 'site-editor.php' ); 	// full site editing
	} 
  }

  
?>

