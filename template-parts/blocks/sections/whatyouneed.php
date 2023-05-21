<?php

/**
 * "What you need" Block Template.
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
$className = 'w-wyn';

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
$image = get_field('image');


?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container pb-5">
        <?php if($title) : ?>
            <h2 class="text-center"><?= $title ?></h2>
        <?php endif; ?>
        <div class="row align-items-center mb-5">
            <?php if($list) : ?>
            <div class="col-lg-6">
                <div class="content-texts">
                    <?php foreach($list as $item) : ?>
                    <div class="text">
                        <?= ($item['name']) ? '<h4>'.$item['name'].'</h4>' : ''  ?>
                        <?= ($item['detail']) ? '<p>'.$item['detail'].'</p>' : ''  ?>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>
            <div class="col-lg-6">
                <?php if($image) : ?>
                <div class="imgMain img-wrap">
                    <img src="<?=  esc_url($image['url']) ?>" alt="">
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php 
//add_action( 'wp_footer', 'wynScripts', 99, 1 );
if (!function_exists('wynScripts'))   {
    function wynScripts() { ?>
        <script async>
            ( function ( $ ) {
                
            }( jQuery ) );
        </script>
    <?php }
}