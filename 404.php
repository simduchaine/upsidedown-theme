<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Upsidedown
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<section class="container">
    	<div class="row main-card">
    		<div class="column">
    			<div class="main-card-content">
	        		<h3 class="page-title"><?php _e( 'Page not found', 'upsidedown' ); ?></h3>
	        		<p><?php printf( __('You may want to head over to the <a href="%s">homepage</a>, or search for the content you expected to be here.', 'upsidedown'), esc_url( home_url( '/' ) ) ); ?></p>
	        		<?php get_search_form() ?>

	        		<img class="bummer" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/404.png" width="50%">


        		</div>
    		</div>
    	</div>
</section>

<?php get_footer();