<?php

/**
 * "Stage" Block Template.
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
$className = 'w-st py-lg-5 py-3';

if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$isFullWidth = false;
if( !empty($block['align']) ) {
    $isFullWidth = $block['align'] === 'full' ? true : false;
    $className .= ' align-' . $block['align'];
}

// Load values and assign defaults.
$stages = get_field('stages');
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
<div class="w-stage">
        <div class="">
            <?php if($stages) : ?>
            <ul class="list-items" onmousedown="startDragging(event)" onmousemove="dragScroll(event)" onmouseup="stopDragging(event)">
                <?php foreach($stages as $item) : ?>
                <li class="stage-items">
                    <?php if($item['image']) : ?>
                    <div class="img-items">
                        <img src="<?= esc_url($item['image']['url']) ?>" alt="">
                    </div>
                    <?php endif; ?>
                    <div class="title-items"> 
                        <?= ($item['title']) ? '<span>'.$item['title'].'</span>' : '' ?>
                        <div class="title-text">
                        <?= ($item['content']) ? $item['content'] : '' ?>
                            
                        </div>
                    </div>
                </li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php 
add_action( 'wp_footer', 'stScripts', 99, 1 );
if (!function_exists('stScripts'))   {
    function stScripts() { ?>
        <script async>
            
            ( function ( $ ) {
                var marginLeft = $('.container').css('margin-left');
        console.log(marginLeft)
        $('.w-stage ul').css('padding-left',`calc(${marginLeft} + 15px)`)
                window.addEventListener('resize', function() {
        var marginLeft = $('.container').css('margin-left');
        console.log(marginLeft)
        $('.w-stage ul').css('padding-left',`calc(${marginLeft} + 15px)`)
    
        });
            }( jQuery ) );

            var container = document.querySelector('.list-items');
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
            const walk = (x - startX) * 3; // scroll speed
            container.scrollLeft = scrollLeft - walk;
            }
           
        </script>
    <?php }
}