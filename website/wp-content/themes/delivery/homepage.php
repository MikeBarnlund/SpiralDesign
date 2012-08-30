<?php

/*
Template Name: Home
*/

get_header();

the_post();

?>

<div class="content">

	<h1>Chaordix Delivery Abstracts</h1>
	
	<p><?php the_content(); ?></p>
	
	<div class="row">
		<div class="span6">
			<h3>Program Abstracts</h3>
			<table class="table table-bordered table-striped">
				<thead>
					<tr><th>Name</th><th>Last Updated</th></tr>
				</thead>
				<tbody>
					<?php

					$args = array( 'orderby'=> 'modified', 'post_type' => 'programabstract', 'posts_per_page' => 10 );
					$loop = new WP_Query( $args );

					while ( $loop->have_posts() ) : $loop->the_post(); ?>
						<tr>
							<td><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td>
							<td><?php echo get_the_modified_date() . ' - ' . get_the_modified_time(); ?></td>
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
		<div class="span6">
			<h3>Round Abstracts</h3>
			<table class="table table-bordered table-striped">
				<thead>
					<tr><th>Name</th><th>Last Updated</th></tr>
				</thead>
				<tbody>
					<?php

					$args = array( 'orderby'=> 'modified', 'post_type' => 'programround', 'posts_per_page' => 10 );
					$loop = new WP_Query( $args );

					while ( $loop->have_posts() ) : $loop->the_post(); ?>
						<tr>
							<td><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td>
							<td><?php echo get_the_modified_date() . ' - ' . get_the_modified_time(); ?></td>
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>

</div>

<?php

get_footer();

?>