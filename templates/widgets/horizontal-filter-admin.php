<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<?php $title = ! empty( $instance['title'] ) ? $instance['title'] : ''; ?>
<?php $button_text = ! empty( $instance['button_text'] ) ? $instance['button_text'] : ''; ?>
<?php $custom_uri = ! empty( $instance['custom_uri'] ) ? $instance['custom_uri'] : ''; ?>
<?php $hide_property_id = ! empty( $instance['hide_property_id'] ) ? $instance['hide_property_id'] : ''; ?>
<?php $hide_location = ! empty( $instance['hide_location'] ) ? $instance['hide_location'] : ''; ?>
<?php $hide_property_type = ! empty( $instance['hide_property_type'] ) ? $instance['hide_property_type'] : ''; ?>
<?php $hide_contract = ! empty( $instance['hide_contract'] ) ? $instance['hide_contract'] : ''; ?>
<?php $hide_price = ! empty( $instance['hide_price'] ) ? $instance['hide_price'] : ''; ?>
<?php $hide_baths = ! empty( $instance['hide_baths'] ) ? $instance['hide_baths'] : ''; ?>
<?php $hide_beds = ! empty( $instance['hide_beds'] ) ? $instance['hide_beds'] : ''; ?>
<?php $hide_area = ! empty( $instance['hide_area'] ) ? $instance['hide_area'] : ''; ?>
<?php $hide_garages = ! empty( $instance['hide_garages'] ) ? $instance['hide_garages'] : ''; ?>
<?php $input_titles = ! empty( $instance['input_titles'] ) ? $instance['input_titles'] : ''; ?>
<?php $fullwidth = ! empty( $instance['fullwidth'] ) ? $instance['fullwidth'] : ''; ?>

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

<!-- FULLWIDTH -->
<p>
    <input  type="checkbox"
            class="checkbox"
            <?php echo ! empty( $fullwidth ) ? 'checked="checked"' : ''; ?>
            id="<?php echo esc_attr( $this->get_field_id( 'fullwidth' ) ); ?>"
            name="<?php echo esc_attr( $this->get_field_name( 'fullwidth' ) ); ?>">

    <label for="<?php echo esc_attr( $this->get_field_id( 'fullwidth' ) ); ?>">
        <?php echo __( 'Fullwidth', 'realia' ); ?>
    </label>
</p>

<!-- BUTTON TEXT -->
<p>
    <label for="<?php echo esc_attr( $this->get_field_id( 'button_text' ) ); ?>">
        <?php echo __( 'Button text', 'realia' ); ?>
    </label><br>

    <input  class="widefat"
            id="<?php echo esc_attr( $this->get_field_id( 'button_text' ) ); ?>"
            name="<?php echo esc_attr( $this->get_field_name( 'button_text' ) ); ?>"
            type="text"
            value="<?php echo esc_attr( $button_text ); ?>">
</p>

<!-- CUSTOM URI -->
<p>
    <label for="<?php echo esc_attr( $this->get_field_id( 'custom_uri' ) ); ?>">
        <?php echo __( 'Custom URI', 'realia' ); ?>
    </label><br>

    <input  class="widefat"
            id="<?php echo esc_attr( $this->get_field_id( 'custom_uri' ) ); ?>"
            name="<?php echo esc_attr( $this->get_field_name( 'custom_uri' ) ); ?>"
            type="text"
            value="<?php echo esc_attr( $custom_uri ); ?>">
</p>

<!-- PROPERTY ID -->
<p>
    <label><?php echo __( 'Fields', 'realia' ); ?></label><br>

    <input 	type="checkbox"
    	    class="checkbox"
    	    <?php echo ! empty( $hide_property_id ) ? 'checked="checked"' : ''; ?>
            id="<?php echo esc_attr( $this->get_field_id( 'hide_property_id' ) ); ?>"
            name="<?php echo esc_attr( $this->get_field_name( 'hide_property_id' ) ); ?>">

    <label for="<?php echo esc_attr( $this->get_field_id( 'hide_property_id' ) ); ?>">
        <?php echo __( 'Hide property ID', 'realia' ); ?>
    </label>
</p>

<!-- LOCATION -->
<p>
    <input 	type="checkbox"
    	    class="checkbox"
    	    <?php echo ! empty( $hide_location ) ? 'checked="checked"' : ''; ?>
            id="<?php echo esc_attr( $this->get_field_id( 'hide_location' ) ); ?>"
            name="<?php echo esc_attr( $this->get_field_name( 'hide_location' ) ); ?>">

    <label for="<?php echo esc_attr( $this->get_field_id( 'hide_location' ) ); ?>">
        <?php echo __( 'Hide location', 'realia' ); ?>
    </label>
</p>

