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
        <title>Profile | <?=SITETITLE?></title>
		
		<script type="text/javascript" src="<?=base_url().SITETHEME?>js/ajaxupload.3.5.js" ></script>
		<link rel="stylesheet" type="text/css" href="<?=base_url().SITETHEME?>css/upload_styles.css" />
<?php
	require_once 'header_menu.php';
	//require_once 'slider.php';
?>
	<article class="featured">
		<div class="container">
			<div class="row">
				<div class="title">
					<div class="centered">
						<div>
							<h2>Profile</h2>
						</div>
					</div>
				</div>				
				<div class="col-md-9">
					<div class="joblist">
						<div style="float:left;width:15%;text-align:center;">
							<div id="files" style="width:70px; height:70px;">
							<?php
								if($photo == '')
									$photo = base_url().SITETHEME.'images/avatar_big.png';
								else
									$photo = base_url().'uploads/profile_images/'.$photo;
							?>
								<img src="<?=$photo?>" id="avatar_img" alt="Profile Picture" title="Profile Picture" class="img-rounded thumb" />
							</div>
							<div class="foot" style="width:98px;" style="text-align:left">
								<div id="">
									<div id ="upload" style="margin-top:10px;">
										<?php
											if($sess_user_id != '' && $sess_user_id == $this->uri->segment(3)){
										?>
										<div id="para" style=" margin-left:0px; width:75px; height:20px; cursor:pointer;">Change Picture</div>
										<?php
											}
										?>
									</div>
								</div>
								<span id="status"></span><br />
								<?php
									if($sess_user_id != '' && $sess_user_id == $this->uri->segment(3)){
								?>
								<a href="#update_profile_content" id="update_profile">View/Update Profile</a><br /><br />
								<a href="#change_password_content" id="change_password">Change Password</a><br /><br />
								<a href="#suspend_account_content" id="change_password">Suspend Account</a>
								<?php
									}
								?>
							</div>
						</div>
						<div style="float:left;margin-left:10px;width:80%;">
							<h3><?=$first_name.' '.$last_name?></h3><br />
							<p><strong>About Me :</strong> 
							<?php
								$abt_len = Strlen($about_me);
								if($abt_len > 200){
									$about_me_trim = substr($about_me, 0, 200).'...';
								}else{
									$about_me_trim = $about_me;
								}
								echo $about_me_trim;
							?>
							<?php
								if($sess_user_id != '' && $sess_user_id == $this->uri->segment(3)){
							?><a href="#about_me_content" id="about_me_popup"> <i class="icon-pencil" style="font-size:15px;"></i></a>
							<?php
							}
							?>
							</p>
							<p><strong>My Skills :</strong>
							<?php
								$skill_len = Strlen($skills);
								if($skill_len > 200){
									$skills = substr($skills, 0, 200).'...';
								}
								echo $skills;
							?>
							<?php
								if($sess_user_id != '' && $sess_user_id == $this->uri->segment(3)){
							?>
							<a href="#skills_content" id="skills_popup"><i class="icon-pencil" style="font-size:15px;"></i></a>
							<?php
							}
							?>
							</p><br />
							<h3>Awards & Rewards</h3>
							<?php
								if($status == 'Pinch' || $status == 'Pinch1' || $status == 'Pinch2'){
							?>
							<a href="javascript:void(0);" class="new_tooltip">
								<div class="col-md-3 awards" style="text-align:center"><img src="<?=base_url().SITETHEME?>images/verified.jpg" alt="Verified User" title="Verified User"></div>
								<span>1.Verified.</span>
							</a>
							<?php
								} if($status == 'Pinch1' || $status == 'Pinch2'){
							?>
							<a href="javascript:void(0);" class="new_tooltip">
								<div class="col-md-3 awards" style="text-align:center"><img src="<?=base_url().SITETHEME?>images/premium.jpg" alt="Premium User" title="Premium User"></div>
								<span>2.Premium.</span>
							</a>
							<?php
								} if($status == 'Pinch2'){
							?>
							<a href="javascript:void(0);" class="new_tooltip">
								<div class="col-md-3 awards" style="text-align:center"><img src="<?=base_url().SITETHEME?>images/golden.jpg" alt="Active User" title="Active User"></div>
								<span>3.Tasks Done.</span>
							</a>
							<?php
								}
							?>
							<?php
								if($status == 'Active'){
							?>
							<a href="javascript:void(0);" class="new_tooltip">
								<div class="col-md-3 awards" style="text-align:center"><img src="<?=base_url().SITETHEME?>images/question.jpg" alt="Get Verified" title="Get Verified"></div>
								<span>1.Get your Mobile number verified, This helps you to increase your rank in Taskpinch.com search.</span>
							</a>
							<a href="javascript:void(0);" class="new_tooltip">
								<div class="col-md-3 awards" style="text-align:center"><img src="<?=base_url().SITETHEME?>images/question.jpg" alt="Get Verified" title="Get Verified"></div>
								<span>2.Buy a premium membership to get more benifites from Taskpinch.</span>
							</a>
							<a href="javascript:void(0);" class="new_tooltip">
								<div class="col-md-3 awards" style="text-align:center"><img src="<?=base_url().SITETHEME?>images/question.jpg" alt="Get Verified" title="Get Verified"></div>
								<span>3.Complete more jobs and become a Silver/Golden/Platinum Member.</span>
							</a>
							<?php
								}
							?>
							<div class="foot" style="width:100%;float:right;">
								<span style="float:right;margin-left:0px;">
									<div id="setrating" style="float:left;">
										<div onmouseout="setRating(0)">
											Rating :
											<img src="<?=base_url().SITETHEME?>images/rate0.png" id="R1" alt="0" class="rating_img" title="Very Poor"/>
											<img src="<?=base_url().SITETHEME?>images/rate0.png" id="R2" alt="1" class="rating_img" title="Poor"/>
											<img src="<?=base_url().SITETHEME?>images/rate0.png" id="R3" alt="2" class="rating_img" title="Good"/>
											<img src="<?=base_url().SITETHEME?>images/rate0.png" id="R4" alt="3" class="rating_img" title="Best"/>
											<img src="<?=base_url().SITETHEME?>images/rate0.png" id="R5" alt="4" class="rating_img" title="Excellent"/>
										</div>
									</div> &nbsp;
									| &nbsp;<a href="javascript:void(0)" class="like_profile" id="likes">Like Profile</a> 
									<?php
										if($sess_user_id != '' && $sess_user_id != $this->uri->segment(3)){
									?>
									| &nbsp;<a href="#testimonials_content" id="testimonials_link">Write Testimonials</a>
									<?php
									}
									?>
								</span>
							</div>
						</div>	
					</div>
					<div class="joblist">
						<p><h4>My Testimonials</h4></p>
						<div id="main_testi">
							<div class="testimonials_list">
								<div style="float:left;width:11%;text-align:center;">
									<img src="" alt="User Profile Picture" title="User Profile Picture" class="img-rounded thumb">
								</div>
								<div style="float:left;width:74%;border:0px solid;margin-left:10px">
									<h3>
										<span class="setrating" style="float:right;font-size:10px;"></span>
									</h3>
									<p><strong>Testimonials :</strong> <?=$skills?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php
					$this->load->view('pinch/ads_page');
				?>
			</div>
		</div>
	</article>
	
	<div style='display:none'>
		<!-- Update Profile -->
		<div id='update_profile_content' style='padding:10px; background:#fff;'>
			<h3><img src="<?=base_url().SITETHEME?>/images/taskpinch-short-logo.png" alt="Taskpinch.com short logo">&nbsp;Update Profile</h3><hr style="margin-top:0px;">
			<div class="col-md-14 col-md-12a">
				<form class="form update_form" id="update_form" action="" method="POST">
					<div class="col-md-6 col-md-12a">
						<p>First Name </p><input type="text" name="first_name" id="first_name" value="<?=$first_name?>" class="form-control" placeholder="First Name">
					</div>
					<div class="col-md-6 col-md-12a">
						<p>Last Name </p><input type="text" name="last_name" id="last_name" value="<?=$last_name?>" class="form-control" placeholder="Last Name">
					</div>
					<div class="col-md-6 col-md-12a">
						<p>Gender </p>
						<select name="gender" id="gender" class="form-control">
							<?php
								$sel1 = '';
								$sel2 = '';
								if($gender == 'male')
									$sel1 = 'selected';
								else
									$sel2 = 'selected';
							?>
							<option value="male" <?=$sel1?>>Male</option>
							<option value="female" <?=$sel2?>>Female</option>
						</select>
					</div>
					<div class="col-md-6 col-md-12a">
						<p>Mobile </p><input type="text" name="contact" id="contact" value="<?=$contact?>" class="form-control" placeholder="Mobile Number">
					</div>
					<div class="col-md-6 col-md-12a">
						<p>Email </p><input type="text" name="email" id="email" value="<?=$email?>" class="form-control" readonly>
					</div>
					<div class="col-md-6 col-md-12a">
						<p>Alternate Email </p><input type="text" name="alt_email" id="alt_email" value="<?=$alt_email?>" class="form-control" placeholder="Alternate Email">
					</div>
					<div class="col-md-6 col-md-12a">
						<p>Occupation </p><input type="text" name="occupation" id="occupation" value="<?=$occupation?>" class="form-control" placeholder="Occupation">
					</div>
					<div class="col-md-6 col-md-12a">
						<p>Address </p><input type="text" name="address" id="address" value="<?=$address?>" class="form-control" placeholder="Address">
					</div>
					<div class="col-md-6 col-md-12a">
						<p>City </p><input type="text" name="city" id="city" value="<?=$city?>" class="form-control" placeholder="City">
					</div>
					<div class="col-md-6 col-md-12a">
						<p>Pincode </p><input type="text" name="pin_code" id="pin_code" value="<?=$pin_code?>" class="form-control" placeholder="Area Pincode">
					</div>
					<div class="status_msg" style="border:1px soild;float:left;"></div>
					<input type="submit" name="update" id="update" value="Update">
				</form>
			</div>
		</div>
		
		<div id='testimonials_content' style='padding:10px; background:#fff;'>
			<h3><img src="<?=base_url().SITETHEME?>/images/taskpinch-short-logo.png" alt="Taskpinch.com short logo">&nbsp;Write Testimonials</h3><hr style="margin-top:0px;">
			<form class="form testi_form" id="testi_form" action="" method="POST">
				<p>Testimonials </p><textarea name="testimonials" id="testimonials" class="form-control" placeholder="Testimonials"></textarea>
				<div class="status_msg" style="border:1px soild;float:left;"></div>
				<input type="submit" name="submit_testimonials" id="submit_testimonials" value="Submit">
			</form>	
		</div>		
		<div id='about_me_content' style='padding:10px; background:#fff;'>
			<h3><img src="<?=base_url().SITETHEME?>/images/taskpinch-short-logo.png" alt="Taskpinch.com short logo">&nbsp;About Me</h3><hr style="margin-top:0px;">
			<form class="form about_me_form" id="about_me_form" action="" method="POST">
				<p>About Me </p><textarea name="about_me" id="about_me" class="form-control" placeholder="About Me"><?=$about_me?></textarea>
				<div class="status_msg" style="border:1px soild;float:left;"></div>
				<input type="submit" name="submit_about_me" id="submit_about_me" value="Submit">
			</form>	
		</div>		
		<div id='skills_content' style='padding:10px; background:#fff;'>
			<h3><img src="<?=base_url().SITETHEME?>/images/taskpinch-short-logo.png" alt="Taskpinch.com short logo">&nbsp;My Skills</h3><hr style="margin-top:0px;">
			<form class="form skills_form" id="skills_form" action="" method="POST">
				<p>My Skills </p><textarea name="skills" id="skills" class="form-control" placeholder="My Skills"><?=$skills?></textarea>
				<div class="status_msg" style="border:1px soild;float:left;"></div>
				<input type="submit" name="submit_skills" id="submit_skills" value="Submit">
			</form>	
		</div>
		<div id='change_password_content' style='padding:10px; background:#fff;'>
			<h3><img src="<?=base_url().SITETHEME?>/images/taskpinch-short-logo.png" alt="Taskpinch.com short logo">&nbsp;Change Password</h3><hr style="margin-top:0px;">
			<form class="form password_form" id="password_form" action="" method="POST">
				<p>Old Password </p><input type="password" name="old_pass" id="old_pass" value="" class="form-control" placeholder="Old Password" autocomplete="off">
				<p>New Password </p><input type="password" name="new_pass" id="new_pass" value="" class="form-control" placeholder="New Password">
				<p>Confirm New Password </p><input type="password" name="conf_new_pass" id="conf_new_pass" value="" class="form-control" placeholder="Confirm New Password">
				<div class="status_msg" style="border:1px soild;float:left;"></div>
				<input type="submit" name="submit_skills" id="submit_skills" value="Submit">
			</form>	
		</div>
		<div id='suspend_account_content' style='padding:10px; background:#fff;'>
			<h3><img src="<?=base_url().SITETHEME?>/images/taskpinch-short-logo.png" alt="Taskpinch.com short logo">&nbsp;Are you sure want to suspend your account?</h3><hr style="margin-top:0px;">
			<form class="form suspend_account_form" id="suspend_account_form" action="" method="POST">
				<p>REMEMBER!! Once you suspend your account, You will not be able to use your account in future.</p>
				<div class="status_msg" style="border:1px soild;float:left;"></div>
				<input type="button" name="suspend_account" id="suspend_account" value="Suspend my Account">
			</form>	
		</div>
	</div>
	<?php				
		$this->load->view('pinch/footer');
	?>
	<script>$(document).ready(function(){ $("#user").addClass(" active");});</script>
	<script>
	$(document).ready(function() {
		var rating_to_user_id = '<?=$this->uri->segment(3)?>';
		var user_id = '<?=$sess_user_id?>';
		if(rating_to_user_id == user_id || user_id == '')
			showRating(rating_to_user_id);
			
		$('#setrating img').each(function(i) {
			var rating = i + 1;
			$(this).mouseover(function() { setRating(rating) });
			$(this).click(function() { submitRating(rating_to_user_id, rating) });
		})
		
		$.ajax({
			type: "POST",
			url: "<?=base_url()?>user/get_total_like_profile",
			data: {
				liked_to_user_id : rating_to_user_id
			},
			success: function(data) {
				var response = jQuery.parseJSON(data);
				if(response.status != 'error'){
					$("#likes").html('Like Profile ( '+response.msg+' )');
				}
			}
		});
			
		$(".like_profile").click(function() {
			$.ajax({
				type: "POST",
				url: "<?=base_url()?>user/set_like_profile",
				data: {
					liked_to_user_id : rating_to_user_id
				},
				success: function(data) {
					var response = jQuery.parseJSON(data);
					if(response.status != 'error'){
						$("#likes").html(response.msg);
						$("#likes").removeClass(" like_profile");
					}
				}
			});
		});
		
		$(".form.update_form").validate({
			rules: {
				first_name: {required: true,minlength: 3},
				last_name: {required: true,minlength: 3},
				gender: {required: true},
				contact: {required: true,number: true, minlength: 10, maxlength: 10},
				alt_email: {email: true},
				occupation: {minlength: 3},
				address: {minlength: 5},
				city: {minlength: 5},
				pin_code: {minlength: 4}
			},
			highlight: function(element, errorClass) {$(element).css({ borderColor: '#FF0000' });},
			unhighlight: function(element, errorClass, validClass) {$(element).css({ borderColor: '#CCCCCC' });},
			errorPlacement: function(error, element) {$.validator.messages.required = '';},
			invalidHandler: function(form, validator) {},
			submitHandler: function (form) {
				$.ajax({
					type: "POST",
					url: "<?=base_url()?>user/update_profile",
					data: {
						first_name : $('#first_name').val(),
						last_name : $('#last_name').val(),
						gender : $('#gender').val(),
						contact : $('#contact').val(),
						alt_email : $('#alt_email').val(),
						occupation : $('#occupation').val(),
						address : $('#address').val(),
						city : $('#city').val(),
						pin_code : $('#pin_code').val()
					},
					success: function(data) {
						var response = jQuery.parseJSON(data);
						if(response.status != 'error'){
							$('.status_msg').html("<div class='success'>"+ response.msg +"</div>");
							setInterval("location.reload()", 2000);
						}else{
							$('.status_msg').html("<div class='failure'>"+ response.msg +"</div>");
						}
					}
				});
				return false;
			}
		});
					
		$(".form.testi_form").validate({
			rules: {
				testimonials: {required: true,minlength: 5}
			},
			highlight: function(element, errorClass) {$(element).css({ borderColor: '#FF0000' });},
			unhighlight: function(element, errorClass, validClass) {$(element).css({ borderColor: '#CCCCCC' });},
			errorPlacement: function(error, element) {$.validator.messages.required = '';},
			invalidHandler: function(form, validator) {},
			submitHandler: function (form) {
				$.ajax({
					type: "POST",
					url: "<?=base_url()?>user/submit_testimonials",
					data: {
						'testimonials_to_user_id' : rating_to_user_id,
						testimonials : $('#testimonials').val()
					},
					success: function(data) {
						var response = jQuery.parseJSON(data);
						if(response.status != 'error'){
							$('.status_msg').html("<div class='success'>"+ response.msg +"</div>");
							setInterval("location.reload()", 1000);
						}else{
							$('.status_msg').html("<div class='failure'>"+ response.msg +"</div>");
						}
					}
				});
				return false;
			}
		});
		
		$.ajax({
			type: "POST",
			url: "<?=base_url()?>user/get_testimonials",
			data: {
				testimonials_to_user_id : rating_to_user_id
			},
			success: function(data) {
				var response = jQuery.parseJSON(data);
				if(response.status != 'error'){
					$("#main_testi").html(response.testi);
				}
			}
		});
		
		$(".form.about_me_form").validate({
			rules: {
				about_me: {required: true,minlength: 5}
			},
			highlight: function(element, errorClass) {$(element).css({ borderColor: '#FF0000' });},
			unhighlight: function(element, errorClass, validClass) {$(element).css({ borderColor: '#CCCCCC' });},
			errorPlacement: function(error, element) {$.validator.messages.required = '';},
			invalidHandler: function(form, validator) {},
			submitHandler: function (form) {
				$.ajax({
					type: "POST",
					url: "<?=base_url()?>user/update_about_me",
					data: {
						about_me : $('#about_me').val()
					},
					success: function(data) {
						var response = jQuery.parseJSON(data);
						if(response.status != 'error'){
							$('.status_msg').html("<div class='success'>"+ response.msg +"</div>");
							setInterval("location.reload()", 1000);
						}else{
							$('.status_msg').html("<div class='failure'>"+ response.msg +"</div>");
						}
					}
				});
				return false;
			}
		});
		
		$(".form.skills_form").validate({
			rules: {
				skills: {required: true,minlength: 5}
			},
			highlight: function(element, errorClass) {$(element).css({ borderColor: '#FF0000' });},
			unhighlight: function(element, errorClass, validClass) {$(element).css({ borderColor: '#CCCCCC' });},
			errorPlacement: function(error, element) {$.validator.messages.required = '';},
			invalidHandler: function(form, validator) {},
			submitHandler: function (form) {
				$.ajax({
					type: "POST",
					url: "<?=base_url()?>user/update_skills",
					data: {
						skills : $('#skills').val()
					},
					success: function(data) {
						var response = jQuery.parseJSON(data);
						if(response.status != 'error'){
							$('.status_msg').html("<div class='success'>"+ response.msg +"</div>");
							setInterval("location.reload()", 1000);
						}else{
							$('.status_msg').html("<div class='failure'>"+ response.msg +"</div>");
						}
					}
				});
				return false;
			}
		});
		
		$(".form.password_form").validate({
			rules: {
				old_pass: {required: true,minlength: 5},
				new_pass: {required: true,minlength: 5},
				conf_new_pass: {required: true,equalTo: "#new_pass",minlength: 5}
			},
			highlight: function(element, errorClass) {$(element).css({ borderColor: '#FF0000' });},
			unhighlight: function(element, errorClass, validClass) {$(element).css({ borderColor: '#CCCCCC' });},
			errorPlacement: function(error, element) {$.validator.messages.required = '';},
			invalidHandler: function(form, validator) {},
			submitHandler: function (form) {
				$.ajax({
					type: "POST",
					url: "<?=base_url()?>user/change_password",
					data: {
						old_pass : $('#old_pass').val(),
						new_pass : $('#new_pass').val(),
						conf_new_pass : $('#conf_new_pass').val()
					},
					success: function(data) {
						var response = jQuery.parseJSON(data);
						if(response.status != 'error'){
							$('.status_msg').html("<div class='success'>"+ response.msg +"</div>");
							setInterval("window.location.href = '<?=base_url()?>pinch/logout';", 2000);
						}else{
							$('.status_msg').html("<div class='failure'>"+ response.msg +"</div>");
						}
					}
				});
				return false;
			}
		});
		
		$("#suspend_account").click(function(){
			var r=confirm("Are you sure you want to suspend your account?");
			if (r==true){
				$.ajax({
					type: "POST",
					url: "<?=base_url()?>user/suspend_account",
					data: {
						email : '<?=$email?>'
					},
					success: function(data) {
						var response = jQuery.parseJSON(data);
						if(response.status != 'error'){
							$('.status_msg').html("<div class='success'>"+ response.msg +"</div>");
							setInterval("window.location.href = '<?=base_url()?>pinch/logout';", 2000);
						}else{
							$('.status_msg').html("<div class='failure'>"+ response.msg +"</div>");
						}
					}
				});
			}
		});
	});
	  
	function setRating(point)
	{
	  stars = new Array("R1","R2","R3","R4","R5");
	  start = parseInt(point);
	  for(i=0;i<5;i++)
	  {
		  if(i >= start)document.getElementById(stars[i]).src="<?=base_url().SITETHEME?>images/rate0.png";
		  if(i < parseInt(point))document.getElementById(stars[i]).src="<?=base_url().SITETHEME?>images/rate1.png";
	  }
	}

	function submitRating(rating_to_user_id, rating) {
		if (rating > 0) {
			$('#setrating').html('<img src="<?=base_url().SITETHEME?>images/progress.gif" alt="Submitting Rating..." align="center">');
			var url = '<?=base_url()?>user/set_rating';
			$.post(url, { 
				'rating_to_user_id': rating_to_user_id,
				'rating': rating,
				'action': 'submit',
			}, function(response) {
				document.getElementById('setrating').innerHTML=response.responsetext;
			});
		}
		else
			alert("Please select your rating and submit!");
	}

	function showRating(rating_to_user_id) {
		$('#setrating').html('<img src="<?=base_url().SITETHEME?>images/progress.gif" alt="Submitting Rating..." align="center">');
		var url = '<?=base_url()?>user/set_rating';
		$.post(url, { 
			'rating_to_user_id': rating_to_user_id,
			'rating': 0,
			'action': 'view',
		}, function(response) {
			document.getElementById('setrating').innerHTML=response.responsetext;
		});
	}
	</script>
	<script>
	$(document).ready(function(){
		var btnUpload=$('#upload');
		var status=$('#status');
		new AjaxUpload(btnUpload, {
			action: '<?=base_url()?>' + 'upload_photo',
			name: 'uploadfile',
			onSubmit: function(file, ext){
				 if (!(ext && /^(jpg|png|jpeg|gif|bmp)$/.test(ext))){ 
					status.text('Only JPG, PNG or GIF files are allowed');
					return false;
				}
				status.text('Uploading...');
			},
			onComplete: function(old_file, data){
				var response = jQuery.parseJSON(data);
				status.text('');
				var file_name = '<?=base_url()?>'+ 'uploads/profile_images/'+response.file;
				if(response.status == "success"){
					$('#avatar_img').hide();
					$('#files').html('<img src="'+file_name+'" alt="Profile Picture" class="img-rounded thumb" />').addClass('success');
					$.post('<?=base_url()?>user/save_uploaded_photo', {photo:file_name}); 
					setInterval("location.reload()", 1000);
				}else {$('#files').text(file).addClass('error');}
			}
		});
	});
	</script>
	</body>
</html>