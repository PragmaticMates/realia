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

        <div class="agency-header">
            <div class="agency-thumbnail">
                <?php if ( has_post_thumbnail() ) : ?>
                    <?php the_post_thumbnail( 'thumbnail' ); ?>
                <?php endif; ?>
            </div>

            <div class="agency-overview">
                <dl>
                    <?php $email = get_post_meta( get_the_ID(), REALIA_AGENCY_PREFIX . 'email', true ); ?>
                    <?php if ( ! empty ( $email ) ) : ?>
                        <dt><?php echo __( 'Email', 'realia' ); ?></dt><dd><?php echo esc_attr( $email ); ?></dd>
                    <?php endif; ?>

                    <?php $web = get_post_meta( get_the_ID(), REALIA_AGENCY_PREFIX . 'web', true ); ?>
                    <?php if ( ! empty ( $email ) ) : ?>
                        <dt><?php echo __( 'Web', 'realia' ); ?></dt><dd><?php echo esc_attr( $web ); ?></dd>
                    <?php endif; ?>

                    <?php $phone = get_post_meta( get_the_ID(), REALIA_AGENCY_PREFIX . 'phone', true ); ?>
                    <?php if ( ! empty ( $email ) ) : ?>
                        <dt><?php echo __( 'Phone', 'realia' ); ?></dt><dd><?php echo esc_attr( $phone ); ?></dd>
                    <?php endif; ?>

                    <?php $address = get_post_meta( get_the_ID(), REALIA_AGENCY_PREFIX . 'address', true ); ?>
                    <?php if ( ! empty ( $address ) ) : ?>
                        <dt><?php echo __( 'Address', 'realia' )?></dt><dd><?php echo wp_kses( nl2br($address), wp_kses_allowed_html( 'post' ) ); ?></dd>
                    <?php endif; ?>
                </dl>
            </div><!-- /.agency-overview -->
        </div><!-- /.agency-header -->

        <?php the_content( sprintf(
            __( 'Continue reading %s', 'realia' ),
            the_title( '<span class="screen-reader-text">', '</span>', false )
        ) ); ?>

        <?php if ( is_single() ) : ?>

            <!-- Agency's location -->
            <?php $location = get_post_meta( get_the_ID(), REALIA_AGENCY_PREFIX . 'location', true ); ?>

            <?php if ( ! empty( $location ) && count( $location ) == 2) : ?>
                <hr>

                <!-- MAP -->
                <div class="map-position">
                    <div id="simple-map"
                         data-latitude="<?php echo esc_attr( $location['latitude'] ); ?>"
                         data-longitude="<?php echo esc_attr( $location['longitude'] ); ?>">
                    </div><!-- /#map-property -->
                </div><!-- /.map-property -->
            <?php endif; ?>

            <!-- Agency's agents -->
            <?php Realia_Query::loop_agency_agents(); ?>

            <?php if ( have_posts() ) : ?>
                <hr>

                <div class="agency-agents">
                    <?php while( have_posts() ) : the_post(); ?>
                        <div class="agent-box-wrapper">
                            <?php include 'agents/box.php'; ?>
                        </div>
                    <?php endwhile; ?>
                </div><!-- /.row -->
            <?php endif;?>

            <?php wp_reset_query(); ?>
        <?php endif; ?>

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
            </div>
        <?php endif; ?>
    </div><!-- .entry-content -->

    <?php
    // Author bio.
    if ( is_single() && get_the_author_meta( 'description' ) ) :
        get_template_part( 'author-bio' );
    endif;
    ?>

    <footer class="entry-footer">
        <?php twentyfifteen_entry_meta(); ?>
        <?php edit_post_link( __( 'Edit', 'realia' ), '<span class="edit-link">', '</span>' ); ?>
    </footer><!-- .entry-footer -->

</article><!-- #post-## -->
