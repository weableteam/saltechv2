<?php

/**
 * "Member SLider" Block Template.
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
$className = 'w-memberSlider';

if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$isFullWidth = false;
if( !empty($block['align']) ) {
    $isFullWidth = $block['align'] === 'full' ? true : false;
    $className .= ' align-' . $block['align'];
}

// Load values and assign defaults.
$member = get_field('member')
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <?php if($member) : ?>
    <div class="container">
        <ul class="list-content">
            <?php foreach($member as $item) : ?>
            <li class="items-content">
                <div class="info">
                    <?= ($item['name']) ? '<p class="name">'.$item['name'].'</p>' : '' ?>
                    <?= ($item['role']) ? '<span>'.$item['role'].'</span>' : '' ?>
                    <?= ($item['content']) ? '<p>'.$item['content'].'</p>' : '' ?>
                    <div class="dedication">
                        <?= ($item['tag']) ? '<span>'.$item['tag'].'</span>' : '' ?>
                        <?= ($item['title']) ? '<h2>'.$item['title'].'</h2>' : '' ?>
                    </div>
                </div>
                <?php if($item['main_image']) : ?>
                <div class="items-right">
                    <div class="img-wrap">
                        <img src="<?= esc_url($item['main_image']['url']) ?>" alt="">
                    </div>
                </div>
                <?php endif; ?>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <ul class="list-info">
        <?php foreach($member as $item) : ?>
        <li class="items-info">
            <?php if($item['thumb_image']) : ?>
                <img src="<?= esc_url($item['thumb_image']['url']) ?>" alt=""
                    class="img-fluid">
            <?php endif; ?>
            <?= ($item['name']) ? '<span>'.$item['name'].'</span>' : '' ?>
            <?= ($item['role']) ? '<span>'.$item['role'].'</span>' : '' ?>
        </li>
        
        <?php endforeach; ?>
    </ul>
    <?php endif; ?>
</section>
<?php 
add_action( 'wp_footer', 'memberSliderScripts', 99, 1 );
if (!function_exists('memberSliderScripts'))   {
    function memberSliderScripts() { ?>
<script async>
(function($) {
    $('.w-memberSlider .list-content').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        fade: true,
        asNavFor: '.w-memberSlider .list-info',
        prevArrow: '<button type="button" class="slick-prev"><i class="bi bi-chevron-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="bi bi-chevron-right"></i></button>',
    });
    $('.w-memberSlider .list-info').slick({
        slidesToShow: 7,
        slidesToScroll: 1,
        asNavFor: '.w-memberSlider .list-content',
        dots: false,
        centerMode: true,
        focusOnSelect: true,
        arrows: false,
        responsive: [{
                breakpoint: 992,
                settings: {
                    slidesToShow: 6
                }
            },
            {
                breakpoint: 541,
                settings: {
                    slidesToShow: 3
                }
            }
        ]
    });
    console.log($('.w-memberSlider .list-info .items-info').length )
    if(  $('.w-memberSlider .list-info .items-info').length < 7){
        console.log($('.w-memberSlider .list-info .slick-track'))
        $('.w-memberSlider .list-info .slick-track').css("transform", "unset")
    }
    // });  
}(jQuery));
</script>
<?php }
}