<!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto" style='color:#ccc;'>
            <span>Copyright &copy; <?php echo $this->config->config["app_name"]; echo date("Y");?></span>
          </div>
        </div>
        <br>
       <!-- 
 <center style='color:#ccc;font-size:9px;'>
        	Chart &amp; converter powered by <a href="https://coinlib.io" target="_blank" style='color:#ccc'>Coinlib</a>
        </center>
 -->

      </footer>
      <!-- End of Footer -->
	
    </div>
    <!-- End of Content Wrapper -->
    
    
    <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?php echo base_url(); ?>user/logout">Logout</a>
        </div>
      </div>
    </div>
  </div>
  
 

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url(); ?>assets/resources/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/resources/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url(); ?>assets/resources/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url(); ?>assets/resources/js/sb-admin-2.min.js"></script>

  
    <script src="<?php echo base_url(); ?>assets/resources/js/script.js?ver=0.1"></script>
    
    <!-- Page level plugins -->
  <script src="<?php echo base_url(); ?>assets/resources/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/resources/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo base_url(); ?>assets/resources/js/demo/datatables-demo.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/notify.js?ver=0.1"></script>
  <?php $this->load->view('includes/common_to_all_footer'); ?>
  
 <script src="<?php echo base_url(); ?>assets/resources/js/dashboard.js?ver=1.3"></script>
 

<link href="<?php echo base_url(); ?>assets/resources/css/select2.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/resources/js/select2.full.min.js"></script>

<script>
$(".sellbuysymbol").select2({
		//theme: "bootstrap",
		placeholder: "Coins",
		width: 'auto',
		dropdownAutoWidth: true,
		//allowClear: true,
	});
	</script>