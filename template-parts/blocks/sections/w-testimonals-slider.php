<?php

/**
 * "Testimonals Slider" Block Template.
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
$className = 'w-testimonalSlider';

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
$comments = get_field('comments');

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if($title) : ?>
                <div class="title">
                    <span><?= $title ?></span>
                    <!-- <span>Lý do vì sao các chủ doanh nghiệp </span>
                    <i class="bi bi-heart-fill"></i>
                    <span>Saltech</span> -->
                </div>
                <?php endif; ?>
                <?php if($comments) : ?>
                <div class="slides-numbers" style="display: block;">
                    <span class="active">01</span> / <span class="total"></span>
                </div>
                <div class="contentSlide">
                    <?php foreach($comments as $comment) : ?>
                    <div class="item">
                        <?php if($comment['content']) : ?>
                        <div class="slogan">
                            <?= $comment['content'] ?>
                        </div>
                        <?php endif; ?>
                        <?php if($comment['author']) : ?>
                        <div class="profile">
                            <?php if($comment['author']['avatar']) : ?>
                                <div class="img"><img src="<?= esc_url($comment['author']['avatar']['url']) ?>" alt="<?= esc_attr($comment['author']['avatar']['alt']) ?>" class="img-fluid" style="object-fit:cover;"></div>
                            <?php endif; ?>
                            <?= ($comment['author']['name']) ? '<h5>'.$comment['author']['name'].'</h5>' : '' ?>
                            <?= ($comment['author']['role']) ? '<p class="special" style=" color: #14313A;">'.$comment['author']['role'].'</p>' : '' ?>
                            <?= ($comment['author']['credit']) ? '<p class="source" style="color: rgba(20, 49, 58, 0.55);">'.$comment['author']['credit'].'</p>' : '' ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php 
add_action( 'wp_footer', 'testimonalsSliderScripts', 99, 1 );
if (!function_exists('testimonalsSliderScripts'))   {
    function testimonalsSliderScripts() { ?>
        <script async>
            ( function ( $ ) {
                var helpers = {
                    addZeros: function (n) {
                        return (n < 10) ? '0' + n : '' + n;
                    }
                };
                if($('.w-testimonalSlider .title span').html().includes('<br>')){
                const arr = $('.w-testimonalSlider .title span').html().split('<br>\n')
                let html = ""
                html += `<span>${arr[0]}</span>`  + '<i class="bi bi-heart-fill"></i>'  + `<span>${arr[1]}</span>`
                 $('.w-testimonalSlider .title').html(html)
                }
                function sliderInit() {
                var $slider = $('.w-testimonalSlider .contentSlide');
                $slider.each(function() {
                    var $sliderParent = $(this).parent();
                    $(this).slick({
                        dots: false,
                        infinite: true,
                        speed: 150,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        prevArrow:
                        '<button type="button" class="slick-prev "><i class="bi bi-arrow-left-circle"></i></button>',
                        nextArrow:
                        '<button type="button" class="slick-next "><i class="bi bi-arrow-right-circle"></i> </button>',
                    });
                    if ($(this).find('.item').length > 1) {
                    $(this).siblings('.slides-numbers').show();
                    }
                    $(this).on('afterChange', function(event, slick, currentSlide){
                    $sliderParent.find('.slides-numbers .active').html(helpers.addZeros(currentSlide + 1));
                    });
                    var sliderItemsNum = $(this).find('.slick-slide').not('.slick-cloned').length;
                    $sliderParent.find('.slides-numbers .total').html(helpers.addZeros(sliderItemsNum));
                    });
                };
                sliderInit();
            }( jQuery ) );
        </script>
    <?php }
}