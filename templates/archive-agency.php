<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header(); ?>

<section id="primary" class="content-area">
	<main id="main" class="site-main content" role="main">
		<?php if ( have_posts() ) : ?>
			<header class="page-header">
				<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
				<?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
			</header><!-- .page-header -->

			<?php
				/**
				 * realia_before_agency_archive
				 */
				do_action( 'realia_before_agency_archive' );
			?>

			<?php while ( have_posts() ) : the_post(); ?>
                <?php echo Realia_Template_Loader::load( 'agencies/row' ); ?>
			<?php endwhile; ?>

			<?php
				/**
				 * realia_after_agency_archive
				 */
				do_action( 'realia_after_agency_archive' );
			?>

			<?php the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'realia' ),
				'next_text'          => __( 'Next page', 'realia' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'realia' ) . ' </span>',
			) ); ?>
		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>
	</main><!-- .site-main -->
</section><!-- .content-area -->

<?php get_footer(); ?>
