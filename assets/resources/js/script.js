var processing;
var btc2zar;
var tradeJSON = "";
var isloaded = 0;
$(window).ready(function() {

$(".showhidepassword").on('click', function(e) {
    showhidepassword('showhidepassword','password');
});
$(".showhidecpassword").on('click', function(e) {
    showhidepassword('showhidecpassword','cpassword');
});


    
function showhidepassword(viewelement,passwordelementid) {
            var x = document.getElementById(passwordelementid);
              if (x.type === "password") {
                x.type = "text";
                $('.'+viewelement).html('<i class="fa fa-eye-slash" aria-hidden="true"></i>');
              } else {
                x.type = "password";
                $('.'+viewelement).html('<i class="fa fa-eye" aria-hidden="true"></i>');
              }
        }
 

  $("#province_id").on('change', function(e) {
  		get_city_by_province($('#province_id').val(),'','');
  		
  
  });
  $("#city_id").on('change', function(e) {
  		
  		get_suburb_by_city($('#city_id').val(),'');
  
  });
  if($("#province_id").attr('selectedval')!='') {
	  get_city_by_province($("#province_id").attr('selectedval'),$("#city_id").attr('selectedval'),$("#suburb_id").attr('selectedval'));
  }
  function get_city_by_province(province_id,city_id,suburb_id) {
	  
	  $.ajax({
				url: baseUrl+'user/get_city_by_province',
				data:{province_id:province_id},
				type: "post",
				success: function(data){
					$('#city_id').html(data);
					if(city_id!='') { 
						$('#city_id').val(city_id); 
						get_suburb_by_city(city_id,suburb_id);
					}
				}
		  });
  }
  
  function get_suburb_by_city(city_id,suburb_id) {
	  $.ajax({
				url: baseUrl+'user/get_suburb_by_city',
				data:{city_id:city_id},
				type: "post",
				success: function(data){
					$('#suburb_id').html(data);
					if(suburb_id!='') 
						$('#suburb_id').val(suburb_id);
				}
		  });
  }
  $("#register").on('click', function(e) {
  		
  		var  name 			= $("#name").val();
  		var  surname 		= $("#surname").val();
  		var  email 			= $("#email").val();
  		var  password 		= $("#password").val();
  		var  cpassword 		= $("#cpassword").val();
  		
  		var  phone 	    	= $("#phone").val();
  		var  province_id 	= $("#province_id").val();
		var  city_id 		= $("#city_id").val();
		var  suburb_id	 	= $("#suburb_id").val();
		var  address 		= $("#address").val();
		var  account_id 	= $("#account_id").val();
		var  account_holder_name 	= $("#account_holder_name").val();
		var  ifsc_code	 	= $("#ifsc_code").val();
  		/*var  date 		= $("#date").val();
  		var month       = $("#month").val();
  		var year        = $("#year").val();*/
  		
  		var  accept_policy 	= '';
  		if($("#accept_policy:checked").length >0)
  		accept_policy=1;
  		
  		$("#error").html('');
  		
  		if(processing)
  			return;
  			
  		processing 		= true;	
  		$(".overlay").show(400);
  		
  		$.ajax({
				url: baseUrl+'user/register',
				data: {'name': name ,'surname': surname , 'email' : email , 'password' : password, 'cpassword' : cpassword,  'phone' : phone, 'province_id' : province_id, 'city_id' : city_id, 'suburb_id' : suburb_id, 'address' : address, 'account_id' : account_id, 'ifsc_code' : ifsc_code,'account_holder_name':account_holder_name,'accept_policy' : accept_policy,'register':'1'},
				type: "post",
				success: function(data){
					processing = false;
					$(".overlay").hide(100);
					var json = $.parseJSON(data);
					if(json['success'] == '1')
					{
						alert(json['message']);
						location.replace(baseUrl+'user/register');
					}
					else
						$("#error").html(json['message']);
					
				}
		  });
  
  });
  
  
  $(".policydetailslink").on('click', function(e) {
  		
  		var  id 		= $(this).attr('id');
  		
  		if(processing)
  			return;
  			
  		processing 		= true;	
  		$(".overlay").show(400);
  		
  		$.ajax({
				url: '/contentpage/getpagedetails',
				data: {'id': id },
				type: "post",
				success: function(data){
					processing = false;
					$(".overlay").hide(100);
					var json = $.parseJSON(data);
					//alert(json);
					$(".policytitle").html(json['title']);
					$(".policycontent").html(json['content']);
					
				}
		  });
  
  });
  
  
  $("#login").on('click', function(e) {
  
  		 		
  		var  email 		= $("#email").val();
  		var  password 	= $.trim($("#password").val());
  		$("#error").html('');
  			
  		if(processing)
  			return;
  			
  		var str			= '';
  		if(!isValidEmailAddress(email))
  			str			= 'Email address is not valid';
  		if(password.length < 8)
  			str			= str+'<br>Password should be minimum 8 characters';
  		
  		if(str != '')
  		{
  			$("#error").html(str);
  			return;
  		}
  
  			
  		processing 		= true;	
  		$(".overlay").show();
  		
  		$.ajax({
				url: baseUrl+'user/login',
				data: {'email' : email , 'password' : password,'login':'1'},
				type: "post",
				success: function(data){
					processing = false;
					$(".overlay").hide();
					console.log(data);
					var json = $.parseJSON(data);
					if(json['success'] == '1' && json['isadmin'] == "1")
					{
						location.replace(baseUrl+'admin/');
					}
					else if(json['success'] == '1')
					{
						location.replace(baseUrl+'user/dashboard');
					}
					else
						$("#error").html(json['message']);
					
				}
		  });
		  
		 
		  
  
  });
  $("#forgotpassword").on('click', function(e) {
  
  		 		
  		var  email 		= $("#email").val();
  		$("#error").html('');
  			
  		if(processing)
  			return;
  			
  		var str			= '';
  		if(!isValidEmailAddress(email))
  			str			= 'Email address is not valid';
  		
  		if(str != '')
  		{
  			$("#error").html(str);
  			return;
  		}
  
  			
  		processing 		= true;	
  		$(".overlay").show();
  		
  		$.ajax({
				url: baseUrl+'user/forgot',
				data: {'email' : email ,'forgotpassword':'1'},
				type: "post",
				success: function(data){
					processing = false;
					$(".overlay").hide();
					console.log(data);
					var json = $.parseJSON(data);
					 if(json['success'] == '1')
					{
						alert(json['message']);
					}
					else
						$("#error").html(json['message']);
					
				}
		  });
		  
		 
		  
  
  });
  $("#resetpassword").on('click', function(e) {
  
  		 		
  		var  password 		= $("#password").val();
		var  cpassword 		= $("#cpassword").val();
		var  string 		= $("#parameter").val();
  		$("#error").html('');
  			
  		if(processing)
  			return;
  			
  		var str			= '';
  			
  		processing 		= true;	
  		$(".overlay").show();
  		
  		$.ajax({
				url: baseUrl+'user/resetpassword/'+string,
				data: {'password' : password,'cpassword' : cpassword ,'resetpassword':'1'},
				type: "post",
				success: function(data){
					processing = false;
					$(".overlay").hide();
					console.log(data);
					var json = $.parseJSON(data);
					 if(json['success'] == '1')
					{
						alert(json['message']);
					}
					else
						$("#error").html(json['message']);
					
				}
		  });
		  
		 
		  
  
  });
  
  
  $("#updatepassword").on('click', function(e) {
  		
  		$("#error").html('');
  		if(processing)
  			return;

  		processing 		= true;	
  		$(".overlay").show(400);
  		
  		var form 	= $("#form").serialize();
  		$.ajax({
				url: baseUrl+'user/change_password',
				data:form,
				type: "post",
				success: function(data){
					processing = false;
					$(".overlay").hide(100);
					var json = $.parseJSON(data);
					if(json['success'] == '1')
					{
						alert(json['message']);
						location.replace(baseUrl+'user/change_password');
					}
					else
						$("#error").html(json['message']);
					
				}
		  });
  
  });
  $("#updateProfile").on('click', function(e) {
  		
  		$("#error").html('');
  		if(processing)
  			return;

  		processing 		= true;	
  		$(".overlay").show(400);
  		
  		var form 	= $("#form").serialize();
  		$.ajax({
				url: baseUrl+'user/profile',
				data:form,
				type: "post",
				success: function(data){
					processing = false;
					$(".overlay").hide(100);
					var json = $.parseJSON(data);
					if(json['success'] == '1')
					{
						alert(json['message']);
						location.replace(baseUrl+'user/profile');
					}
					else
						$("#error").html(json['message']);
					
				}
		  });
  
  });
  
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
    
    
   

   $(".currency").hide();
 
}); 


