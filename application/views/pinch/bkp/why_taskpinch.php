<?php
	require_once 'header.php';
?>
<!DOCTYPE html>
<html style="overflow: hidden;" class=" js no-touch cssanimations">
    <head>
        <!-- Define Charset -->
        <meta charset="utf-8">
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta name="keywords" content="sell your services at your cost and at your conditions, hire the skilled preson to work on your job, task">
		<meta name="description" content="Taskpinch.com - Your online market place! Know why to join Taskpinch.com. Taskpinch.com helps you sell and buy the services, work, tasks.">
		<!-- Responsive Metatag -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9" />
        <!-- Page Title -->
        <title>Why Taskpinch.com | <?=SITETITLE?></title>
<?php
	require_once 'header_menu.php';
?>
	<article class="featured">
		<div class="container">
			<div class="row">
				<div class="title">
					<div class="centered">
						<div>
							<h2>Why Taskpinch</h2>
						</div>
					</div>
				</div>				
				<div class="col-md-9">
					<div align="justify" class="style7" style="padding-right:20px;text-align:justify;">
						<p><span class="style1">The unique feature of Taskpinch.com allows you to be independ for your TODOs and exibit your skills to the world. </span> Are you someone who likes to be independent? <em>who is bored with a 9-5 job? who likes to make new friends everyday? who is looking to make some extra money?
							Then why not be a member of Taskpinch? </em></p>
						<p>A Taskpinch.com gives you a platform to use your skills and helps people in the neighourhood with their various tasks. Also you can exhibit your skills to the work and get notified, and fun part of this is "You will get paid for it."</p>
						<p>The Taskpinch.com not only get to meet new people everyday, but also gets to bid on the kind of work that is interesting! All you have to do is logon to the website, search for tasks that you feel ou can do well and bid for them. </p>
						<p>If the task is assigned to you, go ahead and complete the task. You get paid the amount you bid by the Jobsposter directly. 
							It’s that simple! So why wait?? </p>
						<p class="style1">Benefits of being a Taskpinch: </p>
						<p>- Be your own Boss </p>
						<p>- Hire the expert to work on your task </p>
						<p>- Get it done in your budget and time </p>
						<p>- Choose what work you want to do </p>
						<p>- Showcase of your work/skills </p>
						<p>- Get notified to the world </p>
						<p>- Work according to your own timings </p>
						<p>- Meet new people everyday </p>
						<p>- Make some more money <br /></p>
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
	</body>
</html>