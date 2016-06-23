<?php
	require_once 'db_connection_file.php';
	
	$action = isset($_REQUEST['upload_data']) ? $_REQUEST['upload_data'] : '';
	if($action == 'Start Upload'){
		$file_name = $_FILES['upload_data']['tmp_name'];
		if($file_name){
			$csv_data = array();
			$data = array();
			$csv_data = file($file_name);
			for($ival = 0; $ival < count($csv_data); $ival++){
				$data[] = explode(',', $csv_data[$ival]);
			}			
			for($i = 1; $i < count($data); $i++){
				$rand_days = rand(3, 25);
				$date = "2014-05-28 12:00:55";
				$c_date[] = date('Y-m-d h:i:s', strtotime($date. " + $rand_days days"));
			}
			sort($c_date);
			foreach ($c_date as $key => $val) {
				$created[$key + 1] = $val;
			}

			//echo '<pre>';print_r($data);die;
			// For User Import
			/*for($i = 1; $i < count($data); $i++){
				$created_date = $created[$i];
				$email = trim($data[$i][0]);
				$pass = trim($data[$i][1]);
				$gender = trim($data[$i][2]);
				$fname = trim($data[$i][3]);
				$lname = trim($data[$i][4]);
				$contact = trim($data[$i][5]).$i;
				
				if($email != ''){
					$ins_user = "insert into user (created_date, email, password, gender, first_name, last_name, contact, status)
								values('".$created_date."', '".$email."', '".$pass."', '".$gender."', '".$fname."', '".$lname."', '".$contact."', 'Pinch2')";
					$res_user = mysql_query($ins_user);
					echo '<span style="color:green;">Loading row '. $i . '... Loaded successfully!!</span><br />';
				}else{
					echo '<span style="color:red;">Duplicate row!! Could not add row no. : '. $i . '</span><br />';
				}
			}*/
			
			// For Services Import
			/*for($i = 1; $i < count($data); $i++){
				$created_date = $created[$i];
				$title = trim(str_replace(';',',', $data[$i][0]));
				$desc = trim(str_replace(';',',', $data[$i][1]));
				$user_id = trim($data[$i][2]);
				$job_cat_id = trim($data[$i][3]);
				$city = trim(str_replace(';',',', $data[$i][4]));
				$area = trim(str_replace(';',',', $data[$i][5]));
				$pincode = trim($data[$i][6]);
				$budget = trim($data[$i][7]);
				
				if($title != ''){
					$ins_service = "insert into job (created_date, title, description, job_type, user_id, job_cat_id, city, area, pincode, budget, status)
								values('".$created_date."', '".$title."', '".$desc."', 'service', '".$user_id."', '".$job_cat_id."', '".$city."', '".$area."', '".$pincode."', '".$budget."', 'Active')";
					$res_service = mysql_query($ins_service);
					echo '<span style="color:green;">Loading row '. $i . '... Loaded successfully!!</span><br />';
				}else{
					echo '<span style="color:red;">Duplicate row!! Could not add row no. : '. $i . '</span><br />';
				}
			}*/
		}else{
			echo '<span style="color:red;">Please select the file to upload!</span><br />';
		}
	}	
?>
<html>
	<head>
		<title>Upload/Import Data</title>
	</head>
	<body>
		<form name="form1" action="" method="post" enctype="multipart/form-data">
			Upload File : 
			<input type="file" name="upload_data">
			<input type="submit" name="upload_data" value="Start Upload">
		</form>
		<a href="/healthcare_tools"><< Back</a>
	</body>
</html>