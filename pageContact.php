<?php
/**
 * Template Name: Page Contact (Full width)
 * Description: Page template full width
 *
 */

get_header();
?>
	<div class="pageContact ">
		<div class="container d-flex">
			<div class="contact-left">
				<h1>Contact Us</h1>
				
				<div class="fix-contact">
					<div class="ct-left_img">
						<img src="<?=  get_stylesheet_directory_uri() . '/assets/images/pagecontact-map.webp' ?>" alt="">
						<img src="<?=  get_stylesheet_directory_uri() . '/assets/images/pagecontact-dress.webp' ?>" alt="">
					</div>

					<div id="contact-tab" class="contact-right">
						<div class="ct-right_note">LỜI NHẮN CHO ĐỘI NGŨ SALTECH</div>

						<div class="title-input active">
							<div class="title-icon">
								<i class="bi bi-envelope"></i>
							</div>
							<input type="text" placeholder=" ">
							<label for="">Nhập Email của bạn</label>

						</div>

						<div class="title-input">
							<div class="title-icon">
								<i class="bi bi-telephone"></i>
							</div>
							<input type="text" placeholder=" ">
							<label for="">Nhập số điện thoại</label>
						</div>

						<div class="title-input">
							<div class="title-icon">
								<i class="bi bi-wechat"></i>
							</div>
							<input type="text" placeholder=" ">
							<label for="">Lời nhắn của bạn</label>
						</div>

						<div class="title-get">
							<button>Gởi lời nhắn <span><i class="bi bi-chevron-double-right"></i></span></button> 
						</div>
					</div>
				</div>

				<div class="ct-left_bottom">
					<ul class="inf-title">
						<li>
							<span>address</span>
							<p>27 Division St, New York, NY</p>
						</li>
						<li>
							<span>Hotline</span>
							<p>+1 800 123 5 6789</p>
						</li>
						<li>
							<span>Email</span>
							<p>Saltech.info@gmail.com</p>
						</li>
					</ul>
					
					<div class="ct-left_inf">
						<ul class="inf-socal">
							<li><a href=""><i class="bi bi-instagram"></i></a></li>
							<li><a href=""><i class="bi bi-twitter"></i></a></li>
							<li><a href=""><i class="bi bi-facebook"></i></a></li>
							<li><a href=""><i class="bi bi-tiktok"></i></a></li>
						</ul>

						<div class="inf-since">2015-2023</div>
					</div>
				</div>

				<div class="contact-act">
					<img src="<?=  get_stylesheet_directory_uri() . '/assets/images/contact-act.webp' ?>" alt="">		
				</div>
			</div>


		</div>
	</div>
<?php
get_footer();
