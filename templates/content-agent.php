<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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

        <div class="agent-header">
            <div class="agent-thumbnail">
                <?php if ( has_post_thumbnail() ) : ?>
                    <?php the_post_thumbnail( 'large' ); ?>
                <?php endif; ?>
            </div>

            <div class="agent-overview">
                <dl>
                    <?php $email = get_post_meta( get_the_ID(), REALIA_AGENT_PREFIX . 'email', true ); ?>
                    <?php if ( ! empty( $email ) ) : ?>
                        <dt><?php echo __( 'Email', 'realia' ); ?></dt><dd><?php echo esc_attr( $email ); ?></dd>
                    <?php endif; ?>

                    <?php $web = get_post_meta( get_the_ID(), REALIA_AGENT_PREFIX . 'web', true ); ?>
                    <?php if ( ! empty( $web ) ) : ?>
                        <dt><?php echo __( 'Web', 'realia' ); ?></dt><dd><?php echo esc_attr( $web ); ?></dd>
                    <?php endif; ?>

                    <?php $phone = get_post_meta( get_the_ID(), REALIA_AGENT_PREFIX . 'phone', true ); ?>
                    <?php if ( ! empty( $phone ) ) : ?>
                        <dt><?php echo __( 'Phone', 'realia' ); ?></dt><dd><?php echo esc_attr( $phone ); ?></dd>
                    <?php endif; ?>

                    <?php $address = get_post_meta( get_the_ID(), REALIA_AGENT_PREFIX . 'address', true ); ?>
                    <?php if ( ! empty( $address ) ) : ?>
                        <dt><?php echo __( 'Address', 'realia' )?></dt><dd><?php echo wp_kses( nl2br( $address ), wp_kses_allowed_html( 'post' ) ); ?></dd>
                    <?php endif; ?>
                </dl>
            </div><!-- /.agent-overview -->
        </div><!-- /.agent-header -->

        <?php the_content( sprintf( __( 'Continue reading %s', 'realia' ), the_title( '<span class="screen-reader-text">', '</span>', false ) ) ); ?>

        <?php if ( is_single() ) : ?>
            <?php Realia_Query::loop_agent_properties(); ?>

            <?php if ( have_posts() ) : ?>
                <hr>

                <div class="agent-properties type-box item-per-row-3">
	                <div class="properties-row">
		                <?php $index = 0; ?>
	                    <?php while ( have_posts() ) : the_post(); ?>
	                        <div class="property-container">
	                            <?php include 'properties/box.php'; ?>
	                        </div><!-- /.property-container -->

					        <?php if ( 0 == ( ( $index + 1 ) % 3 ) && Realia_Query::loop_has_next() ) : ?>
						        </div><div class="properties-row">
					        <?php endif; ?>

					        <?php $index++; ?>
	                    <?php endwhile; ?>
	                </div><!-- /.properties-row -->
                </div><!-- /.agent-properties -->
            <?php endif;?>

            <?php wp_reset_query(); ?>
        <?php endif; ?>

        <?php include 'agents/contact-form.php'; ?>

        <?php wp_link_pages( array(
			'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'realia' ) . '</span>',
			'after'       => '</div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
			'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'realia' ) . ' </span>%',
			'separator'   => '<span class="screen-reader-text">, </span>',
		) ); ?>

        <?php if ( comments_open() || get_comments_number() ) : ?>
            <div class="box"><?php comments_template( '', true ); ?></div>
        <?php endif; ?>
    </div><!-- .entry-content -->
</article><!-- #post-## -->
