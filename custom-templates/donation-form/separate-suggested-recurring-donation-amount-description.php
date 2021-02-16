<?php
/**
 * With this template, you can override the default way the list of recurring donation amounts
 * appears, showing the description below the list of amounts, but above the custom amount box.
 *
 * This template is designed to be used alongside the one for one-time donation amounts.
 *
 * Use this template by copying it to yourtheme/charitable/donation-form/recurring-donation-amount-list.php
 *
 * @see https://github.com/Charitable/library/blob/master/custom-templates/donation-form/separate-suggested-donation-amount-description.php
 *
 * @version 1.6.44
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! array_key_exists( 'form_id', $view_args ) || ! array_key_exists( 'campaign', $view_args ) ) {
	return;
}

/**
 *  The form ID.
 *
 * @var string
 */
$form_id = $view_args['form_id'];

/**
 * The Campaign object.
 *
 * @var object Charitable_Campaign
 */
$campaign = $view_args['campaign'];

/**
 * The donation amount.
 *
 * @var false|array
 */
$amount = $campaign->get_donation_amount_in_session();

/**
 * The suggested amounts.
 *
 * @var array
 */
$suggested_recurring_donations = $campaign->get( 'suggested_recurring_donations' );

/**
 * Does this campaign support recurring donations?
 *
 * @var boolean
 */
$supports_custom_donations = $campaign->get( 'allow_custom_recurring_donations' );

/**
 * The donation period.
 *
 * @var string
 */
$donation_period = $campaign->get( 'recurring_donation_period' );

/**
 * The adverb for the donation period.
 *
 * @var string
 */
$donation_period_adverb = charitable_recurring_get_donation_period_adverb( $donation_period );

/**
 * The donation length.
 *
 * @var string
 */
$donation_length = $campaign->get( 'recurring_donation_length' );

if ( 0 === $amount ) {
	/**
	 * Use the default one-time donation amount initially.
	 */
	$amount = method_exists( $campaign, 'get_default_donation_amount' ) ? $campaign->get_default_donation_amount() : $amount;

	/**
	 * Filter the default donation amount.
	 *
	 * @since 1.1.0
	 *
	 * @param float|int           $amount   The amount to be filtered. $0 by default.
	 * @param Charitable_Campaign $campaign The instance of `Charitable_Campaign`.
	 */
	$amount = apply_filters( 'charitable_recurring_default_donation_amount', $amount, $campaign );
}

$active_period = 'once' !== $campaign->get_initial_donation_period();

/**
 * If no suggested donations and custom donations are not allowed, then quit.
 */
if ( empty( $suggested_recurring_donations ) && ! $supports_custom_donations ) {
	return;
}


if ( count( $suggested_recurring_donations ) > 0 ) :

	$descriptions = '';
	$amount_is_suggestion = false;
	?>
	<ul class="recurring-donation-amounts donation-amounts">
		<?php
		foreach ( $suggested_recurring_donations as $suggestion ) :
			$checked  = $active_period && checked( $suggestion['amount'], $amount, false );
			$field_id = esc_attr(
				sprintf(
					'recurring-form-%s-field-%s',
					$form_id,
					$suggestion['amount']
				)
			);
			$description = $suggestion['description'] ?? '';

			if ( strlen( $checked ) ) {
				$amount_is_suggestion = true;
				$current_description  = $description;
			}

			// Add donation period to suggested amount.
			$suggestion['period'] = $donation_period;
			// Add donation length to suggested amout.
			$suggestion['length'] = $donation_length;

			$style         = $amount_is_suggestion ? 'display:block;' : 'display:none;';
			$descriptions .= '<span data-amount="' . esc_attr( $suggestion['amount'] ) . '" style="' . $style . '">' . $description . '</span>';
			?>

			<li class="donation-amount suggested-donation-amount <?php echo strlen( $checked ) ? 'selected' : ''; ?>" data-amount="<?php echo esc_attr( $suggestion['amount'] ); ?>">
				<label for="<?php echo esc_attr( $field_id ); ?>">
					<input
						id="<?php echo esc_attr( $field_id ); ?>"
						type="radio"
						name="donation_amount"
						data-recurring="true"
						data-value="<?php echo esc_attr( charitable_get_currency_helper()->sanitize_database_amount( $suggestion['amount'] ) ); ?>"
						value="<?php echo esc_attr( charitable_get_currency_helper()->sanitize_database_amount( $suggestion['amount'] ) ); ?>"
						<?php echo esc_attr( $checked ); ?>
					/>
					<span class="amount"><?php echo charitable_format_money( $suggestion['amount'], false, true ); ?></span>
				</label>
			</li>
			<?php
		endforeach;
		?>
		<li class="suggested-amount-description"><p><?php echo $descriptions; ?></p></li>
		<?php
		if ( $supports_custom_donations ) :
			$has_custom_donation_amount = $active_period && ! $amount_is_suggestion && $amount;
			?>
			<li class="donation-amount custom-donation-amount <?php echo esc_attr( $has_custom_donation_amount ? 'selected' : '' ); ?>">
				<span class="custom-donation-amount-wrapper">
					<label for="recurring-form-<?php echo esc_attr( $form_id ); ?>-field-custom-recurring-amount">
						<input
							id="recurring-form-<?php echo esc_attr( $form_id ); ?>-field-custom-recurring-amount"
							type="radio"
							name="donation_amount"
							value="recurring-custom"
							<?php checked( $has_custom_donation_amount ); ?>
						/>
						<span class="description">

						<?php echo wp_kses_post( apply_filters( 'charitable_recurring_donation_amount_form_custom_amount_text', sprintf( esc_html__( 'Custom amount', 'charitable-recurring' ), $donation_period_adverb ) ) ); ?>
						</span>
					</label>
					<input
						type="text"
						class="custom-donation-input"
						name="custom_recurring_donation_amount"
						value="<?php echo esc_attr( $has_custom_donation_amount ? $amount : '' ); ?>" />
				</span>
			</li>

		<?php endif ?>

	</ul><!-- .donation-amounts -->

	<?php elseif ( $supports_custom_donations ) : ?>

	<div class="charitable-form-field custom-recurring-donation-amount-field charitable-custom-donation-field-alone">
		<input
			type="text"
			class="custom-donation-input"
			name="custom_recurring_donation_amount"
			placeholder="<?php printf( esc_attr( 'Enter %s donation amount', 'charitable-recurring' ), esc_attr( $donation_period_adverb ) ); ?>"
			value="<?php echo esc_attr( $amount ? $amount : '' ); ?>" />
	</div><!-- #custom-donation-amount-field -->

<?php endif ?>
