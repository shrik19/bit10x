var processing;
var btc2zar;
(function($) {

  var iframeHeight 	= $('#live-coin').height();
  $(".iframe-related").height(iframeHeight+"px");
  
  $('.req-div').height('400')
  var req_div	 	= $('.req-div').height();
  $(".req-div-rel").height(req_div+"px");
  
  $('#amount').keyup(function () { 
  		checkAmt();
  });
  
  $('#include').change(function() {
        checkAmt(); 
  });
  
  
  $("input.only-positive-decimal").bind("change keyup input", function () {
  				try
  				{
  					$("#error").html('');
  					var position = this.selectionStart - 1;
					var fixed = this.value.replace(/[^0-9\.]/g, '');
					if (fixed.charAt(0) === '.')                  //can't start with .
						fixed = fixed.slice(1);

					var pos = fixed.indexOf(".") + 1;
					if (pos >= 0)               //avoid more than one .
						fixed = fixed.substr(0, pos) + fixed.slice(pos).replace('.', '');

					if (this.value !== fixed) {
						this.value = fixed;
						this.selectionStart = position;
						this.selectionEnd = position;
					}
				}catch(e){}
  				
            	
    });
    
    
    $("#withdraw").click(function(){
		var amount		= parseFloat($('#amount').val()); 
		if(amount > 0)
		{	
			$("#modtitleTxt").html("Are you sure to withdraw ?");
			$('#confirmModal').modal("show");
		}
    });
    
    
    
    $.ajax({
			url: '/admin/getNotifications',
			success: function(data){
				var json = $.parseJSON(data);
				$("#notif-count").html(json['count']);
				$("#notif-content").html(json['html']);
				
			}
	  });
	  
	  $("#alertsDropdown").click(function(){
		 		$.ajax({
					url: '/admin/updateNotification',
					success: function(data){
						var json = $.parseJSON(data);
						$("#notif-count").html(json['count']);
					}
			  });
		 
	 }); 
		  
    

   $(".currency").hide();
	

})(jQuery); 




function checkAmt()
{
	
		var include 	=  1;
  		var entered		=  parseFloat($('#amount').val()); 
  		var finalDed	=  0;
  		var finalSent	=  0;
  		var maxCheck	=  0;
  		$(".currency").show();
  		
  		
  		if(include)
  		{
  			finalDed	= entered;
  			finalSent	= entered - tCost;
  			maxCheck	= finalDed;
  		}
  		else
  		{
  			finalDed	= entered+tCost;
  			finalSent	= entered;
  			maxCheck	= finalSent;
  		}
  		
  		if(maxCheck > maxAmt)
  		{
  			$(".changetxts").addClass('text-danger');
  		}
  		else
  		{
  			$(".changetxts").removeClass('text-danger');
  		}
  		
  		
  		
  		$("#final").html(finalDed);
  		$("#final2").html(finalSent);
  		$("#zfinal").html(finalDed*btc2zar);
  		$("#zfinal2").html(finalSent*btc2zar);
  		if(entered == '' || parseFloat(entered) == 0)
  		{
  			$(".changetxts").html('0');
  			$(".currency").hide();
  		}
  			
		
}

function isValidEmailAddress(emailAddress) 
{
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    return pattern.test(emailAddress);
}


function clipBoard()
{
	
	  var copyText = document.getElementById("holdtext");
	  copyText.select();
	  document.execCommand("copy");
}
