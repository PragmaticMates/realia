<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<?php $title = ! empty( $instance['title'] ) ? $instance['title'] : ''; ?>
<?php $count = ! empty( $instance['count'] ) ? $instance['count'] : 3; ?>

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
