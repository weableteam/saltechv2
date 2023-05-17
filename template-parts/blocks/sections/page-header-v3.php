<?php

/**
 * "Page Header V3" Block Template.
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
$className = 'w-pageHeaderv3 ';

if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$isFullWidth = false;
if( !empty($block['align']) ) {
    $isFullWidth = $block['align'] === 'full' ? true : false;
    $className .= ' align-' . $block['align'];
}

// Load values and assign defaults.
$left = get_field('left_link');
$right = get_field('right_link');
$image = get_field('image');
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" <?= ($image) ? 'style = "background-image: url('.esc_url($image['url']).');"' : '' ?>">
    <div class="container-fluid">
        <div class="transfer">
            <?php if($left) : ?>
            <a href="<?= esc_url($left['url']) ?>" class="back">
                <img src="<?=  get_stylesheet_directory_uri() . '/assets/images/Vector (70).webp' ?>" class="img-fluid" alt="">
                <?= esc_attr($left['title']) ?>
            </a>
            <?php endif; ?>
            <?php if($left) : ?>
            <a href="<?= esc_attr($right['url']) ?>" class="next">
                <?= esc_attr($right['title']) ?>
                <img src="<?=  get_stylesheet_directory_uri() . '/assets/images/Vector (101).webp' ?>" class="img-fluid" alt="">
            </a>
            <?php endif; ?>

        </div>
       
        <div class="contact">
            <a href="#">Saltech.info@gmail.com</a>
            <div class="phone">+1 800 123 5 6789</div>
        </div>
    </div>
</section>
<?php 
//add_action( 'wp_footer', 'pageHeaderV3Scripts', 99, 1 );
if (!function_exists('pageHeaderV3Scripts'))   {
    function pageHeaderV3Scripts() { ?>
<script async>
(function($) {

}(jQuery));
</script>
<?php }
}