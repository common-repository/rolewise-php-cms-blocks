<?php 

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
// Register Custom Post Type

	$labels = array(
		'name'                  => _x( 'PHP/CMS Blocks', 'Post Type General Name', 'opc_blocks' ),
		'singular_name'         => _x( 'PHP/CMS Block', 'Post Type Singular Name', 'opc_blocks' ),
		'menu_name'             => __( 'PHP CMS Blocks', 'opc_blocks' ),
		'name_admin_bar'        => __( 'PHP CMS Blocks', 'opc_blocks' ),
		'archives'              => __( 'Block Archives', 'opc_blocks' ),
		'attributes'            => __( 'Block Attributes', 'opc_blocks' ),
		'parent_item_colon'     => __( 'Parent Block:', 'opc_blocks' ),
		'all_items'             => __( 'All Blocks', 'opc_blocks' ),
		'add_new_item'          => __( 'Add New Block', 'opc_blocks' ),
		'add_new'               => __( 'Add New Block', 'opc_blocks' ),
		'new_item'              => __( 'New Block', 'opc_blocks' ),
		'edit_item'             => __( 'Edit Block', 'opc_blocks' ),
		'update_item'           => __( 'Update Block', 'opc_blocks' ),
		'view_item'             => __( 'View Block', 'opc_blocks' ),
		'view_items'            => __( 'View Blocks', 'opc_blocks' ),
		'search_items'          => __( 'Search Blocks', 'opc_blocks' ),
		'not_found'             => __( 'Block Not found', 'opc_blocks' ),
		'not_found_in_trash'    => __( 'Block Not found in Trash', 'opc_blocks' ),
		'featured_image'        => __( 'Featured Image', 'opc_blocks' ),
		'set_featured_image'    => __( 'Set featured image', 'opc_blocks' ),
		'remove_featured_image' => __( 'Remove featured image', 'opc_blocks' ),
		'use_featured_image'    => __( 'Use as featured image', 'opc_blocks' ),
		'insert_into_item'      => __( 'Insert into Block', 'opc_blocks' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Block', 'opc_blocks' ),
		'items_list'            => __( 'Blocks list', 'opc_blocks' ),
		'items_list_navigation' => __( 'Blocks list navigation', 'opc_blocks' ),
		'filter_items_list'     => __( 'Filter Blocks list', 'opc_blocks' ),
	);
	$args = array(
		'label'                 => __( 'PHP/CMS Block', 'opc_blocks' ),
		'description'           => __( 'PHP CMS block is used to create a block of content from admin side and used as a shortcode in anywhere across the site. In this block we can use the php code as well as assign the block to particular role.', 'opc_blocks' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', 'page-attributes', 'post-formats', ),
		'taxonomies'            => array( 'php_cms_category' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'menu_icon'   => 'dashicons-admin-page',
		'capability_type'       => 'page',
	);
	register_post_type( 'php_cms_block', $args );


?>