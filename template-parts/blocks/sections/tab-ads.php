<?php

/**
 * "Tab Ads" Block Template.
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
$className = 'w-ta';

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
$subtitle = get_field('subtitle');
$content = get_field('content');
$list = get_field('list');
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title text-center">
                    <?= ($title) ? '<h6>'.$title.'</h6>' : '' ?>
                    <?= ($subtitle) ? '<h2>'.$subtitle.'</h2>' : '' ?>
                    <?= ($content) ? '<p>'.$content.'</p>' : '' ?>
                </div>
                <?php if($list) : ?>
                    <div class="btn-boxx">
                        <?php foreach($list as $key=>$item) : ?>
                            <button class="btn <?= ($key == 0) ? 'isActive' : '' ?>" type="button" id="button<?=$key + 1?>"><?= ($item['name']) ? $item['name'] : '' ?></button>
                        <?php endforeach; ?>

                    </div>
                    <div class="slideBoxx">
                        <?php foreach($list as $key=>$item) : ?>
                        <div class="item-boxx before0<?= $key+1 ?>">
                            <div class="row align-items-center flex-lg-row flex-column-reverse">
                                <div class="col-lg-6 ">
                                    <div class="content-boxx title">
                                        <?= ($item['title']) ? '<h2>'.$item['title'].'</h2>' : '' ?>
                                        <?= ($item['detail']) ? '<p>'.$item['detail'].'</p>' : '' ?>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3 mb-lg-0">
                                    <?php if($item['image']) : ?>
                                    <div class="img-boxx img-wrap">
                                        <img src="<?= esc_url($item['image']['url']) ?>" alt="">
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php 
add_action( 'wp_footer', 'taScripts', 99, 1 );
if (!function_exists('taScripts'))   {
    function taScripts() { ?>
        <script async>
            ( function ( $ ) {
                const slider = $(".w-ta .slideBoxx");

                $("#button1").click(function () {
                    slider.slick("slickGoTo", 0);
                    $(this).toggleClass("isActive");
                    $("#button2, #button3 ,#button4").removeClass("isActive");
                });

                $("#button2").click(function () {
                    slider.slick("slickGoTo", 1);
                    $(this).toggleClass("isActive");
                    $("#button1, #button3 ,#button4").removeClass("isActive");
                });

                $("#button3").click(function () {
                    slider.slick("slickGoTo", 2);
                    $(this).toggleClass("isActive");
                    $("#button1, #button2, #button4").removeClass("isActive");
                });

                $("#button4").click(function () {
                    slider.slick("slickGoTo", 3);
                    $(this).toggleClass("isActive");
                    $("#button1, #button2 ,#button3").removeClass("isActive");
                });
                $('.w-ta .slideBoxx').slick({
                    dots: false,
                    arrows: false,
                    infinite: false,
                    speed: 300,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    adaptiveHeight: true,
                });
            }( jQuery ) );
        </script>
    <?php }
}