<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class='post-header clearfix'>
        <?php

        $category = get_the_category();
        $slug = !empty( $category[0]->slug ) ? $category[0]->slug : 'uncategorized';
        $name = !empty( $category[0]->name ) ? $category[0]->name : 'uncategorized';

        ?>
        <div class="post-meta <?php echo $slug; ?> clearfix">
            <img src="<?php bloginfo( 'template_url' ) ?>/assets/img/white-arrow-left.png">
            <div class="post-category"><?php echo $name; ?></div>
            <div class="post-time">Posted&nbsp;on&nbsp;<?php echo str_replace( ' ', '&nbsp;', get_the_time('F j, Y') ); ?></div>
        </div>
        <a class="post-title" href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyeleven' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
    </div>

    <div class="post-content">
        <?php
        $featured_image_url = get_field( 'featured_image' );
        if ( !empty( $featured_image_url ) ) { ?>
            <img src="<?php echo $featured_image_url; ?>" alt="Featured Image" />
        <?php } ?>
        <?php the_content( 'Read Full Story' ); ?>
    </div>

    <div class="post-footer">
		<?php
		$message = get_the_title();
		$message = urlencode( $message );
		?>
		<a class="twitter" target="_blank" href="https://twitter.com/intent/tweet?original_referer=<?php echo urlencode( get_permalink() ); ?>&text=<?php echo $message; ?>&url=<?php echo urlencode( get_permalink() ); ?>">Twitter</a>
		<a class="facebook" target="_blank" href="http://www.facebook.com/sharer.php?u=<?php echo urlencode( get_permalink() ); ?>">Facebook</a>
    </div>
</article>