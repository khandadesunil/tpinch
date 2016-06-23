<?php
    require_once 'db_connection_file.php';
		
	$submit = isset($_REQUEST['submit']) ? $_REQUEST['submit'] : '';
	if($submit != ''){
		$table_name = isset($_REQUEST['table_name']) ? $_REQUEST['table_name'] : '';		
		if($table_name == 'job'){
			for($i = 1; $i <= 200; $i++){
				$insert = "INSERT INTO job (title, description, job_type, user_id, job_cat_id, city, area, pincode, budget, required_days, status) 
						VALUES ('Task Name Test ".$i."', 'Task Description Here. ".$i."', 'pinch', '1', '2', 'Bangalore', 'Mysore Road', '560026', '100".$i."', '10', 'Active');";
				$res = mysql_query($insert);
				echo $insert.'<br />';
			}
		}
	}
	
?>
<form name="form1" action="" method="get">
	Enter the table name <input type="text" name="table_name" id="table_name" value="">
	<input type="submit" name="submit" value="Submit">
</form>