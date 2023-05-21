<?php

/**
 * "Campaign" Block Template.
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
$className = 'w-ca';

if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}

$isFullWidth = false;
if (!empty($block['align'])) {
    $isFullWidth = $block['align'] === 'full' ? true : false;
    $className .= ' align-' . $block['align'];
}

// Load values and assign defaults.
$title = get_field('title');
$subtitle = get_field('subtitle');
$content = get_field('content');


?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <div class="campaign-container">
            <?php if($title) : ?>
            <h2 class="campaign-heading">
                <?= $title ?>
            </h2>
            <?php endif; ?>
            <?php if($subtitle) : ?>
            <h5 class="campaign-chose">
                <?= $subtitle ?>
            </h5>
            <?php endif; ?>
            <?php if($content) : ?>
            <div class="campaign-list">
                <?php if($content['image']) : ?>
                <div class="campaign-image">
                    <img src="<?= esc_url($content['image']['url']) ?>" alt="" />
                </div>
                <?php endif; ?>
                <?php if($content['list']) : ?>
                <div class="campaign-item-wrapper">
                    <?php foreach($content['list'] as $item) : ?>
                    <div class="campaign-item">
                        <div class="campaign-text">
                            <?php if($item['link']) : ?>
                            <a href="<?= esc_url($item['link']['url']) ?>">
                                <h6 class="campaign-text-title"><?= esc_attr($item['link']['title']) ?></h6>
                            </a>
                            <?php endif; ?>
                            <?php if($item['detail']) : ?>
                            <p>
                                <?= $item['detail'] ?>
                            </p>
                            <?php endif; ?>
                        </div>
                        <?php if($item['icon']) : ?>
                            <img src="<?= esc_url($item['icon']['url']) ?>" alt="" class="campaign-icon" />
                        <?php endif; ?>
                        <a href="<?= esc_url($item['link']['url']) ?>" class="campaign-next">
                            <img src="/wp-content/uploads/2023/05/Group-871.webp" alt="">
                        </a>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php
//add_action( 'wp_footer', 'caScripts', 99, 1 );
if (!function_exists('caScripts')) {
    function caScripts()
    { ?>
        <script async>
            (function($) {

            }(jQuery));
        </script>
<?php }
}
