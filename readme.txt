=== Secure HTML5 Video Player ===
Contributors: Lucinda Brown, Jinsoo Kang
Tags: html5, video, player, secure, javascript, m4v, mp4, ogg, theora, webm, flowplayer, skins
Requires at least: 3.0
Tested up to: 3.3.1
Stable tag: 1.1

The Secure HTML5 Video Player plugin allows you play HTML5 video on modern browsers with the Flowplayer and VideoJS players.  Settings can be easily configured with a control panel and simplified short codes.  Video files can be served privately; pseudo-streamed from a secured directory. 

== Description ==

A video plugin for WordPress built on the VideoJS HTML5 video player library. Allows you to embed video in your post or page using HTML5 with Flash fallback support for non-HTML5 browsers.  Settings can be easily configured with a control panel and simplified short codes.  Video files can be served from a secured private directory. 

See <a href="http://www.trillamar.com/webcraft/secure-html5-video-player/">www.trillamar.com/secure-html5-video-player/</a> for additional information about Secure HTML5 Video Player.
See <a href="http://videojs.com/">VideoJS.com</a> for additional information about VideoJS.
See <a href="http://flowplayer.org/">Flowplayer.org</a> for additional information about Flowplayer.

== Installation ==

This section describes how to install the plugin and get it working.

1. Upload the `secure-html5-video-player` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Use the [video] shortcode in your post or page using the following options.


Video Shortcode Options
-----------------------

### file
The file name of the video without the file extension. The video directory set in the control panel is searched for files with this name and with file extensions: mp4, m4v, ogv, ogg, theora.ogv, webm, png, jpg, jpeg, and gif. The files that match are automatically used in the video tag and poster displayed in the page. For example, if you have videos: myclip.mp4, myclip.ogv, myclip.webm, and the poster image: myclip.png; you need only set a file value of "myclip".

    [video file="myclip"]

### mp4
The file name or URL of the h.264/MP4 source for the video.

    [video mp4="video_clip.mp4"]

### ogg
The file name or URL of the Ogg/Theora source for the video.

    [video ogg="video_clip.ogv"]

### webm
The file name or URL of the VP8/WebM source for the video.

    [video webm="video_clip.webm"]

### poster
The file name or URL of the poster frame for the video.

    [video poster="video_clip.png"]

### width
The width of the video.

    [video width="640"]

### height
The height of the video.

    [video height="480"]

### preload
Start loading the video as soon as possible, before the user clicks play.

    [video preload="true"]

### autoplay
Start playing the video as soon as it's ready.

    [video autoplay="true"]


Video Shortcode Examples
------------------------
### Video URL example

    [video mp4="http://video-js.zencoder.com/oceans-clip.mp4" ogg="http://video-js.zencoder.com/oceans-clip.ogg" webm="http://video-js.zencoder.com/oceans-clip.webm" poster="http://video-js.zencoder.com/oceans-clip.png" preload="yes" autoplay="no" width="640" height="264"]

### Video File Example using default settings

    [video file="video_clip"]

### Video File Example using custom settings
    [video file="video_clip" preload="yes" autoplay="yes" width="1600" height="900"]


== Screenshots ==

1. Server settings
2. Playback and compatibility settings
3. Shortcode options and examples


== Changelog ==

= 1.1 =
* Added support for playing videos in widgets.
* Added support for looping videos.
* Added screenshots.
* Added answers to frequently asked questions.
* Corrected script tag to be compliant to standards.
* Corrected flash fallback object tag for IE8 compatibility.
* Corrected a syntax error in the VideoJS skin: hu.css

= 1.0 =
* First release.


== Upgrade Notice ==

= 1.1 =
Adds widget support, looping and additional documentation.  Corrects tag formatting so that they are more standards compliant.

= 1.0 =
First release


== Frequently Asked Questions ==

= Why isn't it working in IE and Safari? =

Q: <em>The plugin is working in Opera and Firefox, but not in IE and Safari. (I haven't tested in any more browsers than that.)  I'm using an .ogv file with the shortcode <code>[video ogg="vts.ogv"]</code> Can you tellme how come it's not working in IE and Safari. IE is almost a given, since there's always trouble with that, but I would think there would be no problem in Safari? </em><br/><br/>

Q: <em>I am installed your plugin and it works fine in Safari, but not in IE and Firefox. It shows only a white screen with "2008-2011″ and plays the sound. Could it be that the browser or the tool doesn't support mp4??  Also I am trying to center it on the page without having to edit the template source css.  beautiful tool if it can work in Firefox and IE!</em><br/><br/>
	
A: On Firefox, you'll have to convert the mp4 file to OGV format to get it to play in HTML5 video format. If your video is not playing in IE 8, then its likely your mp4 file is not in the proper encoding scheme compatible with HTML5 video. It has to be in h.264 format. See: <a href="http://diveintohtml5.org/video.html" target="_blank">http://diveintohtml5.org/video.html</a> for more information. <br/><br/>  
Q: <em>I can't see the plugin in Safari and IE. I know IE that I need to use ogv for most browsers (so I am) and mp4 for IE. But how can I create a shortcode in the page/post with both ogv and mp4 options available, so there won't be two instances of the video in one page/post? And also, why doesn't it work in Safari? I thought ogv was compatible with this browser :/ </em><br/><br/>
		
Q: <em>I now have it working in Safari using <code>[video ogg="vts.ogv" mp4="vts.mp4"] </code> but still no luck in IE </em><br/><br/>  A: If your video is not playing in IE 8, then its likely your mp4 file is not in the proper encoding scheme compatible with HTML5 video. It has to be in h.264 format. See: <a href="http://diveintohtml5.org/video.html" target="_blank">http://diveintohtml5.org/video.html</a> for more information. <br/><br/>


= How do I secure my videos? =

Q: <em>Can't get the "secure" part to work in IE9. I have the videos up a level from public_html. All works fine in FireFox... meaning, if you right click and save video, in FireFox you see getvideo.php but in IE9, you can download the .mp4. EVEN here on your page. Any ideas to fix???</em><br/><br/>

A: We use the Secure HTML5 Video Player with another plugin, cart66, that handles access to the pages that have the videos. That way, only members can see the videos. I personally don't have a problem with them saving the mp4, if they are on a page that they are allowed to be on. For some, it could be a feature. <br/><br/>


= How do I get the video to loop? =

Q: <em>Hey guys how to you get a video to loop??  Have tried loop in options no joy.</em><br/><br/>

Q: <em>Great plugin! I would like to add a continuous loop to a video if possible.  Thanks!</em><br/><br/>

A: Unfortunately, the video loop attribute is not support across all browsers consistently.  For the browsers that support it, we now provide a loop attribute for the short tag.  If you set it to "yes", it should loop the video on HTML5 compliant browsers.  On other browsers, this jQuery statement should work as a workaround: 
<code>jQuery("video").bind('ended', function(){     this.play(); });</code><br/><br/>  
