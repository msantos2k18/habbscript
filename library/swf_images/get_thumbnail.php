<?php 
header('Content-Type: image/png');
$c = isset($_GET['c']) ? $_GET['c'] : "shirt_U_heartdress";


function thumbnail_size($v){
	
	$img = imagecreatefrompng($v . "/shirt_U_heartdress000003.png");
	//$col_transparent = imagecolorallocatealpha($img, 0, 0, 0, 127);
	//imagefill($img, 0, 0, $col_transparent);  // set the transparent colour as the background.
	//imagecolortransparent ($img, $col_transparent); // actually make it transparent

	imagepng($img);

}
thumbnail_size($c);
?>