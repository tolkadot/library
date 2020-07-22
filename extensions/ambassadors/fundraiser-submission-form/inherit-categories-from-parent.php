<?php
/**
 * Get the category IDs from the parent campaign and add them to the submission data.
 *
 * @param  array  $submitted Data that was submitted.
 * @param  array  $fields    Set of fields to be saved.
 * @param  object $form      The campaign/fundraiser form object.
 * @return array
 */
add_filter( 'charitable_fundraiser_submission_values', function( $submitted, $fields, $form ) {
	if ( is_a( $form, 'Charitable_Ambassadors_Fundraiser_Form' ) ) {
		$submitted['categories'] = wp_get_object_terms( $form->get_parent_campaign()->ID, 'campaign_category', array( 'fields' => 'ids' ) );
	}

	return $submitted;
}, 10, 3 );

/**
 * Add the categories to the field map.
 *
 * @param  array  $fields Set of fields to be saved.
 * @param  array  $data   Data that was submitted.
 * @param  object $form   The campaign/fundraiser form object.
 * @return array
 */
add_filter( 'charitable_campaign_submission_fields_map', function( $fields, $data, $form ) {
	if ( is_a( $form, 'Charitable_Ambassadors_Fundraiser_Form' ) ) {
		$fields['taxonomy']['categories'] = 'multi-checkbox';
	}

	return $fields;
}, 10, 3 );