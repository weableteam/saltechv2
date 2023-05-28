
<?php

/**
 * "Package Service" Block Template.
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
$className = 'w-packageService';

if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$isFullWidth = false;
if( !empty($block['align']) ) {
    $isFullWidth = $block['align'] === 'full' ? true : false;
    $className .= ' align-' . $block['align'];
}

// Load values and assign defaults.
$title_gr = get_field('title_group');
$packets = get_field('packets');

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <div class="package-text">
            <?= ($title_gr['subtitle']) ? '<p>'.$title_gr['subtitle'].'</p>' : '' ?>
            <?= ($title_gr['title']) ? '<h4>'.$title_gr['title'].'</h4>' : '' ?>
        </div>
        <?php if($packets) : ?>
        <div class="package-content">
            <?php foreach($packets as $key=>$item) : ?>
                <div class="package-list" type="button" data-toggle="modal" data-target="#Modal<?=$key?>">
                    <div id="css-radius1" class="pack-top" >
                        <?php if($item['image']) : ?>
                        <div class="pack-img">
                            <img src="<?= esc_url($item['image']['url']) ?>" alt="<?= esc_attr($item['image']['alt']) ?>">
                        </div>
                        <?php endif; ?>
                        <?= ($item['name']) ? '<h5>'.$item['name'].'</h5>' : '' ?>
                    </div>

                    <div id="css-radius2" class="pack-bot" >
                        <?php if($item['features']) : ?>
                        <ul>
                            <?php foreach($item['features'] as $detail) : ?>
                                <?php if($detail['detail']) : ?>
                                    <li><?= $detail['detail'] ?></li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                        <?php if($item['price']) : ?>
                        <div class="pack-price">
                            <p>CHỈ TỪ</p>
                            <p><?= $item['price'] ?></p>
                        </div>
                        <?php endif; ?>
                        <button>
                            <div class="pack-bt1">
                                <img src="<?=  get_stylesheet_directory_uri() . '/assets/images/pack-mess.webp' ?>" alt="">
                            </div>
                            <span>Nhận tư vấn </span>
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
           

        </div>
        <?php endif; ?>
    </div>
</section>
	<!-- popup packageService -->
    <div class="modal packet fade show" id="Modal0" tabindex="-1" aria-labelledby="0ModalLabel" aria-modal="true" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="myDiv" id="myDiv">
                        <div class="bg-div container">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <img decoding="async" src="http://saltech.local/wp-content/themes/weable/assets/images/logo 1.webp" alt="">
                            <div class="mydiv-bor">
                                <form action="">
                                    <div class="form-group text-left">
                                        <label for="inputPhone">Số điện thoại</label>
                                        <input type="text" class="form-control" id="inputPhone">
                                    </div>
                                    <div class="form-group text-left">
                                        <label for="inputEmail">Email</label>
                                        <input type="email" class="form-control" id="inputEmail">
                                    </div>
                                    <div class="form-group text-left">
                                        <label for="input3">Ngành hàng</label>
                                        <input type="text" class="form-control" id="input3">
                                    </div>
                                    <div class="form-group text-left">
                                        <label for="textarea">Lời nhắn</label>
                                        <textarea class="form-control" id="textarea" rows="3"></textarea>
                                    </div>
                                    <button type="submit" class="btn">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php 
add_action( 'wp_footer', 'packetServiceScripts', 99, 1 );
if (!function_exists('packetServiceScripts'))   {
    function packetServiceScripts() { ?>
        <script async>
            ( function ( $ ) {
          
                });    
        </script>

        
    <?php }
}