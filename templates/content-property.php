<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php $gallery = get_post_meta( get_the_ID(), REALIA_PROPERTY_PREFIX . 'gallery', true ); ?>

	<?php if ( ! empty( $gallery ) ) : ?>
		<div class="property-gallery">
			<div class="property-gallery-preview">
				<?php echo wp_get_attachment_image( key( $gallery ) , 'full' );?>

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
			</div>

			<ul class="property-gallery-index">
				<?php $index = 0; ?>
				<?php foreach ( $gallery as $id => $src ) : ?>
					<li <?php echo ( $index == 0 ) ? 'class="active"' : ''; ?>>
						<a rel="<?php echo esc_url( $src ); ?>"><?php echo __( 'Show', 'realia' ); ?></a>
						<?php $index++; ?>
					</li>
				<?php endforeach; ?>
			</ul>
		</div><!-- /.property-gallery -->
	<?php endif; ?>

	<header class="entry-header">
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
		endif;
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<div class="property-overview">
			<dl>
				<?php $price = Realia_Price::get_property_price(); ?>
				<?php if ( ! empty( $price ) ) : ?>
					<dt><?php echo __( 'Price', 'realia' )?></dt><dd><?php echo wp_kses( $price, wp_kses_allowed_html( 'post' ) ); ?></dd>
				<?php endif; ?>

				<?php $id = get_post_meta( get_the_ID(), REALIA_PROPERTY_PREFIX . 'id', true ); ?>
				<?php if ( ! empty( $id ) ) : ?>
					<dt><?php echo __( 'ID', 'realia' ); ?></dt><dd><?php echo esc_attr( $id ); ?></dd>
				<?php endif; ?>

				<?php $year_built = get_post_meta( get_the_ID(), REALIA_PROPERTY_PREFIX . 'year_built', true ); ?>
				<?php if ( ! empty( $year_built ) ) : ?>
					<dt><?php echo __( 'Year built', 'realia' ); ?></dt><dd><?php echo esc_attr( $year_built ); ?></dd>
				<?php endif; ?>

				<?php $type = Realia_Query::get_property_type_name(); ?>
				<?php if ( ! empty ( $type ) ) : ?>
					<dt><?php echo __( 'Type', 'realia' ); ?></dt><dd><?php echo esc_attr( $type ); ?></dd>
				<?php endif; ?>

				<?php $sold = get_post_meta( get_the_ID(), REALIA_PROPERTY_PREFIX . 'sold', true ); ?>
				<dt><?php echo __( 'Sold', 'realia' ); ?></dt>
				<dd>
					<?php if ( ! empty( $sold ) ) : ?>
						<?php echo __( 'Yes', 'realia' ); ?>
					<?php else : ?>
						<?php echo __( 'No', 'realia' ); ?>
					<?php endif; ?>
				</dd>

				<?php $contract = get_post_meta( get_the_ID(), REALIA_PROPERTY_PREFIX . 'contract', true ); ?>

				<?php if ( ! empty ( $contract ) ) : ?>
					<dt><?php echo __( 'Contract', 'realia' ); ?></dt>
					<dd>
						<?php if ( $contract == REALIA_CONTRACT_RENT ) : ?>
							<?php echo __( 'Rent', 'realia' ); ?>
						<?php elseif ( $contract == REALIA_CONTRACT_SALE ) : ?>
							<?php echo __( 'Sale', 'realia' ); ?>
						<?php endif; ?>
					</dd>
				<?php endif; ?>

				<?php $status = Realia_Query::get_property_status_name(); ?>
				<?php if ( ! empty ( $status ) ) : ?>
					<dt><?php echo __( 'Status', 'realia' ); ?></dt><dd><?php echo esc_attr( $status ); ?></dd>
				<?php endif; ?>

                <?php $location = Realia_Query::get_property_location_name(); ?>
				<?php if ( ! empty ( $location ) ) : ?>
					<dt><?php echo __( 'Location', 'realia' ); ?></dt><dd><?php echo wp_kses( $location, wp_kses_allowed_html( 'post' ) ); ?></dd>
				<?php endif; ?>

				<?php $home_area = get_post_meta( get_the_ID(), REALIA_PROPERTY_PREFIX . 'attributes_home_area', true ); ?>
				<?php if ( ! empty( $home_area ) ) : ?>
					<dt><?php echo __( 'Home area', 'realia' ); ?></dt><dd><?php echo esc_attr( $home_area ); ?>
						<?php echo get_theme_mod( 'realia_measurement_area_unit', 'sqft' ); ?></dd>
				<?php endif; ?>

				<?php $lot_dimensions = get_post_meta( get_the_ID(), REALIA_PROPERTY_PREFIX . 'attributes_lot_dimensions', true ); ?>
				<?php if ( ! empty( $lot_dimensions ) ) : ?>
					<dt><?php echo __( 'Lot dimensions', 'realia' ); ?></dt><dd><?php echo esc_attr( $lot_dimensions ); ?>
						<?php echo get_theme_mod( 'realia_measurement_distance_unit', 'ft' ); ?></dd>
				<?php endif; ?>

				<?php $lot_area = get_post_meta( get_the_ID(), REALIA_PROPERTY_PREFIX . 'attributes_lot_area', true ); ?>
				<?php if ( ! empty( $lot_area ) ) : ?>
					<dt><?php echo __( 'Lot area', 'realia' ); ?></dt><dd><?php echo esc_attr( $lot_area ); ?>
						<?php echo get_theme_mod( 'realia_measurement_area_unit', 'sqft' ); ?></dd>
				<?php endif; ?>

                <?php $material = Realia_Query::get_property_material_name(); ?>
                <?php if ( ! empty ( $material ) ) : ?>
                    <dt><?php echo __( 'Material', 'realia' ); ?></dt><dd><?php echo wp_kses( $material, wp_kses_allowed_html( 'post' ) ); ?></dd>
                <?php endif; ?>

                <?php $rooms = get_post_meta( get_the_ID(), REALIA_PROPERTY_PREFIX . 'attributes_rooms', true ); ?>
                <?php if ( ! empty( $rooms ) ) : ?>
                    <dt><?php echo __( 'Rooms', 'realia' ); ?></dt><dd><?php echo esc_attr( $rooms ); ?></dd>
                <?php endif; ?>

				<?php $beds = get_post_meta( get_the_ID(), REALIA_PROPERTY_PREFIX . 'attributes_beds', true ); ?>
				<?php if ( ! empty( $beds ) ) : ?>
					<dt><?php echo __( 'Beds', 'realia' ); ?></dt><dd><?php echo esc_attr( $beds ); ?></dd>
				<?php endif; ?>

                <?php $baths = get_post_meta( get_the_ID(), REALIA_PROPERTY_PREFIX . 'attributes_baths', true ); ?>
                <?php if ( ! empty( $baths ) ) : ?>
                    <dt><?php echo __( 'Baths', 'realia' ); ?></dt><dd><?php echo esc_attr( $baths ); ?></dd>
                <?php endif; ?>

				<?php $garages = get_post_meta( get_the_ID(), REALIA_PROPERTY_PREFIX . 'attributes_garages', true ); ?>
				<?php if ( ! empty( $garages ) ) : ?>
					<dt><?php echo __( 'Garages', 'realia' ); ?></dt><dd><?php echo esc_attr( $garages ); ?></dd>
				<?php endif; ?>
			</dl>
		</div><!-- /.property-overview -->

		<?php the_content( sprintf(
			__( 'Continue reading %s', 'realia' ),
			the_title( '<span class="screen-reader-text">', '</span>', false )
		) ); ?>

        <?php $amenities = get_categories( array(
            'taxonomy' 		=> 'amenities',
            'hide_empty' 	=> false,
        ) ) ; ?>

        <?php $hide = get_theme_mod( 'realia_general_hide_unassigned_amenities', false ); ?>
        <?php if ( ! empty( $amenities ) ) : ?>
            <div class="property-amenities">
                <ul>
                    <?php foreach ( $amenities as $amenity ) : ?>
                        <?php $has_term = has_term( $amenity->term_id, 'amenities' ); ?>

                        <?php if ( ! $hide || ( $hide  && $has_term ) ) : ?>
                            <li <?php if ( $has_term ): ?>class="yes"<?php else : ?>class="no"<?php endif; ?>><?php echo esc_html( $amenity->name ); ?></li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </div><!-- /.property-amenities -->
        <?php endif; ?>

		<?php $images = get_post_meta( get_the_ID(), REALIA_PROPERTY_PREFIX . 'plans', true ); ?>

		<?php if ( ! empty( $images ) ) : ?>
			<div class="property-floor-plans">
				<?php foreach ( $images as $id => $url ) : ?>
	                <a href="<?php echo esc_url( $url ); ?>" rel="property-plans">
	                    <?php echo wp_get_attachment_image( $id, 'thumbnail' ); ?>
	                </a>
                <?php endforeach; ?>
			</div><!-- /.property-floor-plans -->
		<?php endif; ?>

        <!-- VALUATION -->
        <?php $crime = get_post_meta( get_the_ID(), REALIA_PROPERTY_PREFIX . 'valuation_crime', true ); ?>
        <?php $traffic = get_post_meta( get_the_ID(), REALIA_PROPERTY_PREFIX . 'valuation_traffic', true ); ?>
        <?php $pollution = get_post_meta( get_the_ID(), REALIA_PROPERTY_PREFIX . 'valuation_pollution', true ); ?>
        <?php $education = get_post_meta( get_the_ID(), REALIA_PROPERTY_PREFIX . 'valuation_education', true ); ?>
        <?php $health = get_post_meta( get_the_ID(), REALIA_PROPERTY_PREFIX . 'valuation_health', true ); ?>

        <?php if ( ! empty( $crime ) || ! empty( $traffic ) || ! empty( $pollution ) || ! empty( $education ) || ! empty( $health ) ) : ?>
	        <div class="property-valuation">
	            <?php if ( ! empty( $crime ) ) : ?>
	                <dt><?php echo __( 'Crime', 'realia' ); ?></dt>
	                <dd><span style="width: <?php echo esc_attr( $crime ); ?>%;"><strong><?php echo esc_attr( $crime ); ?> %</strong></span></dd>
	            <?php endif; ?>

	            <?php if ( ! empty( $traffic ) ) : ?>
	                <dt><?php echo __( 'Traffic', 'realia' ); ?></dt>
	                <dd><span style="width: <?php echo esc_attr( $traffic ); ?>%;"><strong><?php echo esc_attr( $traffic ); ?> %</strong></span></dd>
	            <?php endif; ?>

	            <?php if ( ! empty( $pollution ) ) : ?>
	                <dt><?php echo __( 'Pollution', 'realia' ); ?></dt>
	                <dd><span style="width: <?php echo esc_attr( $pollution ); ?>%;"><strong><?php echo esc_attr( $pollution ); ?> %</strong></span></dd>
	            <?php endif; ?>

	            <?php if ( ! empty( $education ) ) : ?>
	                <dt><?php echo __( 'Education', 'realia' ); ?></dt>
	                <dd><span style="width: <?php echo esc_attr( $education ); ?>%;"><strong><?php echo esc_attr( $education ); ?> %</strong></span></dd>
	            <?php endif; ?>

	            <?php if ( ! empty( $health ) ) : ?>
	                <dt><?php echo __( 'Health', 'realia' ); ?></dt>
	                <dd><span style="width: <?php echo esc_attr( $health ); ?>%;"><strong><?php echo esc_attr( $health ); ?> %</strong></span></dd>
	            <?php endif; ?>
	        </div><!-- /.property-valuation -->

        <?php endif; ?>


        <!-- PUBLIC FACILITIES -->
        <?php $city = get_post_meta( get_the_ID(), REALIA_PROPERTY_PREFIX . 'public_facilities_city', true ); ?>
        <?php $shop = get_post_meta( get_the_ID(), REALIA_PROPERTY_PREFIX . 'public_facilities_shop', true ); ?>
        <?php $hospital = get_post_meta( get_the_ID(), REALIA_PROPERTY_PREFIX . 'public_facilities_hospital', true ); ?>
        <?php $school = get_post_meta( get_the_ID(), REALIA_PROPERTY_PREFIX . 'public_facilities_school', true ); ?>
        <?php $cpt = get_post_meta( get_the_ID(), REALIA_PROPERTY_PREFIX . 'public_facilities_cpt', true ); ?>
        <?php $airport = get_post_meta( get_the_ID(), REALIA_PROPERTY_PREFIX . 'public_facilities_airport', true ); ?>

        <?php if ( ! empty( $city ) || ! empty( $shop ) || ! empty( $hospital ) || ! empty( $school ) || ! empty( $cpt )  || ! empty( $airport ) ) : ?>
            <div class="property-public-facilities">
                <?php if ( ! empty( $city ) ) : ?>
                    <div class="property-public-facility-wrapper">
                        <div class="property-public-facility">
                            <div class="property-public-facility-info">
                                <?php echo esc_attr( $city ); ?>
                            </div><!-- /.property-public-facility-info -->

                            <div class="property-public-facility-title">
                                <span><?php echo __( 'City center', 'realia' ); ?></span>
                            </div><!-- /.property-public-facility-title -->
                        </div><!-- /.property-public-facility -->
                    </div><!-- /.property-public-facility-wrapper -->
                <?php endif; ?>

                <?php if ( ! empty( $shop ) ) : ?>
                    <div class="property-public-facility-wrapper">
                        <div class="property-public-facility">
                            <div class="property-public-facility-info">
                                <?php echo esc_attr( $shop ); ?>
                            </div><!-- /.property-public-facility-info -->

                            <div class="property-public-facility-title">
                                <span><?php echo __( 'Shop', 'realia' ); ?></span>
                            </div><!-- /.property-public-facility-title -->
                        </div><!-- /.property-public-facility -->
                    </div><!-- /.col-* -->
                <?php endif; ?>

                <?php if ( ! empty( $hospital ) ) : ?>
                    <div class="property-public-facility-wrapper">
                        <div class="property-public-facility">
                            <div class="property-public-facility-info">
                                <?php echo esc_attr( $hospital ); ?>
                            </div><!-- /.property-public-facility-info -->

                            <div class="property-public-facility-title">
                                <span><?php echo __( 'Hospital', 'realia' ); ?></span>
                            </div><!-- /.property-public-facility-title -->
                        </div><!-- /.property-public-facility -->
                    </div><!-- /.property-public-facility-wrapper -->
                <?php endif; ?>

                <?php if ( ! empty( $school ) ) : ?>
                    <div class="property-public-facility-wrapper">
                        <div class="property-public-facility">
                            <div class="property-public-facility-info">
                                <?php echo esc_attr( $school ); ?>
                            </div><!-- /.property-public-facility-info -->

                            <div class="property-public-facility-title">
                                <span><?php echo __( 'School', 'realia' ); ?></span>
                            </div><!-- /.property-public-facility-title -->
                        </div><!-- /.property-public-facility -->
                    </div><!-- /.property-public-facility-wrapper -->
                <?php endif; ?>

                <?php if ( ! empty( $cpt ) ) : ?>
                    <div class="property-public-facility-wrapper">
                        <div class="property-public-facility">
                            <div class="property-public-facility-info">
                                <?php echo esc_attr( $cpt ); ?>
                            </div><!-- /.property-public-facility-info -->

                            <div class="property-public-facility-title">
                                <span><?php echo __( 'CPT stop', 'realia' ); ?></span>
                            </div><!-- /.property-public-facility-title -->
                        </div><!-- /.property-public-facility -->
                    </div><!-- /.property-public-facility-wrapper -->
                <?php endif; ?>

                <?php if ( ! empty( $airport ) ) : ?>
                    <div class="property-public-facility-wrapper">
                        <div class="property-public-facility">
                            <div class="property-public-facility-info">
                                <?php echo esc_attr( $airport ); ?>
                            </div><!-- /.property-public-facility-info -->

                            <div class="property-public-facility-title">
                                <span><?php echo __( 'Airport', 'realia' ); ?></span>
                            </div><!-- /.property-public-facility-title -->
                        </div><!-- /.property-public-facility -->
                    </div><!-- /.property-public-facility-wrapper -->
                <?php endif; ?>
            </div><!-- /.property-public-facilities -->
        <?php endif; ?>


        <!-- SIMILAR PROPERTIES -->
        <?php Realia_Query::loop_properties_similar(); ?>

        <?php if ( have_posts() ) : ?>
            <div class="similar-properties">
                <h2><?php echo __( 'Similar properties', 'realia' ); ?></h2>

                <?php while( have_posts() ) : the_post(); ?>
                    <div class="property-box-wrapper">
                        <?php echo Realia_Template_Loader::load( 'properties/box' ); ?>
                    </div>
                <?php endwhile; ?>
            </div><!-- /.similar-properties -->

        <?php endif?>

        <?php wp_reset_query(); ?>

        <?php wp_link_pages( array(
			'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'realia' ) . '</span>',
			'after'       => '</div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
			'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'realia' ) . ' </span>%',
			'separator'   => '<span class="screen-reader-text">, </span>',
		) );
		?>

        <?php if ( comments_open() || get_comments_number() ): ?>
            <div class="box">
                <?php comments_template( '', true ); ?>
            </div><!-- /.box -->
        <?php endif; ?>
	</div><!-- .entry-content -->

	<?php
	// Author bio.
	if ( is_single() && get_the_author_meta( 'description' ) ) :
		get_template_part( 'author-bio' );
	endif;
	?>

	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'realia' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
