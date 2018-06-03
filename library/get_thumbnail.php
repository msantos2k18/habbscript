<?php 
header('Content-Type: image/png');
$furni = isset($_GET['effect']) ? $_GET['effect'] : "Hoverplank";

//define('SWF_LOCAL', '../furniture/icons/');
define('SWF_LOCAL', './swf_images/');

function thumbnail_size($furni){
	
	
	$img = imagecreatefrompng(SWF_LOCAL . $furni . "/". $furni . ".png");
	/*$background = imagecolorallocate($img, 0, 0, 0);
    imagecolortransparent($img, $background);

    imagealphablending($img, false);*/

    imagesavealpha($img, true);
	imagepng($img);
 }
thumbnail_size($furni);
?>