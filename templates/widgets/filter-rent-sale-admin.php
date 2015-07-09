<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
$button_text = ! empty( $instance['button_text'] ) ? $instance['button_text'] : '';
$input_titles = ! empty( $instance['input_titles'] ) ? $instance['input_titles'] : '';
$sort_rent = ! empty( $instance['sort_rent'] ) ? $instance['sort_rent'] : '';
$sort_sale = ! empty( $instance['sort_sale'] ) ? $instance['sort_sale'] : '';
$classes = ! empty( $instance['classes'] ) ? $instance['classes'] : '';
?>

<!-- TITLE -->
<p>
	<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
		<?php echo __( 'Title', 'realia' ); ?>
	</label>

	<input  class="widefat"
	        id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
	        name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
	        type="text"
	        value="<?php echo esc_attr( $title ); ?>">
</p>

<!-- BUTTON TEXT -->
<p>
	<label for="<?php echo esc_attr( $this->get_field_id( 'button_text' ) ); ?>">
		<?php echo __( 'Button text', 'realia' ); ?>
	</label>

	<input  class="widefat"
	        id="<?php echo esc_attr( $this->get_field_id( 'button_text' ) ); ?>"
	        name="<?php echo esc_attr( $this->get_field_name( 'button_text' ) ); ?>"
	        type="text"
	        value="<?php echo esc_attr( $button_text ); ?>">
</p>

<!-- INPUT TITLES -->
<label><?php echo __( 'Input titles', 'realia' ); ?></label>

<ul>
	<li>
		<label>
			<input  type="radio"
			        class="radio"
			        value="labels"
				<?php echo ( empty( $input_titles ) || 'labels' == $input_titles ) ? 'checked="checked"' : ''; ?>
			        id="<?php echo esc_attr( $this->get_field_id( 'input_titles' ) ); ?>"
			        name="<?php echo esc_attr( $this->get_field_name( 'input_titles' ) ); ?>">
			<?php echo __( 'Labels', 'realia' ); ?>
		</label>
	</li>

	<li>
		<label>
			<input  type="radio"
			        class="radio"
			        value="placeholders"
				<?php echo ( 'placeholders' == $input_titles ) ? 'checked="checked"' : ''; ?>
			        id="<?php echo esc_attr( $this->get_field_id( 'input_titles' ) ); ?>"
			        name="<?php echo esc_attr( $this->get_field_name( 'input_titles' ) ); ?>">
			<?php echo __( 'Placeholders', 'realia' ); ?>
		</label>
	</li>
</ul>

<!-- CLASSES -->
<p>
	<label for="<?php echo esc_attr( $this->get_field_id( 'classes' ) ); ?>">
		<?php echo __( 'Classes', 'realia' ); ?>
	</label>

	<input  class="widefat"
	        id="<?php echo esc_attr( $this->get_field_id( 'classes' ) ); ?>"
	        name="<?php echo esc_attr( $this->get_field_name( 'classes' ) ); ?>"
	        type="text"
	        value="<?php echo esc_attr( $classes ); ?>">
	<br>
	<small><?php echo __( 'Additional classes e.g. <i>transparent-background map-overlay</i>', 'realia' ); ?></small>
</p>


<hr>

<?php $fields = Realia_Filter::get_fields(); ?>


<h3><?php echo __( 'Rent Fields', 'realia' ); ?></h3>

<input type="hidden"
       value="<?php echo esc_attr( $sort_rent ); ?>"
       id="<?php echo esc_attr( $this->get_field_id( 'sort_rent' ) ); ?>"
       name="<?php echo esc_attr( $this->get_field_name( 'sort_rent' ) ); ?>">

<ul class="realia-filter-rent-sale-fields"  data-sort-field="<?php echo esc_attr( $this->get_field_id( 'sort_rent' ) ); ?>">
	<?php if ( ! empty( $instance['sort_rent'] ) ) : ?>
		<?php
		$keys = explode( ',', $instance['sort_rent'] );
		$filtered_keys = array_filter( $keys );
		$fields = array_replace( array_flip( $filtered_keys ), $fields );
		?>
	<?php endif; ?>

	<?php foreach ( $fields as $key => $value ) : ?>
		<li data-field-id="<?php echo esc_attr( $key ); ?>" <?php if ( ! empty( $instance[ 'rent_hide_' . $key ] ) ) : ?>class="invisible"<?php endif; ?>>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'rent_hide_' . $key ) ); ?>">
					<?php echo esc_attr( $value ); ?>
				</label>

				<span class="visibility">
					<input 	type="checkbox"
					          class="checkbox field-visibility"
						<?php echo ! empty( $instance[ 'rent_hide_'. $key ] ) ? 'checked="checked"' : ''; ?>
					          name="<?php echo esc_attr( $this->get_field_name( 'rent_hide_' . $key ) ); ?>">

					<i class="dashicons dashicons-visibility"></i>
				</span>
			</p>
		</li>
	<?php endforeach ?>
</ul>

<h3><?php echo __( 'Sale Fields', 'realia' ); ?></h3>

<input type="hidden"
       value="<?php echo esc_attr( $sort_sale ); ?>"
       id="<?php echo esc_attr( $this->get_field_id( 'sort_sale' ) ); ?>"
       name="<?php echo esc_attr( $this->get_field_name( 'sort_sale' ) ); ?>">

<ul class="realia-filter-rent-sale-fields" data-sort-field="<?php echo esc_attr( $this->get_field_id( 'sort_sale' ) ); ?>">
	<?php if ( ! empty( $instance['sort_sale'] ) ) : ?>
		<?php
		$keys = explode( ',', $instance['sort_sale'] );
		$filtered_keys = array_filter( $keys );
		$fields = array_replace( array_flip( $filtered_keys ), $fields );
		?>
	<?php endif; ?>

	<?php foreach ( $fields as $key => $value ) : ?>
		<li data-field-id="<?php echo esc_attr( $key ); ?>" <?php if ( ! empty( $instance[ 'sale_hide_' . $key ] ) ) : ?>class="invisible"<?php endif; ?>>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'sale_hide_' . $key ) ); ?>">
					<?php echo esc_attr( $value ); ?>
				</label>

				<span class="visibility">
					<input 	type="checkbox"
					          class="checkbox field-visibility"
						<?php echo ! empty( $instance[ 'sale_hide_'. $key ] ) ? 'checked="checked"' : ''; ?>
					          name="<?php echo esc_attr( $this->get_field_name( 'sale_hide_' . $key ) ); ?>">

					<i class="dashicons dashicons-visibility"></i>
				</span>
			</p>
		</li>
	<?php endforeach ?>
</ul>

<script type="text/javascript">
	jQuery(document).ready(function($) {
		$('.widget .realia-filter-rent-sale-fields').each(function() {
			var el = $(this);

			el.sortable({
				update: function(event, ui) {
					var data = el.sortable('toArray', {
						attribute: 'data-field-id'
					});
					$('#' + $(this).data('sort-field')).attr('value', data);
				}
			});

			$(this).find('input[type=checkbox]').on('change', function() {
				if ($(this).is(':checked')) {
					$(this).closest('li').addClass('invisible');
				} else {
					$(this).closest('li').removeClass('invisible');
				}
			});
		});
	});
</script>
