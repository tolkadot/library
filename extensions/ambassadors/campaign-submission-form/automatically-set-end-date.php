<?php

/** 
 * Remove "Length" section from campaign submission form.
 *
 * @param   string[] $fields
 * @return  string[] $fields
 */ 
function ed_charitable_remove_length_field( $fields ) {
    unset( $fields['length'] );
    return $fields;
}

add_filter( 'charitable_campaign_submission_campaign_fields', 'ed_charitable_remove_length_field' );

/** 
 * Programatically set the end date.
 *
 * @param   mixed[] $submitted
 * @param   int $campaign_id
 * @return  void
 */
function ed_charitable_set_campaign_end_date( $submitted, $campaign_id ) {

    $end_date = '2017-08-01 00:00:00';

    update_post_meta( $campaign_id, '_campaign_end_date', $end_date );

}

add_action( 'charitable_campaign_submission_save', 'ed_charitable_set_campaign_end_date', 10, 2 );