<?php
/*
Template Name: About
*/

get_header();

the_post();

?>

<div class="content">
	<?php if ( get_the_ID() ) { ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h1 class="entry-title"><span><?php the_title(); ?></span></h1>
			<div class="interview-header">
				<?php $image = wp_get_attachment_image_src(get_field('feature_image'), 'full'); ?>
				<img src="<?php echo $image[0]; ?>" alt="<?php get_the_title(get_field('feature_image')) ?>" />

				<h2 class="entry-title">
					Asher Compton
				</h2>

				<h3>
					Of Industry and Interest
				</h3>

				<div class="summary">
					<?php the_content(); ?>
					<?php edit_post_link( __( 'Edit', 'iandi' ), '<div class="edit-link">', '</div>' ) ?>
				</div>

				<div class="social">
					<!-- Put in twitter / facebook sprites -->
				</div>
			</div>
			<?php
			$links = get_field( 'recommended_links' );
			if( $links ) { ?>
				<h1>Recommended</h1>
				<ul>
				<?php foreach( $links as $link ) {
					echo '<li><a target="_blank" href="' . $link['link_address'] . '">' . $link['link_text'] . '</a></li>';
				} ?>
				</ul>
			<?php } ?>
		</div><!-- #post-<?php the_ID(); ?> -->
	<?php } ?>
</div>

<?php

get_footer();

?>