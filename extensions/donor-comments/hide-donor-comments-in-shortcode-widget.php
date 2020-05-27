<?php
/**
 * By default, the Donor Comments extension adds the comment to the
 * output of the Donors widget and Donors shortcode. If you would prefer
 * not to include it, you can remove it with the snippet below.
 */
add_action(
	'after_setup_theme',
	function() {
		if ( ! class_exists( 'Charitable_Donor_Comments_Donation' ) ) {
			return;
		}

		remove_action( 'charitable_donor_loop_after_donor', array( Charitable_Donor_Comments_Donation::get_instance(), 'show_donor_comment_in_widget' ), 10, 2 );
	}
);
