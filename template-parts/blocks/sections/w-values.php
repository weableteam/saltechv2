<?php

/**
 * "Values" Block Template.
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
$className = 'w-vl py-lg-5 py-3';

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
        <p class="w-vl-p_title">
            <?= $title ?>
        </p>
        <?php endif; ?>
        <?php if($list) : ?>
        <div class="w-vl-content-box" style="background-image: url('<?=  get_stylesheet_directory_uri() . '/assets/images/br_w_vl.png' ?>')" >
            <div class="row">
                <?php foreach($list as $item) : ?>
                <div class="col-lg-4">
                    <div class="w-vl-item active text-center">
                        <?php if($item['image']) : ?>
                            <img src="<?= esc_url( $item['image']['url']) ?>" class="icon-item_img" alt="">
                        <?php endif; ?>
                        <?php if($item['name']) : ?>
                        <h4 class="w-vl-h4-title">
                            <?= $item['name'] ?>
                        </h4>
                        <?php endif; ?>
                        <?= ($item['content']) ? $item['content'] : '' ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>
<?php 
//add_action( 'wp_footer', 'vlScripts', 99, 1 );
if (!function_exists('vlScripts'))   {
    function vlScripts() { ?>
        <script async>
            ( function ( $ ) {
                
            }( jQuery ) );
        </script>
    <?php }
}