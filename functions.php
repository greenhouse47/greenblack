<?php
/**
 * Bootstrap Theme Functions
 *
 * @author Albert Sukmono <info@gb.co.id>
 * @package WordPress
 * @subpackage Bootstrap
 */

 /**
 * Load Another Functions.
 * Load themes function panel
 */
require_once( trailingslashit( get_template_directory() ) . 'boxfunctions/greenhouse-panel.php'); // themes panel greenhouse
require_once( trailingslashit( get_template_directory() ) . 'boxfunctions/woocommerce.php'); // woocommerce compatible plugin
require_once( trailingslashit( get_template_directory() ) . 'boxfunctions/theme_update/updater.php'); // check update themes from github repository

/**
 * Maximum allowed width of content within the theme.
 */
if (!isset($content_width)) {
    $content_width = 770;
}

/**
 * Setup Theme Functions
 *
 */
if (!function_exists('bootstrapwp_theme_setup')):
    function bootstrapwp_theme_setup() {

        load_theme_textdomain('bootstrapwp', get_template_directory() . '/lang');

        add_theme_support('automatic-feed-links');
        add_theme_support('post-thumbnails');
        add_theme_support('post-formats', array( 'aside', 'image', 'gallery', 'link', 'quote', 'status', 'video', 'audio', 'chat' ));

        register_nav_menus(
            array(
                'main-menu' => __('Main Menu', 'bootstrapwp'),
				'footer-menu' => __('Footer Menu', 'bootstrapwp'),
            ));
        // load custom walker menu class file
        require 'includes/class-bootstrapwp_walker_nav_menu.php';
    }
endif;
add_action('after_setup_theme', 'bootstrapwp_theme_setup');

/**
 * Define post thumbnail size.
 * Add two additional image sizes.
 *
 */
function bootstrapwp_images() {
    set_post_thumbnail_size(150, 150); // 260px wide x 180px high
    add_image_size('bootstrap-small', 300, 200); // 300px wide x 200px high
    add_image_size('bootstrap-medium', 360, 270); // 360px wide by 270px high
}

/**
 * Custom_excerpt_length
 * Mambatasi tampilan content per kata.
 *
 */
function get_excerpt($count){
  $permalink = get_permalink($post->ID);
  $excerpt = get_the_content();
  $excerpt = strip_tags($excerpt);
  $excerpt = substr($excerpt, 0, $count);
  return $excerpt;
}

/**
 * Load CSS styles for theme.
 *
 */
function bootstrapwp_styles_loader() {

    wp_enqueue_style('bootstrapwp-style', get_template_directory_uri() . '/assets/css/bootstrapwp.css', false, '1.0', 'all');
    wp_enqueue_style('bootstrapwp-default', get_stylesheet_uri());

    // registering scripts and styles for documentation templates
    wp_register_style('docs-css', get_template_directory_uri() . '/templates-documentation/assets/css/docs.css', array('bootstrapwp-style'), '2.3.2', 'all');

}
add_action('wp_enqueue_scripts', 'bootstrapwp_styles_loader');

/**
 * Load JavaScript and jQuery files for theme.
 *
 */
function bootstrapwp_scripts_loader() {

    if (is_singular() && comments_open() && get_option('thread_comments')) {

        wp_enqueue_script('comment-reply');

    }

    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('demo-js', get_template_directory_uri() . '/assets/js/bootstrapwp.demo.js', array('bootstrap-js'),'1.0',true);

}
add_action('wp_enqueue_scripts', 'bootstrapwp_scripts_loader');

/**
 * Define theme's widget areas.
 *
 */
