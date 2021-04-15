<?php
/**
 * Change the fundraiser form fields based on the parent campaign.
 */
add_filter( 'charitable_fundraising_submission_fields', function( $fields, $form ) {
	/**
     * Replace 579 with the ID of the parent campaign.
	 */
	if ( 579 === $form->get_parent_campaign()->ID ) {
		$fields['campaign_fields']['legend'] = 'About your fundraiser';

		if ( isset( $fields['campaign_fields']['fields']['post_content'] ) ) {
			$fields['campaign_fields']['fields']['post_content']['label'] = 'Why are you creating this fundraiser?';
		}
	}

	return $fields;
}, 10, 2 );