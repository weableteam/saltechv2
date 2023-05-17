<?php

/**
 * SMTP Config
 * 
 * @author Weable team
 */
add_action( 'phpmailer_init', function( $phpmailer ) {

    $smtp_account = get_field('smtp_account','option');
    $mail_title = get_field('mail_title','option');
    
    if ( !is_object( $phpmailer && $smtp_account ) )
    $phpmailer = (object) $phpmailer;
    $phpmailer->Mailer     = 'smtp';
    $phpmailer->Host       = 'smtp.gmail.com';
    $phpmailer->SMTPAuth   = 1;
    $phpmailer->Port       = 587;
    $phpmailer->Username   = $smtp_account['gmail'];
    $phpmailer->Password   = $smtp_account['pass_app'];
    $phpmailer->SMTPSecure = 'TLS';
    $phpmailer->From       = $smtp_account['gmail'];
    $phpmailer->FromName   = $mail_title;
});

/**
 * Custom Admin dashboard
 * 
 * @author Weable team
 */
add_action( 'login_enqueue_scripts', 'load_admin_style' );
add_action( 'admin_enqueue_scripts', 'load_admin_style' );
function load_admin_style() {
    wp_enqueue_style( 'admin_css', get_template_directory_uri() . '/assets/css/w-admin.css', false, '1.0.0' );
}
if ( wp_get_current_user()->user_email != 'weableteam@gmail.com' ) {
    function wpdocs_remove_menus(){
  
        remove_menu_page( 'tools.php' ); 
        remove_menu_page( 'wpseo_dashboard' ); 
        remove_menu_page( 'loco' ); 
        remove_menu_page( 'edit.php?post_type=acf-field-group' ); 
        remove_menu_page( 'plugins.php' ); 
        remove_menu_page( 'themes.php' ); 
        remove_menu_page( 'woocommerce'); 
        remove_menu_page( 'users.php'); 
        remove_menu_page( 'wpcf7'); 
        remove_menu_page( 'edit-comments.php'); 
        remove_menu_page( 'upload.php'); 
        remove_menu_page( 'wc-admin'); 

        remove_submenu_page( 'options-general.php','facetwp' ); 
        remove_submenu_page( 'options-general.php','options-privacy.php' ); 
        remove_submenu_page( 'options-general.php','options-media.php' ); 
        remove_submenu_page( 'options-general.php','options-discussion.php' ); 
        remove_submenu_page( 'options-general.php','options-writing.php' ); 
        remove_submenu_page( 'options-general.php','options-permalink.php' ); 
        remove_submenu_page( 'options-general.php','options-reading.php' ); 
        remove_submenu_page( 'options-general.php','ic_reviews' ); 
        remove_submenu_page( 'index.php','update-core.php' ); 

    }
    add_action( 'admin_init', 'wpdocs_remove_menus' );

    function w_register_admin_page() {
        add_menu_page(
            __( 'Quản lý đơn hàng', 'fusshi' ),
            __( 'Quản lý đơn hàng', 'fusshi' ),
            'manage_options',
            'edit.php?post_type=shop_order',
            '',
            'dashicons-cart',
            99
        );

        add_menu_page(
            __( 'Xem data booking', 'fusshi' ),
            __( 'Xem data booking', 'fusshi' ),
            'manage_options',
            'view-data-booking',
            'xem_data_callbacks',
            'dashicons-media-spreadsheet',
            99
        );
    }
    add_action('admin_menu', 'w_register_admin_page');
    
    function remove_dashboard_widgets() {
        global $wp_meta_boxes;
        unset($wp_meta_boxes['dashboard']);
    }
    add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );


    function w_admin_bar_render() {

        global $wp_admin_bar;
        
        $wp_admin_bar->remove_menu('comments');
        $wp_admin_bar->remove_menu('updates');
        $wp_admin_bar->remove_menu('wp-logo');
        $wp_admin_bar->remove_menu('new-content');
        $wp_admin_bar->remove_menu('wpseo-menu');
        $wp_admin_bar->remove_node('view-store');
        $wp_admin_bar->remove_node('archive');
      
        if(current_user_can('administrator')) { 

            $wp_admin_bar->add_menu( array(
                'id' => 'w-xembooking',
                'title' => __('Xem data booking'),
                'meta' => array('target'=>'_blank'),
                'href' => 'https://docs.google.com/spreadsheets/d/1Pd_3dnNr1oIeJXAQuhoXF3c3gqfVFOEP_8h23k08vGM/edit?usp=sharing'
            ));

            $wp_admin_bar->add_menu( array(
            'id' => 'w-huongdanquantri',
            'title' => __('Hướng dẫn quản trị website'),
            'meta' => array('target'=>'_blank'),
            'href' => 'https://docs.fusshi.com/'
            ));

        } 
    }
    add_action( 'wp_before_admin_bar_render', 'w_admin_bar_render' );
}


/**
 *  Color paletes
*/

// add_action('wp_head', 'w_colors', 100);
function w_colors() { 
    $colors = get_field('pallete','option');
    $primary_color = $colors['primary'];
    $warning_color = $colors['warning'];
    $danger_color = $colors['danger'];
    $success_color = $colors['success'];
    $orange_color = $colors['orange'];
    $border_color = $colors['border'];
    $gradient = $colors['gradient'];
    $gradient_2 = $colors['gradient_2'];
    $gradient_3 = $colors['gradient_3'];
    $gradient_4 = $colors['gradient_4'];
    $gradient_5 = $colors['gradient_5'];
?>
    <style>
        :root {
            --primary: <?= ($primary_color) ? $primary_color : '#007bff' ?>;
            --warning: <?= ($warning_color) ? $warning_color : '#ffc107' ?>;
            --danger: <?= ($danger_color) ? $danger_color : '#dc3545' ?>;
            --success: <?= ($success_color) ? $success_color : '#28a745' ?>;
            --orange: <?= ($orange_color) ? $orange_color : '#fd7e14' ?>;
            --border-color: <?= ($border_color) ? $border_color : '#e7eaf0' ?>;
            --light: <?= ($border_color) ? $border_color : '#e7eaf0' ?>;
            --w-gradient-one: <?= ($gradient) ? $gradient : '' ?>;
            --w-gradient-two: <?= ($gradient_2) ? $gradient_2 : '' ?>;
            --w-gradient-three: <?= ($gradient_3) ? $gradient_3 : '' ?>;
            --w-gradient-four: <?= ($gradient_4) ? $gradient_4 : '' ?>;
            --w-gradient-five: <?= ($gradient_5) ? $gradient_5 : '' ?>;
        }
        .btn-primary, .wp-block-button .wp-block-button__link {
            background-color: var(--primary);
            border-color: var(--primary);
        }
    </style>
<?php }
