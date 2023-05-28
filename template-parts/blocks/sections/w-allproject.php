<?php

/**
 * "All Project" Block Template.
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
$className = 'w-allpj w-apj pt-5';

if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$isFullWidth = false;
if( !empty($block['align']) ) {
    $isFullWidth = $block['align'] === 'full' ? true : false;
    $className .= ' align-' . $block['align'];
}

// Load values and assign defaults.
$design = get_field('design');
$google = get_field('google');
$brand = get_field('branch');

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">

   <div class="container">
    <div class="about-container">
        <div class="about-heading">
            <h1 class="mb-4">
                Các dự án nổi bật
            </h1>
        </div>
    </div>
        <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
            <?php if($google['projects']) : ?>
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Google Ads</a>
                </li>
            <?php endif; ?>
            <?php if($design['projects']) : ?>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Thiết kế website</a>
                </li>
            <?php endif; ?>
            <?php if($brand['projects']) : ?>
                <li class="nav-item"> 
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Kiến tạo thương hiệu</a>
                </li>
            <?php endif; ?>
        </ul>
        <div class="tab-content" id="myTabContent">
        <?php if($google['projects']) : ?>
        <div class="tab-pane  fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="about-container">
                <div class="about-slider">
                    <?php foreach($google['projects'] as $item) : ?>
                        <?php if($item['project']) :
                        $project = $item['project'];
                        setup_postdata($project);
                        $project_id = $project->ID; // Lấy ID của bài viết
                        ?>
                            <a href="#" class="link-prj about-item" project-id="<?= $project_id ?>">
                                <div class="img-wrap">
                                    <?php echo get_the_post_thumbnail($project) ?>
                                </div>    
                                <div class="about-name">
                                    <span ><img src="../wp-content/uploads/2023/05/Group-903.webp" alt=""></span>
                                    <div class="about-name-wrapper">
                                        <h4><?= get_the_title($project  ) ?></h4>
                                        <p>
                                        <?php
                                        // Lấy danh sách thuộc tính taxonomy
                                        $taxonomies = get_the_terms($project, 'linh-vuc-du-an');

                                        if ($taxonomies && !is_wp_error($taxonomies)) {
                                            $taxonomy_parent = '';
                                            foreach ($taxonomies as $taxonomy) {
                                                if ($taxonomy->parent == 0) {
                                                    $taxonomy_parent = $taxonomy->name;
                                                    break;
                                                }
                                            }
                                            echo $taxonomy_parent;
                                        }
                                        ?>
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <?php wp_reset_postdata( ); ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <div class="about-slider--counter">1/4</div>
            </div>
        </div>
        <?php endif; ?>
        <div class="tab-pane w-pSlider fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="slider-ct">
        <?php foreach($google['projects'] as $item) : ?>
            <?php if($item['project']) :
            $project = $item['project'];
            setup_postdata($project);
            $project_id = $project->ID; // Lấy ID của bài viết
            ?>
                 <a href="#" class="link-prj" project-id="<?= the_ID() ?>">
                    <div class="slider-items">
                        <div class="sl-img img-wrap">
                            <img src="<?= get_the_post_thumbnail_url($project) ?>" alt="">
                        </div>
                        <div class="sl-inf">
                            <div class="sl-hover">
                                <i class="bi bi-arrow-right"></i>
                            </div>
                            <div class="sl-title">
                                <h4> <?= get_the_title($project) ?></h4>
                                <span><?= get_the_excerpt($project) ?></span>
                            </div>
                        </div>
                    </div>
                </a>
                  <?php
             
              wp_reset_postdata();?>
                 <?php endif; ?>
            <?php endforeach; ?>
            </div>   
            <div class="slick-number" style="display: block;">
                <button type="button" class="slick-prev "><i class="bi bi-chevron-left"></i></button>
                    <span class="active">01</span> / <span class="total"></span>
                <button type="button" class="slick-next "><i class="bi bi-chevron-right"></i> </button>
            </div>
        </div>
        <div class="tab-pane fade w-listItem " id="contact" role="tabpanel" aria-labelledby="contact-tab">
        <div class="listItem-main py-5">
            <div class="listitems">
                <?php foreach($brand['projects'] as $item) : ?>
                    <?php if($item['project']) :
                    $project = $item['project'];
                    setup_postdata($project);
                    $project_id = $project->ID; // Lấy ID của bài viết
                    ?>
                        <div class="listItem-items">
                            <a href="#" class="link-prj" project-id="<?= $project_id ?>">
                                <div class="items-img img-wrap">
                                    <img src="<?=  get_the_post_thumbnail_url($project ) ?>" alt="">
                                </div>
                                <div class="items-title">
                                    <div class="title-name">
                                        <?= get_the_title($project_id ) ?>
                                    </div>
                                    <div class="title-span">
                                        <span>Client: <?= get_field('name_cty',$project_id) ?></span>
                                        <div class="cate d-flex">
                                        <?php
                                        // Lấy danh sách tất cả các category
                                        $categories = get_the_terms($project, 'linh-vuc-du-an');

                                        // Kiểm tra nếu có category
                                        if ($categories) {
                                            // Lặp qua từng category và in ra tên
                                            foreach ($categories as $category) {
                                                echo "<span class='d-block'>" . $category->name . "</span>";
                                            }
                                        }
                                        ?>
                                        </div>
                                       
                                    </div>
                                </div>
                                <div class="title-hover">
                                    <div class="hover-img">
                                        <img src="<?=  get_stylesheet_directory_uri() . '/assets/images/member-vt.webp' ?>" alt="">
                                        <span>view</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php
                                
                        wp_reset_postdata();?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                   
                    </div>
                    <div class="slick-number" style="display: block;">
                        <button type="button" class="slick-prev "><i class="bi bi-chevron-left"></i></button>
                            <span class="active">01</span> / <span class="total"></span>
                        <button type="button" class="slick-next "><i class="bi bi-chevron-right"></i> </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
   </div>
  
</section>

<?php 
add_action( 'wp_footer', 'allScripts', 99, 1 );
if (!function_exists('allScripts')) {
    function allScripts()
    { ?>
<script async>
(function($) {
    var helpers = {
        addZeros: function (n) {
            return (n < 10) ? '0' + n : '' + n;
            }
        };
    
        function sliderInit() {
        var $slider = $('.w-allpj  .w-pSlider .slider-ct');
        $slider.each(function() {
            var $sliderParent = $(this).parent();
            $(this).slick({
                slidesToShow: 2,
                // autoplay: true,
                speed: 300,
                prevArrow: $('.w-allpj .w-pSlider .slick-prev'),
                    nextArrow: $('.w-allpj .w-pSlider .slick-next'),
                responsive: [
                    {
                        breakpoint: 992,
                        settings: {
                            arrows: true,
                            centerMode: true,
                            centerPadding: '0px',
                            slidesToShow: 2
                            }
                    },
                    {
                        breakpoint: 541,
                        settings: {
                            arrows: true,
                            centerMode: true,
                            centerPadding: '40px',
                            slidesToShow: 1
                        }
                    }
                ],        
            });
            if ($(this).find('.slider-items').length > 1) {
            $(this).siblings('.slick-number').show();
            }
            $(this).on('afterChange', function(event, slick, currentSlide){
            $sliderParent.find('.slick-number .active').html(helpers.addZeros(currentSlide + 1));
            });
            var sliderItemsNum = $(this).find('.slick-slide').not('.slick-cloned').length;
            $sliderParent.find('.slick-number .total').html(helpers.addZeros(sliderItemsNum));
            });
        };
        sliderInit();
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            $('.w-allpj  .w-pSlider .slider-ct').slick('setPosition');
            $('.w-allpj .listItem-main .listitems').slick('setPosition');

      
        })
        var helpers = {
        addZeros: function (n) {
            return (n < 10) ? '0' + n : '' + n;
            }
        };
    
        function sliderInit1() {
        var $slider = $('.w-allpj .listItem-main .listitems')
        $slider.each(function() {
            var $sliderParent = $(this).parent();
            $(this).slick({
                slidesToShow: 3,
                // autoplay: true,
                speed: 300,
                prevArrow: $('.w-allpj .listItem-main .slick-prev'),
                    nextArrow: $('.w-allpj .listItem-main .slick-next'),
                    responsive: [
                    {
                        breakpoint: 992,
                        settings: {
                            arrows: true,
                            centerMode: true,
                            centerPadding: '0px',
                            slidesToShow: 2
                            }
                    },
                    {
                        breakpoint: 541,
                        settings: {
                            arrows: true,
                            centerMode: true,
                            centerPadding: '40px',
                            slidesToShow: 1
                        }
                    }
                ],        
            });
            if ($(this).find('.listItem-items').length > 1) {
                $(this).siblings('.slick-number').show();
            }
            $(this).on('afterChange', function(event, slick, currentSlide){
                $sliderParent.find('.slick-number .active').html(helpers.addZeros(currentSlide + 1));
            });
            var sliderItemsNum = $(this).find('.slick-slide').not('.slick-cloned').length;
                $sliderParent.find('.slick-number .total').html(helpers.addZeros(sliderItemsNum));
            });
        };
        sliderInit1();

}(jQuery));
</script>
<?php }
}
