<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

add_action( 'add_meta_boxes', 'add_php_cms_blocks_metaboxes' );
function add_php_cms_blocks_metaboxes() {
	add_meta_box('wpt_php_cms_blocks_user_role', 'Select User Role', 'wpt_php_cms_blocks_user_role', 'php_cms_block', 'side', 'default');
}

function wpt_php_cms_blocks_user_role() {
	global $post, $wp_roles;
	// Noncename needed to verify where the data originated
	echo '<input type="hidden" name="php_cms_blocks_meta_noncename" id="php_cms_blocks_meta_noncename" value="' . 
	wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
	
	// Get the user_role_for_block data if its already been entered
	
	$user_role_for_block = get_post_meta($post->ID, 'user_role_for_block', true);
	if(empty($user_role_for_block))
		$user_role_for_block = array();

	
    $roles = $wp_roles->get_names();
          foreach($roles as $key => $role) { 
      	if(in_array($key, $user_role_for_block))
      	echo '<div><label><input type="checkbox" checked name="user_role_for_block[]" value="' . $key  . '" class="widefat" />'.$role.'</label></div>';
      	else
      	echo '<div><label><input type="checkbox" name="user_role_for_block[]" value="' . $key  . '" class="widefat" />'.$role.'</label></div>';
      }
}

// Save the Metabox Data
function wpt_save_php_cms_block_meta($post_id, $post) {
	if ( !wp_verify_nonce( $_POST['php_cms_blocks_meta_noncename'], plugin_basename(__FILE__) )) {
	return $post->ID;
	}

	// Is the user allowed to edit the post or page?
	if ( !current_user_can( 'edit_post', $post->ID ))
		return $post->ID;

	$events_meta['user_role_for_block'] = $value = $_POST['user_role_for_block'];
	$key = 'user_role_for_block';
	// Add values of $events_meta as custom fields
	
	if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
			update_post_meta($post->ID, $key, $value);
		} else { // If the custom field doesn't have a value
			add_post_meta($post->ID, $key, $value);
		}
		if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
}

add_action('save_post', 'wpt_save_php_cms_block_meta', 1, 2); // save the custom fields
?>