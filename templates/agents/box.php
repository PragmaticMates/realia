<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<?php $is_sticky = get_post_meta( get_the_ID(), REALIA_PROPERTY_PREFIX . 'sticky', true ); ?>

<div class="agent-box">
    <?php if ( has_post_thumbnail() ) : ?>
		<div class="agent-box-image <?php if ( ! has_post_thumbnail() ) { echo 'without-image'; } ?>">
	        <a href="<?php the_permalink(); ?>" class="agent-box-image-inner <?php if ( ! empty( $agent ) ) : ?>has-agent<?php endif; ?>">
                <?php the_post_thumbnail( 'thumbnail' ); ?>
	        </a>
		</div><!-- /.agent-box-image -->
    <?php endif; ?>

    <div class="agent-box-content">
        <h3 class="agent-box-title">
            <a href="<?php the_permalink(); ?>"><?php the_title() ?></a>
        </h3><!-- /.agent-box-title -->

        <?php $email = get_post_meta( get_the_ID(), REALIA_AGENT_PREFIX . 'email', true ); ?>
        <?php if ( ! empty( $email ) ) : ?>
            <div class="agent-box-email">
	            <a href="mailto:<?php echo esc_attr( $email ); ?>">
                    <?php echo esc_attr( $email ); ?>
	            </a>
            </div><!-- /.agent-box-email -->
        <?php endif; ?>

        <?php $phone = get_post_meta( get_the_ID(), REALIA_AGENT_PREFIX . 'phone', true ); ?>
        <?php if ( ! empty( $phone ) ) : ?>
            <div class="agent-box-phone">
                <?php echo esc_attr( $phone ); ?>
            </div><!-- /.agent-box-phone -->
        <?php endif; ?>

	    <?php $web = get_post_meta( get_the_ID(), REALIA_AGENT_PREFIX . 'web', true ); ?>
	    <?php if ( ! empty( $web ) ) : ?>
		    <div class="agent-box-web">
			    <a href="<?php echo esc_attr( $web ); ?>">
			        <?php echo esc_attr( $web ); ?>
			    </a>
		    </div><!-- /.agent-box-web -->
	    <?php endif; ?>
    </div><!-- /.agent-box-content -->
</div><!-- /.agent-box-->
