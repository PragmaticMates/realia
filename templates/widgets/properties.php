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
	<div class="type-<?php echo esc_attr( $instance['display'] ); ?> item-per-row-<?php echo esc_attr( $instance['per_row'] ); ?>">
		<?php if ( $instance['per_row'] != 1 ) : ?>
			<div class="properties-row">
		<?php endif; ?>

		<?php $index = 0; ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<div class="property-container">
				<?php include Realia_Template_Loader::locate( 'properties/' . $instance['display'] ); ?>
			</div><!-- /.property-container -->

			<?php if ( ( $index + 1 ) % $instance['per_row'] == 0 && $instance['per_row'] != 1 && Realia_Query::loop_has_next() ) : ?>
				</div><div class="properties-row">
			<?php endif; ?>

			<?php $index++; ?>
		<?php endwhile; ?>

		<?php if ( $instance['per_row'] != 1 ) : ?>
			</div><!-- /.properties-row -->
		<?php endif; ?>
	</div>
<?php else : ?>
	<div class="alert alert-warning">
		<?php echo __( 'No properties found.', 'realia' ); ?>
 	</div><!-- /.alert -->
<?php endif; ?>

<?php echo wp_kses( $args['after_widget'], wp_kses_allowed_html( 'post' ) ); ?>
