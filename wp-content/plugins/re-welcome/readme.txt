=== Re-Welcome ===
Contributors: andrewklimek
Donate link: http://ambientsleepingpill.com/
Tags: welcome, email, resend
Requires at least: 2.8.0
Tested up to: 4.4.3
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Adds a row action to resend the Welcome email

== Description ==

Adds a row action in Users > All Users that re-sends the Welcome email
with a new password generated using the standard WordPress password generator.

== Installation ==

1. Install as you would any plugin.

== Frequently Asked Questions ==

Nothing's been asked yet!

== Screenshots ==

1. A new row action on the All Users screen.  Nothing else to see!

== Changelog ==

= 1.0 =
* Added backwords compatability for changes made in WordPress 4.3... but you should upgrade WordPress!
= 0.3 =
* Removed key generation and $plaintext_pass argument of wp_new_user_notification as per 4.3 changes: https://core.trac.wordpress.org/ticket/33654
= 0.2 =
* Commented out the user role conditional
= 0.1 =
* Initial Release
