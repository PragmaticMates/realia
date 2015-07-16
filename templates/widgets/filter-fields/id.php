<?php if ( empty( $instance['hide_id'] ) ) : ?>
	<div class="form-group">
		<?php if ( 'labels' == $input_titles ) : ?>
			<label for="<?php echo esc_attr( $args['widget_id'] ); ?>_property_id"><?php echo __( 'Property ID', 'realia' ); ?></label>
		<?php endif; ?>

		<input type="text" name="filter-id" class="form-control"
				<?php if ( 'placeholders' == $input_titles ) : ?>placeholder="<?php echo __( 'Property ID', 'realia' ); ?>"<?php endif; ?>
		       value="<?php echo ! empty( $_GET['filter-id'] ) ? $_GET['filter-id'] : ''; ?>"
		       id="<?php echo ! empty( $field_id_prefix ) ? $field_id_prefix : ''; ?><?php echo esc_attr( $args['widget_id'] ); ?>_property_id">
	</div><!-- /.form-group -->
<?php endif; ?>
