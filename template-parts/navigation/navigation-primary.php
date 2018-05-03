<?php
/**
 * Displays top navigation
 *
 * @package Upside Down
 * @since 1.0
 * @version 1.0
 */

?>
<nav id="flexmenu">
	<div class="container">

	   <div id="mobile-toggle" class="menu-button"></div>

        <?php wp_nav_menu( array(
        'container' => '',
		'theme_location' => 'primary',
		'menu_id'        => 'primary-menu',
		) ); ?>

        <a href="#search"><img class="search-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/loupe.svg"></a>

		<div class="row logo">
			<div class="hvr-grow-rotate">
			<?php if (has_custom_logo()) :?>
				<?php the_custom_logo(); ?>
			 <?php else:?>
				<a href="<?php echo esc_url( home_url() ) ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.svg"></a>
			<?php endif; ?>
			</div>
	    </div>

    </div>
</nav>
