<?php 
require_once('./includes/sql_function.php');
?>
<head>
	<title>HSCript - Pesquisa </title>
	<link rel="stylesheet" href="./web/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="./web/assets/css/principal.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<div class="user_painel">
		<a href="./"><li>Início</li></a>		
		<a href="./categoria"><li>Mobis por categoria</li></a>	
		<a href="./badges"><li>Emblemas</li></a>	
		<a href="./clothing"><li>Visuais</li></a>
		<a href="./efeitos"><li>Efeitos</li></a>	
		
</div>
<div id="header">
	<div id="logo"></div>
	<form method="POST" action="./search.php">
		<input type="text" style="margin: 0 auto;width: 250px"name="pesquisa" class="form-control" placeholder="Procurar">
	</form>
</div>
<div class="loading"><i style="position:relative;top: 45%" class="fa fa-spinner fa-pulse fa-3x fa-fw"> </i><br/><span style="position: Relative;top: 45%">Carregando...</span></div>

<?php 
$pesquisa = $_POST['pesquisa'];
					
if(!$pesquisa){
	header('LOCATION: ./');
}
?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="titulo green"> <i class="fa fa-plus-square-o" style="font-weight: 300"></i> resultados de "<?= $pesquisa;?>" </div>
				<div id="mobis" style="padding: 5px">
<?php 
					error_reporting(0);
					$url = "https://images.habblet.net/library/gamedata/habblet_furni.xml";

					$ch = curl_init();

						curl_setopt($ch, CURLOPT_URL, $url); 
						curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

						$data = curl_exec($ch);

						curl_close($ch);
					
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
					
					for($i = 0; $i < count($name); $i++){
						
						if(preg_match("/$pesquisa/", $name[$i])){
						
						$urlmobi = "https://images.habblet.net/library/hof_furni/$name[$i].swf";
						$urlicones = "https://images.habblet.net/library/hof_furni/icons/$name[$i]_icon.png";
						
						$mobi = array($name[$i], $furnid[$i]);
			
?>
	<div class="boxing" title="<?= $name[$i];?>" data-name="<?= $name[$i];?>" data-toggle="tooltip" style="background-image: url(https://images.habblet.net/library/hof_furni/icons/<?= $name[$i];?>_icon.png)"><div class="about_box" data-toggle="tooltip"><textarea style="display: none" id="sql_<?= $name[$i];?>_plus"><?= sql('plus', $mobi); ?></textarea><textarea style="display: none" id="sql_<?= $name[$i];?>_kash"><?= sql('kash', $mobi); ?></textarea><i class="fa fa-download" aria-hidden="true"></i> Clique <textarea style="display: none" id="furnidata"><?= furnidata('xml', $mobi); ?></textarea></div></div></a>
<?php }} ?>
</div>
			</div>
		</div>
	</div>
</div>
		
<div class="mobi_down">
		<div class="box" style="margin: 0 auto;background: #fff;width: 720px;padding: 5px;text-align: center">
			<h6>Baixando <span id="file"></span>  <i class="fa fa-times fa-pull-right fa-lg" style="cursor: pointer" id="fechar" aria-hidden="true"></i></h6>
			<img src="">
			<br/><br/>
			<strong>Plus SQL's:</strong>
			<textarea id="plus" class="form-control" style="height: 100px;" placeholder="SQL's"></textarea>
			<div style="border-bottom: 1px solid #eee;margin-bottom: 5px;"></div>
			<strong>Kash/Butterfly SQL's:</strong>
			<textarea id="kash" class="form-control" style="height: 100px;" placeholder="SQL's"></textarea>
			Furnidata:
			<textarea id="furnidata" class="form-control" style="height: 100px;" placeholder="Furnidata"></textarea>
			<a href="" download><button class="btn btn-default" style="cursor: pointer"> Clique aqui para baixar </button></a>
			<br/><br/>
			<a href="" id="icon" download><button class="btn btn-default" style="cursor: pointer"> Clique aqui para baixar Ícone</button></a>
		</div>
	</div>		
<script src="./web/assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
	$('#fechar').click(function(){
		$('.mobi_down').fadeOut();
	});
	$(window).on('load',function(){
		$('.loading').fadeOut();;
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
		$('.mobi_down a').attr('href', 'https://images.habblet.net/library/hof_furni/'+ nome + '.swf');
		$('.mobi_down a#icon').attr('href', 'https://images.habblet.net/library/hof_furni/icons/'+ nome + '_icon.png');
		$('.mobi_down img').attr('src', 'https://images.habblet.net/library/hof_furni/icons/'+ nome + '_icon.png');
	});
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});
$(function () {
  $('[data-toggle="popover"]').popover()
});
});

</script>