<?php if ( empty( $instance['hide_home_area'] ) ) : ?>
	<div class="form-group">
		<?php if ( 'labels' == $input_titles ) : ?>
			<label for="<?php echo ! empty( $field_id_prefix ) ? $field_id_prefix : ''; ?><?php echo esc_attr( $args['widget_id'] ); ?>_home_area_from"><?php echo __( 'Home area from', 'realia' ); ?></label>
		<?php endif; ?>

		<input type="text" name="filter-home-area-from"
				<?php if ( 'placeholders' == $input_titles ) : ?>placeholder="<?php echo __( 'Home area from', 'realia' ); ?>"<?php endif; ?>
		       class="form-control" value="<?php echo ! empty( $_GET['filter-home-area-from'] ) ? $_GET['filter-home-area-from'] : ''; ?>"
		       id="<?php echo ! empty( $field_id_prefix ) ? $field_id_prefix : ''; ?><?php echo esc_attr( $args['widget_id'] ); ?>_home_area_from">
	</div><!-- /.form-group -->

	<div class="form-group">
		<?php if ( 'labels' == $input_titles ) : ?>
			<label for="<?php echo esc_attr( $args['widget_id'] ); ?>_home_area_to"><?php echo __( 'Home area to', 'realia' ); ?></label>
		<?php endif; ?>

		<input type="text" name="filter-home-area-to"
				<?php if ( 'placeholders' == $input_titles ) : ?>placeholder="<?php echo __( 'Home area to', 'realia' ); ?>"<?php endif; ?>
		       class="form-control" value="<?php echo ! empty( $_GET['filter-home-area-to'] ) ? $_GET['filter-home-area-to'] : ''; ?>"
		       id="<?php echo ! empty( $field_id_prefix ) ? $field_id_prefix : ''; ?><?php echo esc_attr( $args['widget_id'] ); ?>_home_area_to">
	</div><!-- /.form-group -->
<?php endif; ?>
