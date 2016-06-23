<?php
	require_once 'header.php';
?>
<!DOCTYPE html>
<html style="overflow: hidden;" class=" js no-touch cssanimations">
    <head>
        <!-- Define Charset -->
        <meta charset="utf-8">
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta name="keywords" content="Keywords, Keywords">
		<meta name="description" content="Description. Description">
		<!-- Responsive Metatag -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9" />
        <!-- Page Title -->
        <title>Forgot Password | <?=SITETITLE?></title>
<?php
	require_once 'header_menu.php';
?>
	<!-- begin Featured Pooch -->
	<article class="featured">
		<div class="container">
			<div class="row">
				<div class="title">
					<div class="centered">
						<div>
							<h2>Forgot Password</h2>
						</div>
					</div>
				</div>
				<div class="col-md-9">
					<div class="col-xs-12">
						<div class="pricing-tables-helight" style="width:35%;">
							<?php
								require_once 'didyouknow.php';
							?>
						</div>
						<div class="pricing-tables" style="width:65%;">
							<div class="title">Forgot Password? Don't worry! We will help you to reset it.</div>
							<div class="cont-list">
								<ul style="padding-left:20px;padding-right:20px;">
									<li class="last">
										<h5>Already a member? <a href="<?=base_url()?>user/login" class=""><span class="label label-default">Login</span></a></h5>
										<!-- Forgot Password -->
										<form class="form forgot_form1" id="forgot_form1" action="" method="POST">
											<p>Email </p><input type="text" name="forgot_email_page" id="forgot_email_page" value="" class="form-control" placeholder="Email" autocomplete="off">
											<div class="status_msg" style="border:1px soild;float:left;"></div>
											<input type="submit" name="login" id="login" value="Request Password Reset"><br />
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
	<!-- end Featured Pooch -->
	<?php				
		$this->load->view('pinch/footer');
	?>
	<script>$(document).ready(function(){ $("#whyus").addClass(" active");});</script>
	<script>
		$(document).ready(function(){
			$(".form.forgot_form1").validate({
				rules: {
					forgot_email_page: {required: true,email: true, 
								remote: {
											url: "<?=base_url()?>user/check_email_forgot",
											type: "post",
											data: {forgot_email: function(){ return $("#forgot_email_page").val(); }}
										}
					},
				},
				highlight: function(element, errorClass) {$(element).css({ borderColor: '#FF0000' });},
				unhighlight: function(element, errorClass, validClass) {$(element).css({ borderColor: '#CCCCCC' });},
				errorPlacement: function(error, element) {$.validator.messages.required = '';},
				invalidHandler: function(form, validator) {},
				submitHandler: function (form) {
					$.ajax({
						type: "POST",
						url: "<?=base_url()?>user/password_reset_link",
						data: {
							forgot_email : $('#forgot_email_page').val()
						},
						success: function(data) {
							var response = jQuery.parseJSON(data);
							if(response.status != 'error'){
								$('.status_msg').html("<div class='success'>"+ response.msg +"</div>");
								setInterval("window.location.href = '<?=base_url()?>user/login';", 2000);
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