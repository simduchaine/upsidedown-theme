<?php
/**
 * Template part for displaying posts with excerpts
 *
 * Used in Search Results and for Archives.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Upside Down
 * @since 1.0
 * @version 1.0
 */

?>
        
	<div class="column column-card">

		<div class="card-wrapper">

		<?php if(has_post_thumbnail()) :?>

			<div class="thumb-wrapper">
			
			<a href="<?php the_permalink(); ?>">
		        <?php the_post_thumbnail( ) ?>
		        <div class="thumb-overlay"></div>
		    </a>    
	        </div>

	    <?php endif;?>

	    	<div class="card">
	    		<h6 class="timestamp"><?php the_time(get_option('date_format')); ?> - <?php the_category(', '); ?></h6>
	    		<a href="<?php the_permalink(); ?>">
	    			<h4 class="post-title"><?php the_title(); ?></h4>
	    		</a>
				<p><small><?php the_excerpt(); ?></small></p>
	    		<a href="<?php the_permalink(); ?>" class="button"><?php _e( 'Read more', 'upsidedown' ); ?></a>
	    	</div>

    	</div>
	</div>
