<?php
/**
 * In this example, the campaign categories field is changed to only
 * show a few specific categories (those with term IDs 23 and 24).
 *
 * @see https://developer.wordpress.org/reference/functions/get_terms/
 */
add_action(
	'init',
	function() {
		$fields = charitable()->campaign_fields();

		/* Change the categories that users can pick from. */
		$fields->get_field( 'categories' )->set(
			'campaign_form',
			'options',
			get_terms(
				'campaign_category',
				array(
					'hide_empty' => false,
					'fields'     => 'id=>name',
					'include'    => array( 23, 24 ),
				)
			)
		);
	}
);