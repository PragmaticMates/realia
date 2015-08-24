<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<div class="agent-small">
	<div class="agent-small-inner">
		<div class="agent-small-image">
			<a href="<?php the_permalink() ?>" class="agent-small-image-inner">
				<?php if ( has_post_thumbnail() ) : ?>
					<?php the_post_thumbnail( 'thumbnail' ); ?>
				<?php endif; ?>
			</a><!-- /.agent-small-image-inner -->
		</div><!-- /.agent-small-image -->

		<div class="agent-small-content">
			<h3 class="agent-small-title">
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</h3>

			<?php $email = get_post_meta( get_the_ID(), REALIA_AGENT_PREFIX . 'email', true ); ?>
			<?php if ( ! empty( $email ) ) : ?>
				<div class="agent-small-email">
					<a href="mailto:<?php echo esc_attr( $email ); ?>>"><?php echo esc_attr( $email ); ?></a>
				</div><!-- /.agent-small-email -->
			<?php endif; ?>

			<?php $phone = get_post_meta( get_the_ID(), REALIA_AGENT_PREFIX . 'phone', true ); ?>
			<?php if ( ! empty( $phone ) ) : ?>
				<div class="agent-small-phone">
					<?php echo esc_attr( $phone ); ?>
				</div><!-- /.agent-small-phone -->
			<?php endif; ?>
		</div><!-- /.agent-small-content -->
	</div><!-- /.agent-small-inner -->
</div><!-- /.agent-small -->
