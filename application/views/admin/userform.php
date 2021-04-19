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
            <div class="col-xl-8 col-lg-8">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Save User Details</h6>
                  <span class="pull-right"><a href="<?php echo base_url(); ?>admin/users">Back</a></span>
                </div>
                <!-- Card Body -->
                <div class="card-body iframe-related" >
                    
                    <?php
                    $attributes = ['method' => 'post', 'id' => 'myform'];
                echo form_open('admin/usersave/', $attributes);
                    ?>
                 
                  <center><h4>Profile</h4></center>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" value='<?php echo $profile->name;?>' id="name" name='name' placeholder="Name">
				  <?php echo form_error('name', '<div style="color:red;">', '</div>'); ?>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" value='<?php echo $profile->surname;?>' name="surname" id="surname" placeholder="Surname">
				  <?php echo form_error('surname', '<div style="color:red;">', '</div>'); ?>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" value='<?php echo $profile->email;?>' disabled id="email"  name='email' placeholder="Email Address">
				  <?php echo form_error('email', '<div style="color:red;">', '</div>'); ?>
                </div>
               
                <div class="form-group row" style="margin-left: 0px;">
                  <input type="tel" class="form-control  form-control-user" value='<?php echo $profile->phone;?>' id="phone" name="phone" placeholder="Phone Number">
				  <?php echo form_error('phone', '<div style="color:red;">', '</div>'); ?>
                </div>
                <div class="form-group" style="margin-left: 2px;">
                    <select style="padding:   0.5rem !important;height: 47px;" id="province_id" name="province_id" class="custom-select form-control form-control-user province" placeholder="State" selectedval="<?php echo $profile->province_id; ?>">
                        <option  value="">Province</option>
                        <?php
                        foreach($provinces as $province){
                            ?>
                            <option <?php if($profile->province_id==$province->id) echo'selected="selected"'; ?> value="<?php echo $province->id ?>"><?php echo $province->province ?></option>
                            <?php
                        }
                        ?>
                        </select>
						<?php echo form_error('province_id', '<div style="color:red;">', '</div>'); ?>
                </div>
                
                <div class="form-group" style="margin-left: 2px;">
                    <select style="padding:   0.5rem !important;height: 47px;" id="city_id" name="city_id" class="custom-select form-control form-control-user city" placeholder="City" selectedval="<?php echo $profile->city_id;?>">
                        <option  value="">City</option>
                       
                        </select>
						<?php echo form_error('city_id', '<div style="color:red;">', '</div>'); ?>
                </div>
				<div class="form-group" style="margin-left: 2px;">
                    <select style="padding:   0.5rem !important;height: 47px;" id="suburb_id" name="suburb_id" class="custom-select form-control form-control-user suburb" placeholder="Suburb" selectedval="<?php echo $profile->suburb_id;?>">
                        <option  value="">Suburb</option>
                       
                        </select>
						<?php echo form_error('suburb_id', '<div style="color:red;">', '</div>'); ?>
                </div>
				<div class="form-group row" style="margin-left: 0px;">
                  <input type="text" class="form-control form-control-user" value='<?php echo $profile->address;?>' name="address" id="address" placeholder="Address - Street Name & Number">
				  <?php echo form_error('address', '<div style="color:red;">', '</div>'); ?>
                </div>
				
				<center><h6>Banking Details to process Claims</h6></center>
				<div class="form-group row" style="margin-left: 0px;">
                  <input type="text" class="form-control form-control-user" value='<?php echo $profile->account_id;?>' name="account_id" id="account_id" placeholder="Account Id">
				  <?php echo form_error('account_id', '<div style="color:red;">', '</div>'); ?>
                </div>
				<div class="form-group row" style="margin-left: 0px;">
                  <input type="text" class="form-control form-control-user" value='<?php echo $profile->account_holder_name;?>' name="account_holder_name" id="account_holder_name" placeholder="Account Holder">
				  <?php echo form_error('account_holder_name', '<div style="color:red;">', '</div>'); ?>
                </div>
				<div class="form-group row" style="margin-left: 0px;">
                  <input type="text" class="form-control form-control-user" value='<?php echo $profile->ifsc_code;?>' name="ifsc_code" id="ifsc_code" placeholder="IFSC Code">
				  <?php echo form_error('ifsc_code', '<div style="color:red;">', '</div>'); ?>
                </div>
				<input type="hidden" name="id" value="<?php echo $profile->id;?>">
                <input type="submit" id="" value="Update Profile" class="btn btn-primary btn-user btn-block cursor">
                  
               
                <br>
                
               
              </form>              
            
				  </div>
            </div>
          </div>
		
		
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <?php $this->load->view('includes/admin_footer'); ?>
<script src="<?php echo base_url(); ?>/assets/resources/js/script.js"></script>

  </div>
  <!-- End of Page Wrapper -->

<style>
.col-xl-8 {
    
    left: 15% !important;
}
</style>
</body>
    <link id="bsdp-css" href="<?php echo base_url(); ?>assets/css/bootstrap-datepicker3.min.css" rel="stylesheet">

<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.en-GB.min.js" charset="UTF-8"></script>
    <script>
        $('#dob').datepicker({
               autoclose: true,
    });</script>
</html>
