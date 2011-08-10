<?php 


if ( !function_exists('secure_html5_video_player_options') ):
function secure_html5_video_player_options() {
	$options_txt = __('Secure HTML5 Video Player', 'secure-html5-video-player');
	printf("<div class='wrap'><form method='post'><h2>%s</h2>", $options_txt);
	if (!empty($_POST)) {
		if (isset($_REQUEST['submit'])) {
			update_secure_html5_video_player_options();
		}
		if (isset($_REQUEST['uninstall'])) {
			secure_html5_video_player_uninstall();
		}
	}
	?>
<p>
Contributors: <a href="http://www.trillamar.com">Lucinda Brown</a>, Jinsoo Kang<br/>
Plugin page: <a href="http://www.trillamar.com/webcraft/secure-html5-video-player/">www.trillamar.com/webcraft/secure-html5-video-player</a><br />
<br />
<b>Secure HTML5 Video Player</b> is a video plugin for WordPress built on the VideoJS HTML5 video player library. It allows you to embed video in your post or page using HTML5 with Flash fallback support for non-HTML5 browsers.  The settings can be easily configured with this control panel and with simplified short codes inserted into posts or pages.  Video files can be served privately; pseudo-streamed from a secured directory. <br />
<br />
See <a href="http://www.trillamar.com/webcraft/secure-html5-video-player/" target="_blank">www.trillamar.com/webcraft/secure-html5-video-player</a> for additional information about Secure HTML5 Video Player.<br />
See <a href="http://videojs.com/" target="_blank">videojs.com</a> for additional information about VideoJS.<br />
See <a href="http://flowplayer.org/" target="_blank">flowplayer.org</a> for additional information about Flowplayer.<br />
</p>
<br />
	<input type='submit' name='submit' value='<?php _e('Save the options', 'secure-html5-video-player'); ?>' /><br />
<?php
	secure_html5_video_player_options_form();
	echo "<div style='clear:both'></div>";
?><p>
<h3>Video Shortcode Options</h3>

<h4>file</h4>
The file name of the video without the file extension.  The video directory set in the control panel is searched for files with this name and with file extensions: mp4, m4v, ogv, ogg, theora.ogv, webm, png, jpg, jpeg, and gif.  The files that match are automatically used in the video tag and poster displayed in the page.  For example, if you have videos: <b>myclip.mp4</b>, <b>myclip.ogv</b>, <b>myclip.webm</b>, and the poster image: <b>myclip.png</b>; you need only set a file value of "myclip".  <br /><br />
<code>[video file="myclip"]</code>

<h4>mp4</h4>
The file name or URL of the h.264/MP4 source for the video.<br /><br />
<code>[video mp4="video_clip.mp4"]</code>
<h4>ogg</h4>
The file name or URL of the Ogg/Theora source for the video.<br /><br />
<code>[video ogg="video_clip.ogv"]</code>

<h4>webm</h4>
The file name or URL of the VP8/WebM source for the video.<br /><br />
<code>[video webm="video_clip.webm"]</code>

<h4>poster</h4>
The file name or URL of the poster frame for the video.<br /><br />
<code>[video poster="video_clip.png"]</code>

<h4>width</h4>
The width of the video.<br /><br />
<code>[video width="640"]</code>

<h4>height</h4>
The height of the video.<br /><br />
<code>[video height="480"]</code>

<h4>preload</h4>
Start loading the video as soon as possible, before the user clicks play.<br /><br />
<code>[video preload="true"]</code>

<h4>autoplay</h4>
Start playing the video as soon as it's ready.<br /><br />
<code>[video autoplay="true"]</code>
<br /><br />

<h3>Video Shortcode Options</h3>
<h4>Video URL example</h4>
<code>[video mp4="http://video-js.zencoder.com/oceans-clip.mp4" ogg="http://video-js.zencoder.com/oceans-clip.ogg" webm="http://video-js.zencoder.com/oceans-clip.webm" poster="http://video-js.zencoder.com/oceans-clip.png" preload="yes" autoplay="no" width="640" height="264"]</code>
<br />

<h4>Video File Example using default settings</h4>
<code>[video file="video_clip"]</code>
<br />

<h4>Video File Example using custom settings</h4>
<code>[video file="video_clip" preload="yes" autoplay="yes" width="1600" height="900"]</code>

	</p><br /><br />
	<input type='submit' name='submit' value='<?php _e('Save the options', 'secure-html5-video-player'); ?>' /><br /><br />

	<?php
	echo "<div style='clear:both'></div>";
	echo "</form></div>";
}
endif;


