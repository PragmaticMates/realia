<div class="notice realia-message">
    <p><?php echo __('<strong>Welcome to Realia</strong> - please read <a href="http://wprealia.com/documentation/index.html">documentation</a> for more information. If you does not have real estate theme, use free <a href="https://github.com/pragmaticmates/realia-bootstrap">Realia Bootstrap</a> starter.', 'realia' ); ?></p>

    <p class="submit">
        <a href="http://wprealia.com/documentation/index.html" class="button-primary">
            <?php echo __( 'Documentation', 'realia' ); ?>
        </a>

        <a href="https://github.com/pragmaticmates/realia-bootstrap" class="button-primary">
            <?php echo __( 'Realia Bootstrap', 'realia' ); ?>
        </a>

        <a class="button-secondary skip" href="<?php echo esc_url( wp_nonce_url( add_query_arg( 'realia-hide-notice', 'welcome' ), 'realia_hide_notices_nonce', '_realia_notice_nonce' ) ); ?>">
            <?php echo __( 'Hide', 'realia' ); ?>
        </a>
    </p>
</div><!-- /.notice -->
