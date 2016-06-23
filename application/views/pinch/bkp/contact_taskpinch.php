<?php
	require_once 'header.php';
?>
<!DOCTYPE html>
<html style="overflow: hidden;" class=" js no-touch cssanimations">
    <head>
        <!-- Define Charset -->
        <meta charset="utf-8">
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta name="keywords" content="taskpinch contacts">
		<meta name="description" content="Taskpinch.com - Your online market place! Contact Taskpinch.">
		<!-- Responsive Metatag -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9" />
        <!-- Page Title -->
        <title>Contact Taskpinch.com | <?=SITETITLE?></title>
<?php
	require_once 'header_menu.php';
?>
	<article class="featured">
		<div class="container">
			<div class="row">
				<div class="title">
					<div class="centered">
						<div>
							<h2>Contact Us</h2>
						</div>
					</div>
				</div>				
				<div class="col-md-9">
					<div class="col-xs-12">
						<div class="pricing-tables" style="width:34%;margin-right:8px;">
							<?php
								require_once 'didyouknow.php';
							?>
						</div>
						<div class="pricing-tables" style="width:65%; text-align:center;">
							<h2>Taskpinch Head Quarter</h2>
							<p><strong>
								11/1, Azaad Nagar, Mysore Road, <br /><br />
								Mysore Road, Bangalore - 560026 <br /><br />
								<i class="icon-mobile"></i>Contact : +91 90668 81139 <br /><br />
								<i class="icon-mail"></i>Email : <a href="mailto:support@taskpinch.com">support@taskpinch.com</a> <br /><br />
								<i class="icon-newspaper"></i>Web : <a href="http://www.taskpinch.com" target="_blank">http://www.taskpinch.com</a>
								</strong>
							</p>
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
	<script>$(document).ready(function(){ $("#connect").addClass(" active");});</script>
	</body>
</html>