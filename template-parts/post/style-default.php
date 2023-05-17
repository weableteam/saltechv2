<?php
/**
 * Default post style
 * 
 * @author Weable team
 */
?>
<div class="w-blog-item__default d-block shadow p-2 rounded-16">
    <a href="<?= get_the_permalink() ?>" target="_blank" class="d-block img-wrap rounded-16">
        <?= get_the_post_thumbnail($post, 'full', array('class' => 'rounded-16','alt' => esc_attr(get_the_title()), 'title' => esc_attr(get_the_title()))) ?>
    </a>
    <?php
        $post_categories = get_the_terms( get_the_id() , 'category' );
        foreach ($post_categories as $term) :
            echo '<a target="_blank" href="'.get_term_link($term).'" class="btn btn-sm btn-primary mt-3 mb-2 text-white">'.$term->name.'</a>';
        endforeach;
    ?>
    <h5>
        <a href="<?= get_the_permalink() ?>" target="_blank" title="<?= get_the_title() ?>">
            <?= get_the_title() ?>
        </a>
    </h5>
    <p class="decs mb-0">
        <?php echo wp_trim_words( wp_trim_excerpt(), 30, '...' ); ?>
    </p>
    <div class="divider my-2"></div>
    <div class="post-infos d-flex justify-content-between">
        <?php $author_id=get_post_field('post_author', get_the_ID());?>
        <a href="<?= esc_url( get_author_posts_url( $author_id )) ?>" class="auth d-flex align-items-center text-gray" title="<?= get_the_author_meta( 'display_name' , $author_id ); ?>" target="_blank">
            <img src="<?= esc_attr(get_avatar_url($author_id, ['size' => '60'])) ?>" alt="<?= get_the_author_meta( 'display_name' , $author_id ); ?>" class="rounded-circle mr-1 img-fluid">
            <span class="auth"><?= get_the_author_meta( 'display_name' , $author_id ); ?></span>
        </a>
        <?php 
            $post_views_count = get_post_meta(get_the_ID(), 'post_views_count', true );
            if ( ! empty( $post_views_count ) ) {
                echo '<div class="views d-flex align-items-center">';
                echo '<i class="bi bi-eye mr-1"></i> <span>'. $post_views_count.'</span>';
                echo '</div>';
            } else {
                echo '<div class="views d-flex align-items-center">';
                echo '<span>Chưa có lượt xem</span>';
                echo '</div>';
            }
        ?>
    </div>
</div>