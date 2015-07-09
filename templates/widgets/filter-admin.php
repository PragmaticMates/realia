<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
$button_text = ! empty( $instance['button_text'] ) ? $instance['button_text'] : '';
$input_titles = ! empty( $instance['input_titles'] ) ? $instance['input_titles'] : '';
$sort = ! empty( $instance['sort'] ) ? $instance['sort'] : '';
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

<hr>

<ul class="realia-filter-fields">
	<?php $fields = Realia_Filter::get_fields(); ?>

	<?php if ( ! empty( $instance['sort'] ) ) : ?>
		<?php
		$keys = explode( ',', $instance['sort'] );
		$filtered_keys = array_filter( $keys );
		$fields = array_replace( array_flip( $filtered_keys ), $fields );
		?>
	<?php endif; ?>

	<input type="hidden"
	       value="<?php echo esc_attr( $sort ); ?>"
	       id="<?php echo esc_attr( $this->get_field_id( 'sort' ) ); ?>"
	       name="<?php echo esc_attr( $this->get_field_name( 'sort' ) ); ?>" value="<?php echo esc_attr( $sort ); ?>">

	<?php foreach ( $fields as $key => $value ) : ?>
		<li data-field-id="<?php echo esc_attr( $key ); ?>" <?php if ( ! empty( $instance[ 'hide_' . $key ] ) ) : ?>class="invisible"<?php endif; ?>>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'hide_' . $key ) ); ?>">
					<?php echo esc_attr( $value ); ?>
				</label>

				<span class="visibility">
					<input 	type="checkbox"
				            class="checkbox field-visibility"
							<?php echo ! empty( $instance[ 'hide_'. $key ] ) ? 'checked="checked"' : ''; ?>
				            name="<?php echo esc_attr( $this->get_field_name( 'hide_' . $key ) ); ?>">

					<i class="dashicons dashicons-visibility"></i>
				</span>
			</p>
		</li>
	<?php endforeach ?>
</ul>

<script type="text/javascript">
	jQuery(document).ready(function($) {
		$('.widget .realia-filter-fields').each(function() {
			var el = $(this);

			el.sortable({
				update: function(event, ui) {
					var data = el.sortable('toArray', {
						attribute: 'data-field-id'
					});

					$('#<?php echo esc_attr( $this->get_field_id( 'sort' ) ); ?>').attr('value', data);
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
