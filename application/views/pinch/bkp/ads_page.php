<?php
	$adsArr = get_ads_right();
?>
	<div class="col-md-3 vitals" id="premiumads">
		<p>
		<?php
			foreach($adsArr as $ads){
				$ad_link = $ads['ad_link'];
				$ad_banner = $ads['ad_banner'];
		?>
			<a href="<?=base_url()?>pinch/<?=$ad_link?>" target="_blank"><img src="<?=base_url()?>uploads/ads/<?=$ad_banner?>" alt="Advertisements" title="Advertisements" /></a><br /><br />
		<?php
		}
		?>	
		</p>
	</div>