<?php
/**
 * Template part for displaying standard posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Upside Down
 * @since 1.0
 * @version 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="row article-header">
			<?php if(has_post_thumbnail()) :?>
			    <div id="article-img" class="featured-img">
			         <?php the_post_thumbnail( ) ?>
		        </div>
	        <?php else: ?>
	        	<div class="fallback-img">       		
	        	</div>
	        <?php endif;?>
	        <div id="title-section" class="article-meta absolute-center">
		        <h1><?php the_title(); ?></h1>
		        <h5><?php the_time(get_option('date_format')); ?> - <?php the_category(', '); ?></h5>
		        <h5><?php _e( 'By ', 'upsidedown' ); the_author_posts_link(); ?></h5>
	        </div>
	    </div>

    	<div class="row main-card">
    		<div class="column">
				<div class="content">
		    		<?php the_content(); ?>
				</div>

    			<div class="article-tags">
    				<?php the_tags() ?>
    			</div>

    			<?php if (post_is_paginated_post()) { ?>
	    			<div class="pages-pagination">
						<div class="link_pages_wrapper">
							<h5>Pages: </h5>
							<?php wp_link_pages('before=<ul class="page-links">&after=</ul>&link_before=<li class="page-link button">&link_after=</li>'); ?>
						</div>
					</div>
				<?php } ?>

    			<?php edit_post_link( __( 'Edit content', 'upsidedown' ), '<p>', '</p>', null, 'button' ); ?>


			</div>
		</div>
</article>

