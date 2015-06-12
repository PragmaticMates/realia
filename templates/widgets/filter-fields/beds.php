<?php if ( empty( $instance['hide_beds'] ) ) : ?>
	<div class="form-group">
		<?php if ( $input_titles == 'labels' ) : ?>
			<label for="<?php echo esc_attr( $args['widget_id'] ); ?>_beds"><?php echo __( 'Beds', 'realia' ); ?></label>
		<?php endif; ?>

		<input type="text" name="filter-beds"
		       <?php if( $input_titles == 'placeholders' ) : ?>placeholder="<?php echo __( 'Beds', 'realia' ); ?>"<?php endif; ?>
		       class="form-control" value="<?php echo ! empty( $_GET['filter-beds'] ) ? $_GET['filter-beds'] : ''; ?>"
		       id="<?php echo esc_attr( $args['widget_id'] ); ?>_beds">
	</div><!-- /.form-group -->
<?php endif; ?>