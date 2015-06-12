<?php if ( empty( $instance['hide_year_built'] ) ) : ?>
	<div class="form-group">
		<?php if ( $input_titles == 'labels' ) : ?>
			<label for="<?php echo esc_attr( $args['widget_id'] ); ?>_year_built"><?php echo __( 'Year built', 'realia' ); ?></label>
		<?php endif; ?>

		<input type="text" name="filter-year-built"
		       <?php if( $input_titles == 'placeholders' ) : ?>placeholder="<?php echo __( 'Year built', 'realia' ); ?>"<?php endif; ?>
		       class="form-control" value="<?php echo ! empty( $_GET['filter-year-built'] ) ? $_GET['filter-year-built'] : ''; ?>"
		       id="<?php echo esc_attr( $args['widget_id'] ); ?>_year_built">
	</div><!-- /.form-group -->
<?php endif;?>