<?php
/*
Plugin Name: Re-Welcome
Description: Re-Send welcome email from the Users list
Version:     1.0
Author:      Andrew J Klimek
Author URI:  https://readycat.net
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Re-Welcome is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
Re-Welcome is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with Re-Welcome. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

function rewelcome_new_user_notification() {
	
	$nonce = isset( $_REQUEST['_wpnonce'] ) ? $_REQUEST['_wpnonce'] : null;
	if ( wp_verify_nonce( $nonce, 'rewelcome' ) && !empty( $_REQUEST['user'] ) ) {
		
		$uid = $_REQUEST['user'];
		
		// wp_new_user_notification was totally changed in 4.3.  This is the old method
		if ( version_compare( $GLOBALS['wp_version'], '4.3', '<' ) ) {
			
			$key = wp_generate_password( 20, false );
			wp_update_user(array('ID' => $uid, 'user_pass' => $key));
			wp_new_user_notification($uid, $key);
		}
		else {// New method
			wp_new_user_notification( $uid, null, 'both' );
		}
		add_action( 'admin_notices', function() { echo '<div class="updated">Email Sent!</div>'; });
	}
}
add_action( 'load-users.php', 'rewelcome_new_user_notification' );

function rewelcome_row_action($actions, $user_object) {
	// if ( $user_object->has_cap( 'manage_options' ) ) return $actions;// Don't show for admins (or anyone with manage_options capability)
	$nonce = wp_create_nonce( 'rewelcome' ); 
	$link = admin_url( "users.php?user={$user_object->ID}&_wpnonce=$nonce" );
	$actions['rewelcome'] = "<a href='$link'>Resend Welcome Email</a>";

	return $actions;
}
add_filter( 'user_row_actions', 'rewelcome_row_action', 10, 2 );