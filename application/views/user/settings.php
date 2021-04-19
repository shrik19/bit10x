<!DOCTYPE html>
<html lang="en">

<head>

 	<?php $this->load->view('includes/user_header'); ?>
<style>
#wrapper #content-wrapper #content {
    
    margin: -37px !important;
}
</style>
</head>

<?php
// echo "<pre>";
// print_r($ticker);
// die;
?>
<body id="page-top">

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
         
          	<div class="row">
          	
          		<div class="col-xl-12 col-lg-12  non-signal">
				<center>
				  <div class="card shadow mb-4 min-height-by-2  non-signal">
				       <div class='col-lg-3'><div class="text-left">
                    <a href="<?php echo base_url(); ?>/user/" class="btn btn-primary" style="margin: 10px;">Back </a>
              </div>&nbsp;</div>
				  		<h2> Below's are policies</h2>
							<?php
                              $links='';
                              foreach($policies as $d)
                              $links.= '<div class=""><a target="_blank" id="'.$d->id.'"  href="'.base_url().'assets/policies/'.$d->policyfile.'">'.$d->title.'</a> </div>';
                              
                              echo $links;
                              ?>
				  </div>
				  </center>
				 
				</div>
          	
          		

				 
        	</div>
			
        <!-- /.container-fluid -->
        </div>  
      </div>
      <!-- End of Main Content -->
 
      <?php $this->load->view('includes/user_footer'); ?>

  </div>
  <!-- End of Page Wrapper -->
  


</body>

