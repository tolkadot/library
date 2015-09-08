<?php 
/**
 * Remove "organisation" from the profile form.
 */
function ed_remove_organisation_from_profile( $fields ) {
    unset( $fields[ 'organisation' ] );
    return $fields;
}

add_filter( 'charitable_user_fields', 'ed_remove_organisation_from_profile' );