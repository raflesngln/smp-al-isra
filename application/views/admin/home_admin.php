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



    <title>SMP-BINA-UTAMA - Admin Page</title>


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


</head>
<style>
#header_main {
     background: #ececec !important; 
    /* box-shadow: 0 3px 6px rgba(0,0,0,.16), 0 3px 6px rgba(0,0,0,.23); */
    box-shadow:0px !important;
}
.gbr_profil{
	border-radius:100%;
	height:70px;
	width:70px;
}
</style>

<body class=" sidebar_main_open sidebar_main_swipe ">
    <!-- main header -->
    <header id="header_main">
            <nav class="uk-navbar ">   
                <!-- main sidebar switch -->
                <a href="#" id="sidebar_main_toggle" class="sSwitch sSwitch_left ">
                    <span class="sSwitchIcon"></span>
                </a>
        </div>
    </header>
    <!-- main sidebar -->
    <aside id="sidebar_main">
        
        <div class="sidebar_main_header">
  <img class="logo_regular gbr_profil" src="<?php echo base_url();?>assets/images/<?php echo $this->session->userdata('gambar_sess');?>" alt="" height="90" width="90"/>

          
                
                
            <!--    SETTINGS-->
                
           
<div class="uk-button-dropdown" data-uk-dropdown="" aria-haspopup="true" aria-expanded="false">
 <p>admin</p> 
                                Profile <i class="material-icons"></i>
                                <div class="uk-dropdown uk-dropdown-small uk-dropdown-bottom" aria-hidden="true" tabindex="" style="min-width: 160px; top: 34px; left: 0px;">
                                    <ul class="uk-nav uk-nav-dropdown">
                                        <li><a href="<?php echo base_url();?>Admin/logout"><i class="material-icons">settings</i> Setting Profile</a></li>
                                        <li><a href="<?php echo base_url();?>Admin/logout"><i class="material-icons">close</i> Logout</a></li>
                                    </ul>
                                </div>
          </div>
                        
               <!-- SETTING-->
                
            
      </div>
        
        <div class="menu_section">
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