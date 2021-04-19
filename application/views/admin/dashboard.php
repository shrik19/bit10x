<!DOCTYPE html>
<html lang="en">

<head>

 	<?php $this->load->view('includes/admin_header'); ?>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

       <?php $this->load->view('includes/admin_top_menu'); ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

         <?php $this->load->view('includes/admin_top_bar'); ?>

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Live BTC-ZAR</h6>
                  
                </div>
                <!-- Card Body -->
                <div class="card-body iframe-related">
                  <div class="chart-area iframe-related">
                    <div class="live-coin-div iframe-related">
                    	<div class="live-coin-div2 iframe-related">
                    		<iframe id='live-coin' src="https://widget.coinlib.io/widget?type=chart&theme=light&coin_id=859&pref_coin_id=1522" width="100%" height="100%" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;line-height:14px;box-sizing:content-box;"></iframe>
                    	</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
		
			<!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Coin Converter</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body iframe-related">
                  <div class="convert-div iframe-related">
                  	<div class="iframe-related">
                  		<iframe src="https://widget.coinlib.io/widget?type=converter&theme=light" width="250" height="310" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;"></iframe></div>
                  	</div>
                </div>
              </div>
            </div>
    
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <?php $this->load->view('includes/admin_footer'); ?>

  </div>
  <!-- End of Page Wrapper -->

  <input type='text' id="holdtext" style="height:10px;width:10px;visibility:invisible" value='<?php echo $bitcoin_address;?>'/>


</body>

  <!-- Page level plugins -->
  <script src="<?php echo base_url(); ?>assets/resources/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo base_url(); ?>assets/resources/js/demo/chart-area-demo.js"></script>
  <script src="<?php echo base_url(); ?>assets/resources/js/demo/chart-pie-demo.js"></script>


</html>
