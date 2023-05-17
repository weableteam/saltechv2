<?php

/**
 * "Get In Touch" Block Template.
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
$className = 'w-getInTouch py-5';

if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$isFullWidth = false;
if( !empty($block['align']) ) {
    $isFullWidth = $block['align'] === 'full' ? true : false;
    $className .= ' align-' . $block['align'];
}

// Load values and assign defaults.
$quotes = get_field('quotes');
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <div class="col-12">
            <?php if($quotes) : ?>
            <div class="slideGetInTouch">
                <?php foreach($quotes as $item) : ?>
                <div class="item-slide">
                    <?php if($item['info']) : ?>
                    <div class="profile">
                        <?php if($item['info']['image']) : ?>
                            <div class="avatar"><img src="<?= esc_url($item['info']['image']['url']) ?>" class="img-fluid" alt="<?= esc_attr($item['info']['image']['alt']) ?>"></div>
                        <?php endif; ?>
                        <?= ($item['info']['name']) ? '<div class="name">'.$item['info']['name'].'</div>' : '' ?>
                        <?= ($item['info']['role']) ? '<p>'.$item['info']['role'].'</p>' : '' ?>
                    </div>
                    <?php endif; ?>
                    <div class="image"><img src="<?= get_stylesheet_directory_uri() . '/assets/images/Group 651.webp' ?>" class="img-fluid" alt=""></div>
                    <?php if($item['content']) : ?>
                    <div class="contentProfile">
                       <?= $item['content'] ?>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
            <div class="formGetInTouch">
                <div class="inputGetInTouch">
                    <div class="title">
                        <img src="<?= get_stylesheet_directory_uri() . '/assets/images/Group 653.webp' ?>" class="img-fluid" alt="">
                    </div>
                    <form action="">
                        <div class="form-group">
                            <input type="text" class="form-control" id="Input1" placeholder="Nhập ở đây">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="Input2" placeholder="Nhập ở đây">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="Input3" placeholder="Nhập ở đây">
                        </div>
                    </form>
                </div>
                <button type="submit" class="btn ">Send us  messenger</button>
            </div>
        </div>
    </div>
</section>
<?php 
add_action( 'wp_footer', 'getInTouchScripts', 99, 1 );
if (!function_exists('getInTouchScripts'))   {
    function getInTouchScripts() { ?>
<script async>
(function($) {
    $('.w-getInTouch .slideGetInTouch').slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow:
        '<button type="button" class="slick-prev "><img src="<?= get_stylesheet_directory_uri() . '/assets/images/leftDefault.svg' ?>" class="img-fluid" alt=""><img src="<?= get_stylesheet_directory_uri() . '/assets/images/left.svg' ?>" class="img-fluid d-none imgPrev" alt=""></button>',
        nextArrow:
        '<button type="button" class="slick-next "><img src="<?= get_stylesheet_directory_uri() . '/assets/images/rightDefault.svg' ?>" class="img-fluid" alt=""><img src="<?= get_stylesheet_directory_uri() . '/assets/images/rightt.svg' ?>" class="img-fluid d-none imgNext" alt=""></button>',
    });
    $(".w-getInTouch .formGetInTouch form .form-group").click(function( event ) {
        $(".form-group.click").removeClass('click')
        $(this).toggleClass( "click");
    });
}(jQuery));
</script>
<?php }
}