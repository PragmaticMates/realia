<?php if ( empty( $instance['hide_material'] ) ) : ?>
	<div class="form-group">
		<?php if ( 'labels' == $input_titles ) : ?>
			<label for="<?php echo ! empty( $field_id_prefix ) ? $field_id_prefix : ''; ?><?php echo esc_attr( $args['widget_id'] ); ?>_status"><?php echo __( 'Material', 'realia' ); ?></label>
		<?php endif; ?>

		<select class="form-control" name="filter-material" id="<?php echo ! empty( $field_id_prefix ) ? $field_id_prefix : ''; ?><?php echo esc_attr( $args['widget_id'] ); ?>_status">
			<?php $materials = get_terms( 'materials', array( 'hide_empty' => false ) ); ?>

			<option value="">
				<?php if ( 'placeholders' == $input_titles ) : ?>
					<?php echo __( 'Material', 'realia' ); ?>
				<?php else : ?>
					<?php echo __( 'All materials', 'realia' ); ?>
				<?php endif; ?>
			</option>

			<?php if ( is_array( $materials ) ) : ?>
				<?php foreach ( $materials as $material ) : ?>
					<option value="<?php echo esc_attr( $material->term_id ); ?>" <?php if ( ! empty( $_GET['filter-material'] ) &&  $_GET['filter-material'] == $material->term_id ) : ?>selected="selected"<?php endif; ?>><?php echo esc_html( $material->name ); ?></option>
				<?php endforeach ?>
			<?php endif; ?>
		</select>
	</div><!-- /.form-group -->
<?php endif; ?>
