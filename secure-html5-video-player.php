<?php
/*
Plugin Name: Secure HTML5 Video Player
Plugin URI: http://www.trillamar.com/webcraft/secure-html5-video-player/
Description: An enhanced video plugin for WordPress built on the VideoJS HTML5 video player library.  Settings can be easily configured with a control panel and simplified short codes.  Video files can be served from a secured private directory. 
Author: Lucinda Brown, Jinsoo Kang
Version: 1.2
Author URI: http://www.trillamar.com/
License: LGPLv3
*/

$secure_html5_video_player_is_android = preg_match("/android/i", $_SERVER['HTTP_USER_AGENT']);
$secure_html5_video_player_is_explorer7 = preg_match("/msie 7/i", $_SERVER['HTTP_USER_AGENT']);
$secure_html5_video_player_is_explorer8 = preg_match("/msie 8/i", $_SERVER['HTTP_USER_AGENT']);
$secure_html5_video_player_is_ios = preg_match("/mobile/i", $_SERVER['HTTP_USER_AGENT']) && preg_match("/safari/i", $_SERVER['HTTP_USER_AGENT']);


require_once('sh5vp-widgets.php');
require_once('sh5vp-functions.php');
register_activation_hook(__FILE__,'secure_html5_video_player_install');

add_action('wp_head','secure_html5_video_player_add_header');
add_action('admin_menu', 'secure_html5_video_player_menu');
add_action('plugins_loaded', 'secure_html5_video_player_plugins_loaded');

add_shortcode('video', 'secure_html5_video_player_shortcode_video');



if ( !function_exists('secure_html5_video_player_menu') ):
function secure_html5_video_player_menu() {
	add_options_page(
		'Secure HTML5 Video Player',
		'Secure HTML5 Video Player',
		'manage_options',
		__FILE__,
		'secure_html5_video_player_options'
	);
}
endif;


?>