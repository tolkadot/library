<?php
/**
 * In this example, the normal campaign grid that is shown on the Homepage
 * template is tweaked to show the campaigns in a different order.
 *
 * INSTRUCTIONS:
 *
 * 1. If you aren't already, install and activate the Reach child theme.
 *    @see https://www.wpcharitable.com/documentation/how-to-use-the-child-theme/
 *
 * 2. Save this template to your child theme folder as:
 *    reach-child-theme/partials/campaign-grid.php
 */

if ( ! reach_has_charitable() ) :
	return;
endif;

?>
<div class="campaigns-grid-wrapper">
	<h3 class="section-title"><?php _e( 'Latest Projects', 'reach' ); ?></h3>
	<?php
	$campaigns = Charitable_Campaigns::query();

	/**
	 * Get the campaigns to be displayed.
	 *
	 * See https://gist.github.com/ericnicolaas/9f9ce566236ccc67919df9f1472503c8
	 * for examples of how to filter & order the campaigns.
	 *
	 * Note: Charitable_Campaigns is a wrapper around the WP_Query class
	 * in WordPress. Any arguments that can be passed to WP_Query can be
	 * passed to Charitable_Campaigns.
	 *
	 * @see https://developer.wordpress.org/reference/classes/wp_query/
	 */
	$campaigns = Charitable_Campaigns::query(
		array(
			'orderby' => 'title',
			'order'   => 'ASC',
		)
	);

	/**
	 * This renders a loop of campaigns that are displayed with the
	 * `reach/charitable/campaign-loop.php` template file.
	 *
	 * @see charitable_template_campaign_loop
	 */
	charitable_template_campaign_loop( $campaigns );

	wp_reset_postdata();

	if ( $campaigns->max_num_pages > 1 ) :
		?>
		<p class="center">
			<a class="button button-alt" href="<?php echo esc_url( home_url( apply_filters( 'reach_previous_campaigns_link', '/campaigns/page/2/' ) ) ); ?>">
				<?php echo apply_filters( 'reach_previous_campaigns_text', __( 'Previous Campaigns', 'reach' ) ); ?>
			</a>
		</p>
		<?php
	endif;
	?>
</div><!-- .campaigns-grid-wrapper -->
