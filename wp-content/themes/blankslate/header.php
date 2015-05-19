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
                        window.location.assign("http://moodle1.healthstafftraining.com/");
                    });

                    jQuery(".catalog").click(function(){
                        window.location.assign("/catalog/");
                    });

                    jQuery(".apply").click(function(){
                        window.location.assign("/contact-us/");
                    });

                    jQuery(".campus").click(function(){
                        window.location.assign("/contact-us/");
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
                        window.location.assign("/contact-us/");
                    });
                    jQuery(".social_facebook").click(function(){
                        window.location.assign("https://www.facebook.com/healthstafftraining");
                    });
                    jQuery(".social_twitter").click(function(){
                        window.location.assign("http://twitter.com/#!/HealthStaff_TI");
                    });
                    jQuery(".social_apply").click(function(){
                        window.location.assign("/contact-us/");
                    });
                    jQuery(".social_campus").click(function(){
                        window.location.assign("/contact-us/");
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
            <?php
            $phone = get_post_meta($post->ID, "phone", true);
            if(strlen($phone) < 2){
                $phone = "951.694.4784";
            }
            ?>
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
                <div id="site_contain">
                    <div id="navMenu"><?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_class' => 'nav-menu' ) ); ?></div>
                    <div id="form_section"><div id="form_container"><?php echo do_shortcode( '[jf_form]' ); ?></div></div>
                </div>
            </div>
        </div>
        <div id="sublink_section">
            <div id="site_bleed">
                <div id="site_contain">
                    <div id="subLinkSection">
                        <div id="subLink" class="catalog">Download Catalog</div>
                        <div id="subLink" class="campus">Campus Finder</div>
                    </div>
                </div>
            </div>
        </div>