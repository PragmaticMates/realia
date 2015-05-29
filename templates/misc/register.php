<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<form method="post" action="<?php the_permalink(); ?>">
	<div class="form-group">
		<label><?php echo __( 'Username', 'realia' ); ?></label>
		<input type="text" name="name" class="form-control" required="required">
	</div><!-- /.form-group -->

	<div class="form-group">
		<label><?php echo __( 'E-mail', 'realia' ); ?></label>
		<input type="email" name="email" class="form-control" required="required">
	</div><!-- /.form-group -->

	<div class="form-group">
		<label><?php echo __( 'Password', 'realia' ); ?></label>
		<input type="password" name="password" class="form-control" required="required">
	</div><!-- /.form-group -->

	<div class="form-group">
		<label><?php echo __( 'Retype Password', 'realia' ); ?></label>
		<input type="password" name="password_retype" class="form-control" required="required">
	</div><!-- /.form-group -->


	<button type="submit" name="register_form" class="btn"><?php echo __( 'Sign Up', 'realia' ); ?></button>
	<?php $terms = get_theme_mod( 'realia_submission_terms' ); ?>

	<?php if ( ! empty( $terms ) ) : ?>
		<div class="form-group terms-conditions-input">
			<label>
				<input type="checkbox" name="agree_terms">
				<?php echo sprintf( __( 'I agree with <a href="%s">terms & conditions</a>', 'realia' ), get_permalink( $terms ) ); ?>
			</label>
		</div><!-- /.form-group -->
	<?php endif; ?>
</form>
