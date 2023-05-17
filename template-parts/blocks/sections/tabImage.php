<?php

/**
 * "Tab Image" Block Template.
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
$className = 'w-tabImage py-5';

if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$isFullWidth = false;
if( !empty($block['align']) ) {
    $isFullWidth = $block['align'] === 'full' ? true : false;
    $className .= ' align-' . $block['align'];
}

// Load values and assign defaults.
$subtitle = get_field('subtitle');
$title = get_field('title');
$list = get_field('list');


?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <div class="title">
            <div class="content">
                <?= ($subtitle) ? '<p>'.$subtitle.'</p>' : '' ?>
                <?= ($title) ? '<h3>'.$title.'</h3>' : '' ?>
            </div>
            <a href="/full-project" class="seeall">Xem tất cả</a>
        </div>
        <?php if($list) : ?>
        <div class="row align-items-center">
            <div class="col-12 col-md-6">
                <ul class="nav-pills">
                    <?php foreach($list as $item) :
                        $post_object = $item['project'];
                        if ($post_object) {
                            $post = $post_object;
                            $post_id = $post_object->ID;
                            setup_postdata($post);
                            $titlepost = get_the_title($post);
                        }
                        ?>
                    <li class="nav-link">
                        <div class="number">
                            <?php if($item['image_number']) :  ?>
                            <img src="<?= esc_url($item['image_number']['url']) ?>" alt=""
                                class="img-fluid">
                            <?php endif; ?>
                            <?php if($item['image_number_hover']) :  ?>
                            <img src="<?= esc_url($item['image_number_hover']['url']) ?>" alt=""
                                class="img-fluid">
                            <?php endif; ?>

                        </div>
                        <div class="content">
                            <div class="desc">
                                <span>Logo - Nhận diện</span>
                               <a  href="#" class="link-prj" project-id="<?= $post_id  ?>">
                                    Xem chi tiết dự án
                                    <img src="<?= get_stylesheet_directory_uri() . '/assets/images/Vector (5).webp' ?>"
                                        alt="" class="img-fluid">
                               </a >
                            </div>
                            <h4><?= $titlepost ?></h4>
                        </div>
                    </li>
                    <?php 
                            wp_reset_postdata();
                endforeach; ?>
                </ul>
            </div>
            <div class="col-12 col-md-6">
                <ul class="tab-content">
                    <?php foreach($list as $key=>$item) : ?>
                    <li class="tab-pane <?= ($key==0) ? 'show active' : '' ?> ">
                        <?php if($item['main_image']) : ?>
                        <a href="#" class="img-wrap">
                            <img src="<?= esc_url($item['main_image']['url']) ?>"
                                alt="">
                        </a>
                        <?php endif; ?>
                    </li>
                    <?php endforeach; ?>
                    <li class="tab-pane">
                        <a href="#" class="img-wrap">
                            <img src="<?= get_stylesheet_directory_uri() . '/assets/images/gia-trinh-logo-1 4.webp' ?>"
                                alt="">
                        </a>
                    </li>
                    <li class="tab-pane">
                        <a href="#" class="img-wrap">
                            <img src="<?= get_stylesheet_directory_uri() . '/assets/images/gia-trinh-logo-1 1.webp' ?>"
                                alt="">
                        </a>
                    </li>
                    <li class="tab-pane">
                        <a href="#" class="img-wrap">
                            <img src="<?= get_stylesheet_directory_uri() . '/assets/images/gia-trinh-logo-1 4.webp' ?>"
                                alt="">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>
<?php 
add_action( 'wp_footer', 'tabImageScripts', 99, 1 );
if (!function_exists('tabImageScripts'))   {
    function tabImageScripts() { ?>
<script async>
(function($) {
    $('.w-tabImage .nav-pills').slick({
        vertical: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.w-tabImage .tab-content',
        arrows: false,
        focusOnSelect: true,

    });

    $('.w-tabImage .tab-content').slick({
        vertical: true,
        verticalSwiping: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        asNavFor: '.w-tabImage .nav-pills',
        dots: false,
        arrows: false,
    });
}(jQuery));
</script>
<?php }
}