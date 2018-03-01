<?php

/**
 * Add donors to a specific MailChimp interest group.
 *
 * @param  array $args The array of data to be sent to MailChimp.
 * @return array
 */
add_filter( 'charitable_newsletter_connect_mailchimp_subscriber_data', function( $args ) {

	/**
	 * Interests are added as an array of key=>value pairs,
	 * with the key set to the id of the interest group
	 * you would like to add the user to.
	 *
	 * To find the id of your interest group, use the MailChimp
	 * API playground:
	 *
	 * https://us1.api.mailchimp.com/playground/
	 *
	 * 1. Enter your API key.
	 * 2. Click on "Lists".
	 * 3. For the list you are adding donors to, click on "Subresources" and choose "interest-categories".
	 * 4. For the category your interest is part of, click on "Subresources" and choose "interests".
	 * 5. Click on the name of the interest you would like to use.
	 * 6. Use the "id" field in the array below.
	 */
	$args['interests'] = array(
		'a4a9efd690' => true,
	);

	return $args;
} );
