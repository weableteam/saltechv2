<?php

/**
 * "Slider" Block Template.
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
$className = 'w-slider py-5';

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
        <h2 class="title">Saltech tự tin là đơn vị thiết kế Thương hiệu hiệu quả nhất trong phân khúc</h2>
        <ul class="list">
        <?php 
            $parent_category_name = 'Thương hiệu';
            $parent_category = get_term_by('name', $parent_category_name, 'linh-vuc-du-an');
            $parent_category_id = $parent_category->term_id;
            $args = array(
                'post_type' => 'du-an', // Loại bài đăng cần lấy
                'tax_query' => array(
                    array(
                        'taxonomy' => 'linh-vuc-du-an', // Tên taxonomy
                        'field' => 'term_id',
                        'terms' => $parent_category_id, // ID của danh mục hiện tại
                    ),
                ),
            );
              
              $query = new WP_Query($args);
              
              if ($query->have_posts()) {
                while ($query->have_posts()) {
                  $query->the_post();
                  $post_id = get_the_ID();
                  $name = get_field('name_cty', $post_id);
                  $special = get_field('specials', $post_id);

                  ?>
                 <?php if($special) : ?>
                    <li class="items">
                        <div class="img-wrap">
                            <img src="<?= get_the_post_thumbnail_url() ?>" alt="">
                        </div>
                        <div class="content">
                            <h3><?= get_the_title(  ) ?></h3>
                            <span>Client: <?= get_field('name_cty',get_the_ID( )) ?></span>
                            
                            <span>
                            <?php
                            // Lấy danh sách danh mục của bài viết hiện tại
                                    $categories = get_the_category();

                                    // Lọc danh sách để chỉ lấy danh mục con
                                    $subcategories = array_filter($categories, function ($category) {
                                        return $category->parent != 0;
                                    });

                                    // In ra danh sách danh mục con
                                    foreach ($subcategories as $subcategory) {
                                        echo $subcategory->name;
                                    }
                            ?>
                            </span>
                        </div>
                     </li>
                  <?php
                  endif;
                }
              }
              wp_reset_postdata();?>
        </ul>
    </div>

</section>
<?php 
add_action( 'wp_footer', 'sliderScripts', 99, 1 );
if (!function_exists('sliderScripts'))   {
    function sliderScripts() { ?>
<script async>
(function($) {
    $('.w-slider .list').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        speed: 1000,
        dots: true,
        arrows: true,
        prevArrow: '<button type="button" class="slick-prev"><img src="<?= get_stylesheet_directory_uri() . '/assets/images/Group 620.webp' ?>" alt=""><img src="<?= get_stylesheet_directory_uri() . '/assets/images/Group 619.webp' ?>" alt=""></button>',
        nextArrow: '<button type="button" class="slick-next"><img src="<?= get_stylesheet_directory_uri() . '/assets/images/Group 620.webp' ?>" alt=""><img src="<?= get_stylesheet_directory_uri() . '/assets/images/Group 619.webp' ?>" alt=""></button>',
    });
}(jQuery));
</script>
<?php }
}