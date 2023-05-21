<?php

/**
 * "Image Text Revert" Block Template.
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
$className = 'w-itr';

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
    <section class="w-itr">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="item-left">
                        <h4 class="item-heading">LOREM IPSUM</h4>
                        <h2 class="item-title">TITLE NÓI TÀO LAO GÌ ĐÓ CHƯA NGHĨ RA</h2>
                        <p class="item-texts">
                            <span class="item-text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis
                            porta bibendum sem. In vitae mi gravida, tempus neque eu,
                            interdum risus. Ut tincidunt diam sed dolor mattis
                            sollicitudin.
                            </span>
                            <br />
                            <span class="item-text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis
                            porta bibendum sem. In vitae mi gravida, tempus neque eu,
                            interdum risus. Ut tincidunt diam sed dolor mattis
                            sollicitudin.
                            </span>
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="item-image">
                        <img src="<?=  get_stylesheet_directory_uri() . '/assets/images/Rectangle 214.webp' ?>" alt="">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="item-left">
                        <h4 class="item-heading">LOREM IPSUM</h4>
                        <h2 class="item-title">TITLE NÓI TÀO LAO GÌ ĐÓ CHƯA NGHĨ RA</h2>
                        <p class="item-texts">
                            <span class="item-text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis
                            porta bibendum sem. In vitae mi gravida, tempus neque eu,
                            interdum risus. Ut tincidunt diam sed dolor mattis
                            sollicitudin.
                            </span>
                            <br />
                            <span class="item-text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis
                            porta bibendum sem. In vitae mi gravida, tempus neque eu,
                            interdum risus. Ut tincidunt diam sed dolor mattis
                            sollicitudin.
                            </span>
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="item-image">
                        <img src="<?=  get_stylesheet_directory_uri() . '/assets/images/Rectangle 214.webp' ?>" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
<?php 
//add_action( 'wp_footer', 'itrScripts', 99, 1 );
if (!function_exists('itrScripts'))   {
    function itrScripts() { ?>
        <script async>
            ( function ( $ ) {
                
            }( jQuery ) );
        </script>
    <?php }
}