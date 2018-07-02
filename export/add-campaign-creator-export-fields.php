<?php
/**
 * Add additional campaign fields related to the campaign creator.
 *
 * @param  array $columns The list of columns.
 * @return array
 */
function ed_charitable_add_creator_campaign_fields() {
	$creator_fields = array(
		'organization' => __( 'Campaign Creator Organization', 'your-namespace' ),
		'address'      => __( 'Campaign Creator Address', 'your-namespace' ),
		'address_2'    => __( 'Campaign Creator Address 2', 'your-namespace' ),
		'city'         => __( 'Campaign Creator City', 'your-namespace' ),
		'state'        => __( 'Campaign Creator State', 'your-namespace' ),
		'postcode'     => __( 'Campaign Creator Postcode', 'your-namespace' ),
		'country'      => __( 'Campaign Creator Country', 'your-namespace' ),
		'phone'        => __( 'Campaign Creator Phone', 'your-namespace' ),
	);
	
	foreach ( $creator_fields as $field => $label ) {
		$field = new Charitable_Campaign_Field( 'campaign_creator_' . $field, array(
			'label'          => $label,
			'admin_form'     => false,
			'show_in_export' => true,
			'email_tag'      => false,
			'value_callback' => 'ed_charitable_get_campaign_creator_field',
		) );

		charitable()->campaign_fields()->register_field( $field );
	}
}

add_action( 'init', 'ed_charitable_add_creator_campaign_fields' );

/**
 * Get a particular user field for a campaign's creator.
 *
 * @since  1.6.5
 *
 * @param  Charitable_Campaign $campaign The campaign object.
 * @param  string              $key      The meta key.
 * @return string
 */
function ed_charitable_get_campaign_creator_field( Charitable_Campaign $campaign, $key ) {
	if ( function_exists( 'charitable_get_campaign_creator_field' ) ) {
		return charitable_get_campaign_creator_field( $campaign, $key );
	}

	$creator = charitable_get_user( $campaign->get_campaign_creator() );
	$key     = str_replace( 'campaign_creator_', '', $key );

	return $creator->get( $key );
}
