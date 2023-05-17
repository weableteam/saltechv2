<?php

/**
 * "Tab Service" Block Template.
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
$className = 'w-tabService';

if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$isFullWidth = false;
if( !empty($block['align']) ) {
    $isFullWidth = $block['align'] === 'full' ? true : false;
    $className .= ' align-' . $block['align'];
}

// Load values and assign defaults.
$title= get_field('title');
$tabs= get_field('tabs');
$comment= get_field('comment');

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <?php if($title) : ?>
            <h2 class="title"><?= $title ?></h2>
        <?php endif; ?>
        <?php if($tabs) : ?>
            <div class="bgr">
                <ul class="list-icon">
                    <?php foreach($tabs as $item) : ?>
                    <li class="items-icon">
                        <div class="group-img">
                            <?php if($item['image_defaut']) : ?>
                            <img src="<?= esc_url($item['image_defaut']['url']) ?>"
                                alt="<?= esc_attr($item['image_defaut']['alt']) ?>">
                            <?php endif; ?>
                            <?php if($item['image_for_hover']) : ?>
                            <img src="<?= esc_url($item['image_for_hover']['url']) ?>"
                                alt="<?= esc_attr($item['image_for_hover']['alt']) ?>">
                            <?php endif; ?>
                        
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <ul class="list-content">
                    <?php foreach($tabs as $item) : ?>
                        <?php if($item['content']) : ?>
                            <li class="items-content d-flex">
                                <div class="item">
                                    <?php if($item['content']['title']) : ?>
                                        <h3><?= $item['content']['title'] ?></h3>
                                    <?php endif; ?>
                                    <?php if($item['content']['desc']) : ?>
                                        <?= $item['content']['desc'] ?> 
                                    <?php endif; ?>
                                    <?php if($item['content']['link']) : ?>
                                        <a href="<?= esc_url($item['content']['link']['url']) ?>"><?= esc_attr($item['content']['link']['title']) ?></a>
                                    <?php endif; ?>
                                </div>
                                <?php if($item['content']['main_image']) : ?>
                                    <div class="img-fluid">
                                        <img class="imgContent" src="<?= esc_url($item['content']['main_image']['url']) ?>" alt="<?= esc_attr($item['content']['main_image']['alt']) ?>">
                                    </div>
                                <?php endif; ?>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        <?php if($comment) : ?>
        <div class="comment">
            <?= ($comment['content']) ? '<p>'.$comment['content'].'</p>' : '' ?>
            <?php if($comment['author']) : ?>
            <div class="author">
                <?php if($comment['author']['avatar']) : ?>
                    <img src="<?= esc_url($comment['author']['avatar']['url'])  ?>" alt="<?= esc_attr($comment['author']['avatar']['alt'])  ?>"
                        class="img-img-fluid">
                <?php endif; ?>
                <?php if($comment['author']['name']) : ?>
                    <span class="name"><?= $comment['author']['name'] ?></span>
                <?php endif; ?>
                <?php if($comment['author']['job']) : ?>
                    <span class="job"><?= $comment['author']['job'] ?></span>
                <?php endif; ?>
                <?php if($comment['author']['credit']) : ?>
                    <span class="train"><?= $comment['author']['credit'] ?></span>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>
    </div>
</section>
<?php 
add_action( 'wp_footer', 'tabServiceScripts', 99, 1 );
if (!function_exists('tabServiceScripts'))   {
    function tabServiceScripts() { ?>
<script async>
(function($) {

    document.addEventListener('mousemove', function(event) {
    $('.imgContent').each((index,image)=>{
        var mouseX = event.clientX;
    var mouseY = event.clientY;
    var imageX = image.offsetLeft + (image.offsetWidth / 2);
    var imageY = image.offsetTop + (image.offsetHeight / 2);
    var distX = mouseX - imageX;
    var distY = mouseY - imageY;
    var transform = 'translate(' + (distX / 50) + 'px,' + (distY / 50) + 'px)';
    image.style.transform = transform;
    })
  
    });

    $('.w-tabService .list-content').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        asNavFor: '.w-tabService .list-icon',
    });
    $('.w-tabService .list-icon').slick({
        slidesToShow: 3,
        slidesToScroll: 3,
        asNavFor: '.w-tabService .list-content',
        dots: false,
        focusOnSelect: true
    });
}(jQuery));
</script>
<?php }
}