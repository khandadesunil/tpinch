<?php
	require_once 'header.php';
?>
<!DOCTYPE html>
<html style="overflow: hidden;" class=" js no-touch cssanimations">
    <head>
        <!-- Define Charset -->
        <meta charset="utf-8">
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta name="keywords" content="taskpinch register, register jobs pinch, taskpinch sign up, sign up into taskpinch, taskpinch register page, taskpinch sign up page, offer a pinch, offer a online service, sell my services, my services, sell my work, hire a person, sell services, hire services, outsource jobs, post a job, post jobs, post online jobs, jobs in my city">
		<meta name="description" content="Taskpinch.com - Your online market place! Register or become a member of taskpinch and checkout more features of the Taskpinch. Sell or buy your favourite work and get paid for the same. Outsource your work and We help you to get the right, skilled, friendly and trustworthy person to work on your job. Taskpinch.com helps you to offer the service or your favourite job to the world and get paid for it.">
		<!-- Responsive Metatag -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9" />
        <!-- Page Title -->
        <title>Register | <?=SITETITLE?></title>
<?php
	require_once 'header_menu.php';
?>
	<article class="featured">
		<div class="container">
			<div class="row">
				<div class="title">
					<div class="centered">
						<div>
							<h2>Register</h2>
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
							<div class="title">Its simple and easy! become a member and get member benefits</div>
							<div class="cont-list">
								<ul style="padding-left:20px;padding-right:20px;">
									<li class="last">
										<h5>Already a member? <a href="<?=base_url()?>user/login" class=""><span class="label label-default">Login</span></a></h5>
										<form class="form reg_form1" id="reg_form1" action="" method="POST">
											<div class="col-md-6">
												<p>First Name </p><input type="text" name="reg_first_name_page" id="reg_first_name_page" value="" class="form-control" placeholder="First Name">
											</div>
											<div class="col-md-6">
												<p>Last Name </p><input type="text" name="reg_last_name_page" id="reg_last_name_page" value="" class="form-control" placeholder="Last Name">
											</div>
											<div class="col-md-13">
												<p>Email </p><input type="text" name="reg_email_page" id="reg_email_page" value="" class="form-control" placeholder="Email" autocomplete="off">
											</div>
											<div class="col-md-6">
												<p>Password </p><input type="password" name="reg_pass_page" id="reg_pass_page" value="" class="form-control" placeholder="Password" autocomplete="off">
											</div>
											<!--<div class="col-md-12">
												<p>Confirm Password </p><input type="password" name="reg_conf_pass" id="reg_conf_pass" class="form-control" placeholder="Confirm Password" autocomplete="off">
											</div>-->
											<div class="col-md-6">
												<p>Mobile </p><input type="text" name="reg_contact_page" id="reg_contact_page" value="" class="form-control" placeholder="Mobile Number">
											</div>
											<div class="col-md-6">
												<p>Gender </p>
												<p><input type="radio" name="reg_gender_page" id="reg_male_page" value="male">&nbsp; Male &nbsp; &nbsp;
												<input type="radio" name="reg_gender_page" id="reg_female_page" value="female">&nbsp; Female</p>
											</div>
											<div class="col-md-6">
												<p>&nbsp;</p>
												<p> &nbsp; &nbsp; <input type="checkbox" name="reg_terms_page" id="reg_terms_page" value="1">
												&nbsp; I accept <a href="<?=base_url()?>pinch/terms" target="_blank">Terms</a> & <a href="<?=base_url()?>pinch/privacy-policy" target="_blank">Privacy</a></p>
											</div>
											<div class="col-md-12">
												<div class="status_msg" style="border:1px soild;float:left;"></div>
												<input type="submit" name="register" id="register_page" value="Register">
											</div>
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
			$(".form.reg_form1").validate({
				rules: {
					reg_first_name_page: {required: true,minlength: 3},
					reg_last_name_page: {required: true,minlength: 3},
					reg_contact_page: {required: true,number: true, minlength: 10, maxlength: 10},
					reg_email_page: {required: true,email: true, 
							remote: {
										url: "<?=base_url()?>user/check_email",
										type: "post",
										data: {reg_email: function(){ return $("#reg_email_page").val(); }}
									}
					},
					reg_pass_page: {required: true,minlength: 5},
					reg_conf_pass: {required: true,equalTo: "#reg_pass_page",minlength: 5},
					'reg_gender_page': {required: true},
					reg_terms_page: {required: true}
				},
				highlight: function(element, errorClass) {$(element).css({ borderColor: '#FF0000'});},
				unhighlight: function(element, errorClass, validClass) {$(element).css({ borderColor: '#CCCCCC'});},
				errorPlacement: function(error, element) {
					if (element.attr("type") == "radio" || element.attr("type") == "checkbox") {
						$(element).css("outline", "1px solid red");
					} else{
						$.validator.messages.required = '';
					}
				},
				invalidHandler: function(form, validator) {},
				submitHandler: function (form) {
					var gender = $('input[name=reg_gender_page]:checked').val()
					$.ajax({
						type: "POST",
						url: "<?=base_url()?>user/user_register",
						data: {
							first_name : $('#reg_first_name_page').val(),
							last_name : $('#reg_last_name_page').val(),
							contact : $('#reg_contact_page').val(),
							email : $('#reg_email_page').val(),
							pass : $('#reg_pass_page').val(),
							conf_pass : $('#reg_conf_pass').val(),
							gender : gender
						},
						success: function(data) {
							var response = jQuery.parseJSON(data);
							if(response.status != 'error'){
								$('.status_msg').html("<div class='success'>"+ response.msg +"</div>");
								setInterval("window.location.href = '<?=base_url()?>task/offered_tasks';", 2000);
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