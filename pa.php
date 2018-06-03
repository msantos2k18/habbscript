<?php 
						
					require_once('./includes/sql_function.php');
					error_reporting(0);
					$url = "https://images.habblet.net/library/gamedata/habblet_furni.xml";

					$data = file_get_contents($url);
					
					$mobi = "/<name>(.+?)<\/name>/";
					$class = '/classname="(.+?)">/';
					$id = '/id="(.+?)"/';
					
					preg_match_all($mobi, $data, $content);
					preg_match_all($class, $data, $class_cont);
					preg_match_all($id, $data, $furni_id);
					
					$z = implode('.', $content[0]);
					$furni = explode('.<name>', $z);
					
					$xfurni = implode('-', $class_cont[0]);
					$name = explode('-classname="', $xfurni);
					$name = str_replace(array('"', ">", "classname="), "", $name);
					$name = str_replace('*', '_', $name);
					
					$idfurnix = implode('-', $furni_id[0]);
					$furnid = explode('-id=', $idfurnix);
					$furnid = str_replace(array('"', "id="), "", $furnid);
					

					
					//$number = count($name);
					//$contagem = $number - 120;
					set_time_limit(0);
					
					
					$atual = isset($_GET['pag']) ? (int) $_GET['pag'] : 1;
					$perPage = 2;
					$pagina = array_chunk($name, $perPage);
				    $contar = count($name);
				   /*  echo '<pre>';
					               print_r(array_chunk($name, 528));
				       	echo '</pre>';*/
					$resultado = $pagina[$atual-1];
					
					foreach($resultado as $valor) {
					    $urlmobi = "https://images.habblet.net/library/hof_furni/$valor.swf";
						$urlicones = "https://images.habblet.net/library/hof_furni/icons/$valor_icon.png";
						
						var_dump( $resultado);
					?>
						<div class="boxing" title="<?= $valor;?>" data-name="<?= $valor;?>" data-toggle="tooltip" style="background-image: url(https://images.habblet.net/library/hof_furni/icons/<?= $valor;?>_icon.png)"><div class="about_box" data-toggle="tooltip"><textarea style="display: none" id="sql_<?= $valor;?>_plus"><?= sql('plus', $mobi); ?></textarea><textarea style="display: none" id="sql_<?= $valor;?>_kash"><?= sql('kash', $mobi); ?></textarea><i class="fa fa-download" aria-hidden="true"></i> Clique <textarea style="display: none" id="furnidata"><?= furnidata('xml', $mobi); ?></textarea></div></div></a>

					<?php 
					}
				/*	for($i = 0; $i < 5; $i++){

						
						$mobi = array($name[$i], $furnid[$i]);
							
						sql('plus', $mobi, true);
						sql('kash', $mobi, true);
						
				    	/*	if(file_exists('../furniture/' . urldecode(basename($urlmobi)))){
							
						} else {
							copy($urlmobi, '../furniture/' . urldecode(basename($urlmobi)));
							
						}
						
						if(file_exists('../furniture/icons/' . urldecode(basename($urlicones)))){
							
						} else {
							copy($urlicones, '../furniture/icons/' . urldecode(basename($urlicones)));
							
						}*/
						
			
 ?>

<script src="./web/assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>	
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>
$(document).ready(function(){
	
	$('#fechar').click(function(){
		$('.mobi_down').fadeOut();
	});
	$('.boxing').click(function(){
		
		var nome = $(this).attr('data-name');
		var sql = $('#sql_' + nome + "_plus").val();
		var sql_kash = $('#sql_' + nome + "_kash").val();
		var sql_comet = $('#sql_' + nome + "_comet").val();
		var furnidata = $('#furnidata').val();

		$('.mobi_down textarea#plus').val(sql);
		$('.mobi_down textarea#kash').val(sql_kash);
		$('.mobi_down textarea#furnidata').val(furnidata);
		$('.mobi_down').fadeIn();
		$('.mobi_down #file').html(nome);
		$('.mobi_down a').attr('href', './furniture/'+ nome + '.swf');
		$('.mobi_down a#icon').attr('href', './furniture/icons/'+ nome + '_icon.png');
		$('.mobi_down img').attr('src', './furniture/icons/'+ nome + '_icon.png');
	});
});
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});
$(function () {
  $('[data-toggle="popover"]').popover()
});

</script>
