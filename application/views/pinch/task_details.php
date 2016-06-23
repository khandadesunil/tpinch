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
	</head>
	<body>
		<?php
			require_once 'header_menu.php';
		?>
			<section class="sub-banner">
				<div style="background-position: 50% 8px;" class="bg-parallax bg-1"></div>
				<div style="display: none;" class="logo-banner text-center">
					<a href="<?=base_url()?>task/tasks-home" title="Taskpinch Logo"><img src="<?=base_url().SITETHEME?>images/logo-banner.png" alt="Taskpinch Logo"></a>
				</div>
			</section>
			<div class="main main-dt">
				<div class="container">
					<div class="main-cn detail-page bg-white clearfix">
						<section class="breakcrumb-sc">
							<ul class="breadcrumb arrow">
								<li><a href="<?=base_url()?>task/tasks-home"><i class="fa fa-home"></i></a></li>
								<li><a href="<?=base_url()?>task/tasks-home" title="">Home</a></li>
								<li><a href="javascript:void(0);" title="">Task Details </a></li>
							</ul>
							<div class="support float-right">
								<small>Got a question? Call us on </small> +1 306 203 2241
							</div>
						</section>
						<!-- End Breakcrumb -->
						<!-- Header Detail -->
						<section class="head-detail">
							<div class="head-dt-cn">
								<div class="row">
									<div class="col-sm-7">
										<h1><?=$task['title']?></h1>
									</div>
									<div class="col-sm-5 text-right">
										<p class="price-book">
											Budget - <span>Rs. <?=$task['budget']?></span> 
											<a href="javascript:void(0);" class="awe-btn awe-btn-1 awe-btn-small" style="background-color:#cd4e0e"><?=$task['status']?></a>
										</p>
									</div>
								</div>
							</div>
						</section>
						<!-- End Header Detail -->
						<!-- Detail Slide -->
						<section class="detail-slider">
							<!-- Lager Image -->
							<div class="slide-room-lg">
								<div class="owl-carousel owl-theme" style="display: block; opacity: 1;" id="slide-room-lg">
									<div class="owl-wrapper-outer">
										<div style="width: 23400px; left: 0px; display: block;" class="owl-wrapper">
											<div style="width: 1170px;" class="owl-item"><img src="<?=base_url().SITETHEME?>images/img-1_002.jpg" alt=""></div>
										</div>
									</div>
								</div>
							</div>
							<!-- End Lager Image -->
						</section>
						<!-- End Detail Slide -->
						<!-- Tour Overview -->
						<section class="tour-overview detail-cn" id="tour-overview">
							<div class="row">
								<div class="col-lg-3 detail-sidebar">
									<div style="top: 82px; position: static;" class="scroll-heading">
										<h2><img src="<?=base_url().SITETHEME?>images/img-1_002.jpg" alt=""></h2>
										<!--<h2><img src="<?=base_url()?>uploads/ads/ads1.png" alt=""></h2>-->
										<hr class="hr">
										<a href="#" title="">Ads Here</a><br /><br /><br /><br /><br /><br />
										<a href="#" title="">Ads Here</a><br /><br /><br /><br /><br /><br />
									</div>
								</div>
								<div class="col-lg-9 tour-overview-cn">
									<div class="tour-description">
										<h2 class="title-detail">
											Task Description
										</h2>
										<div class="tour-detail-text">
											<p><?=$task['description']?></p>
										</div>
									</div><br /><br />
									<div class="tour-description">
										<h2 class="title-detail">
											Recent Biddings
										</h2>
										<div class="tour-detail-text">
											<?php
												foreach($all_bid as $bid){
											?>
											<div class="hotel-list-item">
												<figure class="hotel-img float-left">
													<a title="" href="<?=base_url()?>user/user-profile/<?=$bid['user_id']?>/<?=url_title($bid['first_name'].' '.$bid['last_name'], '-', true)?>">
														<img alt="" src="<?=base_url().SITETHEME?>images/img-1.jpg">
													</a>
												</figure>
												<div class="hotel-text">
													<div class="hotel-name">
														<a title="" href="<?=base_url()?>user/user-profile/<?=$bid['user_id']?>/<?=url_title($bid['first_name'].' '.$bid['last_name'], '-', true)?>"><?=$bid['first_name'].' '.$bid['last_name']?></a>
													</div>
													<div class="hotel-star-address">
														<span class="rating">
															Rating <br>
															<ins>7.5</ins>
														</span>
														<address class="hotel-address">
															<?=$bid['address']?>, <?=$bid['city']?>
														</address>
													</div>
													<p>
														Abount Me - <?=$bid['about_me'].', My skills are '.$bid['skills']?>
													</p>
													<hr class="hr">
													<div class="price-box float-left">
														<span class="price old-price">Bid Amount - </span>
														<span class="price special-price">Rs. <?=$bid['bid_amount']?></span>
													</div>
													<div class="hotel-service float-right">
														<a href="" title="" class="awe-btn awe-btn-1 awe-btn-small">Get in Touch</a>
													</div>
												</div>
											</div>
											<?php
												}
											?>
										</div>
									</div>
								</div>
							</div>
						</section>
					</div>
				</div>
			</div>
			<?php
				require_once 'footer.php';
			?>