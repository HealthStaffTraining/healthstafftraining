<?php
/**
 * Template Name: Blank
 * A blank, white template
 *
 */
?>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <?php the_content(); ?>
    <?php endwhile; endif; ?>
