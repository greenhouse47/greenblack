<?php
/**
 * Right Sidebar displayed on post and blog templates.
 *
 * @package WordPress
 * @subpackage Bootstrap
 */
?>
        <div class="span4">
            <div class="well sidebar-nav">
                <div class="author-sidebar">
					<?php
					global $post;
					$author_id=$post->post_author;
					echo get_avatar($author_id, 150);
					?>
				</div>
				<div style="color:#07630A;font-size:24.5px;margin-bottom:10px;line-height:25px;"><?php the_author(); ?></div>
				<?php $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));?>
				<div class="deskripsi-author"><?php the_author_meta('description'); ?></div>
				<hr/>
				<p>Website the author: <a href="<?php echo get_the_author_meta('user_url'); ?>" target="_blank"><?php the_author_meta('user_url'); ?></a></p>
				<p>Connect with <?php the_author_meta('display_name'); ?></p>
				<a href="<?php echo $curauth->facebook; ?>" target="_blank"><img src="<?php echo get_template_directory_uri();?>/ico/facebook.png"/>Facebook</a>
				<a href="<?php echo $curauth->twitter; ?>" target="_blank"><img src="<?php echo get_template_directory_uri();?>/ico/twitter.png"/>Twitter</a>
				<a href="<?php echo $curauth->googleplus; ?>" target="_blank"><img src="<?php echo get_template_directory_uri();?>/ico/googleplus.png"/>Google Plus</a>
            </div><!--/.well .sidebar-nav -->
        </div><!-- /.span4 -->
    </div><!-- /.row .content -->
</div><!--/.container -->
