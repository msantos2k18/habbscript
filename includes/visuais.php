<script src="./web/assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>	
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<?php 
		
		set_time_limit(0);
		$s_f = "https://images.habblet.in/library/gamedata/figuremap.xml";
		$s_f_2 = "https://images.habblet.in/library/gamedata/figuredata.xml";
		
		$url = simplexml_load_file('https://images.habblet.in/library/gamedata/figuremap.xml');

		if(!file_exists('../library/visuais/figuremap.xml')){
			copy($s_f, '../library/visuais/' .urldecode(basename('https://images.habblet.in/library/gamedata/figuremap.xml')));
		} else {
			unlink('../library/visuais/figuredata.xml');
		}
		if(!file_exists('./visuais/figuredata.xml')){ 
			copy($s_f_2, '../library/visuais/' .urldecode(basename('https://images.habblet.in/library/gamedata/figuredata.xml')));
		} else {
			unlink('../library/visuais/figuremap.xml');
		}

		$i = 0;
		foreach($url->lib AS $visu) {
			$download = "https://images.habblet.in/library/$visu[id].swf";
			//if(++$i == 250) break;
			if(!file_exists('../library/visuais/' . urldecode(basename($download)))){
				copy($download, '../library/visuais/' . urldecode(basename($download)));
			}
?>

<?php } ?>

<script>
$(document).ready(function(){
		
		$('#fechar').click(function(){
			$('.mobi_down').fadeOut();
		});
		
		
		/*$('.boxing').click(function(){
			var swf = $(this).attr('data-name');
			
				$.ajax({
					url: "./library/extract.php",
					data: {swf:swf},
					type: "POST",
					success: function(data) {
						
					}
						
				});
			});*/
			
			//$('.boxing').click();
		
	$(function () {
	  $('[data-toggle="tooltip"]').tooltip()
	});
	
	$(function () {
	  $('[data-toggle="popover"]').popover()
	});
	
	
});
</script>

		
