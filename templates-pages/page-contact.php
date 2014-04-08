<?php
/**
 * Template Name: Page - Contact Page
 * Description: Displays a page title and content without displaying a sidebar.
 *
 * @package WordPress
 * @subpackage BootstrapWP
 */
?>

<?php
if(isset($_POST['submitted'])) {
	if(trim($_POST['contactName']) === '') {
		$nameError = 'Mohon masukkan Nama Anda.';
		$hasError = true;
	} else {
		$name = trim($_POST['contactName']);
	}

	if(trim($_POST['email']) === '')  {
		$emailError = 'Mohon masuukan Email Anda.';
		$hasError = true;
	} else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['email']))) {
		$emailError = 'Alamat Email Anda tidak valid';
		$hasError = true;
	} else {
		$email = trim($_POST['email']);
	}

	if(trim($_POST['comments']) === '') {
		$commentError = 'Mohon Isi Pesan Anda.';
		$hasError = true;
	} else {
		if(function_exists('stripslashes')) {
			$comments = stripslashes(trim($_POST['comments']));
		} else {
			$comments = trim($_POST['comments']);
		}
	}

	if(!isset($hasError)) {
		$emailTo = get_option('tz_email');
		if (!isset($emailTo) || ($emailTo == '') ){
			$emailTo = get_option('admin_email');
		}
		$subject = '[PHP Snippets] From '.$name;
		$body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
		$headers = 'From: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;

		wp_mail($emailTo, $subject, $body, $headers);
		$emailSent = true;
	}

} ?>
<?php get_header(); ?>
<div class="container-homepage">
	<!-- Background on Top Header Homepage -->
	<?php $background = wp_get_attachment_image_src( get_post_thumbnail_id( $page->ID ), 'full' );?>
	<style>
	.container-homepage {
	background-image: url('<?php echo $background[0]; ?>');
	}
	</style>
   	 <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="container">
		<div class="contact-page-header">
			<h3 style="color:white;"><i class="fa fa-envelope-o"></i> <?php the_title();?></h3>
			<?php if(isset($emailSent) && $emailSent == true) { ?>
					<div class="thanks">
						<p style="color:white;">Terimakasih, email Anda terkirim dengan sukses.</p>
					</div>
				<?php } else { ?>
					<?php the_content(); ?>
					<?php if(isset($hasError) || isset($captchaError)) { ?>
						<p class="error">Maaf, terjadi kesalahan.<p>
					<?php } ?>

				<form action="<?php the_permalink(); ?>" id="contactForm" method="post">
					<fieldset>
						<input type="text" placeholder="Nama Anda" name="contactName" id="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" class="required requiredField" />
						<?php if($nameError != '') { ?>
							<span class="error"><?=$nameError;?></span>
						<?php } ?>
						<input type="text" placeholder="Email Anda" name="email" id="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="required requiredField email" />
						<?php if($emailError != '') { ?>
							<span class="error"><?=$emailError;?></span>
						<?php } ?>
						
						<label for="commentsText" style="color:white;"><i class="fa fa-pencil-square-o"></i> Isi Pesan:</label>
						<textarea name="comments" id="commentsText" rows="20" cols="30" class="required requiredField"><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea>
						<?php if($commentError != '') { ?>
							<span class="error"><?=$commentError;?></span>
						<?php } ?>
						<br/>
						<button type="submit" class="btn"><i class="fa fa-sign-in"></i> Kirim Pesan</button>
								
					</fieldset>
					<input type="hidden" name="submitted" id="submitted" value="true" />
				</form>
				<?php } ?>
		</div><!--/.homepage-logo -->
	</div>
    <?php endwhile; endif; ?>
</div><!--/.container-homepage -->

<?php get_footer(); ?>