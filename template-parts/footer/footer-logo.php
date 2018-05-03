<?php
/**
 * Displays copyright widgets if assigned
 *
 * @package Upside Down
 * @since 1.0
 * @version 1.0
 */

?>


<?php
if ( is_active_sidebar( 'footer-logo' ) ) :
?>

		<?php if ( is_active_sidebar( 'footer-logo' ) ) { ?>
			<?php dynamic_sidebar( 'footer-logo' ); ?>
		<?php } ?>

<?php endif; ?>
