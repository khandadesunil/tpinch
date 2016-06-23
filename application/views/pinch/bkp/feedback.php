<?php
	require_once 'header.php';
?>
<!DOCTYPE html>
<html style="overflow: hidden;" class=" js no-touch cssanimations">
    <head>
        <!-- Define Charset -->
        <meta charset="utf-8">
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta name="keywords" content="taskpinch user feedback, share your feedback on taskpinch, taskpinch customer feedback">
		<meta name="description" content="Taskpinch.com - Your online market place! Share your feedback. Your feedback is very important to us and its helps us to server you better.">
		<!-- Responsive Metatag -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9" />
        <!-- Page Title -->
        <title>Let us know what you think about us | <?=SITETITLE?></title>
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
							<h2>Feedback</h2>
						</div>
					</div>
				</div>
				<div class="col-md-9">
					<div class="col-xs-12">
						<div class="pricing-tables" style="width:34%;margin-right:8px;">
							<div class="title">Why to give Feedback?</div>
							<div class="cont-list">
								<ul style="text-align:left; padding-left:5px;font-size:12px;">
									<li><i class="icon-check"></i> Did you like the Portal?</li>
									<li><i class="icon-check"></i> Facing any problems with portal? </li>
									<li><i class="icon-check"></i> Need any help? </li>
									<li><i class="icon-check"></i> Write to us to solve your query</li>
									<li><i class="icon-check"></i> Your feedback help us to serve you better</li>
									<li class="last"><i class="icon-check"></i> You feedback is valuable for us</li>
								</ul>
							</div>
							<div class="ordernow"></div>
						</div>
						<div class="pricing-tables" style="width:65%;">
							<div class="title">Feedback</div>
							<div class="cont-list">&nbsp;You feedback is very valuable, write to us and be sure to hear from Us.
								<ul style="padding-left:20px;padding-right:20px;">
									<li class="last">
										<form class="form l_form" id="l_form" action="" method="POST">
										<p>Your Name </p><input type="text" name="name" id="name" value="" class="form-control" placeholder="Enter your Name">
										<p>Your Email </p><input type="text" name="email" id="email" value="" class="form-control" placeholder="Enter your Email">
											<p>Feedback Type </p>
											<select name="type" id="type" class="form-control">
												<option value="">Select...</option>
												<option value="reportabug">Report a Bug</option>
												<option value="servicerequest">Service Request</option>
												<option value="feedback">Feedback</option>
											</select>
											<p>Your Comments </p><textarea name="comments" id="comments" class="form-control" placeholder="Enter your Comments here"></textarea>
											<div class="status_msg" style="border:1px soild;float:left;"></div>
											<input type="submit" name="send" id="send" value="Send"><br />
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
	<script>$(document).ready(function(){ $("#howitworks").addClass(" active");});</script>
	<script>
		$(document).ready(function(){
			$(".form.l_form").validate({
				rules: {
					name: {required: true},
					email: {required: true,email: true},
					type: {required: true},
					comments: {required: true,minlength: 5}
				},
				highlight: function(element, errorClass) {$(element).css({ borderColor: '#FF0000' });},
				unhighlight: function(element, errorClass, validClass) {$(element).css({ borderColor: '#CCCCCC' });},
				errorPlacement: function(error, element) {$.validator.messages.required = '';},
				invalidHandler: function(form, validator) {},
				submitHandler: function (form) {
					$.ajax({
						type: "POST",
						url: "<?=base_url()?>pinch/send_feedback",
						data: {
							name : $('#name').val(),
							email : $('#email').val(),
							type : $('#type').val(),
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