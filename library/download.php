<?php 
define('BADGE_LOCAL', dirname(__FILE__) . "/badges/");
define('VISUAL_LOCAL', dirname(__FILE__) . "/visuais/");
define('EF_LOCAL', dirname(__FILE__) . "/effects/");

$t = isset($_GET['t']) ? $_GET['t'] : 'badge';
$code = $_GET['code'];

if($t == 'badge') {
	if(file_exists(BADGE_LOCAL . $code . '.gif')){
		$size = filesize(BADGE_LOCAL . $code . '.gif');
		
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename=' . $code . '.gif'); 
		header('Content-Transfer-Encoding: binary');
		header('Connection: Keep-Alive');
		header('Expires: 0');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Pragma: public');
		header('Content-Length: ' . $size);
		readfile(BADGE_LOCAL . $code . '.gif'); //Absolute URL

	} else {
		die('Arquivo não encontrado');
	}
} else if($t == "visual") {
	if(file_exists(VISUAL_LOCAL . $code . '.swf')){
		$size = filesize(VISUAL_LOCAL . $code . '.swf');
		
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename=' . $code . '.swf'); 
		header('Content-Transfer-Encoding: binary');
		header('Connection: Keep-Alive');
		header('Expires: 0');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Pragma: public');
		header('Content-Length: ' . $size);
		readfile(VISUAL_LOCAL . $code . '.swf'); //Absolute URL

	} else {
		die('Arquivo não encontrado');
	}
} else if($t == 'efeito'){
	if(file_exists(EF_LOCAL . $code . '.swf')){
		$size = filesize(EF_LOCAL . $code . '.swf');
		
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename=' . $code . '.swf'); 
		header('Content-Transfer-Encoding: binary');
		header('Connection: Keep-Alive');
		header('Expires: 0');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Pragma: public');
		header('Content-Length: ' . $size);
		readfile(EF_LOCAL . $code . '.swf'); //Absolute URL

	} else {
		die('Arquivo não encontrado');
	}
}
?>