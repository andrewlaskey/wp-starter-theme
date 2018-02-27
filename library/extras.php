<?php

/***
 * Extras
 ***/


// remove the p from around imgs (http://css-tricks.com/snippets/wordpress/remove-paragraph-tags-from-around-images/)
function theme_filter_ptags_on_images($content){
    return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

// This removes the annoying […] to a Read More link
function theme_excerpt_more($more) {
    global $post;
    // edit here if you like
    return '';
}

// trim text to a max number of characters
function limit_content( $text, $numChar, $findSpace = false ){
    $length = $numChar;
    
    if ( strlen( $text ) < $length + 10 ) return $text;//don't cut if too short
    
    if ( $findSpace )
        $length = strpos($text, ' ', $length);//find next space after desired length
    
    return substr($text, 0, $length) . '...';
}

// Add a responsive wrapper around video or other embeds
function responsive_oembed_html( $html ) {
  return '<div class="responsive-video-wrap">' . $html . '</div>';
}

function show_image( $field, $atts = array(), $options = false, $sub_field = false ) {
    global $post;

    if ( $options ) {
        $image = get_field( $field, 'options' ); 
    } elseif ( $sub_field ) {
        $image = get_sub_field( $field );
    } else {
        $image = get_field( $field );
    }

    $attr_str = '';

    foreach ($atts as $key => $value) {
        $attr_str .= $key . '="' . $value . '" ';
    }

    if ( !empty( $image ) ) {
        echo '<img src="' . $image['url'] . '" ' . $attr_str . '/>';
    }
}

// Add page slug to body class for access via javascript
function add_page_slug_body_class( $classes ) {
    global $post;

    if ($post) {
        $classes[] = $post->post_name;
    }
    
    return $classes;
}

function show_svg ( $id, $classes = '') {
    echo '<svg class="'. $classes . '"><use xlink:href="#' . $id . '"></use></svg>';
}

// filter the Gravity Forms button type
function form_submit_button( $button, $form ) {
    if ($form['id'] != 5) {
        return '<button class="button button-icon-right" id="gform_submit_button_' . $form['id'] . ' onclick="if(window[&quot;gf_submitting_' . $form['id'] . '&quot;]){return false;}  window[&quot;gf_submitting_4&quot;]=true;  " onkeypress="if( event.keyCode == 13 ){ if(window[&quot;gf_submitting_' . $form['id'] . '&quot;]){return false;} window[&quot;gf_submitting_' . $form['id'] . '&quot;]=true;  jQuery(&quot;#gform_4&quot;).trigger(&quot;submit&quot;,[true]); }"><span>Submit</span><svg class="icon"><use xlink:href="#arrow"></use></svg></button>';
    } else {
        return $button;
    }
}

// filter Gravity Forms ajax spinner
function gf_spinner_replace( $image_src, $form ) {
    return  'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7'; // relative to you theme images folder
}

function the_page_url_by_title ( $title = '') {
    echo get_permalink( get_page_by_title( $title ) );
}