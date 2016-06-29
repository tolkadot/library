<?php

/**
 * This example shows how to set the parent of every campaign that is submitted.
 *
 * @param   array $values
 * @return  array $values
 */
function ed_set_submitted_campaign_parent( $values ) {

	$values['post_parent'] = 1188; // Replace 1188 with the ID of your parent campaign.

	return $values;
}

add_filter( 'charitable_campaign_submission_core_data', 'ed_set_submitted_campaign_parent' );
