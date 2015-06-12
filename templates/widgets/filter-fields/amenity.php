<?php if ( empty( $instance['hide_amenity'] ) ) : ?>
	<div class="form-group">
		<?php if ( $input_titles == 'labels' ) : ?>
			<label for="<?php echo esc_attr( $args['widget_id'] ); ?>_property_type"><?php echo __( 'Amenity', 'realia' ); ?></label>
		<?php endif; ?>

		<select name="filter-amenity" id="<?php echo esc_attr( $args['widget_id'] ); ?>_property_type">
			<?php $amenities = get_terms( 'amenities', array( 'hide_empty' => false ) ); ?>
			<option value="">
				<?php if ( $input_titles == 'placeholders' ) : ?>
					<?php echo __( 'Amenity', 'realia' ); ?>
				<?php else: ?>
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