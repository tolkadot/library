<?php
/**
 * After a user logs in, redirect them back to the page they
 * were on right before going to the login page.
 *
 * @see     wp_login_form
 * @uses    wp_get_referer
 *
 * @param   array $args The default arguments that will be passed to wp_login_form.
 * @return  array
 */
function ed_charitable_redirect_to_previous_page_after_login( $args ) {
    $referrer = wp_get_referer();

    if ( false != $referrer ) {
        $args['redirect'] = $referrer;
    }
    
    return $args;
}

add_filter( 'charitable_login_form_args', 'ed_charitable_redirect_to_previous_page_after_login' );
