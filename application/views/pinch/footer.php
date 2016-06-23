			<!-- Footer -->
			<footer>
				<div class="container">
					<div class="row">
						<!-- Logo -->
						<div class="col-md-3 col-lg-3">
							<div class="logo-foter">
								<?php
									$tasks_count = get_tasks_count($params = null);
									$experts_count = get_experts_count($params = null);
									$top_experts = get_experts_count($params = null);
									$bids_count = get_bid_count($params = null);
									$search_count = get_search_count($params = null);
								?>
								<a href="<?=base_url()?>task/tasks-home" title=""><img src="<?=base_url().SITETHEME?>images/logo-footer.png" alt=""></a>
							</div>
							<div class="intro-filter">
								<div class="intro" style="color:#fff;">
									<p>
										<small>Total</small> 
										<span style="font-size:150%;"><i><strong><?=$tasks_count['tasks_count']?></strong></i></span> &nbsp;Tasks
									</p>
									<p>
										<small>Total</small>
										<span style="font-size:150%;"><i><strong><?=$experts_count['experts_count']?></strong></i></span> &nbsp;Experts
									</p>
									<p>
										<small>Total</small>
										<span style="font-size:150%;"><i><strong><?=$bids_count['bids_count']?></strong></i></span> &nbsp;Biddings
									</p>
									<p>
										<small>Total</small>
										<span style="font-size:150%;"><i><strong><?=$search_count['search_count']?></strong></i></span> &nbsp;Searches
									</p>
								</div>
							</div>
						</div>
						<!-- End Logo -->
						<!-- Navigation Footer -->
						<div class="col-xs-6 col-sm-3 col-md-2">
							<div class="ul-ft">
								<ul>
									<li><a href="<?=base_url()?>user/login" title="Login / Register">Login / Register</a></li>
									<li><a href="<?=base_url()?>task/tasks-home" title="Home">Home</a></li>
									<li><a href="<?=base_url()?>user/users" title="Experts">Experts</a></li>
									<li><a href="<?=base_url()?>task/completed-task" title="Completed Tasks">Completed Tasks</a></li>
									<li><a href="<?=base_url()?>pinch/share" title="Share">Share</a></li>
									<li><a href="<?=base_url()?>pinch/feedback" title="Write us">Write us</a></li>
								</ul>
							</div>
						</div>
						<!-- End Navigation Footer -->
						<!-- Navigation Footer -->
						<div class="col-xs-6 col-sm-3 col-md-2">
							<div class="ul-ft">
								<ul>
									<li><a href="<?=base_url()?>pinch/about-taskpinch" title="About Us">About Us</a></li>
									<li><a href="<?=base_url()?>pinch/our-team" title="Our Team">Our Team</a></li>
									<li><a href="<?=base_url()?>pinch/contact-us" title="Contact Us">Contact Us</a></li>
									<li><a href="<?=base_url()?>pinch/security" title="Security">Security</a></li>
									<li><a href="<?=base_url()?>pinch/privacy-policy" title="Privacy Policy">Privacy Policy</a></li>
									<li><a href="<?=base_url()?>pinch/terms" title="Term of Service">Term of Service</a></li>
								</ul>
							</div>
						</div>
						<!-- End Navigation Footer -->
						<!-- Footer Currency, Language -->
						<div class="col-sm-6 col-md-5" style="margin-right:0px;">
							<div class="subscribe">
								<h4 style="color:#fff">Subscribe to our newsletter</h4>
								<!-- Subscribe Form -->
								<div class="subscribe-form">
									<form action="#" method="get">
										<input name="" placeholder="Your email" class="subscribe-input" type="text">
										<button type="submit" class="awe-btn awe-btn-5 arrow-right text-uppercase awe-btn-lager">subcrible</button>
									</form>
								</div>
								<!-- End Subscribe Form -->
								<!-- Follow us -->
								<div class="follow-us" style="color:#fff;">
									<h4 style="color:#fff">Follow us</h4>
									<div class="follow-group" style="float:right;">
										<a target="_blank" href="http://facebook.com/taskpinch" title="Facebook"><i class="fa fa-facebook"></i></a>
										<a target="_blank" href="https://twitter.com/taskpinch" title="Twitter"><i class="fa fa-twitter"></i></a>
										<a target="_blank" href="http://www.pinterest.com/taskpinch" title="Pintrest"><i class="fa fa-pinterest"></i></a>
										<a target="_blank" href="https://www.linkedin.com/pub/dir/taskpinch" title="LinkedIn"><i class="fa fa-linkedin"></i></a>
										<a target="_blank" href="https://plus.google.com/" title="Google+"><i class="fa fa-google-plus"></i></a>
									</div>
								</div>
								<!-- Follow us -->
							</div>
							<!--CopyRight-->
							<p class="copyright">
								© 2014 All rights reserved By <a href="http://www.taskpinch.com" target="_blank">Taskpinch.com</a>
							</p>
							<!--CopyRight-->
						</div>
						<!-- End Footer Currency, Language -->
					</div>
				</div>
			</footer>
			<!-- End Footer -->
		</div>
		<!--
			Designed and Developed By : Sunil
			Email : khandade.sunil@gmail.com
		-->
		<script type="text/javascript" src="<?=base_url().SITETHEME?>js/jquery-1.js"></script>
		<script type="text/javascript" src="<?=base_url().SITETHEME?>js/jquery-ui.js"></script>
		<script type="text/javascript" src="<?=base_url().SITETHEME?>js/jquery-migrate-1.2.0.min.js"></script>
		<script type="text/javascript" src="<?=base_url().SITETHEME?>js/bootstrap.js"></script>
		<script type="text/javascript" src="<?=base_url().SITETHEME?>js/owl.js"></script>
		<script type="text/javascript" src="<?=base_url().SITETHEME?>js/parallax.js"></script>
		<script type="text/javascript" src="<?=base_url().SITETHEME?>js/jquery_002.js"></script>
		<script type="text/javascript" src="<?=base_url().SITETHEME?>js/jquery.js"></script>
		<script type="text/javascript" src="<?=base_url().SITETHEME?>js/SmoothScroll.js"></script>
		<script type="text/javascript" src="<?=base_url().SITETHEME?>js/script.js"></script>
		<div id="ui-datepicker-div" class="ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all"></div>
		
		<script>
			// Uncomment this code in production
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
			ga('create', 'UA-39825073-3', 'auto');
			ga('send', 'pageview');
		</script>
		<div id="fb-root"></div>
		<script>
			(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=1401111360142666";
			fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script>
		<div class="fb-like fb_like_position" data-href="https://www.facebook.com/taskpinch" data-layout="box_count" data-action="like" data-show-faces="true" data-share="true"></div>
	</body>
</html>