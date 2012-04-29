<?php get_template_part( 'header', 'bare') ; ?>
	<div id="contentwrapper">
		<div id="header">
			<div class="container">
				<img id="logo-top" src="<?php bloginfo( 'template_url' ) ?>/assets/img/logo-top.png"/>
				<div id="nav">
					<img id="logo" src="<?php bloginfo( 'template_url' ) ?>/assets/img/logo.png"/>
					<ul class="menu">
						<li><a href="/home">Home</a></li>
						<li><a href="/about">About Us</a></li>
						<li>
							<a class="dropdown">Current Listings</a>
							<ul dropdown="true" id="Current Listings">
								<li><a href="/search">Search</a></li>
								<?php
								$terms = get_terms( 'listingtype' );
								foreach ( $terms as $term ) {
									echo '<li><a href="' . get_term_link( $term ) . '" alt="' . $term->name . 's">' . str_replace( ' ', '&nbsp;', $term->name ) . 's</a></li>';
								}
								?>
							</ul>
						</li>
						<li>
							<a class="dropdown">MLS</a>
							<ul dropdown="true" id="MLS">
								<li><a target="_blank" href="http://www.realtor.ca/index.aspx?cul=1">Search</a></li>
								<li><a target="_blank" href="http://www.realtor.ca/propertyresults.aspx?id=1100436&mode=1&cul=1">Love&nbsp;Calgary</a></li>
							</ul>
						</li>
						<li><a href="/whats-happening">What's Happening In Calgary</a></li>
						<li><a href="/resources">Resources</a></li>
						<li><a href="/contact">Contact Us</a></li>
					</ul>
				</div>
			</div>
		</div> <!-- /#header -->
		<div id="contentbody">