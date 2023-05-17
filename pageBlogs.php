<?php
/**
 * Template Name: Page Blogs (Full width)
 * Description: Page template full width
 *
 */

get_header();
?>
	<div class="page-blogs">
		<div class="head">
			<div class="bg1"></div>
			<div class="container">
				<div class="subtitle">SALTECH BLOG</div>
				<h2>BẠN CẦN HIỂU NỘI DUNG GÌ VỀ SALTECH</h2>
				<div class="search">
					<input type="text" placeholder="Tìm kiếm..." >
					<button class=""><i class="bi bi-search"></i></button>
				</div>
			</div>
			<div class="bg2"></div>
		</div>
		<div class="specialPost py-5">
			<div class="container">
				<h3>Góc Nhìn Mới Lạ</h3>
				<div class="list">
					<?php
					$sticky = get_option( 'sticky_posts' );
					$args = array(
						'post__in' => $sticky,
						'ignore_sticky_posts' => 1,
						'posts_per_page' => -1,
						'category_name' => 'goc-nhin',
					);
					query_posts( $args );
					
					if ( have_posts() ) :
						while ( have_posts() ) : the_post();
						?>
							<div class="item">
								<div class="img-wrap">
									<img src="<?= get_the_post_thumbnail() ?>" alt="">
								</div>
								<div class="content d-flex flex-column justify-content-between">
									<div class="top">
										<div class="tag">Ngày đăng: <?= get_the_date() ?></div>
										<a href="<?= the_permalink(  ) ?>" class="name"><?= get_the_title() ?></a>
									</div>
									<a href="<?= the_permalink(  ) ?>" class="more">Read more <i class="bi bi-chevron-double-right"></i></a>
								</div>
							</div>

							<?php 
						endwhile;
					endif;
					wp_reset_query(); ?>
				</div>
			</div>
		</div>
		
		<div class="listPost">
		<nav>
			<div class="nav nav-tabs" id="nav-tab" role="tablist">
				<button class="nav-link active" id="nav-all-tab" data-toggle="tab" data-target="#nav-all">Tất cả</button>
				<?php
					$args = array(
						'parent' => get_cat_ID('Góc nhìn')
					);
					$categories = get_categories( $args );
					foreach ( $categories as $category ) {
						echo '<button class="nav-link" id="nav-' . $category->slug . '-tab" data-toggle="tab" data-target="#nav-' . $category->slug . '" type="button" role="tab">' . $category->name . '</button>';
					}
				?>
			</div>
		</nav>
		<div class="tab-content" id="nav-tabContent">
			<div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab">
				<div class="container">
					<div class="list">
					<?php 
				$args = array(
					'category_name' => 'goc-nhin', // đổi 'goc-nhin' thành slug của danh mục bạn cần lấy
					'posts_per_page' => -1 // Lấy tất cả bài viết
				 );
				 
				 $posts_array = get_posts( $args ); // Lấy các bài viết thỏa mãn điều kiện
				 
				 foreach ($posts_array as $post) {
					setup_postdata( $post );
					?>
						<a href="<?= the_permalink(  ) ?>" class="item">
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
					<?php
				 }
				 
				 wp_reset_postdata(); // Khôi phục dữ liệu bài viết gốc?>
					</div>
				</div>
			</div>
			<?php
				foreach ( $categories as $category ) {
					$query_args = array(
						'category_name' => $category->slug,
						'post_type' => 'post',
						'post_status' => 'publish',
						'posts_per_page' => 3
					);
					$query = new WP_Query( $query_args );
					if ( $query->have_posts() ) {
						echo '<div class="tab-pane fade" id="nav-' . $category->slug . '" role="tabpanel" aria-labelledby="nav-' . $category->slug . '-tab">';
						echo '<div class="container">';
						echo '<div class="list">';
						while ( $query->have_posts() ) {
							$query->the_post();
							?>
							<a href="<?= the_permalink(  ) ?>" class="item">
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
							<?php
						}
						echo '</div>';
						echo '</div>';
						echo '</div>';
					}
					wp_reset_postdata();
				}
			?>
		</div>
		</div>
		<div class="hiringBanner">
			<div class="container">
				<div class="banner">
					<div class="row">
						<div class="col-lg-6">
							<h3 class="title">TITLE CỦA VIỆC TUYỂN DỤNG Ở SALTECH</h3>
							<span>“Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh    minim veniam, quis nostrud exerci tatio.</span>
							<a href="">Xem tin tuyển dụng <i class="bi bi-chevron-double-right"></i></a>
						</div>
						<div class="col-lg-6">
							<div class="img-wrap">
								<img src="https://saltech.webmau.net/wp-content/uploads/2023/03/Rectangle-155.webp" alt="">
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
		<div class="contact">
			<div class="container">
				<div class="formContact text-center">
					<div class="title">Cập nhật tin tức từ Saltech</div>
					<div class="input-group">
						<div class="input-group-prepend">
							<div class="input-group-text" id="basic1"><i class="bi bi-globe-americas"></i></div>
						</div>
						<input type="text" class="form-control" placeholder=" " aria-label="Username" aria-describedby="basic1">
						<label for="exampleName">Nhập domainn, tên miền phụ, URL</label>
					</div>
					<button>Đăng ký nhận tin</button>
				</div>
			</div>
		</div>
	</div>
<?php
get_footer();
