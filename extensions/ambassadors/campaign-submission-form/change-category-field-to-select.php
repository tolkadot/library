<?php
/**
 * By default, the campaign category and tag fields in Charitable Ambassadors
 * are set up as a multi-checkbox field. This allows people to select
 * one or more categories.
 *
 * If you want to change the field to a dropdown, with users only being able
 * to select one category, the following code snippet shows how to do that.
 */

function ed_change_taxonomy_fields_to_select( $fields ) {
	$fields['campaign_tag']['type'] = 'select';
	$fields['campaign_category']['type'] = 'select';

	// If you would like to add an intial option that isn't a tag/category, uncomment this:
	// $fields['campaign_tag']['options'] = array( '' => 'Select tag' ) + $fields['campaign_tag']['options'];
	// $fields['campaign_category']['options'] = array( '' => 'Select category' ) + $fields['campaign_category']['options'];

	return $fields;
}

add_filter( 'charitable_campaign_submission_campaign_fields', 'ed_change_taxonomy_fields_to_select' );

/**
 * This function is required currently to make sure the values are saved.
 *
 * In Ambassadors 1.2, this is no longer required.
 */
function ed_save_taxonomy_field_value_as_array( $submitted ) {
	if ( isset( $submitted['campaign_category'] ) && ! is_array( $submitted['campaign_category'] ) ) {
		$submitted['campaign_category'] = array( $submitted['campaign_category'] );
	}

	if ( isset( $submitted['campaign_tag'] ) && ! is_array( $submitted['campaign_tag'] ) ) {
		$submitted['campaign_tag'] = array( $submitted['campaign_tag'] );
	}

	return $submitted;
}

add_filter( 'charitable_campaign_submission_taxonomy_data', 'ed_save_taxonomy_field_value_as_array' );
