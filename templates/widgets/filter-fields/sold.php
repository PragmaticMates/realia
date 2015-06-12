<?php if ( empty( $instance['hide_sold'] ) ) : ?>
	<div class="form-group checkbox">
		<input type="checkbox" name="filter-sold"
			<?php echo ! empty( $_GET['filter-sold'] ) ? 'checked' : ''; ?>
			   id="<?php echo esc_attr( $args['widget_id'] ); ?>_sold">

		<label for="<?php echo esc_attr( $args['widget_id'] ); ?>_sold"><?php echo __( 'Sold', 'realia' ); ?></label>
	</div><!-- /.form-group -->
<?php endif; ?>