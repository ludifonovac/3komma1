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
<?php 
	$post_class='homepage-inner';
	if (get_field('number_of_elements')) { $post_class.= " sections-".get_field('number_of_elements'); }
	if (get_field('left_image_position')==="overtop") { $post_class.=" overtop";}
	if ((get_field('left_image_position')==="middle")||(get_field('right_image_position')==="middle")) { $post_class.=" middle";}
?>
<article id="<?php echo $post->post_name; ?>" <?php post_class($post_class); ?>>
	<?php
			if (get_field('number_of_elements')==='3') {
		?>
				<div class="left-image <?php echo get_field('left_image_position'); ?>">
				<?php
					$image1=get_field('left_image');
				?>
					<div>
						<img src="<?php echo $image1['url']; ?>" class="<?php echo (get_field('left_image_shadow')?'shadow':''); ?>" />
					</div>
				</div>
				<div class="middle-section" style="background-color: <?php echo get_field('middle_section_background'); ?>">
					<header class="entry-header">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					</header><!-- .entry-header -->
					<div class="alt-left-image">
						<img src="<?php echo $image1['url']; ?>" />
					</div>
					<div class="entry-content">
						<?php the_content(); ?>
					</div><!-- .entry-content -->
				</div>
				<div class="right-image <?php echo get_field('right_image_position'); ?>">
					<?php
					$image2=get_field('right_image');
					?>
					<div>
						<img src="<?php echo $image2['url']; ?>" class="<?php echo (get_field('right_image_shadow')?'shadow':''); ?>" />
					</div>
				</div>
		<?php
			}
			else if (get_field('number_of_elements')==='2l') {
		?>
				<div class="left-image <?php echo get_field('left_image_position'); ?>">
				<?php
					$image1=get_field('left_image');
				?>
					<div>
						<img src="<?php echo $image1['url']; ?>" class="<?php echo (get_field('left_image_shadow')?'shadow':''); ?>" />
					</div>
				</div>
				<div class="right-section">
					<header class="entry-header">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					</header><!-- .entry-header -->
					<div class="entry-content">
					<?php
						the_content();

						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'dreikommaein' ),
							'after'  => '</div>',
						) );
					?>
					</div><!-- .entry-content -->
				</div>
		<?php
			}
			else {
		?>
				<?php //dreikommaein_post_thumbnail(); ?>

				<div class="left-section">
					<header class="entry-header">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					</header><!-- .entry-header -->
					<div class="entry-content">
					<?php
						the_content();

						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'dreikommaein' ),
							'after'  => '</div>',
						) );
					?>
					</div><!-- .entry-content -->
				</div>
				<div class="right-section-image">
					<?php
					$image2=get_field('right_image');
					?>
					<div>
						<img src="<?php echo $image2['url']; ?>" />
					</div>
				</div>
					<?php
						}
					?>
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
	<?php
	if ($post->post_name=='team') {
		$team = new WP_Query ( array(
			'post_type' => 'team',
			'post_status' => 'publish',
			/*'orderby' => 'menu_order',*/
			'order'   => 'ASC',	
			)
		);
?>
	<div class="team-section">
<?php
		while ($team->have_posts()) {
			$team->the_post();
?>
		<div class="team-person">
			<?php the_post_thumbnail(); ?>
			<?php the_title( '<h5 class="team-name">', '</h5>' ); ?>
			<h5 class="team-position"><?php the_field('position'); ?></h5>
		</div>
<?php
		}
?>
	</div>
<?php
	};
?>
</article><!-- #post-<?php the_ID(); ?> -->
