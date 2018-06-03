<?php 
$swf = $_POST['swf'];
define('SWF_LOCAL', './visuais/');
define('EF_LOCAL', './effects/');

function SWF_EXTRACT($name, $conf){
	$dir  = './swf_images/' . $name;
	//echo $conf;
	
	switch($conf) {
		case "effects":
			$habbo_dir = EF_LOCAL;
		break;
		case "visuais":
			$habbo_dir = SWF_LOCAL;
		break;
	}
	//$habbo_dir = $conf = 'effects' ? EF_LOCAL : SWF_LOCAL;
		
	if(file_exists($habbo_dir . $name . '.swf')){
		if(!is_dir($dir)){
			mkdir('./swf_images/' . $name, 0777);
		}
		
		shell_exec('swfextract --outputformat "swf_images/' . $name . '/' . $name .'%06d.%s" -a 1- '.$habbo_dir.'/'. $name .'.swf');
		
		echo 'Success, extracted';
		
		
		//rename('./output.png', "./$name.png");
	} else {
		die('>> NOT FOUND');
	}
}
SWF_EXTRACT($swf, 'effects');
?>