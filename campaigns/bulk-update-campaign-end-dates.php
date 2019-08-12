<?php
/**
 * Bulk-update the end date for all campaigns.
 */
add_action(
	'admin_init',
	function() {
		// Retrieve all campaigns.
		$campaigns = Charitable_Campaigns::query(
			[
				'posts_per_page' => -1,
				'post_status'    => 'any',
				'fields'         => 'ids',
			]
		);

		foreach ( $campaigns->posts as $campaign_id ) {

			// Uncomment the following line to set the campaigns to never end.
			// update_post_meta( $campaign_id, '_campaign_end_date', 0 );

			// Uncomment the following line to set campaigns to end at midnight on December 1, 2022
			// update_post_meta( $campaign_id, '_campaign_end_date', '2022-12-01 23:59:59' );
		}
	}
);