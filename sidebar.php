<?php
/**
 * The Right Sidebar displayed on page templates.
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
                    dynamic_sidebar("sidebar-page");
                }
                ?>
            </div>
            <!--/.well .sidebar-nav -->
        </div><!-- /.span4 -->
    </div><!-- /.row .content -->
</div><!--/.container -->
