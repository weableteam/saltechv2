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
$className = 'w-lh py-5';

if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}

$isFullWidth = false;
if (!empty($block['align'])) {
    $isFullWidth = $block['align'] === 'full' ? true : false;
    $className .= ' align-' . $block['align'];
}

// Load values and assign defaults.
$content = get_field('content');
$image = get_field('image');



?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="item-left">
                    <?= ($content['small_title']) ? '<h4 class="item-heading">'.$content['small_title'].'</h4>' : '' ?>
                    <?= ($content['title']) ? '<h2 class="item-title">'.$content['title'].'</h2>' : '' ?>
                    <?= ($content['text_content']) ? $content['text_content'] : '' ?>
                    <?php if($content['link']) : ?>
                        <a href="<?= esc_url($content['link']['url']) ?>" class="btn-recruitment"><?= esc_attr($content['link']['title']) ?></a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <?php if($image) : ?>
                <div class="item-image">
                    <img src="<?= esc_url($image['url']) ?>" alt="" />
                </div>
                <?php endif; ?>
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
