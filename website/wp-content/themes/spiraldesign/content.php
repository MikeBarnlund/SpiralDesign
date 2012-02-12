<?php
$meta = get_post_meta( $post->ID, '_my_meta', TRUE );
$gridpriority = get_post_meta( $post->ID, '_gridpriority', TRUE );
global $grid_on_screen;
$animation_status = ( $grid_on_screen ) ? '' : 'on';
?>

<li class="<?php echo $meta['cellclass'] . ' ' . $meta['animation'] . ' ' . $animation_status; ?>">
	<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'sdbase' ), the_title_attribute( 'echo=0' ) ); ?>" rel="<?php the_ID(); ?>"><span><?php the_title(); ?></span></a>
</li>