<?php
/**
 * In this example, the campaign creator's name is added to the Donations
 * export, so it's easy to see who created the campaign that received the
 * donation when exporting the donations.
 */
add_action( 'init', function() {
	$field = new Charitable_Donation_Field( 'campaign_creator', array(
		'label'          => 'Campaign Creator',
		'admin_form'     => false,
		'show_in_export' => true,
		'email_tag'      => false,
		'value_callback' => function( Charitable_Abstract_Donation $donation ) {
			$creator_id = get_post_field( 'post_author', current( $donation->get_campaign_donations() )->campaign_id );
			return charitable_get_user( $creator_id );
		},
	) );

	charitable()->donation_fields()->register_field( $field );
} );