<?php if ( empty( $instance['hide_reduced'] ) ) : ?>
	<div class="form-group">
		<div class="checkbox">
			<input type="checkbox" name="filter-reduced" <?php echo ! empty( $_GET['filter-reduced'] ) ? 'checked' : ''; ?> id="<?php echo esc_attr( $args['widget_id'] ); ?>_reduced">

			<label for="<?php echo esc_attr( $args['widget_id'] ); ?>_reduced">
				<?php echo __( 'Reduced', 'realia' ); ?>
			</label>
		</div>
	</div><!-- /.form-group -->
<?php endif; ?>
