<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<article id="page-<?php the_ID(); ?>" <?php post_class( 'submission-payment' ); ?>>
	<?php
	$payment_type = ! empty( $_POST['payment_type'] ) ? $_POST['payment_type'] : null;
	$object_id = ! empty( $_POST['object_id'] ) ? $_POST['object_id'] : null;
	$payment = ! empty( $_POST['payment'] ) ? $_POST['payment'] : false;
	$expires_month = ! empty( $_POST['expires_month'] ) ? $_POST['expires_month'] : null;
	$expires_year = ! empty( $_POST['expires_year'] ) ? $_POST['expires_year'] : null;
	?>

	<?php if ( $payment_type == 'pay_for_featured' ) : ?>
		<?php $price = get_theme_mod( 'realia_submission_featured_price', null ); ?>
		<?php $property = get_post( $object_id ); ?>

		<div class="payment-info">
			<?php echo sprintf(
				__( 'You are going to pay <strong>%s</strong> for featuring property <strong>"%s"</strong>.', 'realia' ),
				Realia_Price::format_price( $price ), $property->post_title ); ?>
		</div><!-- /.payment-info -->
	<?php elseif ( $payment_type == 'pay_for_sticky' ) : ?>
		<?php $price = get_theme_mod( 'realia_submission_sticky_price', null ); ?>
		<?php $property = get_post( $object_id ); ?>

		<div class="payment-info">
			<?php echo sprintf(
				__( 'You are going to pay <strong>%s</strong> for TOP property <strong>"%s"</strong>.', 'realia' ),
				Realia_Price::format_price( $price ), $property->post_title ); ?>
		</div><!-- /.payment-info -->
	<?php elseif ( $payment_type == 'pay_per_post' ) : ?>
		<?php $price = get_theme_mod( 'realia_submission_pay_per_post_price', null ); ?>
		<?php $property = get_post( $object_id ); ?>

		<div class="payment-info">
			<?php echo sprintf(
				__( 'You are going to pay <strong>%s</strong> for publishing property <strong>"%s"</strong>.', 'realia' ),
				Realia_Price::format_price( $price ), $property->post_title ); ?>
		</div><!-- /.payment-info -->
	<?php elseif ( $payment_type == 'package' ) : ?>
		<?php if ( ! empty( $object_id ) ) : ?>
			<?php $title = get_the_title( $object_id ); ?>
			<?php $price = get_post_meta( $object_id, REALIA_PACKAGE_PREFIX . 'price', true ); ?>

			<div class="payment-info">
				<?php echo sprintf(
					__( 'You are going to pay <strong>%s</strong> for package <strong>"%s"</strong>.', 'realia' ),
					Realia_Price::format_price( $price ), $title ); ?>
			</div><!-- /.payment-info -->
		<?php else: ?>
			<div class="payment-info">
				<?php echo __( 'Missing package.', 'realia' ); ?>
			</div><!-- /.payment-info -->
		<?php endif; ?>
	<?php else: ?>
		<div class="payment-info">
			<?php echo __( 'You are missing payment type.', 'realia' ); ?>
		</div><!-- /.payment-info -->
	<?php endif; ?>

	<?php if ( Realia_Utilities::is_paypal_enabled() && Realia_PayPal::is_active() && ! empty( $payment_type ) && ! empty( $object_id )) : ?>
		<form class="payment-form" method="post" action="?">
			<?php if ( ! empty( $payment_type ) ) : ?>
				<input type="hidden" name="payment_type" value="<?php echo esc_attr( $payment_type ); ?>">
			<?php endif; ?>

			<?php if ( ! empty( $object_id) ) : ?>
				<input type="hidden" name="object_id" value="<?php echo esc_attr( $object_id ); ?>">
			<?php endif; ?>

			<?php
			$currencies = get_theme_mod( 'realia_currencies', array() );

			if ( ! empty( $currencies ) && is_array( $currencies ) ) {
				$currency = array_shift( $currencies );
				$currency_code = $currency['code'];
			} else {
				$currency_code = 'USD';
			}
			?>

			<?php if ( get_theme_mod( 'realia_paypal_credit_card', false ) == '1' ): ?>
				<div class="payment">

					<?php if ( in_array( $currency_code, Realia_PayPal::get_supported_currencies('card') ) ): ?>

						<div class="payment-header">
							<div class="radio-wrapper">
								<input type="radio" id="payment-paypal-credit-card" name="payment" value="paypal-credit-card" <?php if ( $payment == 'paypal-credit-card' ) : ?>checked="checked"<?php endif; ?>>

								<label for="payment-paypal-credit-card">
									<span><?php echo __( 'PayPal Credit Card', 'realia' ); ?></span>
								</label>
							</div><!-- /.radio-wrapper -->
						</div><!-- /.payment-header -->

						<div class="payment-content">
							<div class="form-group payment-paypal-credit-card-first-name">
								<label for="first-name"><?php echo __( 'First Name', 'realia' ); ?></label>
								<input type="text" class="form-control" name="first_name" id="first-name" value="<?php echo ! empty( $_POST['first_name'] ) ? esc_attr( $_POST['first_name'] ) : null; ?>" >
							</div><!-- /.form-group -->

							<div class="form-group payment-paypal-credit-card-last-name">
								<label for="last-name"><?php echo __( 'Last Name', 'realia' ); ?></label>
								<input type="text" class="form-control" name="last_name" id="last-name" value="<?php echo ! empty( $_POST['last_name'] ) ? esc_attr( $_POST['last_name'] ) : null; ?>" >
							</div><!-- /.form-group -->

							<div class="form-group payment-paypal-credit-card-number">
								<label for="card-number"><?php echo __( 'Credit Card Number', 'realia' ); ?></label>
								<input type="text" class="form-control" name="card_number" id="card-number" value="<?php echo ! empty( $_POST['card_number'] ) ? esc_attr( $_POST['card_number'] ) : null; ?>" >
							</div><!-- /.form-group -->

							<div class="form-group payment-paypal-credit-card-cvv">
								<label for="cvv"><?php echo __( 'CVV', 'realia' ); ?></label>
								<input type="text" class="form-control" name="cvv" id="cvv" value="<?php echo ! empty( $_POST['cvv'] ) ? esc_attr( $_POST['cvv'] ) : null; ?>" >
							</div><!-- /.form-group -->

							<div class="form-group payment-paypal-credit-card-expires">
								<label for="expires-month"><?php echo __( 'Expires', 'realia' ); ?></label>

								<select name="expires_month" id="expires-month" class="form-control payment-paypal-credit-card-expires-month">
									<option value=""><?php echo __( 'Month', 'realia' ); ?></option>
									<?php for ( $i = 1; $i <= 12; $i++ ) : ?>
										<?php $number = sprintf( '%02s', $i ); ?>
										<option value="<?php echo esc_attr( $number ); ?>" <?php echo ( $expires_month == $number ) ? 'selected="selected"' : ''; ?>><?php echo esc_attr( $number ); ?></option>
									<?php endfor; ?>
								</select>

								<select name="expires_year" class="form-control payment-paypal-credit-card-expires-year">
									<option value=""><?php echo __( 'Year', 'realia' ); ?></option>

									<?php for ( $i = 0; $i < 10; $i++ ) : ?>
										<?php $number = date( 'Y' ) + $i; ?>
										<option value="<?php echo esc_attr( $number ); ?>" <?php echo ( $expires_year == $number ) ? 'selected="selected"' : ''; ?>><?php echo esc_attr( $number ); ?></option>
									<?php endfor; ?>
								</select>
							</div><!-- /.form-group -->
						</div><!-- /.payment-content -->
					</div><!-- /.payment -->
				<?php endif; ?>
			<?php endif; ?>

			<?php if ( in_array( $currency_code, Realia_PayPal::get_supported_currencies('account') ) ): ?>

				<div class="payment">
					<div class="payment-header">
						<div class="radio-wrapper">
							<input type="radio" id="payment-paypal-account" name="payment" value="paypal-account" <?php if ( $payment == 'paypal-account' ) : ?>checked="checked"<?php endif; ?>>

							<label for="payment-paypal-account">
								<span><?php echo __( 'PayPal Account', 'realia' ); ?></span>
							</label>
						</div><!-- /.radio-wrapper -->
					</div><!-- /.payment-header -->
				</div><!-- /.payment -->
			<?php endif; ?>

			<?php if ( in_array( $currency_code, Realia_PayPal::get_supported_currencies('account') ) || in_array( $currency_code, Realia_PayPal::get_supported_currencies('card') ) ): ?>

				<?php if ( ! empty( $payment_type ) ) : ?>
					<button type="submit" name="process-payment" class="submission-payment-process">
						<?php echo __( 'Proceed payment', 'realia' ); ?>
					</button>
				<?php endif; ?>

			<?php else: ?>
				<div class="payment-info">
					<?php echo sprintf(
						__( 'Currency <strong>%s</strong> is not supported by PayPal.', 'realia' ),
						$currency_code); ?>
				</div><!-- /.payment-info -->
			<?php endif; ?>

			<?php $submission_page_id = get_theme_mod( 'realia_submission_list_page' ); ?>

			<?php if ( ! empty( $submission_page_id ) ) : ?>
				<a href="<?php echo get_permalink( $submission_page_id); ?>" class="submission-payment-back">
					<?php echo get_the_title( $submission_page_id ); ?>
				</a>
			<?php endif; ?>
		</form>
	<?php endif; ?>
</article>
