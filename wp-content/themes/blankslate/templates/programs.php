<?php
/**
 * Template Name: Programs
 * The template for the Programs Page wo/Sidebar
 *
 */
?>
<?php get_header(); ?>
    <div id="interior_section">
        <div id="site_bleed">
            <div id="site_contain" style="overflow: auto;">
                <div id="site_content_contain">
                    <h1><?php the_title(); ?></h1>
                    <div id="program_nav"><?php wp_nav_menu( array( 'theme_location' => 'prog-1', 'menu_class' => 'prog-menu' ) ); ?></div>
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                            <?php the_content(); ?>
                        <?php endwhile; endif; ?>
                </div>
            </div>
         </div>
    </div>
<?php get_footer(); ?>