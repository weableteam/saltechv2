<?php

/**
 * "Box Service" Block Template.
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
$className = 'w-boxService';

if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$isFullWidth = false;
if( !empty($block['align']) ) {
    $isFullWidth = $block['align'] === 'full' ? true : false;
    $className .= ' align-' . $block['align'];
}

// Load values and assign defaults.
$subtitle = get_field('subtitle');
$title = get_field('title');
$list = get_field('list');
$bottom = get_field('bottom');



?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="w-boxService container">
        <div class="boxService-head">
            <?= ($subtitle) ? '<p>'.$subtitle.'</p>' : '' ?>
            <?= ($title) ? '<h3>'.$title.'</h3>' : '' ?>
        </div>

        <?php if($list) : ?>
        <div class="boxService-ct" style="padding-left:0">
            <?php foreach($list as $item) : ?>
            <a href="<?= esc_url($item['link']['url']) ?>" class="boxService-items">  
                <?php if($item['image']) : ?>
                <div class="items-img">
                    <img src="<?=  esc_url($item['image']['url']) ?>" alt="<?=  esc_attr($item['image']['alt']) ?>">
                </div>
                <?php endif; ?>
                <div class="items-title">
                     <?= ($item['name']) ? '<div class="fake-h5">'.$item['name'].'</div>' : '' ?>
                    <div class="items-title_icon">
                        <img src="<?=  get_stylesheet_directory_uri() . '/assets/images/member-vt.webp' ?>" alt="">
                    </div>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
        
        <div class="boxService-foot">
            <?= ($bottom['title']) ? '<p class="container">'.$bottom['title'].'</p>' : '' ?>
            
            <?php if($bottom['list']) : ?>
            <ul class="container">
                <?php foreach($bottom['list'] as $image) : ?>
                    <li>
                        <?php if($image['image']) : ?>
                            <img src="<?=  esc_url($image['image']['url']) ?>" alt="<?=  esc_attr($image['image']['alt']) ?>">
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php 
    // add_action( 'wp_footer', 'boxServiceScripts', 99, 1 );
    if (!function_exists('boxServiceScripts'))   {
        function boxServiceScripts() { ?>
            <script async>
                ( function ( $ ) {
                    $('.techs-slider').slick({
                        speed: 5000,
                        autoplay: true,
                        autoplaySpeed: 0,
                        centerMode: true,
                        cssEase: 'linear',
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        variableWidth: true,
                        infinite: true,
                        initialSlide: 1,
                        arrows: false,
                        buttons: false,
                        loop: true
                    });
                }( jQuery ) );
            </script>
        <?php }
    }