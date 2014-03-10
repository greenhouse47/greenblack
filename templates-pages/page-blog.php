<?php
/**
 * Template Name: Page - Blog Template
 * Description: Displays blog posts with pagination and featured image.
 *
 * @package WordPress
 * @subpackage Bootstrap
 */
get_header(); ?>
<div class="container">
    <div class="row">
        <div class="span12">
            <?php if (function_exists('bootstrapwp_breadcrumbs')) {
                bootstrapwp_breadcrumbs();
            } ?>
        </div>
    </div><!--/.row -->

    <div class="row content">
        <div class="span8">
            <?php while (have_posts()) : the_post(); ?>
                <header class="page-title">
                    <h1><?php the_title();?></h1>
                </header>

                <?php the_content(); ?>
                <hr/>

            <?php // reset the loop
            endwhile;
            wp_reset_query(); ?>

            <?php // Blog post query
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            query_posts(array('post_type' => 'post', 'paged' => $paged, 'showposts' => 0));
            if (have_posts()) : while (have_posts()) : the_post(); ?>

                <div <?php post_class(); ?>>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title();?>">
                        <h3><?php the_title();?></h3>
                    </a>
                    <p class="meta">
                        <?php echo bootstrapwp_posted_on();?>
                    </p>

                    <div class="row">
                        <?php // Post thumbnail conditional display.
                        if ( bootstrapwp_autoset_featured_img() !== false ) : ?>
                            <div class="span2">
                                <div class="image-headline">
                                    <?php if ( has_post_thumbnail() ) {
									the_post_thumbnail('thumbnail', array('class' => 'alignleft'));
									} else { ?>
									<img style="width:150px;height:150px;" src="<?php bloginfo('template_directory'); ?>/img/no-image-thumb.svg" alt="<?php the_title(); ?>" />
									<?php } ?>
								</div>
                            </div>
                            <div class="span6">
                        <?php else : ?>
                            <div class="span8">
                        <?php endif; ?>
                                <?php echo get_excerpt(555); ?>
                            </div>
                    </div><!-- /.row -->

                    <hr/>
                </div><!-- /.post_class -->

            <?php // end of blog post loop.
            endwhile; endif; ?>

            <?php bootstrapwp_content_nav('nav-below');?>
        </div>

    <?php get_sidebar('blog'); ?>
    <?php get_footer(); ?>