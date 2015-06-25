<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<article id="page-<?php the_ID(); ?>" <?php post_class( 'submission-payment' ); ?>>
	<?php
	$payment_type = ! empty( $_POST['payment_type'] ) ? $_POST['payment_type'] : null;
	$object_id = ! empty( $_POST['object_id'] ) ? $_POST['object_id'] : null;
	$payment_gateway = ! empty( $_POST['payment_gateway'] ) ? $_POST['payment_gateway'] : false;
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

	<?php if ( ! empty( $payment_type ) && ! empty( $object_id )) : ?>
		<form class="payment-form" method="post" action="?">
			<?php if ( ! empty( $payment_type ) ) : ?>
				<input type="hidden" name="payment_type" value="<?php echo esc_attr( $payment_type ); ?>">
			<?php endif; ?>

			<?php if ( ! empty( $object_id) ) : ?>
				<input type="hidden" name="object_id" value="<?php echo esc_attr( $object_id ); ?>">
			<?php endif; ?>

			<?php $payment_gateways = apply_filters( 'realia_payment_gateways', array() ); ?>

			<?php if ( is_array( $payment_gateways ) && count( $payment_gateways ) > 0 ) : ?>
				<?php foreach ( $payment_gateways as $gateway ) : ?>
					<div class="payment">
						<div class="payment-header">
							<div class="radio-wrapper">
								<input type="radio" id="payment-<?php echo $gateway['id']; ?>" name="payment_gateway" value="<?php echo $gateway['id']; ?>" <?php if ( $payment_gateway == $gateway['id'] ) : ?>checked="checked"<?php endif; ?>>

								<label for="payment-<?php echo $gateway['id']; ?>">
									<span><?php echo $gateway['title']; ?></span>
								</label>
							</div><!-- /.radio-wrapper -->
						</div><!-- /.payment-header -->

						<?php if ( ! empty ( $gateway['content'] ) ) : ?>
							<div class="payment-content"><?php echo $gateway['content']; ?></div><!-- /.payment-content -->
						<?php endif; ?>
					</div><!-- /.payment -->
				<?php endforeach; ?>

				<?php if ( ! empty( $payment_type ) ) : ?>
					<button type="submit" name="process-payment" class="submission-payment-process">
						<?php echo __( 'Proceed payment', 'realia' ); ?>
					</button>
				<?php endif; ?>
			<?php else : ?>
				<div class="alert alert-warning">
					<?php echo __( 'No payment gateways found.', 'realia' ); ?>
				</div><!-- /.alert -->
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
