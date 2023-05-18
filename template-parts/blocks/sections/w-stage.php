<?php

/**
 * "Stage" Block Template.
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
$className = 'w-st';

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
<div class="w-stage">
        <div class="container">
            <ul class="list-items" onmousedown="startDragging(event)" onmousemove="dragScroll(event)" onmouseup="stopDragging(event)">
                <li class="stage-items">
                    <div class="img-items">
                        <img src="<?=  get_stylesheet_directory_uri() . '/assets/images/Rectangle 216.webp' ?>" alt="">
                    </div>

                    <div class="title-items"> 
                        <span>2019</span>
                        <div class="title-text">
                            <p>
                            Giai đoạn này Saltech cần một hai ba bốn năm sáu bảy tám chín mười 
                            </p>
                            <p>
                            Giai đoạn này Saltech cần một hai ba bốn
                            </p>
                        </div>
                    </div>
                </li>

                <li class="stage-items">
                    <div class="img-items">
                        <img src="<?=  get_stylesheet_directory_uri() . '/assets/images/Rectangle 217.webp' ?>" alt="">
                    </div>

                    <div class="title-items"> 
                        <span>2019</span>
                        <div class="title-text">
                            <p>
                            Giai đoạn này Saltech cần một hai ba bốn năm sáu bảy tám chín mười 
                            </p>
                            <p>
                            Giai đoạn này Saltech cần một hai ba bốn
                            </p>
                        </div>
                    </div>
                </li>

                <li class="stage-items">
                    <div class="img-items">
                        <img src="<?=  get_stylesheet_directory_uri() . '/assets/images/Rectangle 217 (1).webp' ?>" alt="">
                    </div>

                    <div class="title-items"> 
                        <span>2019</span>
                        <div class="title-text">
                            <p>
                            Giai đoạn này Saltech cần một hai ba bốn năm sáu bảy tám chín mười 
                            </p>
                            <p>
                            Giai đoạn này Saltech cần một hai ba bốn
                            </p>
                        </div>
                    </div>
                </li>

                <li class="stage-items">
                    <div class="img-items">
                        <img src="<?=  get_stylesheet_directory_uri() . '/assets/images/Rectangle 216 (2).webp' ?>" alt="">
                    </div>

                    <div class="title-items"> 
                        <span>2019</span>
                        <div class="title-text">
                            <p>
                            Giai đoạn này Saltech cần một hai ba bốn năm sáu bảy tám chín mười 
                            </p>
                            <p>
                            Giai đoạn này Saltech cần một hai ba bốn
                            </p>
                        </div>
                    </div>
                </li>

                <li class="stage-items">
                    <div class="img-items">
                        <img src="<?=  get_stylesheet_directory_uri() . '/assets/images/Rectangle 216.webp' ?>" alt="">
                    </div>

                    <div class="title-items"> 
                        <span>2019</span>
                        <div class="title-text">
                            <p>
                            Giai đoạn này Saltech cần một hai ba bốn năm sáu bảy tám chín mười 
                            </p>
                            <p>
                            Giai đoạn này Saltech cần một hai ba bốn
                            </p>
                        </div>
                    </div>
                </li>

                <li class="stage-items">
                    <div class="img-items">
                        <img src="<?=  get_stylesheet_directory_uri() . '/assets/images/Rectangle 216 (1).webp' ?>" alt="">
                    </div>

                    <div class="title-items"> 
                        <span>2019</span>
                        <div class="title-text">
                            <p>
                            Giai đoạn này Saltech cần một hai ba bốn năm sáu bảy tám chín mười 
                            </p>
                            <p>
                            Giai đoạn này Saltech cần một hai ba bốn
                            </p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</section>
<?php 
add_action( 'wp_footer', 'stScripts', 99, 1 );
if (!function_exists('stScripts'))   {
    function stScripts() { ?>
        <script async>
            ( function ( $ ) {
                
            }( jQuery ) );

            var container = document.querySelector('.list-items');
            var isDragging = false;
            var startX, scrollLeft;

            container.addEventListener('mouseenter', () => {
            container.classList.add('active');
            });

            container.addEventListener('mouseleave', () => {
            container.classList.remove('active');
            });

            function startDragging(e) {
            isDragging = true;
            startX = e.pageX - container.offsetLeft;
            scrollLeft = container.scrollLeft;
            }

            function stopDragging(e) {
            isDragging = false;
            }

            function dragScroll(e) {
            if (!isDragging) return;
            e.preventDefault();
            const x = e.pageX - container.offsetLeft;
            const walk = (x - startX) * 3; // scroll speed
            container.scrollLeft = scrollLeft - walk;
            }
        </script>
    <?php }
}