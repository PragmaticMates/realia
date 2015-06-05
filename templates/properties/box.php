<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<?php $is_sticky = get_post_meta( get_the_ID(), REALIA_PROPERTY_PREFIX . 'sticky', true ); ?>

<div class="property-box">
    <div class="property-box-image <?php if ( ! has_post_thumbnail() ) { echo "without-image"; } ?>">

        <a href="<?php the_permalink(); ?>" class="property-box-image-inner <?php if ( ! empty( $agent ) ) : ?>has-agent<?php endif; ?>">
            <?php if ( has_post_thumbnail() ) : ?>
                <?php the_post_thumbnail(); ?>
            <?php endif; ?>

            <?php $is_featured = get_post_meta( get_the_ID(), REALIA_PROPERTY_PREFIX . 'featured', true ); ?>
            <?php $is_reduced = get_post_meta( get_the_ID(), REALIA_PROPERTY_PREFIX . 'reduced', true ); ?>

            <?php if ( $is_featured && $is_reduced ) : ?>
                <span class="property-badge"><?php echo __( 'Featured', 'realia' ); ?> / <?php echo __( 'Reduced', 'realia' ); ?></span>
            <?php elseif ( $is_featured ) : ?>
                <span class="property-badge"><?php echo __( 'Featured', 'realia' ); ?></span>
            <?php elseif ( $is_reduced ) : ?>
                <span class="property-badge"><?php echo __( 'Reduced', 'realia' ); ?></span>
            <?php endif; ?>

            <?php if ( $is_sticky ) : ?>
                <span class="property-badge property-badge-sticky"><?php echo __( 'TOP', 'realia' ); ?></span>
            <?php endif; ?>
        </a>
    </div><!-- /.property-image -->

    <div class="property-box-content">
        <h3 class="property-box-title">
            <a href="<?php the_permalink(); ?>"><?php the_title() ?></a>
        </h3><!-- /.property-box-title -->

        <?php $type = Realia_Query::get_property_type_name(); ?>
        <?php if ( ! empty( $type ) ) : ?>
            <div class="property-box-type">
                <?php echo wp_kses( $type, wp_kses_allowed_html( 'post' ) ); ?>
            </div><!-- /.property-box-type -->
        <?php endif; ?>

        <?php $price = Realia_Price::get_property_price(); ?>
        <?php if ( ! empty( $price ) ) : ?>
            <div class="property-box-price">
                <?php echo wp_kses( $price, wp_kses_allowed_html( 'post' ) ); ?>
            </div><!-- /.property-box-price -->
        <?php endif; ?>

	    <div class="property-box-read-more">
		    <a href="<?php the_permalink(); ?>"><?php echo __( 'Read More', 'realia' ); ?></a>
	    </div><!-- /.property-box-price -->
    </div><!-- /.property-box-content -->
</div>
