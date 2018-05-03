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
if ( is_active_sidebar( 'copyright' ) ) :
?>

		<?php if ( is_active_sidebar( 'copyright' ) ) { ?>
			<?php dynamic_sidebar( 'copyright' ); ?>
		<?php } ?>

<?php endif; ?>
