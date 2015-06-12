<?php if ( empty( $instance['hide_rooms'] ) ) : ?>
	<?php if ( empty( $instance['hide_rooms'] ) ) : ?>
		<div class="form-group">
			<?php if ( $input_titles == 'labels' ) : ?>
				<label for="<?php echo esc_attr( $args['widget_id'] ); ?>_baths"><?php echo __( 'Rooms', 'realia' ); ?></label>
			<?php endif; ?>

			<input type="text" name="filter-rooms"
			       <?php if( $input_titles == 'placeholders' ) : ?>placeholder="<?php echo __( 'Rooms', 'realia' ); ?>"<?php endif; ?>
			       class="form-control" value="<?php echo ! empty( $_GET['filter-rooms'] ) ? $_GET['filter-rooms'] : ''; ?>"
			       id="<?php echo esc_attr( $args['widget_id'] ); ?>_baths">
		</div><!-- /.form-group -->
	<?php endif; ?>
<?php endif; ?>