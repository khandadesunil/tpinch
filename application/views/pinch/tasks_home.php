<?php
	require_once 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Post your Task here and get it done by Experts! | <?=SITETITLE?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="keywords" content="hire a person, sell services, hire services, outsource jobs, post a job, post jobs, post online jobs, jobs in my city, outsource jobs, outsource tasks, part time jobs, hundreds of part time jobs, internet jobs, freelance jobs, online jobs, delivery help, personal assistants, jobs for students, jobs for professionals, personal helper, personal assistant, professional part time jobs, latest jobs">
		<meta name="description" content="Taskpinch.com - Your online market place! Outsource your work and We help you to get the right, skilled, friendly and trustworthy person to work on your job. Taskpinch.com helps you to offer the service or your favourite job to the world and get paid for it.">
		<meta name="format-detection" content="telephone=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<link rel="icon" href="<?=base_url().SITETHEME?>images/favicon.ico" type="image/x-icon">
		<link href="<?=base_url().SITETHEME?>css/css.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="<?=base_url().SITETHEME?>css/font-awesome.css">
		<link rel="stylesheet" href="<?=base_url().SITETHEME?>css/bootstrap.css">
		<link rel="stylesheet" href="<?=base_url().SITETHEME?>css/jquery-ui.css">
		<link rel="stylesheet" href="<?=base_url().SITETHEME?>css/owl.css">
		<link rel="stylesheet" href="<?=base_url().SITETHEME?>css/style.css">
		<link rel="stylesheet" href="<?=base_url().SITETHEME?>css/jquery-ui.min.css" type="text/css" /> 
		<script type="text/javascript" src="<?=base_url().SITETHEME?>js/jquery-1.9.1.min.js"></script>
		
		<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
	</head>
	<body>
		<?php
			require_once 'header_menu.php';
		?>
			<section class="banner">
				<div style="background-position: 50% -60px;" class="bg-parallax bg-1"></div>
				<div class="container">
					<div style="display: none;" class="logo-banner text-center">
						<a href="<?=base_url()?>task/tasks-home" title="">
						<img src="<?=base_url().SITETHEME?>images/logo-banner.png" alt="">
						</a>
					</div>
					<div class="banner-cn">
						<ul class="tabs-cat text-center row">
							<li class="cate-item active col-xs-2">
								<a data-toggle="tab" href="#form-active-task" title="Active Tasks"><span><strong>Active Tasks</strong></span><img src="<?=base_url().SITETHEME?>images/icon-active-task.png" alt=""></a>
							</li>
							<li class="cate-item col-xs-2">
								<a data-toggle="tab" href="#form-experts" title="Find Experts"><span><strong>Find Experts</strong></span><img src="<?=base_url().SITETHEME?>images/icon-find-experts.png" alt=""></a>
							</li>
						</ul>
						<!-- End Tabs Cat -->
						<!-- Tabs Content -->
						<div class="tab-content">
							<!-- Search Hotel -->
							<div class="form-cn form-active-task tab-pane active in" id="form-active-task">
								<h2>Search Active Tasks</h2>
								<form name="active_task_form" id="active_task_form" class="active_task_form" action="<?=base_url()?>task/search-tasks" method="get">
									<div class="form-search clearfix">
										<div class="form-field field-destination">
											<label for="destination">Enter the skills required for task</label>
											<input name="term" id="term" class="field-input" type="text" style="width:900px;">
										</div>
										<div class="form-submit">
											<button type="submit" class="awe-btn awe-btn-lager awe-search">Search</button>
										</div>
									</div>
								</form>
							</div>
							<!-- End Search Hotel -->
							<!-- Search Car -->
							<div class="form-cn form-experts tab-pane" id="form-experts">
								<h2>Search Experts to work on your Task</h2>
								<form name="form2" action="<?=base_url()?>user/users" method="post">
									<div class="form-search clearfix">
										<div class="form-field field-destination">
											<label for="destination">Search Experts...</label>
											<input name="experts" id="experts" class="field-input" type="text" style="width:900px;">
										</div>
										<div class="form-submit">
											<button type="submit" class="awe-btn awe-btn-lager awe-search">Search</button>
										</div>
									</div>
								</form>
							</div>
							<!-- End Search Car -->
						</div>
						<!-- End Tabs Content -->
					</div>
					<!-- End Banner Content -->
				</div>
			</section>
			<!--End Banner-->
			<!-- Sales -->
			<section class="sales">
				<!-- Title -->
				<div class="title-wrap">
					<div class="container">
						<div class="travel-title float-left">
							<h2>Recently posted tasks</span></h2>
						</div>
						<a href="#" title="" class="awe-btn awe-btn-5 awe-btn-lager arrow-right text-uppercase float-right">ALL TASKS</a>
					</div>
				</div>
				<!-- End Title -->
				<!-- Hot Sales Content -->
				<div class="container">
					<div class="sales-cn">
						<div class="row">
							<?php
								foreach($tasks as $task){
									$title = $task['title'];
									$city = $task['city'];
									$area = $task['area'];
									$budget = $task['budget'];
									if($task['parent_cat_id'] == 0)
										$cat_id = $task['job_cat_id'];
									else
										$cat_id = $task['parent_cat_id'];
							?>
							<div class="col-xs-6 col-md-3">
								<div class="sales-item">
									<figure class="home-sales-img">
										<a href="<?=base_url().'task/task-details/'.$task['job_id'].'/'.url_title($task['title'],'-', true)?>" title="<?=$title?>">
											<!--<img src="<?=base_url().SITETHEME?>images/img-1_003.jpg" alt="">-->
											<img src="<?=base_url().SITETHEME?>images/cat_img/<?=$cat_id?>.jpg" alt="<?=$title?>">
										</a>
									</figure>
									<div class="home-sales-text">
										<div class="home-sales-name-places">
											<div class="home-sales-name">
												<a href="<?=base_url().'task/task-details/'.$task['job_id'].'/'.url_title($task['title'],'-', true)?>" title="<?=$title?>"><?=$title?></a>
											</div>
											<div class="home-sales-places">
												<a href="" title="<?=$area?>"><?=$area?></a>, <a href="" title="<?=$city?>"><?=$city?></a>
											</div>
										</div>
										<div class="price-box"><span class="price special-price">Rs. <?=$budget?></span></div>
									</div>
								</div>
							</div>
							<?php
								}
							?>
						</div>
					</div>
				</div>
				<!-- End Hot Sales Content -->
			</section>
			<!-- End Sales -->
			<!-- Travel Destinations -->
			<section class="destinations">
				<!-- Destinations Content -->
				<div class="destinations-cn">
					<!-- Background -->
					<div style="background-position: 50% 64px;" class="bg-parallax bg-2"></div>
					<!-- End Background -->
					<div class="container">
						<div class="row">
							<!-- Destinations Filter -->
							<div class="col-md-4 col-lg-4">
								<div class="confidence">
									<h3>Post a Task with Simple steps!</h3>
									<ul>
										<li>
											<span class="label-nb">01</span>
											<h5><strong>Login or Register</strong></h5>
											<p>Log in or register yourself to customize your task and get more experts.</p>
										</li>
										<li>
											<span class="label-nb">02</span>
											<h5><strong>Post a Task</strong></h5>
											<p>Post your task and allow us some time to review and publish it.</p>
										</li>
										<li>
											<span class="label-nb">03</span>
											<h5><strong>Expert's Bidding</strong></h5>
											<p>Experts will bid the task so that you can choose best among best.</p>
										</li>
										<li>
											<span class="label-nb">04</span>
											<h5><strong>Complete your Task!</strong></h5>
											<p>Get in touch with best bidder and Relax!</p>
										</li>
									</ul>
								</div>
							</div>
							<!-- End Destinations Filter -->
							<!-- Destinations Grid -->
							<div class="col-md-8 col-lg-8">
								<div class="tab-content destinations-grid">
									<div class="title-wrap">
										<div class="container">
											<div class="travel-title float-left">
												<h2>Hot Task Pinchers</h2>
											</div>
											<!--<a href="#" title="" class="awe-btn awe-btn-5 awe-btn-lager arrow-right text-uppercase float-right">ALL EXPERTS</a>-->
										</div>
									</div>
									<!-- Tab One -->
									<div id="destinations-1" class="clearfix tab-pane fade active in ">
										<?php
											foreach($top_experts as $top_expert){
												$user_id = $top_expert['user_id'];
												$first_name = $top_expert['first_name'];
												$tasks = $top_expert['tasks'];
												$photo = $top_expert['photo'];
												if($photo == '')
													$photo = base_url().SITETHEME.'images/avatar_big.png';
												else
													$photo = base_url().'uploads/profile_images/'.$photo;
										?>
										<div class="col-xs-6 col-sm-4 col-md-6 col-lg-4">
											<div class="destinations-item ">
												<figure class="destinations-img">
													<a href="<?=base_url()?>user/profile/<?=$user_id.'/'.$first_name?>" title="<?=$first_name?>">
													<img src="<?=base_url().SITETHEME?>images/img-1.jpg" alt="">
													</a>
												</figure>
												<div class="destinations-text">
													<div class="destinations-name">
														<a href="<?=base_url()?>user/profile/<?=$user_id.'/'.$first_name?>" title="<?=$first_name?>"><?=$first_name?></a>
													</div>
													<span class="properties-nb">
													<ins><?=$tasks?></ins> task(s) completed
													</span>
												</div>
											</div>
										</div>
										<?php
											}
										?>
									</div>
									<!-- End Tab One -->
								</div>
							</div>
							<!-- ENd Destinations Grid -->
						</div>
					</div>
				</div>
				<!-- End Destinations Content -->
			</section>
			<!-- End Travel Destinations -->
		<?php
			require_once 'footer.php';
		?>
		<script>$(document).ready(function(){ $("#menu1").addClass(" current-menu-parent");});</script>
		<script type="text/javascript">
			$(document).ready(function(){
				$("#term").autocomplete({
					source: "<?=base_url()?>task/get_auto_tasks",
					minLength: 1
				});				
			});
		</script>