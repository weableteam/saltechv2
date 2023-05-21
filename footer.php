			<?php
				// If Single or Archive (Category, Tag, Author or a Date based page)
				if ( is_single() || is_archive() ) :
			?>
					</div><!-- /.col -->

					<?php
					?>

				</div><!-- /.row -->
			<?php
				endif;
			?>
		</main><!-- /#main -->
		<footer id="footer" class="<?= (is_page_template('page-branding.php')) ? 'd-none' : '' ?>">
			<section class="align-full w-footer py-4 ">
				<div class="container">
					<div class="row">
						<div class="col-lg-2">
							<div class="logo text-lg-left text-center">
								<img src="https://saltech.webmau.net/wp-content/uploads/2023/05/logo-2.webp" alt="">
							</div>
						</div>
						<div class="col-lg-3 col-6">
							<div class="links">
								<h4>Dịch vụ</h4>
								<ul>
									<li><a href="">Quảng cáo GOOGLE ADS</a></li>
									<li><a href="">Thiết kế Website</a></li>
									<li><a href="">Nhận diện thương hiệu</a></li>
									<li><a href="">Truyền thông thương hiệu</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-3 col-6">
							<div class="links">
								<h4>Liên hệ</h4>
								<ul>
									<li><a href="">27 Division St, New York, NY</a></li>
									<li><a href="">550.000</a></li>
									<li><a href="">+1 800 123 5 6789</a></li>
									<li><a href="">Saltech.info@gmail.com</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-4 mt-lg-0 mt-5">
							<div class="contact">
								<h4>Theo dõi chúng tôi</h4>
								<ul>
									<li>
										<form class="d-flex align-items-center" action="">
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text" id="basic1"><i class="bi bi-globe-americas"></i></div>
												</div>
												<input type="text" class="form-control" placeholder=" " aria-label="Username" aria-describedby="basic1">
												<label for="exampleName">Nhập domainn, tên miền phụ, URL</label>
											</div>
											<button type="submit" class="btn "><i class="bi bi-send"></i></button>
										</form>
									</li>
									<li>
										<div class="text">Our expertise, as well as our passion for ADS, Design Web, Branding apart from other agencies.</div>
									</li>
									<li>
										<div class="socials d-flex align-items-center">
											<a href=""><i class="bi bi-instagram"></i></a>
											<a href=""><i class="bi bi-twitter"></i></a>
											<a href=""><i class="bi bi-facebook"></i></a>
											<a href=""><i class="bi bi-tiktok"></i></a>

										</div>
									</li>
								</ul>
								
							</div>
						</div>
					</div>
					
				</div>
			</section>
			<!-- <section class="align-full copyright">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-6">
							<p class="m-0 text-center text-lg-left mt-3 mt-lg-0"><?php printf( esc_html__( '&copy; %1$s %2$s. All rights reserved.', 'weable' ), date_i18n( 'Y' ), get_bloginfo( 'name', 'display' ) ); ?></p>
						</div>
						<div class="col-lg-6">
							<ul class="w-socials d-flex align-items-center list-unstyled mb-0 justify-content-center justify-content-lg-end">
								<?= ($fanpage = get_field('fanpage','option')) ? '<li class="fb"><a target="_blank" title="Fanpage của công ty TNHH giải pháp công nghệ Weable" href="'.$fanpage.'"><i class="bi bi-facebook"></i></a></li>' : '' ?>
								<?= ($twitter = get_field('twitter','option')) ? '<li class="twitter"><a target="_blank" title="Twitter của công ty TNHH giải pháp công nghệ Weable" href="'.$twitter.'"><i class="bi bi-twitter"></i></a></li>' : '' ?>
								<?= ($linkedin = get_field('linkedin','option')) ? '<li class="linkedin"><a target="_blank" title="Linkedin của công ty TNHH giải pháp công nghệ Weable" href="'.$linkedin.'"><i class="bi bi-linkedin"></i></a></li>' : '' ?>
								<?= ($youtube = get_field('youtube','option')) ? '<li class="youtube"><a target="_blank" title="Youtube của công ty TNHH giải pháp công nghệ Weable" href="'.$youtube.'"><i class="bi bi-youtube"></i></a></li>' : '' ?>
								<?= ($pinterest = get_field('pinterest','option')) ? '<li class="pinterest"><a target="_blank" title="Pinterest của công ty TNHH giải pháp công nghệ Weable" href="'.$pinterest.'"><i class="bi bi-pinterest"></i></a></li>' : '' ?>
								<?= ($instagram = get_field('instagram','option')) ? '<li class="instagram"><a target="_blank" title="Instagram của công ty TNHH giải pháp công nghệ Weable" href="'.$instagram.'"><i class="bi bi-instagram"></i></a></li>' : '' ?>
								<?= ($git = get_field('git','option')) ? '<li class="git"><a target="_blank" title="Kho lưu trữ source code dự án của công ty TNHH giải pháp công nghệ Weable" href="'.$git.'"><i class="bi bi-github"></i></a></li>' : '' ?>
							</ul>
						</div>
					</div>
				</div>
			</section> -->
		</footer>

	
        <button class="toTop"><i class="bi bi-arrow-up-short"></i></button>
        <div class="modal pj fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="pageShowProject-bg  p-0">
                        <div class="container">
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
                </div>
            </div>
        </div>
     
	<?php
		wp_footer();
	?>
</body>
</html>