if ( !function_exists('secure_html5_video_player_install') ):
function secure_html5_video_player_install() {
	add_option('secure_html5_video_player_video_dir', ABSPATH . 'videos');
	add_option('secure_html5_video_player_skin', 'tube');
	add_option('secure_html5_video_player_key_seed', base64_encode(AUTH_KEY));
	add_option('secure_html5_video_player_enable_flash_fallback', 'yes');
	add_option('secure_html5_video_player_enable_download_fallback', 'yes');
	
	add_option('secure_html5_video_player_default_width', 640);
	add_option('secure_html5_video_player_default_height', 480);
	add_option('secure_html5_video_player_default_preload', 'yes');
	add_option('secure_html5_video_player_default_autoplay', 'no');
}
endif;


if ( !function_exists('secure_html5_video_player_uninstall') ):
function secure_html5_video_player_uninstall() {
	delete_option('secure_html5_video_player_video_dir');
	delete_option('secure_html5_video_player_skin');
	delete_option('secure_html5_video_player_key_seed');
	delete_option('secure_html5_video_player_enable_flash_fallback');
	delete_option('secure_html5_video_player_enable_download_fallback');

	delete_option('secure_html5_video_player_default_width');
	delete_option('secure_html5_video_player_default_height');
	delete_option('secure_html5_video_player_default_preload');
	delete_option('secure_html5_video_player_default_autoplay');
}
endif;


if ( !function_exists('update_secure_html5_video_player_options') ):
function update_secure_html5_video_player_options() {
	if (isset($_REQUEST['secure_html5_video_player_video_dir'])) {
		update_option('secure_html5_video_player_video_dir', $_REQUEST['secure_html5_video_player_video_dir']);
	}
	if (isset($_REQUEST['secure_html5_video_player_skin'])) {
		update_option('secure_html5_video_player_skin', $_REQUEST['secure_html5_video_player_skin']);
	}
	if (isset($_REQUEST['secure_html5_video_player_key_seed'])) {
		update_option('secure_html5_video_player_key_seed', $_REQUEST['secure_html5_video_player_key_seed']);
	}
	
	if (isset($_REQUEST['secure_html5_video_player_enable_flash_fallback']) 
	&& $_REQUEST['secure_html5_video_player_enable_flash_fallback'] == 'yes') {
		update_option('secure_html5_video_player_enable_flash_fallback', 'yes');
	}
	else {
		update_option('secure_html5_video_player_enable_flash_fallback', 'no');
	}

	if (isset($_REQUEST['secure_html5_video_player_enable_download_fallback'])
	&& $_REQUEST['secure_html5_video_player_enable_download_fallback'] == 'yes') {
		update_option('secure_html5_video_player_enable_download_fallback', 'yes');
	}
	else {
		update_option('secure_html5_video_player_enable_download_fallback', 'no');
	}
	
	if (isset($_REQUEST['secure_html5_video_player_default_width'])) {
		update_option('secure_html5_video_player_default_width', $_REQUEST['secure_html5_video_player_default_width']);
	}
	if (isset($_REQUEST['secure_html5_video_player_default_height'])) {
		update_option('secure_html5_video_player_default_height', $_REQUEST['secure_html5_video_player_default_height']);
	}


	if (isset($_REQUEST['secure_html5_video_player_default_preload'])
	&& $_REQUEST['secure_html5_video_player_default_preload'] == 'yes') {
		update_option('secure_html5_video_player_default_preload', 'yes');
	}
	else {
		update_option('secure_html5_video_player_default_preload', 'no');
	}

	if (isset($_REQUEST['secure_html5_video_player_default_autoplay'])
	&& $_REQUEST['secure_html5_video_player_default_autoplay'] == 'yes') {
		update_option('secure_html5_video_player_default_autoplay', 'yes');
	}
	else {
		update_option('secure_html5_video_player_default_autoplay', 'no');
	}
}
endif;


