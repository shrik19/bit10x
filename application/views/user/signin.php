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
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
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
                    <h1 class="h4 text-gray-900 mb-4"><a href='/'><img src='<?php echo base_url();?>assets/img/logo.png' class='logo'/></a></h1>
                  </div>
                  <form class="user">
                    <div class="form-group">
                      <input type="email" autocomplete="none" class="form-control form-control-user" id="email" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                    </div>
                    <div class="form-group">
                        <div class="row" style="margin-left: 0px;">
                      <input type="password" class="form-control form-control-user col-md-11" id="password" placeholder="Password">
                      <a href="javascript:void" class="showhidepassword col-md-1" style="margin-top: 20px;"><i class="fa fa-eye " aria-hidden="true" ></i></a>
                    </div>
                    </div>
                    <div id="login" class="btn btn-primary btn-user btn-block cursor">
                      Login
                    </div>
                    
                    <br>
                    <div class="form-group" id='error'>
						
                	</div>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="<?php echo base_url(); ?>user/forgot">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="<?php echo base_url(); ?>user/register">Create an Account!</a>
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

