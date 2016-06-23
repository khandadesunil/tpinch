<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=UTF-8">
		<title>Taskpinch Administrator Login</title>
		<link rel="stylesheet" href="<?=base_url().ADMINTHEME?>css/screen.css" type="text/css" media="screen" title="no title" charset="utf-8">
		<link rel="stylesheet" href="<?=base_url().ADMINTHEME?>css/plugin.css" type="text/css" media="screen" title="no title" charset="utf-8">
		<link rel="stylesheet" href="<?=base_url().ADMINTHEME?>css/custom.css" type="text/css" media="screen" title="no title" charset="utf-8">
		<link rel="stylesheet" href="<?=base_url().ADMINTHEME?>css/login.css" type="text/css" media="screen" title="no title" charset="utf-8">
		<script src="<?=base_url().ADMINTHEME?>js/jquery-1.8.0.min.js"></script>
		<script src="<?=base_url().ADMINTHEME?>js/jquery-migrate-1.0.0.js"></script>
		<!-- Validation -->
		<script src="<?=base_url().ADMINTHEME?>js/validation.js"></script>
	</head>
	<body>
		<div id="login">
			<h1 id="title">
				<a href="">Taskpinch Administrator Login</a>
			</h1>
			<div id="login-body" class="clearfix">
				<form class="form login_form" id="login_form" action="" method="POST">
					<div class="content_front">
						<div class="pad">
							<div class="field">
								<label>
								Email:</label>
								<div class="">
									<span class="input">
									<input name="email1" id="email1" class="text" value="" type="text"></span>
								</div>
							</div>
							<!-- .field -->
							<div class="field">
								<label>
								Password:</label>
								<div class="">
									<span class="input">
									<input name="pass1" id="pass1" class="text" value="" type="password">
								</div>
							</div>
							<div class="field">
								<span class="label">&nbsp;</span>
								<div class="">
									<button type="submit" class="btn">Login</button>
									&nbsp; &nbsp; <div class="status_msg" style="width:200px;float:right;">&nbsp;</div>
								</div>
							</div>
							<!-- .field -->
						</div>
					</div>
				</form>
			</div>
		</div>
		<!-- #login -->
	</body>
	<script>
		$(document).ready(function(){
			$( "#email1" ).focus();
			$(".form.login_form").validate({
				rules: {
					email1: {required: true,email: true},
					pass1: {required: true,minlength: 5}
				},
				highlight: function(element, errorClass) {$(element).css({ borderColor: '#FF0000' });},
				unhighlight: function(element, errorClass, validClass) {$(element).css({ borderColor: '#CCCCCC' });},
				errorPlacement: function(error, element) {$.validator.messages.required = '';},
				invalidHandler: function(form, validator) {},
				submitHandler: function (form) {
					$.ajax({
						type: "POST",
						url: "<?=base_url()?>admin/user_login",
						data: {
							email : $('#email1').val(),
							pass : $('#pass1').val()
						},
						success: function(data) {
							var response = jQuery.parseJSON(data);
							if(response.status != 'error'){
								$('.status_msg').html("<div class='success'>"+ response.msg +"</div>");
								setInterval("window.location.href = '<?=base_url()?>admin/dashboard';", 1000);
							}else{
								$('.status_msg').html("<div class='failure'>"+ response.msg +"</div>");
							}
						}
					});
					return false;
				}
			});
		});
	</script>
</html>