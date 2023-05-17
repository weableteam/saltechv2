<?php

/**
 * "Textbox Image" Block Template.
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
$className = 'w-textbox-img ';

if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$isFullWidth = false;
if( !empty($block['align']) ) {
    $isFullWidth = $block['align'] === 'full' ? true : false;
    $className .= ' align-' . $block['align'];
}

// Load values and assign defaults.
$image = get_field('image');
$content = get_field('content');

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <!-- textbox img -->
    <div class="text-center">
        <div class="text-center_container container">
            <!-- left -->
            <?php if($image) : ?>
            <div class="text-center_left">
                <div class="text-left_img">
                    <img src="<?=  esc_url($image['url']) ?>" alt="<?=  esc_attr($image['alt']) ?>">
                </div>
            </div> 
            <?php endif; ?>
            <!-- right -->
            <?php if($content) : ?>
            <div class="text-center_right">
                <?= ($content['title']) ? '<h3>'.$content['title'].'</h3>' : '' ?>
                <?= ($content['subtitle']) ? '<p>'.$content['subtitle'].'</p>' : '' ?>
                <?php if($content['desc']) : ?>
                <ul>
                    <?php foreach($content['desc'] as $item) : ?>
                    <li class="text-right_list">
                        <span><i class="bi bi-check2"></i></span>
                        <?= ($item['detail']) ? '<p>'.$item['detail'].'</p>' : '' ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>

   
</section>
<?php 


// code js 
add_action( 'wp_footer', 'textboximageScripts', 99, 1 );
if (!function_exists('textboximageScripts'))   {
    function textboximageScripts() { ?>
        <script async>
            ( function ( $ ) {
                




            }( jQuery ) );
        </script>
    <?php }
}