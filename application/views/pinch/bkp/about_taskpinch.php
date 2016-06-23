<?php
	require_once 'header.php';
?>
<!DOCTYPE html>
<html style="overflow: hidden;" class=" js no-touch cssanimations">
    <head>
        <!-- Define Charset -->
        <meta charset="utf-8">
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta name="keywords" content="know more about taskpinch, know taskpinch, taskpinch facts">
		<meta name="description" content="Taskpinch.com - Your online market place! Know about taskpinch.">
		<!-- Responsive Metatag -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9" />
        <!-- Page Title -->
        <title>About Taskpinch.com | <?=SITETITLE?></title>
<?php
	require_once 'header_menu.php';
?>
	<article class="featured">
		<div class="container">
			<div class="row">
				<div class="title">
					<div class="centered">
						<div>
							<h2>About Us</h2>
						</div>
					</div>
				</div>				
				<div class="col-md-9">
					<div align="justify" class="style7" style="padding-right:20px;text-align:justify;">
						<p>Bring back <span class="style1">“Quality Time”</span> in your Life!
							That’s our mission at Taskpinch, a group of like-minded enthusiasts looking to help bring that extra bit of time in your life. <br /><br />
							India has traditionally been a friendly society with people willing to help neighbours with small chores. It is a common sight to see a single parent taking kids from the entire colony to school in his/her car. In villages, working collaboratively has been more of a norm for centuries.
							However, with the progress the country is seeing today, every family member in urban India typically works in some role or other to contribute economically. This has weakened the once strong community bonds. People who would have earlier relied on elders, neighbours for many trivial chores are now forced to find time and complete them by themselves.
							This has created an opportunity for a professional, friendly neighbourhood helper who can complete the tasks for a small sum and in turn help others gain the most important thing in today’s society: Time 
						</p>
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
	<script>$(document).ready(function(){ $("#connect").addClass(" active");});</script>
	</body>
</html>