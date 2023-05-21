<?php

/**
 * "Special Design" Block Template.
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
$className = 'w-specialDesign py-5';

if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$isFullWidth = false;
if( !empty($block['align']) ) {
    $isFullWidth = $block['align'] === 'full' ? true : false;
    $className .= ' align-' . $block['align'];
}

// Load values and assign defaults.
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <h2 class="title">CÁC DỰ ÁN THIẾT KẾ WEBSITE NỔI BẬT</h2>
        <ul class="list-bestProject">
        <?php 
            $args = array(
                'post_type' => 'du-an',
                'post_status' => 'publish',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'linh-vuc-du-an',
                        'field' => 'slug',
                        'key' => 'specials', // Tên của trường checkbox
                        'terms' => 'website',
                        'value' => '1', // Giá trị của trường checkbox khi được chọn
                        'compare' => '=', // So sánh bằng
                        'type' => 'NUMERIC', // Kiểu dữ liệu của trường checkbox
                    ),
                ),
                'posts_per_page' => -1
              );
              
              $query = new WP_Query($args);
              
              if ($query->have_posts()) {
                while ($query->have_posts()) {
                  $query->the_post();
                  $post_id = get_the_ID();
                  $name = get_field('name_cty', $post_id);
                  $special = get_field('specials', $post_id);

                  ?>
                  <?php if($special) : ?>
                    <li class="items-bestProject">
                        <div class="content">
                            <div class="investors">
                                <h4><?= get_the_title( ) ?></h4>
                                <p>Chủ đầu tư: <?= $name ?></p>
                                <?php if(get_field('logo',$post_id)) : ?>
                                <div class="logo">
                                    <img src="<?= esc_url(get_field('logo',$post_id)['url']) ?>" alt=""
                                        class="img-fluid">
                                </div>
                                <?php endif; ?>
                            </div>  
                            <?= get_field('desc',$post_id) ?>
                        </div>
                        <div class="images img-wrap">
                            <img src="<?= get_the_post_thumbnail_url() ?>" alt="">
                        </div>
                    </li>
                 <?php endif;  ?>
                  <?php
                }
              }
              wp_reset_postdata();?>
        </ul>
        <ul class="list-projectDone">
            <li class="items-projectDone">
            <?php 
            $args = array(
                'post_type' => 'du-an',
                'post_status' => 'publish',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'linh-vuc-du-an',
                        'field' => 'slug',
                        'terms' => 'website',
                    ),
                ),
                'posts_per_page' => -1
              );
              
              $query = new WP_Query($args);
              
              if ($query->have_posts()) {
                while ($query->have_posts()) {
                  $query->the_post();?>
                <a href="#"  class="bgr  link-prj" project-id="<?= the_ID() ?>">
                    <div class="images img-wrap">
                        <img src="<?= the_post_thumbnail_url(  ) ?>" alt="">
                    </div>
                    <div class="project">
                        <div class="content">
                            <h4> <?= get_the_title( ) ?></h4>
                            <span><?= get_the_excerpt( ) ?></span>
                        </div>
                        <div class="icon">
                            <i class="bi bi-arrow-right"></i>
                        </div>
                    </div>
                </a>
                  <?php
                }
              }
              wp_reset_postdata();?>
            </li>
        </ul>
    </div>
</section>
<?php 
add_action( 'wp_footer', 'specialDesignScripts', 99, 1 );
if (!function_exists('specialDesignScripts'))   {
    function specialDesignScripts() { ?>
<script async>
(function($) {
    $('.w-specialDesign .list-bestProject').slick({
        infinity: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: '<button type="button" class="slick-prev"><img src="<?= get_stylesheet_directory_uri() . '/assets/images/Frame 758.webp' ?>" alt=""></button>',
        nextArrow: '<button type="button" class="slick-next"><img src="<?= get_stylesheet_directory_uri() . '/assets/images/Frame 757.webp' ?>" alt=""></button>',
    });
    var $slider = $('ul.list-projectDone li');

    if ($slider.length) {
        var currentSlide;
        var slidesCount;
        var sliderCounter = document.createElement('div');
        sliderCounter.classList.add('slider__counter');

        var updateSliderCounter = function(slick, currentIndex) {
            currentSlide = slick.slickCurrentSlide() + 1;
            slidesCount = slick.slideCount;
            $(sliderCounter).text(currentSlide + '/' + slidesCount)
        };

        $slider.on('init', function(event, slick) {
            $slider.append(sliderCounter);
            updateSliderCounter(slick);
        });

        $slider.on('afterChange', function(event, slick, currentSlide) {
            updateSliderCounter(slick, currentSlide);
        });

        $slider.slick({
            infinity: true,
            slidesToShow: 2,
            rows: 2,
            slidesToScroll: 1,
            arrows: true,
            prevArrow: '<button type="button" class="slick-prev slick-icon"><i class="bi bi-chevron-left"></i></button>',
            nextArrow: '<button type="button" class="slick-next slick-icon"><i class="bi bi-chevron-right"></i></button>',
        });
    }
}(jQuery));
</script>
<?php }
}