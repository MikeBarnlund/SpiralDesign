<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php
    $featured_image_url = get_field( 'featured_image' );
    if ( !empty( $featured_image_url ) ) { ?>
        <img src="<?php echo $featured_image_url; ?>" alt="Featured Image" />
    <?php } ?>
    <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyeleven' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
    <?php the_time('l, F jS, Y'); ?> at <?php the_time(); ?> in <?php the_category(', '); ?>
    <?php the_content(); ?>
</article>