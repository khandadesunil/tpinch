<?php
    require_once 'db_connection_file.php';
		
	$table = array();
	$table[1] = 'ads_request';
	$table[2] = 'email_log';
	$table[3] = 'feedback';
	$table[4] = 'job';
	$table[5] = 'job_bid';
	$table[6] = 'share_link';
	$table[7] = 'user';
	$table[8] = 'user_badges';
	$table[9] = 'user_likes';
	$table[10] = 'user_rating';
	$table[11] = 'user_session';
	$table[12] = 'user_subscription';
	$table[13] = 'user_testimonials';

	for($i = 1; $i <= count($table); $i++){
		$truncate = "truncate $table[$i]";
		$res = mysql_query($truncate);
		if($res){
			echo '<span style="color:green"><strong>'.$table[$i].'</strong></span> table data deleted!<br />';
		}else{
			echo '<span style="color:red"><strong>'.$table[$i].'</strong></span> table data could not delete!<br />';
		}
	}
?>