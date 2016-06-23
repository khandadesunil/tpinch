<?php
	//if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start();
	$sess_id = session_id();
	if(empty($sess_id)) {
		session_start();
	}
	$sess_admin_id = $this->session->userdata('sess_admin_id');
	$sess_admin_email = $this->session->userdata('sess_admin_email');
	$sess_admin_name = $this->session->userdata('sess_admin_name');
	$sess_admin_role = $this->session->userdata('sess_admin_role');
	if($sess_admin_id ==''){
		header("Location:index");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=UTF-8">
		<title>Dashboard | Taskpinch</title>
		<link rel="stylesheet" href="<?=base_url().ADMINTHEME?>css/screen.css" type="text/css" media="screen" title="no title" charset="utf-8">
		<link rel="stylesheet" href="<?=base_url().ADMINTHEME?>css/plugin.css" type="text/css" media="screen" title="no title" charset="utf-8">
		<link rel="stylesheet" href="<?=base_url().ADMINTHEME?>css/custom.css" type="text/css" media="screen" title="no title" charset="utf-8">
		<link rel="stylesheet" href="<?=base_url().ADMINTHEME?>css/bootstrap-overrides.css" type="text/css" media="screen" title="no title" charset="utf-8">
	
		<link rel="stylesheet" type="text/css" media="screen" href="<?=base_url().ADMINTHEME?>lib/js/themes/redmond/jquery-ui.custom.css"></link>	
		<link rel="stylesheet" type="text/css" media="screen" href="<?=base_url().ADMINTHEME?>lib/js/jqgrid/css/ui.jqgrid.css"></link>		
		<script src="<?=base_url().ADMINTHEME?>lib/js/jquery-1.8.0.min.js" type="text/javascript"></script>
		<script src="<?=base_url().ADMINTHEME?>lib/js/jqgrid/js/i18n/grid.locale-en.js" type="text/javascript"></script>
		<script src="<?=base_url().ADMINTHEME?>lib/js/jqgrid/js/jquery.jqGrid.min.js" type="text/javascript"></script>	
		<script src="<?=base_url().ADMINTHEME?>lib/js/themes/jquery-ui.custom.min.js" type="text/javascript"></script>
	</head>
	<body>
		<div id="wrapper">
			<div id="header">
				<h1>
					<a href="<?=base_url()?>admin/dashboard">Taskpinch Admin</a>
				</h1>
				<div id="info">
					<h4>
						<?=$sess_admin_name?>
					</h4>
					<p>
						Logged in as Admin
						<br>
						<a href="<?=base_url()?>admin/logout">Logout</a>
					</p>
					<img src="<?=base_url().ADMINTHEME?>images/avatar.jpg" alt="avatar">
				</div>
				<!-- #info -->
			</div>
			<!-- #header -->
			<div id="nav">
				<ul class="mega-container mega-grey">
					<li class="mega" id="dashboardtab"><a href="dashboard" class="mega-link">
						Dashboard</a> 
					</li>
					<li class="mega" id="userstab">
						<a href="javascript:;" class="mega-tab">Users</a>
						<div class="mega-content mega-menu ">
							<ul>
								<li><a href="active-users">Active Users</a></li>
								<li><a href="pending-user-approval">Pending Approval</a></li>
								<li><a href="user-subscriptions">User Subscriptions</a></li>
								<li><a href="active-testimonials">Active Testimonials</a></li>
								<li><a href="pending-testimonials-approval">Pending Testimonials</a></li>
								<li><a href="admin-users">Admin Users</a></li>
							</ul>
						</div>
					</li>
					<li class="mega" id="pinchestab">
						<a href="javascript:;" class="mega-tab hasSub">Pinches</a>
						<div class="mega-content mega-menu ">
							<ul>
								<li><a href="active-pinches">Active Pinches</a></li>
								<li><a href="pending-pinches-approval">Pending Approval</a></li>
							</ul>
						</div>
					</li>
					<li class="mega" id="jobstab">
						<a href="javascript:;" class="mega-tab hasSub">Tasks</a>
						<div class="mega-content mega-menu ">
							<ul>
								<li><a href="active-jobs">Active Tasks</a></li>
								<li><a href="pending-jobs-approval">Pending Approval</a></li>
							</ul>
						</div>
					</li>
					<li class="mega" id="adstab">
						<a href="javascript:;" class="mega-tab hasSub">Ads</a>
						<div class="mega-content mega-menu ">
							<ul>
								<li><a href="ads-request">Ads Requests (Active)</a></li>
								<li><a href="ads-request-all">Ads Requests (All)</a></li>
								<li><a href="ads-active">Active Ads</a></li>
								<li><a href="ads-history">Ads History</a></li>
							</ul>
						</div>
					</li>
					<li class="mega" id="masterstab">
						<a href="javascript:;" class="mega-tab hasSub">Masters</a>
						<div class="mega-content mega-menu ">
							<ul>
								<li><a href="job-category">Task Category</a></li>
								<li><a href="email-templates">Email Templates</a></li>
							</ul>
						</div>
					</li>
					<li class="mega" id="activitiestab">
						<a href="javascript:;" class="mega-tab hasSub">Activities</a>
						<div class="mega-content mega-menu ">
							<ul>
								<li><a href="recent-logins">Recent Logins</a></li>
								<li><a href="feedback">Feedback</a></li>
								<li><a href="database-backup">Database Backup</a></li>
								<li><a href="clear-data">Clear Data</a></li>
								<li><a href="image-optimization">Image Optimization</a></li>
							</ul>
						</div>
					</li>
					<li class="mega" id="settingstab">
						<a href="javascript:;" class="mega-tab hasSub">Settings</a>
						<div class="mega-content mega-menu ">
							<ul>
								<li><a href="javascript:;">Settings1</a></li>
								<li><a href="javascript:;">Settings2</a></li>
							</ul>
						</div>
					</li>
				</ul>
			</div>
			<!-- #nav -->