if ( !function_exists('secure_html5_video_player_options_form') ):
function secure_html5_video_player_options_form() {
	wp_enqueue_style('dashboard');
	wp_print_styles('dashboard');
	wp_enqueue_script('dashboard');
	wp_print_scripts('dashboard');

	$secure_html5_video_player_video_dir = get_option('secure_html5_video_player_video_dir');
	$secure_html5_video_player_key_seed = get_option('secure_html5_video_player_key_seed');

	$secure_html5_video_player_skin = get_option('secure_html5_video_player_skin');
	$secure_html5_video_player_skin_tube = "";
	$secure_html5_video_player_skin_vim = "";
	$secure_html5_video_player_skin_hu = "";
	$secure_html5_video_player_skin_videojs = "";
	switch ($secure_html5_video_player_skin) {
		case "tube":
			$secure_html5_video_player_skin_tube = 'selected="selected"';
			break;
		case "vim":
			$secure_html5_video_player_skin_vim = 'selected="selected"';
			break;
		case "hu":
			$secure_html5_video_player_skin_hu = 'selected="selected"';
			break;
		case "videojs":
			$secure_html5_video_player_skin_videojs = 'selected="selected"';
			break;
	}

	$secure_html5_video_player_enable_flash_fallback = ('yes' == get_option('secure_html5_video_player_enable_flash_fallback') ? 'checked="checked"' : '');
	$secure_html5_video_player_enable_download_fallback = ('yes' == get_option('secure_html5_video_player_enable_download_fallback') ? 'checked="checked"' : '');

	$secure_html5_video_player_default_width = get_option('secure_html5_video_player_default_width');
	$secure_html5_video_player_default_height = get_option('secure_html5_video_player_default_height');

	$secure_html5_video_player_default_preload = ('yes' == get_option('secure_html5_video_player_default_preload') ? 'checked="checked"' : '');
	$secure_html5_video_player_default_autoplay = ('yes' == get_option('secure_html5_video_player_default_autoplay') ? 'checked="checked"' : '');
	?>
	<div class='postbox-container' style='width:70%;'>
	<br />

<h3>Server</h3>
	<?php
		$above_document_root = dirname($_SERVER['DOCUMENT_ROOT']);
		if (strpos($_SERVER['DOCUMENT_ROOT'], '/public_html/') !== FALSE) {
			$above_document_root = secure_html5_video_player_parent_path_with_file($_SERVER['DOCUMENT_ROOT'], 'public_html', 10);
		}
		else if (strpos($_SERVER['DOCUMENT_ROOT'], '/www/') !== FALSE) {
			$above_document_root = secure_html5_video_player_parent_path_with_file($_SERVER['DOCUMENT_ROOT'], 'www', 10);
		}
	?>

	<label for='secure_html5_video_player_video_dir'><?php _e('Video directory', 'secure-html5-video-player'); ?><br />
	<input type='text' name='secure_html5_video_player_video_dir'  size='100' value='<?php echo $secure_html5_video_player_video_dir ?>' /></label><br />
	<small>The directory on the website where videos are stored.  Your public_html directory is: <code><?php print $_SERVER['DOCUMENT_ROOT'] ?></code>. If videos should be protected, the video directory should either be a password protected directory under public_html like: <code><?php print $_SERVER['DOCUMENT_ROOT'] ?>/videos</code>; or a location outside of public_html, like: <code><?php print $above_document_root; ?>/videos</code>.  This is also where you will upload all of your videos, so it should be a location to where you can FTP large video files.  Your hosting control panel should have more information about creating directories protected from direct web access, and have the necessary functionality to configure them.</small>
	<br /><br />

	<label for='secure_html5_video_player_key_seed' style="white-space:nowrap;"><?php _e('Secure seed', 'secure-html5-video-player'); ?><br />
	<input type='text' id="secure_html5_video_player_key_seed" name='secure_html5_video_player_key_seed'  size='80' value='<?php echo $secure_html5_video_player_key_seed ?>' maxlength="80" />
	<input type="button" name="buttonGenerateSeed" value="Generate Seed" onclick="
		var charAry = '0123456789QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm';
		var buf = '';
		var seedLength = Math.floor(Math.random() * 60) + 20;
		for (i = 0; i < seedLength; i++) {
			buf += charAry[ Math.floor(Math.random() * charAry.length) ];
		}
		var secure_html5_video_player_key_seed = document.getElementById('secure_html5_video_player_key_seed');
		secure_html5_video_player_key_seed.value = buf;
		return false;
	" />
	</label>
	<br />
	<small><?php _e("Arbitrary text used to generate session keys for secure video downloads.  This can be any string of any length, up to 80 characters long.  Press the [Generate Seed] button to automatically create a random one.", 'secure-html5-video-player'); ?></small>
	<br /><br />

<input type='submit' name='submit' value='<?php _e('Save the options', 'secure-html5-video-player'); ?>' /><br /><br />

<h3>Playback</h3>

	<label for='secure_html5_video_player_default_width'><?php _e('Default width', 'secure-html5-video-player'); ?><br />
	<input type='text' name='secure_html5_video_player_default_width'  size='10' value='<?php echo $secure_html5_video_player_default_width ?>' /></label><br />
	<small><?php _e("Default video width.  Can be overrided by setting the <b>width</b> attribute in the short tag.", 'secure-html5-video-player'); ?></small>
	<br /><br />
	
	<label for='secure_html5_video_player_default_height'><?php _e('Default height', 'secure-html5-video-player'); ?><br />
	<input type='text' name='secure_html5_video_player_default_height'  size='10' value='<?php echo $secure_html5_video_player_default_height ?>' /></label><br />
	<small><?php _e("Default video height.  Can be overrided by setting the <b>height</b> attribute in the short tag.", 'secure-html5-video-player'); ?></small>
	<br /><br />

	<label for='secure_html5_video_player_default_preload'><?php _e("Preload video:", "secure-html5-video-player"); ?>
	<input type='checkbox' value="yes" name='secure_html5_video_player_default_preload' <?php echo $secure_html5_video_player_default_preload ?> /></label><br />
	<small><?php _e("If checked, the video will preload by default.  Can be overrided by setting the <b>preload</b> attribute in the short tag to <b>yes</b> or <b>no</b>.", 'secure-html5-video-player'); ?></small>
	<br /><br />

	<label for='secure_html5_video_player_default_autoplay'><?php _e("Autoplay video:", "secure-html5-video-player"); ?>
	<input type='checkbox' value="yes" name='secure_html5_video_player_default_autoplay' <?php echo $secure_html5_video_player_default_autoplay ?> /></label><br />
	<small><?php _e("If checked, the video start playing automatically when the page is loaded.  Can be overrided by setting the <b>autoplay</b> attribute in the short tag to <b>yes</b> or <b>no</b>.", 'secure-html5-video-player'); ?></small>
	<br /><br />

	<label for='secure_html5_video_player_skin'><?php _e("Player Skin:", "secure-html5-video-player"); ?>
	<select name='secure_html5_video_player_skin'>
	<option value='tube' <?php print $secure_html5_video_player_skin_tube ?>><?php _e("tube", "secure-html5-video-player"); ?></option>
	<option value='vim' <?php print $secure_html5_video_player_skin_vim ?>><?php _e("vim", "secure-html5-video-player"); ?></option>
	<option value='hu' <?php print $secure_html5_video_player_skin_hu ?>><?php _e("hu", "secure-html5-video-player"); ?></option>
	<option value='videojs' <?php print $secure_html5_video_player_skin_videojs ?>><?php _e("videojs", "secure-html5-video-player"); ?></option>
	</select></label><br />
	<small><?php _e("The visual appearance of the HTML5 video player.", 'secure-html5-video-player'); ?></small>
	<br /><br />

<input type='submit' name='submit' value='<?php _e('Save the options', 'secure-html5-video-player'); ?>' /><br /><br />

<h3>Compatibility</h3>

	<label for='secure_html5_video_player_enable_flash_fallback'><?php _e("Enable Flash fallback:", "secure-html5-video-player"); ?>
	<input type='checkbox' value="yes" name='secure_html5_video_player_enable_flash_fallback' <?php echo $secure_html5_video_player_enable_flash_fallback ?> /></label><br />
	<small><?php _e("If checked, Flowplayer will act as a fallback for non-html5 compliant browsers.", 'secure-html5-video-player'); ?></small>
	<br /><br />


	<label for='secure_html5_video_player_enable_download_fallback'><?php _e("Enable download fallback:", "secure-html5-video-player"); ?>
	<input type='checkbox' value="yes" name='secure_html5_video_player_enable_download_fallback' <?php echo $secure_html5_video_player_enable_download_fallback ?> /></label><br />
	<small><?php _e("If checked, video download links will act as a fallback for non compliant browsers.", 'secure-html5-video-player'); ?></small>
	<br /><br />


	<input type='submit' name='submit' value='<?php _e('Save the options', 'secure-html5-video-player'); ?>' /><br /><br />
	</div>
	<?php
}
endif;



