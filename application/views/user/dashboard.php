<!DOCTYPE html>
<html lang="en">

<head>

 	<?php $this->load->view('includes/user_header'); ?>

</head>

<?php
// echo "<pre>";
// print_r($ticker);
// die;
?>
<body id="page-top">
    
    

<div id="load"><img src="<?php echo base_url(); ?>assets/images/loadingimg.gif" width="70" height="70"></div>

<script>
document.onreadystatechange = function () {
  var state = document.readyState
  if (state == 'interactive') {
       document.getElementById('wrapper').style.opacity=0.5;
  } else if (state == 'complete') {
      setTimeout(function(){
          
         document.getElementById('interactive');
         document.getElementById('load').style.visibility="hidden";
         document.getElementById('wrapper').style.opacity=1;
         setTimeout(function(){ 
	        loadDataTables();
	    }, 1000);
      },500);
  }
}
</script>
<style>

</style>
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

       <?php $this->load->view('includes/user_top_menu'); ?>
       
       
        <!-- Begin Page Content -->
        <div class="container-fluid">

           
         <?php $this->load->view('includes/user_top_bar'); ?>

          <!-- Content Row -->
          <div style="display:none;" class="dashboardcontent"></div>
          
          	<div class="row">
			
          	<div class=" col-lg-2  non-signal">
			</div>
          		<div class=" col-lg-8  non-signal">
				<div class="" style="color: white;">Welcome <?php echo $name;?></div>
				  <div class="card shadow mb-4 min-height signal-main-div">
				  		<h6 class="header">
						  <center><br>BIT10X Orders<center>
						      <a style="float: right;MARGIN-TOP:-15PX;margin-right:2px;" href="javascript:void(0);" class="pull-right synctrades ">Refresh
						      </a><br><small style="float: right;margin-right:2px;margin-top:-15px;font-size:10px;">(Update Status)</small>
					    </h6>
					    <hr>
					    <div id='open_trade_div' class='trade-div'>
								<div class="table-responsive" id='openTrade-div'>
				                	<table class="table table-bordered" id="tradeTableOpen" width="100%" cellspacing="0">
									  <thead>
										<tr>
										  
										  
										  <th data-sort='YYYYMMDD'>Date & time</th>
										  <th>Pair</th>
										  <th>Status</th>
										  <th>Entry Price</th>
										  <th>Margin</th>
										</tr>
									  </thead>
									</table>
				              </div>
								
						</div>
					</div>
				</div>
				
				
        	</div>
        	
			
      </div>
      <!-- End of Main Content -->

      <?php $this->load->view('includes/user_footer'); ?>

  </div>
  <!-- End of Page Wrapper -->
  	

<div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel" style='text-align: center; width: 100%; color: #ec9919;'></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><img src='<?php echo base_url(); ?>/assets/images/close.png' style='width:20px'></span>
        </button>
      </div>
      <div class="modal-body">
      	<h3 class="modal-title" id="modalTitle" style='font-size: 21px; font-weight: bolder; margin-bottom: 10px;'></h3>
        <span id='modalDesc'></span>
      </div>
      <div class="col-sm-12 align-items-right">
			<span class='signal-date' id='modalDate'><i class="fas fa-clock fa-fw grey"></i></span>
	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <a id='extralink' type="button" target='_blank' class="btn btn-info" style='color:#fff;display:none;'>Details</a>
      </div>
    </div>
  </div>
</div>
</body>

  

</html>
