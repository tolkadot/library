<?php
/**
 * Make the 'goal' field required in the campaign form.
 *
 * @param   array $fields All of the fields to be displayed in the form.
 * @return  array
 */
function ed_charitable_make_goal_field_required( $fields ) {
    $fields['goal']['required'] = true;
    return $fields;
}
add_filter( 'charitable_campaign_submission_campaign_fields', 'ed_charitable_make_goal_field_required' );