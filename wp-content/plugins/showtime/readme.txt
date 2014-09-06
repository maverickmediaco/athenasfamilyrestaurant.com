 === Plugin Name ===
Contributors: Carter Fort
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=V8B3ED9PGP9CC
Plugin Name: Showtime
Version: 3.0
Tags: schedule, programming, webcast, television, radio, ajax, jquery
Requires at least: 3.0
Tested up to: 3.4.2
Stable tag: trunk

Allows you to easily manage and display a rotating programming schedule. Useful for any kind of schedule that repeats weekly.

== Description ==

The Showtime plugin allows you to easily manage and display a rotating programming schedule. It was originally built for a college radio station, but it could be used for any kind of schedule that repeats weekly.

Showtime takes the current time and displays the name of whatever show/event you've placed in the timeslot. If there's no show/event, it displays a custom off-air message. You also have the option of displaying the name of the upcoming show/event.

## New in 3.0

This release is a ground-up re-write, so the code is (hopefully) an awful lot better than it was before. The sorting method is better for the days of the week, and the front-end presentation is no longer a horrible, horrible jQuery hack! Everything is more efficient, better-looking, and the shortcode output doesn't sit on top of all the content anymore. Also, there's some snazzy new AJAX-ification stuff going on in the Schedule manager.

Current 2.1 users, don't worry; there's a database upgrader built-in, so you don't have to re-enter all of your current show schedules. **That being said**, be sure to backup your database before running the upgrade; it will remove the _showtime database table when it's done. I'm almost certain it won't break.

Timezone support is improved, but please email me if you're still having trouble.

## Current Feature List

* Easily create editable shows/events by settings start/end times.
* Customizable "Off-Air Message".
* Hide or display upcoming show/event.
* Customizable CSS in the admin panel.
* Shut it Down: Temporarily replace your schedule with off-air message.
* Display your schedule using template tag, widget or shortcode.
* Link your event/show names to URLs.
* Upload images for events/shows and display them in the Now Playing widget.
* New shortcode to easily add the Now Playing widget to Posts and Pages.
* Support for databased that don't necessarily use the wp_ prefix.


== Installation ==


1. Upload the Showtime directory to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. You have a few display options:
	* Template tag: `<?php if (function_exists('showme_showtime')) echo showme_showtime(); ?>`
	* A Widget in your Appearance->Widgets settings
	* You can display your entire schedule, broken down by days of the week, on a page or post with the [showtime-schedule] shortcode

After installation, be sure to set your timezone city. This ensures consistency in your entry/display times.

== Frequently Asked Questions ==

Q: I just installed Showtime, and I don't see a place to add new shows. Why?

A: You **absolutely** have to set your timezone city for the plugin to work properly, as it has to have a local timezone to set its clock to. It's in your General Settings page.

Q: After I upload an image and click "Use as Featured Image" for a show, nothing happens.

A: You have to click the "Insert Into Post" button, *not* "Use as Featured Image."