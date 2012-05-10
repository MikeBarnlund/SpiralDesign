<?php
/*
Template Name: Portfolios Page
*/

get_header();

?>

<div class="container">
    <?php
    $query = NULL;

    // everything will get posted, so let's just check the first one

	$args = array(
		'post_type' => 'portfolio',
		'nopaging' => 'true'
	);

	$query = new WP_Query( $args );

	if ( !empty( $query ) && $query->have_posts() ) {
		// The Loop
		while ( $query->have_posts() ) : $query->the_post();
		    $background_url = get_field( 'portfolio_link_background' ); ?>
                <div style="background-image: url('<?php echo $background_url; ?>');" class="portfolio-slat">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    <div class="portfolio-button-wrapper">
                        <div class="portfolio-selection-button">
                            <div class="grey-top"><img src="<?php echo bloginfo( 'template_url' ) ?>/assets/img/portfolio-button-grey-top.png" /></div>
                            <div class="grey-bottom"><img src="<?php echo bloginfo( 'template_url' ) ?>/assets/img/portfolio-button-grey-bottom.png" /></div>
                            <div class="yellow"><img src="<?php echo bloginfo( 'template_url' ) ?>/assets/img/portfolio-button-yellow.png" /></div>
                        </div>
                    </div>
                </div>
		<?php endwhile;
    } ?>

    <!-- <a href="/portfolio/personal" class='portfolio-slat personal'>Personal</a>
    <a href="/portfolio/commercial" class='portfolio-slat commercial'>Commercial</a>
    <a href="/portfolio/film" class='portfolio-slat film'>Film</a> -->
</div>

<?php

get_footer();

?>

<script>
    $( document ).ready( function() {
        var animation_duration = 150;
        $( '.portfolio-slat' ).hover(
            function() {
                console.log( 'fuck off' );
                $( this ).find( '.grey-top img' ).animate( { 'bottom': '0' }, animation_duration );
                $( this ).find( '.grey-bottom img' ).animate( { 'top': '0' }, animation_duration );
            },
            function() {
                $( this ).find( '.grey-top img' ).animate( { 'bottom': '-30px' }, animation_duration );
                $( this ).find( '.grey-bottom img' ).animate( { 'top': '-19px' }, animation_duration );
            }
        );
    } );
</script>

<?php

get_template_part( 'footer', 'bare' );

?>