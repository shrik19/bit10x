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
                  <h6 class="m-0 font-weight-bold text-primary">
                      Users
                      </h6>
                  
                </div>
                <!-- Card Body -->
                <div class="card-body iframe-related">
                  
                <?php
                if($this->session->flashdata('user_save')){
                    ?>
                    <div class="alert alert-success col-lg-12"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                    <?php echo $this->session->flashdata('user_save'); ?></div>
                    <?php
                } ?>
                 <!--<div >
                     <form class="row" role="form" method="get" id="" action="">
                     <div class="col-md-2">
                            <div class="form-group">
                        		<select name="status" class="form-control form-control-user">
                    		    <option value="">Status</option>
                    		    <option <?php if($_GET['status']=='active') echo'selected'; ?> value="active">Active</option>
                    		    <option <?php if($_GET['status']=='expired') echo'selected'; ?> value="expired">Expired</option>
                    		    <option <?php if($_GET['status']=='notsubscribed') echo'selected'; ?> value="notsubscribed">Not Subscribed</option>
                    		    </select>
                    	    </div>
                       </div>
                      
                       <div class="col-md-1">
                         <button class="btn btn-primary" >Filter</button>
                         
                         </div>
                         <?php
                         if(isset($_GET) && !empty($_GET)) {
                             ?>
                             <div class="col-md-1">
                         <a href="users" class="btn btn-default" >Reset</a>
                         
                         </div>
                         <?php
                         } ?>
                        </form>
                 </div>-->
                  <table class="table table-striped" id="usertbl" style="width:100%">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                     <th>Phone Number</th>
                     <th>Registered on</th>
                    <th>Status</th>
                    <th class="no-sort">Action</th>
                  </tr>
                </thead>
                <tbody>
                    
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
          <h5 class="modal-title" id="exampleModalLabel">Are you Sure?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">You will not able to recover this user</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary deletecontentlink" href="<?php echo base_url(); ?>admin/userdelete/">Yes</a>
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
    
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script>
$(function() {
  $('input[name="daterange"]').daterangepicker({
     autoUpdateInput: false,
  });
  $('input[name="daterange"]').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('DD/MM/YYYY') +'-'+picker.endDate.format('DD/MM/YYYY'));
  });

  $('input[name="daterange"]').on('cancel.daterangepicker', function(ev, picker) {
      $(this).val('');
  });

});

$(document).ready(function() {
    
        $('#usertbl').DataTable({
            url: '<?php base_url(); ?>/admin/users',
            processing: true,
            serverSide: true,
            paging: true,
            searching: true,
            ordering: true,
            order: [[0, "asc"]],
            
            columnDefs: [
               { orderable: false, targets: [] }
            ],
            columns: [ {data: "name"}, {data: "email"},  {data: "phone"},{data: "created_at"},{data: "status"},  {data: "action"}]
            /** this will create datatable with above column data **/
        });
    });
    $(document).on("click",".deletecontentbtn",function() {
        $('.deletecontentlink').attr('href',baseUrl+"admin/userdelete/"+$(this).attr('id'));
}); 
 

</script>

</html>
