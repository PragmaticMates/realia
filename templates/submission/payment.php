<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<article id="page-<?php the_ID(); ?>" <?php post_class( 'submission-payment' ); ?>>
    <?php
	$payment_type = ! empty( $_POST['payment_type'] ) ? $_POST['payment_type'] : null;
	$object_id = ! empty( $_POST['object_id'] ) ? $_POST['object_id'] : null;
	$payment_gateway = ! empty( $_POST['payment_gateway'] ) ? $_POST['payment_gateway'] : false;
	?>

    <?php if ( 'pay_for_featured' == $payment_type ) : ?>
        <?php $price = get_theme_mod( 'realia_submission_featured_price', null ); ?>
        <?php $property = get_post( $object_id ); ?>

        <div class="payment-info">
			<?php echo sprintf( __( 'You are going to pay <strong>%s</strong> for featuring property <strong>"%s"</strong>.', 'realia' ), Realia_Price::format_price( $price ), $property->post_title ); ?>
        </div><!-- /.payment-info -->
    <?php elseif ( 'pay_for_sticky' == $payment_type ) : ?>
        <?php $price = get_theme_mod( 'realia_submission_sticky_price', null ); ?>
        <?php $property = get_post( $object_id ); ?>

        <div class="payment-info">
            <?php echo sprintf( __( 'You are going to pay <strong>%s</strong> for TOP property <strong>"%s"</strong>.', 'realia' ), Realia_Price::format_price( $price ), $property->post_title ); ?>
        </div><!-- /.payment-info -->
    <?php elseif ( 'pay_per_post' == $payment_type ) : ?>
        <?php $price = get_theme_mod( 'realia_submission_pay_per_post_price', null ); ?>
        <?php $property = get_post( $object_id ); ?>

        <div class="payment-info">
            <?php echo sprintf( __( 'You are going to pay <strong>%s</strong> for publishing property <strong>"%s"</strong>.', 'realia' ), Realia_Price::format_price( $price ), $property->post_title ); ?>
        </div><!-- /.payment-info -->
    <?php elseif ( 'package' == $payment_type ) : ?>
        <?php if ( ! empty( $object_id ) ) : ?>
            <?php $title = get_the_title( $object_id ); ?>
            <?php $price = get_post_meta( $object_id, REALIA_PACKAGE_PREFIX . 'price', true ); ?>

            <div class="payment-info">
                <?php echo sprintf( __( 'You are going to pay <strong>%s</strong> for package <strong>"%s"</strong>.', 'realia' ), Realia_Price::format_price( $price ), $title ); ?>
            </div><!-- /.payment-info -->
        <?php else : ?>
            <div class="payment-info">
                <?php echo __( 'Missing package.', 'realia' ); ?>
            </div><!-- /.payment-info -->
        <?php endif; ?>
    <?php else : ?>
        <div class="payment-info">
            <?php echo __( 'You are missing payment type.', 'realia' ); ?>
        </div><!-- /.payment-info -->
    <?php endif; ?>

    <?php if ( ! empty( $payment_type ) && ! empty( $object_id ) ) : ?>
        <form class="payment-form" method="post" action="?">
            <?php if ( ! empty( $payment_type ) ) : ?>
                <input type="hidden" name="payment_type" value="<?php echo esc_attr( $payment_type ); ?>">
            <?php endif; ?>

            <?php if ( ! empty( $object_id ) ) : ?>
                <input type="hidden" name="object_id" value="<?php echo esc_attr( $object_id ); ?>">
            <?php endif; ?>

            <?php $payment_gateways = apply_filters( 'realia_payment_gateways', array() ); ?>

            <?php if ( is_array( $payment_gateways ) && count( $payment_gateways ) > 0 ) : ?>
                <?php foreach ( $payment_gateways as $gateway ) : ?>
                    <div class="gateway">
                        <div class="gateway-header">
                            <div class="radio-wrapper">
                                <input type="radio" id="gateway-<?php echo esc_attr( $gateway['id'] ); ?>" name="payment_gateway" value="<?php echo esc_attr( $gateway['id'] ); ?>" data-proceed="<?php var_export( $gateway['proceed'] ); ?>" <?php if ( $payment_gateway == $gateway['id'] ) : ?>checked="checked"<?php endif; ?>>

                                <label for="gateway-<?php echo esc_attr( $gateway['id'] ); ?>">
                                    <span><?php echo esc_attr( $gateway['title'] ); ?></span>
                                </label>
                            </div><!-- /.radio-wrapper -->
                        </div><!-- /.gateway-header -->

                        <?php if ( ! empty( $gateway['content'] ) ) : ?>
                            <div class="gateway-content"><?php echo $gateway['content']; ?></div><!-- /.gateway-content -->
                        <?php endif; ?>
                    </div><!-- /.payment -->
                <?php endforeach; ?>

                <?php if ( ! empty( $payment_type ) ) : ?>
                    <button type="submit" name="process-payment" class="submission-payment-process hidden">
                        <?php echo __( 'Proceed payment', 'realia' ); ?>
                    </button>

                    <div class="alert alert-info hidden" id="non-proceed-info">
                        <?php echo __( 'Your submission will be manually reviewed when transfer will be completed.', 'realia' ); ?>
                    </div>
                <?php endif; ?>
            <?php else : ?>
                <div class="alert alert-warning">
                    <?php echo __( 'No payment gateways found.', 'realia' ); ?>
                </div><!-- /.alert -->
            <?php endif; ?>

            <?php $submission_page_id = get_theme_mod( 'realia_submission_list_page' ); ?>

            <?php if ( ! empty( $submission_page_id ) ) : ?>
                <p class="submission-payment-back">
                    <?php echo __( 'Back to:', 'realia' ); ?> <a href="<?php echo get_permalink( $submission_page_id ); ?>">
                        <?php echo get_the_title( $submission_page_id ); ?>
                    </a>
                </p>
            <?php endif; ?>
        </form>
    <?php endif; ?>
</article>
