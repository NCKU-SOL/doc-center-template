<?php
// Template Name: Left Sidebar Page
get_header(); ?>

<div class="container main-content">
	<div class="row">
		<div class="col-md-4">
			<div class="primary-sidebar widget-area" role="complementary">
				<?php dynamic_sidebar('blog-sidebar'); ?>
			</div>
		</div>

		<div class="col-md-8">
			<?php while(have_posts()) : the_post(); ?>

				<?php get_template_part('content', 'page'); ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || get_comments_number() ) : ?>
						<div class="comment-box">
							<?php comments_template(); ?>
						</div>
					<?php endif;
					?>

			<?php endwhile; ?>
		</div>

	</div>
</div>

<?php get_footer(); ?>
