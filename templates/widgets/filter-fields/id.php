<?php if ( empty( $instance['hide_id'] ) ) : ?>
	<div class="form-group">
		<?php if ( $input_titles == 'labels' ) : ?>
			<label for="<?php echo esc_attr( $args['widget_id'] ); ?>_property_id"><?php echo __( 'Property ID', 'realia' ); ?></label>
		<?php endif; ?>

		<input type="text" name="filter-id" class="form-control"
		       <?php if( $input_titles == 'placeholders' ) : ?>placeholder="<?php echo __( 'Property ID', 'realia' ); ?>"<?php endif; ?>
		       value="<?php echo ! empty( $_GET['filter-id']) ? $_GET['filter-id'] : ''; ?>"
		       id="<?php echo esc_attr( $args['widget_id'] ); ?>_property_id">
	</div><!-- /.form-group -->
<?php endif; ?>