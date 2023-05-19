<?php

/**
 * "Link Hirinng" Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'w-block-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'w-lh';

if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}

$isFullWidth = false;
if (!empty($block['align'])) {
    $isFullWidth = $block['align'] === 'full' ? true : false;
    $className .= ' align-' . $block['align'];
}

// Load values and assign defaults.
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="item-left">
                    <h4 class="item-heading">LOREM IPSUM</h4>
                    <h2 class="item-title">TITLE HƯỚNG TỚI TRANG TUYỂN DỤNG</h2>
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
                    <a href="#" class="btn-recruitment">Tuyển dụng</a>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="item-image">
                    <img src="http://localhost:10041/wp-content/uploads/2023/05/Rectangle-214.webp" alt="" />
                </div>
            </div>
        </div>
    </div>
</section>
<?php
//add_action( 'wp_footer', 'lhScripts', 99, 1 );
if (!function_exists('lhScripts')) {
    function lhScripts()
    { ?>
        <script async>
            (function($) {

            }(jQuery));
        </script>
<?php }
}
