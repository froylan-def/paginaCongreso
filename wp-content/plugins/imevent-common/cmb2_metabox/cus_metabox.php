<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'yourprefix_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */



add_action( 'cmb2_init', 'ova_imevent_metaboxes_default' );
function ova_imevent_metaboxes_default() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_cmb_';

    
    
    /* Page Settings ***************************************************************************/
    /* ************************************************************************************/
    $post_settings = new_cmb2_box( array(
        'id'            => 'Post_Options',
        'title'         => esc_html__( 'Post Options', 'imevent' ),
        'object_types'  => array( 'post'), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
        
    ) );

        // Display title of page
        $post_settings->add_field( array(
            'name' => __('oEmbed Post format media', 'imevent' ),
             'desc' => __('Enter a audio, youtube, twitter, or instagram URL. Supports services listed at <a href="http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds</a>.', 'imevent' ),
            'id'   => $prefix . 'embed_media',
            'type' => 'oembed',
            
        ) );


    /* Schedule Settings ***************************************************************************/
    /* ************************************************************************************/
    $schedule_settings = new_cmb2_box( array(
        'id'            => 'schedule_fields',
        'title'         => esc_html__( 'Schedule Field', 'imevent' ),
        'object_types'  => array( 'schedule'), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
        
    ) );    

        // Display title of page
        $schedule_settings->add_field( array(
           'name' => __('Order', 'imevent'),
            'desc' => __('To display at frontend. Insert number 1,2,3,4,5...', 'imevent'),
            'id'   => $prefix . 'schedule_order_by',
            'type' => 'text',
            'default' => '1'
            
        ) );

        $schedule_settings->add_field( array(
            'name' => __('Time Text', 'imevent'),
            'desc' => __('You can insert time here: 08:00 - 08:45', 'imevent'),
            'id'   => $prefix . 'schedule_timetext',
            'type' => 'text',
        ) );

        $schedule_settings->add_field( array(
            'name' => __('Author', 'imevent'),
            'desc' => __('Author will speak: John Doe', 'imevent'),
            'id'   => $prefix . 'schedule_author',
            'type' => 'text',
        ) );

        $schedule_settings->add_field( array(
             'name' => __('Author Job', 'imevent'),
            'desc' => __('Job of author: CEO at Crown.io', 'imevent'),
            'id'   => $prefix . 'schedule_author_job',
            'type' => 'text',
        ) );

        $schedule_settings->add_field( array(
              'name' => __('Link thumbnail of speaker', 'imevent'),
            'desc' => __('Insert link for speaker', 'imevent'),
            'id'   => $prefix . 'schedule_link_speaker',
            'type' => 'text',
        ) );

        $schedule_settings->add_field( array(
            'name' => __('Mail Adress', 'imevent'),
            'desc' => __('Mail Adress', 'imevent'),
            'id'   => $prefix . 'schedule_mail_address',
            'type' => 'text',       
        ) );

        $schedule_settings->add_field( array(
            'name' => __('Facebook Adress', 'imevent'),
            'desc' => __('Facebook Adress', 'imevent'),
            'id'   => $prefix . 'schedule_facebook_address',
            'type' => 'text',   
        ) );

        $schedule_settings->add_field( array(
             'name' => __('Twitter Adress', 'imevent'),
            'desc' => __('Twitter Adress', 'imevent'),
            'id'   => $prefix . 'schedule_twitter_address',
            'type' => 'text',   
        ) );

        $schedule_settings->add_field( array(
            'name' => __('Linkedin Adress', 'imevent'),
            'desc' => __('Linkedin Adress', 'imevent'),
            'id'   => $prefix . 'schedule_linkedin_address',
            'type' => 'text',               
        ) );
        $schedule_settings->add_field( array(
            'name' => __('Pinterest Adress', 'imevent'),
            'desc' => __('Pinterest Adress', 'imevent'),
            'id'   => $prefix . 'schedule_pinterest_address',
            'type' => 'text'                
       ) );
        $schedule_settings->add_field( array(
            'name' => __('Google Plus Adress', 'imevent'),
            'desc' => __('Google Plus Adress', 'imevent'),
            'id'   => $prefix . 'schedule_googleplus_address',
            'type' => 'text'                
        ) );       
        $schedule_settings->add_field( array(
            'name' => __('Tumblr Adress', 'imevent'),
            'desc' => __('Tumblr Adress', 'imevent'),
            'id'   => $prefix . 'schedule_tumblr_address',
            'type' => 'text'                
        ) );
        $schedule_settings->add_field( array(
            'name' => __('Instagram Adress', 'imevent'),
            'desc' => __('Instagram Adress', 'imevent'),
            'id'   => $prefix . 'schedule_instagram_address',
            'type' => 'text'                
       ) );
        $schedule_settings->add_field( array(
            'name' => __('VK Adress', 'imevent'),
            'desc' => __('VK Adress', 'imevent'),
            'id'   => $prefix . 'schedule_vk_address',
            'type' => 'text'                
        ) );
        $schedule_settings->add_field( array(
            'name' => __('Flickr Adress', 'imevent'),
            'desc' => __('Flickr Adress', 'imevent'),
            'id'   => $prefix . 'schedule_flickr_address',
            'type' => 'text'                
        ) );
        $schedule_settings->add_field( array(
            'name' => __('MySpace Adress', 'imevent'),
            'desc' => __('MySpace Adress', 'imevent'),
            'id'   => $prefix . 'schedule_mySpace_address',
            'type' => 'text'                
        ) );
        $schedule_settings->add_field( array(
            'name' => __('Youtube Adress', 'imevent'),
            'desc' => __('Youtube Adress', 'imevent'),
            'id'   => $prefix . 'schedule_youtube_address',
            'type' => 'text'                
        ) );


     /* FAQ Settings ***************************************************************************/
    /* ************************************************************************************/
    $faq_settings = new_cmb2_box( array(
        'id'            => 'faq_fields',
        'title'         => esc_html__( 'Faq Field', 'imevent' ),
        'object_types'  => array( 'faq'), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
        
    ) );        

        $faq_settings->add_field( array(
            'name' => __('Order', 'imevent'),
            'desc' => __('To display at frontend. Insert number 1,2,3,4,5...', 'imevent'),
            'id'   => $prefix . 'faq_order_by',
            'type' => 'text',
            'default' => '1'
        ) );



     /* Speaker Settings ***************************************************************************/
    /* ************************************************************************************/
    $speaker_settings = new_cmb2_box( array(
        'id'            => 'speaker_fields',
        'title'         => esc_html__( 'Speaker Field', 'imevent' ),
        'object_types'  => array( 'speaker'), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
        
    ) );          

        $speaker_settings->add_field( array(
            'name' => __('Order', 'imevent'),
            'desc' => __('To display at frontend. Insert number 1,2,3,4,5...', 'imevent'),
            'id'   => $prefix . 'speaker_order_by',
            'type' => 'text',
            'default' => '1'
        ) );
        $speaker_settings->add_field( array(
            'name' => __('Job', 'imevent'),
            'desc' => __('Job', 'imevent'),
            'id'   => $prefix . 'speaker_job',
            'type' => 'text',               
        ) );
        $speaker_settings->add_field( array(
            'name' => __('Mail Adress', 'imevent'),
            'desc' => __('Mail Adress', 'imevent'),
            'id'   => $prefix . 'speaker_mail_address',
            'type' => 'text',               
        ) );
        $speaker_settings->add_field( array(
            'name' => __('Facebook Adress', 'imevent'),
            'desc' => __('Facebook Adress', 'imevent'),
            'id'   => $prefix . 'speaker_facebook_address',
            'type' => 'text',               
        ) );
        $speaker_settings->add_field( array(
            'name' => __('Twitter Adress', 'imevent'),
            'desc' => __('Twitter Adress', 'imevent'),
            'id'   => $prefix . 'speaker_twitter_address',
            'type' => 'text',               
        ) );
        $speaker_settings->add_field( array(
            'name' => __('Linkedin Adress', 'imevent'),
            'desc' => __('Linkedin Adress', 'imevent'),
            'id'   => $prefix . 'speaker_linkedin_address',
            'type' => 'text',               
        ) );
        $speaker_settings->add_field( array(
            'name' => __('Pinterest Adress', 'imevent'),
            'desc' => __('Pinterest Adress', 'imevent'),
            'id'   => $prefix . 'speaker_pinterest_address',
            'type' => 'text'                
        ) );
        $speaker_settings->add_field( array(
            'name' => __('Google Plus Adress', 'imevent'),
            'desc' => __('Google Plus Adress', 'imevent'),
            'id'   => $prefix . 'speaker_googleplus_address',
            'type' => 'text'                
        ) );           
        $speaker_settings->add_field( array(
            'name' => __('Tumblr Adress', 'imevent'),
            'desc' => __('Tumblr Adress', 'imevent'),
            'id'   => $prefix . 'speaker_tumblr_address',
            'type' => 'text'                
        ) );
        $speaker_settings->add_field( array(
            'name' => __('Instagram Adress', 'imevent'),
            'desc' => __('Instagram Adress', 'imevent'),
            'id'   => $prefix . 'speaker_instagram_address',
            'type' => 'text'                
        ) );
        $speaker_settings->add_field( array(
            'name' => __('VK Adress', 'imevent'),
            'desc' => __('VK Adress', 'imevent'),
            'id'   => $prefix . 'speaker_vk_address',
            'type' => 'text'                
        ) );
        $speaker_settings->add_field( array(
            'name' => __('Flickr Adress', 'imevent'),
            'desc' => __('Flickr Adress', 'imevent'),
            'id'   => $prefix . 'speaker_flickr_address',
            'type' => 'text'                
        ) );
        $speaker_settings->add_field( array(
            'name' => __('MySpace Adress', 'imevent'),
            'desc' => __('MySpace Adress', 'imevent'),
            'id'   => $prefix . 'speaker_mySpace_address',
            'type' => 'text'                
        ) );
        $speaker_settings->add_field( array(
            'name' => __('Youtube Adress', 'imevent'),
            'desc' => __('Youtube Adress', 'imevent'),
            'id'   => $prefix . 'speaker_youtube_address',
            'type' => 'text'                
        ) );


    /* General Settings ***************************************************************************/
    /* ************************************************************************************/
    $general_settings = new_cmb2_box( array(
        'id'            => 'menu_display_page',
        'title'         => esc_html__( 'General Settings', 'imevent' ),
        'object_types'      => array( 'page', 'post','schedule', 'speaker'), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
        
    ) );          

        $general_settings->add_field( array(
            'name' => __('Header Style', 'imevent'),
            'id'   => $prefix . 'header_style',
            'type' => 'select',
            'options' => array(
                "fixed h_relative" => "Relative",
                "fixed" => "Fixed"
            ),
            'default'   => 'h_relative'
        ) );

        $general_settings->add_field( array(
            'name' => __('Choose Menu', 'imevent'),
            'id'   => $prefix . 'menu_display',
            'type' => 'select',
            'options' => array(
                "primary" => "Primary",
                "one_page" => "One page"
            ),
            'default'   => 'primary',
            'description' => __('One Page menu always use for home page (lading page)', 'imevent')
        ) );
        $general_settings->add_field( array(
            'name' => __('Footer Code', 'imevent'),
            'id'   => $prefix . 'footer_global',
            'type' => 'select',
            'options' => array(
                "yes" => "Yes",
                "no" => "no"
            ),
            'default'   => 'yes',
            'description' => __('Use code in Theme options >> Footer settings', 'imevent')
        ) );
        $general_settings->add_field( array(
            'name' => __('Show sidebar', 'imevent'),
            'id'   => $prefix . 'show_sidebar',
            'type' => 'select',
            'options' => array(
                "yes" => __("Yes",'imevent'),
                "no" => __("No",'imevent')
            ),
            'default'   => 'yes'
        ) );
        $general_settings->add_field( array(
            'name' => __('Show title', 'imevent'),
            'id'   => $prefix . 'show_title',
            'type' => 'select',
            'options' => array(
                "yes" => __("Yes",'imevent'),
                "no" => __("No",'imevent')
            ),
            'default'   => 'yes'
        ) );
        $general_settings->add_field( array(
            'name' => __('Select Light/Dark version', 'imevent'),
            'id'   => $prefix . 'bg_version',
            'type' => 'select',
            'options' => array(
                "global" => __("Global",'imevent'),
                "body-light" => __("Light",'imevent'),
                "body-dark" => __("Dark",'imevent')
            ),
            'default'   => 'global',
            'description' => __('Global: Use in Theme Options >> Style Settings<br/> Dark/Light: will override value in Global','imevent')
        ) );
        $general_settings->add_field( array(
            'name' => __('Audio Background', 'imevent'),
            'id'   => $prefix . 'audio_background',
            'type' => 'select',
            'options' => array(
                "none" =>__ ("None",'imevent'),
                "auto_play" => __("Auto Play",'imevent'),
                "manual_play" => __("Manual Play",'imevent')
            ),
            'default'   => 'none'
        ) );
       $general_settings->add_field( array(
            'name' => __('Path audio background: *.mp3', 'imevent'),
            'id'   => $prefix . 'audio_path',
            'description'   => __('Insert path of audio', 'imevent'),
            'type' => 'text',
            'default'   => 'http://demo.ovatheme.com/imevent/intro/dance-background.mp3'
        ) );
        $general_settings->add_field( array(
            'name' => __('Animate for elements', 'imevent'),
            'id'   => $prefix . 'ova_animate',
            'type' => 'select',
            'options' => array(
                'global' => "Global",
                'ova_animate'=>'Yes',
                'no_ova_animate'=>'No'
            ),
            'default'   => 'global',
            'description' => __('Choose Global will use value in Theme options >> Style settings >> Display Animate for element', 'imevent')
        ) );


    /* SEO Settings ***************************************************************************/
    /* ************************************************************************************/
    $seo_settings = new_cmb2_box( array(
        'id'            => 'seo_fields',
        'title'         => esc_html__( 'SEO Fields', 'imevent' ),
        'object_types'      => array( 'page', 'post','schedule', 'speaker'), // Post type
        'priority'      => 'high',
        'show_names'    => true,
        
    ) );        
    
        $seo_settings->add_field( array(
            'name' => __('SEO Title', 'imevent'),
            'desc' => __('Title for SEO (optional)', 'imevent'),
            'id'   => $prefix . 'seo_title',
            'type' => 'text',
        ) );
        $seo_settings->add_field( array(
            'name' => __('SEO Keywords', 'imevent'),
            'desc' => __('SEO keywords (optional)', 'imevent'),
            'id'   => $prefix . 'seo_keywords',
            'type' => 'text',
        ) );
       $seo_settings->add_field( array(
            'name' => __('SEO Description', 'imevent'),
            'desc' => __('SEO description (optional)', 'imevent'),
            'id'   => $prefix . 'seo_description',
            'type' => 'textarea',
        ) );


     /* Slideshow Settings ***************************************************************************/
    /* ************************************************************************************/
    $slider_settings = new_cmb2_box( array(
        'id'            => 'slideshow_fields',
        'title'         => esc_html__( 'Slideshow Field', 'imevent' ),
        'object_types'      => array( 'slideshow'), // Post type
        'priority'      => 'high',
        'show_names'    => true,
        
    ) );

        $slider_settings->add_field( array(
            'name' => __('Order', 'imevent'),
            'desc' => __('To display at frontend. Insert number 1,2,3,4,5...', 'imevent'),
            'id'   => $prefix . 'slideshow_order',
            'type' => 'text',
            'default' => '1'
        ) );
       $slider_settings->add_field( array(
            'name' => __('Template', 'imevent'),
            'desc' => __('Select a template to display for this slide', 'imevent'),
            'id'   => $prefix . 'template',
            'type' => 'select',
            'options' => array(
            'slide1' => __( 'Template 1: CountDown style', 'imevent' ),
            'slide2'   => __( 'Template 2: Display button: register and watch video', 'imevent' ),
            'slide3'   => __( 'Template 3: Register Form style', 'imevent' ),
            'slide4'   => __( 'Template 4: Display button youtube', 'imevent' ),
              ),
        'default' => 'slide1',
        ) );
       
        $slider_settings->add_field( array(
            'name' => __('Title 1 <br/>For 4 templates', 'imevent'),
            'desc' => __('For example: January 17-19,2014. <br/>', 'imevent'),
            'id'   => $prefix . 'title1',
            'type' => 'text',
        ) );
        $slider_settings->add_field( array(
            'name' => __('Title 2<br/>For 4 templates', 'imevent'),
            'desc' => __('For example: PHP Conference in Istanbul.', 'imevent'),
            'id'   => $prefix . 'title2',
            'type' => 'text',
        ) );

        $slider_settings->add_field( array(
            'name' => __('End Date Countdown.<br/>Only template 1', 'imevent'),
            'desc' => __('Choose end date for countdown.', 'imevent'),
            'id'   => $prefix . 'end_date',
            'type' => 'text_datetime_timestamp',
        ) );
       $slider_settings->add_field( array(
            'name' => __('Button Register Link<br/>Only template 1, 2', 'imevent'),
            'desc' => __('You can insert a link like #register or insert an extralink like http://themeforest.net/user/ovatheme/portfolio.', 'imevent'),
            'id'   => $prefix . 'register_link',
            'type' => 'text',
       ) );
       $slider_settings->add_field( array(
            'name' => __('Link youtube<br/>Only template 2, 4', 'imevent'),
            'desc' => __('For example: https://www.youtube.com/watch?v=6EefJVaKYIU&height=400&width=700<br/>', 'imevent'),
            'id'   => $prefix . 'youtube_link',
            'type' => 'text',
        ) );
        
        $slider_settings->add_field( array(
            'name' => __('Register button text<br/>Only template 1', 'imevent'),
            'desc' => __('For example: Register', 'imevent'),
            'id'   => $prefix . 'slideshow_tem1_register_button',
            'type' => 'text',
            'default'=> ''
        ) );
       $slider_settings->add_field( array(
            'name' => __('Video button text:<br/>Only template 2', 'imevent'),
            'desc' => __('For example: Watch Video', 'imevent'),
            'id'   => $prefix . 'slideshow_tem2_watchvideo_button',
            'type' => 'text',
            'default'=> ''
        ) );
        $slider_settings->add_field( array(
            'name' => __('REGISTER button text<br/> Only template 2', 'imevent'),
            'desc' => __('For example: Register', 'imevent'),
            'id'   => $prefix . 'slideshow_tem2_register_button',
            'type' => 'text',
            'default'=> ''
        ) );   
   
}

