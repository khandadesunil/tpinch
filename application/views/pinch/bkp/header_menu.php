		<link rel="shortcut icon" href="<?=base_url().SITETHEME?>images/favicon.ico" type="image/x-icon">
		<link rel="icon" href="<?=base_url().SITETHEME?>images/favicon.ico" type="image/x-icon">
        <!-- CSS -->
        <link rel="stylesheet" href="<?=base_url().SITETHEME?>css/bootstrap.css">
        <!-- Slider Revolution -->
        <link rel="stylesheet" href="<?=base_url().SITETHEME?>css/settings.css">
        <!-- Font icons -->
        <link rel="stylesheet" href="<?=base_url().SITETHEME?>css/fontello.css">
        <!--[if IE 7]>
        <link rel="stylesheet" href="<?=base_url().SITETHEME?>css/fontello-ie7.css" >
        <![endif]-->
        <link rel="stylesheet" href="<?=base_url().SITETHEME?>css/component.css">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="<?=base_url().SITETHEME?>css/styles.css">
        <!-- Custom Media-Queties -->
        <link rel="stylesheet" href="<?=base_url().SITETHEME?>css/media-queries.css">
		<!-- Colorbox -->
		<link rel="stylesheet" href="<?=base_url().SITETHEME?>css/colorbox.css" />
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="<?=base_url().SITETHEME?>js/html5.js"></script>        
        <![endif]-->
        <!-- Media queries -->
        <!--[if lt IE 9]>
        <script src="<?=base_url().SITETHEME?>js/css3-mediaqueries.js"></script>
        <![endif]-->
		<link rel="stylesheet" href="<?=base_url().SITETHEME?>css/jquery.autocomplete.css" type="text/css" />
		<!--
			Designed and Developed By : Sunil
			Email : khandade.sunil@gmail.com
		-->
    </head>
    <body>
        <!-- Header -->
        <header>
            <nav class="navbar navbar-fixed-top" role="navigation">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="<?=base_url()?>task/tasks-home"><img src="<?=base_url().SITETHEME?>images/taskpinch-logo.png" alt="taskpinch logo" title="taskpinch logo"></a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav">
							<li id="jobhome"><a href="<?=base_url()?>task/tasks-home">Tasks</a></li>
							<li id="pinchhome"><a href="<?=base_url()?>task/offered-tasks">Offered Task</a></li>
							<li id="offerapinch"><a href="<?=base_url()?>task/post">Post a Task</a></li>
                            <li id="user" class="dropdown">
								<a href="javascript:void(0)" class="dropdown-toggle welcome" data-toggle="dropdown">About Us <span class="caret"></span></a>
								<ul class="dropdown-menu">
                                    <li><a href="<?=base_url()?>pinch/about-taskpinch">About Taskpinch</a></li>
                                    <li><a href="<?=base_url()?>pinch/team">Our Team</a></li>
                                    <li><a href="<?=base_url()?>pinch/contact-taskpinch">Contact Us</a></li>
                                </ul>
							</li>
                            <li id="share"><a href="<?=base_url()?>pinch/share">Share</a></li>
                            <li>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</li>
                            <li id="user" class="dropdown ">
								<?php
									if($sess_user_email == ''){
								?>
								<!--<a id='loginpopup' href="#loginpopup_content"><span class="label label-default">Login / Register</span></a>-->
								<a href="<?=base_url()?>user/login"><span class="label label-default">Login / Register</span></a>
								<?php
									}else{
										if($sess_photo == '')
											$photo1 = base_url().'theme/site/idream/images/avatar.png';
										else
											$photo1 = base_url().'uploads/profile_images/'.$sess_photo;
								?>
								<a href="javascript:void(0)" class="dropdown-toggle welcome" data-toggle="dropdown" style="color:#CD4E0E">
									<img src="<?=$photo1?>" id="avatar_img" alt="Profile Picture" title="Profile Picture" class="img-rounded thumb" width="44" height="44" /> <?=$sess_user_name?> <span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
                                    <li><a href="<?=base_url()?>user/profile/<?=$sess_user_id.'/'.$sess_user_name?>">Profile</a></li>
                                    <li><a href="<?=base_url()?>user/my-activities">My Activities</a></li>
                                    <li><a href="<?=base_url()?>pinch/logout">Logout</a></li>
                                </ul>
								<?php
									}
								?>
							</li>
                        </ul>						
						<!-- This contains the hidden content for inline calls -->
						<div style='display:none'>
							<!-- Login -->
							<div id='loginpopup_content' style='padding:10px; background:#fff;'>
								<h3><img src="<?=base_url().SITETHEME?>images/taskpinch-short-logo.png" alt="taskpinch short logo" title="taskpinch short logo">&nbsp;Login</h3><hr style="margin-top:0px;">
								<h5>Not a member yet? <a href="#registerpopup_content" id="registerpopup" class="cboxElement"><span class="label label-default">Register</span></a></h5>
								<form class="form login_form" id="login_form" action="" method="POST">
									<p>Email </p><input type="text" name="login_email" id="login_email" value="" class="form-control" placeholder="Email">
									<p>Password </p><input type="password" name="login_pass" id="login_pass" value="" class="form-control" placeholder="Password">
									<div class="status_msg" style="border:1px soild;float:left;"></div>
									<input type="submit" name="login" id="login" value="Login"><br /><br />
									<p style="text-align:right"><a href="#forgotpopup_content" id="forgotpopup" class="cboxElement">Forgot Password</a></p>
								</form>	
							</div>
							
							<!-- Register -->
							<div id='registerpopup_content' style='padding:10px; background:#fff;'>
								<div class="col-md-12">
									<h3><img src="<?=base_url().SITETHEME?>images/taskpinch-short-logo.png" alt="taskpinch short logo" title="taskpinch short logo">&nbsp;Register</h3><hr style="margin-top:0px;">
									<h5>Already a member? <a href="#loginpopup_content" id="reg_loginpopup" class="cboxElement"><span class="label label-default">Login</span></a></h5>
									<form class="form reg_form" id="reg_form" action="" method="POST">
										<div class="col-md-6">
											<p>First Name </p><input type="text" name="reg_first_name" id="reg_first_name" value="" class="form-control" placeholder="First Name">
										</div>
										<div class="col-md-6">
											<p>Last Name </p><input type="text" name="reg_last_name" id="reg_last_name" value="" class="form-control" placeholder="Last Name">
										</div>
										<div class="col-md-13">
											<p>Email </p><input type="text" name="reg_email" id="reg_email" value="" class="form-control" placeholder="Email" autocomplete="off">
										</div>
										<div class="col-md-6">
											<p>Password </p><input type="password" name="reg_pass" id="reg_pass" value="" class="form-control" placeholder="Password" autocomplete="off">
										</div>
										<!--<div class="col-md-12">
											<p>Confirm Password </p><input type="password" name="reg_conf_pass" id="reg_conf_pass" class="form-control" placeholder="Confirm Password" autocomplete="off">
										</div>-->
										<div class="col-md-6">
											<p>Mobile </p><input type="text" name="reg_contact" id="reg_contact" value="" class="form-control" placeholder="Mobile Number">
										</div>
										<div class="col-md-6">
											<p>Gender </p>
											<p><input type="radio" name="reg_gender" id="reg_male_page" value="male">&nbsp; Male &nbsp; &nbsp;
												<input type="radio" name="reg_gender" id="reg_female_page" value="female">&nbsp; Female</p>
										</div>
										<div class="col-md-6">
											<p>&nbsp;</p>
											<p>&nbsp; <input type="checkbox" name="reg_terms_page" id="reg_terms_page" value="1">
											&nbsp;I accept <a href="<?=base_url()?>pinch/terms" target="_blank">Terms</a> & <a href="<?=base_url()?>pinch/privacy-policy" target="_blank">Privacy</a></p>
										</div>
										<div class="col-md-12">
											<div class="status_msg" style="border:1px soild;float:left;">&nbsp;</div>
										</div>
										<div class="col-md-12">
											<input type="submit" name="register" id="register" value="Register">
										</div>
									</form>
								</div>
							</div>
							
							<!-- Forgot Password -->
							<div id='forgotpopup_content' style='padding:10px; background:#fff;'>
								<h3><img src="<?=base_url().SITETHEME?>images/taskpinch-short-logo.png" alt="taskpinch short logo" title="taskpinch short logo">&nbsp;Forgot Password</h3><hr style="margin-top:0px;">
								<h5>Already a member? <a href="#loginpopup_content" id="forgot_loginpopup" class="cboxElement"><span class="label label-default">Login</span></a></h5>
								<form class="form forgot_form" id="forgot_form" action="" method="POST">
									<p>Email </p><input type="text" name="forgot_email" id="forgot_email" value="" class="form-control" placeholder="Email" autocomplete="off">
									<div class="status_msg" style="border:1px soild;float:left;"></div>
									<input type="submit" name="reset_pass" id="reset_pass" value="Reset Password"><br />
								</form>	
							</div>
							
							<!-- Offer a Pinch Login -->
							<div id='offerapinch_loginpopup_content' style='padding:10px; background:#fff;'>
								<h3><img src="<?=base_url().SITETHEME?>images/taskpinch-short-logo.png" alt="taskpinch short logo" title="taskpinch short logo">&nbsp;Login to Sell a Service</h3><hr style="margin-top:0px;">
								<h5>Not a member yet? <a href="#postajob_registerpopup_content" id="postajob_registerpopup" class="cboxElement"><span class="label label-default">Register</span></a></h5>
								<form class="form offerapinch_login_form" id="postajob_login_form" action="" method="POST">
									<p>Email </p><input type="text" name="offerapinch_login_email" id="offerapinch_login_email" value="" class="form-control" placeholder="Email">
									<p>Password </p><input type="password" name="offerapinch_login_pass" id="offerapinch_login_pass" value="" class="form-control" placeholder="Password">
									<div class="status_msg" style="border:1px soild;float:left;"></div>
									<input type="submit" name="login_offer" id="login_offer" value="Login & Sell a Service"><br /><br />
									<p style="text-align:right"><a href="#postajob_forgotpopup_content" id="postajob_forgotpopup" class="cboxElement">Forgot Password</a></p>
								</form>	
							</div>
							<!-- Post a Task Login -->
							<div id='postajob_loginpopup_content' style='padding:10px; background:#fff;'>
								<h3><img src="<?=base_url().SITETHEME?>images/taskpinch-short-logo.png" alt="taskpinch short logo" title="taskpinch short logo">&nbsp;Login to Post a Task</h3><hr style="margin-top:0px;">
								<h5>Not a member yet? <a href="#postajob_registerpopup_content" id="postajob_registerpopup" class="cboxElement"><span class="label label-default">Register</span></a></h5>
								<form class="form postajob_login_form" id="postajob_login_form" action="" method="POST">
									<p>Email </p><input type="text" name="postajob_login_email" id="postajob_login_email" value="" class="form-control" placeholder="Email" autocomplete="off">
									<p>Password </p><input type="password" name="postajob_login_pass" id="postajob_login_pass" value="" class="form-control" placeholder="Password" autocomplete="off">
									<div class="status_msg" style="border:1px soild;float:left;"></div>
									<input type="submit" name="login_post" id="login_post" value="Login & Post a Task"><br /><br />
									<p style="text-align:right"><a href="#postajob_forgotpopup_content" id="postajob_forgotpopup" class="cboxElement">Forgot Password</a></p>
								</form>	
							</div>
							
							<!-- Post a Task Register -->
							<div id='postajob_registerpopup_content' style='padding:10px; background:#fff;'>
								<h3><img src="<?=base_url().SITETHEME?>images/taskpinch-short-logo.png" alt="taskpinch short logo" title="taskpinch short logo">&nbsp;Register</h3><hr style="margin-top:0px;">
								<h5>Already a member? <a href="#postajob_loginpopup_content" id="postajob_loginpopup" class="cboxElement"><span class="label label-default">Login</span></a></h5>
									<form class="form postajob_form" id="postajob_form" action="" method="POST">
										<div class="col-md-6">
											<p>First Name </p><input type="text" name="postajob_first_name" id="postajob_first_name" value="" class="form-control" placeholder="First Name">
										</div>
										<div class="col-md-6">
											<p>Last Name </p><input type="text" name="postajob_last_name" id="postajob_last_name" value="" class="form-control" placeholder="Last Name">
										</div>
										<div class="col-md-13">
											<p>Email </p><input type="text" name="postajob_email" id="postajob_email" value="" class="form-control" placeholder="Email" autocomplete="off">
										</div>
										<div class="col-md-6">
											<p>Password </p><input type="password" name="postajob_pass" id="postajob_pass" value="" class="form-control" placeholder="Password" autocomplete="off">
										</div>
										<!--<div class="col-md-12">
											<p>Confirm Password </p><input type="password" name="postajob_conf_pass" id="postajob_conf_pass" class="form-control" placeholder="Confirm Password" autocomplete="off">
										</div>-->
										<div class="col-md-6">
											<p>Mobile </p><input type="text" name="postajob_contact" id="postajob_contact" value="" class="form-control" placeholder="Mobile Number">
										</div>
										<div class="col-md-6">
											<p>Gender </p>
											<p><input type="radio" name="postajob_gender" id="reg_male_page" value="male">&nbsp; Male &nbsp; &nbsp;
												<input type="radio" name="postajob_gender" id="reg_female_page" value="female">&nbsp; Female</p>
											<!--<select name="postajob_gender" id="postajob_gender" class="form-control">
												<option value="">Select</option>
												<option value="male">Male</option>
												<option value="female">Female</option>
											</select>-->
										</div>
										<div class="col-md-6">
											<p>&nbsp;</p>
											<p> &nbsp; &nbsp; <input type="checkbox" name="post_terms_page" id="post_terms_page" value="1">
											&nbsp; I accept <a href="<?=base_url()?>pinch/terms" target="_blank">Terms</a> & <a href="<?=base_url()?>pinch/privacy-policy" target="_blank">Privacy</a></p>
										</div>
										<div class="col-md-12">
											<div class="status_msg" style="border:1px soild;float:left;"></div>
											<input type="submit" name="register" id="register" value="Register">
										</div>
									</form>
							</div>
							<!-- Post a Task Forgot Password -->
							<div id='postajob_forgotpopup_content' style='padding:10px; background:#fff;'>
								<h3><img src="<?=base_url().SITETHEME?>images/taskpinch-short-logo.png" alt="taskpinch short logo" title="taskpinch short logo">&nbsp;Forgot Password</h3><hr style="margin-top:0px;">
								<h5>Already a member? <a href="#postajob_loginpopup_content" id="postajob_forgot_loginpopup" class="cboxElement"><span class="label label-default">Login</span></a></h5>
								<form class="form postajob_forgot_form" id="postajob_forgot_form" action="" method="POST">
									<p>Email </p><input type="text" name="postajob_forgot_email" id="postajob_forgot_email" value="" class="form-control" placeholder="Email">
									<div class="status_msg" style="border:1px soild;float:left;"></div>
									<input type="submit" name="login_reset_pass" id="login_reset_pass" value="Reset Password"><br />
								</form>	
							</div>
						</div>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </nav>
        </header>
        <!-- end Header -->
        <div id="content">
            <section id="home" class="updatable">