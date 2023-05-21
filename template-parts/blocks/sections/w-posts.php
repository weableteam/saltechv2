<?php

/**
 * "Posts" Block Template.
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
$className = 'w-post';

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
        <div class="row">
            <div class="col-12">
                <div class="contentMain d-flex align-items-center justify-content-between mb-5">
                    <div class="title">
                        <h2>Nội dung mới nhất</h2>
                        <p>Để bạn hiểu rõ hơn về tầm quan trọng của các sản phẩm số và kinh doanh trên các nền tảng số.</p>
                    </div>
                    <a href="#" class="all">Tất cả bài viết</a>
                </div>
                <div class="contentSlide ">
                <?php
                        $args = array(
                            'post_type'      => 'post', // Loại bài viết là "post"
                            'category_name'  => 'goc-nhin', // Slug của chuyên mục "Góc nhìn"
                            'posts_per_page' => 5, // Số lượng bài viết muốn lấy (trong trường hợp này là 5)
                            'orderby'        => 'date', // Sắp xếp theo ngày đăng
                            'order'          => 'DESC' // Sắp xếp theo thứ tự giảm dần (mới nhất lên đầu)
                        );
                    
                    $query = new WP_Query($args);

                    if ($query->have_posts()) {
                        while ($query->have_posts()) {
                            $query->the_post();
                            ?>
                            <div class="item">
                                <a href="<?= the_permalink( ) ?>" class="imgMain img-wrap d-block">
                                    <img src="<?= get_the_post_thumbnail_url() ?>" alt="">
                                    <div class="iconBg"><i class="bi bi-arrow-right"></i></div>
                                </a>
                                <div class="hastag d-flex align-items-center justify-content-between my-3">
                                    <span><?= get_the_author( ) ?></span>
                                    <div class="links">
                                    <?php 
                                                    $categories = get_the_category();
                                                    foreach ($categories as $category) {
                                                        echo '<a href="#">#'.$category->name.'</a>';
                                                    }?>
                                    </div>
                                </div>
                                <h3><a href="<?= the_permalink( ) ?>"><?= get_the_title( ) ?></a></h3>
                            </div>

                            <?php
                        }
                        wp_reset_postdata();
                    }
                    ?>
                </div>
                <div class="slides-numbers" style="display: block;">
                    <button type="button" class="slick-prev "><i class="bi bi-chevron-left"></i></button>
                        <span class="active">01</span> / <span class="total"></span>
                    <button type="button" class="slick-next "><i class="bi bi-chevron-right"></i> </button>
                </div>
            </div>
        </div>
    </div>
</section>
<?php 
add_action( 'wp_footer', 'postsScripts', 99, 1 );
if (!function_exists('postsScripts'))   {
    function postsScripts() { ?>
        <script async>
            ( function ( $ ) {
                var helpers = {
                    addZeros: function (n) {
                        return (n < 10) ? '0' + n : '' + n;
                    }
                };
    
                function sliderInit() {
                var $slider = $('.w-post .contentSlide');
                $slider.each(function() {
                    var $sliderParent = $(this).parent();
                    $(this).slick({
                        dots: false,
                        infinite: true,
                        speed: 300,
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        prevArrow: $('.w-post .slick-prev'),
                        nextArrow: $('.w-post .slick-next'),
                        responsive: [
                            {
                            breakpoint: 767,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                            }},
                        ],
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