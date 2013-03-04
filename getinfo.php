<?php 

if ( !function_exists('secure_html5_video_player_parent_path_with_file') ):
function secure_html5_video_player_parent_path_with_file($filepath, $needle, $limit) {
	$curr_path = dirname($filepath);
	for ($i = 0; $i < $limit; $i++) {
		$ls = scandir($curr_path);
		if (isset($ls) && is_array($ls) && in_array($needle, $ls)) return $curr_path;
		$curr_path = dirname($curr_path);
	}
	return NULL;
}
endif;


define('WP_USE_THEMES', false);
define( 'ABSPATH', secure_html5_video_player_parent_path_with_file(__FILE__, 'wp-config.php', 10) . '/');

require_once( ABSPATH . 'wp-config.php' );
require_once('sh5vp-functions.php');

$info = $_GET['info'];
$filename = '';
if (isset($_GET['file'])) {
	$filename = $_GET['file'];
}

$access_key = secure_html5_video_player_accessKey($filename);
if ($_GET['k'] != $access_key) {
	exit();
}

header('Content-Type: text/plain');
$secure_html5_video_player_video_dir = get_option('secure_html5_video_player_video_dir');
$plugin_dir = plugins_url('secure-html5-video-player');

$filepath = $secure_html5_video_player_video_dir . '/' . $filename;
$filename_no_ext = secure_html5_video_player_filename_no_ext($filename);


$found = false;
if ($info == 'exists') {
	
	$secure_html5_video_player_video_dir = get_option('secure_html5_video_player_video_dir');
	if (is_dir($secure_html5_video_player_video_dir)) {
		$dh = opendir($secure_html5_video_player_video_dir);
		while (false !== ($curr_video_file = readdir($dh))) {
			if (secure_html5_video_player_startsWith($curr_video_file, '.')) continue;
			$ext = secure_html5_video_player_filename_get_ext($curr_video_file);
			$normalized_ext = secure_html5_video_player_filename_get_normalized_ext($ext);
			$start_check = $filename_no_ext . '.';
			if (secure_html5_video_player_startsWith($curr_video_file, $start_check)) {
				print $normalized_ext . '=' . secure_html5_video_player_media_url($secure_html5_video_player_video_dir, $plugin_dir, $access_key, $filename_no_ext, $ext) . "\n";
				$found = true;
			}		
		}
	}
	
	if (!$found) {
		print '0';
	}
	
}
else if ($info == 'list') {
	$video_files = secure_html5_video_player_filelist(false);
	foreach ($video_files as $curr_video_file => $server_addr) {
		print $curr_video_file;
		print "\n";
	}
}

?>