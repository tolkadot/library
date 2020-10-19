<?php
/**
 * This code snippet shows you how to change the label or description
 * of the recipient type options that are shown to campaign creators.
 *
 * Default values for Personal Causes:
 *
 * label: "Your Cause"
 * description: "You are raising money for a personal cause. You will receive the donations."
 *
 * Default values for Your Organization:
 *
 * label: "Our Organization"
 * description: "You are raising money for us. All donations to your fundraising campaign will help our cause."
 */

/**
 * In this example we're changing the "Personal Causes"  recipient type.
 */
function ed_charitable_change_personal_recipient_type_details( $details ) {
	$details['label']       = 'Your Preferred Label for Personal Causes';
	$details['description'] = 'Your preferred description for Personal Causes';
	return $details;
}

add_filter( 'charitable_ambassadors_personal_recipient_type', 'ed_charitable_change_personal_recipient_type_details' );

/**
 * In this example we're changing the "Your Organization"  recipient type.
 */
function ed_charitable_change_ambassador_recipient_type_details( $details ) {
	$details['label']       = 'Your Preferred Label for Your Organization';
	$details['description'] = 'Your preferred description for Your Organization';
	return $details;
}

add_filter( 'charitable_ambassadors_ambassador_recipient_type', 'ed_charitable_change_ambassador_recipient_type_details' );

/**
 * In this example we're changing the "Fundraisers for existing campaigns"  recipient type.
 */
function ed_charitable_change_fundraiser_recipient_type_details( $details ) {
	$details['label']       = 'Your Preferred Label for Another Campaign';
	$details['description'] = 'Your preferred description for Another Campaign';
	return $details;
}

add_filter( 'charitable_ambassadors_fundraiser_recipient_type', 'ed_charitable_change_fundraiser_recipient_type_details' );
