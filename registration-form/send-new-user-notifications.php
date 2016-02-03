<?php 
/**
 * Send the new user notification after someone registers 
 * through the Charitable registration form.
 */
add_action( 'charitable_after_insert_user', 'wp_send_new_user_notifications' );