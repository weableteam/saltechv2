
<?php

/**
 * "Contact" Block Template.
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
$className = 'w-contact mb-5';

if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$isFullWidth = false;
if( !empty($block['align']) ) {
    $isFullWidth = $block['align'] === 'full' ? true : false;
    $className .= ' align-' . $block['align'];
}

// Load values and assign defaults.
$image = get_field('image');
$title_form = get_field('title_form');

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
       <div class="container">
        <div class="contact">
            <div class="row align-items-center">
                <div class="col-lg-4">
                    <?php if($image) : ?>
                    <div class="img-content">
                        <img class="img-fluid" src="<?= esc_url($image['url']) ?>" alt="<?= esc_attr($image['alt']) ?>">
                    </div>
                    <?php endif; ?>
                </div>
                <div class="col-lg-8">
                    <?= ($title_form) ? '<h3 class="title">'.$title_form.'</h3>' : '' ?>
                    
                    <form action="#" class="form-register d-flex align-items-center">
                            <div class="row w-100">
                                <div class="col-lg-7">
                                    <div class="input-group group-input-web flex-nowrap align-items-center">
                                        <div class="input-group-prepend">
                                            <i class="bi bi-envelope"></i>
                                        </div>
                                    
                                        <div class="form-input">
                                            <input type="text" name="text" autocomplete="off" required />
                                            <label for="text" class="label-name"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="input-group input-telephone flex-nowrap align-items-center"> 
                                        <div class="input-group-prepend icon-telephone">
                                            <i class="bi bi-telephone"></i>
                                        </div>
                                        <input type="text" class="input-phone" placeholder=" "  name="phone" autocomplete="off" required >
                                        <label for="phone" class="phone-number">Nhập số điện thoại</label>
                                    </div>
                                </div>
                            </div>
                            <button class="submit"><i class="bi bi-send"></i></button>
                        </form> 
                </div>
            </div>
        </div>
    </div>
</section>
<?php 
add_action( 'wp_footer', 'contactScripts', 99, 1 );
if (!function_exists('contactScripts'))   {
    function contactScripts() { ?>
        <script async>
            ( function ( $ ) {
                
            }( jQuery ) );
        </script>
    <?php }
}