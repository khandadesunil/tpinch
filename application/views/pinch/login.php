<?php
	require_once 'header.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Post your Task here and get it done by Experts! | <?=SITETITLE?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="keywords" content="hire a person, sell services, hire services, outsource jobs, post a job, post jobs, post online jobs, jobs in my city, outsource jobs, outsource tasks, part time jobs, hundreds of part time jobs, internet jobs, freelance jobs, online jobs, delivery help, personal assistants, jobs for students, jobs for professionals, personal helper, personal assistant, professional part time jobs, latest jobs">
		<meta name="description" content="Taskpinch.com - Your online market place! Outsource your work and We help you to get the right, skilled, friendly and trustworthy person to work on your job. Taskpinch.com helps you to offer the service or your favourite job to the world and get paid for it.">
		<meta name="format-detection" content="telephone=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<link rel="icon" href="<?=base_url().SITETHEME?>images/favicon.ico" type="image/x-icon">
		<link href="<?=base_url().SITETHEME?>css/css.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="<?=base_url().SITETHEME?>css/font-awesome.css">
		<link rel="stylesheet" href="<?=base_url().SITETHEME?>css/bootstrap.css">
		<link rel="stylesheet" href="<?=base_url().SITETHEME?>css/jquery-ui.css">
		<link rel="stylesheet" href="<?=base_url().SITETHEME?>css/owl.css">
		<link rel="stylesheet" href="<?=base_url().SITETHEME?>css/style.css">
	</head>
	<body>
		<?php
			require_once 'header_menu.php';
		?>
			<section class="sub-banner">
				<div style="background-position: 50% 8px;" class="bg-parallax bg-1"></div>
				<div style="display: none;" class="logo-banner text-center">
					<a href="<?=base_url()?>task/tasks-home" title="Taskpinch Logo"><img src="<?=base_url().SITETHEME?>images/logo-banner.png" alt="Taskpinch Logo"></a>
				</div>
			</section>
			<!-- Main -->
			<div class="main">
				<div class="container">
					<div class="main-cn bg-white clearfix">
						<div class="step">
							<!-- Step -->
							<ul class="payment-step text-center clearfix">
								<li class="step-select">
									<span>1</span>
									<p>Login</p>
								</li>
								<li class="step-part">
									<span>2</span>
									<p>Post a Task</p>
								</li>
								<li>
									<span>3</span>
									<p>Be Relaxed!</p>
								</li>
							</ul>
							<!-- ENd Step -->
						</div>
						<div class="payment-form">
							<div class="col-md-3"></div>
							<div class="col-md-6">
								<h2>Login</h2>
								<form name="form_login" id="form_login" class="form_login" action="" method="post">
									<div class="form-field">
										<input placeholder="Email" class="field-input" type="text" name="login_email" id="login_email">
									</div>
									<div class="form-field">
										<input placeholder="Password" class="field-input" type="password" name="login_password" id="login_password">
									</div>
									<div class="form-field" style="float:right">
										<a href="<?=base_url()?>user/register">Register</a> &nbsp; <button class="awe-btn awe-btn-1 awe-btn-lager">Login</button>
									</div>
									<div class="radio-checkbox">
										<a href="<?=base_url()?>user/forgot-password">Forgot Password?</a>
									</div>
									<div class="form-field status_msg" style="margin-top:35px;"></div>
								</form>
							</div>
							<div class="col-md-3"></div>
						</div>
					</div>
				</div>
			</div>
		<?php
			require_once 'footer.php';
		?>
		<script type="text/javascript" src="<?=base_url().SITETHEME?>js/validation.js"></script>
		<script>$(document).ready(function(){ $("#menu6").addClass(" current-menu-parent");});</script>
		<script>
			$(document).ready(function(){
				$(".form_login").validate({
					rules: {
						login_email: {required: true,email: true},
						login_password: {required: true,minlength: 5}
					},
					highlight: function(element, errorClass) {$(element).css({ borderColor: '#FF0000' });},
					unhighlight: function(element, errorClass, validClass) {$(element).css({ borderColor: '#CCCCCC' });},
					errorPlacement: function(error, element) {$.validator.messages.required = '';},
					invalidHandler: function(form, validator) {},
					submitHandler: function (form) {
						$.ajax({
							type: "POST",
							url: "<?=base_url()?>user/user_login",
							data: {
								email : $('#login_email').val(),
								pass : $('#login_password').val()
							},
							success: function(data) {
								var response = jQuery.parseJSON(data);
								if(response.status != 'error'){
									$('.status_msg').html("<div class='alert-box alert-success'>"+ response.msg +"</div>");
									setInterval("window.location.href = '<?=base_url()?>task/tasks-home';", 2000);
								}else{
									$('.status_msg').html("<div class='alert-box alert-error'>"+ response.msg +"</div>");
								}
							}
						});
						return false;
					}
				});
			});
		</script>