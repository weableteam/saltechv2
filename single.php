<?php
/**
 * The Template for displaying all single posts.
 */

get_header();

if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();

		get_template_part( 'content', 'single' );

		// If comments are open or we have at least one comment, load up the comment template
	endwhile;
endif;



/**
 * Add function to count views
 * @author https://stackoverflow.com/questions/12934161/show-view-count-of-a-post-on-wordpress
 */
customSetPostViews(get_the_ID());


get_footer();
