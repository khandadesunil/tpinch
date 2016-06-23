		<div id="wrap">
			<header style="background-color: rgb(255, 255, 255);" id="header" class="header header-stick">
				<div class="container">
					<!--
						Designed and Developed By : Sunil
						Email : khandade.sunil@gmail.com
					-->
					<div style="opacity: 1; visibility: visible;" class="logo float-left">
						<a href="<?=base_url()?>task/tasks-home" title=""><img src="<?=base_url().SITETHEME?>images/logo-header.png" alt=""></a>
					</div>
					<div style="display: none;" class="bars" id="bars"></div>
					<nav class="navigation nav-c nav-desktop" id="navigation" data-menu-type="1200">
						<div class="nav-inner">
							<a style="display: none;" href="#" class="bars-close" id="bars-close">Close</a>
							<div class="tb">
								<div class="tb-cell">
									<ul class="menu-list text-uppercase">
										<li id="menu1" class=""><a href="<?=base_url()?>task/tasks-home" title="Home">Home</a></li>
										<li id="menu2" class=""><a href="<?=base_url()?>user/users" title="Experts">Experts</a></li>
										<li id="menu3" class=""><a href="<?=base_url()?>task/completed-tasks" title="Completed Tasks">Completed Tasks</a></li>
										<li id="menu4" class="">
											<a href="#" title="">About Us</a>
											<ul class="sub-menu">
												<li><a href="<?=base_url()?>pinch/abount-taskpinch" title="About Taskpinch">About Taskpinch</a></li>
												<li><a href="<?=base_url()?>pinch/team" title="Our Team">Our Team</a></li>
												<li><a href="<?=base_url()?>pinch/contact-us" title="Contact Us">Contact Us</a></li>
											</ul>
										</li>
										<li id="menu5" class="">
											<a href="<?=base_url()?>pinch/share" title="Share">Share</a>
										</li>
										<?php
											if($sess_user_email == ''){
										?>
										<li id="menu6" class="">
											<a href="<?=base_url()?>user/login" title="Login / Register">Login / Register</a>
										</li>
										<?php
										}else{
										?>
										<li id="menu6" class="">
											<a href="#" title=""><?=$sess_user_name?></a>
											<ul class="sub-menu">
												<li><a href="<?=base_url()?>user/profile" title="About Taskpinch">Profile</a></li>
												<li><a href="<?=base_url()?>pinch/my-activities" title="Our Team">My Activities</a></li>
												<li><a href="<?=base_url()?>pinch/logout" title="Contact Us">Logout</a></li>
											</ul>
										</li>
										<?php
										}
										?>
									</ul>
								</div>
							</div>
						</div>
					</nav>
				</div>
			</header>