<?php
/**
 * In this example, the category field is changed to be a required field,
 * and it's turned into a select field (it won't work as a multi-checkbox)
 * field.
 */
 add_action(
	'init',
	function() {
		$fields = charitable()->campaign_fields();

		/* Change the categories that users can pick from. */
		$options = array_merge(
			array( '' => 'Select a category' ),
			array(
				'Categories' => get_terms(
					'campaign_category',
					array(
						'hide_empty' => false,
						'fields'     => 'id=>name',
					)
				)
			)
		);

		$fields->get_field( 'categories' )->set( 'campaign_form', 'options', $options );
		$fields->get_field( 'categories' )->set( 'campaign_form', 'type', 'select' );
		$fields->get_field( 'categories' )->set( 'campaign_form', 'required', true );
	}
);