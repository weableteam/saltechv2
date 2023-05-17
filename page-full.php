<?php
/**
 * Template Name: Page (Full width)
 * Description: Page template full width
 *
 */

get_header();
?>
	<div class="wyswyg">
		<?php
		while ( have_posts() ) :
			the_post();

			the_content();
		endwhile;
		?>
	</div>
<?php
get_footer();
