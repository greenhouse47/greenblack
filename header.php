<?php
/**
 * Default Page Header
 *
 * @package Bootstrap
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
                <a class="brand" href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">HMI Cabang Anda</a>
		<?php } else { ?>
			<div><a class="brand" href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><?php echo get_option('greenhouse_title_header_text'); ?></a></div>
		<?php } ?>
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
