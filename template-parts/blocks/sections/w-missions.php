<?php

/**
 * "Missions" Block Template.
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
$className = 'w-ms';

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
        <div class="row">
            <div class="col-lg-7 col-md-12">
                <div class="mission-container">
                    <div class="mission-heading-wrapper">
                        <h2 class="mission-heading">OUR MISSION</h2>
                    </div>
                    <div class="mission-content">
                        <div class="mission-left">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Duis porta bibendum sem. In vitae mi gravida, tempus neque
                                eu, interdum risus. Ut tincidunt diam sed dolor mattis
                                sollicitudin. Donec aliquam laoreet diam id vehicula.
                                Suspendisse odio lorem, fermentum ac justo sit amet,
                                fermentum tristique ligula. Nam fringilla auctor nunc id
                                pulvinar.
                            </p>
                            <ul class="mission-list">
                                <li><a href="#" class="mission-item">Cáiwwhasn</a></li>
                                <li><a href="#" class="mission-item">Hisuaozn</a></li>
                                <li><a href="#" class="mission-item">Couhsirahsa</a></li>
                            </ul>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Duis porta bibendum sem. In vitae mi gravida, tempus neque
                                eu, interdum risus. Ut tincidunt dia
                            </p>
                        </div>
                        <div class="mission-right">
                            <div class="mission-right-item">
                                <img src="http://localhost:10041/wp-content/uploads/2023/05/mision-bottom.webp"
                                    alt="" />
                            </div>
                            <div class="mission-right-item">
                                <img src="http://localhost:10041/wp-content/uploads/2023/05/mision-top.webp" alt=""
                                    class="mission-icon" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-12 people-mb">
                <div class="mision-people">
                    <div class="mision-people-image">
                        <img src="http://localhost:10041/wp-content/uploads/2023/05/mision-right.webp" alt="" />
                    </div>
                    <img src="http://localhost:10041/wp-content/uploads/2023/05/Ellipse-38.webp" alt=""
                        class="mision-people-img" />
                    <img src="http://localhost:10041/wp-content/uploads/2023/05/Ellipse-38.webp" alt=""
                        class="mision-people-img" />
                    <img src="http://localhost:10041/wp-content/uploads/2023/05/Ellipse-38.webp" alt=""
                        class="mision-people-img" />
                    <img src="http://localhost:10041/wp-content/uploads/2023/05/Ellipse-38.webp" alt=""
                        class="mision-people-img" />
                    <img src="http://localhost:10041/wp-content/uploads/2023/05/Ellipse-38.webp" alt=""
                        class="mision-people-img" />
                    <img src="http://localhost:10041/wp-content/uploads/2023/05/Ellipse-38.webp" alt=""
                        class="mision-people-img" />
                </div>
            </div>
        </div>
    </div>
</section>
<?php 
//add_action( 'wp_footer', 'msScripts', 99, 1 );
if (!function_exists('msScripts'))   {
    function msScripts() { ?>
<script async>
(function($) {

}(jQuery));
</script>
<?php }
}