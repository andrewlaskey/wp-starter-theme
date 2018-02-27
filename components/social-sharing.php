<?php

$share_link = get_permalink();
$share_title = get_the_title();

$share_description = '';

$hero_image = get_field( 'recipe_hero_image' );
$share_image = '';

if ( !empty( $hero_image ) ) {
    $share_image = $hero_image['url'];
}

// Twitter
$query = array(
    'text' => $share_title . ' ' . $share_link
);

$twitter_share_url = 'http://twitter.com/intent/tweet?' . http_build_query($query, null, '&amp;', PHP_QUERY_RFC3986);

// Facebook
$facebook_app_id = esc_html( get_field( 'facebook_app_id', 'options' ) );

$query = array(
    'app_id' => $facebook_app_id,
    'display' => 'popup',
    'caption' => $share_title,
    'link' => $share_link,
    'description' => $share_description,
    'picture' => $share_image
);

$facebook_share_url = 'https://www.facebook.com/dialog/feed?' . http_build_query($query, null, '&amp;', PHP_QUERY_RFC3986);

// Google+
$google_share_url = 'https://plus.google.com/share?url=' . $share_link;

?>

<div class="article-sharing">
	<a class="button button-share button-twitter" href="<?php echo $twitter_share_url; ?>" onclick="window.open(this.href,'twitterwindow', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank">
		<?php show_svg( 'twitter' ); ?>
		<span>TWITTER</span>
	</a>
	<a class="button button-share button-facebook" href="<?php echo $facebook_share_url; ?>" onclick="window.open(this.href,'facebookwindow', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=700,width=600');return false;" target="_blank">
		<?php show_svg( 'facebook' ); ?>
		<span>FACEBOOK</span>
	</a>
	<a class="button button-share button-google" href="<?php echo $google_share_url; ?>" onclick="window.open(this.href,'googlepluswindow', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" target="_blank">
		<?php show_svg( 'google-plus' ); ?>
		<span>GOOGLE</span>
	</a>
</div>