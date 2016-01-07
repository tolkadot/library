<?php 
/**
 * Remove all user fields except for the name & email fields. 
 */
function ed_remove_all_user_fields_except_for_name_email( $fields ) { 
    unset( 
        $fields[ 'city' ], 
        $fields[ 'state' ], 
        $fields[ 'country' ], 
        $fields[ 'user_description' ], 
        $fields[ 'organisation' ] 
    );
    return $fields;
}

add_filter( 'charitable_campaign_submission_user_fields', 'ed_remove_all_user_fields_except_for_name_email' );