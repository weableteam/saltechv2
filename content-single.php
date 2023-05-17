<?php
/**
 * The template for displaying content in the single.php template
 */
?>
<div class="pageBlogDetail ">
		<div class="detail-img">
			<img src="<?=  get_stylesheet_directory_uri() . '/assets/images/pagrDetail-img.webp' ?>" alt="">
		</div>
		<div class="detail-ct">
			<!-- <div class="detail-menu">Menu</div> -->
			<div class="row justify-content-center">
				<!-- <div class="col-3">
					<div class="nav flex-column nav-pills detail-left" id="v-blogDetail-tab" role="tablist" aria-orientation="vertical">
						<div class="detail-light active" id="v-blogDetail-home-tab" data-toggle="pill" data-target="#v-blogDetail-home" role="tab" aria-controls="v-blogDetail-home" aria-selected="true">Black history is being written every</div>
						<div class="detail-light" id="v-blogDetail-profile-tab" data-toggle="pill" data-target="#v-blogDetail-profile" role="tab" aria-controls="v-blogDetail-profile" aria-selected="false">Teru is both a team</div>
						<div class="detail-light" id="v-blogDetail-messages-tab" data-toggle="pill" data-target="#v-blogDetail-messages" role="tab" aria-controls="v-blogDetail-messages" aria-selected="false">He combines his traditiona</div>
						<div class="detail-light" id="v-blogDetail-settings-tab" data-toggle="pill" data-target="#v-blogDetail-settings" role="tab" aria-controls="v-blogDetail-settings" aria-selected="false">The end</div>
					</div>
				</div>
				 -->
				<div class="col-7">
					<div class="tab-content" id="v-blogDetail-tabContent">
						<div class="tab-pane fade show active" id="v-blogDetail-home" role="tabpanel" aria-labelledby="v-blogDetail-home-tab">
							<div class="detail-main">
								<div class="main1">
									Content: <?= get_the_author( ) ?>
								</div>
								<h3>
								<?= get_the_title(  ) ?>
								</h3>
								<div class="main3">
									<?php 
									$categories = get_the_category();
									foreach ($categories as $category) {
										echo '<span style="margin-right: 1rem">#'.$category->name.'</span>';
									}?>
									<span>
									<?php
									$date = get_the_date();
									$formatted_date = date_i18n( 'd M, Y', strtotime( $date ) );
									echo $formatted_date;
									?>
									</span>
								</div>
								<div class="main4">
									<?= the_content( ) ?>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="detail-blog">
			<div class="detail-blog_top">
				<h3>bài viết liên quan</h3>
				<div class="light-h3"></div>
			</div>
			<div class="detail-blog_bot">
			<?php
			// Lấy thông tin bài viết hiện tại
			$current_post_id = get_the_ID();
			$current_category = get_the_category($current_post_id);

			// Lấy các bài viết liên quan
			$related_posts = get_posts(array(
				'posts_per_page' => 3, // Số bài viết liên quan muốn lấy
				'category' => $current_category[0]->term_id, // ID của chuyên mục hiện tại
				'post__not_in' => array($current_post_id), // Không lấy bài viết hiện tại
			));

			// In ra tiêu đề các bài viết liên quan
			foreach ($related_posts as $post) {
				setup_postdata($post);
				?>
					<div class="items-blogs">
								<a href="<?= the_permalink(  ) ?>">
									<div class="img-wrap">
										<img src="<?= get_the_post_thumbnail_url() ?>" alt="">
										<div class="hoverAni">
											<i class="bi bi-arrow-right"></i>
										</div>
									</div>	
									<div class="content d-flex">
										<div class="date text-center">
											<span><?= get_the_date('n-Y'); ?></span>
											<span><?= get_the_date('d') ?></span>	
										</div>
										<div class="name">
											<div class="tagWrap d-flex align-items-center justify-content-between">
												<div class="author"><?= get_the_author(  ) ?></div>
												<?php 
												$categories = get_the_category();
												foreach ($categories as $category) {
													echo '<div class="tag">#'.$category->name.'</div>';
												}?>
											</div>
											<h4><?= get_the_title(  ) ?></h4>
										</div>
									</div>
								</a>
							</div>	
				<?php
			}
			wp_reset_postdata();
			?>

				
			</div>
		</div>

		<div class="detail-foot">
			<h5>Cập nhật tin tức từ Saltech</h5>

			<div class="title-input">
				<div class="title-icon">
					<i class="bi bi-envelope"></i>
				</div>
				<input type="text" placeholder=" ">
				<label for="exampleName">Nhập Email của bạn</label>
			</div>

			<button>Đăng ký nhận tin </button>
		</div>
	</div>
