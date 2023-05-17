
<?php

/**
 * "FAQ WITH CTA" Block Template.
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
$className = 'w-faqs-cta';

if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$isFullWidth = false;
if( !empty($block['align']) ) {
    $isFullWidth = $block['align'] === 'full' ? true : false;
    $className .= ' align-' . $block['align'];
}

// Load values and assign defaults.
$faqs = get_field('faqs');
$forms = get_field('forms');

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <div class="row justify-content-between">
            <?php if($faqs) : ?>
                <div class="col-lg-6">
                    <?php if($faqs['title']) : ?>
                        <div class="title mb-4 position-relative" style="z-index:2;">
                            <?= ($faqs['title']['small_text']) ? '<span>'.$faqs['title']['small_text'].'</span>' : '' ?>
                            <?= ($faqs['title']['name_title']) ? '<h2>'.$faqs['title']['name_title'].'</h2>' : '' ?>
                        </div>
                    <?php endif; ?>
                    <?php if($faqs['questions']) : ?>
                        <div class="w-accordion mx-md-3" id="accordion">
                            <?php foreach($faqs['questions'] as $key=>$item) : ?>
                            <div class="card mb-3">
                                <div class="card-header p-0" id="heading<?= $key ?>">
                                    <h2 class="mb-0">
                                        <button class="btn collapsed" type="button"  data-toggle="collapse" data-target="#collapse<?= $key ?>" aria-expanded="false" aria-controls="collapse<?= $key ?>" >
                                            <?= ($item['question']) ? $item['question'] : '' ?>
                                            <i class="bi bi-chevron-up"></i>
                                            <i class="bi bi-chevron-down"></i>
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapse<?= $key ?>" class="collapse" style="transition: all 0.3s ease-in-out;" data-parent="#accordion">
                                    <?php if($item['answer']) : ?>
                                    <div class="card-body px-0">
                                        <?= $item['answer'] ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                    
                </div>
                <?php if($faqs['main_image']) : ?>
                    <div class="col-lg-5">
                        <div class="imgMain img-wrap">
                            <img src="<?=  esc_url($faqs['main_image']['url']) ?>" alt="<? esc_attr($faqs['main_image']['alt']) ?>">
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            <div class="col-12">
                <div class="contentForm">
                    <div class="content">
                        <?php if($forms) : ?>
                        <div class="title">
                            <?php if($forms['small_text']) : ?>
                                <p> <?=$forms['small_text']?> </p>
                            <?php endif; ?>
                            <?php if($forms['title_name']) : ?>
                                <h2> <?=$forms['title_name']?> </h2>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                        <form action="">
                            <label for="">Đăng ký nhận kết quả đo lường Miễn phí.</label>
                            <div class="form-row">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php 
//add_action( 'wp_footer', 'faqWctaScripts', 99, 1 );
if (!function_exists('faqWctaScripts'))   {
    function faqWctaScripts() { ?>
        <script async>
            ( function ( $ ) {
                
            }( jQuery ) );
        </script>
    <?php }
}