<?php
	require_once 'header.php';
?>
<!DOCTYPE html>
<html style="overflow: hidden;" class=" js no-touch cssanimations">
    <head>
        <meta charset="utf-8">
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta name="keywords" content="Keywords, Keywords">
		<meta name="description" content="Description. Description">
		<!-- Responsive Metatag -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9" />
		<!-- Page Title -->
        <title>Pinch Details | <?=SITETITLE?></title>
<?php
	require_once 'header_menu.php';
	$req_date = date('d-M-y h:i', strtotime($job['created_date']. ' + '.$job['required_days'].' days'));
	$diff = strtotime($req_date) - strtotime(date('d-M-y h:i'));
	$diff = $diff / 86400;
?>
	<article class="featured">
		<div class="container">
			<div class="row">
				<div class="title">
					<div class="centered">
						<div>
							<h2>Pinch Details</h2>
						</div>
					</div>
				</div>				
				<div class="col-md-9">
					<div class="joblist">
						<div style="float:left;width:11%;text-align:center;">
							<div id="files" style="width:90px; height:90px;">
								<img src="<?=base_url().SITETHEME?>images/job.jpg" alt="Pinch Details" title="Pinch Details" class="img-rounded thumb">
							</div>
						</div>
						<div style="float:left;margin-left:10px;width:80%;">
							<h3><?=$job['title']?></h3>
							<p><strong>Description :</strong> <?=$job['description']?></p>
							<p><strong>Category :</strong> <?=$job['category_name']?> &nbsp; &nbsp; <strong>Area :</strong> <?=$job['area']?></p>
							<p><strong>Offered on :</strong> <?=$req_date?> &nbsp; &nbsp; <strong>Budget :</strong> <?=$job['budget']?></p>
							<p><strong>Posted by :</strong> <a href="<?=base_url()?>user/profile/<?=$job['user_id'].'/'.$job['first_name']?>"><?=$job['first_name']?></a> &nbsp; &nbsp; <strong>Budget :</strong> <?=$job['budget']?></p>
							<a href="<?=base_url()?>pinch/premium-membership" class="label label-default">Get in Touch</a>
						</div>	
					</div>
					<div class="joblist">
						<p><h4>Recent Buyers</h4></p>
						<?php
							$user_id = 0;
							foreach($all_bid as $bid){
								$user_id = $bid['user_id'];
								$job_bid_id = $bid['job_bid_id'];
								$name = $bid['first_name']. ' ' .$bid['last_name'];
								$skills = $bid['skills'];
								$photo = $bid['photo'];
								$status = $bid['status'];
								$created_date = date('d-M-y h:i A', strtotime($bid['created_date']));
								$bid_amount = $bid['bid_amount'];
								if($photo == '')
									$photo = base_url().'theme/site/idream/images/avatar_big.png';
								else
									$photo = base_url().'uploads/profile_images/'.$photo;
									
								$sess_user_id = $this->session->userdata('sess_user_id');	
								if($user_id != $sess_user_id && $sess_user_id != ''){	
									if($status == 'Contacted')
										$getintouch = '<a href="javascript:void(0);" id="'.$job_bid_id.'" class="label label-orange" style="padding:5px;font-size:11px;cursor:default;">Contacted ...</a>';
									else
										$getintouch = '<a href="javascript:void(0);" id="'.$job_bid_id.'" class="label label-default getintouch" style="padding:5px;font-size:11px;">Get in Touch</a>';
								}else{
									$getintouch = '';
								}
						?>
						<div class="bidlist">
							<div style="float:left;width:11%;text-align:center;">
								<img src="<?=$photo?>" alt="User Profile" title="User Profile" class="img-rounded thumb">
							</div>
							<div style="float:left;width:74%;border:0px solid;margin-left:10px">
								<h3>
									<a href="<?=base_url()?>user/profile/<?=$user_id?>/<?=$bid['first_name']?>"><?=$name?></a>
									<span class="setrating" style="float:right;font-size:10px;"></span>
								</h3>
								<p><strong>My Skills :</strong> <?=$skills?></p>
								<p><strong>Bid On :</strong> <?=$created_date?> &nbsp; &nbsp; <strong>Bid Amount :</strong> <?=$bid_amount?></p>
							</div>
							<div style="float:left;width:13%;border:0px solid;text-align:right;">
								<h3>&nbsp;</h3>
								<?=$getintouch?>
							</div>
						</div>
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
	<div style='display:none'>
		<!-- Bid Now -->
		<div id='bid_content' style='padding:10px; background:#fff;'>
			<h3>Bid Now!</h3><hr style="margin-top:0px;">
			<form class="form bid_now_form" id="bid_now_form" action="" method="POST">
				<p>Bid Amount </p><input type="text" name="bid_amount" id="bid_amount" value="" class="form-control" placeholder="Bid Amount">
				<div class="status_msg" style="border:1px soild;float:left;"></div>
				<input type="submit" name="bid_now_btn" id="bid_now_btn" value="Bid Now">
			</form>	
		</div>
	</div>
	<?php				
		$this->load->view('pinch/footer');
	?>
	<script>$(document).ready(function(){ $("#serviceshome").addClass(" active");});</script>
	<script>
	$(document).ready(function() {
		get_bidding();
		showRating();
		function get_bidding(){
			$("#recent_bidding").html('Loading bid details...');
			$.ajax({
				type: "POST",
				url: "<?=base_url()?>task/get_bidding",
				data: {
					job_id : <?=$job['job_id']?>
				},
				success: function(data) {
					$("#recent_bidding").html(data);
				}
			});
		}
		
		function showRating() {
			$('.setrating').html('<img src="<?=base_url().SITETHEME?>images/progress.gif" alt="Submitting Rating..." align="center">');
			var url = '<?=base_url()?>task/set_rating';
			$.post(url, { 
				'rating_to_user_id': <?=$user_id?>,
				'rating': 0,
				'action': 'view',
			}, function(response){
				if(response.responsetext != '')
					$('.setrating').html(response.responsetext);
				else
					$('.setrating').html('');
			});
		}

		$(".form.bid_now_form").validate({
			rules: {
				bid_amount: {required: true, number: true, minlength:2, maxlength:6}
			},
			highlight: function(element, errorClass) {$(element).css({ borderColor: '#FF0000' });},
			unhighlight: function(element, errorClass, validClass) {$(element).css({ borderColor: '#CCCCCC' });},
			errorPlacement: function(error, element) {$.validator.messages.required = '';},
			invalidHandler: function(form, validator) {},
			submitHandler: function (form) {
				$.ajax({
					type: "POST",
					url: "<?=base_url()?>task/bid",
					data: {
						bid_amount : $('#bid_amount').val(),
						job_id : <?=$job['job_id']?>
					},
					success: function(data) {
						var response = jQuery.parseJSON(data);
						if(response.status != 'error'){
							$('.status_msg').html("<div class='success'>"+ response.msg +"</div>");
							setInterval("location.reload()", 800);
						}else{
							$('.status_msg').html("<div class='failure'>"+ response.msg +"</div>");
						}
					}
				});
				return false;
			}
		});
		
		$(".getintouch").click(function(){
			$.ajax({
				type: "POST",
				url: "<?=base_url()?>task/get_in_touch",
				data: {
					job_bid_id : this.id
				},
				success: function(data) {
					setInterval("location.reload()", 1000);
				}
			});
		});
	});
	</script>
	</body>
</html>