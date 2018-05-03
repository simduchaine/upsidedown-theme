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
        
	<div class="column">

		<div class="card-wrapper">

		<?php if(has_post_thumbnail()) :?>

			<div class="thumb-wrapper single-card">
			<a href="<?php the_permalink(); ?>">
		        <?php the_post_thumbnail( ) ?>
		        <div class="thumb-overlay"></div>
		    </a>    
	        </div>

	    <?php endif;?>

	    	<div class="card">
	    		<div class="main-card-content" >
		    		<h5 class="timestamp"><?php the_time(get_option('date_format')); ?> - <?php the_category(', '); ?></h5>
		    		<a href="<?php the_permalink(); ?>">
		    			<h3 class="post-title"><?php the_title(); ?></h3>
		    		</a>
					<p><?php the_excerpt(); ?></p>
		    		<a href="<?php the_permalink(); ?>" class="button"><?php _e( 'Read more', 'upsidedown' ); ?></a>
	    		</div>
	    	</div>

    	</div>
	</div>