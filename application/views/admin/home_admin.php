<!doctype html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Remove Tap Highlight on Windows Phone IE -->
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
     <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.ico">


    <title>CRM - Customer Relationship Management</title>


    <!-- uikit -->
    <link rel="stylesheet" href="<?php echo base_url();?>asset_admin/bower_components/uikit/css/uikit.almost-flat.min.css" media="all">

    <!-- flag icons 
    <link rel="stylesheet" href="<?php echo base_url();?>asset/assets/icons/flags/flags.min.css" media="all">
    -->
 
    
    <!-- altair admin -->
    <link rel="stylesheet" href="<?php echo base_url();?>asset_admin/assets/css/main.min.css" media="all">
    
    <!-- common functions -->
    <script src="<?php echo base_url();?>asset_admin/assets/js/common.min.js"></script>
    
    <!-- uikit functions -->
    <script src="<?php echo base_url();?>asset_admin/assets/js/uikit_custom.min.js"></script>
    <script src="<?php echo base_url();?>asset_admin/sweetalert/dist/sweetalert.min.js"></script>
    <script src="<?php echo base_url();?>asset_admin/my_function.js"></script>


<style>
#sidebar_main {
    background: #444;
}
.menu_title {
    color: #fff;
}
.menu_section ul li a{
    font: 500 14px/25px Roboto,sans-serif;
    color: #ffffff;
}
ul li a {
	color:#FFF !important;
}
.material-icons {
    color: #ffffff;
}

#sidebar_main .menu_section>ul>li.submenu_trigger>a:before {
    color: #ffffff !important;
}
.uk-dropdown>ul>li>a {
    font-size: 14px;
    color: #212121 !important;
}
</style>

</head>




<body class=" sidebar_main_open sidebar_main_swipe">
    <!-- main header -->
    <header id="header_main">
        <div class="header_main_content">
            <nav class="uk-navbar">
                                
                <!-- main sidebar switch -->
                <a href="#" id="sidebar_main_toggle" class="sSwitch sSwitch_left">
                    <span class="sSwitchIcon"></span>
                </a>
                
               
                <div class="uk-navbar-flip">
                    <ul class="uk-navbar-nav user_actions">
                        
                        <li data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                            <a href="#" class="user_action_image"><img class="md-user-image" src="<?php echo base_url();?>assets/images/guru.png" alt=""/></a>
                            <div class="uk-dropdown uk-dropdown-small">
                                <ul class="uk-nav js-uk-prevent">
                                    <li><a href="page_settings.html">Settings</a></li>
                                  <li><a href="<?php echo base_url();?>Admin/logout">Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header><!-- main header end -->
    <!-- main sidebar -->
    <aside id="sidebar_main">
        
        
        
        <div class="menu_section">
        
       <h2 style="color:#FFF">&nbsp; Admin Page</h2>
            <ul>
                <li class="current_section" title="Dashboard">
                    <a href="<?php echo base_url();?>Admin/home">
                        <span class="menu_icon"><i class="material-icons">&#xE871;</i></span>
                        <span class="menu_title">Dashboard</span>
                </a></li>
                <li title="Chats">
                    <a href="#">
                        <span class="menu_icon"><i class="material-icons">&#xE0B9;</i></span>
                        <span class="menu_title">Master</span>
                    </a>
                    <ul>
                        <li><a href="<?php echo base_url();?>Admin/list_admin">Admin</a></li>
                        <li><a href="<?php echo base_url();?>Admin/list_guru">Guru</a></li>
                        <li><a href="<?php echo base_url();?>Admin/list_jabatan">Jabatan</a></li>
                        <li><a href="<?php echo base_url();?>Admin/list_kelas">Kelas</a></li>
                        <li><a href="<?php echo base_url();?>Admin/list_siswa">Siswa</a></li>
                    </ul>
                </li>
                 <li title="Chats">
                    <a href="#">
                        <span class="menu_icon"><i class="material-icons">assignment</i></span>
                        <span class="menu_title">PSB</span>
                    </a>
                    <ul>
                        <li><a href="<?php echo base_url();?>Admin/list_pendaftar">Pendaftar</a></li>
                        <li><a href="<?php echo base_url();?>Admin/formulir_pendaftaran">Submit Formulir Daftar</a></li>
              <li><a href="<?php echo base_url();?>Admin/list_verifikasi">Verifikasi Siswa Baru</a></li>
                    </ul>
                </li>
                         <li title="Scrum Board">
                    <a href="<?php echo base_url();?>Admin/list_profil">
                        <span class="menu_icon"><i class="material-icons">&#xE85C;</i></span>
                        <span class="menu_title">Profil_sekolah</span>
                </a></li>
               <li title="Scrum Board">
                    <a href="<?php echo base_url();?>Admin/list_slide">
                        <span class="menu_icon"><i class="material-icons">touch_app</i></span>
                        <span class="menu_title">Slider</span>
                </a></li>  
               <li title="Scrum Board">
                 <a href="<?php echo base_url();?>Admin/list_gallery">
                        <span class="menu_icon"><i class="material-icons">perm_media</i></span>
                        <span class="menu_title">gallery</span>
                </a></li>  
               <li title="Scrum Board">
                 <a href="<?php echo base_url();?>Admin/list_berita">
                        <span class="menu_icon"><i class="material-icons">language</i></span>
                        <span class="menu_title">posting News</span>
                </a></li>  
 <li title="Scrum Board">
                 <a href="<?php echo base_url();?>Admin/list_buku_tamu">
                        <span class="menu_icon"><i class="material-icons">language</i></span>
                        <span class="menu_title">Buku Tamu</span>
                </a></li>                
          </ul>
      </div>
</aside><!-- main sidebar end -->


     <div id="page_content">
        <div id="page_content_inner">
            <!-- statistics (small charts) --><!-- large chart -->
            <!-- circular charts -->
                        <!-- info cards -->
            <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
              <div class="uk-width-large-1-1">
                    <div class="md-card">
                    <div class="md-card-content">
                    <?php echo $this->load->view($content);?>
                </div>
                </div>
              </div>
            </div>

            <!-- info cards -->
      </div>
    </div>

    <!-- secondary sidebar -->
    <!-- secondary sidebar end -->



  
    <!-- altair common functions/helpers -->
    <script src="<?php echo base_url();?>asset_admin/assets/js/altair_admin_common.min.js"></script>
 
    <!-- page specific plugins -->
        <!-- d3 -->
<script src="<?php echo base_url();?>asset_admin/bower_components/d3/d3.min.js"></script>
        <!-- metrics graphics (charts) -->
<script src="<?php echo base_url();?>asset_admin/bower_components/metrics-graphics/dist/metricsgraphics.min.js"></script>

        <!-- peity (small charts) -->
<script src="<?php echo base_url();?>asset_admin/bower_components/peity/jquery.peity.min.js"></script>

 



    

</body>
</html>