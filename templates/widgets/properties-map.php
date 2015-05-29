<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<?php $style = ! empty( $instance['style'] ) ? $instance['style'] : ''; ?>
<?php $style_slug = ! empty( $_GET['map-style'] ) ? $_GET['map-style'] : $style; ?>

<div class="map-wrapper">
    <div class="map" id="map"
         data-transparent-marker-image="<?php echo plugins_url( 'realia' ); ?>/assets/img/transparent-marker-image.png"
         data-latitude="<?php echo esc_attr( $instance['latitude'] ); ?>"
         data-longitude="<?php echo esc_attr( $instance['longitude'] ); ?>"
         data-zoom="<?php echo esc_attr( $instance['zoom'] ); ?>"
         data-styles='<?php echo Realia_Google_Maps_Styles::get_style( $style_slug ); ?>'>
    </div>
</div><!-- /.map-wrapper -->
