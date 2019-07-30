<?php
/**
 * This function adds a select field to the campaign submission form
 * where campaign creators can select their parent campaign.
 *
 * @param  array                                $fields
 * @param  Charitable_Ambassadors_Campaign_Form $form
 * @return array
 */
add_filter(
	'charitable_campaign_submission_campaign_fields',
	function( $fields, $form ) {
		/**
		 * Add the field to the array of fields.
		 */
		$fields['post_parent'] = array(
			'value'     => $form->get_campaign_value( 'post_parent' ),
			'priority'  => 1, // Adjust this to change where the field is inserted.
			'data_type' => 'core',
			'label'     => __( 'School', 'custom-namespace' ),
			'required'  => true,
			'clear'     => false,
			'type'      => 'select',
			'options'   => ed_charitable_get_parent_campaign_options(),
		);

		unset( $fields['campaign_category'] );

		return $fields;
	},
	10,
	2
);

/**
 * This function shows how you can get a list of possible parent campaigns.
 * In this example, we check for currently active campaigns with the `meta_query`
 * argument, and limit it to only getting campaigns which are in the 'school'
 * category with the `tax_query` argument. We also limit it to only return
 * campaigns that do not have a parent campaign (`post_parent` => 0).
 *
 * @return array
 */
function ed_charitable_get_parent_campaign_options() {
	$campaigns = Charitable_Campaigns::query( array(
		'meta_query' => array(
			'relation' => 'OR',
			array(
				'key'       => '_campaign_end_date',
				'value'     => date( 'Y-m-d H:i:s' ),
				'compare'   => '>=',
				'type'      => 'datetime',
			),
			array(
				'key'       => '_campaign_end_date',
				'value'     => 0,
				'compare'   => '=',
			),
		),
		'tax_query' => array(
			array(
				'taxonomy'  => 'campaign_category',
				'field'     => 'slug',
				'terms'     => array( 'school' ),
			),
		),
        'fields' => 'ids',
		'posts_per_page' => -1,
		'post_parent' => 0,
	) );

	return array_reduce(
		$campaigns->posts,
		function( $options, $campaign_id ) {
			$options[ $campaign_id ] = get_post_field( 'post_title', $campaign_id );

			return $options;
		},
		array()
	);
}