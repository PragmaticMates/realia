<?php if ( empty( $instance['hide_contract'] ) ) : ?>
	<div class="form-group">
		<?php if ( $input_titles == 'labels' ) : ?>
			<label for="<?php echo esc_attr( $args['widget_id'] ); ?>_status"><?php echo __( 'Contract', 'realia' ); ?></label>
		<?php endif; ?>

		<select name="filter-contract" id="<?php echo esc_attr( $args['widget_id'] ); ?>_status">
			<option value=""><?php echo __( 'All contracts', 'realua' ); ?></option>
			<option value="<?php echo REALIA_CONTRACT_SALE; ?>" <?php if ( ! empty( $_GET['filter-contract'] ) &&  $_GET['filter-contract'] == REALIA_CONTRACT_SALE ) : ?>selected="selected"<?php endif; ?>><?php echo __( 'Sale', 'realia' ); ?></option>
			<option value="<?php echo REALIA_CONTRACT_RENT; ?>" <?php if ( ! empty( $_GET['filter-contract'] ) &&  $_GET['filter-contract'] == REALIA_CONTRACT_RENT ) : ?>selected="selected"<?php endif; ?>><?php echo __( 'Rent', 'realia' ); ?></option>
		</select>
	</div><!-- /.form-group -->
<?php endif; ?>