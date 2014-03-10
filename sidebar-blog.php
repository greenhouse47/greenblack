<?php
/**
 * Right Sidebar displayed on post and blog templates.
 *
 * @package WordPress
 * @subpackage Bootstrap
 */
?>
        <div class="span4">
			<div class="office-picture">
					<img src="<?php echo get_option('greenhouse_office_picture_url'); ?>" alt="<?php bloginfo('name'); ?>"/>
			</div>
            <div class="well sidebar-nav">
                <?php
                if (function_exists('dynamic_sidebar')) {
                    dynamic_sidebar("sidebar-posts");
                } ?>
            </div><!--/.well .sidebar-nav -->
			<div class="well sidebar-nav">
			<a href="http://www.chitika.com/publishers/apply?refid=aank84"><img style="width:370px;hight:auto;"src="http://images.chitika.net/ref_banners/250x250_using_adsense.gif" /></a>
			</div>
		</div><!-- /.span4 -->
    </div><!-- /.row .content -->
</div><!--/.container -->
