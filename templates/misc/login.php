<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<form method="post" action="<?php the_permalink(); ?>" class="login-form">
	<div class="form-group">
		<label for="login-form-username"><?php echo __( 'Username', 'realia' ); ?></label>
		<input id="login-form-username" type="text" name="login" class="form-control" required="required">
	</div><!-- /.form-group -->

	<div class="form-group">
		<label for="login-form-password"><?php echo __( 'Password', 'realia' ); ?></label>
		<input id="login-form-password" type="password" name="password" class="form-control" required="required">
	</div><!-- /.form-group -->

	<button type="submit" name="login_form" class="button"><?php echo __( 'Log in', 'realia' ); ?></button>
</form>
