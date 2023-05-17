<?php

/**
 * "Drop W Image" Block Template.
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
$className = 'w-dropWimage py-5';

if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$isFullWidth = false;
if( !empty($block['align']) ) {
    $isFullWidth = $block['align'] === 'full' ? true : false;
    $className .= ' align-' . $block['align'];
}

// Load values and assign defaults.
$list = get_field('list');
$image = get_field('image');

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-lg-6">
                <?php if($list) : ?>
                <div class="accordion" id="accordionExample">
                    <?php foreach($list as $key=>$item) : ?>
                    <div class="card">
                        <div class="card-header" id="heading<?= $key ?>">
                            <h2 class="mb-0">
                                <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse"
                                    data-target="#collapse<?= $key ?>" aria-expanded="true" aria-controls="collapse<?= $key ?>">
                                    <?= $item['title'] ?>
                                    <div class="procedure">
                                        <?= ($item['tag']) ? '<p>'.$item['tag'].'</p>' : '' ?>
                                        <div class="view">
                                            <div class="hide">
                                                <span>hide</span>
                                                <i class="bi bi-arrow-up"></i>
                                            </div>
                                            <div class="show">
                                                <span>view</span>
                                                <i class="bi bi-arrow-down"></i>
                                            </div>
                                        </div>
                                    </div>
                                </button>
                            </h2>
                        </div>
                        <div id="collapse<?= $key ?>" class="collapse" aria-labelledby="heading<?= $key ?>"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                <?= $item['content'] ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-12 col-lg-6">
                <div class="img-wrap img-right">
                    <img src="<?= get_stylesheet_directory_uri() . '/assets/images/Group 564.webp' ?>" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<?php 
//add_action( 'wp_footer', 'dropWimageScripts', 99, 1 );
if (!function_exists('dropWimageScripts'))   {
    function dropWimageScripts() { ?>
<script async>
(function($) {}(jQuery));
</script>
<?php }
}