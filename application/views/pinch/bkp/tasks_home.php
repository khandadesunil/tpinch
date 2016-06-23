<?php
	require_once 'header.php';
?>
<!DOCTYPE html>
<html style="overflow: hidden;" class=" js no-touch cssanimations">
    <head>
        <!-- Define Charset -->
        <meta charset="utf-8">
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta name="keywords" content="hire a person, sell services, hire services, outsource jobs, post a job, post jobs, post online jobs, jobs in my city, outsource jobs, outsource tasks, part time jobs, hundreds of part time jobs, internet jobs, freelance jobs, online jobs, delivery help, personal assistants, jobs for students, jobs for professionals, personal helper, personal assistant, professional part time jobs, latest jobs">
		<meta name="description" content="Taskpinch.com - Your online market place! Outsource your work and We help you to get the right, skilled, friendly and trustworthy person to work on your job. Taskpinch.com helps you to offer the service or your favourite job to the world and get paid for it.">
		<!-- Responsive Metatag -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9" />
        <!-- Page Title -->
        <title>Post your Task here and get it done by Experts! | <?=SITETITLE?></title>
<?php
	require_once 'header_menu.php';
	//require_once 'slider.php';
?>
	<?php
		if($sess_user_email == ''){
	?>
	<!--<div class="notification-box notification-box-warning">
		<a href="#" class="notification-close notification-close-warning">x</a>
		<p style="color:#000;">
			<strong>Latest Offer! Hurry Up!&nbsp; </strong><br /><br />
			<a href="<?=base_url()?>user/register"><span class="label label-default">Register</span></a> today and Get free subscription <br /><br />
			for <strong>6 Months</strong>
		</p>
    </div>-->
	<?php
		}
	?>
	<article class="reputation">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div id="carousel-reputation1" class="carousel1 slide1" data-ride="carousel1">
						<div class="carousel-inner" style="color:#FFF;width:100%;font-size:100%;height:200px;text-align:center;background:transparent url(<?=base_url().SITETHEME?>images/taskpinch-slider-service.jpg) center center no-repeat;">
							<div class="item active" style="margin-top:70px;">
								<form name="search_form" action="<?=base_url()?>pinch/search/" method="GET" role="search">
									<div style="height:55px;width:97%;float:left;margin-left:18px;padding-top:10px;background-color:#888;">
										<!--<select name="" class="search_text" style="width:12%;margin-right:10px;">
											<option value="">All</option>
											<option value="jobs">Tasks</option>
											<option value="services">Services</option>
										</select>-->
										<input type="text" class="search_text" name="search" id="searchid" placeholder="Search tasks, experts etc.." style="width:78%">
										<input type="submit" class="search_btn" name="search_btn" value="Search" style="width:19%;height:35px;margin-right:10px;font-size:20px;">
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</article>
	<article class="featured">
		<div class="container">
			<div class="row">
				<div class="title">
					<div class="centered">
						<div>
							<h2>Recent Tasks</h2>
						</div>
					</div>
				</div>
				<div class="grid">
					<ul class="jobslist">
					<?php
						foreach($jobs as $job){
							$sep_title = '';
							$sep_desc = '';
							if(strlen($job['title']) > TITLELIMIT)
								$sep_title = '...';
							$title = substr($job['title'], 0, TITLELIMIT). $sep_title;
							
							if(strlen($job['description']) > DESCLIMIT)
								$sep_desc = '...';
							$description = substr($job['description'], 0, DESCLIMIT).$sep_desc;
							$now = time();
							$your_date = strtotime($job['created_date']);
							$datediff = $now - $your_date;
							$days = floor($datediff/(60*60*24));
							$latest = '';
							
							if($job['parent_cat_id'] == 0)
								$cat_id = $job['job_cat_id'];
							else
								$cat_id = $job['parent_cat_id'];
							
							$color = rand_color();
							if($days < 7)
								$latest = '<span class="tag sale"><span>new!</span></span>';
					?>
						<li class="male top" id="<?=$job['job_id']?>" style="width:256px;height:215px;margin:6px;">
							<a href="<?=base_url().'task/task-details/'.$job['job_id'].'/'.url_title($job['title'],'-', true)?>" title="Click here to see more details" style="width:256px;height:215px;">
								<div class="more" style="background-color:<?=$color?>">
									<i class="icon-search pull-right"></i>
									<span class="price">&#x20B9; <?=$job['budget']?></span>
									<span class="wks" style="font-size:0.9em;line-height:20px;"><?=$title?></span>
									<span class="txt"><?=$description?></span>
								</div>
								<?=$latest?>
								<img src="<?=base_url().SITETHEME?>images/<?=$cat_id?>.jpg" alt="Recently posted Tasks" style="border-radius:0px;">
								<span class="name" style="color:#CD4E0E;font-size:0.9em;line-height:20px;">
									<?=$title?>
									<p>Posted by : <?=$job['first_name']?><i class="icon-dot"></i> Price : &#x20B9; <?=$job['budget']?></p>
								</span>
							</a>
						</li>
					<?php
					}
					?>
					</ul>
				</div>
				<div id="loader" style="width:50%;float:left;margin-left:30%;"></div>
			</div>
		</div>
	</article>
	<div style='display:none'>
		<div id='howjobpopup_content' style='padding:10px; background:#fff;'>
			<h3><img src="<?=base_url().SITETHEME?>images/taskpinch-short-logo.png" alt="taskpinch short logo" title="taskpinch short logo">&nbsp;How to <strong>Post a Task</strong>?</h3><hr style="margin-top:0px;">
			<h5>Post a job and get expert to work on your job.<br /><br />How to Post a Task in 3 easy steps</h5>
			<p><strong>1. Login - </strong></p>
			<p><strong>2. Post a Task - </strong></p>
			<p><strong>3. Get Expert - </strong></p>
		</div>
	</div>
	<?php				
		$this->load->view('pinch/footer');
	?>
	<script>$(document).ready(function(){ $("#jobhome").addClass(" active");});</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$(window).scroll(function(){
				var WindowHeight = $(window).height();
				if($(window).scrollTop() + 200 >= $(document).height() - WindowHeight){
					$("#loader").html("");
					$("#loader").html("<a href='javascript:void(0)'><div class='loadmore'>Load more results</div></a>");
					return false;
				}
				return false;
			});
		});
		
		$("#loader").click(function(){
			$("#loader").html("");
			$.ajax({
				type: "POST",
				url: "<?=base_url()?>task/get_jobs_onscroll",
				data: {
					job_type : 'job',
					lastid : $(".grid ul li:last").attr("id")
				},
				cache: false,
				success: function(html){
					$("#loader").html("");
					if(html){
						$(".grid ul li:last").after(html);
					}
				}
			});		
		});
	</script>
	</body>
</html>