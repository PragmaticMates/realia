<?php if ( empty( $instance['hide_lot_area'] ) ) : ?>
	<div class="form-group">
		<?php if ( 'labels' == $input_titles ) : ?>
			<label for="<?php echo ! empty( $field_id_prefix ) ? $field_id_prefix : ''; ?><?php echo esc_attr( $args['widget_id'] ); ?>_lot_area_from"><?php echo __( 'Lot area from', 'realia' ); ?></label>
		<?php endif; ?>

		<input type="text" name="filter-lot-area-from"
				<?php if ( 'placeholders' == $input_titles ) : ?>placeholder="<?php echo __( 'Lot area from', 'realia' ); ?>"<?php endif; ?>
		       class="form-control" value="<?php echo ! empty( $_GET['filter-lot-area-from'] ) ? $_GET['filter-lot-area-from'] : ''; ?>"
		       id="<?php echo ! empty( $field_id_prefix ) ? $field_id_prefix : ''; ?><?php echo esc_attr( $args['widget_id'] ); ?>_lot_area_from">
	</div><!-- /.form-group -->

	<div class="form-group">
		<?php if ( 'labels' == $input_titles ) : ?>
			<label for="<?php echo ! empty( $field_id_prefix ) ? $field_id_prefix : ''; ?><?php echo esc_attr( $args['widget_id'] ); ?>_lot_area_to"><?php echo __( 'Lot area to', 'realia' ); ?></label>
		<?php endif; ?>

		<input type="text" name="filter-lot-area-to"
				<?php if ( 'placeholders' == $input_titles ) : ?>placeholder="<?php echo __( 'Lot area to', 'realia' ); ?>"<?php endif; ?>
		       class="form-control" value="<?php echo ! empty( $_GET['filter-lot-area-to'] ) ? $_GET['filter-lot-area-to'] : ''; ?>"
		       id="<?php echo ! empty( $field_id_prefix ) ? $field_id_prefix : ''; ?><?php echo esc_attr( $args['widget_id'] ); ?>_lot_area_to">
	</div><!-- /.form-group -->
<?php endif; ?>
