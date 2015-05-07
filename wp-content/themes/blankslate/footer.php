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
</body>
</html>