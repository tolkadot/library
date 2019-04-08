<?php
/**
 * Remove the campaign progress bar and donation stats in the GreenCare theme.
 */
add_action(
	'after_setup_theme',
	function() {
		remove_action( 'charitable_campaign_content_left_box', 'charitable_template_campaign_progress_bar' );
		remove_action( 'charitable_campaign_content_left_box', 'charitable_template_campaign_loop_donation_stats' );
	}
);

/**
 * The removal of the progress bar and donation stats results in an awkward gap
 * at the top. The following CSS tidies it up a little.
 *
 * Copy and paste this into the Additional CSS box in the Customizer, or add it
 * to your child theme.
 *
 * ----

.single-campaign .donate-box {
    margin: 0;
    padding: 0;
}

.single-campaign .donate-box .left-box {
    display: none;
}

.single-campaign .donate-box .right-box {
    margin-top: 0;
}

 * ----
 */
