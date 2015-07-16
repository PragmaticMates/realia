<?php if ( empty( $instance['hide_amenity'] ) ) : ?>
	<div class="form-group">
		<?php if ( 'labels' == $input_titles ) : ?>
			<label for="<?php echo ! empty( $field_id_prefix ) ? $field_id_prefix : ''; ?><?php echo esc_attr( $args['widget_id'] ); ?>_amenity"><?php echo __( 'Amenity', 'realia' ); ?></label>
		<?php endif; ?>

		<select class="form-control" name="filter-amenity" id="<?php echo ! empty( $field_id_prefix ) ? $field_id_prefix : ''; ?><?php echo esc_attr( $args['widget_id'] ); ?>_amenity">
			<?php $amenities = get_terms( 'amenities', array( 'hide_empty' => false ) ); ?>
			<option value="">
				<?php if ( 'placeholders' == $input_titles ) : ?>
					<?php echo __( 'Amenity', 'realia' ); ?>
				<?php else : ?>
					<?php echo __( 'All amenities', 'realia' ); ?>
				<?php endif; ?>
			</option>

			<?php if ( is_array( $amenities ) ) : ?>
				<?php foreach ( $amenities as $amenity ) : ?>
					<option value="<?php echo esc_attr( $amenity->term_id ); ?>" <?php if ( ! empty( $_GET['filter-amenity'] ) && $_GET['filter-amenity'] == $amenity->term_id ) : ?>selected="selected"<?php endif; ?>><?php echo esc_html( $amenity->name ); ?></option>
				<?php endforeach ?>
			<?php endif; ?>
		</select>
	</div><!-- /.form-group -->
<?php endif; ?>
