<?php
 function Compacta($zip, $cwd) {
        $open = opendir($cwd);
        while($folder = readdir($open))
        {
            if ($folder != '.' && $folder != '..'){
                if (is_dir($cwd.'/'.$folder))
                {
                    $dir = str_replace('./', '',($cwd.'/'.$folder));
                    $zip->addEmptyDir($dir);
                    Compacta($zip, $dir);
                }
                elseif (is_file($cwd.'/'.$folder))
                {
                    $arq = str_replace('./', '',$cwd.'/'.$folder);                  
                    $zip->addFile($arq);                                        
                }
            }
        }
    }

	
    $zip = new ZipArchive();
	
	$name = date('d-m');
	$nome = "HSCript_furniture_$name.zip";
	
    if ($zip->open("$nome", ZIPARCHIVE::CREATE) === true){
	
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
		Compacta($zip, "furniture");
		header('Content-Description: File Transfer');
		header('Content-Disposition: attachment; filename="'.$nome.'"');
		header('Content-Type: application/octet-stream');
		header('Content-Transfer-Encoding: binary');
		header('Content-Length: ' . filesize($nome));
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Pragma: public');
		header('Expires: 0');
		readfile($nome);
	}		
}
    $zip->close();
	
?>