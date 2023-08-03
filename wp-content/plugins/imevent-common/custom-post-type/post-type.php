<?php

//////////////////////////////////////////////////////////////////////////////////////////////////////
// Create Custom Post Type ///////////////////////////////////////////////////////////////////////////

// Slideshow //////////////////////////////////////////
add_action( 'init', 'slideshow_init',0 );
function slideshow_init() { 
    
    $labels = array(
        'name'               => __( 'Slideshows', 'post type general name', 'imevent' ),
        'singular_name'      => __( 'Slide', 'post type singular name', 'imevent' ),
        'menu_name'          => __( 'Slideshows', 'admin menu', 'imevent' ),
        'name_admin_bar'     => __( 'Slide', 'add new on admin bar', 'imevent' ),
        'add_new'            => __( 'Add New slide', 'Slide', 'imevent' ),
        'add_new_item'       => __( 'Add New Slide', 'imevent' ),
        'new_item'           => __( 'New Slide', 'imevent' ),
        'edit_item'          => __( 'Edit Slide', 'imevent' ),
        'view_item'          => __( 'View Slide', 'imevent' ),
        'all_items'          => __( 'All Slides', 'imevent' ),
        'search_items'       => __( 'Search Slides', 'imevent' ),
        'parent_item_colon'  => __( 'Parent Slides:', 'imevent' ),
        'not_found'          => __( 'No Slides found.', 'imevent' ),
        'not_found_in_trash' => __( 'No Slides found in Trash.', 'imevent' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'menu_icon'          => 'dashicons-format-gallery',
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'slideshow' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail','comments'),
        'taxonomies'          => array('slidegroup'),
    );

    register_post_type( 'slideshow', $args );
}


add_action( 'init', 'create_slidegroup_taxonomies', 0 );
// create slidegroup taxonomy
function create_slidegroup_taxonomies() {
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => __( 'Group', 'taxonomy general name' , 'imevent'),
        'singular_name'     => __( 'Group', 'taxonomy singular name' , 'imevent'),
        'search_items'      => __( 'Search Group', 'imevent'),
        'all_items'         => __( 'All Group', 'imevent' ),
        'parent_item'       => __( 'Parent Group', 'imevent' ),
        'parent_item_colon' => __( 'Parent Group:' , 'imevent'),
        'edit_item'         => __( 'Edit Group' , 'imevent'),
        'update_item'       => __( 'Update Group' , 'imevent'),
        'add_new_item'      => __( 'Add New Group' , 'imevent'),
        'new_item_name'     => __( 'New Group Name' , 'imevent'),
        'menu_name'         => __( 'Group' , 'imevent'),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'slideshow' )
    );

    register_taxonomy( 'slidegroup', array('slideshow'), $args );
}



// Schedule /////////////////////////////////////////////////////////
add_action( 'init', 'schedule_post_type', 0 );
function schedule_post_type() {

    $labels = array(
        'name'                => __( 'Schedule', 'Post Type General Name', 'imevent' ),
        'singular_name'       => __( 'Schedule', 'Post Type Singular Name', 'imevent' ),
        'menu_name'           => __( 'Schedule', 'imevent' ),
        'parent_item_colon'   => __( 'Parent Schedule:', 'imevent' ),
        'all_items'           => __( 'All Schedules', 'imevent' ),
        'view_item'           => __( 'View Schedule', 'imevent' ),
        'add_new_item'        => __( 'Add New Schedule', 'imevent' ),
        'add_new'             => __( 'Add New Schedule', 'imevent' ),
        'edit_item'           => __( 'Edit Schedule', 'imevent' ),
        'update_item'         => __( 'Update Schedule', 'imevent' ),
        'search_items'        => __( 'Search Schedules', 'imevent' ),
        'not_found'           => __( 'No Schedules found', 'imevent' ),
        'not_found_in_trash'  => __( 'No Schedules found in Trash', 'imevent' ),
    );
    $args = array(
        'label'               => __( 'schedule', 'imevent' ),
        'description'         => __( 'Schedule information pages', 'imevent' ),
        'labels'              => $labels,
        'supports'            => array( 'thumbnail', 'editor', 'title', 'comments',  'excerpt'),
        'taxonomies'          => array('categories'),
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'menu_icon'          => 'dashicons-calendar',
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => null,        
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );
    register_post_type( 'schedule', $args );
}

add_action( 'init', 'create_schedule_taxonomies', 0 );
// create categories taxonomy
function create_schedule_taxonomies() {
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => __( 'Categories', 'taxonomy general name' , 'imevent'),
        'singular_name'     => __( 'Categories', 'taxonomy singular name' , 'imevent'),
        'search_items'      => __( 'Search Categories', 'imevent'),
        'all_items'         => __( 'All Categories', 'imevent' ),
        'parent_item'       => __( 'Parent Category', 'imevent' ),
        'parent_item_colon' => __( 'Parent Category:' , 'imevent'),
        'edit_item'         => __( 'Edit Category' , 'imevent'),
        'update_item'       => __( 'Update Category' , 'imevent'),
        'add_new_item'      => __( 'Add New Category' , 'imevent'),
        'new_item_name'     => __( 'New Category Name' , 'imevent'),
        'menu_name'         => __( 'Categories' , 'imevent'),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'schedule' )        
    );

    register_taxonomy( 'categories', array('schedule'), $args );
}


