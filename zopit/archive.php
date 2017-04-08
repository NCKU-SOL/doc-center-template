<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

get_header(); ?>

<div class="container main-content">
	<div class="row">
		<div class="col-md-8">
			<div class="row">

				<header class="archive-header">
					<?php
					the_archive_title( '<div class="archive-title">', '</div>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
					?>
				</header>
				<!-- .page-header -->

				<div class="masonry_area">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'content', 'post' ); ?>

					<?php endwhile; ?>

						<div class="col-md-12">
							<div class="next-previous-posts">
								<?php the_posts_navigation(
									array(
										'prev_text' => __( '<div class="text-left"><i class="fa fa-angle-left"></i>	Older posts</div>', 'zopit' ),
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
		</div>

		<?php get_sidebar(); ?>

	</div>
</div>

<?php get_footer(); ?>
