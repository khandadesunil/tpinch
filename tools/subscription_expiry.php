<?php
	require_once 'db_connection_file.php';

	function dateDiff($start, $end) {
		$start_ts = strtotime($start);
		$end_ts = strtotime($end);
		$diff = $end_ts - $start_ts;
		return $diff / 86400;
	}
	
	$sel_sub = "SELECT * FROM user_subscription WHERE status = 'Active'";
	$res_sub = mysql_query($sel_sub);
	//print_r(mysql_num_rows($res_sub));exit;
	while($row_sub = mysql_fetch_array($res_sub)){
		$now = date('y-m-d h:i:s');
		//$sub_to = date('y-m-d h:i:s', strtotime($row_sub['sub_to']));
		$sub_to  = $row_sub['sub_to'];
		$hrs_till = round(dateDiff($now, $sub_to));
		if($hrs_till <= 0){
			$user_id = $row_sub['user_id'];
			$sub_from = $row_sub['sub_from'];
			$sub_to = $row_sub['sub_to'];
			
			$update_sub = "UPDATE user_subscription SET status = 'Inactive' WHERE user_id = " . $user_id;
			$res_update_sub = mysql_query($update_sub);
			
			$sel_user = "SELECT * FROM user WHERE user_id = '".$user_id."'";
			$res_user = mysql_query($sel_user);
			$row_user = mysql_fetch_array($res_user);
			$first_name = $row_user['first_name'];
			$email = $row_user['email'];
			
			$to = $email;
			$subject = 'Your Subscription has been Expired!';
			$message = 'Dear '.$first_name.', <br /><br /> Your subscription with details below is expired!<br /><br />';
			$message .= 'Subscription from : '.$sub_from.'<br />';
			$message .= 'Subscription upto : '.$sub_to .'<br />';
			$message .= '<br /><br />Thank you,<br />Taskpinch Team';
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'From: Taskpinch <support@taskpinch.com>' . "\r\n";
			$headers .= 'Cc: khandade.sunil@gmail.com' . "\r\n";
			mail($to, $subject, $message, $headers);
		}
	}
?>