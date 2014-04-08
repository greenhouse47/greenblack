<?php
/*
Template Name: Page - Login
*/
get_header(); ?>

<div class="container"><!--layout themes -->
	<div id="content"><!--layout themes -->
		<div id="login">
			<?php global $user_ID, $user_identity; get_currentuserinfo(); if (!$user_ID) { ?>
			<div class="row">
				<div class="span12">
					<ul class="breadcrumb">
						<li class="user-avatar-logged"><?php global $userdata; get_currentuserinfo(); echo get_avatar($userdata->ID, 32); ?></li>
						<li>Selamat datang di halaman login<?php echo $user_identity; ?></li>
					</ul>
				</div>
			</div><!--/.row -->
			<div class="container_login">
				<div id="login" class="content_login">
					<form method="post" action="<?php bloginfo('url') ?>/wp-login.php" class="wp-user-form">
						<div class="username">
							<label for="user_login"><i class="fa fa-user"></i> <?php _e('Username'); ?>: </label>
							<input type="text" name="log" value="<?php echo esc_attr(stripslashes($user_login)); ?>" size="20" id="user_login" tabindex="11" />
						</div>
						<div class="password">
							<label for="user_pass"><i class="fa fa-key"></i> <?php _e('Password'); ?>: </label>
							<input type="password" name="pwd" value="" size="20" id="user_pass" tabindex="12" />
						</div>
						<div class="login_fields">
							<div class="rememberme">
								<label for="rememberme">
									<input type="checkbox" name="rememberme" value="forever" checked="checked" id="rememberme" tabindex="13" /> Remember me
								</label>
							</div>
							<?php do_action('login_form'); ?>
							<button type="submit" class="btn"><i class="fa fa-sign-in"></i> Masuk</button>
							<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
							<input type="hidden" name="user-cookie" value="1" />
						</div>
					</form>
				</div>
			</div>
			<?php } else { // is logged in ?>
			<div class="row">
				<div class="span12">
					<ul class="breadcrumb">
						<li class="user-avatar-logged"><?php global $userdata; get_currentuserinfo(); echo get_avatar($userdata->ID, 32); ?></li>
						<li>Selamat Datang, <?php echo $user_identity; ?></li>
						<li><i class="fa fa-desktop"></i> <?php if (current_user_can('manage_options')) { 
							echo '<a href="' . admin_url() . '">' . __('Dashboard') . '</a>'; } else { 
							echo '<a href="' . admin_url() . 'profile.php">' . __('Profile') . '</a>'; } ?>
						</li>
						<li><a href="<?php echo wp_logout_url('index.php'); ?>"><i class="fa fa-sign-out"></i> Keluar</a></li>
						<li><i class="fa fa-pencil-square-o"></i> <?php echo 'Postingan Anda sebanyak: ' . count_user_posts( $userdata->ID ); ?></li>
					</ul>
				</div>
			</div><!--/.row -->
			<!-- List Content User -->
			<div class="row content">
				<div class="span8">
					<header class="subhead" id="overview">
						<div class="author-articles">
							<div class="arship-articles-author">
							<i class="fa fa-folder-open-o"></i> Daftar Postingan Anda
							</div>
						</div>
					</header>
							<div class="row">
									<div class="span8">
										<?php
											if ( is_user_logged_in() ) {
											global $current_user;
												  get_currentuserinfo();
											echo "<br>" ;
											//The Query
											query_posts(array(
											'post_type' => 'post',
											'paged' => $paged,
											'showposts' => 5, 
											'author' => $current_user->ID 
											));
											//The Loop
											if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
											<a style="font-size:23px;" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><i class="fa fa-pencil"></i> <?php the_title(); ?></a><br>
											<p class="meta"><?php echo bootstrapwp_posted_on();?></p>
											<div class="row">
												<?php // Post thumbnail conditional display.
												if ( bootstrapwp_autoset_featured_img() !== false ) : ?>
													<div class="span2">
														<div class="image-headline">
														<?php if ( has_post_thumbnail() ) {
														the_post_thumbnail('thumbnail', array('class' => 'alignleft'));
														} else { ?>
														<img style="width:150px;height:150px;" src="<?php bloginfo('template_directory'); ?>/img/no-image-thumb.svg" alt="<?php the_title(); ?>" />
														<?php } ?>
														</div>
													</div>
													<div class="span6">
												<?php else : ?>
													<div class="span8">
												<?php endif; ?>
														<?php echo get_excerpt(555); ?>
													</div>
											</div><!-- /.row -->
											<hr/>
											<?php endwhile; ?>
											<?php bootstrapwp_content_nav('nav-below'); ?>
											<?php else:
											echo "The user has not contributed anything!";
											endif;
											//Reset Query
											wp_reset_query();
											} else {
												echo 'Selamat datang di Akun Anda!';
											};
										?>									
									</div>
							</div><!-- /.post_class -->
						</div>
						<!-- left sidebar author profile -->
						<div class="span4">
							<div class="well sidebar-nav">
								<div style="font-size:25px;"><i class="fa fa-thumbs-up"></i> On Facebook</div>
								<hr>
								<!-- Facebook -->
								<div class="fb-like-box" data-href="https://www.facebook.com/greenboxindonesia" data-width="327" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>
								<!-- End off -->
							</div><!--/.well .sidebar-nav -->
							<div class="well sidebar-nav">
								<div style="font-size:25px;"><i class="fa fa-bullhorn"></i> Info Update</div>
								<hr>
								<div>
								<?php
								$args = array( 'posts_per_page' => 5 );
								$myposts = get_posts( $args );
								foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
									<div>
										<div class="image-avatar-last-update"><a href="<?php the_permalink(); ?>"><?php echo get_avatar( get_the_author_meta( 'ID' ), 59 ); ?></a></div>
										<div class="image-avatar-last-update-expert">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br>
										<?php echo get_excerpt(105); ?>
										</div>
										<hr>
									</div>
								<?php endforeach; 
								wp_reset_postdata();?>
								</div>
							</div><!--/.well .sidebar-nav -->
						</div><!-- /.span4 -->
						<!-- left sidebar author profile -->
				</div>
			<!-- end off List Content User -->
			<?php } ?>
			<!-- pesan yang akan muncul jika -->
			<?php
				if ( is_user_logged_in() ) {
					echo 'Selamat Anda berhasil masuk di Akun Anda';
				} else {
					echo '';
				}
			?>
			<?php $login  = (isset($_GET['login']) ) ? $_GET['login'] : 0; 
				if ( $login === "failed" ) {
					echo '<p class="login-msg"><strong>NB:</strong> Invalid username dan atau password.</p>';
					} elseif ( $login === "empty" ) {
					echo '<p class="login-msg"><strong>NB:</strong> Username dan atau Password Kosong.</p>';
					} elseif ( $login === "false" ) {
					echo '<p class="login-msg"><strong>NB:</strong> Anda keluar dari Akun Anda.</p>';
					}
			?>
		</div>
	</div><!--end of layout themes -->
</div><!--end oflayout themes -->
<?php get_footer(); ?>