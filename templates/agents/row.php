<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<article <?php post_class( 'agent-row' ); ?>>
    <div class="agent-row-content">
        <div class="agent-row-content-inner">
            <div class="agent-row-main">
	            <?php if ( has_post_thumbnail() ) :   ?>
		            <div class="agent-thumbnail">
			            <?php if ( has_post_thumbnail() ) : ?>
				            <a href="<?php the_permalink() ?>">
					            <?php the_post_thumbnail( 'thumbnail' ); ?>
				            </a>
			            <?php endif; ?>
		            </div>
	            <?php endif; ?>

	            <div class="agent-row-body">
		            <?php $properties_count = Realia_Query::get_agent_properties()->post_count; ?>
		            <?php if ( $properties_count > 0 ) : ?>
			            <div class="agent-row-properties">
				            <?php if ( ! empty( $properties_count ) ) : ?>
					            <div class="agent-row-subtitle">
						            <?php echo esc_attr( $properties_count ); ?> <?php echo __( 'properties', 'realia' ); ?>
					            </div><!-- /.agent-row-subtitle -->
				            <?php endif; ?>
			            </div><!-- /.agent-row-properties -->
					<?php endif; ?>

		            <h2 class="agent-row-title entry-title">
			            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		            </h2>

		            <?php the_excerpt(); ?>
	            </div><!-- /.agent-row-body -->

                <?php $email = get_post_meta( get_the_ID(), REALIA_AGENT_PREFIX . 'email', true ); ?>
                <?php $web = get_post_meta( get_the_ID(), REALIA_AGENT_PREFIX . 'web', true ); ?>
                <?php $phone = get_post_meta( get_the_ID(), REALIA_AGENT_PREFIX . 'phone', true ); ?>
                <?php $address = get_post_meta( get_the_ID(), REALIA_AGENT_PREFIX . 'address', true ); ?>

                <?php if ( ! empty( $email ) && ! empty( $web ) && ! empty( $phone ) && ! empty( $address ) ) :?>
                    <div class="agent-row-overview">
    	                <h2 class="agent-row-overview-title">
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
                    </div><!-- /.agent-row-overview -->
                <?php endif;?>
            </div><!-- /.agent-row-main -->
        </div><!-- /.agent-row-content-inner -->
    </div><!-- /.agent-row-content -->
</article>
