<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<?php $instance['per_row'] = ! empty( $instance['per_row'] ) ? $instance['per_row'] : 3; ?>

<?php echo wp_kses( $args['before_widget'], wp_kses_allowed_html( 'post' ) ); ?>

<?php if ( ! empty( $instance['title'] ) ) : ?>
    <?php echo wp_kses( $args['before_title'], wp_kses_allowed_html( 'post' ) ); ?>
    <?php echo esc_attr( $instance['title'] ); ?>
    <?php echo wp_kses( $args['after_title'], wp_kses_allowed_html( 'post' ) ); ?>
<?php endif; ?>

<?php if ( have_posts() ) : ?>
	<div class="type-<?php echo esc_attr( $instance['display'] ); ?>">
		<?php while( have_posts() ) : the_post(); ?>
			<?php include Realia_Template_Loader::locate( 'properties/small' ); ?>
		<?php endwhile; ?>
	</div>
<?php else : ?>
	<div class="alert alert-warning">
		<?php echo __( 'No properties found.', 'realia' ); ?>
	</div><!-- /.alert -->
<?php endif; ?>

<?php echo wp_kses( $args['after_widget'], wp_kses_allowed_html( 'post' ) ); ?>
