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
        <title>My Recent Activities | <?=SITETITLE?></title>
<?php
	require_once 'header_menu.php';
?>
	<article class="featured">
		<div class="container">
			<div class="row">
				<div class="title">
					<div class="centered">
						<div>
							<h2>My Recent Activities</h2>
						</div>
					</div>
				</div>
				<div class="col-md-9">
					<div class="col-md-12" style="background-color:#FBFBFB;padding:5px;margin-right:15px;">
						<h4>Tasks posted by Me</h4>
						<?php
							foreach($my_jobs as $jobs){
						?>
						<p> <a href="<?=base_url()?>task/task-details/<?=$jobs['job_id']?>/<?=$jobs['title']?>"><?=$jobs['title']?></a></p>
						<?php
						}
						?>
						<p><strong>More >></strong></p>
					</div>
					<p></p>
					<div class="col-md-12" style="background-color:#FBFBFB;padding:5px;margin-right:15px;">
						<h4>I bid for..</h4>
						<?php
							foreach($my_bids as $bids){
						?>
						<p> <a href="<?=base_url()?>task/task-details/<?=$bids['job_id']?>/<?=$bids['title']?>"><?=$bids['title']?></a></p>
						<?php
						}
						?>
						<p><strong>More >></strong></p>
						</ul>
					</div>
					<p></p>
					<div class="col-md-12" style="background-color:#FBFBFB;padding:5px;margin-right:15px;">
						<h4>Pinches offered by Me</h4>
						<?php
							foreach($my_pinches as $pinches){
						?>
						<p> <a href="<?=base_url()?>task/task-details/<?=$pinches['job_id']?>/<?=$pinches['title']?>"><?=$pinches['title']?></a></p>
						<?php
						}
						?>
						<p><strong>More >></strong></p>
					</div>
					<p></p>
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
		$(".form.postajob_form").validate({
			rules: {
				job_cat_id: {required: true},
				title: {required: true, minlength: 5, maxlength: 100},
				city: {required: true, minlength: 5, maxlength: 100},
				area: {required: true, minlength: 5, maxlength: 100},
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