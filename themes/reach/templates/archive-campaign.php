<?php
/**
 * In this example, the normal campaign archive page, which is located at yoursite.com/campaigns
 * by default, is tweaked to show the campaigns in a different order.
 *
 * INSTRUCTIONS:
 *
 * 1. If you aren't already, install and activate the Reach child theme.
 *    @see https://www.wpcharitable.com/documentation/how-to-use-the-child-theme/
 *
 * 2. Save this template to your child theme folder as:
 *    reach-child-theme/archive-campaign.php
 */


get_header();

?>
<main id="main" class="site-main site-content cf">
	<div class="layout-wrapper">
		<div id="primary" class="content-area no-sidebar">
			<?php
			get_template_part( 'partials/banner' );
			?>
			<div class="campaigns-grid-wrapper">
				<?php
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

				reach_paging_nav( __( 'Older Campaigns', 'reach' ), __( 'Newer Campaigns', 'reach' ) );

				?>
			</div><!-- .campaigns-grid-wrapper -->
		</div><!-- #primary -->
	</div><!-- .layout-wrapper -->
</main><!-- #main -->
<?php

get_footer();
