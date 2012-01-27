<?php 


if( !class_exists( 'secure_html5_video_player_widget' ) ) :
class secure_html5_video_player_widget extends WP_Widget {
	function secure_html5_video_player_widget() {		
		$widget_ops = array(
			'classname' => 'secure_html5_video_player_widget', 
			'description' => 'A widget that plays HTML5 video.'
		);
		$control_ops = array(
		//	'width' => 300, 
		//	'height' => 350
		);
		$this->WP_Widget(false, 'Secure HTML5 Video Player', $widget_ops, $control_ops);
	}
	
	function widget( $args, $instance ) {
		extract( $args );
		$custom_width = get_option('secure_html5_video_player_default_width');
		$custom_height = get_option('secure_html5_video_player_default_height');
    $custom_preload = get_option('secure_html5_video_player_default_preload');
    $custom_autoplay = get_option('secure_html5_video_player_default_autoplay');
    $custom_loop = get_option('secure_html5_video_player_default_loop');
		if ($instance['width']) {
			$custom_width = $instance['width'];
		}
		if ($instance['height']) {
			$custom_height = $instance['height'];
		}
		if ($instance['preload']) {
			$custom_preload = $instance['preload'];
		}
		if ($instance['autoplay']) {
			$custom_autoplay = $instance['autoplay'];
		}	
		if ($instance['loop']) {
			$custom_loop = $instance['loop'];
		}	
		print $before_widget;
		print $before_title;
		print $instance['title'];
		print $after_title;
		print do_shortcode(
			'[video file="'.$instance['video'].'" '
			.' preload="'.$custom_preload.'" autoplay="'.$custom_autoplay.'" loop="'.$custom_loop.'" '
			.' width="'.$custom_width.'" height="'.$custom_height.'"]'
		);
		print '<div class="secure_html5_video_player_caption">';
		print $instance['caption'];
		print '</div>';
		print $after_widget;
	}
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;		
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['video'] = strip_tags( $new_instance['video'] );
		$instance['width'] = strip_tags( $new_instance['width'] );
		$instance['height'] = strip_tags( $new_instance['height'] );
		$instance['preload'] = strip_tags( $new_instance['preload'] );
		$instance['autoplay'] = strip_tags( $new_instance['autoplay'] );
		$instance['loop'] = strip_tags( $new_instance['loop'] );
		$instance['caption'] = $new_instance['caption'];
		return $instance;
	}
	
	function form( $instance ) {
		$defaults = array(
			'title' => '',
			'video' => '',
			'width' => get_option('secure_html5_video_player_default_width'),
			'height' => get_option('secure_html5_video_player_default_height'),
			'preload' => get_option('secure_html5_video_player_default_preload'),
			'autoplay' => get_option('secure_html5_video_player_default_autoplay'),
			'loop' => get_option('secure_html5_video_player_default_loop'),
			'caption' => ''
		);
		$instance = wp_parse_args( ( array )$instance, $defaults ); 
?><table>
<tr>
	<td><label for="<?php print $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'secure_html5_video_player'); ?></label></td>
	<td><input type="text" id="<?php print $this->get_field_id( 'title' ); ?>" name="<?php print $this->get_field_name( 'title' ); ?>" value="<?php print $instance['title']; ?>" /></td>
</tr>
<tr>
	<td colspan="2"><label for="<?php print $this->get_field_id( 'video' ); ?>"><?php _e('Video:', 'secure_html5_video_player'); ?></label></td></tr>
<tr>
	<td colspan="2"><?php
		$secure_html5_video_player_video_dir = get_option('secure_html5_video_player_video_dir');
		if (is_dir($secure_html5_video_player_video_dir)) {
			?><select id="<?php print $this->get_field_id( 'video' ); ?>" name="<?php print $this->get_field_name( 'video' ); ?>" ><?php
			$video_files = array();
			$dh = opendir($secure_html5_video_player_video_dir);
			while (false !== ($filename = readdir($dh))) {
				if (secure_html5_video_player_startsWith($filename, '.')) continue;
				$video_files[ secure_html5_video_player_filename_no_ext($filename) ] = 1;
			}
			ksort($video_files);
			foreach ($video_files as $key => $val) {
				?><option value="<?php print $key; ?>" <?php if ($instance['video'] == $key) {
					?> selected="selected" <?php
				} ?> ><?php print $key; ?></option><?php
			}
			?></select><?php
		}
		else {
			?><input type="text" id="<?php print $this->get_field_id( 'video' ); ?>" name="<?php print $this->get_field_name( 'video' ); ?>" value="<?php print $instance['video']; ?>" /><?php
		}
	?></td>
</tr>	
<tr>
	<td><label for="<?php print $this->get_field_id( 'width' ); ?>"><?php _e('Width:', 'secure_html5_video_player'); ?></label></td>
	<td><input type="text" id="<?php print $this->get_field_id( 'width' ); ?>" name="<?php print $this->get_field_name( 'width' ); ?>" value="<?php print $instance['width']; ?>" size="5" /> pixels</td>
</tr>	
<tr>
	<td><label for="<?php print $this->get_field_id( 'height' ); ?>"><?php _e('Height:', 'secure_html5_video_player'); ?></label></td>
	<td><input type="text" id="<?php print $this->get_field_id( 'height' ); ?>" name="<?php print $this->get_field_name( 'height' ); ?>" value="<?php print $instance['height']; ?>" size="5"  /> pixels</td>
</tr>	
<tr>
	<td><label for="<?php print $this->get_field_id( 'preload' ); ?>"><?php _e('Preload:', 'secure_html5_video_player'); ?></label></td>
	<td><input type="checkbox" id="<?php print $this->get_field_id( 'preload' ); ?>" name="<?php print $this->get_field_name( 'preload' ); ?>" value="yes" <?php 
	if ($instance['preload'] == 'yes') {
		?> checked="checked" <?php
	} 
	?> /></td>
</tr>	
<tr>
	<td><label for="<?php print $this->get_field_id( 'autoplay' ); ?>"><?php _e('Autoplay:', 'secure_html5_video_player'); ?></label></td>
	<td><input type="checkbox" id="<?php print $this->get_field_id( 'autoplay' ); ?>" name="<?php print $this->get_field_name( 'autoplay' ); ?>" value="yes" <?php 
	if ($instance['autoplay'] == 'yes') {
		?> checked="checked" <?php
	} 
	?> /></td>
</tr>	
<tr>
	<td><label for="<?php print $this->get_field_id( 'loop' ); ?>"><?php _e('Loop:', 'secure_html5_video_player'); ?></label></td>
	<td><input type="checkbox" id="<?php print $this->get_field_id( 'loop' ); ?>" name="<?php print $this->get_field_name( 'loop' ); ?>" value="yes" <?php 
	if ($instance['loop'] == 'yes') {
		?> checked="checked" <?php
	} 
	?> /></td>
</tr>	
<tr><td colspan="2"><label for="<?php print $this->get_field_id( 'caption' ); ?>"><?php _e('Caption (Text or HTML):', 'secure_html5_video_player'); ?></label></td></tr>
<tr><td colspan="2"><textarea id="<?php print $this->get_field_id( 'caption' ); ?>" name="<?php print $this->get_field_name( 'caption' ); ?>" rows="5" cols="29" class="widefat"><?php print $instance['caption']; ?></textarea></td></tr>	
</table>


<?php
	}
}
endif;


?>