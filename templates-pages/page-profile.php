<?php
/**
 * Template Name: Page - Profile
 * Description: Displays a page title and content without displaying a sidebar.
 *
 * @package WordPress
 * @subpackage Bootstrap
 */
get_header(); ?>
<?php while (have_posts()) : the_post(); ?>

    <div class="container">
        <div class="row">
            <div class="span12">
                <?php if (function_exists('bootstrapwp_breadcrumbs')) {
                bootstrapwp_breadcrumbs();
                } ?>
            </div><!--/.span12 -->
        </div><!--/.row -->
        <div class="row content">
			<div class="pic-profile">
				<div class="image-post-single"><?php the_post_thumbnail('full', array('class' => 'profile')); ?></div>
			</div>
            <div class="isi-profile">
				<div class="deskripsi-profile"><i class="fa fa-users"></i> <?php the_title();?></div>
				<?php the_content(); ?>
				<?php endwhile; // end of the loop. ?>
			</div><!-- .span12 -->
        </div><!-- .row content -->
    </div><!--/.container -->
<?php get_footer(); ?>