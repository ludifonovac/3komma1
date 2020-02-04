<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dreikommaein
 */

?>
<?php
	global $post;
?>
<article id="<?php echo $post->post_name; ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">KONTAKT: ', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php dreikommaein_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
			the_content();
			$form1=get_field('contact_form1');
			$form2=get_field('contact_form2');
			$form3=get_field('contact_form3');
			$form4=get_field('contact_form4');
			$pform1=split_cf7($form1);
			$pform2=split_cf7($form2);
			$pform3=split_cf7($form3);
			$pform4=split_cf7($form4);

			if (get_field('multiple_forms')) {
				?>
				<div>
					<select class="contact-form-heading">
				<?php
						echo '<option value="form-'.$pform1['id'].'">'.$pform1['title'].'</option>';
						echo '<option value="form-'.$pform2['id'].'">'.$pform2['title'].'</option>';
						echo '<option value="form-'.$pform3['id'].'">'.$pform3['title'].'</option>';
						echo '<option value="form-'.$pform4['id'].'">'.$pform4['title'].'</option>';
				?>
					</select>
				</div>
				<?php
				echo '<div class="form-container multiple-forms show-form" id="form-'.$pform1['id'].'"><div class="inline-div">'.do_shortcode($form1).'</div><div class="inline-div div480 pull-top">'.nl2br(get_field('contact_form1_text')).'</div></div>';
				echo '<div class="form-container multiple-forms" id="form-'.$pform2['id'].'"><div class="inline-div">'.do_shortcode($form2).'</div><div class="inline-div div480 pull-top">'.nl2br(get_field('contact_form2_text')).'</div></div>';
				echo '<div class="form-container multiple-forms" id="form-'.$pform3['id'].'"><div class="inline-div">'.do_shortcode($form3).'</div><div class="inline-div div480 pull-top">'.nl2br(get_field('contact_form3_text')).'</div></div>';
				echo '<div class="form-container multiple-forms" id="form-'.$pform4['id'].'"><div class="inline-div">'.do_shortcode($form4).'</div><div class="inline-div div480 pull-top">'.nl2br(get_field('contact_form4_text')).'</div></div>';
			}
			else {
				echo '<div class="form-container show-form" id="form-'.$pform1['id'].'"><div class="inline-div">'.do_shortcode($form1).'</div><div class="inline-div div480">'.nl2br(get_field('contact_form1_text')).'</div></div>';
			}

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'dreikommaein' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Edit <span class="screen-reader-text">%s</span>', 'dreikommaein' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
