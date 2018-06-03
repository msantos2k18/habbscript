<?php
$cat = $_GET['cat'];
if(!isset($cat)) {
	die('No category found!');
}
$ano_atual = date('y', time());
$ano_anterior = $ano_atual - 1;

$categorias = array("easter_c$ano_anterior", "easter_c$ano_atual", "xmas_c$ano_anterior", "xmas_c$ano_atual", "val_c$ano_anterior", "val_c$ano_atual", "hween_c$ano_anterior", "hween_c$ano_atual", "easter_r$ano_anterior", "easter_r$ano_atual", "xmas_r$ano_anterior", "xmas_r$ano_atual", "val_r$ano_anterior", "val_r$ano_atual", "hween_r$ano_anterior", "hween_r$ano_atual", 'china');


if(!in_array($cat, $categorias)){
	echo "<script>window.history.back();</script>";
	return false;
}
	
 function Compacta($zip, $cwd, $cat) {
		$newcat = str_replace('c', 'r', $cat);
        $open = opendir($cwd);
        while($folder = readdir($open))
        {
            if ($folder != '.' && $folder != '..'){	

					if (is_dir($cwd.'/'.$folder))
					{
						$dir = str_replace('./', '',($cwd.'/'.$folder));
						$zip->addEmptyDir($dir);
						Compacta($zip, $dir, $cat);
						
					}
					elseif (is_file($cwd.'/'.$folder) && preg_match("/$cat/", $folder) || preg_match("/$newcat/", $folder))
					{
								$arq = str_replace('./', '',$cwd.'/'.$folder);                  
								$zip->addFile($arq);   
									
						}						
					}
					
				}
            }
 
    $zip = new ZipArchive();
	
	$nome = "Generated_SQLs_$cat.zip";	
	$newname = './downloads/'.$nome;

	
   if ($zip->open("./downloads/$nome", ZIPARCHIVE::CREATE) === true){
	
	if(file_exists($nome)){
		header('Content-Description: File Transfer');
		header('Content-Disposition: attachment; filename="'.$nome.'"');
		header('Content-Type: application/octet-stream');
		header('Content-Transfer-Encoding: binary');
		header('Content-Length: ' . filesize($nome));
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Pragma: public');
		header('Expires: 0');
		readfile($nome);
	} else {
		Compacta($zip, "furniture", $cat)
		header('Content-Description: File Transfer');
		header('Content-Disposition: attachment; filename="'.$newname.'"');
		header('Content-Type: application/octet-stream');
		header('Content-Transfer-Encoding: binary');
		header('Content-Length: ' . filesize($newname));
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Pragma: public');
		header('Expires: 0');
		readfile($newname);
	}
}
    $zip->close();
	
?>