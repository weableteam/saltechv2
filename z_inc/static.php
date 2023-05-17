<?php
add_action('wp_enqueue_scripts', 'z_frontend_statics', 20 );
function z_frontend_statics(){
    global $cu;
    if ( is_admin() ) { return; }
    $v = '1.2.9';
    wp_enqueue_script( 'custom.js', get_template_directory_uri().'/assets/js/process.js', array('jquery'), $v, true , 'module' );
    wp_localize_script( 'custom.js', 'zing', array(
        'home_url' => home_url(),
        'ajax_url' => admin_url( 'admin-ajax.php' ),
        'pageID' => get_the_ID(),
        'cu' => $cu,
        //'imgs' => IMG
    ));
} ?>