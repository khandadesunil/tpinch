<?php
	require_once 'header.php';
?>
<!DOCTYPE html>
<html style="overflow: hidden;" class=" js no-touch cssanimations">
    <head>
        <!-- Define Charset -->
        <meta charset="utf-8">
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta name="keywords" content="Keywords, Keywords">
		<meta name="description" content="Description. Description">
		<!-- Responsive Metatag -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9" />
        <!-- Page Title -->
        <title>Search | <?=SITETITLE?></title>
<?php
	require_once 'header_menu.php';
?>
	<article class="featured">
		<div class="container">
			<div class="row">
				<div class="row">
					<form class="form search_pinch_form" id="search_pinch_form" action="<?=base_url()?>pinch/search?search=<?=$search?>" method="POST">
						<div class="col-md-12">&nbsp;</div>
						<div style="height:55px;width:100%;float:left;padding-left:10px;padding-top:10px;background-color:#888;">
							<!--<select name="" class="search_text" style="width:12%;margin-right:10px;">
								<option value="">All</option>
								<option value="jobs">Tasks</option>
								<option value="services">Services</option>
							</select>-->
							<input type="text" class="search_text" name="search" id="searchid" placeholder="Search tasks, experts etc.." value="<?=str_replace("...", "", $search)?>" style="width:79%">
							<input type="submit" class="search_btn" name="search_btn" value="Search" style="width:19%;height:35px;margin-right:10px;font-size:20px;">
						</div>
					</form>
				</div>
				<div class="title">
					<div class="centered">
						<div>
							<h2>Search Results : <?=count($jobs)?> Record(s) found</h2>
						</div>
					</div>
				</div>				
				<div class="col-md-9">
					<div class="grid">
						<ul class="jobslist">
						<?php
							foreach($jobs as $job){
								$sep_title = '';
								$sep_desc = '';
								if(strlen($job['title']) > TITLELIMIT)
									$sep_title = '...';
								$title = substr($job['title'], 0, TITLELIMIT). $sep_title;
								
								if(strlen($job['description']) > DESCLIMIT)
									$sep_desc = '...';
								$description = substr($job['description'], 0, DESCLIMIT).$sep_desc;
								$now = time();
								$your_date = strtotime($job['created_date']);
								$datediff = $now - $your_date;
								$days = floor($datediff/(60*60*24));
								$latest = '';
								
								if($job['parent_cat_id'] == 0)
									$cat_id = $job['job_cat_id'];
								else
									$cat_id = $job['parent_cat_id'];
									
								if($days < 7)
									$latest = '<span class="tag sale"><span>new!</span></span>';
						?>
							<li class="male top" id="<?=$job['job_id']?>" style="width:256px;height:215px;margin:6px;">
								<a href="<?=base_url().'task/task-details/'.$job['job_id'].'/'.url_title($job['title'],'-', true)?>" title="Click here to see more details" style="width:256px;height:215px;">
									<div class="more">
										<i class="icon-search pull-right"></i>
										<span class="price">&#x20B9; <?=$job['budget']?></span>
										<span class="wks" style="font-size:0.9em;line-height:20px;"><?=$title?></span>
										<span class="txt"><?=$description?></span>
									</div>
									<?=$latest?>
									<img src="<?=base_url().SITETHEME?>images/<?=$cat_id?>.jpg" alt="Recently posted Tasks" style="border-radius:0px;">
									<span class="name" style="color:#CD4E0E;font-size:0.9em;line-height:20px;">
										<?=$title?>
										<p>Posted by : <?=$job['first_name']?><i class="icon-dot"></i> Price : &#x20B9; <?=$job['budget']?></p>
									</span>
								</a>
							</li>
						<?php
						}
						?>
						</ul>
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