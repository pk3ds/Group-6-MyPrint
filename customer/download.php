<?php
	$file = basename($_GET['file']);
	switch($_GET['ID']){
	case 6:
		$file = 'product/Product_Template/poster/'.$file;
		break;
	case 5:
		$file = 'product/Product_Template/namecard/'.$file;
		break;
	case 4:
		$file = 'product/Product_Template/calendar/'.$file;
		break;
	case 2:
		$file = 'product/Product_Template/banner/'.$file;
		break;
	case 1:
		$file = 'product/Product_Template/A4/'.$file;
		break;
	}
	
	if(!file_exists($file)){ // file does not exist
		die('file not found');
	} else {
		header("Cache-Control: public");
		header("Content-Description: File Transfer");
		header("Content-Disposition: attachment; filename=$file");
		header("Content-Type: application/zip");
		header("Content-Transfer-Encoding: binary");

		// read the file from disk
		readfile($file);
	}
?>