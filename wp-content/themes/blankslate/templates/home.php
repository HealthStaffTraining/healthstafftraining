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
            jQuery("#site_logo").click(function(){
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


            // MOUSE OVER FUNCTIONS
            jQuery("#student_login").mouseover(function(){
                jQuery("#student_login").css({ 'background-color': '#eaeaea', 'color': '#000' });
            });
            jQuery("#student_login").mouseout(function() {
                jQuery("#student_login").css({ 'background-color': '#ffffff', 'color': '#000' });
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
            <div id="subLinkSection">
                <div id="subLink" class="catalog">Download Catalog</div>
                <div id="subLink" class="schedule">Course Schedule</div>
                <div id="subLink" class="apply">Apply Online</div>
                <div id="subLink" class="campus">Campus Finder</div>
            </div>
        </div>
    </div>
</div>
<div id="footer_wrapper">
    <div id="site_bleed">
        <div id="site_contain">
            <h1>Get in touch<br>with us.</h1>
            <h2>1180 SW 36th Avenue, Suite 208<br>Pompan Beach, FL 33069<br><?php echo $phone; ?><br><a href="mailto: info@nuovometo.com">info@nuovometo.com</a></h2>
            <div align="center" style="margin-bottom: 20px;">
                <div id="footer_facebook"></div>
                <div id="footer_twitter"></div>
                <div id="footer_blog"></div>
            </div>
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