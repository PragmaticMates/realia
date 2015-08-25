<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<?php if ( get_option( 'users_can_register' ) ) : ?>
	<form method="post" action="<?php the_permalink(); ?>" class="register-form">
		<div class="form-group">
			<label for="register-form-name"><?php echo __( 'Username', 'realia' ); ?></label>
			<input id="register-form-name" type="text" name="name" class="form-control" required="required">
		</div><!-- /.form-group -->

		<div class="form-group">
			<label for="register-form-email"><?php echo __( 'E-mail', 'realia' ); ?></label>
			<input id="register-form-email" type="email" name="email" class="form-control" required="required">
		</div><!-- /.form-group -->

		<div class="form-group">
			<label for="register-form-password"><?php echo __( 'Password', 'realia' ); ?></label>
			<input id="register-form-password" type="password" name="password" class="form-control" required="required">
		</div><!-- /.form-group -->

		<div class="form-group">
			<label for="register-form-retype"><?php echo __( 'Retype Password', 'realia' ); ?></label>
			<input id="register-form-retype" type="password" name="password_retype" class="form-control" required="required">
		</div><!-- /.form-group -->

		<?php $terms = get_theme_mod( 'realia_submission_terms' ); ?>

		<?php if ( ! empty( $terms ) ) : ?>
			<div class="checkbox terms-conditions-input">
				<input id="register-form-conditions" type="checkbox" name="agree_terms">

				<label for="register-form-conditions">
					<?php echo sprintf( __( 'I agree with <a href="%s">terms & conditions</a>', 'realia' ), get_permalink( $terms ) ); ?>
				</label>
			</div><!-- /.form-group -->
		<?php endif; ?>

		<button type="submit" class="button" name="register_form"><?php echo __( 'Sign Up', 'realia' ); ?></button>
	</form>
<?php else: ?>
	<div class="alert alert-warning">
		<?php echo __( 'Registrations are not allowed.', 'realia' ); ?>
	</div><!-- /.alert -->
<?php endif; ?>
