<?php
/**
 * Template Name: Home Page
 * The template for the home page
 *
 */
?>
<?php get_header(); ?>
<div id="hero_section">
    <div id="site_bleed">
        <div id="site_contain">
            <div id="hero"></div>
            <div id="discover_button">Discover More</div>
            <div id="home_content">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; endif; ?>
            </div>
        </div>
    </div>
</div>
<div id="program_section">
    <div id="site_bleed">
        <div id="site_contain">
            <h1>Programs & Courses</h1>
            <div id="pgrm_section">
                <?php echo do_shortcode( '[program_list]' ); ?>
            </div>
        </div>
    </div>
</div>
<div id="benefits_section">
    <div id="site_bleed">
        <div id="site_contain">
            <h1>HealthStaff Benefits</h1>
            <div id="ben_edu" class="fourth"><div id="ben_padding"><h2>Superior Education</h2><p>With an innovative approach, Healthstaff has grown from an upstart to become an educational leader providing classes on and offline leading the way in education.</p></div></div>
            <div id="ben_staff" class="fourth"><div id="ben_padding"><h2>Dedicated Staff</h2><p>With both real-world and academic experiences, healthstaff's faculty emerges itself fully in each students education process.</p></div></div>
            <div id="ben_plans" class="fourth"><div id="ben_padding"><h2>Affordable Plans</h2><p>Education should be affordable and attainable which is why Healthstaff provides several payment options and your own Education Loan Consultants to walk you through the process.</p></div></div>
            <div id="ben_students" class="fourth"><div id="ben_padding"><h2>Inspired Students</h2><p>The promise of a new career path, Healthstaff is there to help you make a future. See what these students had to say.</p></div></div>
        </div>
    </div>
</div>
<div id="success_wrapper">
    <div id="site_bleed">
        <div id="site_contain">
            <h1>Success Stories</h1>
            <div id="success_testimonal">
                <h2>Jacqueline W.</h2>
                <p>&lsaquo;&lsaquo; After being laid off of my job of 25 years I returned to my passion; helping people with substance abuse problems, and HealthStaff Training Institute was there to provide all of the education and training that I would need. The staff at Healthstaff was very friendly, helpful, and supportive; they cared about me as an individual, as well as my becoming a great counselor. Thanks to Healthstaff I was hired by the facility where I did my internship a week before graduating. My experience at Healthstaff is invaluable and has changed my life. I now have a very rewarding career; helping people gain sobriety and live productive lives!»
                </p>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>