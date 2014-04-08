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
				<div class="sidebar-archive-pengurus">
					<p><?php echo get_option('greenhouse_decription'); ?></p>
					<hr/>
					<p><i class="fa fa-map-marker"></i> Office Address<br/>
					<?php bloginfo('name'); ?><br/>
					<?php echo get_option('greenhouse_alamat_text'); ?><br/>
					<?php echo get_option('greenhouse_kota_text'); ?><br/>
					<i class="fa fa-phone"></i> <?php echo get_option('greenhouse_kontak_text'); ?></p>
					<p><i class="fa fa-hdd-o"></i> List Arsip Staff</p>
					<!-- List Arship Category Pengurus -->
					<?php 
					//list terms in a given taxonomy using wp_list_categories (also useful as a widget if using a PHP Code plugin)
					$taxonomy     = 'staff_categories';
					$orderby      = 'name'; 
					$show_count   = 0;      // 1 for yes, 0 for no
					$pad_counts   = 0;      // 1 for yes, 0 for no
					$hierarchical = 1;      // 1 for yes, 0 for no
					$title        = '';

					$args = array(
					  'taxonomy'     => $taxonomy,
					  'orderby'      => $orderby,
					  'show_count'   => $show_count,
					  'pad_counts'   => $pad_counts,
					  'hierarchical' => $hierarchical,
					  'title_li'     => $title
					);
					?>
					<?php 
					// show list category 
					wp_list_categories( $args ); ?>
					<!-- end off list categories -->
					
				</div>
            </div><!--/.well .sidebar-nav -->
        </div><!-- /.span4 -->
    </div><!-- /.row .content -->
</div><!--/.container -->
