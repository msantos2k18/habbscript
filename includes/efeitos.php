<script src="./web/assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>	
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<?php 

		set_time_limit(0);
		
		$url = simplexml_load_file('https://images.habbo.com/gordon/PRODUCTION-201805282205-521681100/effectmap.xml');

		$i = 0;
		$reverseArray = (array) $url;
		$reverseArray = array_reverse($reverseArray["effect"]);
		
		foreach($reverseArray AS $e ) {
			$download = "https://images.habbo.com/gordon/PRODUCTION-201805282205-521681100/$e[lib].swf";
			if(++$i == 45) break;
			if($e['lib'] == 'Treadmill' || $e['lib'] == 'TrampolineJump' || $e['lib'] == 'HeadOnTheGround') continue;
			//copy($download, '../library/effects/' . urldecode(basename($download)));

?>
	<div class="boxing" id="files" href="#" title="<?= $e['lib'];?>" data-name="<?= $e['lib'];?>" data-toggle="tooltip" style="cursor:pointer;background-image: url(./library/get_thumbnail.php?effect=<?= $e['lib'];?>)"><div class="about_box" data-toggle="tooltip"><i class="fa fa-download" aria-hidden="true"></i> Clique</div></div></a>

<?php } ?>
	<div class="boxing" onclick="return false" title="A mais efeitos de onde este veio, clique em Download" data-name="+ 100 efeitos" data-toggle="tooltip" style="background-image: url(https://png.icons8.com/metro/1600/plus.png); background-size: 25px 25px"><div class="about_box" data-toggle="tooltip"><i class="fa fa-download" aria-hidden="true"></i> Clique</div></div></a>

<script>
$(document).ready(function(){
		
		$('#fechar').click(function(){
			$('.mobi_down').fadeOut();
		});
		
		
		
		$('.boxing#files').click(function(e){
			e.preventDefault();
			var swf = $(this).attr('data-name');
			window.location = './library/download.php?t=efeito&code=' + swf;
			});
			
			//$('.boxing').click();
		
	$(function () {
	  $('[data-toggle="tooltip"]').tooltip()
	});
	
	$(function () {
	  $('[data-toggle="popover"]').popover()
	});
	
	
});
</script>

		
