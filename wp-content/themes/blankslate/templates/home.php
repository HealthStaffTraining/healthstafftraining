<?php
/**
 * Template Name: Home Page
 * The template for the home page
 *
 */
$phone = get_post_meta($post->ID, "phone", true);
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width" />
    <title><?php wp_title(' | ', true, 'right'); ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
    <?php wp_head(); ?>
    <script language="javascript">
        jQuery( document ).ready(function() {
            // Handler for .ready() called
            // CLICK FUNCTIONS
            jQuery("#site_logo, #foot_logo").click(function(){
                window.location.assign("/");
            });
            jQuery("#student_login").click(function(){
                window.location.assign("/");
            });

            jQuery(".catalog").click(function(){
                window.location.assign("/");
            });

            jQuery(".schedule").click(function(){
                window.location.assign("/");
            });

            jQuery(".apply").click(function(){
                window.location.assign("/");
            });

            jQuery(".campus").click(function(){
                window.location.assign("/");
            });

            jQuery("#discover_button, #discover_more").click(function(){
                window.location.assign("/");
            });

            jQuery("#Admin__Clinical_Medical_Assistant").click(function(){
                window.location.assign("/");
            });
            jQuery("#Administrative_Medical_Assistant").click(function(){
                window.location.assign("/");
            });
            jQuery("#Clinical_Medical_Assistant").click(function(){
                window.location.assign("/");
            });
            jQuery("#Computerized_Office__Accounting").click(function(){
                window.location.assign("/");
            });jQuery("#Drug_and_Alcohol_Counseling").click(function(){
                window.location.assign("/");
            });
            jQuery("#Drug_and_Alcohol_Counseling_Online").click(function(){
                window.location.assign("/");
            });
            jQuery("#Pharmacy_Technician").click(function(){
                window.location.assign("/");
            });
            jQuery("#Pharmacy_Technician_Online").click(function(){
                window.location.assign("/");
            });
            jQuery(".social_adviser, .social_chat").click(function(){
                window.location.assign("/");
            });
            jQuery(".social_facebook").click(function(){
                window.location.assign("/");
            });
            jQuery(".social_twitter").click(function(){
                window.location.assign("/");
            });
            jQuery(".social_apply").click(function(){
                window.location.assign("/");
            });
            jQuery(".social_campus").click(function(){
                window.location.assign("/");
            });

            // MOUSE OVER FUNCTIONS
            jQuery("#student_login").mouseover(function(){
                jQuery("#student_login").css({ 'background-color': '#eaeaea', 'color': '#000' });
            });
            jQuery("#student_login").mouseout(function() {
                jQuery("#student_login").css({ 'background-color': '#ffffff', 'color': '#000' });
            });

            jQuery(".standard_button").mouseover(function(){
                jQuery(".standard_button").css({ 'background-color': '#eaeaea', 'color': '#000' });
            });
            jQuery(".standard_button").mouseout(function() {
                jQuery(".standard_button").css({ 'background-color': '', 'color': '#000' });
            });

            jQuery("#discover_button").mouseover(function(){
                jQuery("#discover_button").css({ 'background-color': '#94cd17', 'color': '#000' });
            });
            jQuery("#discover_button").mouseout(function() {
                jQuery("#discover_button").css({ 'background-color': '', 'color': '#000' });
            });

            // THIS FIXES THE STRUGGLE BETWEEN WORDPRESS's FIXED NAV AND OURS
            <?php if ( is_user_logged_in() ) { ?>
            //jQuery("#nav_wrapper").css("top", "25px");
            <?php } ?>

            // THIS OVERWRITES THE WORDPRESS NAV
            jQuery("#menu-item-39 a").html("Why HealthStaff<br><span class='small_nav'>The right choice</span>");
            jQuery("#menu-item-38 a").html("Programs & Courses<br><span class='small_nav'>Your education</span>");
            jQuery("#menu-item-37 a").html("Admissions<br><span class='small_nav'>Get started today</span>");
            jQuery("#menu-item-36 a").html("Student Connections<br><span class='small_nav'>Teamwork</span>");
            jQuery("#menu-item-35 a").html("HealthStaff News<br><span class='small_nav'>Announcements</span>");
            jQuery("#menu-item-34 a").html("Contact Us<br><span class='small_nav'>Get started today</span>");
            /*
            jQuery("#menu-item-157").on("click", function(e){
                e.preventDefault();
                // click code here
                //scrollTo("about_wrapper");
            });
            */

        });

        function alertTop(){
            var scrolltop = jQuery(window).scrollTop();
            alert(scrolltop);
        }

    </script>
</head>
<body <?php body_class(); ?>>
<div id="head_wrapper">
    <div id="site_bleed">
        <div id="headBack_l"></div>
        <div id="headBack_r"></div>
        <div id="site_contain">
            <div id="site_logo"></div>
            <div id="student_login">Student Login</div>
            <div id="site_phone"><?php echo $phone; ?><br><span style="font-size: .7em;">Call Us Today!</span></div>
        </div>
    </div>
</div>
<div id="nav_wrapper">
    <div id="site_bleed">
        <div id="site_contain"><div id="navMenu"><?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_class' => 'nav-menu' ) ); ?></div></div>
    </div>
</div>
<div id="hero_section">
    <div id="site_bleed">
        <div id="site_contain">
            <div id="form_section"><div id="form_container"><?php echo do_shortcode( '[jf_form]' ); ?></div></div>
            <div id="hero"><img src="/wp-content/themes/blankslate/images/hero1.png"></div>
            <div id="discover_button">Discover More</div>
            <div id="home_content">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; endif; ?>
            </div>
            <div id="subLinkSection">
                <div id="subLink" class="catalog">Download Catalog</div>
                <div id="subLink" class="schedule">Course Schedule</div>
                <div id="subLink" class="apply">Apply Online</div>
                <div id="subLink" class="campus">Campus Finder</div>
            </div>
        </div>
    </div>
</div>
<div id="program_section">
    <div id="site_bleed">
        <div id="site_contain">
            <h1>Programs & Courses</h1>
            <div id="discover_more" class="standard_button">Discover More</div>
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
<div id="footer_wrapper">
    <div id="site_bleed">
        <div id="site_contain">
            <div id="foot_logo"></div>
            <div id="social_section">
                <div id="social_item" class="social_adviser">Talk to<br>an adviser</div>
                <div id="social_item" class="social_chat"><?php echo $phone; ?><br>chat with us</div>
                <div id="social_item" class="social_facebook">Become a Fan<br><span class="sub_social">Facebook</span></div>
                <div id="social_item" class="social_twitter">Follow Us<br><span class="sub_social">Twitter</span></div>
                <div id="social_item" class="social_apply">Apply<br><span class="sub_social">Online</span></div>
                <div id="social_item" class="social_campus">Campus<br><span class="sub_social">Finder</span></div>
            </div>
            <div id="footer_menu"><?php wp_nav_menu( array( 'theme_location' => 'footer-1', 'menu_class' => 'footer-menu' ) ); ?></div>
        </div>
    </div>
    <footer id="footer" role="contentinfo">
        <div id="copyright">
            <?php
            echo sprintf(__('%1$s %2$s %3$s. All Rights Reserved.', 'blankslate'), '&copy;', date('Y'), esc_html(get_bloginfo('name')));
            ?>
        </div>
    </footer>
    <?php wp_footer(); ?>
</div>
</body>
</html>