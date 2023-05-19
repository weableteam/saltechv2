<?php

/**
 * "Gallery" Block Template.
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
$className = 'w-gl';

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
<div class="mt-4">
        <div class="container ps_re">
           <div class="row">
                <div class="col-md-12">
                    <p class="w-vl-p_title">
                        Gallery
                    </p>
                </div>
           </div>
           <div class="wrapper">
            <div class="slider-container">
              <div class="slides-numbers" style="display: block">
                <span class="active">01</span> / <span class="total"></span>
              </div>
              <div class="slider-holder row">
                <div class="col-md-4">
                  <div class="item ">
                    <div class="media-wrap">
                      <img
                        src="<?=  get_stylesheet_directory_uri() . '/assets/images/aitem_silder.png' ?>" class="img-fluid"
                        alt=""
                      />
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="item ">
                    <div class="media-wrap">
                      <img
                        src="<?=  get_stylesheet_directory_uri() . '/assets/images/aitem_silder.png' ?>" class="img-fluid"
                        alt=""
                      />
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="item ">
                    <div class="media-wrap">
                      <img
                        src="<?=  get_stylesheet_directory_uri() . '/assets/images/aitem_silder.png' ?>" class="img-fluid"
                        alt=""
                      />
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="item ">
                    <div class="media-wrap">
                      <img
                        src="<?=  get_stylesheet_directory_uri() . '/assets/images/aitem_silder.png' ?>" class="img-fluid"
                        alt=""
                      />
                    </div>
                  </div>
                </div>
               
                
                
            </div>
          </div>
        </div>
    </div>
</section>
<?php 
//add_action( 'wp_footer', 'glScripts', 99, 1 );
if (!function_exists('glScripts'))   {
    function glScripts() { ?>
        <script async>
            ( function ( $ ) {
                
            }( jQuery ) );
        </script>
    <?php }
}


