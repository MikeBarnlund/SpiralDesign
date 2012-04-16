<?php

get_header();

?>

<div class="content">
	<div class="listing-types">
		<?php
		$terms = get_terms( 'listingtype' );
		//var_dump( $terms );
		$links = array();
		foreach ( $terms as $term ) {
			$links[] = '<a href="' . get_term_link( $term ) . '" alt="' . $term->name . ' Listings">' . $term->name . '</a>';
		}
		echo implode( $links, ' | ' );
		?>
	</div>
	<div class="section">
		<?php while ( have_posts() ) : the_post();
			get_template_part( 'listing', 'slat' );
		endwhile;
		?>
	</div>
</div> <!-- .content -->

<?php

get_footer();

?>