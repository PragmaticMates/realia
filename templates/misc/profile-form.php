<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<?php if ( method_exists( 'Realia_Utilities', 'protect' ) ) { Realia_Utilities::protect(); } ?>

<?php $user = wp_get_current_user(); ?>
<?php $data = get_userdata( $user->ID ); ?>

<form method="post" action="<?php the_permalink(); ?>" class="change-profile-form">
	<div class="form-group">
		<label for="change-profile-form-nickname"><?php echo __( 'Nickname', 'realia' ); ?></label>
		<input id="change-profile-form-nickname" type="text" name="nickname" class="form-control" value="<?php echo ! empty( $data->nickname ) ? esc_attr( $data->nickname ) : ''; ?>" required="required">
	</div><!-- /.form-group -->

	<div class="form-group">
		<label for="change-profile-form-email"><?php echo __( 'E-mail', 'realia' ); ?></label>
		<input id="change-profile-form-email" type="email" name="email" class="form-control" value="<?php echo ! empty( $data->user_email ) ? esc_attr( $data->user_email ) : ''; ?>"  required="required">
	</div><!-- /.form-group -->

	<div class="form-group">
		<label for="change-profile-form-first-name"><?php echo __( 'First name', 'realia' ); ?></label>
		<input id="change-profile-form-first-name" type="text" name="first_name" class="form-control" value="<?php echo ! empty( $data->first_name ) ? esc_attr( $data->first_name ) : ''; ?>">
	</div><!-- /.form-group -->

	<div class="form-group">
		<label for="change-profile-form-last-name"><?php echo __( 'Last name', 'realia' ); ?></label>
		<input id="change-profile-form-last-name" type="text" name="last_name" class="form-control" value="<?php echo ! empty( $data->last_name ) ? esc_attr( $data->last_name ) : ''; ?>">
	</div><!-- /.form-group -->

	<button type="submit" name="change_profile_form" class="button"><?php echo __( 'Change Profile', 'realia' ); ?></button>
</form>
