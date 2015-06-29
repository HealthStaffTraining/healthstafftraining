<?php get_header(); ?>
    <div id="interior_section">
    <div id="site_bleed">
    <div id="site_contain" style="overflow: auto;">
    <div id="site_content_contain">
<section id="content" role="main">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'entry' ); ?>
<?php endwhile; endif; ?>
<footer class="footer">
<?php get_template_part( 'nav', 'below-single' ); ?>
</footer>
</section>
    </div>
        <div id="site_sidebar"><?php get_sidebar(); ?></div>
    </div>
    </div>
    </div>
<?php get_footer(); ?>