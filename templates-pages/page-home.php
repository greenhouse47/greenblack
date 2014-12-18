<?php
/**
 * Template Name: Page - Homepage
 * Description: Displays a page title and content without displaying a sidebar.
 *
 * @package WordPress
 * @subpackage Bootstrap
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<meta name="keywords" content="<?php bloginfo('name'); ?>,himpunan mahasiswa islam,hmi,website hmi,yakin usaha sampai,yakusa,website resmi hmi,ijo hitam, website hmi, Islamic Association Of University Students">
	<meta name="description" content="">
	<meta name="author" content="<?php bloginfo('name'); ?>">
	<meta name="copyright" content="<?php bloginfo('name'); ?>">
	<meta name="robots" content="index, follow">
	<meta http-equiv="content-type" content="text/html;UTF-8">
	<meta http-equiv="cache-control" content="cache">
	<meta http-equiv="content-language" content="id">
	<meta property="og:description" 
  	content="Himpunan Mahasiswa Islam (Islamic Association Of University Students) Organisasi Mahasiswa yang di dirikan oleh Prof. Dr. H. Lafran Pane beserta 14 kawannya, pertama kali di bentuk di STI Jogjakarta tanggal 05 Februari 1947 dan sekarang sudah tersebar di seluruh Indonesia." />

    <title><?php wp_title('|', true, 'right'); ?></title>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="http://res.cloudinary.com/hmi-cabang-malang/image/upload/v1416681864/webfile/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
          href="<?php echo get_template_directory_uri();?>/assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
          href="<?php echo get_template_directory_uri();?>/assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
          href="<?php echo get_template_directory_uri();?>/assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed"
          href="<?php echo get_template_directory_uri();?>/assets/ico/apple-touch-icon-57-precomposed.png">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>  data-spy="scroll" data-target=".bs-docs-sidebar" data-offset="10">
    <div class="navbar navbar-inverse navbar-relative-top">
        <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
		<div class="small-logo-header">
			<?php $greenhouse_header_logo_activate = get_option('greenhouse_header_logo_activate'); if(($greenhouse_header_logo_activate == '') || ($greenhouse_header_logo_activate == 'No')) { ?>
			<img src="http://res.cloudinary.com/hmi-cabang-malang/image/upload/v1415980156/webfile/logo_small_header_hmi.png">
			<?php } else { ?>
			<div><a href="<?php echo get_settings('home'); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php echo get_option('greenhouse_header_logo_url'); ?>" alt="<?php bloginfo('name'); ?>" /></a></div>
			<?php } ?>
		</div>
		<?php $greenhouse_title_header_activate = get_option('greenhouse_title_header_activate'); if(($greenhouse_title_header_activate == '') || ($greenhouse_title_header_activate == 'No')) { ?>
                <a class="brand" href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">HMI Cabang Anda</a>
		<?php } else { ?>
			<div><a class="brand" href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><?php echo get_option('greenhouse_title_header_text'); ?></a></div>
		<?php } ?>
			<!-- Main Menu Header -->
                	<?php wp_nav_menu(
                        array(
                            'menu' => 'main-menu',
                            'container_class' => 'nav-collapse collapse',
                            'menu_class' => 'nav',
                            'fallback_cb' => '',
                            'menu_id' => 'main-menu',
                            'walker' => new Bootstrapwp_Walker_Nav_Menu()
                        )
                   	 ); ?>
            </div>
        </div>
    </div>
<!-- End Header. Begin Template Content -->
<div class="container-homepage">
	<!-- Revolution Slider shortcode -->
	<?php putRevSlider("rev_slider_hmi","homepage") ?> 
   	 <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="container">
		<div class="header-title-homepage">
			<?php the_content(); ?>
		</div><!--/.header-title-homepage -->
	</div>
    <?php endwhile; endif; ?>
</div><!--/.container-homepage -->
<div class="container-secondary">
	<div class="container">
		<div class="row">
			<div class="span-left">
				<div class="span-left-content">
					<!-- Start headline title -->
					<div class="title-headline">
						<h3><i class="fa fa-comments"></i> <?php echo get_option('greenhouse_title_headline_text'); ?></h3>
					</div>
					<!-- End Off headline title -->
					<?php while (have_posts()) : the_post(); ?>
					<?php // reset the loop
					endwhile;
					wp_reset_query(); ?>
					<?php // Blog post query
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$category_id = (get_option('greenhouse_headline'));//note: name category with name slug category must same!!
					query_posts(array('post_type' => 'post', 'paged' => $paged, 'showposts' => 4, 'category_name' => $category_id ));
					if (have_posts()) : while (have_posts()) : the_post(); ?>
					<div class="image-headline">
						<div <?php post_class(); ?>>
							<?php if ( has_post_thumbnail() ) {
							the_post_thumbnail('thumbnail');
							} else { ?>
							<img class="no-image-home" src="<?php bloginfo('template_directory'); ?>/img/no-image.svg" alt="<?php the_title(); ?>" />
							<?php } ?>
							<div class="title-bottom-pic">
							<a href="<?php the_permalink() ?>"><?php echo wp_trim_words( get_the_title(), 3 ); ?></a><!-- /limit Title Word -->
							</div>
						</div><!-- /.post_class -->
					</div><!-- /.image-headline-->
					<?php // end of blog post loop.
					endwhile; endif; ?>
				</div><!-- /.span-left-content -->
			</div><!-- /.span left -->
			<div class="span-right">
				<!-- Start headline title -->	
				<div class="title-right-headline">			
					<h3><i class="fa fa-bell"></i> <?php echo get_option('greenhouse_title_rightheadline_text'); ?></h3>
				</div>
				<!-- End Off headline title -->
				<?php while (have_posts()) : the_post(); ?>
				<?php // reset the loop
				endwhile;
				wp_reset_query(); ?>
				<?php // Blog post query
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$category_id = (get_option('greenhouse_right_headline'));//note: bila tidak muncul slug dan title category tidak sama
				query_posts(array('post_type' => 'post', 'paged' => $paged, 'showposts' => 5, 'category_name' => $category_id ));
				if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="span-right-news">
					<div <?php post_class(); ?>>
						<div class="title-right-headline">
							<i class="fa fa-check-square"></i>&nbsp;&nbsp;<a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><?php the_title();?></a>
						</div>
					</div><!-- /.post_class -->
				</div><!-- /.span-right-news-->
				<?php // end of blog post loop.
				endwhile; endif; ?>
			</div><!-- /.span right -->
		</div><!--/.row -->
	</div>
</div><!--/.container-secondary-menu at home -->
<div class="container">
    <div class="row">
		<div class="span4">
			<h3><i class="fa fa-youtube"></i> <?php echo get_option('greenhouse_title_video_text'); ?></h3>
			<div class="span_video">
				<?php echo stripslashes( get_option('greenhouse_video') );?>
			</div>
		</div>
		<div class="span4">
			<h3><i class="fa fa-bullhorn"></i> <?php echo get_option('greenhouse_suarakita_text'); ?></h3>
			<?php while (have_posts()) : the_post(); ?>
				<?php // reset the loop
				endwhile;
				wp_reset_query(); ?>
				<?php // Blog post query
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$category_id = (get_option('greenhouse_suara_kita'));//note: bila tidak muncul slug dan title category tidak sama
				query_posts(array('post_type' => 'post', 'paged' => $paged, 'showposts' => 7, 'category_name' => $category_id ));
				if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="span-right-news">
					<div <?php post_class(); ?>>
						<div class="title-suara-kita">
							<i class="fa fa-angle-right"></i>&nbsp;&nbsp;<a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><?php the_title();?></a>
						</div>
					</div><!-- /.post_class -->
				</div><!-- /.span-right-news-->
				<?php // end of blog post loop.
				endwhile; endif; ?>
		</div>
		<div class="span4">
			<h3><i class="fa fa-calendar-o"></i> <?php echo get_option('greenhouse_agenda_text'); ?></h3>
			<?php while (have_posts()) : the_post(); ?>
				<?php // reset the loop
				endwhile;
				wp_reset_query(); ?>
				<?php // Blog post query
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$category_id = (get_option('greenhouse_agenda'));//note: bila tidak muncul slug dan title category tidak sama
				query_posts(array('post_type' => 'post', 'paged' => $paged, 'showposts' => 7, 'category_name' => $category_id ));
				if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="span-right-news">
					<div <?php post_class(); ?>>
						<div class="title-agenda">
							<i class="fa fa-angle-right"></i>&nbsp;&nbsp;<a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><?php the_title();?></a>
						</div>
					</div><!-- /.post_class -->
				</div><!-- /.span-right-news-->
				<?php // end of blog post loop.
				endwhile; endif; ?>
		</div>
    </div><!--/.row -->
</div><!--/.container -->
<div class="container">
    <div class="row">
		<div class="span6">
			<div class="home-berkarya">
				<h3><i class="fa fa-coffee"></i> <?php echo get_option('greenhouse_karya_text'); ?></h3>
				<?php while (have_posts()) : the_post(); ?>
					<?php // reset the loop
					endwhile;
					wp_reset_query(); ?>
					<?php // Blog post query
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$category_id = (get_option('greenhouse_karya'));//note: name category with name slug category must same!!
					query_posts(array('post_type' => 'post', 'paged' => $paged, 'showposts' => 4, 'category_name' => $category_id ));
					if (have_posts()) : while (have_posts()) : the_post(); ?>
					<div class="image-agenda">
						<div <?php post_class(); ?>>
							<?php if ( has_post_thumbnail() ) {
							the_post_thumbnail('thumbnail', array('class' => 'alignleft'));
							} else { ?>
							<img class="no-image-thumb" src="<?php bloginfo('template_directory'); ?>/img/no-image.svg" alt="<?php the_title(); ?>" />
							<?php } ?>
							<div class="title-post">
								<a href="<?php the_permalink() ?>"><?php the_title();?></a>
							</div>
							<?php echo get_excerpt(150); ?>
						</div><!-- /.post_class -->
					</div>
				<?php // end of blog post loop.
				endwhile; endif; ?>
			</div>
		</div>
		<div class="span6">
			<h3><i class="fa fa-thumb-tack"></i> <?php echo get_option('greenhouse_title_maps_text'); ?></h3>
			<div class="home-map">
				<?php echo stripslashes( get_option('greenhouse_maps') );?>
			</div>
		</div>
    </div><!--/.row -->
</div><!--/.container -->
<?php get_footer(); ?>
