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
                    <div id="clear"></div>
                </div>
            </div>
         </div>
        <div id="site_bleed" class="grey_back">
            <div id="site_contain" style="overflow: auto;">
                <div id="site_thirds" class="prog_courses">
                    <div id="padding">
                    <h3>Courses & Degrees</h3>
                    <ul>
                        <li>Drug & Alcohol Counseling</li>
                        <li>Clinical & Administrative Medical Asst.</li>
                        <li>Administrative Medical Assistant</li>
                        <li>Clinical Medical Assistant</li>
                        <li>Computerized Office & Accounting</li>
                        <li>Pharmacy Technician</li>
                    </ul>
                    </div>
                </div>
                <div id="site_thirds" class="prog_schedule">
                    <div id="padding">
                    <h3>Superior Education</h3>
                    <p>With an innovative approach, Healthstaff has grown from an upstart to become an educational leader providing classes on and offline leading the way in education.</p>
                    </div>
                </div>
                <div id="site_thirds" class="prog_financial">
                    <div id="padding">
                    <h3>Financial Aid</h3>
                    <p>You deserve a quality education at an affordable price. Healthstaff has many financial options to help you finance your education. Our Education Loan Consultants can help you select the right plan of action for you. For more information, contact us.</p>
                    </div>
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
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; endif; ?>
    </div>
<?php get_footer(); ?>