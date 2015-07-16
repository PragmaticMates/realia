<?php if ( empty( $instance['hide_property_type'] ) ) : ?>
	<div class="form-group">
		<?php if ( 'labels' == $input_titles ) : ?>
			<label for="<?php echo ! empty( $field_id_prefix ) ? $field_id_prefix : ''; ?><?php echo esc_attr( $args['widget_id'] ); ?>_property_type"><?php echo __( 'Property type', 'realia' ); ?></label>
		<?php endif; ?>

		<select class="form-control" name="filter-property-type" id="<?php echo ! empty( $field_id_prefix ) ? $field_id_prefix : ''; ?><?php echo esc_attr( $args['widget_id'] ); ?>_property_type">
			<?php $property_types = get_terms( 'property_types', array(
				'hide_empty' 	=> false,
				'parent'		=> 0,
			) ); ?>

			<option value="">
				<?php if ( 'placeholders' == $input_titles ) : ?>
					<?php echo __( 'Property type', 'realia' ); ?>
				<?php else : ?>
					<?php echo __( 'All property types', 'realia' ); ?>
				<?php endif; ?>
			</option>

			<?php if ( is_array( $property_types ) ) : ?>
				<?php foreach ( $property_types as $property_type ) : ?>
					<option value="<?php echo esc_attr( $property_type->term_id ); ?>" <?php if ( ! empty( $_GET['filter-property-type'] ) && $_GET['filter-property-type'] == $property_type->term_id ) : ?>selected="selected"<?php endif; ?>>
						<?php echo esc_html( $property_type->name ); ?>
					</option>

					<?php $subtypes = get_terms( 'property_types', array(
						'hide_empty' 	=> false,
						'parent' 		=> $property_type->term_id,
					) ); ?>

					<?php if ( is_array( $subtypes ) ) : ?>
						<?php foreach ( $subtypes as $subtype ) : ?>
							<option value="<?php echo esc_attr( $subtype->term_id ); ?>" <?php if ( ! empty( $_GET['filter-property-type'] ) && $_GET['filter-property-type'] == $subtype->term_id ) : ?>selected="selected"<?php endif; ?>>
								&raquo;&nbsp; <?php echo esc_html( $subtype->name ); ?>
							</option>
						<?php endforeach; ?>
					<?php endif; ?>
				<?php endforeach ?>
			<?php endif; ?>
		</select>
	</div><!-- /.form-group -->
<?php endif; ?>