if ( !function_exists('secure_html5_video_player_printFile') ):
function secure_html5_video_player_printFile($file) {
	$fp = fopen($file, "r");
	if (!$fp) return;
	$chars_sent = 0;
	while (!feof($fp)) {
		$content = fread($fp, 1024);
		echo $content;
		$chars_sent += strlen($content);
		if (connection_aborted()) {
			break;
		}
	}
	fclose($fp);
}
endif;


if ( !function_exists('secure_html5_video_player_filename_no_ext') ):
function secure_html5_video_player_filename_no_ext($str) {
	$retval = $str;
	$pos = strrpos($str, '.');
	if ($pos > 0) {
		$retval = substr($str, 0, $pos);
	}
	$pos = strrpos($str, '/');
	if ($pos > 0) {
		$retval = substr($str, $pos + 1);
	}
	return $retval;
}
endif;


if ( !function_exists('secure_html5_video_player_endsWith') ):
function secure_html5_video_player_endsWith($Haystack, $Needle){
	return strrpos($Haystack, $Needle) === strlen($Haystack) - strlen($Needle);
}
endif;


if ( !function_exists('secure_html5_video_player_startsWith') ):
function secure_html5_video_player_startsWith($haystack, $needle) {
    $length = strlen($needle);
    return (substr($haystack, 0, $length) === $needle);
}
endif;


