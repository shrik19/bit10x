 <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <?php //$_POST['head_title'] = ( $this->uri->segment(2) == "" ? "Dashboard" : ucwords(str_replace("_"," ",$this->uri->segment(2))));
  $_POST['head_title']='BIT10X';
  if($this->router->fetch_method()=='index')  $_POST['head_title']='Welcome to BIT10X';
  if($this->router->fetch_method()=='login') $_POST['head_title']='Login at BIT10X';
  if($this->router->fetch_method()=='register') $_POST['head_title']='Create Account at BIT10X';
  if($this->router->fetch_method()=='resetpassword') $_POST['head_title']='Reset Password at BIT10X';
  if($this->router->fetch_method()=='forgotpassword') $_POST['head_title']='Forgot Password at BIT10X';
  if($this->router->fetch_method()=='profile') $_POST['head_title']='Profile';
  
 // $_POST['head_title']=$this->router->fetch_class();
  ?>
  <title><?php echo $_POST['head_title'];?></title>

     <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/images/bafevicon.png" type="image/png">

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url(); ?>assets/resources/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url(); ?>assets/resources/css/sb-admin-2.min.css" rel="stylesheet">
  
  <link href="<?php echo base_url(); ?>assets/resources/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  
<style>
.logoli {
	color:white;
}
@media only screen and (min-width: 900px) {
	.navbar-nav  {
		margin-left: 16%;
	}
	.logoli {
		margin-right: 668px;
	}
	#load{ 
		left:50%;
	}
}
@media only screen and (max-width: 600px) {
	
	#load{ 
		left:39%;
	}
	.logoli {
		margin-right: 170px;
	}
}
#load{
    width:100px;
    height:100px;
    position:fixed;
    z-index:9999;
    top:50%;
    
    
}
</style>
<script>
var baseUrl= "<?php echo base_url(); ?>";
</script>