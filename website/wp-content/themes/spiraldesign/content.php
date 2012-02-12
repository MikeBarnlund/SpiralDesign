<?php
$meta = get_post_meta( $post->ID, '_my_meta', TRUE );
$gridpriority = get_post_meta( $post->ID, '_gridpriority', TRUE );
?>

<li class="<?php echo $meta['animation'] . ' ' . $meta['cellclass'] ?>">
	<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'sdbase' ), the_title_attribute( 'echo=0' ) ); ?>" rel="<?php the_ID(); ?>"><span><?php the_title(); ?></span></a>
</li>