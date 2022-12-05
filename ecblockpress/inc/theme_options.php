<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;


add_filter( 'carbon_fields_theme_options_container_admin_only_access', '__return_false' );

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );

function crb_attach_theme_options() {
// Default options page
$basic_options_container = Container::make( 'theme_options', __( 'Theme Options' ) )
    ->add_fields( array(
        Field::make( 'image', 'logo_dark', __( 'Dark Logo' ) )
            ->set_width( 50),
        Field::make( 'image', 'logo_white', __( 'White Logo' ) )
            ->set_width( 50)
    ) );

// Header Info 
Container::make( 'theme_options', __( 'Header Info' ) )
->set_page_parent( $basic_options_container ) // reference to a top level container
->add_fields( array(
    Field::make( 'text', 'header_phone', __( 'Contact Phone Number' ) ),
    Field::make( 'separator', 'login_separator', __( 'Login Link Info' ) ),
    Field::make( 'text', 'login_text', __( 'Login Text' ) )
        ->set_width(50),
    Field::make( 'text', 'login_link', __( 'Login Link' ) )
        ->set_width(50),
    Field::make( 'separator', 'demo_separator', __( 'Get Demo Button' ) ),
    Field::make( 'text', 'demo_text', __( 'Get Demo Button Text' ) )
        ->set_width(50),
    Field::make( 'text', 'demo_link', __( 'Get Demo Button Link' ) )
        ->set_width(50)
) );

// Add header/footer scripts (GA, Marketo, etc)
Container::make( 'theme_options', __( 'Theme Scripts' ) )
->set_page_parent( $basic_options_container ) // reference to a top level container
->add_tab( __( 'Header Area Tracking Scripts' ), array(   
        Field::make( 'complex', 'header_scripts', __('Add Header Scripts') )
        ->set_duplicate_groups_allowed( false )
        ->add_fields( 'google_analytics', array(
            Field::make( 'header_scripts', 'analytic_scripts', __( 'Google Analytics' ) )
                ->set_help_text('Add code for Google Analytics here. This will be automatically placed in the header')
        ) )
        ->add_fields( 'vwo', array(
            Field::make( 'header_scripts', 'vwo_script', __( 'VWO Script' ) )
                ->set_help_text('Add code for VWO Script here. This will be automatically placed in the header')
        ))
        ->add_fields( 'hubspot', array(
            Field::make( 'header_scripts', 'hubspot_script', __( 'Hubspot Script' ) )
                ->set_help_text('Add code for Hubspot form scripts here. This will be automatically placed in the header')
        ))
        ->add_fields( 'facebook', array(
            Field::make( 'header_scripts', 'facebook_script', __( 'Facebook Pixel Code' ) )
                ->set_help_text('Add code for Facebook Pixel code here. This will be automatically placed in the header')
        ))
))
->add_tab( __( 'Footer Area Tracking Scripts' ), array(   
    Field::make( 'complex', 'add_footer_scripts' )
    ->set_duplicate_groups_allowed( false )
    ->add_fields( 'marketo', array(
        Field::make( 'footer_scripts', 'marketo_scripts', __( 'Marketo' ) )
            ->set_help_text('Add code for Marketo form here. This will be automatically placed in the footer')
    ) )
));   

// Social links and icons
Container::make( 'theme_options', __( 'Social Links' ) )
    ->set_page_parent( $basic_options_container ) // reference to a top level container
    ->add_fields( array(
        Field::make( 'complex', 'social_links', __('Add Social Links') )
            ->set_duplicate_groups_allowed( false )
            ->set_layout( 'tabbed-horizontal')
            ->add_fields( 'facebook', array(
                Field::make( 'icon', 'fb_icon',  __( 'Facebook Icon' ))
                    ->add_fontawesome_options()
                    ->set_width(50),
                Field::make( 'text', 'fb_link', __( 'Facebook Link' ) )
                    ->set_width(50)
            ) )
            ->add_fields( 'twitter', array(
                Field::make( 'icon', 'tw_icon',  __( 'Twitter Icon' ))
                    ->add_fontawesome_options()
                    ->set_width(50),
                Field::make( 'text', 'tw_link', __( 'Twitter Link' ) )
                    ->set_width(50)
            ) )
            ->add_fields( 'youtube', array(
                Field::make( 'icon', 'yt_icon',  __( 'YouTube Icon' ))
                ->add_fontawesome_options()
                ->set_width(50),
                Field::make( 'text', 'yt_link', __( 'YouTube Link' ) )
                ->set_width(50)
            ) )
            ->add_fields( 'instagram', array(
                Field::make( 'icon', 'ig_icon',  __( 'Instagram Icon' ))
                ->add_fontawesome_options()
                ->set_width(50),
                Field::make( 'text', 'ig_link', __( 'IG Link' ) )
                ->set_width(50)
            ) )
            ->add_fields( 'other', array(
                Field::make( 'icon', 'other_icon',  __( 'Other Icon' ))
                ->add_fontawesome_options()
                ->set_width(50),
                Field::make( 'text', 'other_link', __( 'Other Link' ) )
                ->set_width(50)
            ) ),
    ) );

// Footer Info 
Container::make( 'theme_options', __( 'Footer Info' ) )
->set_page_parent( $basic_options_container ) // reference to a top level container
->add_fields( array(
    Field::make( 'text', 'add_line1', __( 'Address Line 1' ) )
        ->set_width(50),
    Field::make( 'text', 'add_line2', __( 'Address Line 2' ) )
        ->set_width(50),
    Field::make( 'text', 'city', __( 'City' ) )
        ->set_width(33),
    Field::make( 'text', 'state', __( 'State' ) )
        ->set_width(33),
    Field::make( 'text', 'zip', __( 'Zip Code' ) )
        ->set_width(33),
    Field::make( 'image', 'footer_logo', __( 'Footer Logo' ) )
) );



    }





?>