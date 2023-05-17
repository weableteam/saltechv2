<?php

/**
 * "Page Header V1" Block Template.
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
$className = 'w-pageHeaderv1 py-5';

if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$isFullWidth = false;
if( !empty($block['align']) ) {
    $isFullWidth = $block['align'] === 'full' ? true : false;
    $className .= ' align-' . $block['align'];
}

// Load values and assign defaults.
$content_1 = get_field('content_1');
$content_2 = get_field('content_2');
$image = get_field('image');

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <div class="bg-wrap">
            <div class="row align-items-center justify-content-between">
                <div class="col-12 col-lg-5">
                    <div class="items">
                        <?php if($content_1) : ?>
                        <div class="title">
                            <?= ($content_1['subtitle']) ? '<span>'.$content_1['subtitle'].'</span>' : '' ?>
                            <?= ($content_1['title']) ? '<h1>'.$content_1['title'].'</h1>' : '' ?>
                        </div>
                        <?php endif; ?>
                        <?php if($content_1) : ?>
                        <div class="ratio">
                            <?= ($content_2['title']) ? '<h2>'.$content_2['title'].'</h2>' : '' ?>
                            <?= ($content_2['subtitle']) ? '<span>'.$content_2['subtitle'].'</span>' : '' ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if($image) : ?>
                <div class="col-12 col-lg-7">
                    <div class="img-fluid">
                        <img src="<?= esc_url($image['url']) ?>" alt="<?= esc_attr($image['alt']) ?>">
                        <div class="cloud positon-relative"></div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div >
    </div>
</section>
<?php 
//add_action( 'wp_footer', 'pageHeaderV1Scripts', 99, 1 );
if (!function_exists('pageHeaderV1Scripts'))   {
    function pageHeaderV1Scripts() { ?>
<script async>
(function($) {

}(jQuery));
</script>
<?php }
}