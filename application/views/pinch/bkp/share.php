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
		<meta name="description" content="Taskpinch.com - Your online market place! Share taskpinch link and get rewared. Sharing taskpinch links can help you and your closed ones to get their task, jobs easily and also can be helpfull to earn some extra money">
		<!-- Responsive Metatag -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9" />
        <!-- Page Title -->
        <title>Share a Link | <?=SITETITLE?></title>
<?php
	require_once 'header_menu.php';
?>
	<article class="featured">
		<div class="container">
			<div class="row">
				<div class="title">
					<div class="centered">
						<div>
							<h2>Share</h2>
						</div>
					</div>
				</div>				
				<div class="col-md-9">
					<div class="col-xs-12">
						<div class="pricing-tables" style="width:34%;margin-right:8px;">
							<div class="title">Why to Share?</div>
							<div class="cont-list">
								<ul style="text-align:left; padding-left:5px;font-size:12px;">
									<li><i class="icon-check"></i> Share a link and get rewarded</li>
									<li><i class="icon-check"></i> Share a link and collect the points</li>
									<li><i class="icon-check"></i> Redeem points for buying premium membership</li>
									<li><i class="icon-check"></i> Buy a premium membership to unlock new features</li>
									<li class="last"><i class="icon-check"></i> Get a badge to show your skills and efforts</li>
								</ul>
							</div>
							<div class="ordernow"></div>
						</div>
						<div class="pricing-tables" style="width:65%;">
							<div class="title">Share a link with your friends and get rewarded</div>
							<div class="cont-list">
								<ul style="padding-left:20px;padding-right:20px;">
									<li class="last">
										<form class="form l_form" id="l_form" action="" method="POST">
											<p>Your Name </p><input type="text" name="name" id="name" value="" class="form-control" placeholder="Enter your Name">
											<p>Your Email </p><input type="text" name="email" id="email" value="" class="form-control" placeholder="Enter your Email">
											<p>Friend's Email </p><input type="text" name="friend_email" id="friend_email" value="" class="form-control" placeholder="Enter your Firend's Email">
											<p>Your Comments </p><textarea name="comments" id="comments" class="form-control" placeholder="Enter your Comments here"></textarea>
											<div class="status_msg" style="border:1px soild;float:left;"></div>
											<input type="submit" name="share" id="share" value="Share"><br />
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
			$(".form.l_form").validate({
				rules: {
					name: {required: true},
					email: {required: true,email: true},
					friend_email: {required: true,email: true},
					comments: {required: true,minlength: 5}
				},
				highlight: function(element, errorClass) {$(element).css({ borderColor: '#FF0000' });},
				unhighlight: function(element, errorClass, validClass) {$(element).css({ borderColor: '#CCCCCC' });},
				errorPlacement: function(error, element) {$.validator.messages.required = '';},
				invalidHandler: function(form, validator) {},
				submitHandler: function (form) {
					$.ajax({
						type: "POST",
						url: "<?=base_url()?>pinch/share_link",
						data: {
							name : $('#name').val(),
							email : $('#email').val(),
							friend_email : $('#friend_email').val(),
							comments : $('#comments').val()
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