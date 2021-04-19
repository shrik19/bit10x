<!DOCTYPE html>
<html lang="en">

<head>
  	  <?php $this->load->view('includes/reg_header'); ?>
</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
              <!-- 
<div class="col-lg-6 d-none d-lg-block grey">
              		 <br>
              		 <div class="row">
						<div class="col-sm-6 padding">
							<a href='/user/site'><img src='<?php echo base_url();?>/assets/images/home.png'><br><label>Details</label></a>
						</div>
              		
						<div class="col-sm-6 padding">
							<a href='/user/dashboard'><img src='<?php echo base_url();?>/assets/images/dash.png'><br><label>Dashboard</label></a>
						</div>
					  </div>	
              		  <div class="row">
						<div class="col-sm-6 padding">
							<a href='/user/signals'><img src='<?php echo base_url();?>/assets/images/signals.png'><br><label>Signals</label></a>
						</div>
              		
						<div class="col-sm-6 padding">
							<a href='/user/training'><img src='<?php echo base_url();?>/assets/images/trading.png'><br><label>Training</label></a>
						</div>
					  </div>
              	
              
              </div>
 -->
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4"><a href='/'><img src='<?php echo base_url();?>/assets/img/logo.png' class='logo'/></a></h1>
                  </div>
                  <form class="user">
                    <div class="form-group">
                      <input type="password" autocomplete="none" class="form-control form-control-user" id="password"  placeholder="Enter Password...">
                    </div>
					<div class="form-group">
                      <input type="password" autocomplete="none" class="form-control form-control-user" id="cpassword"  placeholder="Enter Confirm Password...">
                    </div>
                   <input type="hidden" id="parameter" value="<?php echo $string; ?>">
                    <div id="resetpassword" class="btn btn-primary btn-user btn-block cursor">
                      Update Password
                    </div>
                    
                    <br>
                    <div class="form-group" id='error'>
						
                	</div>
                  </form>
                  <hr>
                 
                  <div class="text-center">
                    <a class="small" href="<?php echo base_url(); ?>user/login">Go Back To Login</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <?php $this->load->view('includes/reg_footer'); ?>

</body>

</html>

