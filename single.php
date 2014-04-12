<?php
/**
 * Default Post Template
 * Description: Post template with a content container and right sidebar.
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

    <header class="post-title">
        <h2><?php the_title();?></h2>
    </header>

    <div class="row content">
        <div class="span8">
            <p class="meta"><?php echo bootstrapwp_posted_on();?></p>
			<div class="image-post-single"><?php the_post_thumbnail('full', array('class' => 'alignleft')); ?></div>
            <?php the_content(); ?>
			<div style="border-top:solid 1px #ddd;padding-top:10px;">
				<p style="font-size:11px;color:#A0A0A0;">Look another options:</p>
				<script type="text/javascript">
				  ( function() {
					if (window.CHITIKA === undefined) { window.CHITIKA = { 'units' : [] }; };
					var unit = {"publisher":"Aank84","width":550,"height":120,"sid":"Chitika Default"};
					var placement_id = window.CHITIKA.units.length;
					window.CHITIKA.units.push(unit);
					document.write('<div id="chitikaAdBlock-' + placement_id + '"></div>');
					var s = document.createElement('script');
					s.type = 'text/javascript';
					s.src = '//cdn.chitika.net/getads.js';
					try { document.getElementsByTagName('head')[0].appendChild(s); } catch(e) { document.write(s.outerHTML); }
				}());
				</script>
			</div>
            <?php the_tags('<p>Tags: ', ', ', '</p>'); ?>
            <?php endwhile; // end of the loop. ?>
            <hr/>
			<!---// Display author profile --->
			<div class="author-profile-singlepost">
			<div class="author-sidebar">
				<?php
				global $post;
				$author_id=$post->post_author;
				echo get_avatar($author_id, 70);
				?>
			</div>
			<div style="color:#07630A;font-size:24.5px;margin-bottom:10px;line-height:25px;"><?php the_author_posts_link(); ?></div>
			<?php $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));?>
			<div class="deskripsi-author"><?php the_author_meta('description'); ?></div>
			<hr/>
			<p>Website : <a href="<?php echo get_the_author_meta('user_url'); ?>" target="_blank"><?php the_author_meta('user_url'); ?></a></p>
			<p>Connect with <?php the_author_meta('display_name'); ?> :
				<a href="<?php echo $curauth->facebook; ?>" target="_blank"><img src="<?php echo get_template_directory_uri();?>/ico/facebook.png"/>Facebook</a>
				<a href="<?php echo $curauth->twitter; ?>" target="_blank"><img src="<?php echo get_template_directory_uri();?>/ico/twitter.png"/>Twitter</a>
				<a href="<?php echo $curauth->googleplus; ?>" target="_blank"><img src="<?php echo get_template_directory_uri();?>/ico/googleplus.png"/>Google Plus</a>
			</p>
			</div>
			<hr/>
			<!---// Related Post/ Berita Terkait --->
			<?php $orig_post = $post;
			global $post;
			$categories = get_the_category($post->ID);
			if ($categories) {
			$category_ids = array();
			foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
			$args=array(
			'category__in' => $category_ids,
			'post__not_in' => array($post->ID),
			'posts_per_page'=> 5, // Number of related posts that will be displayed.
			'caller_get_posts'=>1,
			'orderby'=>'rand' // Randomize the posts
			);
			$my_query = new wp_query( $args );
			if( $my_query->have_posts() ) {
			echo '<div id="related_posts" class="clear"><h3>Tulisan Terkait</h3><ul>';
			while( $my_query->have_posts() ) {
			$my_query->the_post(); ?>
			<li>
				<a href="<?php the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>">
				<?php if ( has_post_thumbnail() ) {
				the_post_thumbnail('thumbnail');
				} else { ?>
					<img src="<?php bloginfo('template_directory'); ?>/img/no-image-thumb.svg" alt="<?php the_title(); ?>" />
				<?php } ?>
				</a>
				<div class="related_content">
					<a href="<? the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
				</div>
			</li>
			<? }
			echo '</ul></div>';
			} }
			$post = $orig_post;
			wp_reset_query(); ?>
			<div class="clear"></div>
			<hr/>
			<!---// end of related post by categories --->
			<?php comments_template(); ?>
            <?php bootstrapwp_content_nav('nav-below'); ?>
        </div><!-- /.span8 -->
    <?php get_sidebar('blog'); ?>
    <?php get_footer(); ?>