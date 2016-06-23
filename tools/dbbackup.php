<?php
	database_backup('localhost','root','','taskpinch', '*');

	function database_backup($host,$user,$pass,$name,$tables = '*'){
		$link = mysql_connect($host,$user,$pass);
		mysql_select_db($name,$link);
		//get all of the tables
		if($tables == '*'){
			$tables = array();
			$result = mysql_query('SHOW TABLES');
			while($row = mysql_fetch_row($result)){
				$tables[] = $row[0];
			}
		}
		else{
			$tables = is_array($tables) ? $tables : explode(',',$tables);
		}

		$return = '';
		foreach($tables as $table){
			$result = mysql_query('SELECT * FROM '.$table);
			$num_fields = mysql_num_fields($result);
			
			// Below code is used to take full database backup with structure. Keep this commented for only data backup
			// $return.= 'DROP TABLE '.$table.';';
			// $row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
			// $return.= "\n\n".$row2[1].";\n\n";
			
			for ($i = 0; $i < $num_fields; $i++){
				while($row = mysql_fetch_row($result)){
					$return.= 'INSERT INTO '.$table.' VALUES(';
					for($j=0; $j<$num_fields; $j++){
						$row[$j] = addslashes($row[$j]);
						//$row[$j] = ereg_replace("\n","\\n",$row[$j]);
						if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
						if ($j<($num_fields-1)) { $return.= ','; }
					}
					$return.= ");\n";
				}
			}
			echo $table. " backup successfull!<br />";
		}
		
		//save file
		$file_name = '../database/backup/db-backup-'.date('dmYHis').'-'.(md5(time())).'.sql';
		
		$to = 'khandade.sunil@gmail.com';
		$message = 'Dear Sunil,<br /><br />';
		$message .= 'Taskpinch Database backup is done successfully on '.date('d-m-Y H:i:s').'.<br /><br /><br /><br />';
		$message .= 'Thanks & Regards,<br />Taskpinch<br />';
		
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= "From:Taskpinch <support@taskpinch.com>\r\n";
		$headers .= 'Cc:khandade.sunil@gmail.com' . "\r\n";
		$subject = 'Daily Database Backup';

		//$to = $row_emp['email'];
		mail($to, $subject, $message, $headers);
		
		$handle = fopen($file_name, 'w+');
		fwrite($handle,$return);
		fclose($handle);
	}