<div class="sidebar row-fluid">
	<div class="span12">
		<div class="widget">
			<h3>Get In Touch</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
			<a href="/contact" class="button">Request Info &raquo;</a>
		</div>
		<?php
		
		$args = array( 'post_type' => 'testimonial', 'orderby' => 'rand' );
		$the_query = new WP_Query( $args );
		$the_query->the_post();
		
		$testimonial = get_the_content();
		$reference = get_field('reference');
		
		?>
		<div class="widget quote">
			<blockquote><?php echo $testimonial; ?></blockquote>
			&mdash;&nbsp;<?php echo $reference; ?>
		</div>
	</div>
</div>