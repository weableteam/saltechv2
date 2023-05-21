<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<?php wp_head(); ?>
</head>

<?php
	$navbar_scheme   = get_theme_mod( 'navbar_scheme', 'navbar-white bg-white' ); // Get custom meta-value.
	$navbar_position = get_theme_mod( 'navbar_position', 'static' ); // Get custom meta-value.

	$search_enabled  = get_theme_mod( 'search_enabled', '1' ); // Get custom meta-value.
?>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<a href="#main" class="sr-only sr-only-focusable"><?php esc_html_e( 'Skip to main content', 'weable' ); ?></a>

<div id="wrapper" >
	<header  class="<?= (is_page_template('page-ads.php')) ? 'trans' : '' ?> <?= (is_page_template('page-branding.php')) ? 'd-none' : '' ?>">
		<nav id="header" class="  <?=  (is_single() || is_page_template('page-Projects.php')) || is_page_template('page-abs.php') || is_page_template('pageBlogs.php') || (is_page_template('pageHiring.php')) || (is_page_template('pageShowProject.php')) || (is_page_template('page-google.php')) || (is_page_template('pageBlogDetail.php'))  ? 'nofix' : '' ?> py-3 navbar navbar-expand-md <?php echo esc_attr( $navbar_scheme ); if ( isset( $navbar_position ) && 'fixed_top' === $navbar_position ) : echo ' fixed-top'; elseif ( isset( $navbar_position ) && 'fixed_bottom' === $navbar_position ) : echo ' fixed-bottom'; endif; if ( is_home() || is_front_page() ) : echo ' home'; endif; ?>">
			<div class="container-fluid">
				<a class="navbar-brand" href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<?php
						$header_logo = get_theme_mod( 'header_logo' ); // Get custom meta-value.

						if ( ! empty( $header_logo ) ) :
					?>
						
						<img src="<?= (is_page_template('page-ads.php')) ? 'https://saltech.webmau.net/wp-content/uploads/2023/05/Group-1.webp' : esc_url( $header_logo ) ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
					<?php
						else :
							echo esc_attr( get_bloginfo( 'name', 'display' ) );
						endif;
					?>
				</a>

				<div id="navbar" class="navbar d-none d-lg-flex p-0">
					<?php
						// Loading WordPress Custom Menu (theme_location).
						wp_nav_menu(
							array(
								'theme_location' => 'main-menu',
								'container'      => '',
								'menu_class'     => 'navbar-nav mr-auto',
								'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
								'walker'         => new WP_Bootstrap_Navwalker(),
							)
						);

						if ( '1' === $search_enabled ) :
					?>
							<form class="form-inline search-form my-2 my-lg-0" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
								<div class="input-group">
									<input type="text" name="s" class="form-control" placeholder="<?php esc_attr_e( 'Search', 'weable' ); ?>" title="<?php esc_attr_e( 'Search', 'weable' ); ?>" />
									<div class="input-group-append">
										<button type="submit" name="submit" class="btn btn-outline-secondary"><?php esc_html_e( 'Search', 'weable' ); ?></button>
									</div>
								</div>
							</form>
					<?php
						endif;
					?>
				</div>

				<div class="header-btns d-none d-lg-block" role="group">
					<a href="" class="d-flex align-items-center">
						<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
							<g clip-path="url(#clip0_1627_1449)">
							<path d="M17.1382 6.73343C21.3782 7.26676 24.6982 10.5868 25.2316 14.8268C25.3116 15.5068 25.8849 16.0001 26.5516 16.0001C26.6049 16.0001 26.6582 16.0001 26.7116 15.9868C27.4449 15.8934 27.9649 15.2268 27.8716 14.4934C27.1916 9.04009 22.9116 4.76009 17.4582 4.08009C16.7249 4.00009 16.0582 4.52009 15.9782 5.25343C15.8849 5.98676 16.4049 6.65343 17.1382 6.73343ZM17.6449 9.54676C16.9382 9.36009 16.2049 9.78676 16.0182 10.5068C15.8316 11.2268 16.2582 11.9468 16.9782 12.1334C18.3782 12.4934 19.4716 13.5868 19.8449 15.0001C20.0049 15.6001 20.5382 16.0001 21.1382 16.0001C21.2449 16.0001 21.3649 15.9868 21.4716 15.9601C22.1782 15.7734 22.6049 15.0401 22.4316 14.3334C21.8049 11.9734 19.9782 10.1468 17.6449 9.54676ZM25.6049 20.3468L22.2182 19.9601C21.4049 19.8668 20.6049 20.1468 20.0316 20.7201L17.5782 23.1734C13.8049 21.2534 10.7116 18.1734 8.79156 14.3868L11.2582 11.9201C11.8316 11.3468 12.1116 10.5468 12.0182 9.73343L11.6316 6.37343C11.4716 5.02676 10.3382 4.01343 8.97823 4.01343H6.67156C5.1649 4.01343 3.91156 5.26676 4.0049 6.77343C4.71156 18.1601 13.8182 27.2534 25.1916 27.9601C26.6982 28.0534 27.9516 26.8001 27.9516 25.2934V22.9868C27.9649 21.6401 26.9516 20.5068 25.6049 20.3468Z" fill="white"/>
							</g>
							<defs>
							<clipPath id="clip0_1627_1449">
							<rect width="32" height="32" fill="white"/>
							</clipPath>
							</defs>
						</svg>
						0366 315 542
					</a>
				</div>

				<div class="mobile-right d-flex d-lg-none align-items-center">
					
					<div class="hamburger-menu d-block d-lg-none" id="hamburger-menu">
						<div class="menu-bar1"></div>
						<div class="menu-bar2"></div>
						<div class="menu-bar3"></div>
					</div>
				</div><!-- /.Icon menu mobie & mobile cart item -->

			</div><!-- /.container -->
		</nav><!-- /#header -->
		
		<div class="m-menu d-lg-none d-block">
			<a class="navbar-brand" href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				<?php
					$header_logo = get_theme_mod( 'header_logo' ); // Get custom meta-value.

					if ( ! empty( $header_logo ) ) :
				?>
					<img src="<?php echo esc_url( $header_logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
				<?php
					else :
						echo esc_attr( get_bloginfo( 'name', 'display' ) );
					endif;
				?>
			</a>
			<?php 
				wp_nav_menu(
					array(
						'theme_location' => 'mobile-menu',
						'container'      => '',
						'menu_class'     => 'navbar-nav mr-auto',
						'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
						'walker'         => new WP_Bootstrap_Navwalker(),
					)
				);
			?>
		</div><!-- /.Mobile menu container -->		
		<div class="overlay"></div>
	</header>

	<main id="main" class="w-builder" <?php if ( isset( $navbar_position ) && 'fixed_top' === $navbar_position ) : echo ' style="padding-top: 57px;"'; elseif ( isset( $navbar_position ) && 'fixed_bottom' === $navbar_position ) : echo ' style="padding-bottom: 100px;"'; endif; ?>>
		<?php
			// If Single or Archive (Category, Tag, Author or a Date based page).
			if ( is_single() || is_archive() ) :
		?>
			<div class="row">
				<div class="col-12">
		<?php
			endif;
		?>
