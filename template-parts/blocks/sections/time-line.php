<?php

/**
 * "Timeline" Block Template.
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
$className = 'w-timeline ';

if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$isFullWidth = false;
if( !empty($block['align']) ) {
    $isFullWidth = $block['align'] === 'full' ? true : false;
    $className .= ' align-' . $block['align'];
}

// Load values and assign defaults.
$tag = get_field('tag');
$title = get_field('title');
$list_time = get_field('list_time');


?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="title">
                    <?= ($tag) ? '<span>'.$tag.'</span>' : '' ?>
                    <?= ($title) ? '<h3>'.$title.'</h3>' : '' ?>
                </div>
            </div>
        </div>
    </div>
    <?php if($list_time) : ?>
    <div class="slideTimeLine">
        <?php foreach($list_time as $item) : ?>
        <div class="item-carousel">
            <?= ($item['year']) ? '<span class="year">'.$item['year'].'</span>' : '' ?>
            <?php if($item['content']) : ?>
            <div class="content">
                <div class="pointer"></div>
                <?php foreach($item['content'] as $detail) : ?>
                    <?= ($detail['title']) ? '<h4 class="month">'.$detail['title'].'</h4>' : '' ?>
                    <?= ($detail['detail']) ? '<p>'.$detail['detail'].'</p>' : '' ?>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</section>
<?php 
add_action( 'wp_footer', 'timelineScripts', 99, 1 );
if (!function_exists('timelineScripts'))   {
    function timelineScripts() { ?>
<script async>
(function($) {
    $('.slideTimeLine').slick({
        infinite: false,
        arrows: true,
        dots: false,
        autoplay: false,
        speed: 1100,
        slidesToShow: 3,
        slidesToScroll: 1,
        prevArrow:
        '<button type="button" class="slick-prev "><img src="<?= get_stylesheet_directory_uri() . '/assets/images/leftDefault.svg' ?>" class="img-fluid" alt=""><img src="<?= get_stylesheet_directory_uri() . '/assets/images/left.svg' ?>" class="img-fluid d-none imgPrev" alt=""></button>',
        nextArrow:
        '<button type="button" class="slick-next "><img src="<?= get_stylesheet_directory_uri() . '/assets/images/rightDefault.svg' ?>" class="img-fluid" alt=""><img src="<?= get_stylesheet_directory_uri() . '/assets/images/rightt.svg' ?>" class="img-fluid d-none imgNext" alt=""></button>',
        responsive: [
        {
            breakpoint: 767,
            settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            }
        }]
    });  
    $(".w-timeline .slideTimeLine button").click(function( event ) {
        $("button.click").removeClass('click')
        $(this).toggleClass( "click");
    });
}
(jQuery));
</script>
<?php }
}