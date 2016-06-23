<?php
	require_once 'header.php';
?>
<!DOCTYPE html>
<html style="overflow: hidden;" class=" js no-touch cssanimations">
    <head>
        <!-- Define Charset -->
        <meta charset="utf-8">
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta name="keywords" content="taskpinch questions, taskpinch help, help on jobs pinch, how to post a job on taskpinch, post a job on taskpinch, how to offer a pinch, taskpinch questions and answers">
		<meta name="description" content="Taskpinch.com - Your online market place! Have a question on your mind, checkout this. most of your confusions will resolve here.">
		<!-- Responsive Metatag -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9" />
		<script type="text/javascript" src="<?=base_url().SITETHEME?>js/faq.js" ></script>
		<style>
			p{text-align:justify;}
		</style>
        <!-- Page Title -->
        <title>FAQ | <?=SITETITLE?></title>
<?php
	require_once 'header_menu.php';
?>
	<!-- begin Featured Pooch -->
	<article class="featured">
		<div class="container">
			<div class="row">
				<div class="title">
					<div class="centered">
						<div>
							<h2>Frequently Asked Questions</h2>
						</div>
					</div>
				</div>				
				<div class="col-md-9">
					<div class="privacypolicy">
						<div class="mainhelppage" style="padding-right:20px;text-align:justify;">
							<div class="fk-faq-sec"><div class="unit fk-help-left"><a name="my-account-a-my-orders"></a><h2>The Idea</h2></div>
								<div class="lastUnit">
									<dl class="fk-faq-list">
										<a onclick="return fkToggleDisplay('dd1.1')" href="javascript:void(0);"><span class="style1">How Taskpinch.com works?</span></a><br>	
										<dd style="display: none;" id="dd1.1">
												Simply post a job or offer a pinch, members of the Taskpinch.com will bid for the job posted by you. You choose the best fit and get in touch with the person.
												In case of offering a pinch, You just need to offer the work which you can do and people will get in touch with if he/she liked it. that's all!!
										<p></p></dd><br />
										<a onclick="return fkToggleDisplay('dd1.2')" href="javascript:void(0);"><span class="style1">How safe is it?</span></a><br>
										<dd style="display:none;" id="dd1.2">Getting a stranger to do your job might seem a little strange. But don’t worry. It is our endeavour to ensure that every Taskpinch.com is just as serious about completing your job. We highly recommend that you meet the person in personal on safe place, get his/her qualification document and then only proceed with the work.
											We also recommend that, you ask for any valid ID card copy to be on safer side. If you find something unusual, kindly report to us  with his/her email id on <a href="mailto:support@taskpinch.com">support@taskpinch.com</a></dd><br />
										<a onclick="return fkToggleDisplay('dd1.3')" href="javascript:void(0);"><span class="style1">Data and Online Payment</span></a>
										<dd style="display:none;" id="dd1.3">Do not make any online payment to Anyone. In case of buying the premium membership on our portal is allowed and it is safe too.</dd>
									</dl>
								</div>
							</div>
							<div class="fk-faq-sec"><div class="unit fk-help-left"><a name="my-account-a-my-orders"></a><h2>Get Started</h2></div>
								<div class="lastUnit">
									<dl class="fk-faq-list">
										<a onclick="return fkToggleDisplay('dd2.1')" href="javascript:void(0);"><span class="style1">How to join Taskpinch.com?</span></a><br>
										<dd style="display:none;" id="dd2.1">Click on register menu on top of the screen, once you filled up the registration form and submitted it, we will send you the activation link to your mentioned email address. Just click on the link and get your profile activated.</dd><br />
										<a onclick="return fkToggleDisplay('dd2.2')" href="javascript:void(0);"><span class="style1">How to post a Task?</span></a><br>	
										<dd style="display:none;" id="dd2.2">If you are already a member, Please login and click on "Post a job" menu, Fill up the form and that's it.</dd><br />
										<a onclick="return fkToggleDisplay('dd2.3')" href="javascript:void(0);"><span class="style1">How to Offer a Pinch?</span></a><br>	
										<dd style="display:none;" id="dd2.3">If you are already a member, Please login and click on "Offer a Pinch" menu, Fill up the form and that's it.</dd>
									</dl>
								</div>
							</div>
							<div class="fk-faq-sec"><div class="unit fk-help-left"><a name="my-account-a-my-orders"></a><h2>We are hearing...</h2></div>
								<div class="lastUnit">
									<dl class="fk-faq-list">
										<a onclick="return fkToggleDisplay('dd3.1')" href="javascript:void(0);"><span class="style1">What if task is not done up to my satisfaction or not completed?</span></a><br>	
										<dd style="display:none;" id="dd3.1">If under some unfortunate circumstance, there is a disagreement between the 
											Jobposter and the Bidder, you can negotiate with each other and settle the issue. Taskpinch.com will not play any role in such a settlement. You should however, fill 
											in the feedback form for the Taskpinch.com with your relevant inputs. We will evaluate the transaction at our end and if the grievance is found to be genuine, we will take 
											appropriate action at our end to ensure that such instances do not repeat. We may even provide an additional opportunity to post a different job as a complimentary gesture 
											from our end. Going forward, we strongly urge Jobposter to be very specific when defining a Task to avoid any difference of Opinions. It is our experience that a well-defined job can 
											go a long way in not only getting the right kind of people for the Task but also ensuring that the job is done as per expectation of both parties. Please communicate your 
											expectation from the Taskpinch.com beforehand to avoid any ambiguity going forward.</dd><br />
										<a onclick="return fkToggleDisplay('dd3.2')" href="javascript:void(0);"><span class="style1">What if User did not arrive?</span></a><br />
										<dd style="display:none;" id="dd3.2">If under some unfortunate circumstance, the user does not show up, don’t worry. 
											Just fill up the feedback for the Taskpinch.com as a ‘No Show’ and there are different ways in which we can support you.
										</dd>
									</dl>
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
	<?php				
		$this->load->view('pinch/footer');
	?>
	</body>
</html>