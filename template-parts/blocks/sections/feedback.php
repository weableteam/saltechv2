<?php

/**
 * "Feedback" Block Template.
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
$className = 'w-feedback py-5';

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
$list = get_field('list');

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="w-feedback">
        <div class="container">
            <?= ($title) ? '<h2>'.$title.'</h2>' : '' ?>
        </div>
        <?php if($list) : ?>
        <div class="container">
            <div class="feedback-slick">
                <?php foreach($list as $item) : ?>
                    <div class="slick-items">
                        <div class="items-inf">
                            <ul class="d-flex" style="padding-left:0">
                                <li><i class="bi bi-star"></i></li>
                                <li><i class="bi bi-star"></i></li>
                                <li><i class="bi bi-star"></i></li>
                                <li><i class="bi bi-star"></i></li>
                                <li><i class="bi bi-star"></i></li>
                            </ul>
                            <?= ($item['content']) ? '<p>'.$item['content'].'</p>' : '' ?>
                            <?= ($item['name']) ? '<h5>'.$item['name'].'</h5>' : '' ?>
                            <?= ($item['company']) ? '<span>'.$item['company'].'</span>' : '' ?>
                        </div>
                        <?php if($item['avatar']) : ?>
                        <div class="img-slick">
                            <img src="<?=  esc_url($item['avatar']['url']) ?>" alt="<?=  esc_attr($item['avatar']['alt']) ?>">
                        </div>
                        <?php endif; ?>
                        <div class="blur"></div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="slick-number" style="display: block;">
                <button type="button" class="slick-prev "><i class="bi bi-chevron-left"></i></button>
                    <span class="active">01</span> / <span class="total"></span>
                <button type="button" class="slick-next "><i class="bi bi-chevron-right"></i> </button>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>
<?php 
add_action( 'wp_footer', 'feedbackScripts', 99, 1 );
if (!function_exists('feedbackScripts'))   {
    function feedbackScripts() { ?>
<script async>
    (function($) {
        var helpers = {
            addZeros: function (n) {
                return (n < 10) ? '0' + n : '' + n;
                }
            };
        
            function sliderInit() {
            var $slider = $('.w-feedback .feedback-slick');
            $slider.each(function() {
                var $sliderParent = $(this).parent();
                $(this).slick({
                    centerMode: true,
                    centerPadding: '300px',
                    slidesToShow: 1,
                    // autoplay: true,
                    speed: 300,
                    prevArrow: $('.w-feedback .slick-prev'),
                    nextArrow: $('.w-feedback .slick-next'),
                    responsive: [
                        {
                            breakpoint: 992,
                            settings: {
                                arrows: true,
                                centerMode: true,
                                centerPadding: '40px',
                                slidesToShow: 2
                                }
                        },
                        {
                            breakpoint: 480,
                            settings: {
                                arrows: true,
                                centerMode: true,
                                centerPadding: '40px',
                                slidesToShow: 1
                            }
                        }
                    ],        
                });
                if ($(this).find('.slick-items').length > 1) {
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