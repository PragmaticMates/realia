<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<?php $style = ! empty( $instance['style'] ) ? $instance['style'] : ''; ?>
<?php $style_slug = ! empty( $_GET['map-style'] ) ? $_GET['map-style'] : $style; ?>

<?php echo wp_kses( $args['before_widget'], wp_kses_allowed_html( 'post' ) ); ?>

<div class="map-wrapper" >
    <div class="map" id="map"
         style="height: <?php echo esc_attr( $instance['height'] ); ?>"
         data-transparent-marker-image="<?php echo plugins_url( 'realia' ); ?>/assets/img/transparent-marker-image.png"
         data-latitude="<?php echo esc_attr( $instance['latitude'] ); ?>"
         data-longitude="<?php echo esc_attr( $instance['longitude'] ); ?>"
		 data-geolocation="<?php if ( ! empty( $instance['geolocation'] ) && $instance['geolocation'] == 'on') : ?>true<?php else : ?>false<?php endif; ?>"
         data-zoom="<?php echo esc_attr( $instance['zoom'] ); ?>"
         data-styles='<?php echo Realia_Google_Maps_Styles::get_style( $style_slug ); ?>'>
    </div>
</div><!-- /.map-wrapper -->

<?php echo wp_kses( $args['after_widget'], wp_kses_allowed_html( 'post' ) ); ?>
