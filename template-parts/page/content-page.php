<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Upsidedown
 * @since 1.0
 * @version 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if(has_post_thumbnail()) :?>
		<div class="row" >
    	    <div class="featured-img">
	    	    <?php the_post_thumbnail( ) ?>
	        </div>
	        </div>
    <?php endif;?>

    	<div class="row main-card">
    		<div class="column">
				<h3 class="heading"><?php the_title(); ?></h3>

				<div class="content">
		    		<?php the_content(); ?>
				</div>

				<?php edit_post_link( __( 'Edit content', 'upsidedown' ), '<p>', '</p>', null, 'button' ); ?>

			</div>

		</div>
</article>

	