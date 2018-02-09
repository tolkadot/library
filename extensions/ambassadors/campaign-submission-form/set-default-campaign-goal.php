<?php
/**
 * Set a default campaign goal.
 */
function ed_charitable_ambassadors_set_default_campaign_goal( $fields, $form ) {
	if ( false !== $form->get_campaign() ) {
		return $fields;
	}

	if ( empty( $fields['goal']['value'] ) ) {
		$fields['goal']['value'] = 500;
	}

    return $fields;
}

add_filter( 'charitable_campaign_submission_campaign_fields', 'ed_charitable_ambassadors_set_default_campaign_goal', 10, 2 );
