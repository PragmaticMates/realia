<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<article <?php post_class( 'property-row' ); ?>>
	<a href="<?php the_permalink(); ?>" class="property-row-image">
        <?php $is_sticky = get_post_meta( get_the_ID(), REALIA_PROPERTY_PREFIX . 'sticky', true ); ?>
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

		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'property-row-thumbnail' ); ?>
		<?php endif; ?>
	</a><!-- /.property-row-image -->

	<div class="property-row-content">
		<div class="property-row-content-inner">
			<div class="property-row-main">
				<h2 class="property-row-title entry-title">
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</h2>

				<?php $location = Realia_Query::get_property_location_name(); ?>
				<?php if ( ! empty( $location ) ) : ?>
					<div class="property-row-location">
						<?php echo wp_kses( $location, wp_kses_allowed_html( 'post' ) ); ?>
					</div>
				<?php endif; ?>

				<div class="property-row-body">
					<p><?php the_excerpt(); ?></p>
				</div><!-- /.property-row-body -->
			</div><!-- /.property-row-main -->

			<?php $price = get_post_meta( get_the_ID(), REALIA_PROPERTY_PREFIX . 'price', true ); ?>
			<?php $area = get_post_meta( get_the_ID(), REALIA_PROPERTY_PREFIX . 'home_area', true ); ?>
			<?php $status = Realia_Query::get_property_status_name(); ?>
			<?php $type = Realia_Query::get_property_type_name(); ?>

			<?php if ( ! empty( $price ) || ! empty( $area ) || ! empty( $status ) || ! empty( $type ) ) :?>
				<div class="property-row-meta">
					<?php if ( ! empty( $price ) ) : ?>
						<span class="property-row-meta-item property-row-meta-item-price">
							<span><?php echo __( 'Price', 'realia' ); ?>:</span>
							<strong><?php echo Realia_Price::get_property_price(); ?></strong>
						</span><!-- /.property-box-meta-item -->
					<?php endif; ?>

					<?php if ( ! empty( $type ) ) : ?>
						<span class="property-row-meta-item property-row-meta-item-type">
							<span><?php echo __( 'Type', 'realia' ); ?>:</span>
							<strong><?php echo esc_attr( $type ); ?></strong>
						</span><!-- /.property-box-meta-item -->
					<?php endif; ?>

					<?php if ( ! empty( $area ) ) : ?>
						<span class="property-row-meta-item property-row-meta-item-area">
							<span><?php echo __( 'Area', 'realia' ); ?>:</span>
							<strong><?php echo esc_attr( $area ); ?> <?php echo get_theme_mod( 'realia_measurement_area_unit', 'sqft' ); ?></strong>
						</span><!-- /.property-box-meta-item -->
					<?php endif; ?>

					<?php if ( ! empty( $status ) ) : ?>
						<span class="property-row-meta-item property-row-meta-item-status">
							<span><?php echo __( 'Status', 'realia' ); ?>:</span>
							<strong><?php echo esc_attr( $status ); ?></strong>
						</span><!-- /.property-box-meta-item -->
					<?php endif; ?>
				</div><!-- /.property-row-meta -->
			<?php endif; ?>
		</div><!-- /.property-row-content-inner -->
	</div><!-- /.property-row-content -->
</article>
