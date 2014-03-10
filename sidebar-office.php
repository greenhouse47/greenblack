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
					<p>Himpunan Mahasiswa Islam<br/>
					<?php bloginfo('name'); ?><br/>
					<?php echo get_option('greenhouse_alamat_text'); ?><br/>
					<?php echo get_option('greenhouse_kota_text'); ?><br/>
					<?php echo get_option('greenhouse_kontak_text'); ?></p>
				</div>
            </div><!--/.well .sidebar-nav -->
        </div><!-- /.span4 -->
    </div><!-- /.row .content -->
</div><!--/.container -->
