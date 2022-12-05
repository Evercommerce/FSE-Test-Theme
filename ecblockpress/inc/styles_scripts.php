<?php 

/**
 * Enqueue theme assets.
 */
function ecblockpress_enqueue_scripts() {
	$theme = wp_get_theme();

	wp_enqueue_style( 'ecblockpress', ecblockpress_asset( 'assets/css/main.css' ), array(), $theme->get( 'Version' ) );
	wp_register_style('Font_Awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css' );
	wp_enqueue_style('Font_Awesome');
	wp_enqueue_script( 'ecblockpress', ecblockpress_asset( 'js/app.js' ), array('jquery'), $theme->get( 'Version' ), true );
	
}

add_action( 'wp_enqueue_scripts', 'ecblockpress_enqueue_scripts' );

/**
 * Get asset path.
 *
 * @param string  $path Path to asset.
 *
 * @return string
 */
function ecblockpress_asset( $path ) {
	if ( wp_get_environment_type() === 'production' ) {
		return get_stylesheet_directory_uri() . '/' . $path;
	}

	return add_query_arg( 'time', time(),  get_stylesheet_directory_uri() . '/' . $path );
}

?>