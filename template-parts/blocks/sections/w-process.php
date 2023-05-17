
<?php

/**
 * "Process" Block Template.
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
$className = 'w-process py-5';

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
    <div class="heading text-center mb-5">
            <?= ($top['tag']) ? '<span>'.$top['tag'].'</span>' : '' ?>
            <?= ($top['title']) ? '<h3>'.$top['title'].'</h3>' : '' ?>
            <?= ($top['subtitle']) ? '<p>'.$top['subtitle'].'</p>': '' ?>
    </div> 
    <?php if($list) : ?>
    <div class="item-container">
        <ul class="items">
            <?php foreach($list as $key=>$item) : ?>
            <li class="item">
                <div class="heading">
                    <?php if($key != 0) : ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="154" height="2" viewBox="0 0 154 2" fill="none" style="&#10;    fill: red;&#10;    stroke: red;&#10;">
                            <path d="M0.513672 1.1416H153.407" stroke="white" stroke-linecap="round" stroke-dasharray="2 4 6 2 4 6"/>
                        </svg>
                    <?php endif; ?>
                    <span><?= $key ?></span>
                </div>
                <div class="item-title">
                    <?php if($item['image']) : ?>
                        <img src="<?= esc_url($item['image']['url']) ?>" alt="<?= esc_attr($item['image']['alt']) ?>">
                    <?php endif; ?>
                    <br>
                    <?= ($item['name']) ? '<span>'.$item['name'].'</span>' : '' ?>
                    <div class="text-contet">
                        <?= ($item['detail'] ? $item['detail'] : '') ?>

                    </div>
                </div>
            </li>
            <?php endforeach; ?>
            
        </ul>
    </div>
    <?php endif; ?>
</section>
<?php 
add_action( 'wp_footer', 'processScripts', 99, 1 );
if (!function_exists('processScripts'))   {
    function processScripts() { ?>
        <script async>
            ( function ( $ ) {
                $(document).ready(function(){
                    var itemContainer = $('.item-container');
                    var items = $('.items');
                    
                    var dragging = false;
                    var startX, scrollLeft;
                    
                    itemContainer.on('mousedown', function(e){
                        dragging = true;
                        startX = e.pageX - itemContainer.offset().left;
                        scrollLeft = itemContainer.scrollLeft();
                    });
                    
                    itemContainer.on('mouseleave', function(){
                        dragging = false;
                    });
                    
                    itemContainer.on('mouseup', function(){
                        dragging = false;
                    });
                    
                    itemContainer.on('mousemove', function(e){
                        if(dragging){
                        var x = e.pageX - itemContainer.offset().left;
                        var walk = (x - startX) * 2;
                        itemContainer.scrollLeft(scrollLeft - walk);
                        }
                    });
                });
            }( jQuery ) );
        </script>
    <?php }
}