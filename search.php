<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Upside Down
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>


<section class="container">
	<div id="search-header" class="row"> 
    	<div class="column">
        	<h4><?php printf( __( 'Search Results for: %s', 'upsidedown' ), '<span>' . get_search_query() . '</span>' ); ?></h4>
    	</div>
	</div>
</section>

<section class="container">

	<?php
		if ( have_posts() ) : ?>

		<?php $i = 1; ?>

		<div class="row">

			<!-- /* Start the Loop */ -->
			<?php while ( have_posts() ) : the_post(); ?>

				
				<?php	get_template_part( 'template-parts/post/content', 'card' );

	     if( $i == 3 ){
	        echo '</div><div class="row">';
	        $i = 0;
	      }
	      $i++;
	          
			endwhile; ?> <!-- // End of the loop. -->

		</div>

			<?php the_posts_pagination();

		else : ?>

			<div class="row main-card">
				<div class="column">
					<div id="no-post">
		        		<h5><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'upsidedown' ); ?></h5>
		        		<?php get_search_form(); ?>
		    		</div>
				</div>
			</div>
				

		<?php endif; ?>

</section>
 


<?php get_footer();
