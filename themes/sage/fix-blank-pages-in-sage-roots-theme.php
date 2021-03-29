<?php
/**
 * Due to the way views are handled in Sage, some Charitable pages
 * may show complete blank, like the donation receipt, campaign
 * donation page, etc.
 *
 * To fix this, add the code below to sage/resources/functions.php
 */
array_map(
	'add_filter',
	array(
		'charitable_campaign_donation_page_template',
		'charitable_campaign_widget_page_template',
		'charitable_donation_processing_page_template',
		'charitable_donation_receipt_page_template',
		'charitable_email_preview_page_template',
		'charitable_email_verification_page_template',
		'charitable_forgot_password_page_template',
		'charitable_reset_password_page_template',
		'charitable_action_required_page_template',
		'charitable_campaign_editing_page_template',
		'charitable_campaign_submission_page_template',
		'charitable_fundraiser_editing_page_template',
		'charitable_fundraiser_submission_page_template',
		'charitable_my_campaigns_page_template',
		'charitable_recurring_donation_page_template',
		'charitable_recurring_donations_page_template',
	),
	array_fill( 0, 16, '\\App\filter_templates' )
);
