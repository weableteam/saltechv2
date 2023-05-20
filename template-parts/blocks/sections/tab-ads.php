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
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title text-center">
                    <h6>ÍCH LỢI TO LỚN</h6>
                    <h2>TĂNG DOANH SỐ NHANH CHÓNG VỚI QUẢNG CÁO GOOGLE ADS CHẤT LƯỢNG CAO!</h2>
                    <p>Saltech tin tưởng rằng, bất cứ khách hàng nào khi lựa chọn đối tác đều có quyền nhận được sản phẩm, dịch vụ chất lượng, chế độ chăm sóc đặc biệt và sự hài lòng trước, trong và sau khi sử dụng.</p>
                </div>

                <div class="btn-boxx">
                    <button class="btn isActive" type="button" id="button1">TIẾP CẬN<br>NHANH CHÓNG</button>
                    <button class="btn" type="button" id="button2">GIA TĂNG<br>ĐÁNG KỂ</button>
                    <button class="btn" type="button" id="button3">TĂNG TRƯỞNG<br>DOANH THU</button>
                    <button class="btn" type="button" id="button4">CHI PHÍ<br>HỢP LÝ</button>
                </div>

                <div class="slideBoxx">
                    <div class="item-boxx before01">
                        <div class="row align-items-center flex-lg-row flex-column-reverse">
                            <div class="col-lg-6 ">
                                <div class="content-boxx title">
                                    <h2>TIẾP CẬN NHANH KHÁCH HÀNG CÓ NHU CẦU</h2>
                                    <p>Với Google Ads, bạn có thể đưa sản phẩm hoặc dịch vụ của mình trực tiếp đến tay khách hàng tiềm năng khi họ đang tìm kiếm trên Google search hay một lượng khách hàng khổng lồ qua Youtube/GDN.</p>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3 mb-lg-0">
                                <div class="img-boxx img-wrap">
                                    <img src="<?=  get_stylesheet_directory_uri() . '/assets/images/image 23.webp' ?>" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item-boxx before02">
                        <div class="row align-items-center flex-lg-row flex-column-reverse">
                            <div class="col-lg-6 ">
                                <div class="content-boxx title">
                                    <h2>TĂNG SỐ LƯỢNG KHÁCH HÀNG BIẾT ĐẾN SẢN PHẨM/DỊCH VỤ CỦA BẠN</h2>
                                    <p>Google Ads giúp cho khách hàng tiềm năng tìm thấy sản phẩm hoặc dịch vụ của bạn một cách nhanh chóng. Từ đó, website/kênh của bạn tăng trưởng số lượng khách hàng ghé thăm 1 cách đáng kể.</p>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3 mb-lg-0">
                                <div class="img-boxx img-wrap">
                                    <img src="<?=  get_stylesheet_directory_uri() . '/assets/images/image 23 (1).webp' ?>" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item-boxx before03">
                        <div class="row align-items-center flex-lg-row flex-column-reverse">
                            <div class="col-lg-6 ">
                                <div class="content-boxx title">
                                    <h2>TĂNG TRƯỞNG DOANH THU BÁN HÀNG</h2>
                                    <p>Google Ads là một phương pháp quảng cáo trực tuyến hiệu quả và được đánh giá cao bởi các chuyên gia về quảng cáo. Nó giúp tăng doanh số, tăng khả năng nhận diện thương hiệu và tiếp cận khách hàng tiềm năng một cách nhanh chóng và hiệu quả. </p>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3 mb-lg-0">
                                <div class="img-boxx img-wrap">
                                    <img src="<?=  get_stylesheet_directory_uri() . '/assets/images/image 23 (2).webp' ?>" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item-boxx before04">
                        <div class="row align-items-center flex-lg-row flex-column-reverse">
                            <div class="col-lg-6 ">
                                <div class="content-boxx title">
                                    <h2>CHI PHÍ HỢP LÝ <br> Cần có với gì đó cho cân bằng</h2>
                                    <p>Dịch vụ quảng cáo Google của chúng tôi được thiết kế và quản lý bởi các chuyên gia về quảng cáo trực tuyến. Điều này đảm bảo rằng quảng cáo của bạn sẽ được tối ưu hóa một cách chuyên nghiệp để đạt được kết quả tốt nhất.</p>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3 mb-lg-0">
                                <div class="img-boxx img-wrap">
                                    <img src="<?=  get_stylesheet_directory_uri() . '/assets/images/image 23 (3).webp' ?>" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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