=== Secure HTML5 Video Player ===
Contributors: Lucinda Brown, Jinsoo Kang
Tags: html5, video, player, secure, javascript, m4v, mp4, ogg, theora, webm, flowplayer, skins
Requires at least: 3.0
Tested up to: 3.2.1
Stable tag: 1.0

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


== Changelog ==

= 1.0 =

* First release.
