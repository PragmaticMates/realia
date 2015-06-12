<?php if ( empty( $instance['hide_home_area'] ) ) : ?>
	<div class="form-group">
		<?php if ( $input_titles == 'labels' ) : ?>
			<label for="<?php echo esc_attr( $args['widget_id'] ); ?>_home_area_from"><?php echo __( 'Home area from', 'realia' ); ?></label>
		<?php endif; ?>

		<input type="text" name="filter-home-area-from"
		       <?php if( $input_titles == 'placeholders' ) : ?>placeholder="<?php echo __( 'Home area from', 'realia' ); ?>"<?php endif; ?>
		       class="form-control" value="<?php echo ! empty( $_GET['filter-home-area-from'] ) ? $_GET['filter-home-area-from'] : ''; ?>"
		       id="<?php echo esc_attr( $args['widget_id'] ); ?>_home_area_from">
	</div><!-- /.form-group -->

	<div class="form-group">
		<?php if ( $input_titles == 'labels' ) : ?>
			<label for="<?php echo esc_attr( $args['widget_id'] ); ?>_home_area_to"><?php echo __( 'Home area to', 'realia' ); ?></label>
		<?php endif; ?>

		<input type="text" name="filter-home-area-to"
		       <?php if( $input_titles == 'placeholders' ) : ?>placeholder="<?php echo __( 'Home area to', 'realia' ); ?>"<?php endif; ?>
		       class="form-control" value="<?php echo ! empty( $_GET['filter-home-area-to'] ) ? $_GET['filter-home-area-to'] : ''; ?>"
		       id="<?php echo esc_attr( $args['widget_id'] ); ?>_home_area_to">
	</div><!-- /.form-group -->
<?php endif; ?>