// Speaker /////////////////////////////////////////////////////////
add_action( 'init', 'speaker_post_type', 0 );
function speaker_post_type() {

    $labels = array(
        'name'                => __( 'Speaker', 'Post Type General Name', 'imevent' ),
        'singular_name'       => __( 'Speaker', 'Post Type Singular Name', 'imevent' ),
        'menu_name'           => __( 'Speaker', 'imevent' ),
        'parent_item_colon'   => __( 'Parent Speaker:', 'imevent' ),
        'all_items'           => __( 'All Speakers', 'imevent' ),
        'view_item'           => __( 'View Speaker', 'imevent' ),
        'add_new_item'        => __( 'Add New Speaker', 'imevent' ),
        'add_new'             => __( 'Add New Speaker', 'imevent' ),
        'edit_item'           => __( 'Edit Speaker', 'imevent' ),
        'update_item'         => __( 'Update Speaker', 'imevent' ),
        'search_items'        => __( 'Search Speakers', 'imevent' ),
        'not_found'           => __( 'No Speakers found', 'imevent' ),
        'not_found_in_trash'  => __( 'No Speakers found in Trash', 'imevent' ),
    );
    $args = array(
        'label'               => __( 'speaker', 'imevent' ),
        'description'         => __( 'speaker information pages', 'imevent' ),
        'labels'              => $labels,
        'supports'            => array( 'thumbnail', 'editor', 'title', 'comments', 'excerpt'),
        'taxonomies'          => array('group'),
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'menu_icon'          => 'dashicons-calendar',
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => null,        
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );
    register_post_type( 'speaker', $args );
}

add_action( 'init', 'create_speaker_taxonomies', 0 );
// create groupspeaker taxonomy
function create_speaker_taxonomies() {
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => __( 'Group', 'taxonomy general name' , 'imevent'),
        'singular_name'     => __( 'Group', 'taxonomy singular name' , 'imevent'),
        'search_items'      => __( 'Search Group', 'imevent'),
        'all_items'         => __( 'All Group', 'imevent' ),
        'parent_item'       => __( 'Parent Group', 'imevent' ),
        'parent_item_colon' => __( 'Parent Group:' , 'imevent'),
        'edit_item'         => __( 'Edit Group' , 'imevent'),
        'update_item'       => __( 'Update Group' , 'imevent'),
        'add_new_item'      => __( 'Add New Group' , 'imevent'),
        'new_item_name'     => __( 'New Group Name' , 'imevent'),
        'menu_name'         => __( 'Group' , 'imevent'),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'speaker' )        
    );

    register_taxonomy( 'group', array('speaker'), $args );
}




// Faq //////////////////////////////////////////////////////////
add_action( 'init', 'faq_init' );
function faq_init() { 
    
    $labels = array(
        'name'               => __( 'Faq', 'post type general name', 'imevent' ),
        'singular_name'      => __( 'Faq', 'post type singular name', 'imevent' ),
        'menu_name'          => __( 'Faq', 'admin menu', 'imevent' ),
        'name_admin_bar'     => __( 'Faq', 'add new on admin bar', 'imevent' ),
        'add_new'            => __( 'Add New Faq', 'Speaker', 'imevent' ),
        'add_new_item'       => __( 'Add New Faq', 'imevent' ),
        'new_item'           => __( 'New Faq', 'imevent' ),
        'edit_item'          => __( 'Edit Faq', 'imevent' ),
        'view_item'          => __( 'View Faq', 'imevent' ),
        'all_items'          => __( 'All Faqs', 'imevent' ),
        'search_items'       => __( 'Search Faqs', 'imevent' ),
        'parent_item_colon'  => __( 'Parent Faqs:', 'imevent' ),
        'not_found'          => __( 'No Faq found.', 'imevent' ),
        'not_found_in_trash' => __( 'No Faq found in Trash.', 'imevent' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'menu_icon'          => 'dashicons-editor-help',
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'faq' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail','comments'),
        'taxonomies'          => array('faqgroup'),

    );

    register_post_type( 'faq', $args );
}


add_action( 'init', 'create_faq_taxonomies', 0 );
// create faqgroup taxonomy
function create_faq_taxonomies() {
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => __( 'Group', 'taxonomy general name' , 'imevent'),
        'singular_name'     => __( 'Group', 'taxonomy singular name' , 'imevent'),
        'search_items'      => __( 'Search Group', 'imevent'),
        'all_items'         => __( 'All Group', 'imevent' ),
        'parent_item'       => __( 'Parent Group', 'imevent' ),
        'parent_item_colon' => __( 'Parent Group:' , 'imevent'),
        'edit_item'         => __( 'Edit Group' , 'imevent'),
        'update_item'       => __( 'Update Group' , 'imevent'),
        'add_new_item'      => __( 'Add New Group' , 'imevent'),
        'new_item_name'     => __( 'New Group Name' , 'imevent'),
        'menu_name'         => __( 'Group' , 'imevent'),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'faq' )
    );

    register_taxonomy( 'faqgroup', array('faq'), $args );
}