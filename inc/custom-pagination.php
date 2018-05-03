<?php

/**
* CUSTOM PAGINATION FOR WP_QUERY
*/

function upsidedown_custom_pagination($numpages = '', $pagerange = '', $paged='') {

  if (empty($pagerange)) {
    $pagerange = 2;
  }


/**
* This first part of our function is a fallback
* for custom pagination inside a regular loop that
* uses the global $paged and global $wp_query variables.
* 
* It's good because we can now override default pagination
* in our theme, and use this function in default quries
* and custom queries.
*/
  global $paged;
  if (empty($paged)) {
    $paged = 1;
  }
  if ($numpages == '') {
    global $wp_query;
    $numpages = $wp_query->max_num_pages;
    if(!$numpages) {
        $numpages = 1;
    }
  }

  /** 
   * We construct the pagination arguments to enter into our paginate_links
   * function. 
   */
  $pagination_args = array(
    'base'            => get_pagenum_link(1) . '%_%',
    'format'          => 'page/%#%',
    'total'           => $numpages,
    'current'         => $paged,
    'show_all'        => False,
    'end_size'        => 1,
    'mid_size'        => $pagerange,
    'prev_next'       => True,
    'prev_text'       => '<span class="entypo-left-open-mini"> </span>' . __( 'Previous Page', 'upsidedown' ),
    'next_text'       => __( 'Next Page', 'upsidedown' ) . ' <span class="entypo-right-open-mini"></span>',
    'type'            => 'plain',
    'add_args'        => false,
    'add_fragment'    => ''
  );

  $paginate_links = paginate_links($pagination_args);

  if ($paginate_links) {
    echo "<nav class='navigation pagination'>";
      echo "<div class='nav-links'>";
      echo $paginate_links;
      echo "</div>";
    echo "</nav>";
  }

}


/**
 * Determines whether or not the current post is a paginated post.
 *
 * @return   boolean    True if the post is paginated; false, otherwise.
 * @package  includes
 * @since    1.0.0
 */
function post_is_paginated_post() {

	global $multipage;
	return 0 !== $multipage;

} // end acme_is_paginated_post
