<?php
/**
 * This example shows how you can change editable fields to non-editable,
 * and vice versa, in the campaign form.
 *
 * Non-editable fields:
 *
 * post_title - Campaign Name
 * goal - Fundraising Goal ($)
 * length - Length
 *
 * Editable fields:
 *
 * description - Short Description
 * post_content - Full Description
 * image - Featured Image
 * campaign_category - Categories
 * campaign_tag - Tags
 *
 * This example will only work on Ambassadors 2+. If you are
 * using a previous version of Ambassadors, see:
 *
 * @see https://github.com/Charitable/library/blob/master/extensions/ambassadors/legacy/change-field-editable.php
 *
 * @param   array $fields The fields.
 * @return  array
 */
add_action( 'init', function( $fields ) {
	$fields = charitable()->campaign_fields();

	// Get the goal field and make it editable.
	$goal = $fields->get_field( 'goal' );
	$goal->set( 'campaign_form', 'editable', true );

	// Get the description field and make it non-editable.
	$description = $fields->get_field( 'description' );
	$description->set( 'campaign_form', 'editable', false );
} );
