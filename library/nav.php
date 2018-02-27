<?php

/***
 * Navigation
 ***/

// Numeric Page Navi (built into the theme by default)
function theme_page_nav() {
  global $wp_query;
  $bignum = 999999999;
  if ( $wp_query->max_num_pages <= 1 )
    return;
  echo '<nav class="pagination">';
  echo paginate_links( array(
    'base'         => str_replace( $bignum, '%#%', esc_url( get_pagenum_link($bignum) ) ),
    'format'       => '',
    'current'      => max( 1, get_query_var('paged') ),
    'total'        => $wp_query->max_num_pages,
    'prev_text'    => '&larr;',
    'next_text'    => '&rarr;',
    'type'         => 'list',
    'end_size'     => 3,
    'mid_size'     => 3
  ) );
  echo '</nav>';
} /* end page navi */


// Breadcrumbs using post categories
function category_breadcrumb_nav ( $id = 0, $delimiter = '>' ) {
  if ( !$id ) {
    global $post;

    $id = $post->ID;
  }

  $post_categories = wp_get_post_categories( $id );
  $cats = array();
       
  foreach($post_categories as $c){
      $cat = get_category( $c );
      $cats[] = $cat->name;
  }

  $cats = array_reverse( $cats );

  echo implode( $delimiter, $cats );
}

// Social Sharing buttons nav
function social_share_nav( $url = '', $title = '', $description = '', $share_image = '') {

    // Twitter
    $query = array(
        'text' => $title . ' ' . $url
    );

    $twitter_share_url = 'http://twitter.com/intent/tweet?' . http_build_query($query, null, '&amp;', PHP_QUERY_RFC3986);

    // Facebook
    $facebook_app_id = get_field( 'facebook_app_id', 'options' );

    $query = array(
        'app_id' => $facebook_app_id,
        'display' => 'popup',
        'caption' => $title,
        'link' => $url,
        'description' => $description,
        'picture' => $share_image
    );

    $facebook_share_url = 'https://www.facebook.com/dialog/feed?' . http_build_query($query, null, '&amp;', PHP_QUERY_RFC3986);

    // Pinterest
    $query = array(
        'media' => $share_image,
        'url' => $url,
        'is_video' => 'false',
        'description' => $title . ' - ' . $description
    );

    $pinterest_share_url = 'http://pinterest.com/pin/create/bookmarklet/?' . http_build_query($query, null, '&amp;', PHP_QUERY_RFC3986);

    // Google+
    $google_share_url = 'https://plus.google.com/share?url=' . $url;

    ?>
    <nav class="article-sharing">
        <a class="button button-share button-twitter" href="<?php echo $twitter_share_url; ?>" onclick="window.open(this.href,'twitterwindow', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank">
            <?php show_svg( 'twitter', 'icon' ); ?>
            <span class="sr-only">TWITTER</span>
        </a>
        <a class="button button-share button-facebook" href="<?php echo $facebook_share_url; ?>" onclick="window.open(this.href,'facebookwindow', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=700,width=600');return false;" target="_blank">
            <?php show_svg( 'facebook', 'icon' ); ?>
            <span class="sr-only">FACEBOOK</span>
        </a>
        <a class="button button-share button-pinterest" href="<?php echo $pinterest_share_url; ?>" onclick="window.open(this.href,'pinterestwindow', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=750,width=750');return false;" target="_blank">
            <?php show_svg( 'pinterest', 'icon' ); ?>
            <span class="sr-only">Pin</span>
        </a>
        <a class="button button-share button-google" href="<?php echo $google_share_url; ?>" onclick="window.open(this.href,'googlepluswindow', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" target="_blank">
            <?php show_svg( 'google-plus', 'icon' ); ?>
            <span class="sr-only">GOOGLE</span>
        </a>
    </nav>
    <?php
}