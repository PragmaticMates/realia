<?php if ( empty( $instance['hide_price'] ) ) : ?>
	<div class="form-group">
		<?php if ( $input_titles == 'labels' ) : ?>
			<label for="<?php echo esc_attr( $args['widget_id'] ); ?>_price_from"><?php echo __( 'Price from', 'realia' ); ?></label>
		<?php endif; ?>

		<input type="text" name="filter-price-from"
		       <?php if( $input_titles == 'placeholders' ) : ?>placeholder="<?php echo __( 'Price from', 'realia' ); ?>"<?php endif; ?>
		       class="form-control" value="<?php echo ! empty( $_GET['filter-price-from'] ) ? $_GET['filter-price-from'] : ''; ?>"
		       id="<?php echo esc_attr( $args['widget_id'] ); ?>_price_from">
	</div><!-- /.form-group -->

	<div class="form-group">
		<?php if ( $input_titles == 'labels' ) : ?>
			<label for="<?php echo esc_attr( $args['widget_id'] ); ?>_price_to"><?php echo __( 'Price to', 'realia' ); ?></label>
		<?php endif; ?>

		<input type="text" name="filter-price-to"
		       <?php if( $input_titles == 'placeholders' ) : ?>placeholder="<?php echo __( 'Price to', 'realia' ); ?>"<?php endif; ?>
		       class="form-control" value="<?php echo ! empty( $_GET['filter-price-to'] ) ? $_GET['filter-price-to'] : ''; ?>"
		       id="<?php echo esc_attr( $args['widget_id'] ); ?>_price_to">
	</div><!-- /.form-group -->
<?php endif; ?>