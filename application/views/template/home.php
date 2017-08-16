<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="materialize is a material design based mutipurpose responsive template">
        <meta name="keywords" content="material design, card style, material template, portfolio, corporate, business, creative, agency">
        <meta name="author" content="trendytheme.net">
<link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.ico">
        <title>SMP AL ISRA</title>

        <!--  favicon -->
        
        <!--  apple-touch-icon -->


        <link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,700,900' rel='stylesheet' type='text/css'>
        <!-- Material Icons CSS -->
        <link href="<?php echo base_url();?>assets/fonts/iconfont/material-icons.css" rel="stylesheet">
        <!-- FontAwesome CSS -->
        <link href="<?php echo base_url();?>assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- magnific-popup -->
        <link href="vassets/magnific-popup/magnific-popup.css" rel="stylesheet">
        <!-- flexslider -->
        <link href="<?php echo base_url();?>assets/flexSlider/flexslider.css" rel="stylesheet">
        <!-- owl.carousel -->
        <link href="<?php echo base_url();?>assets/owl.carousel/assets/owl.carousel.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/owl.carousel/assets/owl.theme.default.min.css" rel="stylesheet">
        <!-- materialize -->
        <link href="<?php echo base_url();?>assets/materialize/css/materialize.min.css" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- shortcodes -->
        <link href="<?php echo base_url();?>assets/css/shortcodes/shortcodes.css" rel="stylesheet">
        <!-- Style CSS -->
        <link href="<?php echo base_url();?>assets/style.css" rel="stylesheet">


        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>
.tt-nav.sticky {
    height: 30px;
    z-index: 1000;
    position: fixed;
    top: 0px;
}
.tt-nav {
    height: 30px;
    z-index: 1000;
    position: fixed;
    top: 0px;
}
.tt-nav.sticky .logo-brand img, .tt-nav.sticky .logo-brand img.retina {
   
	    height: 70px !important;
    width: 350px !important;
}
.tt-nav .logo-brand img {
   
	    height: 70px !important;
    width: 350px !important;
}
.page-title {
    margin-bottom: 15px;
}
</style>
    </head>

    <body id="top" class="has-header-search">


        <!--header start-->
        <header id="header" class="tt-nav nav-border-bottom sticky">

            <div class="header-sticky light-header ">

               
                <div class="container">

                    <!-- /.search-wrapper -->

                    <div id="materialize-menu" class="menuzord">

                        <!--logo start-->
                        <a href="<?php echo base_url();?>" class="logo-brand">
                            <img class="retina" src="<?php echo base_url();?>assets/images/logo.png" alt="" height="120px" width="500px"/>
                        </a>
                        <!--logo end-->

                  
                        <ul class="menuzord-menu pull-right">
                            <li>
                            <a href="<?php echo base_url();?>">Home</a>   
                            </li>
                 
                 
                          <li><a href="javascript:void(0)">Profil</a>
                                <ul class="dropdown">
                    <?php echo $this->dynamic_menu->sub_menu_profil(); ?>
                                </ul>
                                
                                
                                
                          </li>

                            <li>
                            <a href="<?php echo base_url();?>Home/gallery">Gallery</a>
                            </li>
                            <li>
                            <a href="<?php echo base_url();?>Home/news">Berita</a>
                            </li>
                            <li>
                            <a href="<?php echo base_url();?>Home/pengajar">Staff Guru</a>
                            </li>
                            <li>
                            <a href="<?php echo base_url();?>Home/input_buku_tamu">Buku Tamu </a>
                            </li>                            
       <?php 
	  if($this->session->userdata('sesi_calon_login') !=TRUE){ ?>    
                            <li>
                            <a href="<?php echo base_url();?>Psb">Penerimaan Siswa Baru</a>
                            </li>
      <?php } ?>

 

       
       
      <?php 
	  if($this->session->userdata('sesi_calon_login') ==TRUE){ ?>

					<li><a href="javascript:void(0)">
                    <?php  
					 $sesi=$this->session->userdata('sesi_calon_login');
					 echo isset($sesi)?$this->session->userdata('nm_calon_sesi'):'';
		 				?> 
                    </a>
                                <ul class="dropdown">
                                    <li><a href="<?php echo base_url();?>Psb/my_profile">Profil</a></li>
                                    <li><a href="<?php echo base_url();?>Psb/logout">Logout</a></li>
                                </ul>
                          </li>
                          
   
         <?php } ?>                 

                        </ul>
                        <!--mega menu end-->

                    </div>
                </div>
            </div>
        </header>
        <!--header end-->

        
        
        <!--page title start-->
        <section class="page-title ptb-50" style="margin-top:60px">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                    <img class="retina" src="<?php echo base_url();?>assets/images/smp_depan.jpg" alt="" height="320px" width="100%"/>
                    </div>
                </div>
            </div>
        </section>

                
        <!--page title start-->
        <section class="page-title ptb-50" style="margin-top:-60px">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url();?>">Home</a></li>
                            <li class="active"><?php echo isset($navigasi)?$navigasi:'' ;?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <!--page title end-->



        <!-- blog section start -->
        <?php echo $this->load->view('template/content');?>
        <!-- blog section end -->


        <!-- blog section start -->
        <?php echo $this->load->view('content/testimoni');?>
        <!-- blog section end -->
        
        <footer class="footer footer-four">
            <div class="primary-footer brand-bg text-center">
                <div class="container">



                  <hr class="mt-15">

                  <div class="row">
                    <div class="col-md-12">
                          <div class="footer-logo">
                         <ul>
                         <h1>SMP ISLAM AL-ISRA</h1>
                         <p style="margin-top:-12px">Jl.Tanjung Duren Raya,Grogol Petamburan</p>
                         <p  style="margin-top:-32px">Jakarta Barat</p>
                         </ul>
                          </div>

                         
                    </div><!-- /.col-md-12 -->
                  </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.primary-footer -->

            <div class="secondary-footer brand-bg darken-2 text-center">
                <div class="container">
                    <ul>
                      <li><a href="#">Home</a></li>
                      <li><a href="#">Facebook</a></li>
                      <li><a href="#">Twitter</a></li>
                      <li><a href="#">Instagram</a></li>
                    </ul>
                </div><!-- /.container -->
            </div><!-- /.secondary-footer -->
        </footer>





        <!-- jQuery -->
        <script src="<?php echo base_url();?>assets/js/jquery-2.1.3.min.js"></script>
        <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>assets/materialize/js/materialize.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/menuzord.js"></script>
    <!--   --> <script src="assets/js/bootstrap-tabcollapse.min.js"></script>
        <script src="assets/js/jquery.easing.min.js"></script>
        <script src="assets/js/imagesloaded.js"></script>
        <script src="assets/js/instafeed.min.js"></script>
        <script src="assets/js/jquery.sticky.min.js"></script>
       
        <script src="assets/js/twitterFetcher.min.js"></script>
        <script src="assets/js/jquery.stellar.min.js"></script>
        <script src="assets/js/jquery.shuffle.min.js"></script>
        <script src="assets/owl.carousel/owl.carousel.min.js"></script>
        <script src="assets/flexSlider/jquery.flexslider-min.js"></script>
        
        <script src="<?php echo base_url();?>assets/js/scripts.js"></script>
        <!-- add this script to show twitter feed in sidebar -->
        <script>

        </script>
    </body>
  
</html>