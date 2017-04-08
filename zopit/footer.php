<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 */
?>

<footer id="footer">
	<div class="copy-right-text text-center">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<p><?php echo wp_kses_post( sprintf(
							__( 'Copyright &copy; %1$s %2$s. All rights reserved.<br>Powered by %3$s. Developed by %4$s', 'zopit' ),
							date_i18n( __( 'Y', 'zopit' ) ),
							'<a href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . esc_html( get_bloginfo( 'name' ) ) . '</a>',
							'<a href="https://wordpress.org">WordPress</a>',
							'<a href="http://theme77.com">Theme77</a>'
						) );
						?></p>
				</div>
			</div>
		</div>
	</div><!-- /Copyright Text -->
</footer><!-- /#Footer -->


<div class="scroll-up">
    <a href="#"><i class="fa fa-angle-up"></i></a>
</div>
<!-- Scroll Up -->

<?php wp_footer(); ?>

</body>
</html>
