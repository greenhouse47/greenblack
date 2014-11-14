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
<link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css'>
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