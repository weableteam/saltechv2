<?php

/**
 * "Member" Block Template.
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
$className = 'w-member';

if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$isFullWidth = false;
if( !empty($block['align']) ) {
    $isFullWidth = $block['align'] === 'full' ? true : false;
    $className .= ' align-' . $block['align'];
}

// Load values and assign defaults.
$tag = get_field('tag');
$title = get_field('title');
$members = get_field('members');
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="" style="padding-right:0">
        <div class="member-head">
            <div class="container">
                <?= ($tag) ? '<span>'.$tag.'</span>' : '' ?>
                <?= ($title) ? '<p>'.$title.'</ơ>' : '' ?>
            </div >
        </div>
        <?php if($members) : ?>
        <div class="member-slick">
            <?php foreach($members as $item) : ?>
            <div class="member-items">
                <div class="member-img">
                    <?php if($item['image']) : ?>
                        <img src="<?= esc_url($item['image']['url']) ?>" alt="<?= esc_attr($item['image']['alt']) ?>">
                    <?php endif; ?>
                    <?php if($item['socials']) : ?>
                    <ul class="member-inf">
                        <?php if($item['socials']['instagram']) : ?>
                            <li><a href="<?= $item['socials']['instagram'] ?>"><i class="bi bi-instagram"></i></a></li>
                         <?php endif; ?>
                         <?php if($item['socials']['twitter']) : ?>
                            <li><a href="<?= $item['socials']['twitter'] ?>"><i class="bi bi-twitter"></i></a></li>
                         <?php endif; ?>
                         <?php if($item['socials']['facebook']) : ?>
                            <li><a href="<?= $item['socials']['facebook'] ?>"><i class="bi bi-facebook"></i></a></li>
                         <?php endif; ?>
                         <?php if($item['socials']['tiktok']) : ?>
                            <li><a href="<?= $item['socials']['tiktok'] ?>"><i class="bi bi-tiktok"></i></a></li>
                         <?php endif; ?>
                    </ul>
                    <?php endif; ?>
                </div>

                <div class="member-title">
                    <div>
                        <?php if($item['name']) : ?>
                        <div class="title-name">
                            <?= $item['name'] ?>
                        </div>
                        <?php endif; ?>
                        <?= ($item['role']) ? '<span>'.$item['role'].'</ơ>' : '' ?>
                    </div>

                    <div class="title-vector">
                        <img src="<?=  get_stylesheet_directory_uri() . '/assets/images/member-vt.webp' ?>" alt="">
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div> 
        <?php endif; ?>
    </div>
</section>
<?php 
add_action( 'wp_footer', 'memberScripts', 99, 1 );
if (!function_exists('memberScripts'))   {
    function memberScripts() { ?>
<script async>
(function($) {
    $('.member-slick').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        dots: true,
        prevArrow:
        '<button type="button" class="slick-prev "><img src="<?= get_stylesheet_directory_uri() . '/assets/images/leftDefault.svg' ?>" class="img-fluid" alt=""><img src="<?= get_stylesheet_directory_uri() . '/assets/images/left.svg' ?>" class="img-fluid d-none imgPrev" alt=""></button>',
        nextArrow:
        '<button type="button" class="slick-next "><img src="<?= get_stylesheet_directory_uri() . '/assets/images/rightDefault.svg' ?>" class="img-fluid" alt=""><img src="<?= get_stylesheet_directory_uri() . '/assets/images/rightt.svg' ?>" class="img-fluid d-none imgNext" alt=""></button>',

            responsive: [
                    {
                        breakpoint: 992,
                        settings: {
                            arrows: true,
                            slidesToShow: 3,
                            slidesToScroll: 1,
                            initialSlide: 1,
                            }
                    },
                    {
                        breakpoint: 541,
                        settings: {
                            arrows: true,
                            centerMode: true,
                            centerPadding: '0px',
                            slidesToShow: 2,
                            slidesToScroll: 1,
                        }
                    }
                ],            
    
    });
}(jQuery));
</script>
<?php }
}