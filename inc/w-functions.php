<?php
/**
 * Custom post type & taxonomy for "Dự án"
 * 
 * @author Weable Team
 */
add_action( 'init', 'w_create_post_type' );
function w_create_post_type() {
    register_post_type( 'du-an',
        array(
            'labels' => array(
                'name' => __( 'Dự án' ),
                'singular_name' => __( 'Dự án' ),
            ),
            'menu_icon' => 'dashicons-superhero-alt',
            'menu_position' => 5,
            'public' => true,
            'has_archive' => false,
            'supports' => array('title', 'editor', 'thumbnail', 'author', 'excerpt'),
        )
    );
}
add_action( 'init', 'w_create_taxonomy');
function w_create_taxonomy() {
    register_taxonomy( 'linh-vuc-du-an', 'du-an', 
        array(
            'label'        => __( 'Lĩnh vực', 'weable' ),
            'public'       => true,
            'hierarchical' => true,
            'show_admin_column' => true
        )
    );
}

/**
 * Set post views count using post meta
 * 
 * @author https://stackoverflow.com/questions/12934161/show-view-count-of-a-post-on-wordpress
 */
function customSetPostViews($postID) {
    $countKey = 'post_views_count';
    $count = get_post_meta($postID, $countKey, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $countKey);
        add_post_meta($postID, $countKey, '1');
    }else{
        $count++;
        update_post_meta($postID, $countKey, $count);
    }
}

/**
 * Allow SVG upload
 * 
 * @author https://wpengine.com/resources/enable-svg-wordpress/
*/
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

    global $wp_version;
    if ( $wp_version !== '4.7.1' ) {
       return $data;
    }
  
    $filetype = wp_check_filetype( $filename, $mimes );
  
    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
  
}, 10, 4 );
  
function cc_mime_types( $mimes ){
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

function fix_svg() {
    echo '<style type="text/css">
          .attachment-266x266, .thumbnail img {
               width: 100% !important;
               height: auto !important;
          }
          </style>';
}
add_action( 'admin_head', 'fix_svg' );

/**
 * Remove Category Prefix in Title
 */
add_filter( 'get_the_archive_title_prefix', '__return_empty_string' );

