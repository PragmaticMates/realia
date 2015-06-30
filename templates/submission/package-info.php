<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<?php if ( get_theme_mod( 'realia_submission_type', 'free' ) == 'packages' ) :   ?>
	<div class="realestate-package-info">
		<?php $current_package = Realia_Packages::get_package_for_user( get_current_user_id() ); ?>

		<?php if ( empty( $current_package ) ) : ?>
			<p class="package-info">
				<?php echo __( 'Site is using packages. Before you can post property, please upgrade your package.', 'realia' ); ?>
			</p>
		<?php else : ?>
			<div class="package-info">
				<p><?php echo sprintf( __( 'You are using <strong>%s</strong> package.', 'realia' ), esc_attr( $current_package->post_title ) ); ?></p>

				<?php $date = Realia_Packages::get_package_valid_date_for_user( get_current_user_id() ); ?>
				<?php if ( Realia_Packages::is_package_valid_for_user( get_current_user_id() ) ) : ?>

					<?php echo sprintf( __( 'Your subscription is valid until <strong>%s</strong>.', 'realia' ), esc_attr( $date ) ); ?>

					<?php $remaining = Realia_Packages::get_remaining_properties_count_for_user( get_current_user_id() ); ?>

					<?php if ( 'unlimited' === $remaining ) : ?>
						<?php echo __( 'You can add <strong>unlimited</strong> amount of items', 'realia' ); ?>
					<?php elseif ( (int) $remaining < 0 ) :   ?>
						<?php echo sprintf( __( 'You can not add any properties because you spent all of your available properties. Change your package. First <strong>%s</strong> items has been disabled from listing.', 'realia' ), esc_attr( abs( $remaining ) ) ); ?>
					<?php else : ?>
						<?php echo sprintf( __( 'You can add <strong>%s</strong> items.', 'realia' ), esc_attr( $remaining ) ); ?>
					<?php endif; ?>
				<?php else : ?>
					<?php echo sprintf( __( 'Your subscription already expired at <strong>%s</strong>. All your items has been deactivated until you pay for new subscription.', 'realia' ), $date ); ?>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<?php $packages = Realia_Packages::get_packages(); ?>
		<?php $package_payment_id = get_theme_mod( 'realia_submission_payment_page', false ); ?>

		<?php if ( ! $package_payment_id ) :   ?>
			<p><?php echo __( 'Payment page has been not set.', 'realia' ); ?></p>
		<?php endif; ?>

		<?php if ( ! empty( $packages ) && ! empty( $package_payment_id ) ) : ?>
			<form method="post" action="<?php echo esc_attr( get_permalink( $package_payment_id ) ); ?>">
				<input type="hidden" name="payment_type" value="package">

				<div class="form-group">
					<select name="object_id">
						<option value=""><?php echo __( 'Select Package', 'realia' ); ?></option>

						<?php foreach ( $packages as $package_id => $package_title ) : ?>
							<option value="<?php echo esc_attr( $package_id ); ?>" <?php if ( ! empty( $current_package->ID ) && $current_package->ID == $package_id ) : ?>selected="selected"<?php endif; ?>>
								<?php echo esc_attr( Realia_Packages::get_full_package_title( $package_id ) ); ?>
							</option>
						<?php endforeach; ?>
					</select>
				</div><!-- /.form-group -->

				<button type="submit" class="btn btn-block" name="change-package"><?php echo __( 'Upgrade', 'realia' ); ?></button>
			</form>
		<?php endif; ?>

	</div><!-- /.realestate-package-info -->
<?php endif; ?>
