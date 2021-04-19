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
        <div class="col-lg-6 d-none d-lg-block bg-register-image"></div>

          <div class="col-lg-6">
            <div class="p-5">
              <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4"><a href='/'><img src='<?php echo base_url();?>/assets/img/logo.png' class='logo'/></a></h1>
              </div>
              <form class="user">
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" value='' id="name" placeholder="Name">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" value='' id="surname" placeholder="Surname">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" value='' id="email" placeholder="Email Address">
                </div>
                <div class="form-group ">
                    <div class="row" style="margin-left: 0px;">
                  <input type="password" class="form-control form-control-user col-md-11" value='' id="password" placeholder="Password: can only be upper, lower, numerical and special charachter">
                 <a href="javascript:void" class="showhidepassword col-md-1" style="margin-top: 20px;"><i class="fa fa-eye " aria-hidden="true" ></i></a>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row" style="margin-left: 0px;">
                  <input type="password" class="form-control form-control-user col-md-11" value='' id="cpassword" placeholder="Confirm Password">
                  <a href="javascript:void" class="showhidecpassword col-md-1"   style="margin-top: 20px;"><i class="fa fa-eye " aria-hidden="true" ></i></a>
                    </div>
                </div>
                <div class="form-group row" style="margin-left: 0px;">
                  <input type="tel" class="form-control form-control-user" value='' id="phone" placeholder="Phone Number">
                </div>
                
                <div class="form-group" style="margin-left: 2px;">
                    <select style="padding:   0.5rem !important;height: 47px;" id="province_id" name="province_id" class="custom-select form-control form-control-user province" placeholder="State" selectedval="">
                        <option  value="">Province</option>
                        <?php
                        foreach($provinces as $province){
                            ?>
                            <option value="<?php echo $province->id ?>"><?php echo $province->province ?></option>
                            <?php
                        }
                        ?>
                        </select>
                </div>
                
                <div class="form-group" style="margin-left: 2px;">
                    <select style="padding:   0.5rem !important;height: 47px;" id="city_id" name="city_id" class="custom-select form-control form-control-user city" placeholder="City" selectedval="">
                        <option  value="">City</option>
                       
                        </select>
                </div>
				<div class="form-group" style="margin-left: 2px;">
                    <select style="padding:   0.5rem !important;height: 47px;" id="suburb_id" name="suburb_id" class="custom-select form-control form-control-user suburb" placeholder="Suburb" selectedval="">
                        <option  value="">Suburb</option>
                       
                        </select>
                </div>
				<div class="form-group row" style="margin-left: 0px;">
                  <input type="text" class="form-control form-control-user" value='' id="address" placeholder="Address - Street Name & Number">
                </div>
				
				<center><h6>Banking Details to process Claims</h6></center>
				<div class="form-group row" style="margin-left: 0px;">
                  <input type="text" class="form-control form-control-user" value='' id="account_id" placeholder="Account Id">
                </div>
				<div class="form-group row" style="margin-left: 0px;">
                  <input type="text" class="form-control form-control-user" value='' id="account_holder_name" placeholder="Account Holder">
                </div>
				<div class="form-group row" style="margin-left: 0px;">
                  <input type="text" class="form-control form-control-user" value='' id="ifsc_code" placeholder="IFSC Code">
                </div>
                <!--
                <div class="form-group">
                 <select style="width:30%;padding:   0.5rem !important;height: 47px;" id="date" name="date" class="custom-select form-control form-control-user" placeholder="Date">
                        <option  value="">Date of Birth</option>
                        <?php
                        for($i=1;$i<=31;$i++){
                            if($i <10)
                                $i='0'.$i;
                            echo'<option value="'.$i.'">'.$i.'</option>';
                        }
                        ?>
                        </select>
                <select style="width:30%;padding:   0.5rem !important;height: 47px;" id="month" name="month" class="custom-select form-control form-control-user" placeholder="">
                        <option  value="">Month</option>
                        <?php
                        $months = array('01' => 'January', '02' => 'February', '03' => 'March', '04' => 'April', '05' => 'May', '06' => 'Jun', '07' => 'July', '08' => 'August', '09' => 'September', '10' => 'Octomber', '11' => 'November', '12' => 'December');

                        foreach($months as $k=>$m){
                            echo'<option value="'.$k.'">'.$m.'</option>';
                        }
                        ?>
                        </select>
                <select style="width:35%;padding:   0.5rem !important;height: 47px;" id="year" name="year" class="custom-select form-control form-control-user" placeholder="">
                        <option  value="">Year</option>
                        <?php
                        for($i=1965;$i<=date('Y');$i++){
                            echo'<option value="'.$i.'">'.$i.'</option>';
                        }
                        ?>
                        </select>
                </div>
                -->
                <div class="form-group " style="margin-left: 15%;">
                  <input type="checkbox" class="form-check-input" value='1' id="accept_policy" >
                  <span>I accept 
                  <?php
                  $links='';
                  foreach($contentpages as $d)
                  $links.= '<a target="_blank" id="'.$d->id.'"  href="'.base_url().'assets/policies/'.$d->policyfile.'">'.$d->title.'</a> , ';
                  
                    $links = str_replace($portion, (" and" . substr($portion, 1, -1)), $links);
                    
                  $links =rtrim($links, ', ');
                  echo substr_replace($links, ' and', strrpos($links, ','), 1);
                  ?>
                  </span>
                </div>
                <div id="register" class="btn btn-primary btn-user btn-block cursor">
                  Register Account
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
                <a class="small" href="<?php echo base_url(); ?>user/login">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>


<!-- policydetails content Modal-->
  <div class="modal fade" id="policydetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title policytitle" id="exampleModalLabel"></h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body policycontent"></div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
          
        </div>
      </div>
    </div>
  </div>
  <?php $this->load->view('includes/reg_footer'); ?>
  
</body>
<link id="bsdp-css" href="<?php echo base_url(); ?>assets/css/bootstrap-datepicker3.min.css" rel="stylesheet">
 <script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.en-GB.min.js" charset="UTF-8"></script>
    <script>
        $('#dob').datepicker({
               autoclose: true,
    });</script>
</html>

