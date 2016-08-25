<?php 

/** 
 * By default, users are redirected to the login page if they try to access
 * the campaign form without being logged in.
 *
 * This example shows how to change the redirection to the registration page.
 *
 * NOTE: The redirection back to the campaign form will not work correctly on
 * versions of Charitable prior to 1.4.2.
 *
 * @param   string $redirect_url
 * @return  string
 */
function ed_redirect_logged_out_campaign_form_to_registration( $redirect_url ) {

    $url = charitable_get_permalink( 'registration_page' );
    $url = add_query_arg( array(
        'redirect_to' => charitable_get_permalink( 'campaign_submission_page' )
    ), $url );

    return $url;

}

add_filter( 'charitable_campaign_submission_logged_out_redirect', 'ed_redirect_logged_out_campaign_form_to_registration' );