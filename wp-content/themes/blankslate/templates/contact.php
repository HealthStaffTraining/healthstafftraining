<?php
/**
 * Template Name: Contact Page
 * The template for the Interior Pages w/Sidebar
 *
 */

$hero = get_post_meta($post->ID, "Hero", true);
?>
<?php get_header(); ?>
<div id="interior_section">
    <div id="site_bleed">
        <div id="site_contain" style="overflow: auto;">
                <?php if(strlen($hero)>1){ ?>
                    <div id="hero_banner"><img src="<?php echo $hero; ?>" class="hero_banner"></div>
                <?php } ?>
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; endif; ?>
        </div>
    </div>
    <div id="site_bleed" class="grey_back" style="margin: 0px; padding: 0px;"><?php echo do_shortcode( '[contactMap]' ); ?></div>
    <div id="site_bleed" class="grey_back">
        <div id="site_contain" style="text-align: left;">
            <?php echo do_shortcode( '[jf_contact]' ); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>