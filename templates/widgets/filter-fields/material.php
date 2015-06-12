<?php if ( empty( $instance['hide_material'] ) ) : ?>
	<div class="form-group">
		<?php if ( $input_titles == 'labels' ) : ?>
			<label for="<?php echo esc_attr( $args['widget_id'] ); ?>_status"><?php echo __( 'Material', 'realia' ); ?></label>
		<?php endif; ?>

		<select name="filter-material" id="<?php echo esc_attr( $args['widget_id'] ); ?>_status">
			<?php $materials = get_terms( 'materials', array( 'hide_empty' => false ) ); ?>

			<option value="">
				<?php if ( $input_titles == 'placeholders' ) : ?>
					<?php echo __( 'Material', 'realia' ); ?>
				<?php else: ?>
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