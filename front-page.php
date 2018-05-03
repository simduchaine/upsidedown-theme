<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Upside Down
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<section class="container">

	<?php

	if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
	elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
	else { $paged = 1; }
	$args = array(
	'posts_per_page' => '7',
	'paged' => $paged,
	);

$my_query = new WP_query ( $args );
if($my_query->have_posts() ) : ?>   

	<?php $i = 1; ?>

	<div class="row">

<?php while ($my_query->have_posts() ) : $my_query->the_post(); ?>


	<?php if ($my_query->current_post == 0 ) { ?>


		<?php get_template_part( 'template-parts/post/content', 'single' ); ?>


	</div><div class="row">

	<?php } else { ?>

		<?php get_template_part( 'template-parts/post/content', 'card' ); ?>

		<?php if($i % 4 == 0) {echo '</div><div class="row">';} ?>

	<?php } ?>

	<?php $i++; endwhile; ?>

	</div>

	</section>

	<?php wp_reset_postdata(); ?>


	<?php

	if ( is_home() ) {
    the_posts_pagination( array(
		'mid_size'  => 2,
		'prev_text' => '<span class="entypo-left-open-mini"> </span>' . __( 'Previous Page', 'upsidedown' ),
		'next_text' => __( 'Next Page', 'upsidedown' ) . ' <span class="entypo-right-open-mini"></span>',
	) );
	} else {
		if (function_exists('upsidedown_custom_pagination')) {
        upsidedown_custom_pagination($my_query->max_num_pages,"",$paged);
      }
	}
	
    ?>


	<?php else :

		get_template_part( 'template-parts/post/content', 'none' );

	endif; ?>


</section>


<?php get_footer();