function bootstrapwp_widgets_init() {

    register_sidebar(
        array(
            'name'          => __('Page Sidebar', 'bootstrapwp'),
            'id'            => 'sidebar-page',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => "</div>",
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        )
    );

    register_sidebar(
        array(
            'name'          => __('Posts Sidebar', 'bootstrapwp'),
            'id'            => 'sidebar-posts',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => "</div>",
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        )
    );

    register_sidebar(
        array(
            'name'          => __('Footer Left', 'bootstrapwp'),
            'id'            => 'footer-left',
            'description'   => __('Textbox on Footer Left', 'bootstrapwp'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3>',
            'after_title'   => '</h3>'
        )
    );

    register_sidebar(
        array(
            'name'          => __('Footer Middle', 'bootstrapwp'),
            'id'            => 'footer-middle',
            'description'   => __('Textbox on Footer Middle', 'bootstrapwp'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3>',
            'after_title'   => '</h3>'
        )
    );

    register_sidebar(
        array(
            'name'          => __('Footer Right', 'bootstrapwp'),
            'id'            => 'footer-right',
            'description'   => __('Textbox on Footer Right', 'bootstrapwp'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3>',
            'after_title'   => '</h3>'
        )
    );
}
add_action('init', 'bootstrapwp_widgets_init');

/**
 * Display page next/previous navigation links.
 *
 */
if (!function_exists('bootstrapwp_content_nav')):
    function bootstrapwp_content_nav($nav_id) {

        global $wp_query, $post;

        if ($wp_query->max_num_pages > 1) : ?>

        <nav id="<?php echo $nav_id; ?>" class="navigation" role="navigation">
            <h4 class="assistive-text"><?php _e('<i class="fa fa-align-justify"></i> Post navigation', 'bootstrapwp'); ?></h4>
            <div class="nav-previous alignleft"><?php next_posts_link(
                __('Older posts <span class="meta-nav">&rarr;</span>', 'bootstrapwp')
            ); ?></div>
            <div class="nav-next alignright"><?php previous_posts_link(
                __('<span class="meta-nav">&larr;</span> Newer posts ', 'bootstrapwp')
            ); ?></div>
        </nav><!-- #<?php echo $nav_id; ?> .navigation -->

        <?php endif;
    }
endif;

/**
 * Display template for comments and pingbacks.
 *
 */
if (!function_exists('bootstrapwp_comment')) :
    function bootstrapwp_comment($comment, $args, $depth)
    {
        $GLOBALS['comment'] = $comment;
        switch ($comment->comment_type) :
            case 'pingback' :
            case 'trackback' : ?>

                <li class="comment media" id="comment-<?php comment_ID(); ?>">
                    <div class="media-body">
                        <p>
                            <?php _e('Pingback:', 'bootstrapwp'); ?> <?php comment_author_link(); ?>
                        </p>
                    </div><!--/.media-body -->
                <?php
                break;
            default :
                // Proceed with normal comments.
                global $post; ?>

                <li class="comment media" id="li-comment-<?php comment_ID(); ?>">
                        <a href="<?php echo $comment->comment_author_url;?>" class="pull-left">
                            <?php echo get_avatar($comment, 64); ?>
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading comment-author vcard">
                                <?php
                                printf('<cite class="fn">%1$s %2$s</cite>',
                                    get_comment_author_link(),
                                    // If current post author is also comment author, make it known visually.
                                    ($comment->user_id === $post->post_author) ? '<span class="label"> ' . __(
                                        'Post author',
                                        'bootstrapwp'
                                    ) . '</span> ' : ''); ?>
                            </h4>

                            <?php if ('0' == $comment->comment_approved) : ?>
                                <p class="comment-awaiting-moderation"><?php _e(
                                    'Your comment is awaiting moderation.',
                                    'bootstrapwp'
                                ); ?></p>
                            <?php endif; ?>

                            <?php comment_text(); ?>
                            <p class="meta">
                                <?php printf('<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
                                            esc_url(get_comment_link($comment->comment_ID)),
                                            get_comment_time('c'),
                                            sprintf(
                                                __('%1$s at %2$s', 'bootstrapwp'),
                                                get_comment_date(),
                                                get_comment_time()
                                            )
                                        ); ?>
                            </p>
                            <p class="reply">
                                <?php comment_reply_link( array_merge($args, array(
                                            'reply_text' => __('Reply <span>&darr;</span>', 'bootstrapwp'),
                                            'depth'      => $depth,
                                            'max_depth'  => $args['max_depth']
                                        )
                                    )); ?>
                            </p>
                        </div>
                        <!--/.media-body -->
                <?php
                break;
        endswitch;
    }
endif;

/**
 * Display template for post meta information.
 *
 */
if (!function_exists('bootstrapwp_posted_on')) :
    function bootstrapwp_posted_on()
    {
        printf(__('Posted on <i class="fa fa-clock-o"></i> <a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a><span class="byline"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span> <i class="fa fa-user"></i>','bootstrapwp'),
            esc_url(get_permalink()),
            esc_attr(get_the_time()),
            esc_attr(get_the_date('c')),
            esc_html(get_the_date()),
            esc_url(get_author_posts_url(get_the_author_meta('ID'))),
            esc_attr(sprintf(__('View all posts by %s', 'bootstrapwp'), get_the_author())),
            esc_html(get_the_author())
        );
    }
endif;

/**
 * Adds custom classes to the array of body classes.
 *
 */
function bootstrapwp_body_classes($classes)
{
    if (!is_multi_author()) {
        $classes[] = 'single-author';
    }
    return $classes;
}
add_filter('body_class', 'bootstrapwp_body_classes');

/**
 * Add post ID attribute to image attachment pages prev/next navigation.
 *
 */
function bootstrapwp_enhanced_image_navigation($url)
{
    global $post;
    if (wp_attachment_is_image($post->ID)) {
        $url = $url . '#main';
    }
    return $url;
}
add_filter('attachment_link', 'bootstrapwp_enhanced_image_navigation');

/**
 * Checks if a post thumbnails is already defined.
 *
 */
function bootstrapwp_is_post_thumbnail_set()
{
    global $post;
    if (get_the_post_thumbnail()) {
        return true;
    } else {
        return false;
    }
}

/**
 * Set post thumbnail as first image from post, if not already defined.
 *
 */
function bootstrapwp_autoset_featured_img()
{
    global $post;

    $post_thumbnail = bootstrapwp_is_post_thumbnail_set();
    if ($post_thumbnail == true) {
        return get_the_post_thumbnail();
    }
    $image_args     = array(
        'post_type'      => 'attachment',
        'numberposts'    => 1,
        'post_mime_type' => 'image',
        'post_parent'    => $post->ID,
        'order'          => 'desc'
    );
    $attached_images = get_children($image_args, ARRAY_A);
    $first_image = reset($attached_images);
    if (!$first_image) {
        return false;
    }

    return get_the_post_thumbnail($post->ID, $first_image['ID']);

}

/**
 * Define default page titles.
 *
 */
function bootstrapwp_wp_title($title, $sep)
{
    global $paged, $page;
    if (is_feed()) {
        return $title;
    }
    // Add the site name.
    $title .= get_bloginfo('name');
    // Add the site description for the home/front page.
    $site_description = get_bloginfo('description', 'display');
    if ($site_description && (is_home() || is_front_page())) {
        $title = "$title $sep $site_description";
    }
    // Add a page number if necessary.
    if ($paged >= 2 || $page >= 2) {
        $title = "$title $sep " . sprintf(__('Page %s', 'bootstrapwp'), max($paged, $page));
    }
    return $title;
}
add_filter('wp_title', 'bootstrapwp_wp_title', 10, 2);

/**
 * Display template for breadcrumbs.
 *
 */
function bootstrapwp_breadcrumbs()
{
    $home      = '<i class="fa fa-home"></i>'; // text for the 'Home' link
    $before    = '<li class="active">'; // tag before the current crumb
    $after     = '</li>'; // tag after the current crumb

    if (!is_home() && !is_front_page() || is_paged()) {

        echo '<ul class="breadcrumb">';

        global $post;
        $homeLink = home_url();
            echo '<li><a href="' . $homeLink . '">' . $home . '</a> '.$sep. '</li> ';
            if (is_category()) {
                global $wp_query;
                $cat_obj   = $wp_query->get_queried_object();
                $thisCat   = $cat_obj->term_id;
                $thisCat   = get_category($thisCat);
                $parentCat = get_category($thisCat->parent);
                if ($thisCat->parent != 0) {
                    echo get_category_parents($parentCat, true, $sep);
                }
                echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;
            } elseif (is_day()) {
                echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time(
                    'Y'
                ) . '</a></li> ';
                echo '<li><a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time(
                    'F'
                ) . '</a></li> ';
                echo $before . get_the_time('d') . $after;
            } elseif (is_month()) {
                echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time(
                    'Y'
                ) . '</a></li> ';
                echo $before . get_the_time('F') . $after;
            } elseif (is_year()) {
                echo $before . get_the_time('Y') . $after;
            } elseif (is_single() && !is_attachment()) {
                if (get_post_type() != 'post') {
                    $post_type = get_post_type_object(get_post_type());
                    $slug      = $post_type->rewrite;
                    echo '<li><a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>'.$sep.'</li> ';
                    echo $before . get_the_title() . $after;
                } else {
                    $cat = get_the_category();
                    $cat = $cat[0];
                    echo '<li>'.get_category_parents($cat, true, $sep).'</li>';
                    echo $before . get_the_title() . $after;
                }
            } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
                $post_type = get_post_type_object(get_post_type());
                echo $before . $post_type->labels->singular_name . $after;
            } elseif (is_attachment()) {
                $parent = get_post($post->post_parent);
                $cat    = get_the_category($parent->ID);
                $cat    = $cat[0];
                echo get_category_parents($cat, true, $sep);
                echo '<li><a href="' . get_permalink(
                    $parent
                ) . '">' . $parent->post_title . '</a></li> ';
                echo $before . get_the_title() . $after;

            } elseif (is_page() && !$post->post_parent) {
                echo $before . get_the_title() . $after;
            } elseif (is_page() && $post->post_parent) {
                $parent_id   = $post->post_parent;
                $breadcrumbs = array();
                while ($parent_id) {
                    $page          = get_page($parent_id);
                    $breadcrumbs[] = '<li><a href="' . get_permalink($page->ID) . '">' . get_the_title(
                        $page->ID
                    ) . '</a>' . $sep . '</li>';
                    $parent_id     = $page->post_parent;
                }
                $breadcrumbs = array_reverse($breadcrumbs);
                foreach ($breadcrumbs as $crumb) {
                    echo $crumb;
                }
                echo $before . get_the_title() . $after;
            } elseif (is_search()) {
                echo $before . 'Search results for "' . get_search_query() . '"' . $after;
            } elseif (is_tag()) {
                echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
            } elseif (is_author()) {
                global $author;
                $userdata = get_userdata($author);
                echo $before . 'Articles posted by ' . $userdata->display_name . $after;
            } elseif (is_404()) {
                echo $before . 'Error 404' . $after;
            }
            // if (get_query_var('paged')) {
            //     if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()
            //     ) {
            //         echo ' (';
            //     }
            //     echo __('Page', 'bootstrapwp') . $sep . get_query_var('paged');
            //     if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()
            //     ) {
            //         echo ')';
            //     }
            // }

        echo '</ul>';
    }
}
/**
 * Display breadcrumbs for staff.
 * Ini khusus untuk breadcrumb post_type staff
 */
function bootstrapwp_breadcrumbs_staff()
{
    $home      = '<i class="fa fa-home"></i>'; // text for the 'Home' link
    $before    = '<li class="active">'; // tag before the current crumb
    $after     = '</li>'; // tag after the current crumb

    if (!is_home() && !is_front_page() || is_paged()) {

        echo '<ul class="breadcrumb">';

        global $post;
        $homeLink = home_url();
            echo '<li><a href="' . $homeLink . '">' . $home . '</a> '.$sep. '</li> ';
            if (is_category()) {
                global $wp_query;
                $cat_obj   = $wp_query->get_queried_object();
                $thisCat   = $cat_obj->term_id;
                $thisCat   = get_category($thisCat);
                $parentCat = get_category($thisCat->parent);
                if ($thisCat->parent != 0) {
                    echo get_category_parents($parentCat, true, $sep);
                }
                echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;
            } elseif (is_single() && !is_attachment()) {
                if (get_post_type() != 'post') {
                    $post_type = get_post_type_object(get_post_type());
                    $slug      = $post_type->rewrite;
                    echo '<li><a href="' . $homeLink . '/' . $slug['slug'] . '/">' .'</a>'. $post_type->labels->singular_name .$sep.'</li> ';
                    echo $before . get_the_title() . $after;
                } else {
                    $cat = get_the_category();
                    $cat = $cat[0];
                    echo '<li>'.get_category_parents($cat, true, $sep).'</li>';
                    echo $before . get_the_title() . $after;
                }
            } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
                $post_type = get_post_type_object(get_post_type());
                echo $before . $post_type->labels->singular_name . $after;
            } elseif (is_search()) {
                echo $before . 'Search results for "' . get_search_query() . '"' . $after;
            } elseif (is_tag()) {
                echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
            } elseif (is_author()) {
                global $author;
                $userdata = get_userdata($author);
                echo $before . 'Articles posted by ' . $userdata->display_name . $after;
            } elseif (is_404()) {
                echo $before . 'Error 404' . $after;
            }
            // if (get_query_var('paged')) {
            //     if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()
            //     ) {
            //         echo ' (';
            //     }
            //     echo __('Page', 'bootstrapwp') . $sep . get_query_var('paged');
            //     if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()
            //     ) {
            //         echo ')';
            //     }
            // }
        echo '</ul>';
    }
}
/**
 * Adding the Open Graph in the Language Attributes
 */

