<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<article <?php post_class( 'agency-row' ); ?>>
    <div class="agency-row-content">
        <div class="agency-row-content-inner">
            <div class="agency-row-main">
                <?php if ( has_post_thumbnail() ) : ?>
		            <div class="agency-row-thumbnail">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail( 'thumbnail' ); ?>
                        </a>
		            </div><!-- /.agency-row-thumbnail -->
                <?php endif; ?>

                <div class="agency-row-body">
	                <?php $agents_count = Realia_Query::get_agency_agents()->post_count; ?>

	                <?php if ( $agents_count > 0 ) : ?>
		                <div class="agency-row-agents">
			                <?php if ( ! empty( $agents_count ) ) : ?>
				                <div class="agency-row-subtitle">
					                <?php echo esc_attr( $agents_count ); ?> <?php echo __( 'agents', 'realia' ); ?>
				                </div><!-- /.agency-row-subtitle -->
			                <?php endif; ?>
		                </div><!-- /.agency-row-agents -->
	                <?php endif; ?>

	                <h2 class="agency-row-title entry-title">
		                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	                </h2>

	                <?php the_excerpt(); ?>
                </div><!-- /.agency-row-body -->

	            <?php $email = get_post_meta( get_the_ID(), REALIA_AGENCY_PREFIX . 'email', true ); ?>
	            <?php $web = get_post_meta( get_the_ID(), REALIA_AGENCY_PREFIX . 'web', true ); ?>
	            <?php $phone = get_post_meta( get_the_ID(), REALIA_AGENCY_PREFIX . 'phone', true ); ?>
	            <?php $address = get_post_meta( get_the_ID(), REALIA_AGENCY_PREFIX . 'address', true ); ?>

	            <?php if ( ! empty( $email ) || ! empty( $web ) || ! empty( $phone ) || ! empty( $address ) ) : ?>
		            <div class="agency-row-overview">
		                <h2 class="agency-row-overview-title">
			                <?php echo __( 'Contact Information', 'realia' ); ?>
		                </h2><!-- /.agency-row-overview -->

	                    <dl>
	                        <?php if ( ! empty( $email ) ) : ?>
	                            <dt><?php echo __( 'Email', 'realia' ); ?></dt>
		                        <dd>
			                        <a href="mailto:<?php echo esc_attr( $email ); ?>">
			                            <?php echo esc_attr( $email ); ?>
			                        </a>
		                        </dd>
	                        <?php endif; ?>

	                        <?php if ( ! empty( $web ) ) : ?>
	                            <dt><?php echo __( 'Web', 'realia' ); ?></dt>
		                        <dd>
			                        <a href="<?php echo esc_attr( $web ); ?>">
			                            <?php echo esc_attr( $web ); ?>
			                        </a>
		                        </dd>
	                        <?php endif; ?>

	                        <?php if ( ! empty( $phone ) ) : ?>
	                            <dt><?php echo __( 'Phone', 'realia' ); ?></dt><dd><?php echo esc_attr( $phone ); ?></dd>
	                        <?php endif; ?>

	                        <?php if ( ! empty( $address ) ) : ?>
	                            <dt><?php echo __( 'Address', 'realia' )?></dt><dd><?php echo wp_kses( nl2br( $address ), wp_kses_allowed_html( 'post' ) ); ?></dd>
	                        <?php endif; ?>
	                    </dl>
	                </div><!-- /.agency-row-overview -->
	            <?php endif; ?>
            </div><!-- /.agency-row-main -->
        </div><!-- /.agency-row-content-inner -->
    </div><!-- /.agency-row-content -->
</article>
