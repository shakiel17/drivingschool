<div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="profile-image">
                  <img class="img-xs rounded-circle" src="<?=base_url();?>design/admin/images/faces/face8.jpg" alt="profile image">
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                  <p class="profile-name"><?=$this->session->fullname;?></p>
                  <p class="designation">Administrator</p>
                </div>
                <div class="icon-container">
                  <i class="icon-bubbles"></i>
                  <div class="dot-indicator bg-danger"></div>
                </div>
              </a>
            </li>
            <li class="nav-item nav-category">
              <span class="nav-link">Dashboard</span>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url();?>admin_main">
                <span class="menu-title">Home</span>
                <i class="icon-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item nav-category"><span class="nav-link">Transaction</span></li>            
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url();?>manage_enrollee">
                <span class="menu-title">Enrollees</span>
                <i class="icon-people menu-icon"></i>
              </a>
            </li>            
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Settings</span>
                <i class="icon-settings menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="<?=base_url();?>manage_instructor">Instructor</a></li>
                  <li class="nav-item"> <a class="nav-link" href="<?=base_url();?>manage_cars">Cars</a></li>
                  <li class="nav-item"> <a class="nav-link" href="<?=base_url();?>manage_chat">Chat Support</a></li>
                </ul>
              </div>
            </li>                        
          </ul>
        </nav>