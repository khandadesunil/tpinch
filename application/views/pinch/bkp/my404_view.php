<?php
	require_once 'header.php';
?>
<!DOCTYPE html>
<html style="overflow: hidden;" class=" js no-touch cssanimations">
    <head>
        <!-- Define Charset -->
        <meta charset="utf-8">
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta name="keywords" content="taskpinch Default page">
		<meta name="description" content="Taskpinch.com - Your online market place!">
		<!-- Responsive Metatag -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9" />
        <!-- Page Title -->
        <title>Opps! Something went wrong! | <?=SITETITLE?></title>
<?php
	require_once 'header_menu.php';
?>
	<article class="featured">
		<div class="container">
			<div class="row">
				<div class="title"></div>
				<div class="col-md-9">
					<div class="col-xs-12" style="text-align:left;"><br /><br /><br />
						<h2>Opps! We could not find the page you are looking for.</h2>
						<p>The page you are looking for might have been removed, had its name changed, or is temporarily unavailable. Please try the following:</p>
						<p> &nbsp; 1. Make sure that the Web site address displayed in the address bar of your browser is spelled and formatted correctly</p>
						<p> &nbsp; 2. If you reached this page by clicking a link, <a href="<?=base_url()?>pinch/feedback">write us</a> to alert us that the link is incorrectly formatted</p>
						<p> &nbsp; 3. Forget that this ever happened, and go browse the files :)</p>
						</ul>
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