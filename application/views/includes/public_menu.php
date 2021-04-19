<!--===== HEADER SECTION =====-->
    <!-- Preloader -->
    <div class="preloader">
        <div class="spinner">
          <div class="bounce1"></div>
          <div class="bounce2"></div>
          <div class="bounce3"></div>
        </div>
    </div>
    <!-- Preloader End -->
    <div class="scrollup">
        <i aria-hidden="true" class="fa fa-chevron-up"></i>
    </div>
    <!--back-to-top-->

    <div id="home"></div>
    <div class='iframe-scroll'>
    	<iframe src="https://widget.coinlib.io/widget?type=horizontal_v2&theme=dark&pref_coin_id=1522&invert_hover=no" width="100%" height="36px" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;"></iframe>
    </div>
    <header id="site-header" class="home-header black-bg">
        <div class="container apply-scroll-margin">
            <div class="row">
                <div class="col-md-2 header-logo">
                    <a href="/">
					<img src='<?php echo base_url()."assets/images/logo.png";?>' class='logo' style="width:182px;">
					</a>
                </div>
                <!--col-md-2-->
                <div class="col-md-10">
                    <div class="main-menu-area">
                        <nav class="header-nav">
                            <ul id="navigation">
                             <!--   <li>
                                    <a href="<?php echo base_url();?>">Home</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>user/charts">Charts</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>user/news">News</a>
                                </li>
                               
                                <li>
                                    <a href="<?php echo base_url();?>training">Training</a>
                                </li> -->
                                <?php
                                if($this->session->userdata('is_logged_in'))
		                        { ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>user/">Dashboard</a>
                                </li>
                                <?php } else { ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>user/">Sign In</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>user/register">Register</a>
                                </li>
                                <?php } ?>
                                <!-- 
<li>
                                    <a href="<?php echo base_url();?>admin/">Admin Section</a>
                                </li> 
 -->
                                
                            </ul>
                        </nav>
                        <style>
                        .header-nav li a:hover {
                                color: white !important;
                            }
                            </style>
                        <!-- //Navigation End -->
                    </div>
                    <!--slim-menu-area-->
                </div>
                <!--col-md-10-->
                <div class="col-md-12">
                    <!-- Start Mobile Nav -->
                    <div class="main-mobile-menu">
                        <nav id="mobile-nav">
                            <ul id="mobile-navigation" class="mobilenav">
                                 <li>
                                    <a href="<?php echo base_url();?>">Home</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>user/charts">Charts</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>user/news">News</a>
                                </li>
                            
                                <li>
                                    <a href="<?php echo base_url();?>training">Training</a>
                                </li>
                                 <li>
                                    <a href="/user/">Sign In</a>
                                </li> 
                               <!-- 
 <li>
                                    <a href="<?php echo base_url();?>admin/">Admin Section</a>
                                </li> 
 -->
                            </ul>
                        </nav>
                    </div>
                    <!--end-mobile-menu-->
                </div>
                <!--col-md-12-->
            </div>
            <!--row-->
        </div>
        <!--container-->
    </header>
    <!--============== END HEADER SECTION ===============-->