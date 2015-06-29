<?php
/**
 * Template Name: Student Connections
 * The template for the Programs Page wo/Sidebar
 *
 */
?>
<?php get_header(); ?>
    <div id="interior_section">
        <div id="site_bleed" class="student">
            <div id="site_contain" style="overflow: auto;">
                <div id="site_content_contain">
                    <h1><?php the_title(); ?></h1>
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <?php the_content(); ?>
                    <?php endwhile; endif; ?>
                    <div id="clear"></div>
                </div>
            </div>
         </div>
        <div id="site_bleed" class="testimonials_section">
            <div id="site_contain">
                <h1>Testimonials</h1>
                <div id="success_testimonal">
                    <h2>Jacqueline W.</h2>
                    <p>&lsaquo;&lsaquo; After being laid off of my job of 25 years I returned to my passion; helping people with substance abuse problems, and HealthStaff Training Institute was there to provide all of the education and training that I would need. The staff at Healthstaff was very friendly, helpful, and supportive; they cared about me as an individual, as well as my becoming a great counselor. Thanks to Healthstaff I was hired by the facility where I did my internship a week before graduating. My experience at Healthstaff is invaluable and has changed my life. I now have a very rewarding career; helping people gain sobriety and live productive lives!»
                    </p>
                </div>
            </div>
        </div>

    </div>
<?php get_footer(); ?>