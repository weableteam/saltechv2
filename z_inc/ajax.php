
<?php 


add_action('wp_ajax_nopriv_z_do_ajax', 'z_do_ajax');
add_action('wp_ajax_z_do_ajax', 'z_do_ajax');

function z_do_ajax(){
    global $cu;
    $res = array('mes' => 'ajax-processed');
    $_action = $_POST['_action'];
    $_code = $_POST['_code'];
    $_email = $_POST['_email'];
    $res['mes'] = '';
    $email = get_field('email','option');



    if( $_action == 'info' ):
        // Load Values
        $_phone = $_POST['_id'];
        $project_id = $_phone; // Giả sử $_phone là ID của dự án bạn đã lấy được

        // Truy vấn để lấy dự án từ ID
        $args = array(
            'post_type' => 'du-an', // Thay 'project' bằng tên của custom post type bạn đang sử dụng
            'post_status' => 'publish',
            'p' => $project_id, // ID của dự án
        );
        
        $query = new WP_Query($args);
        
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                $thumbnail = get_field('banner');
                $content = get_field('content');
                $postthumb = get_the_post_thumbnail_url();
                $imagehtml = '';
                $catehtml = '';
                $relatedhtml = '';

                $post_id = get_the_ID(); // Lấy ID của bài viết hiện tại

                $taxonomy = 'linh-vuc-du-an'; // Tên của taxonomy "lĩnh vực dự án"
                
                // Lấy danh sách các đối tượng danh mục con của bài viết
                $child_categories = get_the_terms($post_id, $taxonomy);
                
                if (!empty($child_categories) && !is_wp_error($child_categories)) {
                    $category_ids = array(); // Mảng chứa ID của danh mục con
                    foreach ($child_categories as $child_category) {
                        $child_category_name = $child_category->name; // Tên danh mục con
                        $child_category_slug = $child_category->slug; // Slug của danh mục con
                        $catehtml .= '<span style="color:#B6DCE0">#'.$child_category_name.'</span>';
                        // Thêm ID của danh mục con vào mảng
                        $category_ids[] = $child_category->term_id;
                    }
                
                    $related_args = array(
                        'post_type' => 'du-an', // Loại bài viết, thay đổi nếu cần
                        'posts_per_page' => 3, // Số bài viết cần lấy
                        'post__not_in' => array($post_id),
                        'tax_query' => array(
                            array(
                                'taxonomy' => $taxonomy,
                                'field' => 'term_id',
                                'terms' => $category_ids,
                                'include_children' => false, // Không bao gồm danh mục con của danh mục con
                            ),
                        ),
                    );
                    $related_posts = get_posts($related_args);
                    foreach ($related_posts as $related_post) {
                        $related_post_id = $related_post->ID;
                        $related_post_title = $related_post->post_title;
                        $related_post_excerpt = get_the_excerpt($related_post_id);
                        $related_post_thumbnail = get_the_post_thumbnail_url($related_post_id);
                        $relatedhtml .= '
                        <a href="#" class="link-prj" project-id="'.$related_post_id.'" >
                            <div class="foot-pj_img">
                                <img src="'.$related_post_thumbnail.'" alt="">
                                <div class="foot-pj_name">
                                    <p>'.$related_post_title.'</p>
                                    <div class="foot-pj_span">
                                        <span>'.$related_post_excerpt.'</span>
                                        <span>'.$catehtml.'</span>
                                    </div>
                                </div>
                            </div>
                        </a>';
                    }
                    wp_reset_postdata(); 
                }
                

                if($thumbnail['video_link']){
                    $video = $thumbnail['video_link'];
                } else $video = '';
                
                if($content['images']){
                    foreach($content['images'] as $image){
                        if($image['image']){
                            $imagehtml .= ' <img class="grid1" src="'.esc_url($image['image']['url']).'" alt="">';
                        }
                    }
                }

                $result = '
                <div class="pageShowProject-bg  p-0">
                        <div class="container">
                            <div class="pageShowProject">
                                <div class="show-video">
                                    <div class="show-video_link">
                                        <a href="">
                                            <img src="'.$postthumb.'" alt="">
                                        </a>
                                        <div class="show-video_title">
                                            <h6 class="text-light">'.get_the_title().'</h6>
                                            '.$catehtml.'
                                        </div>
                                    </div>
                
                                    <video style="width:100%" controls>
                                        <source src="'.$video.'">
                                    </video>
                
                                    <div class="show-video_socal">
                                        <div class="socal-top">
                                            <ul>
                                                <li>
                                                    <a href=""><i class="bi bi-instagram"></i></a>
                                                </li>
                                                <li>
                                                    <a href=""><i class="bi bi-facebook"></i></a>
                                                </li>
                                                <li>
                                                    <a href=""><i class="bi bi-twitter"></i></a>
                                                </li>
                                                <li>
                                                    <a href=""><i class="bi bi-tiktok"></i></a>
                                                </li>
                                            </ul>
                                            <span>Share</span>
                                        </div>
                                        <div class="socal-bot">
                                            <div class="socal-bot_icon">
                                                <a href=""><i class="bi bi-wechat"></i></a>
                                            </div>
                                            <span>Contact</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pageShowProject-silver">
                                <!-- grid -->
                                <div class="showPj-grid">'.$imagehtml.'
                                </div>
                            </div>
                        </div>
                        <div class="show-foot">
                            <div class="show-foot_ct container">
                                <div class="foot-title">
                                    '.$catehtml.'
                                    <h3>CÁC DỰ ÁN TƯƠNG TỰ KHÁC CÙNG LĨNH VỰC</h3>
                                </div>
                                <div class="foot-pj">
                                   '.$relatedhtml.'
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>  
                    jQuery(function ($) {
                        $(".link-prj").click(function(event) {

                            var id = $(this).attr("project-id");
                            console.log(id);
                            var t = $(this);
                            event.preventDefault();
                            $.ajax({
                            type: "POST",
                            url: zing.ajax_url,
                            dataType: "json",
                            data: t.serialize() + "&action=z_do_ajax&_action=info&_id=" + id,
                            beforeSend: function () {
                            },
                            success: function (res) {
                                console.log(res)
                                $(".pj .modal-content").html(res)
                                $(".pj").modal("show")
                
                            }
                        });
                    });
                  });
                
                    </script> 
                    ';
                 $res = $result;
                // Sử dụng thông tin dự án theo ý của bạn
                // ...
            }
            
            wp_reset_postdata();
        } else {
            // Không tìm thấy dự án với ID đã cho
            // Xử lý tình huống này
        }
        
       
    endif;


   
    wp_send_json( $res );
    die();
}
?>