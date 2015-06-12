<?php if ( empty( $instance['hide_garages'] ) ) : ?>
	<!-- GARAGES -->
	<div class="form-group">
		<?php if ( $input_titles == 'labels' ) : ?>
			<label for="<?php echo esc_attr( $args['widget_id'] ); ?>_garages"><?php echo __( 'Garages', 'realia' ); ?></label>
		<?php endif; ?>

		<input type="text" name="filter-garages"
		       <?php if( $input_titles == 'placeholders' ) : ?>placeholder="<?php echo __( 'Garages', 'realia' ); ?>"<?php endif; ?>
		       class="form-control" value="<?php echo ! empty( $_GET['filter-garages'] ) ? $_GET['filter-garages'] : ''; ?>"
		       id="<?php echo esc_attr( $args['widget_id'] ); ?>_garages">
	</div><!-- /.form-group -->
<?php endif; ?>