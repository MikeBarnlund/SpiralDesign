<?php

get_header();

$category = get_the_category();
$slug = ( $category[0]->slug ) ? $category[0]->slug : 'uncategorized';
$name = ( $category[0]->name ) ? $category[0]->name : 'uncategorized';

?>
<div class="single-post">
    <div class="logo logo-full <?php echo $slug; ?>">
        <img src="<?php bloginfo( 'template_url' ) ?>/assets/img/tcd-logo-post.png" />
        <div class="category-label"><?php echo $name; ?></div>
        <div class="archive-label tk-myriad-pro"><img src="<?php bloginfo( 'template_url' ) ?>/assets/img/archive-label-bg.png">Archive</div>
        <div class="logo-bottom"></div>
    </div>
    <?php

    /* Main Loop */

    while ( have_posts() ) :
    	the_post();
    	get_template_part( 'post' );
    endwhile;

	$title_maxlen = 25;

	$next_post = NULL;
	$previous_post = NULL;

	$next_post = get_adjacent_post( true, '', false );
	$previous_post = get_adjacent_post( true, '', true );

	?>

    <div class="post-navigation">
        <div class="next-prev">
            <?php

    		echo ( !empty( $previous_post ) )
    			?	'<a href="' . get_permalink( $previous_post->ID ) . '" class="previous-post">Previous</a>'
    			: '<div class="post-placeholder"></div>';
    		echo '<img src="' . get_bloginfo( 'template_url' ) . '/assets/img/post-navigation-divider.png" />';
    		echo ( !empty( $next_post ) )
    			?	'<a href="' . get_permalink( $next_post->ID ) . '" class="next-post">Next</a>'
    			: '<div class="post-placeholder"></div>';

            ?>
        </div>
        <div class="post-names">
            <?php

    		echo ( !empty( $previous_post ) )
    			?	'<a href="' . get_permalink( $previous_post->ID ) . '" class="previous-post">' .
    				( strlen( $previous_post->post_title ) > $title_maxlen
    					? substr( $previous_post->post_title, 0, $title_maxlen ) . '...'
    					: $previous_post->post_title ) .
    				'</a>'
    			: '<div class="post-placeholder"></div>';
    		echo '<img src="' . get_bloginfo( 'template_url' ) . '/assets/img/post-navigation-divider.png" />';
    		echo ( !empty( $next_post ) )
    			?	'<a href="' . get_permalink( $next_post->ID ) . '" class="next-post">' .
    				( strlen( $next_post->post_title ) > $title_maxlen
    					? substr( $next_post->post_title, 0, $title_maxlen ) . '...'
    					: $next_post->post_title ) .
    				'</a>'
    			: '<div class="post-placeholder"></div>';

            ?>
        </div>
    </div>
</div>
<?php

get_footer();

get_template_part( 'footer', 'bare' );