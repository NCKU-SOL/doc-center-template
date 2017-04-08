<?php
/**
 * The template for displaying all single posts and attachments
 *
 */

get_header(); ?>

<div class="container main-content">
	<div class="row">
		<div class="col-md-8">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'single' ); ?>

				<?php get_template_part( 'user-profile' ); ?>

				<?php the_post_navigation( array(
					'prev_text' => __( '<i class="fa fa-angle-left"></i> Previous Post', 'zopit' ),
					'next_text' => __( 'Next Post <i class="fa fa-angle-right"></i>', 'zopit' ),
				) ); ?>

				<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || get_comments_number() ) : ?>
					<div class="comment-box">
						<?php comments_template(); ?>
					</div>
				<?php endif; ?>

			<?php endwhile; ?>

			<?php else : ?>

				<?php get_template_part( 'content', 'none' ); ?>

			<?php endif; ?>
		</div>

		<?php get_sidebar(); ?>

	</div>
</div>

<?php get_footer(); ?>
