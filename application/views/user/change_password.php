<!DOCTYPE html>
<html lang="en">

<head>
	  
   	  <?php $this->load->view('includes/user_header'); ?>
</head>

<body class="bg-gradient-primary">
 <?php $this->load->view('includes/user_top_menu'); ?>
  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class='col-lg-3'><div class="text-left">
                   <a href="<?php echo base_url(); ?>user/" class="btn btn-primary" style="margin: 10px;">Back </a>
              </div>&nbsp;</div>
          <div class="col-lg-6">
          	<div class="col-lg-12">
            <div class="p-5">
             
                <center><div class="text-red-900 form-group" id='error'>
						
                </div></center>
              <form class="user" id="form" enctype="multipart/form-data">
                  <center><h4>Change Password</h4></center>
                <input type="hidden" name="change_password" value="1">
                <div class="form-group">
                  <input type="password" class="form-control form-control-user" id="password" name='old_password' placeholder="Old Password">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-user" id="password" name='password' placeholder="New Password">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-user" value='' id="cpassword" name="cpassword" placeholder="Confirm Password">
                </div>
               
               
                <div id="updatepassword" class="btn btn-primary btn-user btn-block cursor">
                  Update 
                </div>
                <br>
                
               
              </form>              
            </div>
          </div>
          </div>
        </div>

      </div>
    </div>

  </div>

  <?php $this->load->view('includes/user_footer'); ?>
  
</body>
<script type="text/javascript">


</script>

</html>

