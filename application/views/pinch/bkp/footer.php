			<!-- end Coupons -->
            </section>
        </div>
        <!-- Footer -->
        <footer>
            <!-- begin Contact -->
            <article class="contact">
                <div id="contact_bg" style="padding-left:60px;">
                    <div class="container">
                        <div class="row">
							<br />
							<div class="col-sm-2">
                                <address>
                                    <p><a href="<?=base_url()?>user/login">Login</a></p>
                                    <p><a href="<?=base_url()?>user/register">Register</a></p>
                                    <p><a href="<?=base_url()?>task/offered-tasks">Offered Services</a></p>
                                    <p><a href="<?=base_url()?>task/tasks-home">Tasks</a></p>
                                    <p><a href="<?=base_url()?>task/post">Post a Task / Services</a></p>
                                    <p><a href="<?=base_url()?>pinch/premium-membership">Premium Membership</a></p>
                                </address>
                            </div>
							<div class="col-sm-2">
                                <address>
                                    <p><a href="<?=base_url()?>pinch/why-taskpinch">Why Taskpinch?</a></p>
                                    <p><a href="<?=base_url()?>pinch/how-it-works">How it Works?</a></p>
                                    <p><a href="<?=base_url()?>pinch/faq">FAQ</a></p>
                                    <p><a href="<?=base_url()?>pinch/terms">Terms of Use</a></p>
                                    <p><a href="<?=base_url()?>pinch/privacy-policy">Privacy Policy</a></p>
                                    <p><a href="<?=base_url()?>pinch/safety-policy">Safety Policy</a></p>
                                </address>
                            </div>
                            <div class="col-sm-2">
                                <address>
                                    <p><strong>Connect</strong></p>
                                    <p><a href="<?=base_url()?>pinch/about-taskpinch">About Taskpinch</a></p>
                                    <p><a href="<?=base_url()?>pinch/team">Our Team</a></p>
                                    <p><a href="<?=base_url()?>pinch/contact-taskpinch">Contact Us</a></p>
                                    <p><a href="<?=base_url()?>pinch/feedback">Feedback</a></p>
                                    <p><a href="<?=base_url()?>pinch/share">Share a Link</a></p>
                                    <p><a href="<?=base_url()?>pinch/ads-request">Advertise with Us</a></p>
                                </address>
                            </div>
							<div class="col-sm-2">
                                <address>
                                    <p><strong>Follow Us</strong></p>
                                    <p><i class="icon-facebook"></i> <a href="http://facebook.com/taskpinch" target="_blank">Facebook</a></p>
                                    <p><i class="icon-twitter"></i> <a href="https://twitter.com/taskpinch" target="_blank">Twitter</a></p>
                                    <!--<p><i class="icon-gplus"></i> <a href="">Google Plus</a></p>-->
                                    <p><i class="icon-pinterest"></i> <a href="http://www.pinterest.com/taskpinch" target="_blank">Pinterest</a></p>
                                    <p><i class="icon-linkedin"></i> <a href="https://www.linkedin.com/company/taskpinch" target="_blank">Linkedin</a></p>
                                </address>
                            </div>
							<div class="col-sm-3">
                                <address>
                                    <p><i class="icon-home"></i> Taskpinch.com <br />
																&nbsp;  &nbsp;  &nbsp;  &nbsp;#11/1. Azaad Nagar, <br />
																&nbsp;  &nbsp;  &nbsp;  &nbsp;Bangalore - 560026<br />
																&nbsp;  &nbsp;  &nbsp;  &nbsp;India.</p>
                                    <p><i class="icon-mobile"></i> Contact:  +91 99169 61639<br />
                                    <p><i class="icon-mail"></i> Email:  <a href="mailto:support@taskpinch.com">support@taskpinch.com</a></p>
                                </address>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
            <!-- end Contact -->
            <div class="bottom-foot">
                <p>
					© 2014 Taskpinch.com. All rights reserved. By <a href="http://www.taskpinch.com" target="_blank">http://www.taskpinch.com</a>
					<?php 
						$this->benchmark->mark('code_end');
						echo ' | Page render time : ' . $this->benchmark->elapsed_time('code_start', 'code_end');
					?>
				</p>
            </div>
        </footer>
        <!-- end Footer --> 
		<a href="<?=base_url()?>pinch/feedback"><img class="envato-widget" src="<?=base_url().SITETHEME?>images/feedback.png" alt="Feedback"></a>
        <a style="display: none;" href="javascript:void(0)" class="scrollup"><i class="icon-up-open"></i></a>
		<!--
			Designed and Developed By : Sunil
			Email : khandade.sunil@gmail.com
		-->
        <!-- ======================= JQuery libs =========================== -->
        <!-- jQuery -->
		<script src="<?=base_url().SITETHEME?>js/jquery-1.8.0.min.js"></script>
		<script src="<?=base_url().SITETHEME?>js/jquery-migrate-1.0.0.js"></script>
        <!-- Bootstrap-->
        <script src="<?=base_url().SITETHEME?>js/bootstrap.js"></script>
        <!-- Nicescroll -->
        <script src="<?=base_url().SITETHEME?>js/jquery_004.js"></script>
        <!-- Custom -->
        <script src="<?=base_url().SITETHEME?>js/script.js"></script>
		<!-- Validation -->
		<script src="<?=base_url().SITETHEME?>js/validation.js"></script>
		<!-- Colorbox -->
		<script src="<?=base_url().SITETHEME?>js/jquery.colorbox.js"></script>
		<script type="text/javascript" src="<?=base_url().SITETHEME?>js/jquery.js"></script>
		<script type="text/javascript" src="<?=base_url().SITETHEME?>js/jquery.autocomplete.js"></script>
		<script>
			$(document).ready(function(){
				$("#loginpopup, #reg_loginpopup, #forgot_loginpopup, #postajob_loginpopup, #offerapinch_loginpopup, #postajob_forgot_loginpopup").colorbox({inline:true, width:'30%'});
				$("#registerpopup, #postajob_registerpopup, #update_profile").colorbox({inline:true, width:'30%'});
				$("#forgotpopup, #postajob_forgotpopup").colorbox({inline:true, width:'30%'});
				$("#offerapinch_contactpopup").colorbox({inline:true, width:'30%'});
				$("#testimonials_link, #bid_now, #about_me_popup, #skills_popup, #change_password").colorbox({inline:true, width:'30%'});
				$("#closejob").colorbox({inline:true, width:'35%'});
				$("#howpinch, #howjob").colorbox({inline:true, width:'35%'});
				
				$(".form.login_form").validate({
					rules: {
						login_email: {required: true,email: true},
						login_pass: {required: true,minlength: 5}
					},
					highlight: function(element, errorClass) {$(element).css({ borderColor: '#FF0000' });},
					unhighlight: function(element, errorClass, validClass) {$(element).css({ borderColor: '#CCCCCC' });},
					errorPlacement: function(error, element) {
						if (element.attr("type") == "radio" || element.attr("type") == "checkbox") {
							$(element).css("outline", "1px solid red");
						} else{
							$.validator.messages.required = '';
						}
					},
					invalidHandler: function(form, validator) {},
					submitHandler: function (form) {
						$.ajax({
							type: "POST",
							url: "<?=base_url()?>user/user_login",
							data: {
								email : $('#login_email').val(),
								pass : $('#login_pass').val()
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
				
				$(".form.reg_form").validate({
					rules: {
						reg_first_name: {required: true,minlength: 3},
						reg_last_name: {required: true,minlength: 3},
						reg_contact: {required: true,number: true, minlength: 10, maxlength: 10},
						reg_email: {required: true,email: true, 
								remote: {
											url: "<?=base_url()?>user/check_email",
											type: "post",
											data: {reg_email: function(){ return $("#reg_email").val(); }}
										}
						},
						reg_pass: {required: true,minlength: 5},
						/*reg_conf_pass: {required: true,equalTo: "#reg_pass",minlength: 5},*/
						'reg_gender': {required: true},
						reg_terms_page: {required: true}
					},
					highlight: function(element, errorClass) {$(element).css({ borderColor: '#FF0000' });},
					unhighlight: function(element, errorClass, validClass) {$(element).css({ borderColor: '#CCCCCC' });},
					errorPlacement: function(error, element) {
						if (element.attr("type") == "radio" || element.attr("type") == "checkbox") {
							$(element).css("outline", "1px solid red");
						} else{
							$.validator.messages.required = '';
						}
					},
					invalidHandler: function(form, validator) {},
					submitHandler: function (form) {
						var gender = $('input[name=reg_gender]:checked').val()
						$.ajax({
							type: "POST",
							url: "<?=base_url()?>user/user_register",
							data: {
								first_name : $('#reg_first_name').val(),
								last_name : $('#reg_last_name').val(),
								contact : $('#reg_contact').val(),
								email : $('#reg_email').val(),
								pass : $('#reg_pass').val(),
								/*conf_pass : $('#reg_conf_pass').val(),*/
								gender : gender
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
				
				$(".form.postajob_form").validate({
					rules: {
						postajob_first_name: {required: true,minlength: 3},
						postajob_last_name: {required: true,minlength: 3},
						postajob_contact: {required: true,number: true, minlength: 10, maxlength: 10},
						postajob_email: {required: true,email: true, 
								remote: {
											url: "<?=base_url()?>user/check_email",
											type: "post",
											data: {reg_email: function(){ return $("#postajob_email").val(); }}
										}
						},
						postajob_pass: {required: true,minlength: 5},
						/*postajob_conf_pass: {required: true,equalTo: "#postajob_pass",minlength: 5},*/
						'postajob_gender': {required: true},
						post_terms_page: {required: true}
					},
					highlight: function(element, errorClass) {$(element).css({ borderColor: '#FF0000' });},
					unhighlight: function(element, errorClass, validClass) {$(element).css({ borderColor: '#CCCCCC' });},
					errorPlacement: function(error, element) {
						if (element.attr("type") == "radio" || element.attr("type") == "checkbox") {
							$(element).css("outline", "1px solid red");
						} else{
							$.validator.messages.required = '';
						}
					},
					invalidHandler: function(form, validator) {},
					submitHandler: function (form) {
						var gender = $('input[name=postajob_gender]:checked').val()
						$.ajax({
							type: "POST",
							url: "<?=base_url()?>user/user_register",
							data: {
								first_name : $('#postajob_first_name').val(),
								last_name : $('#postajob_last_name').val(),
								contact : $('#postajob_contact').val(),
								email : $('#postajob_email').val(),
								pass : $('#postajob_pass').val(),
								/*conf_pass : $('#postajob_conf_pass').val(),*/
								gender : gender
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
				
				$(".form.forgot_form").validate({
					rules: {
						forgot_email: {required: true,email: true, 
								remote: {
											url: "<?=base_url()?>user/check_email_forgot",
											type: "post",
											data: {forgot_email: function(){ return $("#forgot_email").val(); }}
										}
						},
					},
					highlight: function(element, errorClass) {$(element).css({ borderColor: '#FF0000' });},
					unhighlight: function(element, errorClass, validClass) {$(element).css({ borderColor: '#CCCCCC' });},
					errorPlacement: function(error, element) {$.validator.messages.required = '';},
					invalidHandler: function(form, validator) {},
					submitHandler: function (form) {
						$.ajax({
							type: "POST",
							url: "<?=base_url()?>user/password_reset_link",
							data: {
								forgot_email : $('#forgot_email').val()
							},
							success: function(data) {
								var response = jQuery.parseJSON(data);
								if(response.status != 'error'){
									$('.status_msg').html("<div class='success'>"+ response.msg +"</div>");
									setInterval("window.location.href = '<?=base_url()?>user/login';", 2000);
								}else{
									$('.status_msg').html("<div class='failure'>"+ response.msg +"</div>");
								}
							}
						});
						return false;
					}
				});
				
				$(".form.postajob_forgot_form").validate({
					rules: {
						postajob_forgot_email: {required: true,email: true, 
								remote: {
											url: "<?=base_url()?>user/check_email_forgot",
											type: "post",
											data: {forgot_email: function(){ return $("#postajob_forgot_email").val(); }}
										}
						},
					},
					highlight: function(element, errorClass) {$(element).css({ borderColor: '#FF0000' });},
					unhighlight: function(element, errorClass, validClass) {$(element).css({ borderColor: '#CCCCCC' });},
					errorPlacement: function(error, element) {$.validator.messages.required = '';},
					invalidHandler: function(form, validator) {},
					submitHandler: function (form) {
						$.ajax({
							type: "POST",
							url: "<?=base_url()?>user/password_reset_link",
							data: {
								forgot_email : $('#postajob_forgot_email').val()
							},
							success: function(data) {
								var response = jQuery.parseJSON(data);
								if(response.status != 'error'){
									$('.status_msg').html("<div class='success'>"+ response.msg +"</div>");
									setInterval("window.location.href = '<?=base_url()?>user/login';", 2000);
								}else{
									$('.status_msg').html("<div class='failure'>"+ response.msg +"</div>");
								}
							}
						});
						return false;
					}
				});
				
				$(".form.offerapinch_login_form").validate({
					rules: {
						postajob_login_email: {required: true,email: true},
						postajob_login_pass: {required: true,minlength: 5}
					},
					highlight: function(element, errorClass) {$(element).css({ borderColor: '#FF0000' });},
					unhighlight: function(element, errorClass, validClass) {$(element).css({ borderColor: '#CCCCCC' });},
					errorPlacement: function(error, element) {$.validator.messages.required = '';},
					invalidHandler: function(form, validator) {},
					submitHandler: function (form) {
						$.ajax({
							type: "POST",
							url: "<?=base_url()?>user/user_login",
							data: {
								email : $('#offerapinch_login_email').val(),
								pass : $('#offerapinch_login_pass').val()
							},
							success: function(data) {
								var response = jQuery.parseJSON(data);
								if(response.status != 'error'){
									$('.status_msg').html("<div class='success'>"+ response.msg +"</div>");
									if(response.user_status != 'Pinch2'){
										setInterval("window.location.href = '<?=base_url()?>pinch/premium-membership';", 2000);
									}else{
										setInterval("window.location.href = '<?=base_url()?>task/offer-a-pinch';", 2000);
									}	
								}else{
									$('.status_msg').html("<div class='failure'>"+ response.msg +"</div>");
								}
							}
						});
						return false;
					}
				});
				
				$(".form.postajob_login_form").validate({
					rules: {
						postajob_login_email: {required: true,email: true},
						postajob_login_pass: {required: true,minlength: 5}
					},
					highlight: function(element, errorClass) {$(element).css({ borderColor: '#FF0000' });},
					unhighlight: function(element, errorClass, validClass) {$(element).css({ borderColor: '#CCCCCC' });},
					errorPlacement: function(error, element) {$.validator.messages.required = '';},
					invalidHandler: function(form, validator) {},
					submitHandler: function (form) {
						$.ajax({
							type: "POST",
							url: "<?=base_url()?>user/user_login",
							data: {
								email : $('#postajob_login_email').val(),
								pass : $('#postajob_login_pass').val()
							},
							success: function(data) {
								var response = jQuery.parseJSON(data);
								if(response.status != 'error'){
									$('.status_msg').html("<div class='success'>"+ response.msg +"</div>");
									setInterval("window.location.href = '<?=base_url()?>task/post-a-job';", 2000);
								}else{
									$('.status_msg').html("<div class='failure'>"+ response.msg +"</div>");
								}
							}
						});
						return false;
					}
				});
			});
			jQuery(document).ready(function($){
				$(".notification-close-info").click(function(){
					$(".notification-box-info").fadeOut("slow");return false;
				});
				$(".notification-close-success").click(function(){
					$(".notification-box-success").fadeOut("slow");return false;
				});
				$(".notification-close-warning").click(function(){
					$(".notification-box-warning").fadeOut("slow");return false;
				});
				$(".notification-close-error").click(function(){
					$(".notification-box-error").fadeOut("slow");return false;
				});
			});
		</script>
		<script type="text/javascript">
			function findValue(li) {
				if( li == null ) return alert("No match!");
				if( !!li.extra ) var sValue = li.extra[0];
				else var sValue = li.selectValue;
			}
			function selectItem(li) {findValue(li);}
			function formatItem(row) {return '<div style="width:40px;height:35px;border:1px solid;float:left;margin-right:5px;"><img src="<?=base_url().SITETHEME?>/images/'+ row[3] +'.jpg" width="38" height="33"></div><span style="color:#5bc506;">'+row[0] + "</span><strong><div style='margin-right:10px;float:right;'>"+ row[2] +"</div></strong><br /> " + row[1];}
			$("#searchid").autocomplete(
				"<?=base_url()?>task/search_suggest",
				{
					delay:1,
					minChars:2,
					matchSubset:1,
					matchContains:1,
					cacheLength:10,
					onItemSelect:selectItem,
					onFindValue:findValue,
					formatItem:formatItem,
					autoFill:false
				}
			);
		  
		</script>
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
        <!-- ======================= End JQuery libs ======================= -->
        <div style="height: 15px; z-index: 99999; background: none repeat scroll 0% 0% rgb(204, 204, 204); position: fixed; left: 0px; width: 100%; bottom: 0px; opacity: 1; cursor: default; display: none;" class="nicescroll-rails" id="ascrail2000-hr">
            <div style="position: relative; top: 0px; height: 15px; width: 1280px; background-color: rgb(82, 193, 186); border: 1px solid rgb(82, 193, 186); background-clip: padding-box; border-radius: 5px 5px 5px 5px; left: 0px;"></div>
        </div>