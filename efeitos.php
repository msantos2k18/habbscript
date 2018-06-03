<head>
	<title>HSCript - Efeitos </title>
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
				<div class="titulo" style="color: white;background-image: url(./web/assets/images/header.png);background-position: center;"> <i class="fa fa-plus-square-o" style="font-weight: 300"></i> últimos efeitos <input type="button" onclick="baixar_visuais();" style="margin-top: 7px;margin-right: 5px;float: right; width: 105px" class="btn btn-custom" value="Download"> </div>
					
					<div id="efeitos" style="padding: 5px"></div>
				</div>
			</div>
		</div>
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
	
	$('#efeitos').load('./includes/efeitos.php');
});

function baixar_visuais(){
	var confirma = confirm("Voce baixará os efeitos disponíveis aqui + outros 100 e + customizados. Prosseguir?");
		
	if(confirma == true) {
		window.location = "./library/zip_badges.php?folder=effects";
	} else {
		console.log('Failed!');
	}
}

</script>