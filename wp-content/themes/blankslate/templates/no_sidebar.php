<?php
/**
 * Template Name: Interior
 * The template for the Interior Pages wo/Sidebar
 *
 */
?>
<?php get_header(); ?>
    <div id="interior_section">
        <div id="site_bleed">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; endif; ?>
        </div>
    </div>
<?php get_footer(); ?>