function loadTrade()
{
	$.ajax({
			url: baseUrl+'user/tradingData',
			success: function(data){
				tradeJSON			= $.parseJSON(data);
				var openTradeTable	= "<table class='col-sm-12 table'> <tr> <th>coin</th> <th>price</th> <th>qty</th> <th>profit</th> <th>status</th> <th>type</th> <th>side</th> <th>stop</th> </tr>";
				var open			= tradeJSON['open'];
				var ord				= tradeJSON['ord'];
				
				
				var oArray			= openTradeTable;
				var orArray			= openTradeTable;
				for(var i=0;i<open.length;i++)
				{	
					var single		= open[i];
					var str			= "";
					for(var j=0;j<single.length;j++)
					{
						str			= 	"<tr id='"+single[j]['orderId']+"'><td>"+single[j]['symbol']+"</td>";
						str			+= 	"<td>"+parseFloat(single[j]['price']).toFixed(2)+"</td>";
						str			+= 	"<td>"+single[j]['origQty']+"</td>";
						str			+= 	"<td id='td-"+single[j]['orderId']+"'  class='profit'>...</td>";
						str			+= 	"<td>"+single[j]['status']+"</td>";
						str			+= 	"<td>"+single[j]['type']+"</td>";
						str			+= 	"<td>"+single[j]['side']+"</td>";
						str			+= 	"<td>"+single[j]['stopPrice']+"</td></tr>";
						
						oArray		+= str;
					}
				}
				
				for(var i=0;i<ord.length;i++)
				{	
					var single		= ord[i];
					console.log(ord[0].length);
					
					var str			= "";
					for(var j=0;j<single.length;j++)
					{
						var css		= "";
						if(single[j]['status'].toLowerCase() == "filled")
							css		= "style='color:#6de448'";
						
					
						str			= 	"<tr id='tr-"+single[j]['orderId']+"'><td>"+single[j]['symbol']+"</td>";
						str			+= 	"<td>"+parseFloat(single[j]['price']).toFixed(2)+"</td>";
						str			+= 	"<td>"+single[j]['origQty']+"</td>";
						str			+= 	"<td id='td-"+single[j]['orderId']+"' class='profit'>...</td>";
						str			+= 	"<td "+css+">"+single[j]['status']+"</td>";
						str			+= 	"<td>"+single[j]['type']+"</td>";
						str			+= 	"<td>"+single[j]['side']+"</td>";
						str			+= 	"<td>"+single[j]['stopPrice']+"</td></tr>";
						
						orArray		+= str;
					}
				}
				
				
				oArray				= oArray + "</table>";
				orArray				= orArray + "</table>";
				
				
				$("#open_trade_div").html(oArray);
				$("#closed_trade_div").html(orArray);
				
   				
			}
	  });
	  

}


function checkAmt()
{
	
		var include 	=  $("#include")[0].checked;
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
  			//$(".changetxts").removeClass('text-success');
  		}
  		else
  		{
  			//$(".changetxts").addClass('text-success');
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

function toggle_signal()
{
	if($(".non-signal").is(":visible"))
	{
		$(".non-signal").hide(500);
		$(".signal").removeClass("col-lg-4");
		$(".signal").addClass("col-lg-12");
		$(".signal-main-div").removeClass("min-height");
		$(".signal-more").html("Collapse");
	}
	else
	{
		$(".non-signal").show(500);
		$(".signal").removeClass("col-lg-12");
		$(".signal").addClass("col-lg-4");
		$(".signal-main-div").addClass("min-height");
		$(".signal-more").html("Read more...");
	}
	
}

function closeDiv(div)
{
	$('.showingsignaldetails').attr('id','No');
	$("#"+div).hide(500);
	
}







