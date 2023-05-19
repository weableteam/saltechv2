<?php

/**
 * "Image Text" Block Template.
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
$className = 'w-it';

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
    <div class="container img_text_box">
        <div class="mt-4">
        <div class="container">
            <div class="w-textimg" style="background-image: url('<?=  get_stylesheet_directory_uri() . '/assets/images/br_w_vl.png' ?>')">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="w-textimg-content">
                            <h3 class="w-textimg-title">
                                TẠO SAO SALTECH BẮT ĐẦU
                            </h3>
                            <p class="w-textimg-p">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis porta bibendum sem. In vitae mi gravida, tempus neque eu, interdum risus. Ut tincidunt diam sed dolor mattis sollicitudin. Donec aliquam laoreet diam id vehicula. Suspendisse odio lorem, fermentum ac justo sit amet, fermentum tristique ligula. Nam fringilla auctor nunc id pulvinar.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="w-textimg_peopole">
                            <img src="<?=  get_stylesheet_directory_uri() . '/assets/images/item_pepole.png' ?>" alt="" class="">
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<?php 
//add_action( 'wp_footer', 'itScripts', 99, 1 );
if (!function_exists('itScripts'))   {
    function itScripts() { ?>
        <script async>
            ( function ( $ ) {
                
            }( jQuery ) );
        </script>
    <?php }
}
