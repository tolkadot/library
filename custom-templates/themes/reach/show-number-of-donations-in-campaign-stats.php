<?php
/**
 * By default, Reach shows the number of donors to a campaign, not the
 * number of donations. This means that if a donor made multiple donations,
 * the number of donors would be less than the number of donations.
 *
 * The following example shows how to change the campaign pages in Reach
 * to show the number of donations instead of the number of donors.
 *
 * INSTRUCTIONS:
 *
 * 1. If you aren't already, install and activate the Reach child theme.
 *    @see https://www.wpcharitable.com/documentation/how-to-use-the-child-theme/
 *
 * 2. Save this template to your child theme folder as:
 *    reach-child-theme/charitable/campaign/stats.php
 */

if ( ! defined( 'ABSPATH' ) ) { exit; } // Exit if accessed directly

/** @var Charitable_Campaign */
$campaign = $view_args['campaign'];
$report   = new Charitable_Donation_Report(
	array(
		'report_type' => 'donations',
		'campaigns'   => array( $campaign->ID ),
	)
);

?>
<ul class="campaign-stats">
	<li class="campaign-raised">
		<span><?php echo charitable_format_money( $campaign->get_donated_amount() ); ?></span>
		<?php _e( 'Donated', 'reach' ); ?>
	</li>
	<?php if ( $campaign->has_goal() ) : ?>
		<li class="campaign-goal">
			<span><?php echo charitable_format_money( $campaign->get_goal() ); ?></span>
			<?php _e( 'Goal', 'reach' ); ?>
		</li>
	<?php endif ?>
	<li class="campaign-backers">
		<span><?php echo $report->get_report( 'donations' ); ?></span>
		<?php _e( 'Donations', 'reach' ); ?>
	</li>
</ul>
