<?php

/**
 * "Introduction" Block Template.
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
$className = 'w-intro';

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
$main_image = get_field('main_image');
$links = get_field('links');
$brands = get_field('brands');

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" style="background-image: url('<?=get_stylesheet_directory_uri() . '/assets/images/image 2.webp' ?>');">
    <div class="container">
        <div class="row ">
            <div class="col-lg-7">
                <?php if($title) : ?>
                    <div class="title">
                        <?php if($title['subtitle']) : ?>
                        <div class="sub-title"><?= $title['subtitle'] ?>
                            <div class="img-text">
                                <img src="<?= get_stylesheet_directory_uri() . '/assets/images/Group 549.webp' ?>" alt="">
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if($title['small_text']) : ?>
                        <span><?= $title['small_text'] ?>
                            <div class="img-ellipse">
                                <img src="<?= get_stylesheet_directory_uri() . '/assets/images/Rectangle 48 (1).webp' ?>" alt="">
                            </div>
                        </span>
                        <?php endif; ?>
                        <?php if($title['title']) : ?>
                        <h1><?= $title['title'] ?>
                            <div class="img-plane">
                                <img src="<?= get_stylesheet_directory_uri() . '/assets/images/Vector.webp' ?>" alt="">
                            </div>
                        </h1>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <form action="" class="register">
                    <label for="" class="register-text">Đăng ký nhận kết quả đo lường Miễn phí.</label>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text" id="basic1"><i class="bi bi-globe-americas"></i></div>
                                </div>
                                <input type="text" class="form-control" placeholder=" " aria-label="Username" aria-describedby="basic1">
                                <label for="exampleName">Nhập domainn, tên miền phụ, URL</label>
                            </div>
                        </div>
                        <div class="col-lg-auto col-sm-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text" id="basic2"><i class="bi bi-telephone"></i></div>
                                </div>
                                <input type="text" class="form-control" placeholder=" " aria-label="Username" aria-describedby="basic2">
                                <label for="exampleName">Nhập số điện thoại</label>
                            </div>
                        </div>
                        <button type="submit" class="btn "><i class="bi bi-send"></i></button>
                    </div>
                </form>
                <?php if($links) : ?>
                <div class="page-redirect-link d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/5000/svg" width="23" height="20" viewBox="0 0 23 20" fill="none"> <path d="M0 10L16 10" stroke="white" stroke-opacity="0.65"/> <path d="M7 1L16 10L7 19" stroke="white" stroke-opacity="0.65"/> <path d="M13 1L22 10L13 19" stroke="white" stroke-opacity="0.65"/></svg>
                    <ul class="link-lists ">
                        <?php foreach($links as $item) : ?>
                        <li>
                            <a href="<?= ($item['link']) ? esc_url($item['link']['url']) : '#' ?>">
                                <?= ($item['link_name']) ? $item['link_name'] : '' ?>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-md-5 col-lg-5">
                <?php if($main_image) : ?>
                    <div class="img-content" >
                        <img id="imageContent" src="<?= esc_url($main_image['url']) ?>" alt="<?= esc_attr($main_image['alt']) ?>">
                    </div>
                 <?php endif; ?>
            </div>
            <div class="col-12">
                <?php if($brands) : ?>
                    <div class="brand">
                        <?php if($brands['title']) : ?>
                            <div class="brand-title text-center"><?= $brands['title'] ?></div>
                        <?php endif; ?>
                        <?php if($brands['brand_list']) : ?>
                            <div class="brand-scroll">
                                <div class="logo-brand-list" onmousedown="startDragging(event)" onmousemove="dragScroll(event)" onmouseup="stopDragging(event)">
                                    <?php foreach($brands['brand_list'] as $item) : ?>
                                        <div class="img-logo">
                                            <?php if($item['brand']) : ?>
                                                <img src="<?= esc_url($item['brand']['url']) ?>" alt="<?= esc_attr($item['brand']['alt']) ?>" class="img-fluid">
                                            <?php endif; ?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php 
add_action( 'wp_footer', 'introScripts', 99, 1 );
if (!function_exists('introScripts'))   {
    function introScripts() { ?>
        <script async>
            ( function ( $ ) {
                $(".w-intro .page-redirect-link .link-lists li").click(function (e) { 
                    e.preventDefault();
                    $(".w-intro .page-redirect-link .link-lists li").removeClass("active");
                    $(this).addClass("active");
                });

                
            }( jQuery ) );

            var container = document.querySelector('.brand-scroll');
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
                const walk = (x - startX) * 1; // scroll speed
                container.scrollLeft = scrollLeft - walk;
                }
                var image = document.getElementById('imageContent');

                document.addEventListener('mousemove', function(event) {
                var mouseX = event.clientX;
                var mouseY = event.clientY;
                var imageX = image.offsetLeft + (image.offsetWidth / 2);
                var imageY = image.offsetTop + (image.offsetHeight / 2);
                var distX = mouseX - imageX;
                var distY = mouseY - imageY;
                var transform = 'translate(' + (distX / 50) + 'px,' + (distY / 50) + 'px)';
                image.style.transform = transform;
                });

        </script>
    <?php }
}
