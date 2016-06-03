<?php
if(!defined('UPLOAD_PATH'))define('UPLOAD_PATH', './uploads/reference');

//random char
function generateString ($length = 8)
{
	// mulai dengan string kosong
	$v_string = "";
	
	// definisikan karakter-karakter yang diperbolehkan
	$possible = "0123456789bcdfghjkmnpqrstvwxyz"; 
	
	// set up sebuah counter
	$i = 0; 
	
	// tambahkan karakter acak ke $v_string sampai $length tercapai
	while ($i < $length) { 
	  // ambil sebuah karakter acak dari beberapa
	  // kemungkinan yang sudah ditentukan tadi
	  $char = substr($possible, mt_rand(0, strlen($possible)-1), 1);
	
	  // kami tidak ingin karakter ini jika sudah ada pada string
	  if (!strstr($v_string, $char)) { 
		$v_string .= $char;
		$i++;
	  }
	}
	return $v_string;
}

function upload_file($file, $filetype){
	$name = "";
	$move = "";
	
	
		$today = TODAY . rand(0,1000);
		//echo $today;
		switch($filetype){
			case 'application/msword':
				$name = $today . ".doc";
				break;
			case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document':
				$name = $today . ".docx";
				break;
			case 'application/pdf':
				$name = $today . ".pdf";
				break;
		}
		if($name != "") $move = move_uploaded_file($file['tmp_name'], UPLOAD_PATH .'/'. $name);
		// echo $move;
		// die();
		//echo $_SERVER['PHP_SELF']; 
		//echo "FOO";						
		if($move == 1){
			return $name;
		}
		else{
			$name = '';
			return $name;
			// echo "Cannot upload file";
			// die();
		}

	return '';
}



//validate mimitype
function get_mimetype($file)
{
	if (function_exists('finfo_open')) {
		$finfo = finfo_open(FILEINFO_MIME_TYPE); // return mime type ala mimetype extension

		return finfo_file($finfo, $file['tmp_name']);
	} else {
		//return exif_imagetype($file);
		return $file['type'];
	}
}

function validation_file($file){
	$permit = array('application/msword','application/vnd.openxmlformats-officedocument.wordprocessingml.document','application/pdf');

	if(!in_array(get_mimetype($file), $permit) || $file['size'] > (2*1024*1024) ){
		return false;
	}
	else{
		return true;
	}
}
//alert
function warning($msg)
{
   echo "<SCRIPT>alert(\"WARNING: $msg\");history.go(-1)</SCRIPT>";
   exit;
}
function shorten($msg,$limit){
	if (strlen($msg) > $limit){
		$potong = substr($msg, 0, strrpos(substr($msg, 0, $limit), ' ')) . ' ...';
		return $potong;
	} else { 
		return $msg;
	}
}
?>