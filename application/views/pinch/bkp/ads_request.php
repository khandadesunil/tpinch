<?php
	require_once 'header.php';
?>
<!DOCTYPE html>
<html style="overflow: hidden;" class=" js no-touch cssanimations">
    <head>
        <!-- Define Charset -->
        <meta charset="utf-8">
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta name="keywords" content="taskpinch links share, share taskpinch link, share a link, taskpinch link">
		<meta name="description" content="Taskpinch.com - Your online market place! Share taskpinch link and get rewarded. You can send us the request for advertisements and we will get back to you.">
		<!-- Responsive Metatag -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9" />
        <!-- Page Title -->
        <title>Advertise with Us | <?=SITETITLE?></title>
<?php
	require_once 'header_menu.php';
?>
	<article class="featured">
		<div class="container">
			<div class="row">
				<div class="title">
					<div class="centered">
						<div>
							<h2>Advertise with Us</h2>
						</div>
					</div>
				</div>				
				<div class="col-md-9">
					<div class="col-xs-12">
						<div class="pricing-tables" style="width:34%;margin-right:8px;">
							<div class="title">Why to Advertise with Us?</div>
							<div class="cont-list">
								<ul style="text-align:left; padding-left:5px;font-size:12px;">
									<li><i class="icon-check"></i> Share a link and get rewarded</li>
									<li><i class="icon-check"></i> Share a link and collect the points</li>
									<li><i class="icon-check"></i> Redeem points for buying premium membership</li>
									<li><i class="icon-check"></i> Buy a premium membership to unlock new features</li>
									<li class="last"><i class="icon-check"></i> Get a badge to show it to other people</li>
								</ul>
							</div>
							<div class="ordernow"></div>
						</div>
						<div class="pricing-tables" style="width:65%;">
							<div class="title">Advertise with Us and get benefited</div>
							<div class="cont-list">
								<ul style="padding-left:20px;padding-right:20px;">
									<li class="last">
										<form class="form ads_form" id="ads_form" action="" method="POST">
											<p>Your Name </p><input type="text" name="req_name" id="req_name" value="" class="form-control" placeholder="Enter your Name">
											<p>Your Email </p><input type="text" name="req_email" id="req_email" value="" class="form-control" placeholder="Enter your Email">
											<p>Ads Comments </p><textarea name="req_desc" id="req_desc" class="form-control" placeholder="Enter your Comments here"></textarea>
											<div class="status_msg" style="border:1px soild;float:left;"></div>
											<input type="submit" name="share" id="share" value="Send a Request"><br />
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
	<script>$(document).ready(function(){ $("#share").addClass(" active");});</script>
	<script>
		$(document).ready(function(){
			$(".form.ads_form").validate({
				rules: {
					req_name: {required: true},
					req_email: {required: true,email: true},
					req_desc: {required: true,minlength: 5}
				},
				highlight: function(element, errorClass) {$(element).css({ borderColor: '#FF0000' });},
				unhighlight: function(element, errorClass, validClass) {$(element).css({ borderColor: '#CCCCCC' });},
				errorPlacement: function(error, element) {$.validator.messages.required = '';},
				invalidHandler: function(form, validator) {},
				submitHandler: function (form) {
					$.ajax({
						type: "POST",
						url: "<?=base_url()?>pinch/post_ad_request",
						data: {
							req_name : $('#req_name').val(),
							req_email : $('#req_email').val(),
							req_desc : $('#req_desc').val()
						},
						success: function(data) {
							var response = jQuery.parseJSON(data);
							if(response.status != 'error'){
								$('.status_msg').html("<div class='success'>"+ response.msg +"</div>");
								setInterval("window.location.href = '<?=base_url()?>task/tasks-home';", 3000);
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