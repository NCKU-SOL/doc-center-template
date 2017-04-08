<?php
/**
 * The template for displaying 404 pages (not found)
 *
 */

get_header(); ?>

<div class="container main-content">
	<div class="row">
		<div class="col-md-12">
			<section class="error-404 not-found text-center">
				<h1 class="404"><?php _e('404', 'zopit') ?></h1>
				<p class="lead"><?php _e('Sorry, we could not found the page you are looking for!', 'zopit') ?></p>

				<div class="row">
					<div class="col-sm-4 col-sm-offset-4">
						<?php get_search_form(); ?>
					</div>
				</div>

			</section><!-- .error-404 -->
		</div>

	</div>
</div>

<?php get_footer(); ?>

