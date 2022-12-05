<?php
/**
 * Blue Banner Pattern
 */

return array(
	'title'      => __( 'Blue Banner', 'ecblockpress' ),
	'categories' => array( 'general' ),
    'blockTypes' => array( 'core/template-part/header' ),
	'content'    => '<!-- wp:group {"backgroundColor":"primary","layout":{"type":"constrained"}} -->
    <div class="wp-block-group has-primary-background-color has-background"><!-- wp:paragraph {"align":"center","textColor":"white","fontSize":"medium"} -->
    <p class="has-text-align-center has-white-color has-text-color has-medium-font-size"><strong>Already Using DrChrono? Try Telehealth For Free</strong></p>
    <!-- /wp:paragraph --></div>
    <!-- /wp:group -->',
);
