 <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <form class="d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              	<a href='http://localhost/bit10x'><img src='<?php echo base_url(); ?>/assets/images/logo.png' class='top-logo'></a>
            </div>
          </form>
		 
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">


           
            
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bars fa-fw"></i>
              </a>
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated~~grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Menu
                </h6>
                <a class="dropdown-item d-flex align-items-center" target="_blank" href="https://www.payfast.co.za/user/login">
                  <div class="font-weight-bold">
                    <div class="text-truncate"><i class="fas fa-wallet fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Payfast </div>
                  </div>
                </a>
				<a class="dropdown-item d-flex align-items-center" href="<?php echo base_url(); ?>admin/coins">
                  <div class="font-weight-bold">
                    <div class="text-truncate"><i class="fas fa-book fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Manage Coins</div>
                  </div>
                </a>
				<a class="dropdown-item d-flex align-items-center" href="<?php echo base_url(); ?>admin/users">
                  <div class="font-weight-bold">
                    <div class="text-truncate"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Manage Users</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="<?php echo base_url(); ?>admin/contentpage">
                  <div class="font-weight-bold">
                    <div class="text-truncate"><i class="fas fa-book fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Manage Contents</div>
                  </div>
                </a>
                
              </div>
            </li>

            
            <div class="topbar-divider d-none d-sm-block"></div>

		
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $name;?></span>
                <img class="img-profile rounded-circle" src="<?php echo base_url();?>/assets/img/user.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
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
