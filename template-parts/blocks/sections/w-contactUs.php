<?php

/**
 * "Contact Us" Block Template.
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
$className = 'w-contactUs';

if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$isFullWidth = false;
if( !empty($block['align']) ) {
    $isFullWidth = $block['align'] === 'full' ? true : false;
    $className .= ' align-' . $block['align'];
}

// Load values and assign defaults.
$link = get_field('link')
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="w-contactUs ">
        <?php if($link) : ?>
        <a href="<?= esc_url($link['url']) ?>" class="contact-main container">
            <div class="contact-left">
                <div class="left-hover"></div>
                <h1>
                    <?= esc_attr($link['title']) ?>
                </h1>
            </div>
            <div class="contact-right">
                <div class="right-style">
                    <i class="bi bi-arrow-right"></i>
                </div>
            </div>
        </a>
        <?php endif; ?>
    </div>
</section>
<?php 
//add_action( 'wp_footer', 'contactUsScripts', 99, 1 );
if (!function_exists('contactUsScripts'))   {
    function contactUsScripts() { ?>
        <script async>
            ( function ( $ ) {
                
            }( jQuery ) );
        </script>
    <?php }
}