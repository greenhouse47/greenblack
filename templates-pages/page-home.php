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
	
	<meta name="keywords" content="<?php bloginfo('name'); ?>,greenhouse project development, komunitas greenboxindonesia, greenbox komunitas, green community, Our community base">
	<meta name="description" content="">
	<meta name="author" content="<?php bloginfo('name'); ?>">
	<meta name="copyright" content="<?php bloginfo('name'); ?>">
	<meta name="robots" content="index, follow">
	<meta http-equiv="content-type" content="text/html;UTF-8">
	<meta http-equiv="cache-control" content="cache">
	<meta http-equiv="content-language" content="id">
	<meta property="og:description" 
  	content="We are is human being activity" />

    	<title><?php wp_title('|', true, 'right'); ?></title>
    	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
    	<link rel="shortcut icon" href="<?php echo get_option('greenhouse_favicon'); ?>">
    	<link rel="apple-touch-icon-precomposed" sizes="144x144"
          href="<?php echo get_template_directory_uri();?>/assets/ico/apple-touch-icon-144-precomposed.png">
    	<link rel="apple-touch-icon-precomposed" sizes="114x114"
          href="<?php echo get_template_directory_uri();?>/assets/ico/apple-touch-icon-114-precomposed.png">
    	<link rel="apple-touch-icon-precomposed" sizes="72x72"
          href="<?php echo get_template_directory_uri();?>/assets/ico/apple-touch-icon-72-precomposed.png">
    	<link rel="apple-touch-icon-precomposed"
          href="<?php echo get_template_directory_uri();?>/assets/ico/apple-touch-icon-57-precomposed.png">
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>  data-spy="scroll" data-target=".bs-docs-sidebar" data-offset="10">
<!-- SDK Facebook -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/id_ID/all.js#xfbml=1&appId=182576108483009";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- End off -->
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
			<img src="<?php echo get_template_directory_uri();?>/img/logo_small_header.png">
			<?php } else { ?>
			<div><a href="<?php echo get_settings('home'); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php echo get_option('greenhouse_header_logo_url'); ?>" alt="<?php bloginfo('name'); ?>" /></a></div>
			<?php } ?>
		</div>
		<?php $greenhouse_title_header_activate = get_option('greenhouse_title_header_activate'); if(($greenhouse_title_header_activate == '') || ($greenhouse_title_header_activate == 'No')) { ?>
                <a class="brand" href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">Welcome</a>
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
	<!-- Background on Top Header Homepage -->
	<?php $background = wp_get_attachment_image_src( get_post_thumbnail_id( $page->ID ), 'full' );?>
	<style>
	.container-homepage {
	background-image: url('<?php echo $background[0]; ?>');
	}
	</style>
   	 <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="container">
		<div class="homepage-logo">
			<?php $greenhouse_big_logo_activate = get_option('greenhouse_big_logo_activate'); if(($greenhouse_big_logo_activate == '') || ($greenhouse_big_logo_activate == 'No')) { ?>
			<div><a href="<?php echo home_url('/'); ?>" title="<?php bloginfo('name'); ?>"><img itemprop="logo" src="<?php echo get_template_directory_uri();?>/img/logo.svg" style="height:auto;width:279px;float:left;"></a></div>
			<?php } else { ?>
			<div><a href="<?php echo get_settings('home'); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php echo get_option('greenhouse_big_logo_url'); ?>" alt="<?php bloginfo('name'); ?>" /></a></div>
			<?php } ?>
		</div><!--/.homepage-logo -->
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
					<div class="icon_title"></div>
					<!-- Start headline title -->
					<div class="title-headline">
						<h3><i class="fa fa-rocket"></i>&nbsp;<?php echo get_option('greenhouse_title_headline_text'); ?></h3>
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
							<a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), 3 ); ?></a><!-- /limit Title Word -->
							</div>
						</div><!-- /.post_class -->
					</div><!-- /.image-headline-->
					<?php // end of blog post loop.
					endwhile; endif; ?>
				</div><!-- /.span-left-content -->
			</div><!-- /.span left -->
			<div class="span-right">
				<div class="icon_title"></div>
				<!-- Start headline title -->	
				<div class="title-right-headline">			
					<h3><i class="fa fa-bell"></i>&nbsp;<?php echo get_option('greenhouse_title_rightheadline_text'); ?></h3>
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
							<a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><?php the_title();?></a>
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
			<div class="icon_title_two"></div>
			<h3><i class="fa fa-youtube"></i>&nbsp;<?php echo get_option('greenhouse_title_video_text'); ?></h3>
			<div class="span_video">
				<?php echo stripslashes( get_option('greenhouse_video') );?>
			</div>
		</div>
		<div class="span4">
			<div class="icon_title_two"></div>
			<h3><i class="fa fa-bullhorn"></i>&nbsp;<?php echo get_option('greenhouse_suarakita_text'); ?></h3>
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
							<a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><?php the_title();?></a>
						</div>
					</div><!-- /.post_class -->
				</div><!-- /.span-right-news-->
				<?php // end of blog post loop.
				endwhile; endif; ?>
		</div>
		<div class="span4">
			<div class="icon_title_two"></div>
			<h3><i class="fa fa-calendar-o"></i>&nbsp;<?php echo get_option('greenhouse_agenda_text'); ?></h3>
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
							<a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><?php the_title();?></a>
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
				<div class="icon_title_thre"></div>
				<h3><i class="fa fa-flask"></i>&nbsp;<?php echo get_option('greenhouse_karya_text'); ?></h3>
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
			<div class="icon_title_two"></div>
			<h3><i class="fa fa-map-marker"></i>&nbsp;<?php echo get_option('greenhouse_title_maps_text'); ?></h3>
			<div class="home-map">
				<?php echo stripslashes( get_option('greenhouse_maps') );?>
			</div>
		</div>
    </div><!--/.row -->
</div><!--/.container -->
<?php get_footer(); ?>
