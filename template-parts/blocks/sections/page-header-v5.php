<?php

/**
 * "Page Header V5" Block Template.
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
$className = 'w-pageHeaderv5 py-5';

if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$isFullWidth = false;
if( !empty($block['align']) ) {
    $isFullWidth = $block['align'] === 'full' ? true : false;
    $className .= ' align-' . $block['align'];
}

// Load values and assign defaults.
$banner = get_field('banner');
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="banner img-wrap">
        <?php if($banner['image']) : ?>
        <img src="<?= esc_url($banner['image']['url']) ?>" alt="<?= esc_attr($banner['image']['alt']) ?>">
        <?php endif; ?>
        <div class="head text-center">
            <?= ($banner['title'] ? '<h2>'.$banner['title'].'</h2>' : '') ?>
            <?= ($banner['subtitle'] ? $banner['subtitle'] : '') ?>
        </div>
    </div>
</section>
<?php 
add_action( 'wp_footer', 'pageHeaderV5Scripts', 99, 1 );
if (!function_exists('pageHeaderV5Scripts'))   {
    function pageHeaderV5Scripts() { ?>
<script async>
(function($) {

}(jQuery));
</script>
<?php }
}