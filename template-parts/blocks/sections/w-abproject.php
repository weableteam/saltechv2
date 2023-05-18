<?php

/**
 * "About Project" Block Template.
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
$className = 'w-apj';

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
        <div class="about-container">
            <div class="about-heading">
                <h1>
                    Title dẫn xem dự án. Lorem ipsum dolor sit amet, consectetur
                    adipiscing elit. Duis porta bibendum sem. In vitae mi gravida,
                    tempus neque eu, interdum ri.
                </h1>
            </div>
            <div class="about-slider">
                <div class="about-item">
                    <img src="http://localhost:10041/wp-content/uploads/2023/05/Rectangle-215.webp" alt="" />
                </div>
                <div class="about-item">
                    <img src="http://localhost:10041/wp-content/uploads/2023/05/Rectangle-215.webp" alt="" />
                </div>
                <div class="about-item">
                    <img src="http://localhost:10041/wp-content/uploads/2023/05/Rectangle-215.webp" alt="" />
                </div>
                <div class="about-item">
                    <img src="http://localhost:10041/wp-content/uploads/2023/05/Rectangle-215.webp" alt="" />
                </div>
            </div>
            <div class="about-name">
                <span><img src="http://localhost:10041/wp-content/uploads/2023/05/Group-903.webp" alt=""></span>
                <div class="about-name-wrapper">
                    <h4>Tên dự án</h4>
                    <p>Tên dịch vụ</p>
                </div>
            </div>
            <div class="about-slider--counter">1/4</div>
        </div>
    </div>
</section>
<?php
//add_action( 'wp_footer', 'apjScripts', 99, 1 );
if (!function_exists('apjScripts')) {
    function apjScripts()
    { ?>
<script async>
(function($) {

}(jQuery));
</script>
<?php }
}