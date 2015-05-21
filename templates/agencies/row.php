<article <?php post_class( 'agency-row' ); ?>>
    <div class="agency-row-content">
        <div class="agency-row-content-inner">
            <div class="agency-row-main">
                <header class="entry-header">
                    <h2 class="agency-row-title entry-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>
                    <div class="agency-row-agents">
                        <?php $agents_count = Realia_Query::get_agency_agents()->post_count; ?>
                        <?php if ( ! empty( $agents_count ) ) : ?>
                            <div class="agency-row-subtitle">
                                <?php echo esc_attr( $agents_count ); ?> <?php echo __( 'agents', 'realia' ); ?>
                            </div><!-- /.agency-row-subtitle -->
                        <?php endif; ?>
                    </div>
                </header>

                <div class="entry-content">
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

                    <div class="agency-row-body">
                        <p><?php the_excerpt(); ?></p>
                    </div><!-- /.agency-row-body -->
                </div><!-- /.entry-content -->
            </div><!-- /.agency-row-main -->
        </div><!-- /.agency-row-content-inner -->
    </div><!-- /.agency-row-content -->
</article>