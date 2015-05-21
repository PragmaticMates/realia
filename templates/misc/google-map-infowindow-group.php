<?php if ( have_posts() ) : ?>
	<div class="infobox multiple">
		<div class="infobox-content">
			<div class="infobox-content-body">
				<?php while( have_posts() ) : the_post(); ?>
					<div class="infobox-content-body-item">
						<?php if ( has_post_thumbnail() ) : ?>
							<a href="<?php the_permalink() ?>">
								<?php the_post_thumbnail(); ?>
							</a>
						<?php endif; ?>

						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?><a></h3>

						<?php $price = Realia_Price::get_property_price(); ?>
						<?php if ( ! empty( $price ) ) : ?>
							<h4><?php echo wp_kses( $price, wp_kses_allowed_html( 'post' ) ); ?></h4>
						<?php endif; ?>
					</div>
				<?php endwhile; ?>
			</div>

			<a href="#" class="close"><i class="fa fa-close"></i></a>

			<?php if ( count( $group ) > 2 ) : ?>
				<div class="infobox-scroll">
					<i class="fa fa-arrow-circle-o-down"></i>
				</div>
			<?php endif; ?>
		</div>
	</div>
<?php endif; ?>
