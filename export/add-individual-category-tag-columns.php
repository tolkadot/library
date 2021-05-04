<?php
/**
 * By default, Charitable shows a "Campaign Categories" column in the
 * donations export, which lists the names of the categories that the
 * campaign is in.
 *
 * In some cases, it may be more helpful to show a separate column for
 * each category and tag, with a 1 or a 0 in each donation row to show
 * whether the donation was to a campaign in that category/tag. This
 * snippet does that, while also removing the "Campaign Categories"
 * column.
 */

/**
 * Add the column headers.
 */
add_filter( 'charitable_export_donations_columns', function( $columns ) {
	$terms = get_terms(
		[
			'taxonomy'   => [ 'campaign_category', 'campaign_tag' ],
			'hide_empty' => false,
		]
	);

	foreach ( $terms as $term ) {
		$columns[ $term->taxonomy . ':' . $term->term_id ] = $term->name;
	}

	return $columns;
} );

/**
 * Add the value in each cell.
 */
add_filter( 'charitable_export_data_key_value', function( $value, $key, $data ) {
	foreach ( [ 'campaign_category', 'campaign_tag' ] as $taxonomy ) {
		if ( 0 === strpos( $key, $taxonomy ) ) {
			$term_id = str_replace( $taxonomy . ':', '', $key );
			$terms   = wp_cache_get( $data['donation_id'], 'charitable_campaign_' . $taxonomy );

			if ( false === $terms ) {
				$donation = charitable_get_donation( $data['donation_id'] );
				$terms    = $donation->get_campaign_categories_donated_to( $taxonomy, array( 'fields' => 'ids' ) );

				if ( is_wp_error( $terms ) ) {
					$terms = array();
				}

				wp_cache_set( $data['donation_id'], $terms, 'charitable_campaign_' . $taxonomy, 10 );
			}

			$value = (int) in_array( $term_id, $terms );
		}
	}

	return $value;
}, 10, 3 );

/**
 * Remove the Campaign Categories column.
 */
add_action(
	'init',
	function() {
		$fields_api = charitable()->donation_fields();
		$fields_api->get_field( 'campaign_categories_list' )->show_in_export = false;
	}
);
