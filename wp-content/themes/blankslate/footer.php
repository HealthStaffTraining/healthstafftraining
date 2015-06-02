<?php $phone = get_post_meta($post->ID, "phone", true); ?>
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
​<!-- Google Code for Remarketing Tag --> <!-------------------------------------------------- Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. See more information and instructions on how to setup the tag on: http://google.com/ads/remarketingsetup ---------------------------------------------------> <script type="text/javascript"> /* <![CDATA[ */ var google_conversion_id = 968958676; var google_custom_params = window.google_tag_params; var google_remarketing_only = true; /* ]]> */ </script> <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js"> </script> <noscript> <div style="display:inline;"> <img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/968958676/?value=0&amp;guid=ON&amp;script=0"/> </div> </noscript>
</body>
</html>