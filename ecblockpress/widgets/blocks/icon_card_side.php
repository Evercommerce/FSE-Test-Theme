<?php

use Carbon_Fields\Block;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields','side_card' );
function side_card() {
    Block::make( __( 'Side Icon Card' ) )
        ->add_fields( array(
            Field::make( 'image', 'side_image', 'Icon/Image' )
                ->set_help_text('This will also accept SVGs'),
            Field::make( 'text', 'side_heading',  'Title'  ),
            Field::make( 'text', 'side_button_url',  'Button Link' ), 
            Field::make( 'text', 'side_button_text',  'Button Text' ),
            Field::make( 'icon', 'side_button_icon',  __( 'Button Icon', 'crb' ))
                ->add_fontawesome_options()
        ) )
        ->set_description(( 'Use this block for adding in icon images to the side of text' ) )
        ->set_icon( 'align-pull-left' )
        ->set_category('ec-blocks', __('EC Custom Blocks'))
        ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {        
            ?> 
                <div class="section-block">
                    <div class="area">
                        <div class="flex flex-row items-center justify-start text-left inner-area align-center">
                            <div id="side-img">
                                <?php echo wp_get_attachment_image( $fields['side_image'], 'full' ); ?>
                            </div>
                            <div class="flex flex-col ml-3 side-content">
                            <h3 class="block mt-4 font-bold font-black value-heading font-openSans feature-header"><?php echo esc_html( $fields['side_heading'] ); ?></h3>
                            <a class="py-4 font-bold value-links text-primary font-helveticaNeue side-link-group" href="<?php echo esc_url( $fields['side_button_url']) ?>">
                                <?php echo esc_html( $fields['side_button_text']) ?>
                                <i class="fa-solid fa-<?php print_r( $fields['side_button_icon']['value']) ?>"></i>
                            </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
        } );
}