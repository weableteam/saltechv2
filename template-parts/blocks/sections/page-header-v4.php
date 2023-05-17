<?php

/**
 * "Page Header V4" Block Template.
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
$className = 'w-pageHeaderv4 py-5';

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
$slogan = get_field('slogan');
$name = get_field('name');
$role = get_field('role');

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="sidebar">
        <ul class="navigation">
            <li>
                <span>SEM</span>
                <span></span>
            </li>
            <li>
                <span>WEBSITE</span>
                <span></span>
            </li>
            <li>
                <span>BRANDING</span>
                <span></span>
            </li>
        </ul>
        <ul class="social">
            <li>
                <a href="#">
                    <i class="bi bi-instagram"></i>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="bi bi-twitter"></i>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="bi bi-facebook"></i>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="bi bi-tiktok"></i>
                </a>
            </li>
            <li>
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="48" viewBox="0 0 16 48" fill="none">
                        <path
                            d="M7.2929 47.7071C7.68342 48.0976 8.31658 48.0976 8.70711 47.7071L15.0711 41.3431C15.4616 40.9526 15.4616 40.3195 15.0711 39.9289C14.6805 39.5384 14.0474 39.5384 13.6569 39.9289L8 45.5858L2.34315 39.9289C1.95262 39.5384 1.31946 39.5384 0.928934 39.9289C0.53841 40.3195 0.53841 40.9526 0.928934 41.3431L7.2929 47.7071ZM7 4.37114e-08L7 47L9 47L9 -4.37114e-08L7 4.37114e-08Z"
                            fill="#989898" />
                    </svg>
                </a>
            </li>
        </ul>
    </div>
    <div class="container">
        <div class="title">
            <?= ($title) ? '<h1>'.$title.'</h1>' : '' ?>
            <div class="slogan">
                <?= ($slogan) ? '<p>'.$slogan.'</p>' : '' ?>
                <?= ($name) ? '<span class="name">'.$name.'</span>' : '' ?>
                <?= ($role) ? '<span>'.$role.'</span>' : '' ?>
            </div>
        </div>
    </div>
    <div class="slider-project">
        <div class="scroll">
            <ul class="list-images">
                <li class="items-images">
                    <div class="img-wrap">
                        <img src="https://source.unsplash.com/random/" alt="">
                        <span>Tên doanh nghiệp KH</span>
                    </div>

                </li>
                <li class="items-images">
                    <div class="img-wrap">
                        <img src="https://source.unsplash.com/random/1" alt="">
                        <span>Tên doanh nghiệp KH</span>
                    </div>
                </li>
                <li class="items-images">
                    <div class="img-wrap">
                        <img src="https://source.unsplash.com/random/2" alt="">
                        <span>Tên doanh nghiệp KH</span>
                    </div>
                </li>
                <li class="items-images">
                    <div class="img-wrap">
                        <img src="https://source.unsplash.com/random/3" alt="">
                        <span>Tên doanh nghiệp KH</span>
                    </div>
                </li>
            </ul>
        </div>
        <ul class="list-content">
            <li class="items-content">
                <div class="bgr">
                    <p>Munzi Electrical</p>
                    <ul class="sub-content">
                        <li>
                            <span>Vốn đầu tư 1Tr/Tháng</span>
                        </li>
                        <li>
                            <span>Vốn đầu tư 20Tr/Tháng</span>
                        </li>
                        <li>
                            <span>Vốn đầu tư 120Tr/Tháng</span>
                        </li>
                        <li class="sub-content">
                            <a href="#" class="view">
                                view
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="items-content">
                <div class="bgr">
                    <p>Munzi Electrical</p>
                    <ul class="sub-content">
                        <li>
                            <span>Vốn đầu tư 20Tr/Tháng</span>
                        </li>
                        <li>
                            <span>Vốn đầu tư 10Tr/Tháng</span>
                        </li>
                        <li>
                            <span>Vốn đầu tư 30Tr/Tháng</span>
                        </li>
                        <li class="sub-content">
                            <a href="#" class="view">
                                view
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="items-content">
                <div class="bgr">
                    <p>Munzi Electrical</p>
                    <ul class="sub-content">
                        <li>
                            <span>Vốn đầu tư 220Tr/Tháng</span>
                        </li>
                        <li>
                            <span>Vốn đầu tư 320Tr/Tháng</span>
                        </li>
                        <li>
                            <span>Vốn đầu tư 420Tr/Tháng</span>
                        </li>
                        <li class="sub-content">
                            <a href="#" class="view">
                                view
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="items-content">
                <div class="bgr">
                    <p>Munzi Electrical</p>
                    <ul class="sub-content">
                        <li>
                            <span>Vốn đầu tư 520Tr/Tháng</span>
                        </li>
                        <li>
                            <span>Vốn đầu tư 620Tr/Tháng</span>
                        </li>
                        <li>
                            <span>Vốn đầu tư 720Tr/Tháng</span>
                        </li>
                        <li class="sub-content">
                            <a href="#" class="view">
                                view
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</section>
<?php 
add_action( 'wp_footer', 'pageHeaderV4Scripts', 99, 1 );
if (!function_exists('pageHeaderV4Scripts'))   {
    function pageHeaderV4Scripts() { ?>
<script async>
(function($) {
    var $slider = $('.w-pageHeaderv4 .list-images');

    if ($slider.length) {
        var currentSlide;
        var slidesCount;
        var sliderCounter = document.createElement('div');
        sliderCounter.classList.add('slider__counter');

        var updateSliderCounter = function(slick, currentIndex) {
            currentSlide = slick.slickCurrentSlide() + 1;
            slidesCount = slick.slideCount;
            $(sliderCounter).html(`<span>${currentSlide}</span><strong>/</strong>${slidesCount}`)
        };

        $slider.on('init', function(event, slick) {
            $slider.append(sliderCounter);
            updateSliderCounter(slick);
        });

        $slider.on('afterChange', function(event, slick, currentSlide) {
            updateSliderCounter(slick, currentSlide);
        });

        $slider.slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.w-pageHeaderv4 .list-content',
            arrows: false,
            focusOnSelect: true,
            responsive: [{
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 541,
                    settings: {
                        slidesToShow: 1,
                    }
                }
            ]
        });

        $('.w-pageHeaderv4 .list-content').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            fade: true,
            asNavFor: '.w-pageHeaderv4 .list-images',
            arrows: true,
            prevArrow: '<button type="button" class="slick-prev"><i class="bi bi-chevron-left"></i></button>',
            nextArrow: '<button type="button" class="slick-next"><i class="bi bi-chevron-right"></i></button>',
        });
    }

}(jQuery));
</script>
<?php }
}