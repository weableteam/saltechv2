<?php

/**
 * "Banner Hero" Block Template.
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
$className = 'w-hero';

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
$description = get_field('description');
$buttons = get_field('buttons');
$logos = get_field('list_tech_logos');
$hero_img = get_field('hero_image');
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 col-lg-5" data-sal="slide-right" data-sal-duration="300">
                <div class="content text-center text-md-left">
                    <h1>
                        <?= ($hide_text = $title['hide_text']) ? '<span class="d-none" title="weable">'.$hide_text.'</span>' : '' ?>
                        <?= ($normal_text = $title['normal_text']) ? $normal_text : '' ?>
                        <?= ($highlight_text = $title['highlight_text']) ? '<span class="text-gradient">'.$highlight_text.'</span>' : '' ?>
                        <?= ($normal_text_2 = $title['normal_text_2']) ? $normal_text_2 : '' ?>
                    </h1>

                    <?php if($description) : ?>
                    <span class="decs d-block mt-3 mt-lg-4"><?= $description ?></span>
                    <?php endif; ?>

                    <?php if($buttons) : ?>
                    <div class="btn-groups mt-3 mt-lg-4">
                        <?php foreach ($buttons as $btn) : ?>
                        <a href="<?= $btn['button']['url'] ?>" class="btn mr-3 <?= ($btn['outline_style']) ? 'btn-outline-danger' : 'btn-primary' ?>" target="<?= $btn['button']['target'] ?>">
                            <?= ($btn['icon']) ? $btn['icon'] : '' ?>
                            <?= esc_html($btn['button']['title']) ?>
                        </a>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </div>
                <?php if($logos) : ?>
                <div class="techs-slider mt-4">
                    <?php foreach ($logos as $logo) : ?>
                    <div class="logo shadow">
                        <img src="<?= esc_url($logo['logo']['url']) ?>" alt="<?= ($alt = $logo['logo']['alt']) ? esc_attr($alt) : '' ?>" title="<?= ($title = $logo['logo']['title']) ? esc_attr($title) : '' ?>" class="img-fluid rounded-circle">
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-md-6 col-lg-7" data-sal="slide-left" data-sal-duration="600">
                <?php if($hero_img) : ?>
                <div class="img position-relative">
                    <div class="gradient-blur"></div>
                    <img src="<?= esc_url($hero_img['url']) ?>" alt="<?= ($alt = $hero_img['alt']) ? esc_attr($alt) : '' ?>" title="<?= ($title = $hero_img['title']) ? esc_attr($title) : '' ?>" class="img-fluid">
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php 
if($logos) {
    add_action( 'wp_footer', 'tech_slider_setup', 99, 1 );
    if (!function_exists('tech_slider_setup'))   {
        function tech_slider_setup() { ?>
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
}