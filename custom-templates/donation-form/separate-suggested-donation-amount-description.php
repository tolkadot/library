<?php
/**
 * With this template, you can override the default way the list of donation amounts appears,
 * showing the description below the list of amounts, but above the custom amount box.
 *
 * Use this template by copying it to yourtheme/charitable/donation-form/donation-amount-list.php
 *
 * @version 1.6.44
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! array_key_exists( 'form_id', $view_args ) || ! array_key_exists( 'campaign', $view_args ) ) {
	return;
}

/* @var Charitable_Campaign */
$campaign      = $view_args['campaign'];
$form_id       = $view_args['form_id'];
$suggested     = $campaign->get_suggested_donations();
$custom        = $campaign->get( 'allow_custom_donations' );
$amount        = $campaign->get_donation_amount_in_session();
$active_period = 'once' == $campaign->get_initial_donation_period() || in_array( $campaign->get( 'recurring_donation_mode' ), array( 'variable', 'simple' ) );

if ( 0 == $amount ) {
	$amount = $campaign->get_default_donation_amount();
}

if ( empty( $suggested ) && ! $custom ) {
	return;
}

if ( count( $suggested ) ) :

	$descriptions = '';
	$amount_is_suggestion = false;
	?>
	<ul class="donation-amounts">
		<?php
		foreach ( $suggested as $suggestion ) :
			$checked  = $active_period ? checked( $suggestion['amount'], $amount, false ) : '';
			$field_id = esc_attr(
				sprintf(
					'form-%s-field-%s',
					$form_id,
					$suggestion['amount']
				)
			);
			$description = $suggestion['description'] ?? '';

			if ( strlen( $checked ) ) :
				$amount_is_suggestion = true;
				$current_description  = $description;
			endif;

			$style         = $amount_is_suggestion ? 'display:block;' : 'display:none;';
			$descriptions .= '<span data-amount="' . esc_attr( $suggestion['amount'] ) . '" style="' . $style . '">' . $description . '</span>';
			?>
			<li class="donation-amount suggested-donation-amount <?php echo strlen( $checked ) ? 'selected' : ''; ?>" data-amount="<?php echo esc_attr( $suggestion['amount'] ); ?>">
				<label for="<?php echo $field_id; ?>">
					<input
						id="<?php echo $field_id; ?>"
						type="radio"
						name="donation_amount"
						value="<?php echo esc_attr( charitable_get_currency_helper()->sanitize_database_amount( $suggestion['amount'] ) ); ?>" <?php echo $checked; ?>
					/>
					<span class="amount"><?php echo charitable_format_money( $suggestion['amount'], false, true ); ?></span>
				</label>
			</li>
			<?php
		endforeach;
		?>
		<li class="suggested-amount-description"><p><?php echo $descriptions; ?></p></li>
		<?php
		if ( $custom ) :
			$has_custom_donation_amount = $active_period && ( ! $amount_is_suggestion && $amount );
			?>
			<li class="donation-amount custom-donation-amount">
				<span class="custom-donation-amount-wrapper">
					<label for="form-<?php echo esc_attr( $form_id ); ?>-field-custom-amount">
						<input
							id="form-<?php echo esc_attr( $form_id ); ?>-field-custom-amount"
							type="radio"
							name="donation_amount"
							value="custom" <?php checked( $has_custom_donation_amount ); ?>
						/><span class="description"><?php echo apply_filters( 'charitable_donation_amount_form_custom_amount_text', __( 'Custom amount', 'charitable' ) ); ?></span>
					</label>
					<input
						type="text"
						class="custom-donation-input"
						name="custom_donation_amount"
                        placeholder="Other amount"
						value="<?php echo $has_custom_donation_amount ? $amount : ''; ?>"
					/>
				</span>
			</li>
		<?php endif ?>
	</ul><!-- .donation-amounts -->
<?php elseif ( $custom ) : ?>
	<div id="custom-donation-amount-field" class="charitable-form-field charitable-custom-donation-field-alone">
		<input
			type="text"
			class="custom-donation-input"
			name="custom_donation_amount"
			placeholder="<?php esc_attr_e( 'Enter donation amount', 'charitable' ); ?>"
			value="<?php echo $amount ? esc_attr( $amount ) : ''; ?>"
		/>
	</div><!-- #custom-donation-amount-field -->
<?php endif ?>
<script>
(function($){
	$('body').on('charitable:form:amount:changed', function( event, helper ) {
		var selected = helper.form.find('.donation-amount.selected');
		if ( selected.hasClass( 'custom-donation-amount' ) ) {
			$('.suggested-amount-description').hide();
		} else {
			$('.suggested-amount-description [data-amount]').hide();
			$('.suggested-amount-description [data-amount=' + selected.data('amount') + ']').show();
			$('.suggested-amount-description').show();
		}
	});

	$('body').on('charitable:form:loaded', function(event, helper) {
		$('body').trigger( 'charitable:form:amount:changed', helper );
		$('body').trigger( 'charitable:form:total:changed', helper );
	});
})(jQuery);
</script>
<style>
.suggested-amount-description {
	display: block;
	margin: 1em 0;
	float: left;
	clear: both;
	width: 100%;
}
.donation-amount.suggested-donation-amount {
	width: auto;
}
</style>