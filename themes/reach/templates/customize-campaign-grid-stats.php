<?php
/**
 * In this example, the stats shown in the campaign grid for each campaign
 * are customized to include the goal amount as well as a progress bar.
 *
 * INSTRUCTIONS:
 *
 * 1. If you aren't already, install and activate the Reach child theme.
 *    @see https://www.wpcharitable.com/documentation/how-to-use-the-child-theme/
 *
 * 2. Save this template to your child theme folder as:
 *    reach-child-theme/charitable/campaign-loop/stats.php
 */

if ( ! defined( 'ABSPATH' ) ) { exit; } // Exit if accessed directly


/**
 * @var 	Charitable_Campaign
 */
$campaign = $view_args['campaign'];

/**
 * Get the progress as a number. i.e. 66 = 66%.
 *
 * If the campaign does not have a goal, this will equal false.
 *
 * @var 	int|false
 */
$progress = $campaign->get_percent_donated_raw();

if ( false === $progress ) :
	return;
endif;

?>
<ul class="campaign-stats">
	<li class="campaign-goal">
		<span><?php echo charitable_format_money( $campaign->get_goal() ) ?></span>
		<?php _e( 'Goal', 'reach' ) ?>
	</li>
	<li class="campaign-pledged">
		<span><?php echo charitable_format_money( $campaign->get_donated_amount() ) ?></span>
		<?php _e( 'Pledged', 'reach' ) ?>
	</li>
	<li class="campaign-time-left">
		<?php echo $campaign->get_time_left() ?>
	</li>
</ul>
<div class="campaign-progress">
	<?php charitable_template_campaign_progress_bar( $campaign ); ?>
	<span><?php printf( __( 'Funded %s<sup>%</sup>', 'reach' ), number_format( $progress, 2 ) ) ?></span>
</div>
