     
function loadDataTables()
{
	
     $('#tradeTableOpen').DataTable({
            destroy: true,
          "processing": true,
          "serverSide": true,
          "order": [[ 0, "desc" ]],
          "searching":false,
          "ajax": {
              "url": baseUrl+'/user/loadOpenTrade',
              "type": "POST"
           },
          "initComplete":function( settings, json){
              console.log(json);
              $('#tradeTableOpen_length').hide();
              one = 1;
             // syncronize();
          },
          "columnDefs": [
          	{ 
              "targets": [1,3],
              "orderable": false
          	 },
          	 {
          	 	//"targets": [1,2,5,6],
              	//"visible": false         	 	
          	 }
          
          ]
    });
//	});
    $('#tradeTableOpen tbody').on('click', 'td button', function (){
        if(confirm('Are you sure to cancel the trade?'))
        {
          if(processing)
            return;
            
          processing = 1;
          $(this).html('processing...');
          
          $.ajax({
              url: baseUrl+'/user/cancelTrade',
              data:{'ord':$(this).attr('prop')},
              type:'post',
              success: function(data){
                processing = 0;
                if(data != '')
                {
                	alert("Order cancelled successfully...");
                	location.reload();
                }	
                else
                	alert("Unable to cancel the order...");
                
              }
          });  
        }
     });
     
     
    
     
 	$('#tradeTableOpen_length').hide();
 	$('#tradeTableClosed_length').hide();
 	
   
        
}
