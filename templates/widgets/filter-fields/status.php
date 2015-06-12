<?php if ( empty( $instance['hide_status'] ) ) : ?>
	<div class="form-group">
		<?php if ( $input_titles == 'labels' ) : ?>
			<label for="<?php echo esc_attr( $args['widget_id'] ); ?>_status"><?php echo __( 'Status', 'realia' ); ?></label>
		<?php endif; ?>

		<select name="filter-status" id="<?php echo esc_attr( $args['widget_id'] ); ?>_status">
			<?php $statuses = get_terms( 'statuses', array( 'hide_empty' => false ) ); ?>

			<option value="">
				<?php if ( $input_titles == 'placeholders' ) : ?>
					<?php echo __( 'Status', 'realia' ); ?>
				<?php else: ?>
					<?php echo __( 'All statuses', 'realia' ); ?>
				<?php endif; ?>
			</option>

			<?php if ( is_array( $statuses ) ) : ?>
				<?php foreach ( $statuses as $status ) : ?>
					<option value="<?php echo esc_attr( $status->term_id ); ?>" <?php if ( ! empty( $_GET['filter-status'] ) &&  $_GET['filter-status'] == $status->term_id ) : ?>selected="selected"<?php endif; ?>><?php echo esc_html( $status->name ); ?></option>
				<?php endforeach ?>
			<?php endif; ?>
		</select>
	</div><!-- /.form-group -->
<?php endif; ?>