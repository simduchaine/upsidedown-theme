<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Upside Down
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<section class="container">

	<?php if ( have_posts() ) : ?>

		<div class="row">
        	<?php
			the_archive_title( '<h3 class="page-title">', '</h3>' );
			?>
        </div>
	<?php endif; ?>


	<?php if ( have_posts() ) : ?>

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

	else :

		get_template_part( 'template-parts/post/content', 'none' );

	endif; ?>

	</div>
</section>

<?php get_footer();
