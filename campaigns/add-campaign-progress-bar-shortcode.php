<?php
/**
 * Add a new shortcode to display the progress bar for a particular campaign.
 *
 * After adding this, you can display a particular campaign's progress bar with
 * the following:
 *
 * [charitable_progress_bar campaign_id=123]
 */

add_shortcode( 'charitable_progress_bar', function( $atts ) {
	if ( ! isset( $atts['campaign_id'] ) ) {
		return;
	}

	ob_start();

	charitable_template_campaign_progress_bar( charitable_get_campaign( $atts['campaign_id'] ) );

	return ob_get_clean();
} );
