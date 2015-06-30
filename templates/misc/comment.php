<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<div <?php comment_class( empty( $args['has_children'] ) ? '' : 'comments' ); ?> id="comment-<?php comment_ID() ?>">
    <div class="comment clearfix">
        <div class="comment-author">
            <?php if ( 0 != $args['avatar_size'] ) { echo get_avatar( $comment, $args['avatar_size'] ); } ?>
        </div><!-- /.comment-image -->

        <div class="comment-content">
            <div class="comment-meta">
                <strong class="comment-author"><?php comment_author(); ?></strong>
                <?php comment_reply_link(array_merge( $args, array(
					'add_below'     => 'comment',
					'depth'         => $depth,
					'reply_text'    => __( 'Reply', 'realia' ),
					'max_depth'     => $args['max_depth'],
					) ) ); ?>
                <span class="comment-date"><?php echo get_comment_date(); ?></span>
            </div><!-- /.comment-meta -->

            <div class="comment-body">
                <?php comment_text(); ?>
            </div><!-- /.comment-body -->

            <?php if ( $comment->comment_approved == '0' ) : ?>
                <em class="comment-awaiting-moderation"><?php echo __( 'Your comment is awaiting moderation.', 'realia' ); ?></em>
                <br />
            <?php endif; ?>
        </div><!-- /.comment-content -->
    </div><!-- /.comment -->
