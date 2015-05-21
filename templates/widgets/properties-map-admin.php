<?php $latitude = ! empty( $instance['latitude'] ) ? $instance['latitude'] : 37.439826; ?>
<?php $longitude = ! empty( $instance['longitude'] ) ? $instance['longitude'] : -122.132088; ?>
<?php $zoom = ! empty( $instance['zoom'] ) ? $instance['zoom'] : 11; ?>
<?php $grid_size = ! empty( $instance['grid_size'] ) ? $instance['grid_size'] : 60; ?>
<?php $style = ! empty( $instance['style'] ) ? $instance['style'] : ''; ?>

<!-- LATITUDE -->
<p>
    <label for="<?php echo esc_attr( $this->get_field_id( 'latitude' ) ); ?>">
        <?php echo __( 'Latitude', 'realia' ); ?>
    </label>

    <input  class="widefat"
            id="<?php echo esc_attr( $this->get_field_id( 'latitude' ) ); ?>"
            name="<?php echo esc_attr( $this->get_field_name( 'latitude' ) ); ?>"
            type="text"
            value="<?php echo esc_attr( $latitude ); ?>">
</p>

<!-- LONGITUDE -->
<p>
    <label for="<?php echo esc_attr( $this->get_field_id( 'longitude' ) ); ?>">
        <?php echo __( 'Longitude', 'realia' ); ?>
    </label>

    <input  class="widefat"
            id="<?php echo esc_attr( $this->get_field_id( 'longitude' ) ); ?>"
            name="<?php echo esc_attr( $this->get_field_name( 'longitude' ) ); ?>"
            type="text"
            value="<?php echo esc_attr( $longitude ); ?>">
</p>

<!-- ZOOM -->
<p>
    <label for="<?php echo esc_attr( $this->get_field_id( 'zoom' ) ); ?>">
        <?php echo __( 'Zoom', 'realia' ); ?>
    </label>

    <input  class="widefat"
            id="<?php echo esc_attr( $this->get_field_id( 'zoom' ) ); ?>"
            name="<?php echo esc_attr( $this->get_field_name( 'zoom' ) ); ?>"
            type="text"
            value="<?php echo esc_attr( $zoom ); ?>">
</p>

<!-- GRID SIZE -->
<p>
    <label for="<?php echo esc_attr( $this->get_field_id( 'grid_size' ) ); ?>">
        <?php echo __( 'Grid size', 'realia' ); ?>
    </label>

    <input  class="widefat"
            id="<?php echo esc_attr( $this->get_field_id( 'grid_size' ) ); ?>"
            name="<?php echo esc_attr( $this->get_field_name( 'grid_size' ) ); ?>"
            type="text"
            value="<?php echo esc_attr( $grid_size); ?>">
</p>

<!-- STYLE-->
<p>
    <label for="<?php echo esc_attr( $this->get_field_id( 'style' ) ); ?>">
        <?php echo __( 'Style', 'realia' ); ?>
    </label>

    <select id="<?php echo esc_attr( $this->get_field_id( 'style' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'style' ) ); ?>">
        <option value=""><?php echo __( 'Default', 'realia' ); ?></option>
        <?php $maps = Realia_Google_Maps_Styles::styles(); ?>
        <?php if ( is_array( $maps ) ) : ?>
            <?php foreach ( $maps as $map ): ?>
                <option <?php if ( $style == $map['slug'] ) : ?>selected="selected"<?php endif; ?>value="<?php echo esc_attr( $map['slug'] ); ?>"><?php echo esc_html( $map['title'] ); ?></option>
            <?php endforeach; ?>
        <?php endif; ?>
    </select>
</p>