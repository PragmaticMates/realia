<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<?php echo wp_kses( $args['before_widget'], wp_kses_allowed_html( 'post' ) ); ?>
<?php $input_titles = ! empty( $instance['input_titles'] ) ? $instance['input_titles'] : 'labels'; ?>

<?php if ( ! empty( $instance['fullwidth'] ) ) : ?>
	<div class="container">
<?php endif; ?>

<?php if ( ! empty( $instance['title'] ) ) : ?>
    <?php echo wp_kses( $args['before_title'], wp_kses_allowed_html( 'post' ) ); ?>
    <?php echo esc_attr( $instance['title'] ); ?>
    <?php echo wp_kses( $args['after_title'], wp_kses_allowed_html( 'post' ) ); ?>
<?php endif; ?>

<?php if ( ! empty( $instance['custom_uri'] ) ) : ?>
    <?php $uri = $instance['custom_uri']; ?>
<?php else: ?>
    <?php $uri = get_post_type_archive_link( 'property' ); ?>
<?php endif; ?>

<form method="get" action="<?php echo esc_attr( $uri ); ?>" class="horizontal-filter <?php if ( empty( $instance['title'] ) ) : ?>no-title<?php endif; ?>">
	<?php $skip = array(
		'filter-id', 'filter-location', 'filter-contract-type', 'price-from', 'price-to', 'beds', 'baths', 'garages', 'area'
	); ?>

    <?php foreach ( $_GET as $key => $value ) : ?>
    	<?php if ( ! in_array( $key, $skip ) ) : ?>
        	<input type="hidden" name="<?php echo esc_attr( $key ); ?>" value="<?php echo esc_html( $value ); ?>">
        <?php endif; ?>
    <?php endforeach; ?>

    <?php if ( empty ( $instance['hide_property_id'] ) ) : ?>
		<!-- PROPERTY ID -->
		<div class="form-group">
			<?php if ( $input_titles == 'labels' ) : ?>
				<label><?php echo __( 'Property ID', 'realia' ); ?></label>
			<?php endif; ?>

			<input type="text" name="filter-id" class="form-control"
			<?php if ( $input_titles == 'placeholders' ) : ?>placeholder="<?php echo __( 'Property ID', 'realia' ); ?>"<?php endif; ?>
			value="<?php echo ! empty( $_GET['filter-id']) ? $_GET['filter-id'] : ''; ?>">
		</div><!-- /.form-group -->
	<?php endif; ?>

	<?php if ( empty ( $instance['hide_location'] ) ) : ?>
		<!-- LOCATION -->
		<div class="form-group">
			<?php if ( $input_titles == 'labels' ) : ?>
				<label><?php echo __( 'Location', 'realia' ); ?></label>
			<?php endif; ?>

			<select name="filter-location">
				<option value="">
					<?php if ( $input_titles == 'placeholders' ) : ?>
						<?php echo __( 'Location', 'realia' ); ?>
					<?php else: ?>
						<?php echo __( 'All locations', 'realia' ); ?>
					<?php endif; ?>
				</option>

				<?php $locations = get_terms( 'locations', array(
					'hide_empty' 	=> false,
					'parent'		=> 0
				) ); ?>

				<?php if ( is_array( $locations ) ) : ?>
					<?php foreach ( $locations as $location ) : ?>
						<option value="<?php echo esc_attr( $location->term_id ); ?>" <?php if ( ! empty( $_GET['filter-location'] ) && $_GET['filter-location'] == $location->term_id ) : ?>selected="selected"<?php endif; ?>>
							<?php echo esc_html( $location->name ); ?>
						</option>

						<?php $sublocations = get_terms( 'locations', array(
							'hide_empty' => false,
							'parent' => $location->term_id,
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

	<?php if ( empty ( $instance['hide_property_type'] ) ) : ?>
		<!-- PROPERTY TYPE -->
		<div class="form-group">
			<?php if ( $input_titles == 'labels' ) : ?>
				<label>
					<?php echo __( 'Property Type', 'realia' ); ?>
				</label>
			<?php endif; ?>

			<select name="filter-property-type">
				<?php $property_types = get_terms( 'property_types', array( 'hide_empty' => false ) ); ?>
				<option value="">
					<?php if ( $input_titles == 'placeholders' ) : ?>
						<?php echo __( 'Property type', 'realia' ); ?>
					<?php else: ?>
						<?php echo __( 'All property types', 'realia' ); ?>
					<?php endif; ?>
				</option>

				<?php if ( is_array( $property_types ) ) : ?>
					<?php foreach ( $property_types as $property_type ) : ?>
						<option value="<?php echo esc_attr( $property_type->term_id ); ?>" <?php if ( ! empty( $_GET['filter-property-type'] ) && $_GET['filter-property-type'] == $property_type->term_id ) : ?>selected="selected"<?php endif; ?>><?php echo esc_html( $property_type->name ); ?></option>
					<?php endforeach ?>
				<?php endif; ?>
			</select>
		</div><!-- /.form-group -->
	<?php endif; ?>

	<?php if ( empty ( $instance['hide_contract'] ) ) : ?>
		<!-- CONTRACT TYPE-->
		<div class="form-group">
			<?php if ( $input_titles == 'labels' ) : ?>
				<label><?php echo __( 'Contract', 'realia' ); ?></label>
			<?php endif; ?>

			<select name="filter-contract-type">
				<?php $contracts = get_terms( 'contracts', array( 'hide_empty' => false ) ); ?>
				<option value="">
					<?php if ( $input_titles == 'placeholders' ) : ?>
						<?php echo __( 'Contract', 'realia' ); ?>
					<?php else: ?>
						<?php echo __( 'All contracts', 'realia' ); ?>
					<?php endif; ?>
				</option>

				<?php if ( is_array( $contracts ) ) : ?>
					<?php foreach ( $contracts as $contract ) : ?>
						<option value="<?php echo esc_attr( $contract->term_id ); ?>" <?php if ( ! empty(  $_GET['filter-contract-type'] ) && $_GET['filter-contract-type']== $contract->term_id ) : ?>selected="selected"<?php endif; ?>><?php echo esc_html( $contract->name ); ?></option>
					<?php endforeach ?>
				<?php endif; ?>
			</select>
		</div><!-- /.form-group -->
	<?php endif; ?>

	<?php if ( empty ( $instance['hide_price'] ) ) : ?>
		<!-- PRICE -->
		<div class="form-group">
			<?php if ( $input_titles == 'labels' ) : ?>
				<label><?php echo __( 'Price from', 'realia' ); ?></label>
			<?php endif; ?>

			<input type="text" name="filter-price-from"
			<?php if ( $input_titles == 'placeholders' ) : ?>placeholder="<?php echo __( 'Price from', 'realia' ); ?>"<?php endif; ?>
			class="form-control" value="<?php echo ! empty( $_GET['filter-price-from'] ) ? $_GET['filter-price-from'] : ''; ?>">
		</div><!-- /.form-group -->

		<div class="form-group">
			<?php if ( $input_titles == 'labels' ) : ?>
				<label><?php echo __( 'Price to', 'realia' ); ?></label>
			<?php endif; ?>

			<input type="text" name="filter-price-to"
			<?php if ( $input_titles == 'placeholders' ) : ?>placeholder="<?php echo __( 'Price to', 'realia' ); ?>"<?php endif; ?>
			class="form-control" value="<?php echo ! empty( $_GET['filter-price-to'] ) ? $_GET['filter-price-to'] : ''; ?>">
		</div><!-- /.form-group -->
	<?php endif; ?>

	<!-- BATHS -->
	<?php if ( empty ( $instance['hide_baths'] ) ) : ?>
		<div class="form-group">
			<?php if ( $input_titles == 'labels' ) : ?>
				<label><?php echo __( 'Baths', 'realia' ); ?></label>
			<?php endif; ?>

			<input type="text" name="filter-baths"
			<?php if ( $input_titles == 'placeholders' ) : ?>placeholder="<?php echo __( 'Baths', 'realia' ); ?>"<?php endif; ?>
			class="form-control" value="<?php echo ! empty( $_GET['filter-baths'] ) ? $_GET['filter-baths'] : ''; ?>">
		</div><!-- /.form-group -->
	<?php endif; ?>

	<!-- BEDS -->
	<?php if ( empty ( $instance['hide_beds'] ) ) : ?>
		<div class="form-group">
			<?php if ( $input_titles == 'labels' ) : ?>
				<label><?php echo __( 'Beds', 'realia' ); ?></label>
			<?php endif; ?>

			<input type="text" name="filter-beds"
			<?php if ( $input_titles == 'placeholders' ) : ?>placeholder="<?php echo __( 'Beds', 'realia' ); ?>"<?php endif; ?>
			class="form-control" value="<?php echo ! empty( $_GET['filter-beds'] ) ? $_GET['filter-beds'] : ''; ?>">
		</div><!-- /.form-group -->
	<?php endif;?>

	<!-- AREA  -->
	<?php if ( empty ( $instance['hide_area'] ) ) : ?>
		<div class="form-group">
			<?php if ( $input_titles == 'labels' ) : ?>
				<label><?php echo __( 'Area', 'realia' ); ?></label>
			<?php endif; ?>

				<input type="text" name="filter-area"
				<?php if ( $input_titles == 'placeholders' ) : ?>placeholder="<?php echo __( 'Area', 'realia' ); ?>"<?php endif; ?>
				class="form-control" value="<?php echo ! empty( $_GET['filter-area'] ) ? $_GET['filter-area'] : ''; ?>">
		</div><!-- /.form-group -->
	<?php endif; ?>

	<!-- GARAGES -->
	<?php if ( empty( $instance['hide_garages'] ) ) : ?>
		<div class="form-group">
			<?php if ( $input_titles == 'labels' ) : ?>
				<label><?php echo __( 'Garages', 'realia' ); ?></label>
			<?php endif; ?>

				<input type="text" name="filter-garages"
				<?php if ( $input_titles == 'placeholders' ) : ?>placeholder="<?php echo __( 'Garages', 'realia' ); ?>"<?php endif; ?>
				class="form-control" value="<?php echo ! empty( $_GET['filter-garages'] ) ? $_GET['filter-garages'] : ''; ?>">
			</div><!-- /.form-group -->
		</div><!-- /.form-group -->
	<?php endif; ?>
</form>

<?php if ( ! empty( $instance['fullwidth'] ) ) : ?>
	</div><!-- /.container -->
<?php endif; ?>

<?php echo wp_kses( $args['after_widget'], wp_kses_allowed_html( 'post' ) ); ?>
