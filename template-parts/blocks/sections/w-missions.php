<?php

/**
 * "Missions" Block Template.
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
$className = 'w-ms';

if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$isFullWidth = false;
if( !empty($block['align']) ) {
    $isFullWidth = $block['align'] === 'full' ? true : false;
    $className .= ' align-' . $block['align'];
}

// Load values and assign defaults.
$content = get_field('content');
$image = get_field('image');

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <div class="row">
            <?php if($content) : ?>
            <div class="col-lg-7 col-md-12">
                <div class="mission-container">
                    <?php if($content['title']) : ?>
                    <div class="mission-heading-wrapper">
                        <h2 class="mission-heading"><?= $content['title'] ?></h2>
                    </div>
                    <?php endif; ?>
                    <div class="mission-content">
                        <?php if($content['content']) : ?>
                        <div class="mission-left">
                            <?= $content['content'] ?> 
                        </div>
                        <?php endif; ?>
                        <?php if($content['image']) : ?>
                        <div class="mission-right d-lg-block d-none">
                            <img class="img-fluid" src="<?= esc_url($content['image']['url']) ?>" alt="">
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php if($image) : ?>
            <div class="col-lg-5 col-md-12 people-mb">
                <div class="mision-people">
                   <img class="img-fluid" src="<?= esc_url($image['url']) ?>" alt="">
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php 
//add_action( 'wp_footer', 'msScripts', 99, 1 );
if (!function_exists('msScripts'))   {
    function msScripts() { ?>
<script async>
(function($) {

}(jQuery));
</script>
<?php }
}