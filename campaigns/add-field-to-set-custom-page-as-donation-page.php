<?php
/**
 * Create a new campaign field allowing to select the page where donations are made.
 */
add_action( 'init', function() {
	$campaign_field = new Charitable_Campaign_Field( 'donation_page', array(
		'label'      => 'Donation Page',
		'data_type'  => 'meta',
		'admin_form' => array(
			'type'     => 'select',
			'required' => false,
			'options'  => array(
				'default' => 'Use the default donation page',
				'pages'   => array(
					'options' => charitable_get_pages_options(),
					'label'   => 'Pages',
				),
			),
			'default'  => 'default',
			'section'  => 'campaign-donation-options',
		),
		'show_in_export' => true,
	) );

	/**
	 * Now, we register our new field.
	 */
	charitable()->campaign_fields()->register_field( $campaign_field );
} );

/**
 * Filter the page where users make donation to a campaign.
 *
 * @param  string $default The endpoint's URL.
 * @param  array  $args    Mixed set of arguments.
 * @return string
 */
add_filter( 'charitable_permalink_campaign_donation_page', function( $default, $args ) {
	/**
	 * Get the campaign object.
	 */
	$campaign_id = isset( $args['campaign_id'] ) ? $args['campaign_id'] : get_the_ID();
	$campaign    = charitable_get_campaign( $campaign_id );

	/**
	 * Get the campaign that received the campaign.
	 */
	if ( 'default' === $campaign->get( 'donation_page' ) ) {
		return $default;
	}

	return get_permalink( $campaign->get( 'donation_page' ) );
}, 10, 2 );