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
                   <a href="<?php echo base_url(); ?>/user/" class="btn btn-primary" style="margin: 10px;">Back </a>
              </div>&nbsp;</div>
          <div class="col-lg-6">
          	<div class="col-lg-12">
            <div class="p-5">
             
              <?php
              	if($_GET['msg'] != "")
              	{
              ?>
              <center><span class="h4 text-red-900 mb-4" style='color: #f55; font-weight: bold; font-size: 15px;'><?php echo $_GET['msg'];?></span></center>
              <?php } ?>
                <center><div class="text-red-900 form-group" id='error'>
						
                </div></center>
              <form class="user" id="form" enctype="multipart/form-data">
                  <center><h4>Profile</h4></center>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" value='<?php echo $profile->name;?>' id="name" name='name' placeholder="Name">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" value='<?php echo $profile->surname;?>' name="surname" id="surname" placeholder="Surname">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" value='<?php echo $profile->email;?>' disabled id="email"  name='email' placeholder="Email Address">
                </div>
               
                <div class="form-group row" style="margin-left: 0px;">
                  <input type="tel" class="form-control  form-control-user" value='<?php echo $profile->phone;?>' id="phone" name="phone" placeholder="Phone Number">
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
                </div>
                
                <div class="form-group" style="margin-left: 2px;">
                    <select style="padding:   0.5rem !important;height: 47px;" id="city_id" name="city_id" class="custom-select form-control form-control-user city" placeholder="City" selectedval="<?php echo $profile->city_id;?>">
                        <option  value="">City</option>
                       
                        </select>
                </div>
				<div class="form-group" style="margin-left: 2px;">
                    <select style="padding:   0.5rem !important;height: 47px;" id="suburb_id" name="suburb_id" class="custom-select form-control form-control-user suburb" placeholder="Suburb" selectedval="<?php echo $profile->suburb_id;?>">
                        <option  value="">Suburb</option>
                       
                        </select>
                </div>
				<div class="form-group row" style="margin-left: 0px;">
                  <input type="text" class="form-control form-control-user" value='<?php echo $profile->address;?>' name="address" id="address" placeholder="Address - Street Name & Number">
                </div>
				
				<center><h6>Banking Details to process Claims</h6></center>
				<div class="form-group row" style="margin-left: 0px;">
                  <input type="text" class="form-control form-control-user" value='<?php echo $profile->account_id;?>' name="account_id" id="account_id" placeholder="Account Id">
                </div>
				<div class="form-group row" style="margin-left: 0px;">
                  <input type="text" class="form-control form-control-user" value='<?php echo $profile->account_holder_name;?>' name="account_holder_name" id="account_holder_name" placeholder="Account Holder">
                </div>
				<div class="form-group row" style="margin-left: 0px;">
                  <input type="text" class="form-control form-control-user" value='<?php echo $profile->ifsc_code;?>' name="ifsc_code" id="ifsc_code" placeholder="IFSC Code">
                </div>
				<div class="custom-file" id="customFile" lang="es">
                        <input type="file" class="custom-file-input form-control-user" id="exampleInputFile" name='avtar' onchange="encodeImgtoBase64(this)" aria-describedby="fileHelp">
                        <label class="custom-file-label" for="exampleInputFile">
                           Upload Avatar...
                        </label>
                </div>
                <div class="form-group">
                   
                  <div class="image">
                  <?php
                  if($profile->profile_pic){
                      ?>
                      
                      <img style="height: 150px;" src="<?php echo base_url(); ?>assets/profiles/<?php echo $profile->profile_pic; ?>" id="convertImg">
                      <?php
                  }
                  ?>
                  </div>
                  <input type="hidden" class="convertImg" name="avatar">
                </div>
                <div id="updateProfile" class="btn btn-primary btn-user btn-block cursor">
                  Update Profile
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
	function encodeImgtoBase64(element) {

 

      var img = element.files[0];

 

      var reader = new FileReader();

 

      reader.onloadend = function() {

 

        $(".image").html("<img style='height: 150px;' src='"+reader.result+"'>");

 

        $(".convertImg").val(reader.result);

      }

      reader.readAsDataURL(img);

    }
$('.custom-file-input').on('change',function(){
    var fileName = $(this).val();
   
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
})
</script>
<link id="bsdp-css" href="<?php echo base_url(); ?>assets/css/bootstrap-datepicker3.min.css" rel="stylesheet">
 <script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.en-GB.min.js" charset="UTF-8"></script>
    <script>
        $('#dob').datepicker({
               autoclose: true,
    });</script>
</html>

