<?php

/**
 * "Activity" Block Template.
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
$className = 'w-act pageHiring';

if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$isFullWidth = false;
if( !empty($block['align']) ) {
    $isFullWidth = $block['align'] === 'full' ? true : false;
    $className .= ' align-' . $block['align'];
}

// Load values and assign defaults.
$activity = get_field('activity');
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="workHiring">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <?php if($activity['image']) : ?>
                <div class="col-lg-5">
                    <div class="img-wrap">
                        <img src="<?= esc_url($activity['image']['url']) ?>" alt="<?= esc_attr($activity['image']['alt']) ?>">
                    </div>
                </div>
                <?php endif; ?>
                <?php if($activity['content']) : ?>
                <div class="col-lg-6">
                    <?= ($activity['content']['title']) ? '<h2>'.$activity['content']['title'].'</h2>' : '' ?>
                    <?= ($activity['content']['content_1']) ? '<p class="textOne">'.$activity['content']['content_1'].'</p>' : '' ?>
                    <?php if($activity['content']['list']) : ?>
                    <ul class="list">
                        <?php foreach($activity['content']['list'] as $item) : ?>
                        <li>
                            <div class="icon"><i class="bi bi-check2"></i></div>
                            <?= ($item['detail']) ? '<p>'.$item['detail'].'</p>' : '' ?>
                            
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                    <?= ($activity['content']['content_2']) ? '<p class="textTwo">'.$activity['content']['content_2'].'</p>' : '' ?>
                </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</section>
<?php 
    add_action( 'wp_footer', 'activity_setup', 99, 1 );
    if (!function_exists('activity_setup'))   {
        function activity_setup() { ?>
            <script async>
                ( function ( $ ) {
                   
                }( jQuery ) );
            </script>
        <?php }
    }