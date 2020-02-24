<?php
/**
 * By default, Charitable disables admin access for users
 * who do not have one of the `edit_posts`,
 * `manage_charitable_settings`, or `edit_products`
 * capabilities.
 *
 * The code below enables access for logged in users who do
 * not have these permissions, including registered donors
 * and campaign creators.
 */
add_filter( 'charitable_disable_admin_access', '__return_false' );