<?php
	require_once 'header.php';
?>
<!DOCTYPE html>
<html style="overflow: hidden;" class=" js no-touch cssanimations">
    <head>
        <!-- Define Charset -->
        <meta charset="utf-8">
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta name="keywords" content="taskpinch safety policy">
		<meta name="description" content="Taskpinch.com - Your online market place! Taskpinch.com safety policy.">
		<!-- Responsive Metatag -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9" />
        <!-- Page Title -->
        <title>Safety Policy | <?=SITETITLE?></title>
<?php
	require_once 'header_menu.php';
?>
	<article class="featured">
		<div class="container">
			<div class="row">
				<div class="title">
					<div class="centered">
						<div></div>
					</div>
				</div>				
				<div class="col-md-9" style="padding-right:20px;text-align:justify;">
					<h1>Safety Tips</h1>
					<span class="style1">Profiles & Reviews </span><br />
					<p>Kindly go through the profile of the bidder or the person whom you want to interact with, read his/her reviews, testimonials, jobs completed, no. of times hired, rating etc to make sure you are dealing with right person  </p>
					<span class="style1">Safe Payments</span><br />
					<p>Opt for a safe payment methods only, We recommend you to pay after your job is completed or you recevied the server. Express your payment concerns before making any deal.</p>
					<span class="style1">Safe Meet</span><br />
					<p>Always meet at safe place to the other person whom you are dealing with. Follow your own security guides, as you may meet with unpleasant incidents.</p>
					<span class="style1">Contact Us</span><br />
					<p>Write a email to us at support@taskpinch.com if you are facing some issue while dealing with person or you are not satisfied with the service. You can also write your concerns using Feedback page.</p>
					<span class="style1">Personal Information</span><br />
					<p>Do not disclose your sensitive personal information to any other user via Taskpinch.com. It’s your responsibility to keep safe your information like passwords, address etc.</p>

					Have a safe earning!!

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