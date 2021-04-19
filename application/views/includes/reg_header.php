<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
   <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/images/bafevicon.png" type="image/png">


  <?php //$pageName = basename($_SERVER['PHP_SELF']);
  $_POST['head_title']='BIT10X';
  if($this->router->fetch_method()=='index')  $_POST['head_title']='Login at BIT10X';
  if($this->router->fetch_method()=='login') $_POST['head_title']='Login at BIT10X';
  if($this->router->fetch_method()=='register') $_POST['head_title']='Create Account at BIT10X';
  if($this->router->fetch_method()=='resetpassword') $_POST['head_title']='Reset Password at BIT10X';
  if($this->router->fetch_method()=='forgot') $_POST['head_title']='Forgot Password at BIT10X';
  if($this->router->fetch_method()=='profile') $_POST['head_title']='Profile';
  ?>
  <title><?php echo ucwords($_POST['head_title']);?></title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url(); ?>assets/resources/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url(); ?>assets/resources/css/sb-admin-2.min.css" rel="stylesheet">
  
  <style>
  @media only screen and (min-width: 800px) {
  #wrapper #content-wrapper #content {
    transform: scale(0.9);
    margin: -64px;
  }
}
</style>
<script>
var baseUrl= "<?php echo base_url(); ?>";
</script>