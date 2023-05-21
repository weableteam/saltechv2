<?php

/**
 * "Image Text Revert" Block Template.
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
$className = 'w-itr';

if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$isFullWidth = false;
if( !empty($block['align']) ) {
    $isFullWidth = $block['align'] === 'full' ? true : false;
    $className .= ' align-' . $block['align'];
}

// Load values and assign defaults.
$list = get_field('list');
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <?php if($list) : ?>
    <section class="w-itr">
        <div class="container">
            <?php foreach($list as $item) : ?>
            <div class="row">
                <div class="col-lg-6">
                    <div class="item-left">
                        <?= ($item['subtitle']) ? '<h4 class="item-heading">'.$item['subtitle'].'</h4>' : '' ?>
                        <?= ($item['title']) ? '<h2 class="item-title">'.$item['title'].'</h2>' : '' ?>
                        <?= ($item['content']) ? $item['content'] : '' ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <?php if($item['image']) : ?>
                    <div class="item-image img-wrap">
                        <img src="<?= esc_url($item['image']['url']) ?>" alt="">
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
      
        </div>
    </section>
    <?php endif; ?>
</section>
<?php 
//add_action( 'wp_footer', 'itrScripts', 99, 1 );
if (!function_exists('itrScripts'))   {
    function itrScripts() { ?>
        <script async>
            ( function ( $ ) {
                
            }( jQuery ) );
        </script>
    <?php }
}