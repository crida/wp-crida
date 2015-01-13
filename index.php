<?php
/**
 * The main template file
 *
 * @package La Crida
 * @since 0.1.0
 */
 
get_header(); ?>

<div id="main" class="section">
	<div class="container">
		<div id="primary" class="content-area">
			<div class="content-container">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content' ); ?>
				<?php endwhile; // end of the loop. ?>
			</div>
		</div><!-- #primary -->
	
		<?php get_sidebar(); ?>
	</div><!-- .container -->
</div><!-- #main -->

<?php get_footer(); ?>
