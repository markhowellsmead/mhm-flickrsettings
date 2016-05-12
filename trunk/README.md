=== Plugin Name ===
Contributors: markhowellsmead
Donate link: https://www.paypal.me/mhmli
Tags: flickr, settings, options
Requires at least: 4.0
Tested up to: 4.5.2
Stable tag: 1.1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Provides WordPress backend settings fields to store Flickr configuration information.

== Description ==

Install and activate the plugin as usual. The activated plugin adds three fields to the Media settings page in the admin area: key (`flickr_key`), secret (`flickr_secret`) and user ID (`flickr_userid`) for use with the Flickr API. The values saved to these fields can then be used via the WordPress `get_option()` function in a theme or unrelated plugin.

== Installation ==

1. Upload the plugin folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Add your Flickr user data using the fields available under Settings » Media.

== Changelog ==

= 1.1.0 =
* Sanitize input and output of field data.

= 1.0.3 =
* Confirm compatibility with WordPress 4.5.2.
* Correct version numbers.

= 1.0.2 =
* Confirm compatibility with WordPress 4.5.
* Update version number and add plugin URL to trunk.

= 1.0.1 =
* Improve readme and plugin tags.

= 1.0 =
* Initial version.
