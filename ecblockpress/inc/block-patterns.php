<?php
/**
 * EC Blockpress: Block Patterns
 *
 */

/**
 * Registers block patterns and categories.
 *
 */
function ecblockpress_register_block_patterns() {
	$block_pattern_categories = array(
		'footer'   => array( 'label' => __( 'Footers', 'ecblockpress' ) ),
		'general'  => array( 'label' => __( 'General', 'ecblockpress' ) ),
		'header'   => array( 'label' => __( 'Headers', 'ecblockpress' ) ),
		'hero'     => array( 'label' => __( 'Heros', 'ecblockpress' ) ),
		'query'    => array( 'label' => __( 'Query', 'ecblockpress' ) ),
		'pages'    => array( 'label' => __( 'Pages', 'ecblockpress' ) ),
		'sections' => array( 'label' => __( 'Sections', 'ecblockpress' ) ),
	);

	/**
	 * Filters the theme block pattern categories.
	 *
	 */
	$block_pattern_categories = apply_filters( 'ecblockpress_block_pattern_categories', $block_pattern_categories );

	foreach ( $block_pattern_categories as $name => $properties ) {
		register_block_pattern_category( $name, $properties );
	}

	$block_patterns = array(
		'header/header-default',
		'header/header-white',
		'hero/home_hero',

		'footer/footer-default',

		'general/blue_banner',

		'pages/page-layout-image-and-text',
		'pages/page-layout-image-text-and-video',
		'pages/page-layout-two-columns',
		'pages/page-front',

		'query/query-default',

		'sections/img-left',
		'sections/img-right',

		'hidden/hidden-404',
		
	);
	/**
	 * Filters the theme block patterns.
	 *
	 * @since Blockpress 0.8.0
	 *
	 * @param $block_patterns array List of block patterns by name.
	 */
	$block_patterns = apply_filters( 'ecblockpress_block_patterns', $block_patterns );

	foreach ( $block_patterns as $block_pattern ) {
		register_block_pattern(
			'ecblockpress/' . $block_pattern,
			require get_theme_file_path( '/inc/patterns/' . $block_pattern . '.php' )
		);
	}
	
}
add_action( 'init', 'ecblockpress_register_block_patterns', 9 );
