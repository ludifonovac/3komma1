<?php
/* Template Name: Kontakt Template */
/**
 * The template for displaying Kontakt page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dreikommaein
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="contact-main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page2' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
			<?php
			$the_query = new WP_Query( array(
					'tax_query' => array(
				    	array (
							'taxonomy' => 'page_category',
							'field' => 'slug',
							'terms' => 'kontakt'
						)
					),
					'post_status' => 'publish',
					'orderby' => 'menu_order',
					'order'   => 'ASC',
				)
			);
			$i = 0;
			while ( $the_query->have_posts() ) : $the_query->the_post();

				$i++;
				$count = $the_query->post_count;
				get_template_part( 'template-parts/content', 'contact' );
			?>
				<div class="go-top<?php echo ($i===$count ? ' last' : ''); ?>"><a href="javascript:" class="return-to-top" title="nach oben"><p>nach oben</p><span class="arrow-top"></span></a></div>
			<?php
				
			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
