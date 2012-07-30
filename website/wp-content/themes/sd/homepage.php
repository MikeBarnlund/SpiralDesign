<?php

/*
Template Name: Home
*/

get_header();

the_post();

$services = get_field( 'services' );

?>

<div class="slideshow">
	<a class="slideshow-button" id="sd-next"></a>
	<a class="slideshow-button" id="sd-prev"></a>
</div>
<div class="main clearfix">
	<div class="content">
		<ul class="services">
			<?php
			// iterate through the images including featured image (use wordpress thumbnails?)
			$service_index = 0;
			foreach( $services as $service ) {
				$service_index++;
				$service_image = wp_get_attachment_image_src( $service['service_image'], 'full' );
				$service_image_url = $service_image[0];
				$service_name = $service['service_name'];
				$service_summary = $service['service_summary'];
				$service_link = $service['service_link']; ?>
				<li rel="<?php echo $service_index; ?>">
					<a href="<?php echo $service_link; ?>" title="<?php echo $service_name; ?>">
						<label><?php echo $service_name; ?></label>
						<h3><?php echo $service_summary; ?></h3>
					</a>
				</li>
			<?php } ?>
		</ul>
	</div>
</div>

<?php get_footer(); ?>

<script src="<?php bloginfo( 'template_url' ) ?>/assets/js/libs/jquery.sdslideshow.js/jquery.sdslideshow.js"></script>

<script>
$( document ).ready( function() {
    var slideshow = null;
    <?php

    if ( !empty( $services ) ) {
        echo 'var itemlist = [ ';
        $itemlist = array();

		$service_html = "<div class='service-content'><h2>Quantum Strategies Inc.</h2><h3>Bringing Highly Significant Advances and Breakthrough</h3></div>";

		//Set up default home item
		$itemlist[] = '{ src: "' . get_bloginfo( 'template_url' ) . '/assets/img/home-bg.jpg", element: null, html: "' . $service_html . '" }';
		
        foreach( $services as $service ) {
			$service_image = wp_get_attachment_image_src( $service['service_image'], 'full' );
			$service_image_url = $service_image[0];
			$service_name = $service['service_name'];
			$service_summary = $service['service_summary'];
			$service_link = $service['service_link'];
			
			$service_html = "<div class='service-content'><a href='" . $service_link . "' title='" . $service_name . "'><h2>" . $service_name . "</h2><h3>" . $service_summary . "</h3></a></div>";
			
            $itemlist[] = '{ src: "' . $service_image_url .'", element: null, html: "' . $service_html . '" }';
        }
        echo implode( ', ', $itemlist);
        echo ' ]; ';
        ?>
        if ( itemlist ) {
            slideshow = $( '.slideshow' ).sdslideshow( {
                itemList: itemlist,
                transitionDuration: 1000,
                autoAdvance: false,
				preload: true
            } );
        }
        <?php
    }
    ?>

    if ( slideshow !== null ) {
        slideshow_instance = slideshow.data( 'instance' );

        $( '#sd-next' ).click( function() {
            slideshow_instance.showNextItem( 'slide' );
        } );
        $( '#sd-prev' ).click( function() {
            slideshow_instance.showPreviousItem( 'slide' );
        } );
		$( '.services li' ).hover( function() {
			var itemIndex = $( this ).attr( 'rel' );
			slideshow_instance.swapImageTo( itemIndex, 'slide' );
		} );
    }
} );
</script>

<?php get_template_part( 'body', 'close' ); ?>