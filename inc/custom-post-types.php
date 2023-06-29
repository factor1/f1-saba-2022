<?php
  /*-----------------------------------------------------------------------------
    Register Custom Post Types
  -----------------------------------------------------------------------------*/

// Register Service Gallery Custom Post Type
function service_gallery() {

	$labels = array(
		'name'                  => _x( 'Service Galleries', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Service Gallery', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Service Galleries', 'text_domain' ),
		'name_admin_bar'        => __( 'Service Galleries', 'text_domain' ),
		'archives'              => __( 'Service Gallery Archives', 'text_domain' ),
		'attributes'            => __( 'Service Gallery Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Service Gallery:', 'text_domain' ),
		'all_items'             => __( 'All Service Galleries', 'text_domain' ),
		'add_new_item'          => __( 'Add New Service Gallery', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Service Gallery', 'text_domain' ),
		'edit_item'             => __( 'Edit Service Gallery', 'text_domain' ),
		'update_item'           => __( 'Update Service Gallery', 'text_domain' ),
		'view_item'             => __( 'View Service Gallery', 'text_domain' ),
		'view_items'            => __( 'View Service Galleries', 'text_domain' ),
		'search_items'          => __( 'Search Service Gallery', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into Service Gallery', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Service Gallery', 'text_domain' ),
		'items_list'            => __( 'Service Galleries list', 'text_domain' ),
		'items_list_navigation' => __( 'Service Galleries list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter Service Galleries list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Service Gallery', 'text_domain' ),
		'description'           => __( 'Service Galleries', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'show_in_rest'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-groups',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => 'galleries',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
    'rewrite' => array('slug' => 'gallery'),
	);
	register_post_type( 'service_gallery', $args );

}
add_action( 'init', 'service_gallery', 0 );

// Register Service Category Custom Taxonomy
function service_category() {

	$labels = array(
		'name'                       => _x( 'Service Categories', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Service Category', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Service Categories', 'text_domain' ),
		'all_items'                  => __( 'All Service Categories', 'text_domain' ),
		'parent_item'                => __( 'Parent Service Category', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Service Category:', 'text_domain' ),
		'new_item_name'              => __( 'New Service Category Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Service Category', 'text_domain' ),
		'edit_item'                  => __( 'Edit Service Category', 'text_domain' ),
		'update_item'                => __( 'Update Service Category', 'text_domain' ),
		'view_item'                  => __( 'View Service Category', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate Service Categories with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove Service Categories', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Service Categories', 'text_domain' ),
		'search_items'               => __( 'Search Service Categories', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No Service Categories', 'text_domain' ),
		'items_list'                 => __( 'Service Categories list', 'text_domain' ),
		'items_list_navigation'      => __( 'Service Categories list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite' => array('slug' => 'service-gallery'),
	);
	register_taxonomy( 'service_category', array( 'service_gallery' ), $args );

}
add_action( 'init', 'service_category', 0 );