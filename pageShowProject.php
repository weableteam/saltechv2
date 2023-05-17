<?php
/**
 * Template Name: Page Show Project (Full width)
 * Description: Page template full width
 *
 */

get_header();
?>
	<div class="pageShowProject-bg container p-0">
		<div class="pageShowProject">
			<div class="show-video">
				<div class="show-video_link">
					<a href="">
						<img src="<?=  get_stylesheet_directory_uri() . '/assets/images/Rectangle 90 (1).webp' ?>" alt="">
					</a>
					<div class="show-video_title">
						<h6 class="text-light">Warner Chappell Music</h6>
						<span style="color:#B6DCE0">#Branding</span>
					</div>
				</div>

				<video style="width:100%" controls>
					<source src="<?=  get_stylesheet_directory_uri() . '/assets/images/pageshowproject-video.mp4' ?>">
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
			<div class="showPj-grid">
				<img class="grid1" src="<?=  get_stylesheet_directory_uri() . '/assets/images/showbg-text1.webp' ?>" alt="">
				<img class="grid2" src="<?=  get_stylesheet_directory_uri() . '/assets/images/image20.webp' ?>" alt="">
				<img class="grid3" src="<?=  get_stylesheet_directory_uri() . '/assets/images/Rectangle186.webp' ?>" alt="">
				<img class="grid4" src="<?=  get_stylesheet_directory_uri() . '/assets/images/image21.webp' ?>" alt="">
				<img class="grid5" src="<?=  get_stylesheet_directory_uri() . '/assets/images/image31.webp' ?>" alt="">
				<img class="grid6" src="<?=  get_stylesheet_directory_uri() . '/assets/images/showbg-text2.webp' ?>" alt="">
				<img class="grid7" src="<?=  get_stylesheet_directory_uri() . '/assets/images/image23.webp' ?>" alt="">
				<img class="grid8" src="<?=  get_stylesheet_directory_uri() . '/assets/images/image22.webp' ?>" alt="">
				<img class="grid9" src="<?=  get_stylesheet_directory_uri() . '/assets/images/image25.webp' ?>" alt="">
				<img class="grid10" src="<?=  get_stylesheet_directory_uri() . '/assets/images/image26.webp' ?>" style="padding: 1.5rem .8rem .8rem 1.5rem;" alt="">
				<img class="grid11" src="<?=  get_stylesheet_directory_uri() . '/assets/images/image27.webp' ?>" style="padding: 1.5rem 1.5rem .8rem .8rem;" alt="">
				<img class="grid12" src="<?=  get_stylesheet_directory_uri() . '/assets/images/image28.webp' ?>" style="padding: .8rem .8rem 1.5rem 1.5rem;" alt="">
				<img class="grid13" src="<?=  get_stylesheet_directory_uri() . '/assets/images/image29.webp' ?>" style="padding: .8rem 1.5rem 1.5rem .8rem;" alt="">
				<img class="grid14" src="<?=  get_stylesheet_directory_uri() . '/assets/images/image30.webp' ?>" alt="">
				<img class="grid15" src="<?=  get_stylesheet_directory_uri() . '/assets/images/image24.webp' ?>" alt="">
				<img class="grid16" src="<?=  get_stylesheet_directory_uri() . '/assets/images/image32.webp' ?>" alt="">
				<img class="grid17" src="<?=  get_stylesheet_directory_uri() . '/assets/images/image33.webp' ?>" alt="">
            </div>
		</div>

		<div class="show-foot">
			<div class="show-foot_ct container">
				<div class="foot-title">
					<span>#BRANDING</span>
					<h3>CÁC DỰ ÁN TƯƠNG TỰ KHÁC CÙNG LĨNH VỰC</h3>
				</div>

				<div class="foot-pj">
					<a href="">
						<div class="foot-pj_img">
							<img src="<?=  get_stylesheet_directory_uri() . '/assets/images/listitem5.webp' ?>" alt="">
							<div class="foot-pj_name">
								<p>iTalentBrigde</p>
								<div class="foot-pj_span">
									<span>Client: Nguyễn Chi Mai - VN</span>
									<span>Logo - Branding</span>
								</div>
							</div>
						</div>
					</a>

					<a href="">
						<div class="foot-pj_img">
							<img src="<?=  get_stylesheet_directory_uri() . '/assets/images/listitem2.webp' ?>" alt="">
							<div class="foot-pj_name">
								<p>iTalentBrigde</p>
								<div class="foot-pj_span">
									<span>Client: Nguyễn Chi Mai - VN</span>
									<span>Logo - Branding</span>
								</div>
							</div>
						</div>
					</a>

					<a href="">
						<div class="foot-pj_img">
							<img src="<?=  get_stylesheet_directory_uri() . '/assets/images/listitem3.webp' ?>" alt="">
							<div class="foot-pj_name">
								<p>iTalentBrigde</p>
								<div class="foot-pj_span">
									<span>Client: Nguyễn Chi Mai - VN</span>
									<span>Logo - Branding</span>
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
<?php
get_footer();
