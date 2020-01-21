    <!-- main menu-->
    <div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
      <!-- main menu header-->
      <!--div class="main-menu-header">
        <input type="text" placeholder="Search" class="menu-search form-control round"/>
      </div-->
      <!-- / main menu header-->
      <!-- main menu content-->
      <div class="main-menu-content">
        <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
           <li class="nav-item">
            <a href="<?php echo base_url(); ?>home/dashboard"  class="<?php echo ($activeTab == "dashboard") ? "active" : ""; ?>">
              <i class="icon-dashboard"></i><span data-i18n="nav.dash.main" class="menu-title">Dashboard</span>
            </a>
            
          </li> 
          <?php if($this->session->userdata('AdminId')==1){ ?>
            
        <li class="nav-item <?php echo ($activeTab == "AddAdmin"|| $activeTab == "Adminlist") ? "open" : ""; ?>">
            <a class="<?php echo ($activeTab == "AddAdmin" || $activeTab == "Adminlist") ? "active" : ""; ?>">
              <i class="icon-user"></i><span data-i18n="nav.dash.main" class="menu-title">Admin</span>
            </a>
            <ul class="menu-content">
              <li>
                <a href="<?php echo base_url(); ?>Admin/AddAdmin" data-i18n="nav.dash.main" class="menu-item  <?php echo ($activeTab == "AddAdmin") ? "active" : ""; ?>" ><i class="icon-plus"></i> Add Admin</a>
              </li>
              <li>
              <li>
                <a href="<?php echo base_url(); ?>Admin/Adminlist" data-i18n="nav.dash.main" class="menu-item <?php echo ($activeTab == "Adminlist") ? "active" : ""; ?>"><i class="icon-file-text2"></i>List of Admin</a>
              </li>
            </ul>
          </li> 
          <?php } ?> 


          <li class="nav-item <?php echo ($activeTab == "AddUser"|| $activeTab == "Userlist") ? "open" : ""; ?>">
            <a class="<?php echo ($activeTab == "AddUser" || $activeTab == "Userlist") ? "active" : ""; ?>">
              <i class="icon icon-users"></i><span data-i18n="nav.dash.main" class="menu-title">User</span>
            </a>
            <ul class="menu-content">
             <!--  <li>
                <a href="<?php// echo base_url(); ?>user/AddUser" data-i18n="nav.dash.main" class="menu-item  <?php //echo ($activeTab == "AddUser") ? "active" : ""; ?>" ><i class="icon-plus"></i> Add User</a>
              </li> -->
              <li>
              <li>
                <a href="<?php echo base_url(); ?>user/Userlist" data-i18n="nav.dash.main" class="menu-item <?php echo ($activeTab == "Userlist") ? "active" : ""; ?>"><i class="icon-file-text2"></i>List of User</a>
              </li>
            </ul>
          </li> 

          <li class="nav-item <?php echo($activeTab == "homeadd" || $activeTab =="homelist") ? "open" : ""; ?>">
            <a class="<?php echo ($activeTab == "homeadd" || $activeTab == "homelist") ? "active" : ""; ?>">
              <i class="icon-home"></i><span data-i18n="nav.dash.main" class="menu-title">About Home</span>
            </a>
            <ul class="menu-content">
              <li>
                <a href="<?php echo base_url(); ?>Abouthome/homeadd" data-i18n="nav.dash.main" class="menu-item <?php echo ($activeTab == "homeadd") ? "active" : ""; ?>"><i class="icon-plus"></i> Add About Home</a>
              </li>

              <li>
                <a href="<?php echo base_url(); ?>Abouthome" data-i18n="nav.dash.main" class="menu-item <?php echo ($activeTab == "homelist") ? "active" : ""; ?>"><i class="icon-file-text2"></i>List of About Home</a>
              </li>
            </ul>
          </li> 

          <li class="nav-item <?php echo($activeTab == "aboutusadd"||$activeTab =="aboutuslist") ? "open" : ""; ?>">
            <a class="<?php echo ($activeTab == "aboutusadd" || $activeTab == "aboutuslist") ? "active" : ""; ?>">
              <i class="icon-info-circle"></i><span data-i18n="nav.dash.main" class="menu-title">About Us</span>
            </a>
            <ul class="menu-content">
              <!-- <li>
                <a href="<?php //echo base_url(); ?>About/Aboutadd" data-i18n="nav.dash.main" class="menu-item <?php //echo ($activeTab == "aboutusadd") ? "active" : ""; ?>"><i class="icon-plus"></i> Add About</a>
              </li> -->

              <li>
                <a href="<?php echo base_url(); ?>About/Aboutlist" data-i18n="nav.dash.main" class="menu-item <?php echo ($activeTab == "aboutuslist") ? "active" : ""; ?>"><i class="icon-file-text2"></i>List of About </a>
              </li>
            </ul>
          </li> 

          <li class="nav-item <?php echo($activeTab == "productadd" || $activeTab =="productlist") ? "open" : ""; ?>">
            <a class="<?php echo ($activeTab == "productadd" || $activeTab == "productlist") ? "active" : ""; ?>">
              <i class="icon-product-hunt"></i><span data-i18n="nav.dash.main" class="menu-title">Product</span>
            </a>
            <ul class="menu-content">
              <li>
                <a href="<?php echo base_url(); ?>product/productadd" data-i18n="nav.dash.main" class="menu-item <?php echo ($activeTab == "productadd") ? "active" : ""; ?>"><i class="icon-plus"></i> Add Product</a>
              </li>

              <li>
                <a href="<?php echo base_url(); ?>Product/productlist" data-i18n="nav.dash.main" class="menu-item <?php echo ($activeTab == "productlist") ? "active" : ""; ?>"><i class="icon-file-text2"></i>List of Product</a>
              </li>
            </ul>
          </li> 


           <li class="nav-item <?php echo($activeTab == "courieradd" || $activeTab =="courierlist") ? "open" : ""; ?>">
            <a class="<?php echo ($activeTab == "courieradd" || $activeTab == "courierlist") ? "active" : ""; ?>">
              <i class="icon-envelope"></i><span data-i18n="nav.dash.main" class="menu-title">Courier Type</span>
            </a>
            <ul class="menu-content">
              <li>
                <a href="<?php echo base_url(); ?>couriertype/courieradd" data-i18n="nav.dash.main" class="menu-item <?php echo ($activeTab == "courieradd") ? "active" : ""; ?>"><i class="icon-plus"></i> Add Type</a>
              </li>

              <li>
                <a href="<?php echo base_url(); ?>couriertype/courierlist" data-i18n="nav.dash.main" class="menu-item <?php echo ($activeTab == "courierlist") ? "active" : ""; ?>"><i class="icon-file-text2"></i>List of Type</a>
              </li>
            </ul>
          </li> 


          <li class="nav-item <?php echo($activeTab == "clockadd" || $activeTab =="clocklist") ? "open" : ""; ?>">
            <a class="<?php echo ($activeTab == "clockadd" || $activeTab == "clocklist") ? "active" : ""; ?>">
              <i class="icon-clock-o"></i><span data-i18n="nav.dash.main" class="menu-title">Country Clock</span>
            </a>
            <ul class="menu-content">
              <li>
                <a href="<?php echo base_url(); ?>clock/clockadd" data-i18n="nav.dash.main" class="menu-item <?php echo ($activeTab == "clockadd") ? "active" : ""; ?>"><i class="icon-plus"></i> Add Clock</a>
              </li>

              <li>
                <a href="<?php echo base_url(); ?>clock/clocklist" data-i18n="nav.dash.main" class="menu-item <?php echo ($activeTab == "clocklist") ? "active" : ""; ?>"><i class="icon-file-text2"></i>List of Clock</a>
              </li>
            </ul>
          </li> 



          <li class="nav-item <?php echo($activeTab == "serviceadd" || $activeTab =="servicelist") ? "open" : ""; ?>">
            <a class="<?php echo ($activeTab == "serviceadd" || $activeTab == "servicelist") ? "active" : ""; ?>">
              <i class="icon-tasks"></i><span data-i18n="nav.dash.main" class="menu-title">Services</span>
            </a>
          <ul class="menu-content">
            <li>
                <a href="<?php echo base_url(); ?>services/serviceadd" data-i18n="nav.dash.main" class="menu-item <?php echo ($activeTab == "serviceadd") ? "active" : ""; ?>"><i class="icon-plus"></i>Add Services</a>
            </li>
            <li>
              <a href="<?php echo base_url(); ?>services/servicelist" data-i18n="nav.dash.main" class="menu-item <?php echo ($activeTab == "servicelist") ? "active" : ""; ?>"><i class="icon-file-text2"></i>List of Services </a>
            </li>
          </ul>

         

          <li class="nav-item <?php echo($activeTab == "resourcesadd" || $activeTab =="resourceslist") ? "open" : ""; ?>">
          <a class="<?php echo ($activeTab == "resourcesadd" || $activeTab == "resourceslist") ? "active" : ""; ?>">
            <i class="icon-adjust"></i><span data-i18n="nav.dash.main" class="menu-title">Resources</span>
          </a>
          <ul class="menu-content">
            <li>
                <a href="<?php echo base_url(); ?>Resources/resourcesadd" data-i18n="nav.dash.main" class="menu-item <?php echo ($activeTab == "resourcesadd") ? "active" : ""; ?>"><i class="icon-plus"></i>Add Resources</a>
            </li>
            <li>
              <a href="<?php echo base_url(); ?>Resources/resourceslist" data-i18n="nav.dash.main" class="menu-item <?php echo ($activeTab == "resourceslist") ? "active" : ""; ?>"><i class="icon-file-text2"></i>List of Resources</a>
            </li>
          </ul>

         

          

          <li class="nav-item <?php echo($activeTab == "inquiryadd" || $activeTab =="inquirylist") ? "open" : ""; ?>">
            <a class="<?php echo ($activeTab == "inquiryadd" || $activeTab == "inquirylist") ? "active" : ""; ?>">
              <i class="icon-question-circle"></i><span data-i18n="nav.dash.main" class="menu-title">Inquiry</span>
            </a>
            <ul class="menu-content">
              <!-- <li>
                <a href="<?php// echo base_url(); ?>About/Aboutadd" data-i18n="nav.dash.main" class="menu-item <?php //echo ($activeTab == "inquiryadd") ? "active" : ""; ?>"><i class="icon-plus"></i> Add About</a>
              </li> -->
              <li>
                <a href="<?php echo base_url(); ?>contact/inquirylist" data-i18n="nav.dash.main" class="menu-item <?php echo ($activeTab == "inquirylist") ? "active" : ""; ?>"><i class="icon-file-text2"></i>List of Inquiry </a>
              </li>
            </ul>
          </li> 

          
          <li class="nav-item <?php echo($activeTab == "contactadd" || $activeTab =="contactlist") ? "open" : ""; ?>">
            <a class="<?php echo ($activeTab == "contactadd" || $activeTab == "contactlist") ? "active" : ""; ?>">
              <i class="icon-address-book"></i><span data-i18n="nav.dash.main" class="menu-title">Contact Us</span>
            </a>
            <ul class="menu-content">
              <li>
                <a href="<?php echo base_url(); ?>Contact/contactadd" data-i18n="nav.dash.main" class="menu-item <?php echo ($activeTab == "contactadd") ? "active" : ""; ?>"><i class="icon-plus"></i> Add Contcat</a>
              </li>
              <li>
                <a href="<?php echo base_url(); ?>Contact/contactlist" data-i18n="nav.dash.main" class="menu-item <?php echo ($activeTab == "contactlist") ? "active" : ""; ?>"><i class="icon-file-text2"></i>List of Contcat </a>
              </li>
            </ul>
          </li> 
          

        <!--   <li class="nav-item <?php echo $activeTab =="sitesettinglist" ? "open" : ""; ?>">
            <a class="<?php echo  $activeTab == "sitesettinglist" ? "active" : ""; ?>">
              <i class="icon-cog"></i><span data-i18n="nav.dash.main" class="menu-title">Site Setting</span>
            </a>
            <ul class="menu-content">
             
              <li>
                <a href="<?php echo base_url(); ?>home/Sitesetting" data-i18n="nav.dash.main" class="menu-item <?php echo ($activeTab == "sitesettinglist") ? "active" : ""; ?>"><i class="icon-file-text2"></i>List of Sitesetting </a>
              </li>
            </ul>
          </li> --> 
         
         
      </div>
      <!-- /main menu content-->
      <!-- main menu footer-->
      <!-- include includes/menu-footer-->
      <!-- main menu footer-->
    </div>
    <!-- / main menu-->