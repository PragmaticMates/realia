<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Class Realia_Widget_Agent_Assigned
 *
 * @class Realia_Widget_Agent_Assigned
 * @package Realia/Classes/Widgets
 * @author Pragmatic Mates
 */
class Realia_Widget_Agent_Assigned extends WP_Widget {
    /**
     * Initialize widget
     *
     * @access public
     * @return void
     */
    function Realia_Widget_Agent_Assigned() {
        parent::__construct(
            'agent_assigned_widget',
            __( 'Assigned Agent', 'realia' ),
            array(
                'description' => __( 'Displays assigned agent. Plugin is displaying agent card only on property detail.To show it only on property detail use is_singular(\'property\') in Widget Logic.', 'realia' ),
            )
        );
    }

    /**
     * Frontend
     *
     * @access public
     * @param array $args
     * @param array $instance
     * @return void
     */
    function widget( $args, $instance ) {
        include Realia_Template_Loader::locate( 'widgets/agent-assigned' );
    }

    /**
     * Update
     *
     * @access public
     * @param array $new_instance
     * @param array $old_instance
     * @return array
     */
    function update( $new_instance, $old_instance ) {
        return $new_instance;
    }

    /**
     * Backend
     *
     * @access public
     * @param array $instance
     * @return void
     */
    function form( $instance ) {
        include Realia_Template_Loader::locate( 'widgets/agent-assigned-admin' );
    }
}