if ( !function_exists('secure_html5_video_player_accessKey') ):
function secure_html5_video_player_accessKey($filename) {
	$secure_html5_video_player_key_seed = get_option('secure_html5_video_player_key_seed');
	$script_tz = date_default_timezone_get();
	//date_default_timezone_set('America/Los_Angeles');
	date_default_timezone_set(get_option('timezone_string'));

	$f = secure_html5_video_player_filename_no_ext($filename);
	$access_key = sha1($_SERVER['REMOTE_ADDR'] . date('d-n-y') . $secure_html5_video_player_key_seed . $f);

	date_default_timezone_set($script_tz);
	return $access_key;
}
endif;


if ( !function_exists('secure_html5_video_player_add_header') ):
function secure_html5_video_player_add_header() {
	global $secure_html5_video_player_is_android;
	global $secure_html5_video_player_is_explorer7;
	global $secure_html5_video_player_is_explorer8;
	global $secure_html5_video_player_is_ios;
	if ($secure_html5_video_player_is_explorer7 || $secure_html5_video_player_is_explorer8 
	|| $secure_html5_video_player_is_ios || $secure_html5_video_player_is_android) {
		return;
	}
	
	$secure_html5_video_player_skin = get_option('secure_html5_video_player_skin');
	$plugin_dir = WP_PLUGIN_URL.'/secure-html5-video-player';
	
	print "<link rel='stylesheet' href='{$plugin_dir}/video-js/video-js.css' type='text/css' />\n";
	if ($secure_html5_video_player_skin != 'videojs') {
		print "<link rel='stylesheet' href='{$plugin_dir}/video-js/skins/".$secure_html5_video_player_skin.".css' type='text/css' />\n";
	}
	print "<script src='{$plugin_dir}/video-js/video.js' language='javascript' type='text/javascript' ></script>\n";
	print "<script language='javascript' type='text/javascript' > VideoJS.setupAllWhenReady(); </script>\n";
	
}
endif;