<!-- PROPERTY TYPE -->
<p>
    <input 	type="checkbox"
    	    class="checkbox"
    	    <?php echo ! empty( $hide_property_type ) ? 'checked="checked"' : ''; ?>
            id="<?php echo esc_attr( $this->get_field_id( 'hide_property_type' ) ); ?>"
            name="<?php echo esc_attr( $this->get_field_name( 'hide_property_type' ) ); ?>">

    <label for="<?php echo esc_attr( $this->get_field_id( 'hide_property_type' ) ); ?>">
        <?php echo __( 'Hide property type', 'realia' ); ?>
    </label>
</p>

<!-- CONTRACT -->
<p>
    <input 	type="checkbox"
    	    class="checkbox"
    	    <?php echo ! empty( $hide_contract ) ? 'checked="checked"' : ''; ?>
            id="<?php echo esc_attr( $this->get_field_id( 'hide_contract' ) ); ?>"
            name="<?php echo esc_attr( $this->get_field_name( 'hide_contract' ) ); ?>">

    <label for="<?php echo esc_attr( $this->get_field_id( 'hide_contract' ) ); ?>">
        <?php echo __( 'Hide contract', 'realia' ); ?>
    </label>
</p>

<!-- PRICE -->
<p>
    <input 	type="checkbox"
    	    class="checkbox"
    	    <?php echo ! empty( $hide_price ) ? 'checked="checked"' : ''; ?>
            id="<?php echo esc_attr( $this->get_field_id( 'hide_price' ) ); ?>"
            name="<?php echo esc_attr( $this->get_field_name( 'hide_price' ) ); ?>">

    <label for="<?php echo esc_attr( $this->get_field_id( 'hide_price' ) ); ?>">
        <?php echo __( 'Hide price', 'realia' ); ?>
    </label>
</p>

<!-- BATHS -->
<p>
    <input 	type="checkbox"
    	    class="checkbox"
    	    <?php echo ! empty( $hide_baths ) ? 'checked="checked"' : ''; ?>
            id="<?php echo esc_attr( $this->get_field_id( 'hide_baths' ) ); ?>"
            name="<?php echo esc_attr( $this->get_field_name( 'hide_baths' ) ); ?>">

    <label for="<?php echo esc_attr( $this->get_field_id( 'hide_baths' ) ); ?>">
        <?php echo __( 'Hide baths', 'realia' ); ?>
    </label>
</p>

<!-- BEDS -->
<p>
    <input 	type="checkbox"
    	    class="checkbox"
    	    <?php echo ! empty( $hide_beds ) ? 'checked="checked"' : ''; ?>
            id="<?php echo esc_attr( $this->get_field_id( 'hide_beds' ) ); ?>"
            name="<?php echo esc_attr( $this->get_field_name( 'hide_beds' ) ); ?>">

    <label for="<?php echo esc_attr( $this->get_field_id( 'hide_beds' ) ); ?>">
        <?php echo __( 'Hide beds', 'realia' ); ?>
    </label>
</p>

<!-- AREA -->
<p>
    <input 	type="checkbox"
    	    class="checkbox"
    	    <?php echo ! empty( $hide_area ) ? 'checked="checked"' : ''; ?>
            id="<?php echo esc_attr( $this->get_field_id( 'hide_area' ) ); ?>"
            name="<?php echo esc_attr( $this->get_field_name( 'hide_area' ) ); ?>">

    <label for="<?php echo esc_attr( $this->get_field_id( 'hide_area' ) ); ?>">
        <?php echo __( 'Hide area', 'realia' ); ?>
    </label>
</p>

<!-- GARAGES -->
<p>
    <input 	type="checkbox"
    	    class="checkbox"
    	    <?php echo ! empty( $hide_garages ) ? 'checked="checked"' : ''; ?>
            id="<?php echo esc_attr( $this->get_field_id( 'hide_garages' ) ); ?>"
            name="<?php echo esc_attr( $this->get_field_name( 'hide_garages' ) ); ?>">

    <label for="<?php echo esc_attr( $this->get_field_id( 'hide_garages' ) ); ?>">
        <?php echo __( 'Hide garages', 'realia' ); ?>
    </label>
</p>

<!-- INPUT TITLES -->
<label><?php echo __( 'Input titles', 'realia' ); ?></label>

<ul>
    <li>
        <label>
            <input  type="radio"
                    class="radio"
                    value="labels"
                    <?php echo ( empty( $input_titles ) || $input_titles == 'labels' ) ? 'checked="checked"' : ''; ?>
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
                    <?php echo ( $input_titles == 'placeholders' ) ? 'checked="checked"' : ''; ?>
                    id="<?php echo esc_attr( $this->get_field_id( 'input_titles' ) ); ?>"
                    name="<?php echo esc_attr( $this->get_field_name( 'input_titles' ) ); ?>">
            <?php echo __( 'Placeholders', 'realia' ); ?>
        </label>
    </li>
</ul>
