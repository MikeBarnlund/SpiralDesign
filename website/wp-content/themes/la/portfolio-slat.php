<div class='fuck'>
	<?php
	$background_image_url = get_field( 'portfolio-link-background' );
	?>
	<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyeleven' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
</div>