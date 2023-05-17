<?php

/**
 * "Helper" Block Template.
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
$className = 'w-helper pt-5';

if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$isFullWidth = false;
if( !empty($block['align']) ) {
    $isFullWidth = $block['align'] === 'full' ? true : false;
    $className .= ' align-' . $block['align'];
}

// Load values and assign defaults.
$title = get_field('title');
$list = get_field('list');

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <?php if($title) : ?>
        <div class="title">
            <h3><?= $title ?></h3>
        </div>
        <?php endif; ?>
        <?php if($list) : ?>
        <ul class="list">
            <?php foreach($list as $item) : ?>
            <li class="items"> 
                <?php if($item['logo']) : ?>
                <div class="logo">
                    <img src="<?= esc_url($item['logo']['url']) ?>" alt="<?= esc_attr($item['logo']['alt']) ?>"
                        class="img-fluid">
                </div>
                <?php endif; ?>
                <?= ($item['name']) ? '<h3>'.$item['name'].'</h3>' : '' ?>
                <?= ($item['detail']) ? '<p>'.$item['detail'].'</p>' : '' ?>
            </li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>
    </div>
</section>
<?php 
//add_action( 'wp_footer', 'helperScripts', 99, 1 );
if (!function_exists('helperScripts'))   {
    function helperScripts() { ?>
<script async>
(function($) {

}(jQuery));
</script>
<?php }
}