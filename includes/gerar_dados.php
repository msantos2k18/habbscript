<!--
<div class="mobi_down" style="display: none">
		<div class="box" style="margin: 0 auto;background: #fff;width: 720px;padding: 5px;text-align: center">
			<h6>Baixando <span id="file"></span> <i class="fa fa-times fa-pull-right fa-lg" style="cursor: pointer" id="fechar" aria-hidden="true"></i></h6>
			<img src="">
			<br/><br/>
			<strong>Plus SQL's:</strong>
			<textarea id="plus" class="form-control" style="height: 100px;" placeholder="SQL's"></textarea>
			<div style="border-bottom: 1px solid #eee;margin-bottom: 5px;"></div>
			<strong>Kash/Butterfly SQL's:</strong>
			<textarea id="kash" class="form-control" style="height: 100px;" placeholder="SQL's"></textarea>
			<div style="border-bottom: 1px solid #eee;margin-bottom: 5px;"></div>
			Furnidata:
			<textarea id="furnidata" class="form-control" style="height: 100px;" placeholder="Furnidata"></textarea>
			<small> Não se esqueça de mudar o 'page_id' nas SQL's pelo ID da página. </small>
			<br/><br/>
			<a href="" download><button class="btn btn-default" style="cursor: pointer"> Clique aqui para baixar SWF </button></a>
			<br/><br/>
			<a href="" id="icon" download><button class="btn btn-default" style="cursor: pointer"> Clique aqui para baixar Ícone</button></a>
		</div>
	</div>	-->
<?php 
						
					require_once('sql_function.php');
					error_reporting(0);
					
					$mobi_name = $_GET['mobi_name'];
					
					if(!isset($mobi_name)){
						die('Sem mobis nesta categoria.');
						return;
					}
					
					$url = "https://images.habblet.net/library/gamedata/habblet_furni.xml";

					$ch = curl_init();

						curl_setopt($ch, CURLOPT_URL, $url); 
						curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

						$data = curl_exec($ch);

						curl_close($ch);
					
					$mobi = "/<name>(.+?)<\/name>/";
					$class = '/classname="'.$mobi_name.'_(.+?)">/';
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
					
					
					set_time_limit(0);
					
					for($i = 0; $i < count($name); $i++){
						//if(preg_match("/$mobi_name/", $name[$i])){
						
							$urlmobi = "https://images.habblet.net/library/hof_furni/$name[$i].swf";
							$urlicones = "https://images.habblet.net/library/hof_furni/icons/$name[$i]_icon.png";
						
						if(!file_get_contents($urlmobi)){
							echo 'Sem resultados...';
							return;
						}
					
						if(file_exists('../furniture/' . urldecode(basename($urlmobi)))){
							
						} else {
							copy($urlmobi, '../furniture/' . urldecode(basename($urlmobi)));
							
						}
						
						if(file_exists('../furniture/icons/' . urldecode(basename($urlicones)))){
							
						} else {
							copy($urlicones, '../furniture/icons/' . urldecode(basename($urlicones)));
							
						}
						
						$mobi = array($name[$i], $furnid[$i]);						
						
						
						sql_e('plus', $mobi, true, $mobi_name);
						sql_e('kash', $mobi, true, $mobi_name);
			
?>
	<div class="boxing" title="<?= $name[$i];?>" data-name="<?= $name[$i];?>" data-toggle="tooltip" style="background-image: url(https://images.habblet.net/library/hof_furni/icons/<?= $name[$i];?>_icon.png)"><div class="about_box" data-toggle="tooltip"><textarea style="display: none" id="sql_<?= $name[$i];?>_plus"><?= sql('plus', $mobi); ?></textarea><textarea style="display: none" id="sql_<?= $name[$i];?>_kash"><?= sql('kash', $mobi); ?></textarea><i class="fa fa-download" aria-hidden="true"></i> Clique <textarea style="display: none" id="furnidata"><?= furnidata('xml', $mobi); ?></textarea></div></div></a>
<?php } ?>

		
<script src="../web/assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>	
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
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});
$(function () {
  $('[data-toggle="popover"]').popover()
});
});
</script>