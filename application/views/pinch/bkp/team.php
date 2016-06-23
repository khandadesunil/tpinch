<?php
	require_once 'header.php';
?>
<!DOCTYPE html>
<html style="overflow: hidden;" class=" js no-touch cssanimations">
    <head>
        <!-- Define Charset -->
        <meta charset="utf-8">
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta name="keywords" content="taskpinch team">
		<meta name="description" content="Taskpinch.com - Your online market place! Taskpinch.com Team.">
		<!-- Responsive Metatag -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9" />
        <!-- Page Title -->
        <title>Our Team | <?=SITETITLE?></title>
<?php
	require_once 'header_menu.php';
?>
	<article class="featured">
		<div class="container">
			<div class="row">
				<div class="title">
					<div class="centered">
						<div>
							<h2>Team</h2>
						</div>
					</div>
				</div>				
				<div class="col-md-9">
					<div class="col-xs-12">
						<div class="grid">
							<ul>
								<li class="famale top">
									<a href="#">
										<div class="more">
											<i class="icon-search pull-right"></i>
											<span class="price">Profile</span>
											<span class="wks">Sulekha K</span>
											<span class="txt">Co-Founder</span>
										</div>
										<img alt="User Profile" src="<?=base_url().SITETHEME?>images/sulekha.jpg">
									</a>
								</li>
								<li class="famale top">
									<a href="#">
										<div class="more">
											<i class="icon-search pull-right"></i>
											<span class="price">Profile</span>
											<span class="wks">Sunil K.</span>
											<span class="txt">CEO & Co-Founder</span>
										</div>
										<img alt="User Profile" src="<?=base_url().SITETHEME?>images/sunil.jpg">
									</a>
								</li>
								<li class="famale feature">
									<a href="javascript:void(0);">
										<div class="more">
											<i class="icon-search pull-right"></i>
											<span class="price">Profile</span>
											<span class="wks">We are growing</span>
											<span class="txt">Welcome</span>
										</div>
									</a>
								</li>
							</ul>
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