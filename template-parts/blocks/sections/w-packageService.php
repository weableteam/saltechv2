
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
    <?php foreach($packets as $key=>$item) : ?>
        <div class="modal packet fade" id="Modal<?= $key ?>" tabindex="-1" role="dialog" aria-labelledby="<?= $key ?>ModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="myDiv" id="myDiv">
                            <div class="bg-div container">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <img src="<?=  get_stylesheet_directory_uri() . '/assets/images/logo 1.webp' ?>" alt="">
                                <div class="mydiv-bor">
                                    <ul>
                                        <?php if($item['detail']['hotline']) : ?>
                                        <li>
                                            <img src="<?=  get_stylesheet_directory_uri() . '/assets/images/a.svg' ?>" alt="">
                                            <div class="mydiv-name">
                                                <p>Phone:</p>
                                                <a href="tel:<?= $item['detail']['hotline'] ?>"> <?= $item['detail']['hotline'] ?></a>
                                            </div>
                                        </li>
                                        <?php endif; ?>
                                        <?php if($item['detail']['email']) : ?>
                                        <li>
                                            <img src="<?=  get_stylesheet_directory_uri() . '/assets/images/d.svg' ?>" alt="">

                                            <div class="mydiv-name">
                                                <p>Email:</p>
                                                <a href="mailto:<?= $item['detail']['email'] ?>"> <?= $item['detail']['email'] ?></a>
                                            </div>
                                        </li>
                                        <?php endif; ?>
                                        <?php if($item['detail']['address']) : ?>
                                        <li>
                                            <img src="<?=  get_stylesheet_directory_uri() . '/assets/images/b.svg' ?>" alt="">

                                            <div class="mydiv-name">
                                                <p>Address:</p>
                                                <a><?= $item['detail']['address'] ?></a>
                                            </div>
                                        </li>
                                        <?php endif; ?>

                                    </ul>
                                    
                                    <a href=" <?= ($item['detail']['link']) ? esc_url($item['detail']['link']['url']) : '#' ?>">
                                        <button><?= $item['name'] ?> <i class="bi bi-box-arrow-right"></i></button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
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