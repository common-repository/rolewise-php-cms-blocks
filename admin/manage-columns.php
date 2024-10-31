<?php 

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function edit_php_cms_block_columns( $columns ) {
	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'Block' ),
		'shortcode' => __( 'Shortcode' ),
		'date' => __( 'Date' )
	);

	return $columns;
}


function manage_php_cms_block_columns( $column, $post_id ) {
	global $post;

	switch( $column ) {
		case 'shortcode' :
			echo '[phpcmsblock block_id="'.$post_id.'"]';
			break;
			
		default :
			break;
	}
}

?>