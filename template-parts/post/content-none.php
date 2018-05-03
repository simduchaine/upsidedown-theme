<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Upside Down
 * @since 1.0
 * @version 1.0
 */

?>

<section class="container">
    	<div class="row main-card">
    		<div class="column">
    			<div class="main-card-content">
	        		<h3 class="page-title"><?php _e( 'Nothing Found', 'upsidedown' ); ?></h3>
	        		<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'upsidedown' ); ?></p>
	        		<?php get_search_form() ?>

	        		<!-- <input type="text" name="search" placeholder="Type something">
	        		<img class="bummer" src="img/404.png" width="50%"> -->


        		</div>
    		</div>
    	</div>
</section>
