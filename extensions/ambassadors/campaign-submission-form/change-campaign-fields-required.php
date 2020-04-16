<?php
/**
 * This example shows how to change which fields are required/not required
 * in the Campaign Form.
 *
 * This example will work on Ambassadors 2.0+.
 */
add_action(
	'init',
	function() {
		$fields = charitable()->campaign_fields();

		/**
		 * You can adapt this to change any field in the Campaign Details section
		 * by swapping the key. The following keys are available:
		 *
		 * - post_title
		 * - description
		 * - goal
		 * - end_date
		 * - categories
		 * - tags
		 * - post_content
		 * - image
		 * - suggested_donations
		 * - allow_custom_donations
		 *
		 * In the example below, we change the 'description' and 'post_content' fields
		 * to not be required, and we change the 'goal' field to be required.
		 */

		/* Change both the Short Description & Full Description fields to not be required. */
		$fields->get_field( 'description' )->set( 'campaign_form', 'required', false );
		$fields->get_field( 'post_content' )->set( 'campaign_form', 'required', false );

		/* Change the Goal to be required */
		$fields->get_field( 'goal' )->set( 'campaign_form', 'required', true );
	}
);
