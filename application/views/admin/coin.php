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
                  <span class="pull-right"><a href="<?php echo base_url(); ?>admin/coinsadd">Add New</a></span>
                </div>
                <!-- Card Body -->
                <div class="card-body iframe-related">
                  
                <?php
                if($this->session->flashdata('coin_save')){
                    ?>
                    <div class="alert alert-success col-lg-12">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close" coin="close">×</a>
                        <?php echo $this->session->flashdata('coin_save'); ?></div>
                    <?php
                } ?>
                  <table class="table table-striped" id="coinstbl">
                <thead>
                  <tr>
                    <th>Title</th>
                    <th>Status</th>
                    <th class="no-sort">Action</th>
                  </tr>
                </thead>
                <tbody>
                     <?php foreach ($data as $d) { ?>      
                      <tr>
                          <td><?php echo $d->coin; ?></td>
                          <td><?php if($d->status==1) echo'Active'; else echo'Block'; ?></td>          
                      <td>
                        
                         <a class="btn btn-xs" href="<?php echo base_url('/admin/coindit/'.$d->id) ?>"><i class="fa fa-edit"></i></a>
                          <button id="<?php echo $d->id; ?>" data-toggle="modal" data-target="#deletecontentModal" class="btn btn-xs deletecontentbtn"><i class="fa fa-trash"></i></button>
                        
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
         <!-- delete content Modal-->
  <div class="modal fade" id="deletecontentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-coin" id="exampleModalLabel">Are you Sure?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">You will not able to recover this page</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary deletecontentlink" href="/admin/coindelete/">Yes</a>
        </div>
      </div>
    </div>
  </div>
  
      <?php $this->load->view('includes/admin_footer'); ?>

  </div>
  <!-- End of Page Wrapper -->


</body>
<link href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
  
 <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js" referrerpolicy="origin"></script>
    <script src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap4.min.js" referrerpolicy="origin"></script>
<script>
$(document).ready(function() {
    $('#coinstbl').DataTable( {
        "columnDefs": [ {
          "targets": 'no-sort',
          "orderable": false,
    } ]
} );
} );
$(".deletecontentbtn").click(function(){
  $('.deletecontentlink').attr('href',baseUrl+"admin/coindelete/"+$(this).attr('id'));
}); 
</script>

</html>
