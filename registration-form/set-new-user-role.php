<?php 

/**
 * Set the role of users who register through the Charitable
 * registration form shortcode.
 *
 * @param   array $values
 * @return  array $values
 */
function ed_charitable_set_user_registration_role( $values ) {

    if ( array_key_exists( 'role', $values ) ) {
        return $values;
    }

    /** 
     * Replace 'campaign_creator' with the role you would like 
     * the users to have. Note that the role must be
     * registered already.
     *
     * @see https://codex.wordpress.org/Function_Reference/add_role
     *
     * The 'campaign_creator' role is available if you have
     * Charitable Ambassadors installed and activated.     
     */ 
    $values['role'] = 'campaign_creator';

    return $values;

}

add_filter( 'charitable_registration_values', 'ed_charitable_set_user_registration_role' );
