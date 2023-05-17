<?php

/**
 * "Why We Can" Block Template.
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
$className = 'w-wwc py-5';

if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$isFullWidth = false;
if( !empty($block['align']) ) {
    $isFullWidth = $block['align'] === 'full' ? true : false;
    $className .= ' align-' . $block['align'];
}

// Load values and assign defaults.
$top = get_field('top');
$list = get_field('list');

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <?php if($top) : ?>
            <div class="title text-center">
                <?= ($top['tag']) ? '<span>'.$top['tag'].'</span>' : '' ?>
                <?= ($top['title']) ? '<h2>'.$top['title'].'</h2>' : '' ?>
                <?= ($top['content']) ? $top['content'] : '' ?>
            </div>
        <?php endif; ?>
        <?php if($list) : ?>
            <div class="row">
                <?php foreach($list as $item) : ?>
                <div class="col-lg-4 col-md-6 col-12 my-lg-5 my-3">
                    <div class="items">
                        <?php if($item['image']) : ?>
                        <img src="<?= esc_url($item['image']['url']) ?>" alt="<?= esc_attr($item['image']['alt']) ?>"
                            class="img-fluid">
                        <?php endif; ?>
                        <?= ($item['detail']) ? '<span>'.$item['detail'].'</span>' : '' ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php 
//add_action( 'wp_footer', 'wwcScripts', 99, 1 );
if (!function_exists('wwcScripts'))   {
    function wwcScripts() { ?>
<script async>
(function($) {

}(jQuery));
</script>
<?php }
}