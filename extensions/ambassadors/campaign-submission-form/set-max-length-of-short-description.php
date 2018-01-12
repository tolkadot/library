<?php
/**
 * Set the maximum number of characters allowed in the
 * Short Description field in the Ambassadors campaign
 * form.
 *
 * @param  array $fields The registered list of fields.
 * @return array
 */
function ed_charitable_set_max_length_on_description( $fields ) {
	$fields['description']['attrs'] = array(
		'maxlength' => 100,
	);
	return $fields;
}

add_filter( 'charitable_campaign_submission_campaign_fields', 'ed_charitable_set_max_length_on_description' );