function add_opengraph_doctype( $output ) {
		return $output . ' xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"';
	}
add_filter('language_attributes', 'add_opengraph_doctype');

//Lets add Open Graph Meta Info

function insert_fb_in_head() {
	global $post;
	if ( !is_singular()) //if it is not a post or a page
		return;
        echo '<meta property="fb:admins" content="Admin"/>';
        echo '<meta property="og:title" content="' . get_the_title() . '"/>';
        echo '<meta property="og:type" content="article"/>';
        echo '<meta property="og:url" content="' . get_permalink() . '"/>';
        echo '<meta property="og:site_name" content="' . get_bloginfo('name') . '"/>';
	if(!has_post_thumbnail( $post->ID )) { //the post does not have featured image, use a default image
		$default_image="http://www.img.greenboxindonesia.com/Fg.jpg"; //replace this with a default image on your server or an image in your media library
		echo '<meta property="og:image" content="' . $default_image . '"/>';
	}
	else{
		$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
		echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>';
	}
	echo "
";
}
add_action( 'wp_head', 'insert_fb_in_head', 5 );

//end of add open graph facebook.

//requery plugin on themes //
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.3.6
 * @author    Thomas Griffin <thomas thomasgriffinmedia.com="">
 * @author    Gary Jones <gamajo gamajo.com="">
 * @copyright  Copyright (c) 2012, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/plugins/greenbox-plugin-activation.php';

