<?php
/**
 * As of Ambassadors 2.0, you may not need this snippet anymore. Instead,
 * you can specify a parent for the campaign form with the 'parent_id'
 * parameter:
 *
 * [charitable_submit_campaign parent_id=1188]
 *
 * However, this does require a few changes:
 *
 * 1. Under Charitable > Settings > Ambassadors, "Fundraisers for existing campaigns"
 *    should be enabled.
 * 2. The parent campaign you choose (ID 1188 in this example), needs to have
 *    peer-to-peer fundraising enabled.
 * 3. The fundraiser submission form is designed to be a little simpler than the regular
 *    campaign form, with less fields and the ability to set defaults for certain fields.
 */

/**
 * This example shows how to set the parent of every campaign that is submitted.
 *
 * @param   array $values
 * @return  array $values
 */
add_filter( 'charitable_campaign_submission_core_data', function( $values ) {
	$values['post_parent'] = 1188; // Replace 1188 with the ID of your parent campaign.
	return $values;
});

/**
 * Ensure the post parent field is saved.
 *
 * This is required in Ambassadors 2+.
 *
 * @param  array $fields The map of fields to be saved.
 * @return array
 */
add_filter( 'charitable_campaign_submission_fields_map', function( $fields ) {
	$fields['core']['post_parent'] = 'number';
	return $fields;
});