<?php
$payment_type = ! empty( $_POST['payment_type'] ) ? $_POST['payment_type'] : null;
$object_id = ! empty( $_POST['object_id'] ) ? $_POST['object_id'] : null;
$title = get_the_title( $object_id );
$variable_symbol = $object_id;
$reference = $title;
?>

<?php if ( $payment_type == 'pay_for_featured' ) : ?>
    <?php $reference = sprintf( __( 'for featuring property "%s"', 'realia' ), $title ) ; ?>
<?php elseif ( $payment_type == 'pay_for_sticky' ) : ?>
    <?php $reference = sprintf( __( 'for TOP property "%s"', 'realia' ), $title ) ; ?>
<?php elseif ( $payment_type == 'pay_per_post' ) : ?>
    <?php $reference = sprintf( __( 'for publishing property "%s"', 'realia' ), $title ) ; ?>
<?php elseif ( $payment_type == 'package' ) : ?>
    <?php $reference = sprintf( __( 'for package "%s"', 'realia' ), $title ) ; ?>
<?php endif; ?>

<div class="wire-transfer">
    <div class=".wire-transfer-section wire-transfer-section-one">
        <div class="wire-transfer-info wire-transfer-account-number">
            <dt><?php echo __( "Beneficiary's account number", 'realia' ); ?></dt>
            <dd><?php echo get_theme_mod( 'realia_wire_transfer_account_number', null ) ?></dd>
        </div><!-- /.wire-transfer-info -->

        <div class="wire-transfer-info wire-transfer-bank-code">
            <dt><?php echo __( 'Bank code (SWIFT/BIC)', 'realia' ); ?></dt>
            <dd><?php echo get_theme_mod( 'realia_wire_transfer_swift', null ) ?></dd>
        </div><!-- /.wire-transfer-info -->

        <div class="wire-transfer-info wire-transfer-variable-symbol">
            <dt><?php echo __( 'Variable symbol', 'realia' ); ?></dt>
            <dd><?php echo $variable_symbol; ?></dd>
        </div><!-- /.wire-transfer-info -->

        <div class="wire-transfer-info wire-transfer-reference">
            <dt><?php echo __( 'Information / reference', 'realia' ); ?></dt>
            <dd><?php echo $reference; ?></dd>
        </div><!-- /.wire-transfer-info -->
    </div><!-- /.wire-transfer-section -->

    <div class="wire-transfer-section wire-transfer-section-two">
        <div class="wire-transfer-info wire-transfer-full-name">
            <dt><?php echo __( "Beneficiary's name", 'realia' ); ?></dt>
            <dd><?php echo get_theme_mod( 'realia_wire_transfer_full_name', null ) ?></dd>
        </div><!-- /.wire-transfer-info -->

        <div class="wire-transfer-info wire-transfer-street">
            <dt><?php echo __( "Street / P.O.Box", 'realia' ); ?></dt>
            <dd><?php echo get_theme_mod( 'realia_wire_transfer_street', null ) ?></dd>
        </div><!-- /.wire-transfer-info -->

        <div class="wire-transfer-info wire-transfer-postcode">
            <dt><?php echo __( "Postcode (ZIP)", 'realia' ); ?></dt>
            <dd><?php echo get_theme_mod( 'realia_wire_transfer_postcode', null ) ?></dd>
        </div><!-- /.wire-transfer-info -->

        <div class="wire-transfer-info wire-transfer-city">
            <dt><?php echo __( "City", 'realia' ); ?></dt>
            <dd><?php echo get_theme_mod( 'realia_wire_transfer_city', null ) ?></dd>
        </div><!-- /.wire-transfer-info -->

        <div class="wire-transfer-info wire-transfer-country">
            <dt><?php echo __( "Country", 'realia' ); ?></dt>
            <dd><?php echo get_theme_mod( 'realia_wire_transfer_country', null ) ?></dd>
        </div><!-- /.wire-transfer-info -->
    </div><!-- /.wire-transfer-section -->
</div>