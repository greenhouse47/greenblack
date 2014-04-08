<?php
/*
Template Name: Page - Signup
*/
require_once(ABSPATH . WPINC . '/registration.php');
global $wpdb, $user_ID;
//Check whether the user is already logged in
if (!$user_ID) {

	if($_POST){
		//We shall SQL escape all inputs
		$username = $wpdb->escape($_REQUEST['username']);
		if(empty($username)) {
			echo "User name should not be empty.";
			exit();
		}
		$email = $wpdb->escape($_REQUEST['email']);
		if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", $email)) {
			echo "Please enter a valid email.";
			exit();
		}

			$random_password = wp_generate_password( 12, false );
			$status = wp_create_user( $username, $random_password, $email );
			if ( is_wp_error($status) )
				echo "Username already exists. Please try another one.";
			else {
				$from = get_option('admin_email');
		                $headers = 'From: '.$from . "\r\n";
		                $subject = "Registration successful";
		                $msg = "Registration successful.\nYour login details\nUsername: $username\nPassword: $random_password";
		                wp_mail( $email, $subject, $msg, $headers );
				echo "Please check your email for login details.";
			}

		exit();

	} else {
		get_header();
?>
<!-- <script src="http://code.jquery.com/jquery-1.4.4.js"></script> -->
<!-- Remove the comments if you are not using jQuery already in your theme -->
<div class="container">
<div id="content">
	<?php if(get_option('users_can_register')) { 
//Check whether user registration is enabled by the administrator ?>

	<h1><?php the_title(); ?></h1>
	<div id="result"></div> <!-- To hold validation results -->
	<form method="post" action="verify.php">
		<label>Username</label>
		<input type="text" placeholder="Masukkan Username Anda" name="username" class="text" value="" /><br/>
		<label>Email</label>
		<input type="text" placeholder="Masukkan Email Anda" name="email" class="text" value="" /><br/>
<!-- Add recaptcha library -->
        <?php
		  require_once( trailingslashit( get_template_directory() ) . 'recaptcha/recaptchalib.php'); // themes panel greenhouse
          //require_once('recaptchalib.php');
          $publickey = "6Ld2LsUSAAAAAIMgMs6eyPxvQx8t-iEhAMym7x68"; // you got this from the signup page
          echo recaptcha_get_html($publickey);
        ?>
		<br/>
		<button type="submit" class="btn">Mendaftar</button>
	</form>
	<script type="text/javascript">
		//<![CDATA[
		$("#submitbtn").click(function() {

		$('#result').html('<img src="<?php bloginfo('template_url') ?>/img/loading.gif" class="loader" />').fadeIn();
		var input_data = $('#wp_signup_form').serialize();
		$.ajax({
		type: "POST",
		url:  "",
		data: input_data,
		success: function(msg){
		$('.loader').remove();
		$('<div>').html(msg).appendTo('div#result').hide().fadeIn('slow');
		}
		});
		return false;

		});
		//]]>
	</script>
	<?php } else echo "Registration is currently disabled. Please try again later."; ?>
	</div>
</div>
<?php

    get_footer();
 } //end of if($_post)

}
else {
	wp_redirect( home_url() ); exit;
}
?>
