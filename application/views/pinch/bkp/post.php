<?php
	require_once 'header.php';
?>
<!DOCTYPE html>
<html style="overflow: hidden;" class=" js no-touch cssanimations">
    <head>
        <!-- Define Charset -->
        <meta charset="utf-8">
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta name="keywords" content="post a job, outsource my work, outsource my job, post my work, need expert, need freelance developer, need freelance work, freelance work, micro job, part time job, part time work">
		<meta name="description" content="Taskpinch.com - Your online market place! Sell or buy your favourite work and get paid for the same. Outsource your work and We help you to get the right, skilled, friendly and trustworthy person to work on your job. Taskpinch.com helps you to offer the service or your favourite job to the world and get paid for it.">
		<!-- Responsive Metatag -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9" />
        <!-- Page Title -->
        <title>Post a Task | <?=SITETITLE?></title>
<?php
	require_once 'header_menu.php';
?>
	<article class="featured">
		<div class="container">
			<div class="row">
				<div class="title">
					<div class="centered">
						<div>
							<h2>Post a Task</h2>
						</div>
					</div>
				</div>
				<div class="col-md-9">
					<div class="col-xs-12">
						<div class="pricing-tables-helight" style="width:35%;">
							<div class="title">Why to Post a Task here?</div>
							<div class="cont-list">
								<ul style="text-align:left; padding-left:5px;font-size:12px;">
									<li><i class="icon-check"></i> Be relaxed and enjoy your leisure time</li>
									<li><i class="icon-check"></i> Choose the expert to work on your task</li>
									<li><i class="icon-check"></i> Get the expert to be working on your task</li>
									<li><i class="icon-check"></i> Get it done in your budget</li>
									<li class="last"><i class="icon-check"></i> Get a badge to show it to other people</li>
								</ul>
							</div>
							<div class="ordernow"></div>
						</div>
						<div class="pricing-tables" style="width:65%;">
							<div class="title">Your TODOs? Get it done here!!</div>
							<div class="cont-list">
								<ul style="padding-left:20px;padding-right:20px;">
									<li class="last">
										<!-- Post a Task -->
										<form class="form postajob_form_page" id="postajob_form_page" name="postajob_form_page"  action="" method="POST" enctype="multipart/form-data">
											<div class="col-md-11">
												<p>Task Category </p>
												<select name="job_cat_id" id="job_cat_id" class="form-control">
													<option value="">Select</option>
													 <?=$option?>
												</select>
											</div>
											<div class="col-md-11">
												<input type="hidden" name="job_type" id="job_type" value="job">
												<p>Task Name </p>
												<input type="text" name="title" id="title" value="" class="form-control" placeholder="Task Name">
											</div>
											<div class="col-md-11">
												<p>Task Description </p>
												<textarea name="description" id="description" class="form-control" placeholder="Task Description"></textarea>
											</div>
											<div class="col-md-11">
												<p>Budget </p>
												<input type="text" name="budget" id="budget" class="form-control" placeholder="Task Budget">
											</div>
											<div class="col-md-11">
												<p>Required Days </p>
												<select name="required_days" id="required_days" class="form-control">
													<option value="">Select</option>
													<?php
														for($i = 1; $i <= 99; $i++){
													?>
													<option value="<?=$i?>"><?=$i?> Day(s)</option>
													<?php
														}
													?>
												</select>
											</div>
											<div class="col-md-11">
												<p>Area </p>
												<input type="text" name="area" id="area" value="" class="form-control" placeholder="Area Name">
											</div>
											<div class="col-md-11">
												<p>City </p>
												<input type="text" name="city" id="city" value="" class="form-control" placeholder="City">
											</div>
											<div class="col-md-11">
												<p>Pin Code </p>
												<input type="text" name="pincode" id="pincode" value="" class="form-control" placeholder="Pin Code">
											</div>
											<!--<div class="col-md-11">
												<p>Upload picture </p>
												<input type="file" name="job_picture11" id="job_picture11">
											</div>-->
											<div class="col-md-2" style="margin-right:-30px;"><br />
												<p><input type="checkbox" name="terms" id="terms" class="form-control" checked></p>
											</div>
											<div class="col-md-9"><br />
												<p>I accept the <a href="<?=base_url()?>pinch/terms" target="_blank"><strong>Terms of Use</strong></a> and <a href="<?=base_url()?>pinch/privacy-policy" target="_blank"><strong>Privacy Policy</strong></a>.</p>
											</div>
											<div class="col-md-11">	
												<div class="status_msg" style="border:1px soild;float:left;"></div>
												<input type="submit" name="post" id="post" value="Post Task">
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
	<script>$(document).ready(function(){ $("#postajob").addClass(" active");});</script>
	<script>
	$(document).ready(function(){
		$(".form.postajob_form_page").validate({
			rules: {
				job_cat_id: {required: true},
				title: {required: true, minlength: 5, maxlength: 100},
				city: {required: true, minlength: 3, maxlength: 100},
				area: {required: true, minlength: 3, maxlength: 100},
				pincode: {required: true, minlength: 5, maxlength: 100},
				description: {required: true, minlength: 10, maxlength: 250},
				budget: {required: true, number:true, minlength: 3, maxlength: 7},
				required_days: {required: true, number:true, minlength: 1, maxlength: 2}
			},
			highlight: function(element, errorClass) {$(element).css({ borderColor: '#FF0000' });},
			unhighlight: function(element, errorClass, validClass) {$(element).css({ borderColor: '#CCCCCC' });},
			errorPlacement: function(error, element) {$.validator.messages.required = '';},
			invalidHandler: function(form, validator) {},
			submitHandler: function (form) {
				$.ajax({
					type: "POST",
					url: "<?=base_url()?>task/post_task",
					data: {
						job_type : $('#job_type').val(),
						job_cat_id : $('#job_cat_id').val(),
						title : $('#title').val(),
						city : $('#city').val(),
						area : $('#area').val(),
						pincode : $('#pincode').val(),
						description : $('#description').val(),
						budget : $('#budget').val(),
						required_days : $('#required_days').val()
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