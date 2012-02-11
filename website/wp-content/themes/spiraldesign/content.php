<?php
$meta = get_post_meta($post->ID, '_my_meta', TRUE );
?>

<li class="nav <?php echo $meta['animation'] ?>">
	<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'sdbase' ), the_title_attribute( 'echo=0' ) ); ?>" rel="<?php the_ID(); ?>"><?php the_title(); ?></a>
</li>