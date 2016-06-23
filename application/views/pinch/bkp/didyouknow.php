<?php
	$resArr = didyouknow();
?>
	<div class="title">Did you Know?</div>
	<div class="cont-list">
		<ul style="text-align:left; padding-left:5px;font-size:12px;">
			<li><i class="icon-check"></i> There are <strong><?=$resArr['user_count']?></strong> registerd users</li>
			<li><i class="icon-check"></i> There are <strong><?=$resArr['job_count']?></strong> jobs are posted</li>
			<li><i class="icon-check"></i> There are <strong><?=$resArr['pinch_count']?></strong> services offered</li>
			<li><i class="icon-check"></i> There are total <strong><?=$resArr['bid_count']?></strong> bids</li>
			<li><i class="icon-check"></i> There are <strong><?=$resArr['feedback_count']?></strong> user's feedback we received</li>
			<li class="last"><i class="icon-check"></i> There are <strong>184</strong> jobs/services categories available</li>
		</ul>
	</div>
	<div class="ordernow"></div>