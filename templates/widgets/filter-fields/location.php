<?php if ( empty( $instance['hide_location'] ) ) : ?>
	<div class="form-group">
		<?php if ( 'labels' == $input_titles ) : ?>
			<label for="<?php echo ! empty( $field_id_prefix ) ? $field_id_prefix : ''; ?><?php echo esc_attr( $args['widget_id'] ); ?>_location"><?php echo __( 'Location', 'realia' ); ?></label>
		<?php endif; ?>

		<select class="form-control" name="filter-location" id="<?php echo ! empty( $field_id_prefix ) ? $field_id_prefix : ''; ?><?php echo esc_attr( $args['widget_id'] ); ?>_location">
			<option value="">
				<?php if ( 'placeholders' == $input_titles ) : ?>
					<?php echo __( 'Location', 'realia' ); ?>
				<?php else : ?>
					<?php echo __( 'All locations', 'realia' ); ?>
				<?php endif; ?>
			</option>

			<?php $locations = get_terms( 'locations', array(
				'hide_empty' 	=> false,
				'parent'		=> 0,
			) ); ?>

			<?php if ( is_array( $locations ) ) : ?>
				<?php foreach ( $locations as $location ) : ?>
					<option value="<?php echo esc_attr( $location->term_id ); ?>" <?php if ( ! empty( $_GET['filter-location'] ) && $_GET['filter-location'] == $location->term_id ) : ?>selected="selected"<?php endif; ?>><?php echo esc_html( $location->name ); ?></option>

					<?php $sublocations = get_terms( 'locations', array(
						'hide_empty'    => false,
						'parent'        => $location->term_id,
					) ); ?>

					<?php if ( is_array( $sublocations ) ) : ?>
						<?php foreach ( $sublocations as $sublocation ) : ?>
							<option value="<?php echo esc_attr( $sublocation->term_id ); ?>" <?php if ( ! empty( $_GET['filter-location'] ) && $_GET['filter-location'] == $sublocation->term_id ) : ?>selected="selected"<?php endif; ?>>
								&raquo;&nbsp; <?php echo esc_html( $sublocation->name ); ?>
							</option>

							<?php $subsublocations = get_terms( 'locations', array(
								'hide_empty' 	=> false,
								'parent' 		=> $sublocation->term_id,
							) ); ?>

							<?php if ( is_array( $subsublocations ) ) : ?>
								<?php foreach ( $subsublocations as $subsublocation ) : ?>
									<option value="<?php echo esc_attr( $subsublocation->term_id ); ?>" <?php if ( ! empty( $_GET['filter-location'] ) && $_GET['filter-location'] == $subsublocation->term_id ) : ?>selected="selected"<?php endif; ?>>
										&nbsp;&nbsp;&nbsp;&raquo;&nbsp; <?php echo esc_html( $subsublocation->name ); ?>
									</option>
								<?php endforeach; ?>
							<?php endif; ?>
						<?php endforeach; ?>
					<?php endif; ?>
				<?php endforeach; ?>
			<?php endif; ?>
		</select>
	</div><!-- /.form-group -->
<?php endif; ?>
