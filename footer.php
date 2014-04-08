<?php
/**
 * Default Footer
 *
 * @package WordPress
 * @subpackage Bootstrap
 */
?>
<footer>
	<div class="container-third">
		<div class="container">
			<div class="timeline-bottom">
				<div class="timeline-bottom-left">
				<a href="http://" target="_blank">"Ayo daftarkan website Komunitas Anda Segera"</a>
				</div>
				<div class="timeline-bottom-right">
				"Greenhouse Project"
				</div>
			</div><!--/.timeline-bottom -->
		</div><!--/.container -->
	</div><!--/.container-third -->
	<div class="container-third-bottom">
		<div class="container">
		    <div class="row">
				<div class="span3">
					<?php
					if (function_exists('dynamic_sidebar')) {
					dynamic_sidebar("footer-left");
					} ?>
				</div>
				<div class="span3">
					<?php
					if (function_exists('dynamic_sidebar')) {
					dynamic_sidebar("footer-middle");
					 } ?>
				</div>
				<div class="span3">
					<?php
					if (function_exists('dynamic_sidebar')) {
					dynamic_sidebar("footer-right");
					} ?>
				</div>
				<div class="span3">
					<h3><i class="fa fa-bug"></i>&nbsp;Development</h3>
					<script language="JavaScript" src="http://feed2js.org//feed2js.php?src=http%3A%2F%2Ffeeds.feedburner.com%2FStatusWhatsUp&num=3&targ=y&utf=y"  charset="UTF-8" type="text/javascript"></script>
					<noscript><a href="http://feed2js.org//feed2js.php?src=http%3A%2F%2Ffeeds.feedburner.com%2FStatusWhatsUp&num=3&targ=y&utf=y&html=y">View RSS feed</a></noscript>
				</div>
		    </div><!--/.row -->
		</div><!-- /.container -->
	</div><!--/.container-third-bottom -->
	<div class="container-fort">
		<div class="container">
			<div class="footer-custom">
				<div class="footer-colom-left">
					<?php $greenhouse_footer_logo_activate = get_option('greenhouse_footer_logo_activate'); if(($greenhouse_footer_logo_activate == '') || ($greenhouse_footer_logo_activate == 'No')) { ?>
					<div class="footer-logo"><a href="<?php echo home_url('/'); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php echo get_template_directory_uri();?>/img/footer_maskot_gb.png" alt="Greenboxindonesia"/></a></div>
					<?php } else { ?>
					<div class="footer-logo"><a href="<?php echo home_url('/'); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php echo get_option('greenhouse_footer_logo_url'); ?>" alt="<?php bloginfo('name'); ?>"/></a></div>
					<?php } ?>
					<p><?php bloginfo('name'); ?></p>
					<p><i class="fa fa-map-marker"></i> <?php echo get_option('greenhouse_alamat_text'); ?></p>
					<p><?php echo get_option('greenhouse_kota_text'); ?></p>
					<p><i class="fa fa-phone"></i> <?php echo get_option('greenhouse_kontak_text'); ?></p>
					<p>Greenhouse Development Program</p>
					<p><a style="color:white;" href="http://news.greenbox.web.id/" target="_blank">Program Pengembangan Komunitas</a></p>
					<p>Copyright &copy; 2010 - <?php the_time('Y') ?>. All rights reserved.</p>
				</div>
				<div class="footer-menu-bottom">
					<div class="footer-social-media"><h3><i class="fa fa-thumbs-up"></i>&nbsp;Ikuti Kami di Jaringan Sosial</h3></div>
					<div class="footer-social-media-icon">
						<a href="<?php echo get_option('greenhouse_facebook'); ?>" target="_blank"><i class="fa fa-facebook"></i>&nbsp;Facebook</a>&nbsp;&nbsp;
						<a href="<?php echo get_option('greenhouse_googleplus'); ?>" target="_blank"><i class="fa fa-google-plus"></i>&nbsp;Google Plus</a>&nbsp;&nbsp;
						<a href="<?php echo get_option('greenhouse_twitter'); ?>"target="_blank"><i class="fa fa-twitter"></i>&nbsp;Twitter</a>&nbsp;&nbsp;
					</div>
					<br/>
					<div class="footer-menu-policy"><?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?></div>
					<div class="copyright-greenboxindonesia">
						<p>Supported by</p>
						<a href="http://www.greenboxindonesia.com" target="_blank"><img style="margin-bottom:15px;" src="<?php echo get_template_directory_uri();?>/img/greenboxindonesia.png" alt="Greenboxindonesia"/></a>
						<p>Take the Future in your hands</p>
						<p>Greenhouse Project Development by <a style="color:white;" href="http://www.greenboxindonesia.com" target="_blank">Greenboxindonesia</a></p>
					</div>
				</div>
			</div>
		</div><!-- /.container -->
	</div><!-- /.container-fort -->
</footer>
<?php echo stripslashes( get_option( 'greenhouse_analytics' ) );?>
<?php wp_footer();?>
</body>
</html>
