$(document).ready(function(){  


	// Reset a Video players - iframes from YouTube or Vimeo, etc.
	var time_left = 40;
	var watched = 'no';
	var call_once = 'no';

	var thirty = function(){
		if(time_left === 0){
			$('#xp_video_seconds').html("25 xp earned!");
			$("#watch_mog_close").show();
			watched = 'yes';
			if (call_once === 'no') {
				$.ajax({
				url: './ajax/videowatch.inc.php',
				type: 'post',
				data: { method: 'add'},
				success: function(data){
					
				}
				});
				call_once = 'yes';
			}
			
		}else{
			time_left -= 1;
			$('#xp_video_seconds').html(time_left+"s left to earn xp");
		}
	}

	$("#watch_mog").click(function(){
    	$(".video_overlay").show();
    	$("#video_xp_play").show();
    	$("#play_block").css("background-color", "rgba(10, 16, 40, 0.9)");
	});
	$("#watch_mog_close").click(function(){
		if (watched === 'yes') {
    		window.location.reload(true); 
    	}
    	$(".video_overlay").hide();


	});
	$("#video_xp_play").on('click', function(ev) {
	    $("#video")[0].src += "&autoplay=1";
	    ev.preventDefault();
 
  });

	//play the video
	$("#video_xp_play").click(function(){
    	$("#video_xp_play").hide();
    	$("#watch_mog_close").hide();
    	$("#play_block").css("background-color", "rgba(0, 0, 0, 0)");
    	var interval = setInterval(thirty, 1000);

	});


	
});