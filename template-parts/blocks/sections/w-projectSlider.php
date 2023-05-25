<?php

/**
 * "Project Slider" Block Template.
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
$className = 'w-pSLider';

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
<div class="w-pSlider">
    <div class="container">
        <div class="light"></div>
    </div>
            
    <div class="container">
        <div class="slider-head">
                <h3>các dự án nổi bật</h3>
                <a href="">
                    <button>Tất cả dự án</button>
                </a>
        </div>
    </div>       

    <div class="container p-0">
        <div class="slider-ct">
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
                 <a href="#" class="link-prj" project-id="<?= the_ID() ?>">
                    <div class="slider-items">
                        <div class="sl-img img-wrap">
                            <img src="<?= the_post_thumbnail_url(  ) ?>" alt="">
                        </div>
                        <div class="sl-inf">
                            <div class="sl-hover">
                                <i class="bi bi-arrow-right"></i>
                            </div>
                            <div class="sl-title">
                                <h4> <?= get_the_title( ) ?></h4>
                                <span><?= get_the_excerpt( ) ?></span>
                            </div>

                        </div>
                    </div>
                </a>
                  <?php
                }
              }
              wp_reset_postdata();?>
            </div>   
            <div class="slick-number" style="display: block;">
                <span class="active">01</span> / <span class="total"></span>
            </div>
    </div>
</div>
</section>



<?php 
add_action( 'wp_footer', 'pSLiderScripts', 99, 1 );
if (!function_exists('pSLiderScripts'))   {
    function pSLiderScripts() { ?>
<script async>
(function($) {
    var helpers = {
        addZeros: function (n) {
            return (n < 10) ? '0' + n : '' + n;
            }
        };
    
        function sliderInit() {
        var $slider = $('.w-pSlider .slider-ct');
        $slider.each(function() {
            var $sliderParent = $(this).parent();
            $(this).slick({
                slidesToShow: 3,
                // autoplay: true,
                speed: 300,
                prevArrow:
                    '<button type="button" class="slick-prev "><i class="bi bi-chevron-left"></i></button>',
                nextArrow:
                    '<button type="button" class="slick-next "><i class="bi bi-chevron-right"></i> </button>',
                responsive: [
                    {
                        breakpoint: 992,
                        settings: {
                            arrows: true,
                            centerMode: true,
                            centerPadding: '0px',
                            slidesToShow: 3
                            }
                    },
                    {
                        breakpoint: 541,
                        settings: {
                            arrows: true,
                            centerMode: true,
                            centerPadding: '40px',
                            slidesToShow: 1
                        }
                    }
                ],        
            });
            if ($(this).find('.slider-items').length > 1) {
            $(this).siblings('.slick-number').show();
            }
            $(this).on('afterChange', function(event, slick, currentSlide){
            $sliderParent.find('.slick-number .active').html(helpers.addZeros(currentSlide + 1));
            });
            var sliderItemsNum = $(this).find('.slick-slide').not('.slick-cloned').length;
            $sliderParent.find('.slick-number .total').html(helpers.addZeros(sliderItemsNum));
            });
        };
        sliderInit();



        
}(jQuery));
</script>
<?php }
}