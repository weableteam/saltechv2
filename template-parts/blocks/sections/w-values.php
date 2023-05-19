<?php

/**
 * "Values" Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'w-block-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'w-vl';

if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$isFullWidth = false;
if( !empty($block['align']) ) {
    $isFullWidth = $block['align'] === 'full' ? true : false;
    $className .= ' align-' . $block['align'];
}

// Load values and assign defaults.
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
<div class="container">
                <p class="w-vl-p_title">
                    OUR VALUES
                </p>
                <div class="w-vl-content-box" style="background-image: url('<?=  get_stylesheet_directory_uri() . '/assets/images/br_w_vl.png' ?>')" >
                    
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="w-vl-item active text-center">
                                <img src="<?=  get_stylesheet_directory_uri() . '/assets/images/item_icon.png' ?>" class="icon-item_img" alt="">
                                <h4 class="w-vl-h4-title">
                                    giá trị 1
                                </h4>
                                <p class="w-vl-title-p">
                                    Lorem ipsum dolor sit amet consectetur . Accusamus asperiores officiis facere aliquam iure, obcaecati totam aspernatur nesciunt quia?
                                </p>
                                <p class="w-vl-title-p">
                                    Accusamus asperiores officiis facere aliquam iure, obcaecati totam aspernatur nesciunt quia?
                                </p>
                            </div>
                            
                        </div>
                        <div class="col-lg-4">
                            <div class="w-vl-item  text-center">
                                <img src="<?=  get_stylesheet_directory_uri() . '/assets/images/item_icon.png' ?>" class="icon-item_img" alt="">
                                <h4 class="w-vl-h4-title">
                                    giá trị 1
                                </h4>
                                <p class="w-vl-title-p">
                                    Lorem ipsum dolor sit amet consectetur . Accusamus asperiores officiis facere aliquam iure, obcaecati totam aspernatur nesciunt quia?
                                </p>
                                <p class="w-vl-title-p">
                                    Accusamus asperiores officiis facere aliquam iure, obcaecati totam aspernatur nesciunt quia?
                                </p>
                            </div>
                            
                        </div>
                        <div class="col-lg-4">
                            <div class="w-vl-item  text-center">
                                <img src="<?=  get_stylesheet_directory_uri() . '/assets/images/item_icon.png' ?>" class="icon-item_img" alt="">
                                <h4 class="w-vl-h4-title">
                                    giá trị 1
                                </h4>
                                <p class="w-vl-title-p">
                                    Lorem ipsum dolor sit amet consectetur . Accusamus asperiores officiis facere aliquam iure, obcaecati totam aspernatur nesciunt quia?
                                </p>
                                <p class="w-vl-title-p">
                                    Accusamus asperiores officiis facere aliquam iure, obcaecati totam aspernatur nesciunt quia?
                                </p>
                            </div>
                            
                        </div>
                    </div>
                </div>
            
          
       
    </div>
</section>
<?php 
//add_action( 'wp_footer', 'vlScripts', 99, 1 );
if (!function_exists('vlScripts'))   {
    function vlScripts() { ?>
        <script async>
            ( function ( $ ) {
                
            }( jQuery ) );
        </script>
    <?php }
}