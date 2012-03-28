<?php
get_header();
the_post();
?>

<div class="content">
	<?php
	if ( get_the_ID() ) { ?>
		<div class="section">
			<h1><span>Industry <em>Leaders</em></span></h1>
			<?php get_template_part( 'interview', 'header' ); ?>
		</div>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h1>&nbsp;</h1>
			<div class="entry-content editable">
				<?php the_content(); ?>
				<?php edit_post_link( __( 'Edit Content', 'iandi' ), '<div class="edit-link">(', ')</div>' ) ?>
			</div><!-- .entry-content -->
		</div>
		<?php
		$links = get_field( 'recommended_links' );
		if( $links ) { ?>
			<h1 class="check-out"><span><em>Check Out</em></span></h1>
			<ul class="post-links section">
			<?php
			$i = 1;
			foreach( $links as $link ) {
				echo ( $i % 6 ) === 0 ? '</ul><ul class="links">' : '';
				$i++;
				echo '<li><a target="_blank" href="' . $link['link_address'] . '">' . $link['link_text'] . '</a></li>';
			}
			?>
			</ul>
		<?php } ?>

		<div class="interview-footer">
			<span>Interview By <a href="mailto:asher@industryandinterest.com">Asher Compton</a></span>
			<span>Introduction By <a href="mailto:emmy@industryandinterest.com">Emmy Watts</a></span>
			<span><em>Share</em></span>
			<?php
			https://twitter.com/intent/tweet?original_referer=http%3A%2F%2Fiandi.spiraldesign.ca%2Finterview%2Fglen-allsop%2F&text=Interview+with+GLEN+ALLSOP+-+Freelance+Photographer+on+Industry+%26+Interest+|+%40INDandINT+|+&url=http%3A%2F%2Fiandi.spiraldesign.ca%2Finterview%2Fglen-allsop%2F
			$message = 'Interview with ' . get_the_title() . ' - ' .
				get_field( 'interviewee_title' ) .
				' on Industry & Interest | @INDandINT | ';
				//get_permalink();
			$message = urlencode( $message );
			?>
			<span><a target="_blank" href="https://twitter.com/intent/tweet?original_referer=<?php echo urlencode( get_permalink() ); ?>&text=<?php echo $message; ?>&url=<?php echo urlencode( get_permalink() ); ?>">Twitter</a></span>
			<span><a href="http://www.facebook.com">Facebook</a></span>
		</div>

	<?php } ?>
</div>

<?php
get_footer();
?>