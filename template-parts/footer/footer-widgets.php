<?php
/**
 * Displays footer widgets if assigned
 *
 * @package Upside Down
 * @since 1.0
 * @version 1.0
 */

?>


<?php
if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' )  ) :
?>

		<?php if ( is_active_sidebar( 'footer-1' ) ) { ?>
			<?php dynamic_sidebar( 'footer-1' ); ?>
		<?php }

		if ( is_active_sidebar( 'footer-2' ) ) { ?>
			<?php dynamic_sidebar( 'footer-2' ); ?>
		<?php }

		if ( is_active_sidebar( 'footer-3' ) ) { ?>
			<?php dynamic_sidebar( 'footer-3' ); ?>
		<?php } ?>

<?php endif; ?>
