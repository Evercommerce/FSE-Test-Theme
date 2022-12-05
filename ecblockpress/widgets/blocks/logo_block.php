<?php

use Carbon_Fields\Block;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields','logo_block' );
function logo_block() {
    Block::make( __( 'Logo Block' ) )
        ->add_fields( array(
            Field::make( 'separator', 'crb_separator', __( 'Logo Options' ) )
                ->set_help_text( 'The logos will be displayed in the front end ONLY'),
            Field::make( 'radio', 'show_logos', 'Which logo to display?' )
                ->add_options( array(
                    'white' => 'White',
                    'dark' => 'Dark',
            ) ),
    ) )
        ->set_description(( 'Use this block for adding in either a dark logo or white logo from theme options' ) )
        ->set_category('ec-blocks', __('EC Custom Blocks'))
        ->set_keywords( [ __( 'block' ), __( 'logo' ), __( 'site-logo' ) ] )
        ->set_icon( 'cover-image' )    
        ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {   
            $show_logos = $fields['show_logos'];
               
            $dark_logo = carbon_get_theme_option('logo_dark');
            $light_logo = carbon_get_theme_option('logo_white');

            if($show_logos == 'dark'){?>
            <div class="logos">
            <a href="/">
                <?php echo wp_get_attachment_image( $dark_logo, 'full' ) ?>
            </a>
            </div>
           <?php
            }

            if($show_logos == 'white'){?>
                <div class="logos">
                    <a href="/">
                    <?php echo wp_get_attachment_image( $light_logo, 'full' ) ?>
                    </a>
                </div>
               <?php
                }
     } );
}