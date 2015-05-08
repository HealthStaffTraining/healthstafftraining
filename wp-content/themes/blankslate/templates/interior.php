<?php
/**
 * Template Name: Interior w/Sidebar
 * The template for the Interior Pages w/Sidebar
 *
 */

$hero = get_post_meta($post->ID, "Hero", true);
?>
<?php get_header(); ?>
<div id="interior_section">
    <div id="site_bleed">
        <div id="site_contain" style="overflow: auto;">
            <div id="site_content_contain">
                <?php if(strlen($hero)>1){ ?>
                    <div id="hero_banner"><img src="<?php echo $hero; ?>" class="hero_banner"></div>
                <?php } ?>
                <h1><?php the_title(); ?></h1>
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; endif; ?>
            </div>
            <div id="site_sidebar"><?php get_sidebar(); ?></div>
        </div>
    </div>
</div>
<?php get_footer(); ?>