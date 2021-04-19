 <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top">

          <!-- Sidebar Toggle (Topbar) -->
          <!-- 
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
 -->

          <!-- Topbar Navbar -->
          <ul class="navbar-nav " >
		  <li class="nav-item  no-arrow logoli">
			<a class="nav-link "><b>BIT10X</b></a>
		  </li>
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-white-600 small"></span>
                <img class="img-profile rounded-circle" src="<?php echo base_url();?>assets/profiles/<?php if($profile_pic) echo $profile_pic; else echo 'user.png'; ?>">
              </a>
			  
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <center><strong></strong></center>
                </a>
                <a class="dropdown-item" href="<?php echo base_url(); ?>user/">
                  <i class="fas fa-user  fa-sm fa-fw mr-2 text-gray-400"></i>
                  Dashboard
                </a>
                <a class="dropdown-item" href="<?php echo base_url(); ?>user/profile">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="<?php echo base_url(); ?>user/change_password">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Change Password
                </a>
               
                <a class="dropdown-item" href="<?php echo base_url(); ?>user/settings">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
               
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            
            
            </li>
            
          </ul>
		
        
        </nav>
        
        <!-- End of Topbar -->
