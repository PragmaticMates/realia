<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<div class="property-small">
	<div class="property-small-image <?php if ( ! has_post_thumbnail() ) { echo 'without-image'; } ?>">
		<?php if ( has_post_thumbnail() ) :   ?>
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'thumbnail' ); ?>
			</a>
		<?php endif; ?>
	</div><!-- /.property-small-image -->

	<div class="property-small-content">
		<?php $type = Realia_Query::get_property_type_name(); ?>
		<?php if ( ! empty( $type ) ) : ?>
			<div class="property-small-type">
				<?php echo wp_kses( $type, wp_kses_allowed_html( 'post' ) ); ?>
			</div><!-- /.property-small-type -->
		<?php endif; ?>

		<h3 class="property-small-title">
			<a href="<?php the_permalink(); ?>"><?php the_title() ?></a>
		</h3><!-- /.property-small-title -->

		<?php $price = Realia_Price::get_property_price(); ?>
		<?php if ( ! empty( $price ) ) : ?>
			<div class="property-small-price">
				<?php echo wp_kses( $price, wp_kses_allowed_html( 'post' ) ); ?>
			</div><!-- /.property-small-price -->
		<?php endif; ?>
	</div><!-- /.property-small-content -->
</div><!-- /.property-small -->
