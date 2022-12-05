<?php

use Carbon_Fields\Block;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields','social_group' );
function social_group() {
    Block::make( __( 'Social Links Group' ) )
        ->add_fields( array(
            Field::make( 'separator', 'crb_separator', __( 'Social Options' ) )
                ->set_help_text( 'Social icons/links from theme options. The icons will be displayed in the front end ONLY'),
        ) )
        ->set_description(( 'Use this block for adding in social icons and links from theme options' ) )
        ->set_category('ec-blocks', __('EC Custom Blocks'))
        ->set_keywords( [ __( 'block' ), __( 'social' ), __( 'links' ) ] )
        ->set_icon( 'share-alt' )    
        ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {    ?>
             <div class="social"> 
                <?php
            //get theme variables for social icons and links    
            $fields = carbon_get_theme_option('social_links');
            foreach ( $fields as $field ) {
                $fb_link = $field[ 'fb_link' ]; 
                $fb_icon = $field['fb_icon'];

                $tw_icon = $field['tw_icon'];
                $tw_link = $field['tw_link'];

                $yt_icon = $field[ 'yt_icon'];
                $yt_link = $field[ 'yt_link'];

                $ig_icon = $field[ 'ig_icon'];
                $ig_link = $field[ 'ig_link'];

                $other_icon = $field[ 'other_icon'];
                $other_link = $field[ 'other_link'];
                
                switch ( $field['_type'] ) {
                    case 'facebook':
                ?> 
             
                    <div class="social__item">
                        <a href="<?php echo($fb_link)?>">
                            <i class="fa-brands fa-<?php echo($fb_icon['value'])?>"></i>
                        </a>
                    </div>
                <?php
                break;
                case 'twitter': ?>
                    <div class="social__item">
                        <a href="<?php echo($tw_link)?>">
                            <i class="fa-brands fa-<?php echo($tw_icon['value'])?>"></i>
                        </a>
                    </div>
                    <?php
                break;
                case 'youtube':?>
                    <div class="social__item">
                        <a href="<?php echo($yt_link)?>">
                            <i class="fa-brands fa-<?php echo($yt_icon['value'])?>"></i>
                        </a>
                    </div>
                    <?php
                break;
                case 'instagram': ?>
                    <div class="social__item">
                        <a href="<?php echo($ig_link)?>">
                            <i class="fa-brands fa-<?php echo($ig_icon['value'])?>"></i>
                        </a>
                    </div>
                    <?php
                break;
                case 'other': ?>
                    <div class="social__item">
                        <a href="<?php echo($other_link)?>">
                            <i class="fa-brands fa-<?php echo($other_icon['value'])?>"></i>
                        </a>
                    </div>
                    <?php
                    break;
                }
                  }
            ?>
            </div>           
        <?php } );
}