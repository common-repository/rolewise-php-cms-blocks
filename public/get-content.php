<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
add_shortcode( 'phpcmsblock', 'phpcmsblock_callback' );

function phpcmsblock_callback( $atts ) 
{
	global $custom_role;
	$block = get_post($atts['block_id']);

	$user_role_for_block = get_post_meta($atts['block_id'], 'user_role_for_block', true);

	if(empty($user_role_for_block))
		$user_role_for_block = array();

	$user = new WP_User( get_current_user_id() );

	if ( !empty( $user->roles ) && is_array( $user->roles ) ) {
	    foreach ( $user->roles as $role )
	         $custom_role = $role;
	}
	if(!empty($user_role_for_block)){
		if(in_array($custom_role, $user_role_for_block)){
			if($block)
			{
				return apply_filters('the_content', $block->post_content);
			}	
		}	
	}
	else{
		if($block)
		{
			return apply_filters('the_content', $block->post_content);
		}
	}
	
}
?>