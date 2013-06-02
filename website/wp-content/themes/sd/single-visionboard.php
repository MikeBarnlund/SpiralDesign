<?php

get_header();

the_post();

?>

<div class="content">
	<?php if ( get_the_ID() ) { ?>
		<div id="post-<?php the_ID(); ?>" class="post editable">
			<?php edit_post_link( __( 'Edit', 'sdbase' ), "<div class=\"edit-link\">", "</div>" ) ?>
			<h2 class="entry-title">
				<a href="<?php the_permalink(); ?>" title="<?php the_title();?>">Vision Board - <?php the_title(); ?></a>
			</h2>
			<div class="entry-meta">
				<span class="entry-date"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time( get_option( 'date_format' ) ); ?></abbr></span>
			</div>
			
			<table class="vision-board">
				<tr>
					<td colspan="4"><h2>Vision Statement</h2> <?php the_field('vision_statement'); ?></td>
				</tr>
				<tr>
					<td><h2>Target Group</h2> <?php the_field('target_group'); ?></td>
					<td><h2>Needs</h2> <?php the_field('needs'); ?></td>
					<td><h2>Product</h2> <?php the_field('product'); ?></td>
					<td><h2>Value</h2> <?php the_field('business_value'); ?></td>
				</tr>
			</table>

			<?php get_template_part( 'share' ); ?>
		</div>
	<?php } ?>
</div>

<?php

get_footer();

?>