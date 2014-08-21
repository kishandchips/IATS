<?php
class Custom_Comment_Walker extends Walker_Comment {
	protected function comment( $comment, $depth, $args ) {
		if ( 'div' == $args['style'] ) {
			$tag = 'div';
			$add_below = 'comment';
		} else {
			$tag = 'li';
			$add_below = 'div-comment';
		}
?>
		<<?php echo $tag; ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID(); ?>">
		<?php if ( 'div' != $args['style'] ) : ?>
		<div id="div-comment-<?php comment_ID(); ?>" class="comment-body row">
		<?php endif; ?>
		<?php if ( '0' == $comment->comment_approved ) : ?>
		<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ) ?></em>
		<br />
		<?php endif; ?>

		<div class="event-timestamp column col-1-5">
			<span class="out-game-time"><?php the_field('timestamp','comment_'.$comment->comment_ID) ?></span>
		</div>
		<div class="event-icon column col-1-5">
			<i class="icon-<?php the_field('icon','comment_'.$comment->comment_ID) ?>"></i>
		</div>
		<div class="event-content column col-3-5">
			<div class="text">
				<?php comment_text( get_comment_id(), array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div>
			<div class="share">
				<a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>" title="Share on Facebook" target="_blank">
					<i class="icon-facebook"></i>
				</a>
				<a href="http://twitter.com/share?text=<?php the_title(); ?>" title="Share on Twitter" target="_blank">
					<i class="icon-twitter"></i>
				</a>
				<a href="https://plus.google.com/share?url={<?php the_permalink(); ?>}" title="Share on Google" target="_blank">
					<i class="icon-google"></i>
				</a>
			</div>
		</div>			

		

		<?php if ( 'div' != $args['style'] ) : ?>
		</div>
		<?php endif; ?>
<?php
	}
}
// <?php edit_comment_link( __( '(Edit)' ), '&nbsp;&nbsp;', '' );