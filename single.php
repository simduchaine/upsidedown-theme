<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Upsidedown
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<section class="container">

			<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/post/content', get_post_format() );

					
					the_post_navigation( array(
				            'prev_text'                  => '<span class="entypo-left-open-mini"> </span>' . __( 'Previous Post', 'upsidedown' ),
				            'next_text'                  => __( 'Next Post', 'upsidedown' ) . ' <span class="entypo-right-open-mini"></span>',				            		           
				            ) );
				

					get_template_part( 'inc/related' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;



				endwhile; // End of the loop.
			?>

</section>



<?php get_footer();
