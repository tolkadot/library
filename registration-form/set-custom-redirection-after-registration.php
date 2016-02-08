<?php 
/**
 * Send the user to a custom page after they have registered.
 *
 * @param   array[] $fields
 * @return  array[] $fields
 */
function en_set_custom_redirection_after_registration( $fields ) {
    if ( ! isset( $_GET[ 'redirect_to' ] ) ) {
        $fields[ 'redirect_to' ] = array(
            'type' => 'hidden', 
            'priority' => 2,
            'value' => 'http://your-custom-url.com/' // This should be the URL you want the user to be redirected to.
        );
    }    

    return $fields;
}

add_filter( 'charitable_user_registration_fields', 'en_set_custom_redirection_after_registration' );