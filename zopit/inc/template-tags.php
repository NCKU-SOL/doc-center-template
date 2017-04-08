<?php

//----------------------------------------------------------------------
//  Posted on
//----------------------------------------------------------------------

if ( ! function_exists( 'zopit_post_tag_list' ) ) {
	function zopit_post_tag_list() {
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'zopit' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'zopit' ) . '</span>', $tags_list );
		}

	}
}


if ( ! function_exists( 'zopit_posted_on' ) ) {
	function zopit_posted_on() { ?>
		<ul class="list-inline">
			<li>
                <span class="author vcard">
                    <?php _e( 'By ', 'zopit' );
                    printf( '<a class="url fn n" href="%1$s">%2$s</a>',
                        esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
                        esc_html( get_the_author() )
                    ) ?>
                </span>
			</li>

			<li>/</li>

			<li>
				<span class="posted-on"><?php
					$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
					if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
						$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated hidden" datetime="%3$s">%4$s</time>';
					}
					printf( $time_string,
						esc_attr( get_the_date( 'c' ) ),
						esc_html( get_the_date() ),
						esc_attr( get_the_modified_date( 'c' ) ),
						esc_html( get_the_modified_date() )
					);
					?></span>
			</li>
		</ul>
		<?php
	}
}