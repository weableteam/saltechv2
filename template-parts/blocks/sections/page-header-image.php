<?php

/**
 * "Page Header Image" Block Template.
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
$className = 'w-phi pt-lg-5 pt-3';

if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$isFullWidth = false;
if( !empty($block['align']) ) {
    $isFullWidth = $block['align'] === 'full' ? true : false;
    $className .= ' align-' . $block['align'];
}

// Load values and assign defaults.
$image_pc = get_field('image_pc');
$image_mb = get_field('image_mb');
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <?php if ($image_pc) : ?>
            <img src="<?= esc_url($image_pc['url']) ?>" class="img-fluid d-lg-block d-none" alt="">
        <?php endif; ?>
        <?php if ($image_mb) : ?>
            <img src="<?= esc_url($image_mb['url']) ?>" class="img-fluid d-lg-none d-block" alt="">
        <?php endif; ?>
    </div>
</section>
<?php 
//add_action( 'wp_footer', 'phiScripts', 99, 1 );
if (!function_exists('phiScripts'))   {
    function phiScripts() { ?>
        <script async>
            ( function ( $ ) {
                
            }( jQuery ) );
        </script>
    <?php }
}