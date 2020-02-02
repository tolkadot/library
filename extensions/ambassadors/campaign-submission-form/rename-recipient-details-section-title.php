<?php
/**
 * Change the header of the "Who Are You Raising Money For?" section to something else.
 *
 * In this case, we've changed it to "Who do you want to fundraise for?".
 */
function ed_rename_recipient_details_section_title( $fields ) {
	if ( array_key_exists( 'recipient_fields', $fields ) ) {
		$fields['recipient_fields']['legend'] = __( 'Who do you want to fundraise for?', 'your-namespace' );
	}

    return $fields;
}

add_filter( 'charitable_campaign_submission_fields', 'ed_rename_recipient_details_section_title' );
