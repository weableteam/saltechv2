<?php

/**
 * "Simple" Block Template.
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
$className = 'w-sp';

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
$content = get_field('content');
$list = get_field('list');


?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="w-sp">
        <div class="container">
            <div class="sp-header">
                <?= ($title) ? '<h2>'.$title.'</h2>' : '' ?>
                <?= ($content) ? '<p>'.$content.'</p>' : '' ?>
            </div>
            <?php if($list) : ?>
            <ul class="main-content"> 
                <?php foreach($list as $item) : ?>
                <li class="items">
                    <?php if($item['image']) : ?>
                    <div class="img-items img-wrap">
                        <img src="<?=  esc_url($item['image']['url']) ?>" alt="">
                    </div>
                    <?php endif; ?>
                    <?php if($item['content']) : ?>
                    <div class="title-items">
                        <p><?= $item['content'] ?> </p>
                    </div>
                    <?php endif; ?>
                </li>
                <?php endforeach; ?>
                <li class="items">
                    
                    <div class="title-items">
                        <div>
                            <img src="/wp-content/uploads/2023/05/Group-881.webp" alt="">
                        </div>
                        <p>Và thật nhiều những lợi ích khác khi bạn được tư vấn và hỗ trợ bởi các chuyên gia đầu ngành của chúng tôi...</p>
                    </div>
                </li>
            </ul>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php 
//add_action( 'wp_footer', 'spScripts', 99, 1 );
if (!function_exists('spScripts'))   {
    function spScripts() { ?>
        <script async>
            ( function ( $ ) {
                
            }( jQuery ) );
        </script>
    <?php }
}