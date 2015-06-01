<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<?php $title = ! empty( $instance['title'] ) ? $instance['title'] : ''; ?>
<?php $count = ! empty( $instance['count'] ) ? $instance['count'] : 3; ?>
<?php $per_row = ! empty( $instance['per_row'] ) ? $instance['per_row'] : 3; ?>
<?php $attribute = ! empty( $instance['attribute'] ) ? $instance['attribute'] : ''; ?>
<?php $display = ! empty( $instance['display'] ) ? $instance['display'] : ''; ?>

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

<!-- COUNT -->
<p>
    <label for="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>">
        <?php echo __( 'Count', 'realia' ); ?>
    </label>

    <input  class="widefat"
            id="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>"
            name="<?php echo esc_attr( $this->get_field_name( 'count' ) ); ?>"
            type="text"
            value="<?php echo esc_attr( $count ); ?>">
</p>

<!-- PER ROW -->
<p>
    <label for="<?php echo esc_attr( $this->get_field_id( 'per_row' ) ); ?>">
        <?php echo __( 'Items per row', 'realia' ); ?>
    </label>

    <select id="<?php echo esc_attr( $this->get_field_id( 'per_row' ) ); ?>"
            name="<?php echo esc_attr( $this->get_field_name( 'per_row' ) ); ?>">
        <option value="1" <?php echo ( $per_row == '1' ) ? 'selected="selected"' : ''; ?>>1</option>
        <option value="2" <?php echo ( $per_row == '2' ) ? 'selected="selected"' : ''; ?>>2</option>
        <option value="3" <?php echo ( $per_row == '3' ) ? 'selected="selected"' : ''; ?>>3</option>
        <option value="4" <?php echo ( $per_row == '4' ) ? 'selected="selected"' : ''; ?>>4</option>
        <option value="6" <?php echo ( $per_row == '5' ) ? 'selected="selected"' : ''; ?>>5</option>
	    <option value="6" <?php echo ( $per_row == '6' ) ? 'selected="selected"' : ''; ?>>6</option>
    </select>
</p>

<!-- ATTRIBUTE -->
<p>
    <strong><?php echo __( 'Choose attribute', 'realia' ); ?></strong><br>
    <ul>
        <li>
            <label>
                <input  type="radio"
                        class="radio"
                        <?php echo ( empty( $attribute ) || $attribute == 'on' ) ? 'checked="checked"' : ''; ?>
                        id="<?php echo esc_attr( $this->get_field_id( 'attribute' ) ); ?>"
                        name="<?php echo esc_attr( $this->get_field_name( 'attribute' ) ); ?>">
                <?php echo __( 'It doesn\'t matter', 'realia' ); ?>
            </label>
        </li>

        <li>
            <label>
                <input  type="radio"
                        class="radio"
                        value="featured"
                        <?php echo ( $attribute == 'featured' ) ? 'checked="checked"' : ''; ?>
                        id="<?php echo esc_attr( $this->get_field_id( 'attribute' ) ); ?>"
                        name="<?php echo esc_attr( $this->get_field_name( 'attribute' ) ); ?>">
                <?php echo __( 'Featured only', 'realia' ); ?>
            </label>
        </li>

        <li>
            <label>
                <input  type="radio"
                        class="radio"
                        value="reduced"
                        <?php echo ( $attribute == 'reduced' ) ? 'checked="checked"' : ''; ?>
                        id="<?php echo esc_attr( $this->get_field_id( 'attribute' ) ); ?>"
                        name="<?php echo esc_attr( $this->get_field_name( 'attribute' ) ); ?>">

                <?php echo __( 'Reduced only', 'realia' ); ?>
            </label>
        </li>
    </ul>
</p>

<!-- DISPLAY -->
<p>
	<label for="<?php echo esc_attr( $this->get_field_id( 'display' ) ); ?>">
		<?php echo __( 'Display as', 'realia' ); ?>
	</label>

	<select id="<?php echo esc_attr( $this->get_field_id( 'display' ) ); ?>"
	        name="<?php echo esc_attr( $this->get_field_name( 'display' ) ); ?>">
		<option value="0"><?php echo __( 'Select', 'realia' ); ?></option>
		<option value="box" <?php echo ( $display == 'box'  || empty( $display ) ) ? 'selected="selected"' : ''; ?>><?php echo __( 'Box', 'realia' ); ?></option>
		<option value="small" <?php echo ( $display == 'small' ) ? 'selected="selected"' : ''; ?>><?php echo __( 'Small', 'realia' ); ?></option>
		<option value="only-image" <?php echo ( $display == 'only-image' ) ? 'selected="selected"' : ''; ?>><?php echo __( 'Only image', 'realia' ); ?></option>
	</select>
</p>