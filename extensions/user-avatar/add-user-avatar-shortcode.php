<?php
/**
 * Add a [user_avatar] shortcode.
 *
 * You can get a specific user's avatar by setting a user_id param,
 * or use the default, which is to show the current logged in user's
 * avatar.
 * 
 * @param  array $atts Mixed shortcode attributes.
 * @return string
 */
function ed_charitable_get_avatar( $atts ) {
    $user_id = array_key_exists( 'user_id', $atts ) ? $atts['user_id'] : get_current_user_id();

    if ( ! $user_id ) {
        return '';
    }

    return charitable_get_user( $user_id )->get_avatar();
}

add_shortcode( 'user_avatar', 'ed_charitable_get_avatar' );