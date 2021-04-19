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
            <div class="col-xl-12 col-lg-12">
                
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Coins</h6>
         
                </div>
                <!-- Card Body -->
                <div class="card-body iframe-related">
                  
                <?php
                if($this->session->flashdata('order_delete')){
                    ?>
                    <div class="alert alert-success col-lg-12">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                        <?php echo $this->session->flashdata('order_delete'); ?></div>
                    <?php
                } ?>
                <table class="table table-striped" id="Ordertbl">
                <thead>
                  <tr>
                    <th>Coin Name</th>
                    <th>Total Orders</th>
                    <th>Total Amount</th>
                    <th class="no-sort">Action</th>
                  </tr>
                </thead>
                <tbody>

                     <?php 
                     foreach ($data as $d) { ?>      
                      <tr>
                          <td><?php echo $d->coin; ?></td>
                          <td><?php echo $d->total_order; ?></td>
                          <td><?php if($d->total_amount){
                                  echo $d->total_amount;
                                }else{
                                  echo 0;
                                }?>
                          <td>
                          <button id="<?php echo $d->id; ?>" data-toggle="modal" data-target="#deleteOrderModal" class="btn btn-xs deleteOrderbtn" title="Delete"><i class="fa fa-trash"></i></button>
                        
                      </td>     
                      </tr>
                      <?php } ?>
                  </tbody>
                  </table>
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


</body>
<link href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
  
<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js" referrerpolicy="origin"></script>
    <script src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap4.min.js" referrerpolicy="origin"></script>
<script>
/*$(document).ready(function() {
    $('#Ordertbl').DataTable( {
        "columnDefs": [ {
          "targets": 'no-sort',
          "orderable": false,
    } ]
} );
} );
$(".deleteOrderbtn").click(function(){
  $('.deleteOrderlink').attr('href',baseUrl+"admin/deleteOrder/"+$(this).attr('id'));
}); */
</script>

</html>
