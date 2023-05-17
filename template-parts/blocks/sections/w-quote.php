<?php

/**
 * "Quote" Block Template.
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
$className = 'w-quote pt-5';

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
$info = get_field('info');

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <div class="title">
            <?= ($title['subtitle']) ? '<p>'.$title['subtitle'].'</p>' : '' ?>
            <?= ($title['title']) ? '<h2>'.$title['title'].'</h2>' : '' ?>
        </div>
        <div class="item">
            <?php if($info['avatar']) : ?>
            <div class="logo">
                <img src="<?= esc_url($info['avatar']['url']) ?>" alt="<?= esc_attr($info['avatar']['alt']) ?>" class="img-fluid">
            </div>
            <?php endif; ?>
            <div class="info">
                <?= ($info['name']) ? '<p class="name">'.$info['name'].'</p>' : '' ?>
                <?= ($info['role']) ? '<p class="role">'.$info['role'].'</p>' : '' ?>
            </div>
        </div>
    </div>
</section>
<?php 
//add_action( 'wp_footer', 'quoteScripts', 99, 1 );
if (!function_exists('quoteScripts'))   {
    function quoteScripts() { ?>
<script async>
(function($) {

}(jQuery));
</script>
<?php }
}