<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dreikommaein
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'frontpage' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
			<div class="homepage-blog-link">
				<h1>News</h1>
				<?php
					$args = array(
						'numberposts' => 1,
						'orderby' => 'post_date',
						'order' => 'DESC',
						'post_type' => 'post',
						'post_status' => 'publish'
					);
					$recent_posts = wp_get_recent_posts($args);
					foreach( $recent_posts as $recent ){
						echo '<a href="'.get_permalink($recent["ID"]).'"><h2>'. $recent["post_title"].'</h2></a><span class="post-date">'.get_the_date("j. F Y", $recent["ID"]).'</span>';
					}
					wp_reset_query();
				?>
			</div>
			<?php
			$the_query = new WP_Query( array(
					'tax_query' => array(
				    	array (
							'taxonomy' => 'page_category',
							'field' => 'slug',
							'terms' => 'kompetenz'
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
				get_template_part( 'template-parts/content', 'page3' );
			?>
				<div class="go-top<?php echo ($i===$count ? ' last' : ''); ?>">
                    <a href="javascript:" class="return-to-top" title="nach oben"><p>nach oben</p><span class="arrow-top"></span></a>
                    <div class="go-top-border<?php echo ($i===$count ? ' last' : ''); ?>">
                        <div class="glow" style="display: none;"></div>
                    </div>
                </div>
			<?php
				
			endwhile; // End of the loop.
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();