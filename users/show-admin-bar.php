<?php
/**
 * By default, Charitable hides the admin bar from users
 * who do not have one of the `edit_posts`,
 * `manage_charitable_settings`, or `edit_products`
 * capabilities.
 *
 * The code below shows the admin bar for logged in users who do
 * not have these permissions, including registered donors
 * and campaign creators.
 */
add_filter( 'charitable_disable_admin_bar', '__return_false' );