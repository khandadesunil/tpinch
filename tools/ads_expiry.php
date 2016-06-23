<?php
	require_once 'db_connection_file.php';

	function dateDiff($start, $end) {
		$start_ts = strtotime($start);
		$end_ts = strtotime($end);
		$diff = $end_ts - $start_ts;
		return $diff / 86400;
	}
	
	$sel_sub = "SELECT * FROM ads WHERE status = 'Active'";
	$res_sub = mysql_query($sel_sub);
	while($row_sub = mysql_fetch_array($res_sub)){
		$now = date('y-m-d h:i:s');
		$ad_upto  = $row_sub['ad_upto'];
		$hrs_till = round(dateDiff($now, $ad_upto));
		if($hrs_till <= 0){
			$ads_id = $row_sub['ads_id'];
			$ad_email = $row_sub['ad_email'];
			$ad_from = $row_sub['ad_from'];
			$ad_upto = $row_sub['ad_upto'];
			
			$update_sub = "UPDATE ads SET status = 'Expired' WHERE ads_id = " . $ads_id;
			$res_update_sub = mysql_query($update_sub);
			
			$to = $ad_email;
			$subject = 'Your Ads Subscription has been Expired!';
			$message = 'Dear User, <br /><br /> Your ads subscription with details below is expired!<br /><br />';
			$message .= 'Ads Subscription from : '.$ad_from.'<br />';
			$message .= 'Ads Subscription upto : '.$ad_upto .'<br />';
			$message .= '<br /><br />Thank you,<br />Taskpinch Team';
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'From: Taskpinch <support@taskpinch.com>' . "\r\n";
			$headers .= 'Cc: khandade.sunil@gmail.com' . "\r\n";
			mail($to, $subject, $message, $headers);
		}
	}
?>