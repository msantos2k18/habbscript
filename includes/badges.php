<?php
	set_time_limit(0);
	$url = "https://images.habblet.in/library/gamedata/habblet_texts.txt?13382d911eaf0394da1657c22a3c758847631c3e60cea";
	//$url = dirname(__FILE__) . "./habbo.txt";
	$ch = curl_init();
	
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	$info = curl_getinfo($ch);
	$data = curl_exec($ch);
	
	/*if($info['http_code'] != 200){
		die('Arquivo não encontrado!');
	}*/
	
	curl_close($ch);
	
	$badge_name = '/badge_name_(.+?)=/';
	preg_match_all($badge_name, $data, $matches);
	
	$badge = implode('.', $matches[0]);
	$emb = explode('badge_name_', $badge);
	$emb = str_replace(array('=', '.'), "", $emb);

	/*$badge_code = "/badge_name_(.+?)=[-a-z0-9]+)";
	
	preg_match_all($badge_code, $data, $matche);

	var_dump($matche);
*/	
	
	$countagem = count($emb);
	$count = $countagem - 250;
		
	for($i = $countagem - 1; $i >= $count; $i--) {
		$swf_bad = "https://images.habblet.in/c_images/album1584/$emb[$i].gif";
		$name = urldecode(basename($swf_bad));
			if(!file_exists('../library/badges/' . $name)){
				copy($swf_bad, '../library/badges/' . $name);
			} 
		
	?>
	
	<div class="boxing" title="<?= $emb[$i];?>" data-name="<?= $emb[$i];?>" data-toggle="tooltip" style="background-image: url(https://images.habblet.in/c_images/album1584/<?= $emb[$i];?>.gif)"><div class="about_box" data-toggle="tooltip"><a style="text-decoration: none;color: white" href="./library/download.php?t=badge&code=<?= $emb[$i];?>"><i class="fa fa-download" aria-hidden="true"></i>Clique </div></div></a>

<?php } ?>
<script src="./web/assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>	
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>
$(document).ready(function(){
	
	$('#fechar').click(function(){
		$('.mobi_down').fadeOut();
	});
	$('.boxing').click(function(){
		
		
	});
});
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});
$(function () {
  $('[data-toggle="popover"]').popover()
});


</script>