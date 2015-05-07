<?php
/**
 * Template Name: Interior w/Sidebar
 * The template for the Interior Pages w/Sidebar
 *
 */
?>
<?php get_header(); ?>
<div id="interior_section">
    <div id="site_bleed">
        <div id="site_contain">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; endif; ?>
        </div>
    </div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>