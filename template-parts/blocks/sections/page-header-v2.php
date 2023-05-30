<?php

/**
 * "Page Header V2" Block Template.
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
$className = 'w-pageHeaderv2 pb-3';

if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$isFullWidth = false;
if( !empty($block['align']) ) {
    $isFullWidth = $block['align'] === 'full' ? true : false;
    $className .= ' align-' . $block['align'];
}

// Load values and assign defaults.
$video_link = get_field('video_link');
$title_top = get_field('title_top');
$form = get_field('form');
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <?php if($video_link) : ?>
        <video autoplay muted loop src="<?= $video_link ?>" type="video/mp4"></video>
    <?php endif; ?>
    <div class="container-fluid">
        <?php if($title_top) : ?>
            <div class="titleHeaderv2">
                <div class="title">
                    <?= ($title_top['small_text']) ? '<p>'.$title_top['small_text'].'</p>' : '' ?>
                    <?= ($title_top['title']) ? '<h2>'.$title_top['title'].'</h2>' : '' ?>
                </div>
                <?php if($title_top['image']) : ?>
                    <div class="imgMain">
                        <img src="https://saltech.webmau.net/wp-content/uploads/2023/03/hoa-tiet-1-THH.webp" alt="" class="left img-fluid">
                        <img id="imgContent" src="<?= esc_url($title_top['image']['url']) ?>" class="img-fluid" alt="<?= esc_attr($title_top['image']['alt']) ?>">
                        <img src="https://saltech.webmau.net/wp-content/uploads/2023/03/Hoa-tiet-2-THH.webp" alt="" class="right img-fluid">
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <div class="directionPage">
            Saltech Vietnam
            <div class="img">
                <img src="<?=  get_stylesheet_directory_uri() . '/assets/images/Vector 102.webp' ?>" alt="" class="img-fluid">
            </div>
        </div>
        <div class="contentCta position-relative">
            <?= ($form['subtitle']) ? '<p class="content">'.$form['subtitle'].'</p>' : '' ?>
            <?= ($form['title']) ? '<h2>'.$form['title'].'</h2>' : '' ?>
            <form action="">
                <div class="form-row justify-content-center">
                    <div class="col-md-5">
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
            <?= ($form['text']) ? '<p>'.$form['text'].'</p>' : '' ?>
        </div>
    </div>
</section>
<?php 
add_action( 'wp_footer', 'pageHeaderV2Scripts', 99, 1 );
if (!function_exists('pageHeaderV2Scripts'))   {
    function pageHeaderV2Scripts() { ?>
<script async>
(function($) {

    var image = document.getElementById('imgContent');

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

}(jQuery));
</script>
<?php }
}