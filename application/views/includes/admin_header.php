 <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <?php 
  
  $_POST['head_title'] = ( $this->uri->segment(2) == "" ? "Dashboard" : ucwords(str_replace("_"," ",$this->uri->segment(2))));
  if($this->router->fetch_class()=='contentpage') $_POST['head_title']='Content Pages';
   if($this->router->fetch_class()=='affiliates') $_POST['head_title']='Affiliates';
    if($this->router->fetch_class()=='users') $_POST['head_title']='Users';
    $_POST['head_title']='Admin Control Panel';
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
  <script>
var baseUrl= "<?php echo base_url(); ?>";
</script>