<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<?php $paged = ( get_query_var( 'paged' )) ? get_query_var( 'paged' ) : 1; ?>

<?php query_posts( array(
	'post_type' 	=> 'transaction',
	'paged'         => $paged,
	'author'        => get_current_user_id(),
) ); ?>

<?php if ( have_posts() ) : ?>
	<table class="transactions-table">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php
			$object = get_post_meta( get_the_ID(), REALIA_TRANSACTION_PREFIX . 'object', true );
			$object = unserialize( $object );
			$object_id = get_post_meta( get_the_ID(), REALIA_TRANSACTION_PREFIX . 'object_id', true );
			$payment_type = get_post_meta( get_the_ID(), REALIA_TRANSACTION_PREFIX . 'payment_type', true );
			?>

			<tr>
				<td>
					<strong><?php echo __( 'ID', 'realia' ); ?></strong>
					<b>#<?php the_ID(); ?></b>
				</td>
				<td>
					<strong><?php echo __( 'Price', 'realia' ); ?></strong>
					<?php echo wp_kses( $object['price_formatted'], wp_kses_allowed_html( 'post' ) ); ?>
				</td>
				<td>
					<strong><?php echo __( 'Gateway', 'realia' ); ?></strong>
					<?php echo esc_html( $object['gateway'] ); ?>
				</td>
				<td>
					<strong><?php echo __( 'Object', 'realia' ); ?></strong>
					<?php echo sprintf( '<a href="%s">%s</a>', get_permalink( $object_id ), get_the_title( $object_id ) ); ?>
				</td>
				<td>
					<strong><?php echo __( 'Payment Type', 'realia' ); ?></strong>
					<?php
					switch ( $payment_type ) {
						case 'pay_for_featured':
							echo __( 'Feature property', 'realia' );
							break;
						case 'pay_for_sticky':
							echo __( 'TOP property', 'realia' );
							break;
						case 'pay_per_post':
							echo __( 'Pay per post', 'realia' );
							break;
						case 'package':
							echo __( 'Package', 'realia' );
							break;
						default:
							echo esc_html( $payment_type );
							break;
					}
					?>
				</td>
				<td>
					<strong><?php echo __( 'Date', 'realia' ); ?></strong>
					<?php the_date(); ?> <?php the_time(); ?>
				</td>
			</tr>
		<?php endwhile; ?>
	</table>

	<?php the_posts_pagination( array(
		'prev_text'          => __( 'Previous page', 'realia' ),
		'next_text'          => __( 'Next page', 'realia' ),
		'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'realia' ) . ' </span>',
	) ); ?>
<?php else : ?>
	<div class="alert alert-warning"><?php echo __( 'No transactions found.', 'realia' ); ?></div>
<?php endif; ?>

<?php wp_reset_query(); ?>
