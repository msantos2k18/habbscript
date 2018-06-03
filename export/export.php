<?php 
$furni = $_GET['furni'];
$func = isset($_GET['func']) ? $_GET['func'] : "extract";
define('SWF_LOCAL', "./furni/$furni");

function remove_graphics($mobi){
	
	if($handle = opendir(SWF_LOCAL . '') ) {
		while ($entry = readdir($handle)) {
			
			$ext = array('bin');
			$extensao = pathinfo($entry, PATHINFO_EXTENSION);
			
			if(in_array($extensao, $ext)){

				$xml_2 = file_get_contents(SWF_LOCAL . "/$entry");
				
				if(preg_match('/<graphics>/', $xml_2)){
					$xml = simplexml_load_file(SWF_LOCAL . "/$entry");
					
					/*foreach($xml->library AS $furni) {
					}*/
					
					$xml_2 = str_replace(array('<graphics>', '</graphics>'), '', $xml_2);
					$ok = file_put_contents(SWF_LOCAL . "/$entry", $xml_2) or die('Error');
					
					echo "SWF graphics removing FROM $entry <br/>";
				}
				
				$c = explode('-', $entry);
				$c = preg_replace('/[A-Za-z.]/', '', $c);

				$f = shell_exec("swfbinreplace furni/$mobi/$mobi.swf $c[1] furni/$mobi/$entry");
				unlink(SWF_LOCAL . "/" . $entry);
				if($f) {echo 'SWF Graphics Removed';}	
				
			}		
		}
	}
	
}
if($func == 'remove') {
	remove_graphics($furni);
} else if($func == 'extract') {
	if(file_exists('./furni/'.$furni.'.swf')){
		$pasta = "./furni/$furni";
		if(!is_dir($pasta)){mkdir($pasta, 0777);}
		rename('./furni/'.$furni.'.swf', "./furni/$furni/$furni.swf");
		
		shell_exec("swfbinexport ./furni/$furni/$furni.swf");
		die("Extracted $furni");
	} else {
		die('Arquivo não existe.');
	}
}
?>