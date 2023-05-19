<?php

/**
 * "Simple" Block Template.
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
$className = 'w-sp';

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
    <div class="w-sp">
        <div class="container">
            <div class="sp-header">
                <h2>
                TẤT CẢ NHƯNG THỨ PHỨC TẠP SẼ TRỞ NÊN ĐƠN GIẢN KHI BẠN TÌM ĐẾN VỚI SALTECH
                </h2>
                <p>
                    Chúng tôi không chỉ đơn vị cung cấp quảng cáo, chúng tôi là những người có năng lực nghiên cứu, xây dựng, lập kế hoạch, tư vấn và thực thi chiến dịch quảng cáo Google Ads cho từng mô hình và quy mô doanh nghiệp.
                </p> 
            </div>
            
            <ul class="main-content"> 
                <li class="items">
                    <div class="img-items img-wrap">
                        <img src="<?=  get_stylesheet_directory_uri() . '/assets/images/simple1.webp' ?>" alt="">
                    </div>
                    <div class="title-items">
                        <p>Saltech luôn đảm bảo cho bạn thiết lập mức ngân sách hợp lý.</p>
                    </div>
                </li>
                <li class="items">
                    <div class="img-items img-wrap">
                        <img src="<?=  get_stylesheet_directory_uri() . '/assets/images/simple2.webp' ?>" alt="">
                    </div>
                    <div class="title-items">
                        <p>Saltech luôn đảm bảo cho bạn thiết lập mức ngân sách hợp lý.</p>
                    </div>
                </li>
                <li class="items">
                    <div class="img-items img-wrap">
                        <img src="<?=  get_stylesheet_directory_uri() . '/assets/images/simple3.webp' ?>" alt="">
                    </div>
                    <div class="title-items">
                        <p>Saltech luôn đảm bảo cho bạn thiết lập mức ngân sách hợp lý.</p>
                    </div>
                </li>
                <li class="items">
                    <div class="img-items img-wrap">
                        <img src="<?=  get_stylesheet_directory_uri() . '/assets/images/simple1.webp' ?>" alt="">
                    </div>
                    <div class="title-items">
                        <p>Saltech luôn đảm bảo cho bạn thiết lập mức ngân sách hợp lý.</p>
                    </div>
                </li>
                <li class="items">
                    <div class="img-items img-wrap">
                        <img src="<?=  get_stylesheet_directory_uri() . '/assets/images/simple3.webp' ?>" alt="">
                    </div>
                    <div class="title-items">
                        <p>Saltech luôn đảm bảo cho bạn thiết lập mức ngân sách hợp lý.</p>
                    </div>
                </li>
                <li class="items">
                    
                    <div class="title-items">
                        <div>
                            <img src="http://saltechv2.local/wp-content/uploads/2023/05/Group-881.webp" alt="">
                        </div>
                        <p>Và thật nhiều những lợi ích khác khi bạn được tư vấn và hỗ trợ bởi các chuyên gia đầu ngành của chúng tôi...</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</section>
<?php 
//add_action( 'wp_footer', 'spScripts', 99, 1 );
if (!function_exists('spScripts'))   {
    function spScripts() { ?>
        <script async>
            ( function ( $ ) {
                
            }( jQuery ) );
        </script>
    <?php }
}