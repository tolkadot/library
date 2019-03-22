<?php
/**
 * After a donation, automatically subscribe a donor to a particular list.
 *
 * This requires the Newsletter Connect extension. By default, Newsletter Connect
 * allows you to automatically add subscribers to a list, but there may be cases
 * where you have one list which should be opt-in (i.e. the donor needs to check a
 * box to be subscribed), but another list which they should be automatically added
 * to. This snippet allows you to do that.
 */
add_action( 'charitable_after_donation', function( Charitable_Donation_Processor $processor ) {

	$providers_helper = Charitable_Newsletter_Connect_Providers::get_instance();
	$user             = $processor->get_donation_data_value( 'user' );

	/**
	 * You will need to add your newsletter list's ID here.
	 */
	$list_id = 'your_newsletter_list_id';

	/**
	 * Add your provider id here.
	 *
	 * Options:
	 * - campaign_monitor
	 * - mailchimp
	 * - mailerlite
	 * - mailpoet
	 * - mailpoet3
	 * - mailster
	 */
	$provider_id = 'mailchimp';

	$provider = $providers_helper->get_provider_object( $provider_id );

	if ( ! $provider ) {
		return;
	}

	return $provider->add_subscriber( $user, $list_id );
} );