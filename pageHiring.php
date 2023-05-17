<?php
/**
 * Template Name: Page Hiring (Full width)
 * Description: Page template full width
 *
 */


$banner = get_field('banner');

get_header();
?>
	<div class="pageHiring">
		<div class="banner img-wrap">
			<?php if($banner['image_banner']) : ?>
			<img src="<?= esc_url($banner['image_banner']['url']) ?>" alt="<?= esc_attr($banner['image_banner']['alt']) ?>">
			<?php endif; ?>
			<div class="head text-center">
				<?= ($banner['title'] ? '<h2>'.$banner['title'].'</h2>' : '') ?>
				<?= ($banner['subtitle'] ? '<span>'.$banner['subtitle'].'</span>' : '') ?>
			</div>
		</div>
		<div class="specialPost py-5">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<h2>Vị trí nổi bật</h2>
						<div class="list">
						<?php
						$sticky = get_option( 'sticky_posts' );
						$args = array(
							'post__in' => $sticky,
							'ignore_sticky_posts' => 1,
							'posts_per_page' => -1,
							'category_name' => 'tuyen-dung',
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
			</div>
		</div>

		<?php $listen = get_field('listen') ; ?>
		<div class="listenHiring">
			<div class="container">
				<div class="row justify-content-between align-items-center">
					<div class="col-lg-5">
						<?php if($listen['image']) : ?>
						<div class="img-wrap">
							<img src="<?= esc_url($listen['image']['url']) ?>" alt="<?= esc_attr($listen['image']['alt']) ?>">
						</div>
						<?php endif; ?>
					</div>
					<div class="col-lg-6">
						<div class="title">
							<?= ($listen['title']) ? '<h2>'.$listen['title'].'</h2>' : '' ?>
							
							<div class="content">
								<?= ($listen['content']) ? '<p>'.$listen['content'].'</p>' : '' ?>
								<?= ($listen['name']) ? '<span>'.$listen['name'].'</span>' : '' ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php $featured = get_field('featured'); ?>
		<div class="contentSlideHiring">
			<div class="contentHiring">
				<div class="container">
					<div class="row">
						<?php if($featured['content']) : ?>
						<div class="col-lg-6">
							<?= ($featured['content']['title']) ? '<h2>'.$featured['content']['title'].'</h2>' : '' ?>
							<?php if($featured['content']['list']) : ?>
							<ul class="item">
								<?php foreach($featured['content']['list'] as $item) : ?>
								<li>
									<?php if($item['icon']) : ?>
									<div class="icon">
										<img src="<?= esc_url($item['icon']['url']) ?>" class="img-fluid" alt="<?= esc_attr($item['icon']['alt']) ?>">
									</div>
									<?php endif; ?>
									<?= ($item['text']) ? '<p>'.$item['text'].'</p>'  : '' ?>
								</li>
								<?php endforeach; ?>
							</ul>
							<?php endif; ?>
							<?= ($featured['content']['detail']) ? '<p class="text">'.$featured['content']['detail'].'</p>' : '' ?>
						</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<?php if($featured['images']) : ?>
			<div class="slideHiring">
				<div class="list">
					<?php foreach($featured['images'] as $image) : ?>
						<?php if($image['image']) : ?>
						<div class="item img-wrap">
							<img src="<?= esc_url($image['image']['url']) ?>" alt="<?= esc_attr($image['image']['alt']) ?>">
						</div>
						<?php endif; ?>
					<?php endforeach; ?>
				</div>
			</div>
			<?php endif; ?>
		</div>
		<?php $dreamer = get_field('dreamer'); ?>
		<div class="dreamHiring">
			<div class="container">
				<?= ($dreamer['title']) ? '<h2>'.$dreamer['title'].'</h2>' : '' ?>
				<?php if($dreamer['list']) : ?>
				<div class="row justify-content-around">
					<?php foreach($dreamer['list'] as $item) : ?>
					<div class="col-lg-4 col-md-6">
						<div class="boxImg">
							<?php if($item['avatar']) : ?>
							<div class="d-block img-wrap">
								<img src="<?= esc_url($item['avatar']['url']) ?>" alt="<?= esc_attr($item['avatar']['alt']) ?>">
							</div>
							<?php endif; ?>
							<div class="content">
								<?= ($item['content']) ? '<span class="say">'.$item['content'].'</span>' : '' ?>
								<?= ($item['info']['name']) ? '<p>'.$item['info']['name'].'</p>' : '' ?>
								<?= ($item['info']['role']) ? '<span>'.$item['info']['role'].'</span>' : '' ?>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
		<?php $activity = get_field('activity'); ?>
		<div class="workHiring">
			<div class="container">
				<div class="row justify-content-between align-items-center">
					<?php if($activity['image']) : ?>
					<div class="col-lg-5">
						<div class="img-wrap">
							<img src="<?= esc_url($activity['image']['url']) ?>" alt="<?= esc_attr($activity['image']['alt']) ?>">
						</div>
					</div>
					<?php endif; ?>
					<?php if($activity['content']) : ?>
					<div class="col-lg-6">
						<?= ($activity['content']['title']) ? '<h2>'.$activity['content']['title'].'</h2>' : '' ?>
						<?= ($activity['content']['content_1']) ? '<p class="textOne">'.$activity['content']['content_1'].'</p>' : '' ?>
						<?php if($activity['content']['list']) : ?>
						<ul class="list">
							<?php foreach($activity['content']['list'] as $item) : ?>
							<li>
								<div class="icon"><img src="<?= get_stylesheet_directory_uri() . '/assets/images/Vector 80.webp' ?>" class="img-fluid" alt=""></div>
								<?= ($item['detail']) ? '<p>'.$item['detail'].'</p>' : '' ?>
								
							</li>
							<?php endforeach; ?>
						</ul>
						<?php endif; ?>
						<?= ($activity['content']['content_2']) ? '<p class="textTwo">'.$activity['content']['content_2'].'</p>' : '' ?>
					</div>
					<?php endif; ?>

				</div>
			</div>
		</div>

		<div class="allHiring">
			<div class="container">
				<h2>Tất cả tin tuyển dụng</h2>
				<div class="row">
					<div class="col-12">
						<div class="list">
						<?php 
							$args = array(
								'category_name' => 'tuyen-dung', // đổi 'goc-nhin' thành slug của danh mục bạn cần lấy
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
						<button class="loadmore d-flex align-item-center justify-content-center">Xem thêm <i class="bi bi-chevron-down ml-2"></i></button>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php
get_footer();
