<?php
get_header();
the_post();
?>

<div class="single-interview content">
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
			<?php
			$interviewed_by = get_field( 'interviewed_by' );
			$interviewed_by_email = get_field( 'interviewed_by_email' );
			$introduction_by = get_field( 'introduction_by' );
			$introduction_by_email = get_field( 'introduction_by_email' );

			if ( !empty( $interviewed_by ) ) {
				echo ( empty( $interviewed_by_email ) ) ?
					'<span>Interview By ' . $interviewed_by . '</span>' :
					'<span>Interview By <a href="mailto:<?php echo $interviewed_by_email; ?>">' . $interviewed_by . '</a></span>';
			}
			if ( !empty( $introduction_by ) ) {
				echo ( empty( $introduction_by_email ) ) ?
					'<span>Introduction By ' . $introduction_by . '</span>' :
					'<span>Introduction By <a href="mailto:<?php echo $introduction_by_email; ?>">' . $introduction_by . '</a></span>';
			}

			?>
			<script type="text/javascript">
				$( document ).ready( function() {
					$( 'a#tweet_button' ).click( function() {
						var url = $( this ).attr( 'href' );
						window.open( url, "tweet", "height=246,width=780,resizable=1" )
						return false;
					} );
					$( 'a#fb_button' ).click( function() {
						var url = $( this ).attr( 'href' );
						window.open( url, "tweet", "height=267,width=640,resizable=1" )
						return false;
					} );
				} );
			</script>
			<span><em>Share</em></span>
			<?php
			$message = 'Interview with ' . get_the_title() . ' - ' .
				get_field( 'interviewee_title' ) .
				' on Industry & Interest | @INDandINT |';
				//get_permalink();
			$message = urlencode( $message );
			?>
			<span><a id="tweet_button" target="_blank" href="https://twitter.com/intent/tweet?original_referer=<?php echo urlencode( get_permalink() ); ?>&text=<?php echo $message; ?>&url=<?php echo urlencode( get_permalink() ); ?>">Twitter</a></span>
			<span><a id="fb_button" target="_blank" href="http://www.facebook.com/sharer.php?u=<?php echo urlencode( get_permalink() ); ?>">Facebook</a></span>
		</div>

	<?php } ?>
</div>

<?php
get_footer();
?>