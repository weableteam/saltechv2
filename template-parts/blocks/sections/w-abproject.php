<?php

/**
 * "About Project" Block Template.
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
$className = 'w-apj pt-5';

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
$list = get_field('list');

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <div class="about-container">
            <?php if($title) : ?>
            <div class="about-heading">
                <h1>
                    <?= $title ?>
                </h1>
            </div>
            <?php endif; ?>
            <?php if($list) : ?>
            <div class="about-slider">
                <?php foreach($list as $item) : ?>
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
            <?php endif; ?>
            <div class="about-slider--counter">1/4</div>
        </div>
    </div>
</section>
<?php 
//add_action( 'wp_footer', 'apjScripts', 99, 1 );
if (!function_exists('apjScripts')) {
    function apjScripts()
    { ?>
<script async>
(function($) {

}(jQuery));
</script>
<?php }
}