add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function my_theme_register_required_plugins() {

 /**
  * Array of plugin arrays. Required keys are name and slug.
  * If the source is NOT from the .org repo, then source is also required.
  */
 $plugins = array(

  // This is an example of how to include a plugin pre-packaged with a theme
	array(
	   'name'         => 'Revolution Sliders', // The plugin name
	   'slug'         => 'revslider', // The plugin slug (typically the folder name)
	   'source'       => get_stylesheet_directory() . '/plugins/premium/revslider.zip', // The plugin source
	   'required'     => true, // If false, the plugin is only 'recommended' instead of required
	   'version'     => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
	   'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
	   'force_deactivation'  => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
	   'external_url'    => '', // If set, overrides default API URL and points to an external URL
	),

	array(
	   'name'         => 'Basix Twitter', // The plugin name
	   'slug'         => 'basix-twitter', // The plugin slug (typically the folder name)
	   'source'       => get_stylesheet_directory() . '/plugins/premium/basix-twitter.zip', // The plugin source
	   'required'     => true, // If false, the plugin is only 'recommended' instead of required
	   'version'     => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
	   'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
	   'force_deactivation'  => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
	   'external_url'    => '', // If set, overrides default API URL and points to an external URL
	),

	array(
	   'name'         => 'Event On Management', // The plugin name
	   'slug'         => 'eventON', // The plugin slug (typically the folder name)
	   'source'       => get_stylesheet_directory() . '/plugins/premium/eventON.zip', // The plugin source
	   'required'     => true, // If false, the plugin is only 'recommended' instead of required
	   'version'     => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
	   'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
	   'force_deactivation'  => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
	   'external_url'    => '', // If set, overrides default API URL and points to an external URL
	),

	array(
	   'name'         => 'Facebook Commnet Slider', // The plugin name
	   'slug'         => 'facebook_comment_slider', // The plugin slug (typically the folder name)
	   'source'       => get_stylesheet_directory() . '/plugins/premium/facebook_comment_slider.zip', // The plugin source
	   'required'     => true, // If false, the plugin is only 'recommended' instead of required
	   'version'     => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
	   'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
	   'force_deactivation'  => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
	   'external_url'    => '', // If set, overrides default API URL and points to an external URL
	),

	array(
	   'name'         => 'Formcraft', // The plugin name
	   'slug'         => 'formcraft', // The plugin slug (typically the folder name)
	   'source'       => get_stylesheet_directory() . '/plugins/premium/formcraft.zip', // The plugin source
	   'required'     => true, // If false, the plugin is only 'recommended' instead of required
	   'version'     => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
	   'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
	   'force_deactivation'  => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
	   'external_url'    => '', // If set, overrides default API URL and points to an external URL
	),

	array(
	   'name'         => 'Profile Lembaga', // The plugin name
	   'slug'         => 'lembaga', // The plugin slug (typically the folder name)
	   'source'       => get_stylesheet_directory() . '/plugins/premium/lembaga.zip', // The plugin source
	   'required'     => true, // If false, the plugin is only 'recommended' instead of required
	   'version'     => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
	   'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
	   'force_deactivation'  => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
	   'external_url'    => '', // If set, overrides default API URL and points to an external URL
	),

	array(
	   'name'         => 'Profile Staff', // The plugin name
	   'slug'         => 'staff', // The plugin slug (typically the folder name)
	   'source'       => get_stylesheet_directory() . '/plugins/premium/staff.zip', // The plugin source
	   'required'     => true, // If false, the plugin is only 'recommended' instead of required
	   'version'     => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
	   'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
	   'force_deactivation'  => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
	   'external_url'    => '', // If set, overrides default API URL and points to an external URL
	),

////////////////////////////////////////////////////////////////////////////////////////////////
// ***** Required Plugin Standart edit by Anggo.ss http://www.albert.sukmono.web.id *****
////////////////////////////////////////////////////////////////////////////////////////////////

	array(
	   'name'         => 'Themes MyLogin', // The plugin name
	   'slug'         => 'theme-my-login', // The plugin slug (typically the folder name)
	   'source'       => get_stylesheet_directory() . '/plugins/standart/theme-my-login.zip', // The plugin source
	   'required'     => true, // If false, the plugin is only 'recommended' instead of required
	   'version'     => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
	   'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
	   'force_deactivation'  => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
	   'external_url'    => '', // If set, overrides default API URL and points to an external URL
	),

	array(
	   'name'         => 'Cloudinary Image Management', // The plugin name
	   'slug'         => 'cloudinary-image-management-and-manipulation-in-the-cloud-cdn', // The plugin slug (typically the folder name)
	   'source'       => get_stylesheet_directory() . '/plugins/standart/cloudinary-image-management-and-manipulation-in-the-cloud-cdn.zip', // The plugin source
	   'required'     => true, // If false, the plugin is only 'recommended' instead of required
	   'version'     => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
	   'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
	   'force_deactivation'  => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
	   'external_url'    => '', // If set, overrides default API URL and points to an external URL
	),

	array(
	   'name'         => 'Configure SMTP', // The plugin name
	   'slug'         => 'configure-smtp', // The plugin slug (typically the folder name)
	   'source'       => get_stylesheet_directory() . '/plugins/standart/configure-smtp.zip', // The plugin source
	   'required'     => true, // If false, the plugin is only 'recommended' instead of required
	   'version'     => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
	   'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
	   'force_deactivation'  => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
	   'external_url'    => '', // If set, overrides default API URL and points to an external URL
	),

	array(
	   'name'         => 'Disquse Commnet System', // The plugin name
	   'slug'         => 'disqus-comment-system', // The plugin slug (typically the folder name)
	   'source'       => get_stylesheet_directory() . '/plugins/standart/disqus-comment-system.zip', // The plugin source
	   'required'     => true, // If false, the plugin is only 'recommended' instead of required
	   'version'     => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
	   'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
	   'force_deactivation'  => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
	   'external_url'    => '', // If set, overrides default API URL and points to an external URL
	),

	array(
	   'name'         => 'Google Sitemap Generator', // The plugin name
	   'slug'         => 'google-sitemap-generator', // The plugin slug (typically the folder name)
	   'source'       => get_stylesheet_directory() . '/plugins/standart/google-sitemap-generator.zip', // The plugin source
	   'required'     => true, // If false, the plugin is only 'recommended' instead of required
	   'version'     => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
	   'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
	   'force_deactivation'  => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
	   'external_url'    => '', // If set, overrides default API URL and points to an external URL
	),

	array(
	   'name'         => 'Simple Optimizer', // The plugin name
	   'slug'         => 'simple-optimizer', // The plugin slug (typically the folder name)
	   'source'       => get_stylesheet_directory() . '/plugins/standart/simple-optimizer.zip', // The plugin source
	   'required'     => true, // If false, the plugin is only 'recommended' instead of required
	   'version'     => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
	   'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
	   'force_deactivation'  => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
	   'external_url'    => '', // If set, overrides default API URL and points to an external URL
	),

	array(
	   'name'         => 'TablePress', // The plugin name
	   'slug'         => 'tablepress', // The plugin slug (typically the folder name)
	   'source'       => get_stylesheet_directory() . '/plugins/standart/tablepress.zip', // The plugin source
	   'required'     => true, // If false, the plugin is only 'recommended' instead of required
	   'version'     => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
	   'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
	   'force_deactivation'  => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
	   'external_url'    => '', // If set, overrides default API URL and points to an external URL
	),

	array(
	   'name'         => 'WP HTML Compression', // The plugin name
	   'slug'         => 'wp-html-compression', // The plugin slug (typically the folder name)
	   'source'       => get_stylesheet_directory() . '/plugins/standart/wp-html-compression.zip', // The plugin source
	   'required'     => true, // If false, the plugin is only 'recommended' instead of required
	   'version'     => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
	   'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
	   'force_deactivation'  => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
	   'external_url'    => '', // If set, overrides default API URL and points to an external URL
	),

	array(
	   'name'         => 'Quick Cache', // The plugin name
	   'slug'         => 'quick-cache', // The plugin slug (typically the folder name)
	   'source'       => get_stylesheet_directory() . '/plugins/standart/quick-cache.zip', // The plugin source
	   'required'     => true, // If false, the plugin is only 'recommended' instead of required
	   'version'     => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
	   'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
	   'force_deactivation'  => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
	   'external_url'    => '', // If set, overrides default API URL and points to an external URL
	),

	array(
	   'name'         => 'Social Network Auto Poster', // The plugin name
	   'slug'         => 'social-networks-auto-poster-facebook-twitter-g', // The plugin slug (typically the folder name)
	   'source'       => get_stylesheet_directory() . '/plugins/standart/social-networks-auto-poster-facebook-twitter-g.zip', // The plugin source
	   'required'     => true, // If false, the plugin is only 'recommended' instead of required
	   'version'     => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
	   'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
	   'force_deactivation'  => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
	   'external_url'    => '', // If set, overrides default API URL and points to an external URL
	),

	array(
	   'name'         => 'Updraft Plus', // The plugin name
	   'slug'         => 'updraftlus', // The plugin slug (typically the folder name)
	   'source'       => get_stylesheet_directory() . '/plugins/standart/updraftplus.zip', // The plugin source
	   'required'     => true, // If false, the plugin is only 'recommended' instead of required
	   'version'     => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
	   'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
	   'force_deactivation'  => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
	   'external_url'    => '', // If set, overrides default API URL and points to an external URL
	),

  // This is an example of how to include a plugin from the WordPress Plugin Repository
	//array(
	   //'name'   => 'Disqus Comment System',
	   //'slug'   => 'disqus-comment-system',
	   //'required'  => false,
	//),

 );

 // Change this to your theme text domain, used for internationalising strings
 $theme_text_domain = 'greenhouse';

 /**
  * Array of configuration settings. Amend each line as needed.
  * If you want the default strings to be available under your own theme domain,
  * leave the strings uncommented.
  * Some of the strings are added into a sprintf, so see the comments at the
  * end of each line for what each argument will be.
  */
 $config = array(
  'domain'         => $theme_text_domain,          // Text domain - likely want to be the same as your theme.
  'default_path'   => '',                          // Default absolute path to pre-packaged plugins
  'parent_menu_slug'  => 'themes.php',     // Default parent menu slug
  'parent_url_slug'  => 'themes.php',     // Default parent URL slug
  'menu'           => 'install-required-plugins',  // Menu slug
  'has_notices'       => true,                        // Show admin notices or not
  'is_automatic'     => false,         // Automatically activate plugins after installation or not
  'message'    => '',       // Message to output right before the plugins table
  'strings'        => array(
   'page_title'                          => __( 'Install Required Plugins', $theme_text_domain ),
   'menu_title'                          => __( 'Install Plugins', $theme_text_domain ),
   'installing'                          => __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name
   'oops'                                => __( 'Sesuatu yang tidak beres dengan plugin API.', $theme_text_domain ),
   'notice_can_install_required'        => _n_noop( 'Tema ini membutuhkan plugin berikut: %1$s.', 'Tema ini membutuhkan plugin berikut: %1$s.' ), // %1$s = plugin name(s)
   'notice_can_install_recommended'   => _n_noop( 'Tema ini merekomendasikan plugin berikut: %1$s.', 'Tema ini merekomendasikan plugin berikut: %1$s.' ), // %1$s = plugin name(s)
   'notice_cannot_install'       => _n_noop( 'Maaf, tapi Anda tidak memiliki izin yang benar untuk menginstal plugin %s. Hubungi administrator situs ini untuk mendapatkan bantuan pada plugin diinstal.', 'Maaf, tapi Anda tidak memiliki izin yang benar untuk menginstal plugin %s. Hubungi administrator situs ini untuk mendapatkan bantuan pada plugin diinstal.' ), // %1$s = plugin name(s)
   'notice_can_activate_required'       => _n_noop( 'Berikut ini plugin yang diperlukan keadaan tidak aktif: %1$s.', 'Berikut ini plugin yang diperlukan keadaan tidak aktif: %1$s.' ), // %1$s = plugin name(s)
   'notice_can_activate_recommended'   => _n_noop( 'Berikut Plugin yang direkomendasikan saat ini tidak aktif: %1$s.', 'Berikut Plugin yang direkomendasikan saat ini tidak aktif: %1$s.' ), // %1$s = plugin name(s)
   'notice_cannot_activate'      => _n_noop( 'Maaf, tapi Anda tidak memiliki izin untuk mengaktifkan plugin %s ini. Hubungi administrator situs ini untuk mendapatkan bantuan pada plugin yang akan diaktifkan.', 'Maaf, tapi Anda tidak memiliki izin untuk mengaktifkan plugin %s ini. Hubungi administrator situs ini untuk mendapatkan bantuan pada plugin yang akan diaktifkan.' ), // %1$s = plugin name(s)
   'notice_ask_to_update'       => _n_noop( 'Berikut Plugin perlu diperbarui ke versi terbaru untuk memastikan kompatibilitas maksimum dengan tema ini: %1$s.', 'Berikut Plugin perlu diperbarui ke versi terbaru untuk memastikan kompatibilitas maksimum dengan tema ini: %1$s.' ), // %1$s = plugin name(s)
   'notice_cannot_update'       => _n_noop( 'Maaf, tapi Anda tidak memiliki izin untuk memperbarui plugin %s. Hubungi administrator situs ini untuk mendapatkan bantuan pada plugin yang akan diperbarui.', 'Maaf, tapi Anda tidak memiliki izin untuk memperbarui plugin %s. Hubungi administrator situs ini untuk mendapatkan bantuan pada plugin yang akan diperbarui.' ), // %1$s = plugin name(s)
   'install_link'           => _n_noop( 'Mulai Menginstal Plugin', 'Mulai Menginstal Plugin' ),
   'activate_link'          => _n_noop( 'Aktifkan Plugin', 'Aktifkan Plugin' ),
   'return'                              => __( 'Kembali ke Installer Plugin yang Diperlukan', $theme_text_domain ),
   'plugin_activated'                    => __( 'Pengaktifan Plugin telah berhasil', $theme_text_domain ),
   'complete'          => __( 'Semua plugin dipasang dan diaktifkan berhasil. %s', $theme_text_domain ), // %1$s = dashboard link
   'nag_type'         => 'updated' // Determines admin notice type - can only be 'updated' or 'error'
  )
 );

 tgmpa( $plugins, $config );

}
//End of top script
?>
