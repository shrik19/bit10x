<!DOCTYPE html>
<html lang="en">

<head>
	  
   	  <?php $this->load->view('includes/reg_header'); ?>
</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class='col-lg-3'>&nbsp;</div>
          <div class="col-lg-6">
          	<div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4"><img src='<?php echo base_url();?>/assets/img/logo.png' class='logo'/></h1>
              </div>
             
              <center><h1 class="h4 text-red-900 mb-4" style='color: #f55; font-weight: bold; font-size: 15px;'><?php echo $response['message'];?></h1></center>
              
             
            </div>
          </div>
          </div>
        </div>

      </div>
    </div>

  </div>

  <?php $this->load->view('includes/reg_footer'); ?>
  
</body>
<?php
if($response['success']==1){
    ?>
    <script>setTimeout(function(){ location.replace('<?php echo base_url(); ?>user/login');}, 3000);</script>
    <?php
} ?>
</html>

