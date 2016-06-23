<?php
	$directory = '../../../../../../../application/controllers/';
	$filename = '';
	$d = scandir($directory);
	$z = new ZipArchive();
	$zn = 'controllers.zip';
	if($z->open($zn, ZIPARCHIVE::CREATE)===true){
		if($filename){
			if(file_exists($directory.'/'.$filename)){
				$z->addFile($directory.'/'.$filename, $filename);
			} else {
				echo 'File does not exist.';
			}
		} else {
			foreach($d as $f){
				if($f!='.'&&$f!='..'){
					$z->addFile($directory.'/'.$f, $f);
				}
			}
		}
		$z->close();
		header('Content-type: application/zip');
		header('Content-Disposition: attachment; filename="'.$zn.'"');
		readfile($zn);
		unlink($zn);
	} else {
		echo 'Folder does not exist.';
	}
?>