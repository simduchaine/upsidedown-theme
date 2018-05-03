<?php
/**
 * Template for displaying search forms in Upside Down Theme
 *
 * @package Upside Down
 * @since 1.0
 * @version 1.0
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url() ) ?>">
    <label class="search-label">
        <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'upsidedown' ); ?></span>
    </label>
    <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Type something', 'placeholder', 'upsidedown' ) ?>" value="<?php echo get_search_query() ?>" name="s" >
    <button type="submit" class="search-submit"><?php echo esc_attr_x( 'Search', 'submit button', 'upsidedown' ); ?></button>
</form>
