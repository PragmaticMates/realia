<?php if ( empty( $instance['hide_year_built'] ) ) : ?>
	<div class="form-group">
		<?php if ( 'labels' == $input_titles ) : ?>
			<label for="<?php echo ! empty( $field_id_prefix ) ? $field_id_prefix : ''; ?><?php echo esc_attr( $args['widget_id'] ); ?>_year_built"><?php echo __( 'Year built', 'realia' ); ?></label>
		<?php endif; ?>

		<input type="text" name="filter-year-built"
				<?php if ( 'placeholders' == $input_titles ) : ?>placeholder="<?php echo __( 'Year built', 'realia' ); ?>"<?php endif; ?>
		       class="form-control" value="<?php echo ! empty( $_GET['filter-year-built'] ) ? $_GET['filter-year-built'] : ''; ?>"
		       id="<?php echo ! empty( $field_id_prefix ) ? $field_id_prefix : ''; ?><?php echo esc_attr( $args['widget_id'] ); ?>_year_built">
	</div><!-- /.form-group -->
<?php endif;?>
