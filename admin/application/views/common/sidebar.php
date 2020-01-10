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
              <i class="icon-user"></i><span data-i18n="nav.dash.main" class="menu-title">User</span>
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

           <li class="nav-item <?php echo($activeTab == "cityadd"||$activeTab =="citylist") ? "open" : ""; ?>">
          <a class="<?php echo ($activeTab == "cityadd" || $activeTab == "citylist") ? "active" : ""; ?>">
            <i class="icon-car"></i><span data-i18n="nav.dash.main" class="menu-title">Routes</span>
          </a>
          <ul class="menu-content">
            <li>
                <a href="<?php echo base_url(); ?>city/cityadd" data-i18n="nav.dash.main" class="menu-item <?php echo ($activeTab == "cityadd") ? "active" : ""; ?>"><i class="icon-plus"></i>Add Routes</a>
            </li>
            <li>
              <a href="<?php echo base_url(); ?>city" data-i18n="nav.dash.main" class="menu-item <?php echo ($activeTab == "citylist") ? "active" : ""; ?>"><i class="icon-file-text2"></i>List of Routes </a>
            </li>
          </ul>

          <li class="nav-item <?php echo($activeTab == "carbrandadd"||$activeTab =="carbrandlist") ? "open" : ""; ?>">
          <a class="<?php echo ($activeTab == "carbrandadd" || $activeTab == "carbrandlist") ? "active" : ""; ?>">
            <i class="icon-car"></i><span data-i18n="nav.dash.main" class="menu-title">Car Brand</span>
          </a>
          <ul class="menu-content">
            <li>
                <a href="<?php echo base_url(); ?>car/carbrandadd" data-i18n="nav.dash.main" class="menu-item <?php echo ($activeTab == "carbrandadd") ? "active" : ""; ?>"><i class="icon-plus"></i>Add Car Brand</a>
            </li>
            <li>
              <a href="<?php echo base_url(); ?>car/carbrandlist" data-i18n="nav.dash.main" class="menu-item <?php echo ($activeTab == "carbrandlist") ? "active" : ""; ?>"><i class="icon-file-text2"></i>List of Car Brand</a>
            </li>
          </ul>

          <li class="nav-item <?php echo($activeTab == "caradd"||$activeTab =="carlist") ? "open" : ""; ?>">
            <a class="<?php echo ($activeTab == "caradd" || $activeTab == "carlist") ? "active" : ""; ?>">
              <i class="icon-car"></i><span data-i18n="nav.dash.main" class="menu-title">Car</span>
            </a>
            <ul class="menu-content">
              <li>
                  <a href="<?php echo base_url(); ?>car/caradd" data-i18n="nav.dash.main" class="menu-item <?php echo ($activeTab == "caradd") ? "active" : ""; ?>"><i class="icon-plus"></i>Add Car</a>
              </li>
              <li>
                <a href="<?php echo base_url(); ?>car/carlist" data-i18n="nav.dash.main" class="menu-item <?php echo ($activeTab == "carlist") ? "active" : ""; ?>"><i class="icon-file-text2"></i>List of Car</a>
              </li>
            </ul>
          </li> 

           <li class="nav-item <?php echo($activeTab == "contactadd"||$activeTab =="luxuryquotelist") ? "open" : ""; ?>">
            <a class="<?php echo ($activeTab == "contactadd" || $activeTab == "luxuryquotelist") ? "active" : ""; ?>">
              <i class="icon-address-book"></i><span data-i18n="nav.dash.main" class="menu-title">Segment Contact</span>
            </a>
            <ul class="menu-content">
              <!-- <li>
                <a href="<?php// echo base_url(); ?>About/Aboutadd" data-i18n="nav.dash.main" class="menu-item <?php //echo ($activeTab == "aboutusadd") ? "active" : ""; ?>"><i class="icon-plus"></i> Add About</a>
              </li> -->
              <li>
                <a href="<?php echo base_url(); ?>contact/luxuryquotelist" data-i18n="nav.dash.main" class="menu-item <?php echo ($activeTab == "acontactlist") ? "active" : ""; ?>"><i class="icon-file-text2"></i>List of Luxury Inquiry </a>
              </li>
            </ul>
          </li> 

          <li class="nav-item <?php echo($activeTab == "contactadd"||$activeTab =="contactlist") ? "open" : ""; ?>">
            <a class="<?php echo ($activeTab == "contactadd" || $activeTab == "contactlist") ? "active" : ""; ?>">
              <i class="icon-address-book"></i><span data-i18n="nav.dash.main" class="menu-title">Contact Us</span>
            </a>
            <ul class="menu-content">
              <!-- <li>
                <a href="<?php// echo base_url(); ?>About/Aboutadd" data-i18n="nav.dash.main" class="menu-item <?php //echo ($activeTab == "aboutusadd") ? "active" : ""; ?>"><i class="icon-plus"></i> Add About</a>
              </li> -->
              <li>
                <a href="<?php echo base_url(); ?>contact/Contactlist" data-i18n="nav.dash.main" class="menu-item <?php echo ($activeTab == "acontactlist") ? "active" : ""; ?>"><i class="icon-file-text2"></i>List of Contact </a>
              </li>
            </ul>
          </li> 

           <li class="nav-item <?php echo($activeTab == "carreradd" || $activeTab =="carrerlist" || $activeTab =="carrierlist") ? "open" : ""; ?>">
            <a class="<?php echo ($activeTab == "carreradd" || $activeTab == "carrerlist" || $activeTab =="carrierlist") ? "active" : ""; ?>">
              <i class="icon-address-book"></i><span data-i18n="nav.dash.main" class="menu-title">Carrier</span>
            </a>
            <ul class="menu-content">
              <li>
                <a href="<?php echo base_url(); ?>carrer/carreradd" data-i18n="nav.dash.main" class="menu-item <?php echo ($activeTab == "carreradd") ? "active" : ""; ?>"><i class="icon-plus"></i> Add Carrier</a>
              </li>
              <li>
                <a href="<?php echo base_url(); ?>carrer" data-i18n="nav.dash.main" class="menu-item <?php echo ($activeTab == "carrerlist") ? "active" : ""; ?>"><i class="icon-file-text2"></i>List of Carrier </a>
              </li>
               <li>
                <a href="<?php echo base_url(); ?>contact/carrierlist" data-i18n="nav.dash.main" class="menu-item <?php echo ($activeTab == "carrierlist") ? "active" : ""; ?>"><i class="icon-file-text2"></i>List of Carrier Inquiry</a>
              </li>
            </ul>
          </li> 

          <li class="nav-item <?php echo($activeTab == "testimonialadd"||$activeTab =="testimoniallist") ? "open" : ""; ?>">
            <a class="<?php echo ($activeTab == "testimonialadd" || $activeTab == "testimoniallist") ? "active" : ""; ?>">
              <i class="icon-tasks"></i><span data-i18n="nav.dash.main" class="menu-title">Testimonial</span>
            </a>
            <ul class="menu-content">
              <li>
                  <a href="<?php echo base_url(); ?>Testimonial/Testimonialadd" data-i18n="nav.dash.main" class="menu-item <?php echo ($activeTab == "testimonialadd") ? "active" : ""; ?>"><i class="icon-plus"></i> Add Testimonial</a>
              </li>
              <li>
                <a href="<?php echo base_url(); ?>Testimonial/Testimoniallist" data-i18n="nav.dash.main" class="menu-item <?php echo ($activeTab == "testimoniallist") ? "active" : ""; ?>"><i class="icon-file-text2"></i>List of Testimonial </a>
              </li>
            </ul>
          </li> 

          <li class="nav-item <?php echo $activeTab =="sitesettinglist" ? "open" : ""; ?>">
            <a class="<?php echo  $activeTab == "sitesettinglist" ? "active" : ""; ?>">
              <i class="icon-cog"></i><span data-i18n="nav.dash.main" class="menu-title">Site Setting</span>
            </a>
            <ul class="menu-content">
             
              <li>
                <a href="<?php echo base_url(); ?>home/Sitesetting" data-i18n="nav.dash.main" class="menu-item <?php echo ($activeTab == "sitesettinglist") ? "active" : ""; ?>"><i class="icon-file-text2"></i>List of Sitesetting </a>
              </li>
            </ul>
          </li> 
         
         
      </div>
      <!-- /main menu content-->
      <!-- main menu footer-->
      <!-- include includes/menu-footer-->
      <!-- main menu footer-->
    </div>
    <!-- / main menu-->