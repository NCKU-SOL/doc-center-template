<div class="col-md-6">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <?php if(has_post_thumbnail()) : ?>
            <div class="thumbnails">
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('zopit-post-thumbnails', array('class' => 'post-thumbnail img-responsive')); ?></a>
            </div>
        <?php endif; ?>


        <div class="padding-content">
            <header class="entry-header">
                <?php the_title( sprintf( '<h1 class="entry-title text-uppercase"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
            </header> <!--/.entry-header -->

            <?php if ( 'post' == get_post_type() ) : ?>
                <div class="entry-meta">
                    <?php zopit_posted_on(); ?>
                </div><!-- .entry-meta -->
            <?php endif; ?>

            <div class="entry-content">
                <?php the_excerpt(); ?>

                <?php
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . __( 'Pages:', 'zopit' ),
                    'after'  => '</div>',
                ) );
                ?>
            </div><!-- .entry-content -->
        </div>

    </article><!-- #post-## -->
</div>

