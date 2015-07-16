<?php if ( empty( $instance['hide_sticky'] ) ) : ?>
	<div class="form-group">
		<div class="checkbox">
			<input type="checkbox" name="filter-sticky" <?php echo ! empty( $_GET['filter-sticky'] ) ? 'checked' : ''; ?> id="<?php echo ! empty( $field_id_prefix ) ? $field_id_prefix : ''; ?><?php echo esc_attr( $args['widget_id'] ); ?>_sticky">

			<label for="<?php echo ! empty( $field_id_prefix ) ? $field_id_prefix : ''; ?><?php echo esc_attr( $args['widget_id'] ); ?>_sticky">
				<?php echo __( 'TOP', 'realia' ); ?>
			</label>
		</div><!-- /.checkbox -->
	</div><!-- /.form-group -->
<?php endif; ?>
