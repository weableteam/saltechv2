<?php

/**
 * "What you need" Block Template.
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
$className = 'w-wyn';

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
    <div class="container pb-5">
        <h2 class="text-center">BẠN CẦN CHUẨN BỊ GÌ KHI TÌM KIẾM CÁC ĐƠN VỊ TRIỂN KHAI GOOGLE ADS?</h2>
        <div class="row align-items-center mb-5">
            <div class="col-lg-6">
                <div class="content-texts">
                    <div class="text">
                        <h4>Xác định mục tiêu rõ ràng</h4>
                        <p>Mỗi thời điểm khác nhau trong quá trình phát triển, chúng ta có những mục tiêu khác nhau: Doanh số bán hàng, thương hiệu. Vì vậy hãy xác định rõ mong muốn tại thời điểm đó là gì, chúng tôi sẽ có những chiến lược phù hợp cho bạn.</p>
                    </div>
                    <div class="text">
                        <h4>Xác định mục tiêu rõ ràng</h4>
                        <p>Mỗi thời điểm khác nhau trong quá trình phát triển, chúng ta có những mục tiêu khác nhau: Doanh số bán hàng, thương hiệu. Vì vậy hãy xác định rõ mong muốn tại thời điểm đó là gì, chúng tôi sẽ có những chiến lược phù hợp cho bạn.</p>
                    </div>
                    <div class="text">
                        <h4>Xác định mục tiêu rõ ràng</h4>
                        <p>Mỗi thời điểm khác nhau trong quá trình phát triển, chúng ta có những mục tiêu khác nhau: Doanh số bán hàng, thương hiệu. Vì vậy hãy xác định rõ mong muốn tại thời điểm đó là gì, chúng tôi sẽ có những chiến lược phù hợp cho bạn.</p>
                    </div>
                    <div class="text">
                        <h4>Xác định mục tiêu rõ ràng</h4>
                        <p>Mỗi thời điểm khác nhau trong quá trình phát triển, chúng ta có những mục tiêu khác nhau: Doanh số bán hàng, thương hiệu. Vì vậy hãy xác định rõ mong muốn tại thời điểm đó là gì, chúng tôi sẽ có những chiến lược phù hợp cho bạn.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="imgMain img-wrap">
                    <img src="<?=  get_stylesheet_directory_uri() . '/assets/images/quiz show-amico 1.webp' ?>" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<?php 
//add_action( 'wp_footer', 'wynScripts', 99, 1 );
if (!function_exists('wynScripts'))   {
    function wynScripts() { ?>
        <script async>
            ( function ( $ ) {
                
            }( jQuery ) );
        </script>
    <?php }
}