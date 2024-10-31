<?php
/*
Plugin Name: RoleWise PHP CMS Blocks
Description: RoleWise PHP CMS block is used to create a block of content from admin side and used as a shortcode in anywhere across the site. In this block we can use the php code as well as assign the block to particular role.
Version: 1.0
Author: Momin Iqbal Ahmed
Author URI: http://www.overviewhere.com
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! function_exists('overview_php_cms_blocks') ) {
	function overview_php_cms_blocks(){
	
		include('includes/post-type.php');
		include('includes/post-taxonomy.php');
		include('includes/create-widget.php');

		include('admin/manage-columns.php');
		include('admin/role-meta-display.php');
		include('admin/php-filter.php');

		include('public/get-content.php');
	
	}

add_action( 'init', 'overview_php_cms_blocks', 0 );
}


// Register and load the widget
function overview_PHP_CMS_Block_load_widget() {
	register_widget( 'overiewPHPCMSBlockWidget' );
}
add_action( 'widgets_init', 'overview_PHP_CMS_Block_load_widget' );


add_filter( 'manage_posts_columns', 'edit_php_cms_block_columns', 10, 2 );
add_action( 'manage_posts_custom_column', 'manage_php_cms_block_columns', 10, 2 );

add_filter( 'the_content', 'overviewhere_php_cms_insert_php', 9 );
?>