<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<?php if ( ! empty( $name ) ) : ?>
    <strong><?php echo __( 'Name', 'realia' ); ?>: </strong> <?php echo esc_attr( $name ); ?><br>
<?php endif; ?>

    <br>

<?php if ( ! empty( $email ) ) : ?>
    <strong><?php echo __( 'E-mail', 'realia' ); ?>: </strong> <?php echo esc_attr( $email ); ?><br>
<?php endif; ?>

    <br>

<?php $permalink = get_permalink( $post->ID ); ?>
<?php if ( ! empty( $permalink ) ) : ?>
    <strong><?php echo __( 'URL', 'realia' ); ?>: </strong> <?php echo esc_attr( $permalink ); ?><br>
<?php endif; ?>

    <br>

<?php if ( ! empty( $_POST['message'] ) ) : ?>
    <?php echo esc_html( $_POST['message'] ); ?>
<?php endif; ?>
