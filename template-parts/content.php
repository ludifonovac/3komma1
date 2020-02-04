<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dreikommaein
 */

?>
<?php
	global $more;
	$more=0;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php dreikommaein_post_thumbnail(); ?>
	<div class="post-content">
		<header class="entry-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				//the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				the_title( '<h2 class="entry-title">', '</h2>' );
			endif;

			if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php
					dreikommaein_posted_on();
					//dreikommaein_posted_by();
				?>
			</div><!-- .entry-meta -->
			<?php
			endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
				the_content( sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Weiter lesen<span class="screen-reader-text"> "%s"</span>', 'dreikommaein' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'dreikommaein' ),
					'after'  => '</div>',
				) );
				$extended=get_extended($post->post_content);
				echo '<div class="extended-text">'.$extended['extended'].'<p><a id="post-'.get_the_ID().'" href="javascript:" class="less-link" title="Read less"><span class="arrow-top"></span></a></p></div>';
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php //dreikommaein_entry_footer(); ?>
			<div class="go-top-border">
                <div class="glow" style="display: none;"></div>
            </div>
		</footer><!-- .entry-footer -->
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
