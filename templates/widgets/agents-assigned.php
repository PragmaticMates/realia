<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<?php echo wp_kses( $args['before_widget'], wp_kses_allowed_html( 'post' ) ); ?>

<?php if ( ! empty( $instance['title'] ) ) : ?>
    <?php echo wp_kses( $args['before_title'], wp_kses_allowed_html( 'post' ) ); ?>
    <?php echo esc_attr( $instance['title'] ); ?>
    <?php echo wp_kses( $args['after_title'], wp_kses_allowed_html( 'post' ) ); ?>
<?php endif; ?>

<?php if ( have_posts() ) :?>
	<div class="type-small item-per-row-1">
		<?php $index = 0; ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<div class="agents-container">
				<?php include Realia_Template_Loader::locate( 'agents/small' ); ?>
			</div><!-- /.property-container -->

			<?php $index++; ?>
		<?php endwhile; ?>
	</div>
<?php endif; ?>

<?php echo wp_kses( $args['after_widget'], wp_kses_allowed_html( 'post' ) ); ?>
