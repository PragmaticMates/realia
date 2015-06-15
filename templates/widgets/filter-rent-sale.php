<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<?php $input_titles = ! empty( $instance['input_titles'] ) ? $instance['input_titles'] : 'labels'; ?>

<?php echo wp_kses( $args['before_widget'], wp_kses_allowed_html( 'post' ) ); ?>

<?php if ( ! empty( $instance['title'] ) ) : ?>
	<?php echo wp_kses( $args['before_title'], wp_kses_allowed_html( 'post' ) ); ?>
	<?php echo esc_attr( $instance['title'] ); ?>
	<?php echo wp_kses( $args['after_title'], wp_kses_allowed_html( 'post' ) ); ?>
<?php endif; ?>

<div class="tabs">
	<ul class="tabs-navigation">
		<li class="rent active"><a href="#<?php echo esc_attr( $args['widget_id'] ); ?>-rent"><?php echo __( 'For Rent', 'realia' ); ?></a></li>
		<li class="sale"><a href="#<?php echo esc_attr( $args['widget_id'] ); ?>-sale"><?php echo __( 'For Sale', 'realia' ); ?></a></li>
	</ul>

	<div class="tabs-content">
		<div class="tab-content rent-tab active" id="<?php echo esc_attr( $args['widget_id'] ); ?>-rent">
			aaa
		</div>
		<div class="tab-content sale-tab" id="<?php echo esc_attr( $args['widget_id'] ); ?>-sale">
			bbb
		</div>
	</div>
</div>

<?php echo wp_kses( $args['after_widget'], wp_kses_allowed_html( 'post' ) ); ?>