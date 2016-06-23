<?php
	require_once 'header.php';
?>
<!DOCTYPE html>
<html style="overflow: hidden;" class=" js no-touch cssanimations">
    <head>
        <!-- Define Charset -->
        <meta charset="utf-8">
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta name="keywords" content="post a job of Offer a Pinch, Members bid to your posted Task, Pay when job is completed, Feedback on task, Feedback on jobs">
		<meta name="description" content="Taskpinch.com - Your online market place! Go to the top menu and click on how it works, you will get to know the process to buy/hire, sell your services. Its simple, fast, convenient">
		<!-- Responsive Metatag -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9" />
        <!-- Page Title -->
        <title>How it Works | <?=SITETITLE?></title>
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
							<h2>How it works</h2>
						</div>
					</div>
				</div>				
				<div class="col-md-9">
					<div align="justify" class="style7" style="padding-right:20px;text-align:justify;">
						<p><span class="style1">Post a Task</span></p>
						<p>Just enter the job details in "Post a Task" form & relax... Members of the Taskpinch.com will bid for your Task and then you can choose the expert among the experts.</p><br />
						<p><span class="style1">Offer a Pinch</span></p>
						<p>Do you have any unique skill? showcase your skill or the work to the work. Taskpinch.com users will get in touch with you for the same. You can earn some extra money by doing your favourite work.</p><br />
						<p><span class="style1">Members bid to your posted Task</span></p>
						<p>Within no time, many friendly & reliable neighbourhood Members bid for the task. You may hire the best fit Bidder based on his/her profile and bid amount.</p><br />
						<p><span class="style1">Pay when job is completed</span></p>
						<p>The hired Member completes the task and receives the bid amount from you .</p><br />
						<p><span class="style1">Feedback on task </span></p>
						<p>Task poster provides feedback on complete task experience Subsequently,Taskpinch's profile is decorated with your feedback & rating.</p>
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
	<script>$(document).ready(function(){ $("#howitworks").addClass(" active");});</script>
	</body>
</html>