<?php 
require_once('config.php');

function sql($emulador = 'kash', $mobi, $save = false, $col = "xmas_c17_"){
	
	global $items_plus, $furni_plus, $items_kash, $furni_kash;
	list($name, $id) = $mobi;
	
	if(preg_match('/wall/', $name)){
		$tipo = "i";
	} else {
		$tipo = 's';
	}
	
	### plus ###
	
		// Catalog items
	$plus_items = str_replace(array('[id]', '[furnid]'), $id, $items_plus);
	$plus_items = str_replace('[pubname]', $name, $plus_items);
	
		//Furniture
	$plus_furni = str_replace(array('[id]', '[furnid]'), $id, $furni_plus);
	$plus_furni = str_replace('[pubname]', $name, $plus_furni);
	$plus_furni = str_replace('[type]', $tipo, $plus_furni);

	### kash ##
	
		// Catalog Items
	$kash_items = str_replace(array('[id]', '[furnid]'), $id, $items_kash);
	$kash_items = str_replace('[pubname]', $name, $kash_items);
	
		// items base
	$kash_furni = str_replace(array('[id]', '[furnid]'), $id, $furni_kash);
	$kash_furni = str_replace('[pubname]', $name, $kash_furni);
	$kash_furni = str_replace('[type]', $tipo, $kash_furni);
	

	if($emulador == "plus") {		
		 if($save == true){
			$arquivo = file_get_contents('../furniture/sqls/sql_plus.txt');
			if(preg_match("/$name/", $arquivo)){
				
			} else {
				$file = fopen('../furniture/sqls/sql_plus.txt', 'a+');
				fwrite($file, $plus_items.chr(13).chr(10).$plus_furni.chr(13).chr(10));
				fclose($file);
			}
		} else {
			echo $plus_items."\n";
			echo $plus_furni;
		}
	}else if($emulador == "kash") {
		
		 if($save == true){
			$arquivo = file_get_contents('../furniture/sqls/sql_kash.txt');
			if(preg_match("/$name/", $arquivo)){
				
			} else {
				$file = fopen('../furniture/sqls/sql_kash.txt', 'a+');
				fwrite($file, $kash_items.chr(13).chr(10).$kash_furni.chr(13).chr(10));
				fclose($file);
			}
		} else {
			echo $kash_items."\n";
			echo $kash_furni;
		}
		
	} else if($emulador == "comet") {
		echo 'Cooming soon';
	}				
}

function sql_e($emulador = 'kash', $mobi, $save = false, $col = "xmas_c17_"){
	
	global $items_plus, $furni_plus, $items_kash, $furni_kash;
	list($name, $id) = $mobi;
	
	if(preg_match('/wall/', $name)){
		$tipo = "i";
	} else {
		$tipo = 's';
	}
	
	### plus ###
	
		// Catalog items
	$plus_items = str_replace(array('[id]', '[furnid]'), $id, $items_plus);
	$plus_items = str_replace('[pubname]', $name, $plus_items);
	
		//Furniture
	$plus_furni = str_replace(array('[id]', '[furnid]'), $id, $furni_plus);
	$plus_furni = str_replace('[pubname]', $name, $plus_furni);
	$plus_furni = str_replace('[type]', $tipo, $plus_furni);

	### kash ##
	
		// Catalog Items
	$kash_items = str_replace(array('[id]', '[furnid]'), $id, $items_kash);
	$kash_items = str_replace('[pubname]', $name, $kash_items);
	
		// items base
	$kash_furni = str_replace(array('[id]', '[furnid]'), $id, $furni_kash);
	$kash_furni = str_replace('[pubname]', $name, $kash_furni);
	$kash_furni = str_replace('[type]', $tipo, $kash_furni);
	

	if($emulador == "plus") {		
		 if($save == true){
			$arquivo = file_get_contents("../furniture/sqls/sql_plus_$col.txt");
			if(preg_match("/$name/", $arquivo)){
				
			} else {
				$file = fopen("../furniture/sqls/sql_plus_$col.txt", 'a+');
				fwrite($file, $plus_items.chr(13).chr(10).$plus_furni.chr(13).chr(10));
				fclose($file);
			}
		} else {
			echo $plus_items."\n";
			echo $plus_furni;
		}
	}else if($emulador == "kash") {
		
		 if($save == true){
			$arquivo = file_get_contents("../furniture/sqls/sql_kash_$col.txt");
			if(preg_match("/$name/", $arquivo)){
				
			} else {
				$file = fopen("../furniture/sqls/sql_kash_$col.txt", 'a+');
				fwrite($file, $kash_items.chr(13).chr(10).$kash_furni.chr(13).chr(10));
				fclose($file);
			}
		} else {
			echo $kash_items."\n";
			echo $kash_furni;
		}
		
	} else if($emulador == "comet") {
		echo 'Cooming soon';
	}				
}
function furnidata($tipo = 'xml', $mobi){
	global $xml_model_room, $xml_model_wall;
	list($name, $id) = $mobi;
	if($tipo == "xml") {
		
		$xml = str_replace(array('[id]', '[furnid]'), $id, $xml_model_room);
		$xml = str_replace('[pubname]', $name, $xml);
		echo $xml;
	}
}
?>