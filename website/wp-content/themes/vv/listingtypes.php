<div class="listing-types">
	<?php
	$terms = get_terms( 'listingtype' );
	//var_dump( $terms );
	$links = array();
	foreach ( $terms as $term ) {
		$links[] = '<a href="' . get_term_link( $term ) . '" alt="' . $term->name . ' Listings">' . $term->name . 's</a>';
	}
	echo implode( $links, '&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;' );
	?>
</div>