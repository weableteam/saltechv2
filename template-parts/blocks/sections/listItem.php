<?php

/**
 * "List Item" Block Template.
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
$className = 'w-listItem py-5';

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
    <div class="w-listItem">
        <div class="listItem-main container">

            <div class="listItem-left">
                <div class="nav flex-column nav-listItem" id="v-listItem-tab" role="tablist" aria-orientation="vertical">
                <div class="nav-name active" id="v-listItem-home-tab" data-toggle="pill" data-target="#v-listItem-home" role="tab" aria-controls="v-listItem-home" aria-selected="true"> All</div>
                <?php
                // Lấy danh mục "Thương hiệu"
                $parent_category_name = 'Thương hiệu';
                $parent_category = get_term_by('name', $parent_category_name, 'linh-vuc-du-an');
                $parent_category_id = $parent_category->term_id;

                // Lấy danh sách danh mục con của danh mục "Thương hiệu"
                $child_categories = get_terms(array(
                    'taxonomy' => 'linh-vuc-du-an',
                    'parent' => $parent_category_id,
                ));

                // Lặp qua danh sách danh mục con
                foreach ($child_categories as $category) {
                    $category_id = $category->term_id;
                    $category_name = $category->name;
                    $category_slug = $category->slug;

                    // Thực hiện các hành động khác với danh mục con tại đây
                    // Ví dụ: In ra tên và slug của danh mục con?>
                    <div class="nav-name" id="v-listItem-<?=$category_name?>-tab" data-toggle="pill" data-target="#v-listItem-<?=$category_name?>" role="tab" aria-controls="v-listItem-<?=$category_name?>" aria-selected="false"><?=$category_name?></div>

                    <?php
                }
            ?>
                </div>
            </div>
            <div class="" style="width:100%">
                <div class="tab-content" id="v-listItem-tabContent">
                    <div class="tab-pane fade show active" id="v-listItem-home" role="tabpanel" aria-labelledby="v-listItem-home-tab">
                    <div class="listitems">

                    <?php
                                // Thực hiện các hành động khác với danh mục con tại đây
                                // Ví dụ: In ra tên và slug của danh mục con
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
                                ?>
                                    <div class="listItem-items">
                                        <a href="#" class="link-prj" project-id="<?= the_ID( ) ?>">
                                            <div class="items-img img-wrap">
                                                <img src="<?=  the_post_thumbnail_url( ) ?>" alt="">
                                            </div>
                                            <div class="items-title">
                                                <div class="title-name">
                                                    <?= get_the_title( ) ?>
                                                </div>
                                                <div class="title-span">
                                                    <span>Client: <?= get_field('name_cty',get_the_ID()) ?></span>
                                                    <span class="d-block"><?= $category_name ?></span>
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
                                    }
                                    wp_reset_postdata();
                                }
                                ?>
                    </div>
                    </div>

                    <?php 
                      foreach ($child_categories as $category) {
                        $category_id = $category->term_id;
                        $category_name = $category->name;
                        $category_slug = $category->slug;
                        ?>
                        <div class="tab-pane fade" id="v-listItem-<?=$category_name?>" role="tabpanel" aria-labelledby="v-listItem-<?=$category_name?>-tab">
                            <div class="listitems">
                                <?php
                                // Thực hiện các hành động khác với danh mục con tại đây
                                // Ví dụ: In ra tên và slug của danh mục con
                                $args = array(
                                    'post_type' => 'du-an', // Loại bài đăng cần lấy
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => 'linh-vuc-du-an', // Tên taxonomy
                                            'field' => 'term_id',
                                            'terms' => $category_id, // ID của danh mục hiện tại
                                        ),
                                    ),
                                );
                                $query = new WP_Query($args);
                                if ($query->have_posts()) {
                                    while ($query->have_posts()) {
                                        $query->the_post();
                                ?>
                                    <div class="listItem-items">
                                        <a href="#" class="link-prj" project-id="<?= the_ID( ) ?>">
                                            <div class="items-img img-wrap">
                                                <img src="<?=  the_post_thumbnail_url( ) ?>" alt="">
                                            </div>
                                            <div class="items-title">
                                                <div class="title-name">
                                                    <?= get_the_title( ) ?>
                                                </div>
                                                <div class="title-span">
                                                    <span>Client: <?= get_field('name_cty',get_the_ID()) ?></span>
                                                    <span class="d-block"><?= $category_name ?></span>
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
                                    }
                                    wp_reset_postdata();
                                }
                                ?>
                                 </div>
                                 <div class="list-button">
                                <button>
                                    More <i class="bi bi-chevron-double-down"></i>
                                </button>
                            </div>
                        </div>
                                <?php
                                
                            }?>
                           
                          
                        </div>
                    
                        
                    <!-- <div class="tab-pane fade" id="v-listItem-messages" role="tabpanel" aria-labelledby="v-listItem-messages-tab">
                        <div class="listitems">
                            <div class="listItem-items">
                                <a href="">
                                    <div class="items-img">
                                        <img src="<?=  get_stylesheet_directory_uri() . '/assets/images/listitem6.webp' ?>" alt="">
                                    </div>
                                    <div class="items-title">
                                        <div class="title-name">
                                        HOANGDUC14 SPORT
                                        </div>
                                        <div class="title-span">
                                            <span>Client: Nguyễn Hoàng Đức - VN</span>
                                            <span>Logo - Branding</span>
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

                            <div class="listItem-items">
                                <a href="">
                                    <div class="items-img">
                                        <img src="<?=  get_stylesheet_directory_uri() . '/assets/images/listitem2.webp' ?>" alt="">
                                    </div>
                                    <div class="items-title">
                                        <div class="title-name">
                                        iTalentBrigde
                                        </div>
                                        <div class="title-span">
                                            <span>Client: Nguyễn Chi Mai - VN</span>
                                            <span>Logo - Branding</span>
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

                            <div class="listItem-items">
                                <a href="">
                                    <div class="items-img">
                                        <img src="<?=  get_stylesheet_directory_uri() . '/assets/images/listitem5.webp' ?>" alt="">
                                    </div>
                                    <div class="items-title">
                                        <div class="title-name">
                                        Chile Comisi
                                        </div>
                                        <div class="title-span">
                                            <span>Client: Alison Holn - US</span>
                                            <span>Event Identity</span>
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
                        </div>

                        <div class="list-button">
                            <button>
                                More <i class="bi bi-chevron-double-down"></i>
                            </button>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-listItem-settings" role="tabpanel" aria-labelledby="v-listItem-settings-tab">
                        <div class="listitems">
                            <div class="listItem-items">
                                <a href="">
                                    <div class="items-img">
                                        <img src="<?=  get_stylesheet_directory_uri() . '/assets/images/listitem1.webp' ?>" alt="">
                                    </div>
                                    <div class="items-title">
                                        <div class="title-name">
                                        HOANGDUC14 SPORT
                                        </div>
                                        <div class="title-span">
                                            <span>Client: Nguyễn Hoàng Đức - VN</span>
                                            <span>Logo - Branding</span>
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

                            <div class="listItem-items">
                                <a href="">
                                    <div class="items-img">
                                        <img src="<?=  get_stylesheet_directory_uri() . '/assets/images/listitem5.webp' ?>" alt="">
                                    </div>
                                    <div class="items-title">
                                        <div class="title-name">
                                        iTalentBrigde
                                        </div>
                                        <div class="title-span">
                                            <span>Client: Nguyễn Chi Mai - VN</span>
                                            <span>Logo - Branding</span>
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

                            <div class="listItem-items">
                                <a href="">
                                    <div class="items-img">
                                        <img src="<?=  get_stylesheet_directory_uri() . '/assets/images/listitem6.webp' ?>" alt="">
                                    </div>
                                    <div class="items-title">
                                        <div class="title-name">
                                        Chile Comisi
                                        </div>
                                        <div class="title-span">
                                            <span>Client: Alison Holn - US</span>
                                            <span>Event Identity</span>
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
                        </div>

                        <div class="list-button">
                            <button>
                                More <i class="bi bi-chevron-double-down"></i>
                            </button>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>
<?php 
// add_action( 'wp_footer', 'listItemScripts', 99, 1 );
if (!function_exists('listItemScripts'))   {
    function listItemScripts() { ?>
<script async>
(function($) {
    var header = document.getElementById("v-listItem-tab");
    var btns = header.getElementsByClassName("nav-name");
    for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
    });
    }
}(jQuery));


</script>
<?php }
}