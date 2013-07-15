=== Secure HTML5 Video Player ===
Contributors: Lucinda Brown, Jinsoo Kang
Tags: html5, video, player, secure, javascript, m4v, mp4, ogg, ogv, theora, webm, flowplayer, skins, media server, youtube, vimeo, amazon, s3
Requires at least: 3.0
Tested up to: 3.5.2
Stable tag: 3.0

Secure HTML5 Video Player allows you to play HTML5 video on modern browsers. Videos can be served privately; pseudo-streamed from a secured directory.

== Description ==

A video plugin for WordPress built on the VideoJS HTML5 video player library. Allows you to embed video in your post or page using HTML5 with Flash fallback support for non-HTML5 browsers.  Settings can be easily configured with a control panel and simplified short codes.  Video files can be served from a secured private directory or from an Amazon S3 compatible file storage service.  Youtube or Vimeo video may be used as a fallback mechanism, or as primary videos, with HTML5 videos acting as fallbacks should the posted videos go away.

See <a href="http://www.trillamar.com/webcraft/secure-html5-video-player/">www.trillamar.com/secure-html5-video-player/</a> for additional information about Secure HTML5 Video Player.
See <a href="http://videojs.com/">VideoJS.com</a> for additional information about VideoJS.
See <a href="http://flowplayer.org/">Flowplayer.org</a> for additional information about Flowplayer.

== Installation ==

This section describes how to install the plugin and get it working.

1. Upload the 'secure-html5-video-player' folder to the '/wp-content/plugins/' directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. If you are self serving videos from a cache directory, make sure your webserver is configured so that 'video/ogg' and 'video/webm' are recognized file types.
4. In Settings -> Secure HTML5 Video Player, specify the directory (or the S3 service) where the videos are located.
5. Upload your videos and images to the directory or service you specified.
6. Use the [video] shortcode in your post or page using the following options.


Video Shortcode Options
-----------------------

### file
The file name of the video without the file extension. The video directory set in the control panel is searched for files with this name and with file extensions: mp4, m4v, ogv, ogg, theora.ogv, webm, png, jpg, jpeg, and gif. The files that match are automatically used in the video tag and poster displayed in the page. For example, if you have videos: myclip.mp4, myclip.ogv, myclip.webm, and the poster image: myclip.png; you need only set a file value of "myclip". To select a video in a subdirectory within the video directory, use the relative path to the video file from the video directory.

    [video file="myclip"]

    [video file="path/to/myclip"]


### vimeo
The Vimeo video ID.  A Vimeo video can be used as the primary video, with the HTML5 video as a fallback mechanism if the video is not available on the Vimeo service.  A Vimeo video can alternatively be used as the fallback when a specifed HTML5 video is not available.

    [video vimeo="46623590"]

### youtube
The Youtube video ID.  A Youtube video can be used as the primary video, with the HTML5 video as a fallback mechanism if the video is not available on the Youtube service.  A Youtube video can alternatively be used as the fallback when a specifed HTML5 video is not available.

    [video youtube="u1zgFlCw8Aw"]

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

    [video preload="yes"]

### autoplay
Start playing the video as soon as it's ready.

    [video autoplay="yes"]


Video Shortcode Examples
------------------------
### Video URL example

    [video mp4="http://video-js.zencoder.com/oceans-clip.mp4" ogg="http://video-js.zencoder.com/oceans-clip.ogg" webm="http://video-js.zencoder.com/oceans-clip.webm" poster="http://video-js.zencoder.com/oceans-clip.png" preload="yes" autoplay="no" width="640" height="264"]

### Video File Example using default settings

    [video file="video_clip"]

### Video File Example using custom settings, with Youtube set as a fallback
    [video file="video_clip" youtube="u1zgFlCw8Aw" preload="yes" autoplay="yes" width="1600" height="900"]


== Screenshots ==

1. Server settings
2. Skin selection
3. Playback settings
4. Compatibility settings
5. Shortcode options and examples
6. Post or page featured video interface
7. Widget interface

== Changelog ==

= 3.0 =
* Added support for Amazon S3 (and compatible file services) for video file storage and secured video serving.
* Fixed an issue where uppercase file extension videos were not recognized.
* Optimized temporary value cache to use APC, if available.

= 2.5 =
* Fixed a typo in the help section.

= 2.4 =
* Made file caching an optional setting over the legacy pseudo streaming via PHP.
* Organized settings into tabs.
* Added option to always display video download links.
* Improved fallback behavior with native skin.
* Added support for organization of videos into folders for secured video files.
* Optimized storage of featured video meta data.

= 2.3 =
* Optimized videos so that they're served from cached directories and filenames. This dramatically improves the performance on hosting providers that limit the resources allocated to PHP scripts.
* Corrected compatibility problems with "W3 Total Cache".

= 2.2 =
* Removed warning messages printed when detecting the installation path in the control panel.

= 2.1 =
* Corrected an issue where the poster image was not restored after the video plays.

= 2.0 =
* Added support for media servers.
* Added support for external video services (Youtube and Vimeo) as primary or fallback media.
* Added a native skin option to use the default player interface in the browser.
* Added localization support.
* Corrected detection of files ending with: .theora.ogv
* Corrected autoplay support

= 1.2 =
* Corrected FAQ to adhere to Wordpress.org's standards.

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

= 3.0 =
Added support for Amazon S3 (and compatible file services) for video file storage and secured video serving.  Fixed an issue where uppercase file extension videos were not recognized. Optimized temporary value cache to use APC, if available.

= 2.5 = 
Made file caching an optional setting over the legacy pseudo streaming via PHP. Organized settings into tabs. Added option to always display video download links. Improved fallback behavior with native skin. Added support for organization of videos into folders for secured video files. Optimized storage of featured video meta data. Fixed a typo in the help section.

= 2.4 = 
Made file caching an optional setting over the legacy pseudo streaming via PHP. Organized settings into tabs. Added option to always display video download links. Improved fallback behavior with native skin. Added support for organization of videos into folders for secured video files. Optimized storage of featured video meta data.

= 2.3 =
Optimized videos so that they're primarily served from cached directories and filenames. This dramatically improves the performance on hosting providers that limit the resources allocated to PHP scripts.

= 2.2 =
Removed warning messages printed when detecting the installation path in the control panel.

= 2.1 =
Corrected an issue where the poster image was not restored after the video plays.

= 2.0 =
Added support for media servers, external video services, a native skin option and localization.  Fixed autoplay and file detection issues.

= 1.2 =
Documentation correction to 1.1 release.

= 1.1 =
Adds widget support, looping and additional documentation.  Corrects tag formatting so that they are more standards compliant.

= 1.0 =
First release


== Frequently Asked Questions ==

= Why isn't it working in Firefox? =
	
On Firefox, you'll have to convert the mp4 file to OGV format to get it to play in HTML5 video format. See: <a href="http://diveintohtml5.info/video.html" target="_blank">http://diveintohtml5.info/video.html</a> for more information.

= Why isn't it working in IE or Safari? =

If your video is not playing in IE 8, then its likely your mp4 file is not in the proper encoding scheme compatible with HTML5 video. It has to be in h.264 format. See: <a href="http://diveintohtml5.info/video.html" target="_blank">http://diveintohtml5.info/video.html</a> for more information. 

= How do I secure my videos? =

We use the Secure HTML5 Video Player with another plugin, cart66, that handles access to the pages that have the videos. That way, only members can see the videos. Another option is to password protect the post where the video short-tag is used.  We personally don't have a problem with them saving the mp4, if they are on a page that they are allowed to be on. For some, it could be a feature. 

