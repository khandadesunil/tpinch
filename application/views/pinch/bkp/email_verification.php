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
        <title>Email Verification | <?=SITETITLE?></title>
<?php
	require_once 'header_menu.php';
?>
	<article class="featured">
		<div class="container">
			<div class="row">
				<div class="title">
					<div class="centered">
						<div>
							<h2>Account Activation</h2>
						</div>
					</div>
				</div>				
				<div class="col-md-9">
					<div class="col-md-4"></div>
					<div class="col-md-7">
						<?php
							if($status == 'success'){
						?>
						<h3 style="color:#478F47">Congratulations!! Your email verification is done successfully.<br /><br />Please click here to <a href="<?=base_url()?>login" class="label label-default">Login</a></h3>
						<?php
							}else{
						?>
							<h3 style="color:#CD4E0E">This link is not valid anymore!!</h3>
						<?php
							}
						?>
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
	<script>
	$(document).ready(function(){
		setInterval("window.location.href = '<?=base_url()?>pinch/premium-membership';", 2000);
	});	
	</script>
	</body>
</html>	