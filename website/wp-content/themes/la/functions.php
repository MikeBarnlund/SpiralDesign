<?php
/**
 * Custom Post Types, etc.
 * @author Mike Barnlund <mike@spiraldesign.ca>
*/

/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function tcd_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' : ?>
        	<li <?php comment_class( 'clearfix' ); ?> id="li-comment-<?php comment_ID(); ?>">
        		<div id="comment-<?php comment_ID(); ?>">
        		    <div class="comment-meta clearfix tk-primary">
                		<div class="comment-author vcard">
                		    <img src="<?php bloginfo( 'template_url' ) ?>/assets/img/white-arrow-left.png">
                			<?php /*echo get_avatar( $comment, 40 );*/ ?>
                			<?php printf( __( '%s', 'twentyten' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
                		</div><!-- .comment-author .vcard -->
                        <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
            			<?php
            				/* translators: 1: date, 2: time */
            				printf( __( '%1$s at %2$s', 'twentyten' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'twentyten' ), ' ' );
            			?>
                	</div><!-- .comment-meta -->
            		<?php if ( $comment->comment_approved == '0' ) : ?>
            			<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'twentyten' ); ?></em>
            			<br />
            		<?php endif; ?>

        		    <div class="comment-body"><?php comment_text(); ?></div>
        		    <div class="tk-primary">
                        <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                    </div>

        	    </div><!-- #comment-##  -->
            </li>
	        <?php
	        break;
		case 'pingback'  :
		case 'trackback' :
        	?>
        	<li class="post pingback">
        		<p><?php _e( 'Pingback:', 'twentyten' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'twentyten' ), ' ' ); ?></p>
        	</li>
        	<?php
			break;
	endswitch;
}