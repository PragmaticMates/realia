<div class="wire-transfer">
    <div class="wire-transfer-info wire-transfer-account-number">
        <dt><?php echo __( "Beneficiary's account number", 'realia' ); ?></dt>
        <dd><?php echo get_theme_mod( 'realia_wire_transfer_account_number', null ) ?></dd>
    </div>

    <div class="wire-transfer-info wire-transfer-bank-code">
        <dt><?php echo __( 'Bank code (SWIFT/BIC)', 'realia' ); ?></dt>
        <dd><?php echo get_theme_mod( 'realia_wire_transfer_swift', null ) ?></dd>
    </div>

    <div class="wire-transfer-info wire-transfer-full-name">
        <dt><?php echo __( "Beneficiary's name", 'realia' ); ?></dt>
        <dd><?php echo get_theme_mod( 'realia_wire_transfer_full_name', null ) ?></dd>
    </div>

    <div class="wire-transfer-info wire-transfer-street">
        <dt><?php echo __( "Street / P.O.Box", 'realia' ); ?></dt>
        <dd><?php echo get_theme_mod( 'realia_wire_transfer_street', null ) ?></dd>
    </div>

    <div class="wire-transfer-info wire-transfer-postcode">
        <dt><?php echo __( "Postcode (ZIP)", 'realia' ); ?></dt>
        <dd><?php echo get_theme_mod( 'realia_wire_transfer_postcode', null ) ?></dd>
    </div>

    <div class="wire-transfer-info wire-transfer-city">
        <dt><?php echo __( "City", 'realia' ); ?></dt>
        <dd><?php echo get_theme_mod( 'realia_wire_transfer_city', null ) ?></dd>
    </div>

    <div class="wire-transfer-info wire-transfer-country">
        <dt><?php echo __( "Country", 'realia' ); ?></dt>
        <dd><?php echo get_theme_mod( 'realia_wire_transfer_country', null ) ?></dd>
    </div>
</div>