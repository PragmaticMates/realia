<?php if ( empty( $instance['hide_baths'] ) ) : ?>
	<div class="form-group">
		<?php if ( 'labels' == $input_titles ) : ?>
			<label for="<?php echo ! empty( $field_id_prefix ) ? $field_id_prefix : ''; ?><?php echo esc_attr( $args['widget_id'] ); ?>_baths"><?php echo __( 'Baths', 'realia' ); ?></label>
		<?php endif; ?>

		<select name="filter-baths"
				id="<?php echo ! empty( $field_id_prefix ) ? $field_id_prefix : ''; ?><?php echo esc_attr( $args['widget_id'] ); ?>_baths"
				class="form-control">
			<option value="">
				<?php if ( 'placeholders' == $input_titles ) : ?>
					<?php echo __( 'Baths: any', 'realia' ); ?>
				<?php else : ?>
					<?php echo __( 'Any', 'realia' ); ?>
				<?php endif; ?>
			</option>

			<?php for ( $i = 1; $i <= 5; $i++ ) : ?>
				<option value="<?php echo esc_attr( $i ); ?>" <?php if ( ! empty( $_GET['filter-baths'] ) && $_GET['filter-baths'] == $i ) : ?>selected="selected"<?php endif; ?>>
					<?php echo esc_attr( $i ); ?>+
				</option>
			<?php endfor; ?>
		</select>
	</div><!-- /.form-group -->
<?php endif; ?>
