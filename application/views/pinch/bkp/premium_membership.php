<?php
	require_once 'header.php';
?>
<!DOCTYPE html>
<html style="overflow: hidden;" class=" js no-touch cssanimations">
    <head>
        <!-- Define Charset -->
        <meta charset="utf-8">
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta name="keywords" content="buy a premium membership, become a premium member, premium membership, premium member of taskpinch, premium member, taskpinch premium member, premium user, taskpinch premium member, taskpinch premium membership, premium membership of taskpinch, offer a online service, sell my services, my services, sell my work, hire a person, sell services, hire services, outsource jobs, post a job, post jobs, post online jobs, jobs in my city">
		<meta name="description" content="Taskpinch.com - Your online market place! Buy a premium membership and get all features of the Taskpinch. Sell or buy your favourite work and get paid for the same. Outsource your work and We help you to get the right, skilled, friendly and trustworthy person to work on your job. Taskpinch.com helps you to offer the service or your favourite job to the world and get paid for it.">
		<!-- Responsive Metatag -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9" />
        <!-- Page Title -->
        <title>Premium Membership | <?=SITETITLE?></title>
<?php
	require_once 'header_menu.php';
?>
	<article class="featured">
		<div class="container">
			<div class="row">
				<div class="title">
					<div class="centered">
						<div>
							<h2>Premium Membership</h2>
						</div>
					</div>
				</div>				
				<div class="col-md-9">
					<div class="col-xs-12">
						<div class="pricing-tables-helight" style="width:34%;margin-right:8px;">
							<div class="title">Member Benefits</div>
							<div class="cont-list">
								<ul style="text-align:left; padding-left:5px;font-size:12px;">
									<li><i class="icon-check"></i> You can Search Tasks/Pinches</li>
									<li><i class="icon-check"></i> You can View all the details of the Task</li>
									<li><i class="icon-check"></i> You can View all the details of the Pinch</li>
									<li><i class="icon-check"></i> You can Post unlimited Tasks</li>
									<li><i class="icon-check"></i> You can Post unlimited Pinches</li>
									<li><i class="icon-check"></i> You can Bid for unlimited Tasks</li>
									<li><i class="icon-check"></i> You can Bid for unlimited Pinches</li>
									<li><i class="icon-check"></i> You can Earn badges and showcase to public</li>
									<li><i class="icon-check"></i> You can Increase your searchability rank</li>
									<li class="last"><i class="icon-check"></i> You can Showcase your testimonials</li>
								</ul>
							</div>
							<div class="ordernow"></div>
						</div>
						<div class="pricing-tables" style="width:65%;">
							<div class="title">Buy Subscription</div>
							<div class="cont-list">
								<ul style="padding-left:50px;">
									<li class="last">
										<!-- Buy Subscription -->
										<form class="form buy_sub_form" id="buy_sub_form" action="" method="POST">
											<div class="col-md-5">
												<p>Subscription From </p>
												<input type="text" name="sub_from" id="sub_from" value="<?=date('d-M-Y');?>" class="form-control" readonly>
											</div>
											<div class="col-md-5">
												<p>Subscription Upto </p>
												<input type="text" name="sub_to" id="sub_to" value="<?=date('d-M-Y', strtotime('+6 months'));?>" class="form-control" readonly>
											</div>
											<div class="col-md-10">	
												<input type="submit" name="post" id="post" value="Buy Subscription">
											</div>
											<div class="col-md-12">	
												<div class="status_msg" style="border:1px soild;float:left;"></div>
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
	<script>$(document).ready(function(){ $("#premium-membership").addClass(" active");});</script>
	<script>
	$(document).ready(function(){
		$(".form.buy_sub_form").validate({
			rules: {
				sub_from: {required: true},
				sub_to: {required: true}
			},
			highlight: function(element, errorClass) {$(element).css({ borderColor: '#FF0000' });},
			unhighlight: function(element, errorClass, validClass) {$(element).css({ borderColor: '#CCCCCC' });},
			errorPlacement: function(error, element) {$.validator.messages.required = '';},
			invalidHandler: function(form, validator) {},
			submitHandler: function (form) {
				$.ajax({
					type: "POST",
					url: "<?=base_url()?>pinch/buy_subscription",
					data: {
						sub_from : $('#sub_from').val(),
						sub_to : $('#sub_to').val()
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