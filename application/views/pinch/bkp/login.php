<?php
	require_once 'header.php';
?>
<!DOCTYPE html>
<html style="overflow: hidden;" class=" js no-touch cssanimations">
    <head>
        <!-- Define Charset -->
        <meta charset="utf-8">
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta name="keywords" content="taskpinch login, login jobs pinch, taskpinch sign in, sign in into taskpinch, taskpinch login page, taskpinch sign in page, offer a pinch, offer a online service, sell my services, my services, sell my work, hire a person, sell services, hire services, outsource jobs, post a job, post jobs, post online jobs, jobs in my city">
		<meta name="description" content="Taskpinch.com - Your online market place! Login to avail more features of the Taskpinch. Sell or buy your favourite work and get paid for the same. Outsource your work and We help you to get the right, skilled, friendly and trustworthy person to work on your job. Taskpinch.com helps you to offer the service or your favourite job to the world and get paid for it.">
		<!-- Responsive Metatag -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta name="googlebot" content="index">
		<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9" />
        <!-- Page Title -->
        <title>Login | <?=SITETITLE?></title>
<?php
	require_once 'header_menu.php';
?>
	<article class="featured">
		<div class="container">
			<div class="row">
				<div class="title">
					<div class="centered">
						<div>
							<h2>Login</h2>
						</div>
					</div>
				</div>
				<div class="col-md-9">
					<div class="col-xs-12">
						<div class="pricing-tables" style="width:34%;margin-right:8px;">
							<?php
								require_once 'didyouknow.php';
							?>
						</div>
						<div class="pricing-tables" style="width:65%;">
							<div class="title">Login to reveal more features</div>
							<div class="cont-list">
								<ul style="padding-left:20px;padding-right:20px;">
									<li class="last">
										<h5>Not a member yet? <a href="<?=base_url()?>user/register" id="register" class=""><span class="label label-default">Register</span></a></h5><br />
										<form class="form l_form" id="l_form" action="" method="POST">
											<p>Email </p><input type="text" name="l_email" id="l_email" value="" class="form-control" placeholder="Email">
											<p>Password </p><input type="password" name="l_pass" id="l_pass" value="" class="form-control" placeholder="Password">
											<div class="status_msg" style="border:1px soild;float:left;"></div>
											<input type="submit" name="login" id="login" value="Login"><br /><br />
											<p style="text-align:right"><a href="<?=base_url()?>user/forgot-password">Forgot Password</a></p>
										</form>
									</li>
								</ul>
							</div>
							<div class="ordernow"></div>
						</div>
					</div>
				</div>
				<?php
					$this->load->view('pinch/ads_page');
				?>
			</div>
		</div>
	</article>
	<?php				
		$this->load->view('pinch/footer');
	?>
	<script>$(document).ready(function(){ $("#whyus").addClass(" active");});</script>
	<script>
		$(document).ready(function(){
			$(".form.l_form").validate({
				rules: {
					l_email: {required: true,email: true},
					l_pass: {required: true,minlength: 5}
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
							email : $('#l_email').val(),
							pass : $('#l_pass').val()
						},
						success: function(data) {
							var response = jQuery.parseJSON(data);
							if(response.status != 'error'){
								$('.status_msg').html("<div class='success'>"+ response.msg +"</div>");
								setInterval("window.location.href = '<?=base_url()?>task/offered_tasks';", 1000);
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
	</body>
</html>