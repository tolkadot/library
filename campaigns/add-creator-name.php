<?php
/**
 * Display the campaign creator's name on the campaign page and in the campaign grid/list.
 *
 * @param Charitable_Campaign $campaign The campaign object.
 */
function ed_charitable_display_campaign_creator_name( Charitable_Campaign $campaign ) {
	$name = charitable_get_user( $campaign->get_campaign_creator() )->get_name();
	?>
<p>Creator: <?php echo $name ?></p>
	<?php
}

add_action( 'charitable_campaign_content_loop_after', 'ed_charitable_display_campaign_creator_name', 4 );
add_action( 'charitable_campaign_content_before', 'ed_charitable_display_campaign_creator_name', 8 );