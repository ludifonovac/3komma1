<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dreikommaein
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="footer-inside">
			<div class="site-info">
				<!--<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'dreikommaein' ) ); ?>"><?php
					/* translators: %s: CMS name, i.e. WordPress. */
					printf( esc_html__( 'Proudly powered by %s', 'dreikommaein' ), 'WordPress' );
				?></a>
				<span class="sep"> | </span>
				<?php
					/* translators: 1: Theme name, 2: Theme author. */
					printf( esc_html__( 'Theme: %1$s by %2$s.', 'dreikommaein' ), 'dreikommaein', '<a href="http://www.twitter.com/buki_zvani_pera">Nikola Dimitrijevic</a>' );
				?>-->
				<p class="copyright">&copy;  
					<a href="<?php echo get_bloginfo('url'); ?>">
						<?php echo get_bloginfo('name'); ?>
					</a>
					 | <?php echo date('Y'); ?>
				</p>
			</div><!-- .site-info -->
			<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-2',
					'menu_id'        => 'footer-menu',
					'container_class'=> 'menu-footer-menu-container',
				) );
			?>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
