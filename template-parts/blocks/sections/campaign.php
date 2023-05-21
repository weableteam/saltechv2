<?php

/**
 * "Campaign" Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'w-block-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'w-ca';

if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}

$isFullWidth = false;
if (!empty($block['align'])) {
    $isFullWidth = $block['align'] === 'full' ? true : false;
    $className .= ' align-' . $block['align'];
}

// Load values and assign defaults.
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <div class="campaign-container">
            <h2 class="campaign-heading">
                QUẢNG CÁO GOOGLE ADS RẤT ĐA DẠNG, HÃY CHỌN CHO MÌNH LOẠI CHIẾN DỊCH
                PHÙ HỢP NHẤT
            </h2>
            <h5 class="campaign-chose">
                HÃY CHỌN ĐỂ TÌM HIỂU CHIẾN DỊCH PHÙ HỢP VỚI BẠN.
            </h5>
            <div class="campaign-list">
                <div class="campaign-image">
                    <img src="http://localhost:10041/wp-content/uploads/2023/05/Group-848-2.webp" alt="" />
                </div>
                <div class="campaign-item-wrapper">
                    <div class="campaign-item">
                        <div class="campaign-text">
                            <a href="#">
                                <h6 class="campaign-text-title">Google tìm kiếm</h6>
                            </a>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
                                vel libero eget est aliquet convallis sed in nunc. In sed fa
                            </p>
                        </div>
                        <img src="http://localhost:10041/wp-content/uploads/2023/05/manage_search.webp" alt="" class="campaign-icon" />
                        <a href="#" class="campaign-next">
                            <img src="http://localhost:10041/wp-content/uploads/2023/05/Group-871-2.webp" alt="">
                        </a>
                    </div>
                    <div class="campaign-item">
                        <div class="campaign-text">
                            <a href="#">
                                <h6 class="campaign-text-title">Google tìm kiếm</h6>
                            </a>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
                                vel libero eget est aliquet convallis sed in nunc. In sed fa
                            </p>
                        </div>
                        <img src="http://localhost:10041/wp-content/uploads/2023/05/manage_search.webp" alt="" class="campaign-icon" />
                        <a href="#" class="campaign-next">
                            <img src="http://localhost:10041/wp-content/uploads/2023/05/Group-871-2.webp" alt="">
                        </a>
                    </div>
                    <div class="campaign-item">
                        <div class="campaign-text">
                            <a href="#">
                                <h6 class="campaign-text-title abc">Google tìm kiếm</h6>
                            </a>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
                                vel libero eget est aliquet convallis sed in nunc. In sed fa
                            </p>
                        </div>
                        <img src="http://localhost:10041/wp-content/uploads/2023/05/manage_search.webp" alt="" class="campaign-icon" />
                        <a href="#" class="campaign-next">
                            <img src="http://localhost:10041/wp-content/uploads/2023/05/Group-871-2.webp" alt="">
                        </a>
                    </div>
                    <div class="campaign-item">
                        <div class="campaign-text">
                            <a href="#">
                                <h6 class="campaign-text-title">Google tìm kiếm</h6>
                            </a>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
                                vel libero eget est aliquet convallis sed in nunc. In sed fa
                            </p>
                        </div>
                        <img src="http://localhost:10041/wp-content/uploads/2023/05/manage_search.webp" alt="" class="campaign-icon" />
                        <a href="#" class="campaign-next">
                            <img src="http://localhost:10041/wp-content/uploads/2023/05/Group-871-2.webp" alt="">
                        </a>
                    </div>
                    <div class="campaign-item">
                        <div class="campaign-text">
                            <a href="#">
                                <h6 class="campaign-text-title abc">Google tìm kiếm</h6>
                            </a>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
                                vel libero eget est aliquet convallis sed in nunc. In sed fa
                            </p>
                        </div>
                        <img src="http://localhost:10041/wp-content/uploads/2023/05/manage_search.webp" alt="" class="campaign-icon" />
                        <a href="#" class="campaign-next">
                            <img src="http://localhost:10041/wp-content/uploads/2023/05/Group-871-2.webp" alt="">
                        </a>
                    </div>
                    <div class="campaign-item">
                        <div class="campaign-text">
                            <a href="#">
                                <h6 class="campaign-text-title">Google tìm kiếm</h6>
                            </a>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
                                vel libero eget est aliquet convallis sed in nunc. In sed fa
                            </p>
                        </div>
                        <img src="http://localhost:10041/wp-content/uploads/2023/05/manage_search.webp" alt="" class="campaign-icon" />
                        <a href="#" class="campaign-next">
                            <img src="http://localhost:10041/wp-content/uploads/2023/05/Group-871-2.webp" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
//add_action( 'wp_footer', 'caScripts', 99, 1 );
if (!function_exists('caScripts')) {
    function caScripts()
    { ?>
        <script async>
            (function($) {

            }(jQuery));
        </script>
<?php }
}
