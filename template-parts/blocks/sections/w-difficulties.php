<?php

/**
 * "Difficulties" Block Template.
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
$className = 'w-diff pt-4';

if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$isFullWidth = false;
if( !empty($block['align']) ) {
    $isFullWidth = $block['align'] === 'full' ? true : false;
    $className .= ' align-' . $block['align'];
}

// Load values and assign defaults.
$top = get_field('top');
$image = get_field('image');

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="w-diff">
        <?php if($top) : ?>
        <div class="diff-header container">
            <?= ($top['tag']) ? '<p class="head1">'.$top['tag'].'</p>' : '' ?>
            <?= ($top['title']) ? '<h4>'.$top['title'].'</h4>' : '' ?>
            <?= ($top['content']) ? $top['content'] : '' ?>
        </div>
        <?php endif; ?>
        <?php if($image) : ?>
        <div class="diff-main scroll"  onmousedown="startDragging(event)" onmousemove="dragScroll(event)" onmouseup="stopDragging(event)">
            <div class="diff-note">
                <img src="<?=  get_stylesheet_directory_uri() . '/assets/images/dif-note.webp' ?>" alt="">
            </div>

            <div >
                <div class="item">
                    <img src="<?=  esc_url($image['url']) ?>" alt="">
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>
<?php 
add_action( 'wp_footer', 'diffScripts', 99, 1 );
if (!function_exists('diffScripts'))   {
    function diffScripts() { ?>
        <script async>
            ( function ( $ ) {
               
                
            }( jQuery ) );
            

            var container = document.querySelector('.scroll');
                var isDragging = false;
                var startX, scrollLeft;

                container.addEventListener('mouseenter', () => {
                container.classList.add('active');
                });

                container.addEventListener('mouseleave', () => {
                container.classList.remove('active');
                });

                function startDragging(e) {
                isDragging = true;
                startX = e.pageX - container.offsetLeft;
                scrollLeft = container.scrollLeft;
                }

                function stopDragging(e) {
                isDragging = false;
                }

                function dragScroll(e) {
                if (!isDragging) return;
                e.preventDefault();
                const x = e.pageX - container.offsetLeft;
                const walk = (x - startX) * 1; // scroll speed
                container.scrollLeft = scrollLeft - walk;
                }
        </script>
    <?php }
}