<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 */

get_header(); ?>

<div class="container main-content">
	<div class="row">
		<div class="col-md-8">
			<div class="row masonry_area">
				<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

					<?php get_template_part('content', 'post'); ?>

				<?php endwhile; ?>

					<div class="col-md-12">
						<div class="next-previous-posts">
							<?php the_posts_navigation(
								array(
									'prev_text' => __( '<div class="text-left"><i class="fa fa-angle-left"></i> Older posts</div>', 'zopit' ),
									'next_text' => __( '<div class="text-right">Newer posts <i class="fa fa-angle-right"></i></div>', 'zopit' ),
								)
							) ?>
						</div>
					</div>

				<?php else : ?>

					<?php get_template_part( 'content', 'none' ); ?>

				<?php endif; ?>
			</div>
		</div>

		<?php get_sidebar(); ?>

	</div>
</div>

<?php get_footer(); ?>
