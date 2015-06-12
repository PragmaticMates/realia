<?php if ( empty( $instance['hide_sticky'] ) ) : ?>
	<div class="form-group checkbox">
		<input type="checkbox" name="filter-sticky"
			<?php echo ! empty( $_GET['filter-sticky'] ) ? 'checked' : ''; ?>
			   id="<?php echo esc_attr( $args['widget_id'] ); ?>_sticky">

		<label for="<?php echo esc_attr( $args['widget_id'] ); ?>_sticky"><?php echo __( 'TOP', 'realia' ); ?></label>
	</div><!-- /.form-group -->
<?php endif; ?>