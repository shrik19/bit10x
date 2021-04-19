<script>
	var aLi		 = '<a class="dropdown-item d-flex align-items-center" href="#"> <div class="dropdown-list-image mr-3"> <img class="rounded-circle img-50" src="[IMG]" alt=""> </div> <div class="font-weight-bold width-50"> <div class="text-truncate ellipisize">[TITLE]</div> <div class="small text-gray-500 ellipisize">[DESC]</div> </div> </a>';
	var notifUrl = "<?php echo base_url();?>user/pendingDesktop";
	$(document).ready(function(){
    		
    		$.ajax({
					url: '<?php echo base_url()."api";?>',
					data: {"ajaxData":"1"},
					type: "post",
					success: function(data){
						var json		= JSON.parse(data);
						
						var btc			= json['btc']['USD'];
						var eth			= json['eth']['USD'];
						var ltc			= json['ltc']['USD'];
						var newsArray	= Array();
						for(var i=0;i<10;i++)
						{							
							var eachNews						= json['news']['Data'][i];
							var eachEle							= aLi.replace("[TITLE]",eachNews['title']);
							eachEle								= eachEle.replace("[IMG]",eachNews['imageurl']);
							eachEle								= eachEle.replace("[DESC]",eachNews['body'].substring(0,40)+"...");
							newsArray[i]		 				= eachEle;							
						}
						
						$("#news").html(newsArray.join(""));
					}
			  });
			  
			  
    });
</script>
 
 
 