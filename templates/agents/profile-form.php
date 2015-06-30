<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<?php if ( method_exists( 'Realia_Utilities', 'protect' ) ) { Realia_Utilities::protect(); } ?>

<?php
$agent_id = Realia_Query::get_current_user_assigned_agent_id();

if ( empty( $agent_id ) ) {
	$agent_id = 'fake-agent-id';
}

cmb2_metabox_form( REALIA_AGENT_PREFIX . 'general_front',  $agent_id );
?>
