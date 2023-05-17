<?php

/**
 * "Achievement Block Template.
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
$className = 'w-achieve';

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
$archives = get_field('archives');

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
     <!-- Archievement -->
     <div class="archievement container">
        <?= ($title) ? '<h2>'.$title.'</h2>' : '' ?>
        <?php if($archives) : ?>
       <div class="row">
            <?php foreach($archives as $item) : ?>
            <div class="col-4">
                <div class="archi-list">
                    <?php if($item['top']) : ?>
                    <div class="archi-list_content">
                        <?= ($item['top']['number']) ? '<h3>'.$item['top']['number'].'</h3>' : '' ?>
                        <?php if($item['top']['icon']) : ?>
                            <img src="<?= esc_url($item['top']['icon']['url']) ?>" alt="<?= esc_attr($item['top']['icon']['alt']) ?>">
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                    <?= ($item['content']) ? $item['content'] : '' ?>
                </div>
            </div>
            <?php endforeach; ?>
       </div>
       <?php endif; ?>
    </div>
</section>
<?php 
//add_action( 'wp_footer', 'achievementsScripts', 99, 1 );
if (!function_exists('achievementsScripts'))   {
    function achievementsScripts() { ?>
        <script async>
            ( function ( $ ) {
                
            }( jQuery ) );
        </script>
    <?php }
}