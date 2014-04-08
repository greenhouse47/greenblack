<?php
/**
 * The template for displaying Author Archive pages.
 *
 * @package WordPress
 * @subpackage Bootstrap
 */
get_header(); ?>

<?php if (have_posts()) :
    // Queue the first post.
    the_post(); ?>

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
                <header class="subhead" id="overview">
					<div class="author-articles">
						<div class="arship-articles-author">
						<i class="fa fa-folder-open-o"></i> <?php the_author_meta('display_name'); ?> Articles
						</div>
					</div>
                </header>
                <?php
                // Rewind the loop back
                    rewind_posts();
                ?>
                <?php while (have_posts()) : the_post(); ?>
                    <div <?php post_class(); ?>>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><h3><?php the_title();?></h3></a>

                        <p class="meta"><?php echo bootstrapwp_posted_on();?></p>

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
                   <?php endwhile; ?>
                   <?php bootstrapwp_content_nav('nav-below');?>
               <?php endif; ?>
		</div>
    <?php get_sidebar('author'); ?>
    <?php get_footer(); ?>