if ( !function_exists('secure_html5_video_player_shortcode_video') ):
function secure_html5_video_player_shortcode_video($atts) {
	global $secure_html5_video_player_is_android;
	global $secure_html5_video_player_is_explorer7;
	global $secure_html5_video_player_is_explorer8;
	global $secure_html5_video_player_is_ios;

	$secure_html5_video_player_video_dir = get_option('secure_html5_video_player_video_dir');
	$secure_html5_video_player_skin = get_option('secure_html5_video_player_skin');

	$plugin_dir = WP_PLUGIN_URL.'/secure-html5-video-player';
  extract(shortcode_atts(array(
    'file' => '',
    'mp4' => '',
    'webm' => '',
    'ogg' => '',
    'poster' => '',
    'width' => get_option('secure_html5_video_player_default_width'),
		'height' => get_option('secure_html5_video_player_default_height'),
    'preload' => get_option('secure_html5_video_player_default_preload'),
    'autoplay' => get_option('secure_html5_video_player_default_autoplay'),
  ), $atts));
	
	if (!$width || $width <= 0) {
		$width = '640';
	}
	if (!$height || $height <= 0) {
		$height = '480';
	}
	
	$count_file_exists = 0;
	if ($file) {
		$file = secure_html5_video_player_filename_no_ext($file);
		$access_key = secure_html5_video_player_accessKey($file);
		if (file_exists($secure_html5_video_player_video_dir . '/' . $file . '.mp4')) {
			$mp4 = "{$plugin_dir}/getvideo.php?k={$access_key}&file={$file}.mp4";
			$count_file_exists++;
		}
		if (file_exists($secure_html5_video_player_video_dir . '/' . $file . '.m4v')) {
			$mp4 = "{$plugin_dir}/getvideo.php?k={$access_key}&file={$file}.m4v";
			$count_file_exists++;
		}
		if (file_exists($secure_html5_video_player_video_dir . '/' . $file . '.webm')) {
			$webm = "{$plugin_dir}/getvideo.php?k={$access_key}&file={$file}.webm";
			$count_file_exists++;
		}
		if (file_exists($secure_html5_video_player_video_dir . '/' . $file . '.ogv')) {
			$ogg = "{$plugin_dir}/getvideo.php?k={$access_key}&file={$file}.ogv";
			$count_file_exists++;
		}
		if (file_exists($secure_html5_video_player_video_dir . '/' . $file . '.ogg')) {
			$ogg = "{$plugin_dir}/getvideo.php?k={$access_key}&file={$file}.ogg";
			$count_file_exists++;
		}
		if (file_exists($secure_html5_video_player_video_dir . '/' . $file . '.theora.ogv')) {
			$ogg = "{$plugin_dir}/getvideo.php?k={$access_key}&file={$file}.theora.ogv";
			$count_file_exists++;
		}
		
		if (!$poster) {
			if (file_exists($secure_html5_video_player_video_dir . '/' . $file . '.png')) {
				$poster = "{$plugin_dir}/getvideo.php?k={$access_key}&file={$file}.png";
			}
			else if (file_exists($secure_html5_video_player_video_dir . '/' . $file . '.jpg')) {
				$poster = "{$plugin_dir}/getvideo.php?k={$access_key}&file={$file}.jpg";
			}
			else if (file_exists($secure_html5_video_player_video_dir . '/' . $file . '.jpeg')) {
				$poster = "{$plugin_dir}/getvideo.php?k={$access_key}&file={$file}.jpeg";
			}
			else if (file_exists($secure_html5_video_player_video_dir . '/' . $file . '.gif')) {
				$poster = "{$plugin_dir}/getvideo.php?k={$access_key}&file={$file}.gif";
			}
		}
	}	
	
  // MP4 Source Supplied
  if ($mp4) {
   // $mp4_source = '<source src="'.$mp4.'" type=\'video/mp4; codecs="avc1.42E01E, mp4a.40.2"\' />';
    $mp4_source = '<source src="'.$mp4.'" type="video/mp4" />';
    $mp4_link = '<a href="'.$mp4.'">MP4</a>';
  }

  // WebM Source Supplied
  if ($webm) {
    //$webm_source = '<source src="'.$webm.'" type=\'video/webm; codecs="vp8, vorbis"\' />';
    $webm_source = '<source src="'.$webm.'" type="video/webm" />';
    $webm_link = '<a href="'.$webm.'">WebM</a>';
  }

  // Ogg source supplied
  if ($ogg) {
    //$ogg_source = '<source src="'.$ogg.'" type=\'video/ogg; codecs="theora, vorbis"\' />';
    $ogg_source = '<source src="'.$ogg.'" type="video/ogg" />';
    $ogg_link = '<a href="'.$ogg.'">Ogg</a>';
  }

  if ($poster) {
    $poster_attribute = 'poster="'.$poster.'"';
    $flow_player_poster = '"'. urlencode($poster) .'", ';
    $image_fallback = "<img src='$poster' width='$width' height='$height' alt='Poster Image' title='No video playback capabilities.' />";
  }

  if ($preload == 'yes' || $preload == 'true') {
    $preload_attribute = 'preload="auto"';
    $flow_player_preload = ',"autoBuffering":true';
  } else {
    $preload_attribute = 'preload="none"';
    $flow_player_preload = ',"autoBuffering":false';
  }

  if ($autoplay == 'yes' || $autoplay == 'true') {
    $autoplay_attribute = "autoplay";
    $flow_player_autoplay = ',"autoPlay":true';
  } else {
    $autoplay_attribute = "";
    $flow_player_autoplay = ',"autoPlay":false';
  }
	
	$video_tag_skin = '';
	if ($secure_html5_video_player_skin != 'videojs') {
		$video_tag_skin = $secure_html5_video_player_skin . '-css';
	}
	$video_tag .= "<!-- Begin - Secure HTML5 Video Player -->\n";
	$video_tag .= "<div class='video-js-box {$video_tag_skin}'>\n";

	if ($secure_html5_video_player_is_ios || $secure_html5_video_player_is_android) {
		// iOS and Android devices
		$video_tag .= "<video class='video-js' onClick='this.play();' width='{$width}' height='{$height}' {$poster_attribute} controls {$preload_attribute} {$autoplay_attribute}>\n";
		if ($mp4_source) {
			$video_tag .= "{$mp4_source}\n";
		}
		$video_tag .= "</video>\n";
	}
	else if (($secure_html5_video_player_is_explorer7 || $secure_html5_video_player_is_explorer8) && $mp4) {
		// IE 7 or IE 8
		$video_tag .= "<object class='vjs-flash-fallback' ";
		$video_tag .= " width='{$width}' height='{$height}' type='application/x-shockwave-flash' data='{$plugin_dir}/flowplayer/flowplayer-3.2.7.swf'>\n";
		$video_tag .= "<param name='movie' value='{$plugin_dir}/flowplayer/flowplayer-3.2.7.swf' />\n";
		$video_tag .= "<param name='wmode' value='transparent' />\n"; 
		$video_tag .= "<param name='allowfullscreen' value='true' />\n";
		$video_tag .= "<param name='flashvars' value='config={\"playlist\":[ $flow_player_poster {\"url\": \"" . urlencode($mp4) . "\" $flow_player_autoplay $flow_player_preload }]}' />\n";
		$video_tag .= "{$image_fallback}\n";
		$video_tag .= "</object>\n";
	}
	else {
		// everything else
		$video_tag .= "<video class='video-js' width='{$width}' height='{$height}' {$poster_attribute} controls {$preload_attribute} {$autoplay_attribute}>\n";
		if ($mp4_source) {
			$video_tag .= "{$mp4_source}\n";
		}
		if ($webm_source) {
			$video_tag .= "{$webm_source}\n";
		}
		if ($ogg_source) {
			$video_tag .= "{$ogg_source}\n";
		}
		if ($count_file_exists == 0) {
			$video_tag .= "<!-- file not found: {$secure_html5_video_player_video_dir}/{$file} -->\n";
		}
	
		if ('yes' == get_option('secure_html5_video_player_enable_flash_fallback') && $mp4) {
			//Flash Fallback. Use any flash video player here. Make sure to keep the vjs-flash-fallback class.
			$video_tag .= "<object class='vjs-flash-fallback' ";
			$video_tag .= " width='{$width}' height='{$height}' type='application/x-shockwave-flash' data='{$plugin_dir}/flowplayer/flowplayer-3.2.7.swf'>\n";
			$video_tag .= "<param name='movie' value='{$plugin_dir}/flowplayer/flowplayer-3.2.7.swf' />\n";
			$video_tag .= "<param name='wmode' value='transparent' />\n"; 
			$video_tag .= "<param name='allowfullscreen' value='true' />\n";
			$video_tag .= "<param name='flashvars' value='config={\"playlist\":[ $flow_player_poster {\"url\": \"" . urlencode($mp4) . "\" $flow_player_autoplay $flow_player_preload }]}' />\n";
			$video_tag .= "{$image_fallback}\n";
			$video_tag .= "</object>\n";
		}
		$video_tag .= "</video>\n";
		
		if ('yes' == get_option('secure_html5_video_player_enable_download_fallback')) {
			//Download links provided for devices that can't play video in the browser.
			$video_tag .= "<p class='vjs-no-video'><strong>Download Video:</strong>\n";
			if ($mp4_link) {
				$video_tag .= "{$mp4_link}\n";
			}
			if ($webm_link) {
				$video_tag .= "{$webm_link}\n";
			}
			if ($ogg_link) {
				$video_tag .= "{$ogg_link}\n";
			}
			$video_tag .= "</p>\n";
		}
	}	
	
	$video_tag .= "</div>\n";
	$video_tag .= "<!-- End - Secure HTML5 Video Player -->\n";
	return $video_tag;
}
endif;


if ( !function_exists('secure_html5_video_player_parent_path_with_file') ):
function secure_html5_video_player_parent_path_with_file($filepath, $needle, $limit) {
	$curr_path = dirname($filepath);
	for ($i = 0; $i < $limit; $i++) {
		$ls = scandir($curr_path);
		if (in_array($needle, $ls)) return $curr_path;
		$curr_path = dirname($curr_path);
	}
	return NULL;
}
endif;

?>