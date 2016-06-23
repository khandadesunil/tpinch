<?php
	require_once 'header.php';
	$categories = get_tasks_main_categories_list($params = null);
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
	</head>
	<body>
		<?php
			require_once 'header_menu.php';
		?>
		<!-- Wrap -->
		<div id="wrap">
			<!--Banner-->
			<section class="sub-banner">
				<!--Background-->
				<div style="background-position: 50% 8px;" class="bg-parallax bg-1"></div>
				<!--End Background-->
				<!-- Logo -->
				<div style="display: none;" class="logo-banner text-center">
					<a href="<?=base_url()?>task/tasks-home" title=""><img src="<?=base_url().SITETHEME?>images/logo-banner.png" alt=""></a>
				</div>
				<!-- Logo -->
			</section>
			<!--End Banner-->
			<!-- Main -->
			<div class="main">
				<div class="container">
					<div class="main-cn hotel-page bg-white">
						<div class="row">
							<!-- Hotel Right -->
							<div class="col-md-9 col-md-push-3">
								<!-- Breakcrumb -->
								<section class="breakcrumb-sc">
									<ul class="breadcrumb arrow">
										<li><a href="#" title="">Searching for "<?=$search?>"</a></li>
									</ul>
								</section>
								<!-- End Breakcrumb -->
								<!-- Hotel List -->
								<section class="hotel-list">
									<!-- Sort by and View by -->
									<div class="sort-view clearfix">
										<!-- Sort by -->
										<div class="sort-by float-left">
											<label>Sort by: </label>
											<div class="sort-select select float-left">
												<span data-placeholder="Select">Post Date</span>
												<select name="start">
													<option value="">Post Date</option>
													<option selected="selected" value="desc">Latest</option>
													<option value="asc">Oldest</option>
												</select>
											</div>
											<div class="sort-select select float-left">
												<span data-placeholder="Select">Pricing</span>
												<select name="pricing">
													<option value="1">Pricing</option>
													<option selected="selected" value="asc">Low</option>
													<option value="desc">High</option>
												</select>
											</div>
										</div>
										<!-- End Sort by -->
									</div>
									<!-- End Sort by and View by -->
									<!-- Hotel Grid Content-->
									<div class="hotel-grid-cn clearfix">
										<?php
											foreach($tasks as $task){
												$title = $task['title'];
												
												$sep_title = '';
												$sep_desc = '';
												if(strlen($title) > TITLELIMIT)
													$sep_title = '...';
												$trimtitle = substr($title, 0, TITLELIMIT). $sep_title;
												
												$city = $task['city'];
												$area = $task['area'];
												$budget = $task['budget'];
												if($task['parent_cat_id'] == 0)
													$cat_id = $task['job_cat_id'];
												else
													$cat_id = $task['parent_cat_id'];
										?>
										<div class="col-xs-6 col-sm-4 col-md-6 col-lg-4">
											<div class="hotel-item">
												<figure class="hotel-img">
													<a href="<?=base_url().'task/task-details/'.$task['job_id'].'/'.url_title($task['title'],'-', true)?>" title="<?=$title?>">
														<!--<img src="<?=base_url().SITETHEME?>images/img-1_003.jpg" alt="">-->
														<img src="<?=base_url().SITETHEME?>images/cat_img/<?=$cat_id?>.jpg" alt="<?=$title?>">
													</a>
												</figure>
												<div class="hotel-text">
													<div class="hotel-name">
														<a href="<?=base_url().'task/task-details/'.$task['job_id'].'/'.url_title($task['title'],'-', true)?>" title="<?=$title?>"><?=$trimtitle?></a>
													</div>
													<div class="hotel-places">
														<a href="" title="<?=$area?>"><?=$area?></a>,
														<a href="" title="<?=$city?>"><?=$city?></a>
													</div>
													<div class="price-box">
														<span class="price special-price">Rs. <?=$budget?><small></small></span>
													</div>
												</div>
											</div>
										</div>
										<?php
											}
										?>
									</div>
									<!-- End Hotel Grid Content-->
									<!-- Page Navigation -->
									<!-- <div class="page-navigation-cn">
										<ul class="page-navigation">
											<li class="first"><a href="" title="">First</a></li>
											<li class="current"><a href="" title="">1</a></li>
											<li><a href="" title="">2</a></li>
											<li><a href="" title="">3</a></li>
											<li><a href="" title="">4</a></li>
											<li><a href="" title="">5</a></li>
											<li><a href="" title="">...</a></li>
											<li class="last"><a href="" title="">Last</a></li>
										</ul>
									</div> -->
									<!-- Page Navigation -->
								</section>
								<!-- End Hotel List -->
							</div>
							<!-- End Hotel Right -->
							<!-- Sidebar Hotel -->
							<div class="col-md-3 col-md-pull-9">
								<!-- Sidebar Content -->
								<div class="sidebar-cn">
									<!-- Search Result -->
									<div class="search-result">
										<p>
											We found... <br>
											<ins><?=count($tasks)?></ins> <span>task(s) for you</span>
										</p>
									</div>
									<!-- End Search Result -->
									<!-- Search Form Sidebar -->
									<div class="search-sidebar">
										<div class="row">
											<form name="active_task_form" id="active_task_form" class="active_task_form" action="<?=base_url()?>task/search-tasks" method="get">
												<div class="form-search clearfix">
													<div class="form-field col-md-12">
														<input name="term" id="term" class="field-input" value="<?=$search?>" type="text">
													</div>
													<div class="form-submit col-md-12">
														<button type="submit" class="awe-btn awe-btn-medium awe-search">Search</button>
													</div>
												</div>
											</form>
										</div>
									</div>
									<!-- End Search Form Sidebar -->
									<!-- Area -->
									<div class="widget-sidebar area-sidebar">
										<h4 class="title-sidebar">Task Category</h4>
										<ul class="widget-ul">
											<?php
												foreach($categories['categories'] as $category){
													$c_id = $category['job_cat_id'];
													$c_name = $category['category_name'];
											?>
											<li>
												<div class="radio-checkbox">
													<input id="<?=$c_id?>" class="checkbox" type="checkbox">
													<label for="<?=$c_id?>"><?=$c_name?></label>
												</div>
												<span>12</span>
											</li>
											<?php
												}
											?>
										</ul>
									</div>
									<!-- End Area -->
								</div>
								<!-- End Sidebar Content -->
							</div>
							<!-- End Sidebar Hotel -->
						</div>
					</div>
				</div>
			</div>
			<!-- End Main -->
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