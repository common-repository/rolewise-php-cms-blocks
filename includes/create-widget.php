<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Widget 
class overiewPHPCMSBlockWidget extends WP_Widget 
{
	function __construct() 
	{
		parent::__construct(
		'overviewPHPCMSBlock', 
		__('PHP CMS Block', 'opc_blocks'), 
		array( 'description' => __( 'Load PHP CMS Block into the sidebar', 'opc_blocks' ), ) 
		);
	}

	public function widget( $args, $instance ) 
	{
		$title = apply_filters( 'widget_title', $instance['title'] );
		echo $args['before_widget'];
		if ( ! empty( $title ) )
		echo $args['before_title'] . $title . $args['after_title'];
		
		if($instance['phpcmsblockid'] != '')
		{
			$block = get_post($instance['phpcmsblockid']);
			if($block)
			{
				echo apply_filters('the_content', $block->post_content);
			}
		}
		
		echo $args['after_widget'];
	}
			
	public function form( $instance ) 
	{
		$args = array(
			'posts_per_page'   => -1,
			'post_type'        => 'php_cms_block',
			'post_status'      => 'publish',
			'suppress_filters' => true 
		);
		$cmsblocks = get_posts( $args );

		if ( isset( $instance[ 'title' ] ) ) 
			$title = $instance[ 'title' ];
		else 
			$title = '';
		
		if ( isset( $instance[ 'phpcmsblockid' ] ) ) 
			$phpcmsblockid = $instance[ 'phpcmsblockid' ];
		else 
			$phpcmsblockid ='';
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'opc_blocks' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'phpcmsblockid' ); ?>"><?php _e( 'Block:', 'opc_blocks' ); ?></label>
		<select class="widefat" id="<?php echo $this->get_field_id( 'phpcmsblockid' ); ?>" name="<?php echo $this->get_field_name( 'phpcmsblockid' ); ?>">
			<option value=""><?php _e( 'Select Block', 'opc_blocks' ); ?></option>
			<?php 
			if(!empty($cmsblocks)){
				foreach($cmsblocks as $val){
					$sel = '';
					if($phpcmsblockid == $val->ID)
						$sel = 'selected="selected"';
					echo '<option value="'.$val->ID.'" '.$sel.'>'.$val->post_title.'</option>';
				}
			}
			?>
		</select>	
		</p>
		<?php 
	}
		
	public function update( $new_instance, $old_instance ) 
	{
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['phpcmsblockid'] = ( ! empty( $new_instance['phpcmsblockid'] ) ) ? strip_tags( $new_instance['phpcmsblockid'] ) : '';
		return $instance;
	}
} 
?>

