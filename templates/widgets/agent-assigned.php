<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<?php echo wp_kses( $args['before_widget'], wp_kses_allowed_html( 'post' ) ); ?>

<?php if ( ! empty( $instance['title'] ) ) : ?>
    <?php echo wp_kses( $args['before_title'], wp_kses_allowed_html( 'post' ) ); ?>
    <?php echo esc_attr( $instance['title'] ); ?>
    <?php echo wp_kses( $args['after_title'], wp_kses_allowed_html( 'post' ) ); ?>
<?php endif; ?>

<?php $agent = Realia_Query::get_property_agent(); ?>
<?php if ( ! empty( $agent ) ) : ?>
    <?php query_posts( array(
        'post_type' => 'agent',
        'post__in'  => array( $agent->ID ),
    ) ); ?>
    <?php if ( have_posts() ) :?>
        <?php while( have_posts() ) : the_post(); ?>
            <?php include Realia_Template_Loader::locate( 'agents/small' ); ?>
        <?php endwhile; ?>
    <?php endif; ?>
    <?php wp_reset_query(); ?>
<?php endif; ?>

<?php echo wp_kses( $args['after_widget'], wp_kses_allowed_html( 'post' ) ); ?>
