<?php get_header(); ?>
    <div id="interior_section">
        <div id="site_bleed">
            <div id="site_contain" style="overflow: auto;">
                <div id="site_content_contain">
<section id="content" role="main">
<header class="header">
<h1 class="entry-title"><?php _e( 'Category Archives: ', 'blankslate' ); ?><?php single_cat_title(); ?></h1>
<?php if ( '' != category_description() ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . category_description() . '</div>' ); ?>
</header>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'entry' ); ?>
<?php endwhile; endif; ?>
<?php get_template_part( 'nav', 'below' ); ?>
</section>
    </div>
    <div id="site_sidebar"><?php get_sidebar(); ?></div>
    </div>
    </div>
    </div>
<?php get_footer(); ?>