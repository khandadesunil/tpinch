<?php
	// open the directory
	$dir = '../theme/site/idream//images/thumb/';
	//$dir = '../uploads/';
	$pathToImages = opendir( $dir );
	while (false !== ($fname = readdir( $pathToImages ))) {
		$file = $dir.$fname;
		echo $dir.$fname.'<br />';
		$im = @imagecreatefromjpeg($file); // original image
		@imagejpeg($im, $file, 90);
	}
?>