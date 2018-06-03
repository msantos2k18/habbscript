<?php 
$nome = "HSCript_furniture.zip";
if(file_exists($nome)){
	unlink($nome);
}
?>
<head>
	<title>HSCript - Início </title>
	<link rel="stylesheet" href="./web/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="./web/assets/css/principal.css">
	<link rel="stylesheet" href="./web/assets/css/base.css">
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
	<center><b>Desenvolvido por <a href="https://www.facebook.com/profile.php?id=100016845511892" target="_blank">Matheus</a></center>
</div>
<div class="loading"><i style="position:relative;top: 45%" class="fa fa-spinner fa-pulse fa-3x fa-fw"> </i><br/><span style="position: Relative;top: 45%">Carregando...</span></div>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="titulo" style="color: white;background-image: url(./web/assets/images/headerc.jpg);background-position: center;"> <i class="fa fa-plus-square-o" style="font-weight: 300"></i> últimos mobis <input type="button" onclick="baixar_mobis();" style="margin-top: 7px;margin-right: 5px;float: right; width: 105px" class="btn btn-custom" value="Download"> </div>
				<div id="mobis" style="padding: 5px">
					Carregando...
				</div>
			</div>
		</div>
	</div>
</div>
		
<div class="mobi_down">
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
	</div>		
<script src="./web/assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>
$(document).ready(function(){
	$('#fechar').click(function(){
		$('.mobi_down').fadeOut();
	});
	$(window).on('load',function(){
		$('.loading').fadeOut();
	});
	$('#mobis').load('./includes/furni_load.php');
	
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
function baixar_mobis(){
		var confirma = confirm("Tem certeza que deseja baixar todos os mobis? Poderá dar crash no seu navegador.");
		
		if(confirma == true) {
			window.location = "compactar.php";
		} else {
		
		}
}

</script>
