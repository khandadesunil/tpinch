<?php
	$bin_string = base64_encode(file_get_contents('logo.png'));
	$data = mysql_real_escape_string($bin_string);
	//echo $data;
	echo '<img src="data:image/png;base64,' . $data . '" />';
?>