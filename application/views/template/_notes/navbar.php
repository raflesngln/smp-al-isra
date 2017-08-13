<style>
.dropdown1{
	top:90px;
	width:200px !important;
	
}
.dropdown-content,.active{
		top:90px;
	
	    
}
.brand-logo{
	margin-left:20px;
	margin-top:5px;
}
.brand-logo img{
border-radius:6px;
}
.jdl_sekolah{
	margin-bottom:9px;
}
</style>
<nav>
  <div class="nav-wrapper  cyan darken-3">
    <a href="#!" class="brand-logo" style="padding-bottom:30px">
    <img src="<?php echo base_url();?>assets/images/logo.jpg" height="60" width="70" >
    <span class="jdl_sekolah">SMP BINA UTAMA</span>
    <br>
    </a>
    <ul class="right hide-on-med-and-down">
      <li><a href="<?php echo base_url();?>">Home</a></li>
      <!-- Dropdown Trigger -->
      <li><a class="dropdown-button" href="#" data-activates="dropdown1">Profil<i class="material-icons right">arrow_drop_down</i></a></li>
      <li><a href="<?php echo base_url();?>Home/gallery">Gallery</a></li>
      <li><a href="<?php echo base_url();?>Home/news">News</a></li>
       <li><a href="<?php echo base_url();?>Home/pengajar">Pengajar</a></li>
       
      <?php 
	  if($this->session->userdata('sesi_calon_login') !=TRUE){ ?>    
       <li><a href="<?php echo base_url();?>Psb">PSB</a></li>
      <?php } ?>
      
      <?php 
	  if($this->session->userdata('sesi_calon_login') ==TRUE){ ?>
	   <li>
       <a class="dropdown-button" href="#!" data-activates="dropdown2">
       	 <?php  
		 $sesi=$this->session->userdata('sesi_calon_login');
		 echo isset($sesi)?$this->session->userdata('nm_calon_sesi'):'';
		 ?>
       <i class="material-icons right">arrow_drop_down</i>
       </a>
       </li>
       <?php } ?>
       
    </ul>
                    <!-- Dropdown Structure -->
                    <ul id="dropdown1" class="dropdown-content">
                    <?php echo $this->dynamic_menu->sub_menu_profil(); ?>
                      
                    </ul>
                    <!-- Dropdown Structure -->
                    <!-- Dropdown Structure 2-->
                    <ul id="dropdown2" class="dropdown-content">
                      <li><a href="<?php echo base_url();?>Psb/my_profile">Profil</a></li>
                      <li><a href="<?php echo base_url();?>Psb/logout">logout</a></li>
                    </ul>
                     <!-- Dropdown Structure 2-->

    
<!--    for mobile-->          
<ul id="nav-mobile" class="side-nav">
      <li><a href="<?php echo base_url();?>">Home</a></li>
      <!-- Dropdown Trigger -->
      <li><a class="dropdown-button" href="#" data-activates="dropdown3">Profil<i class="material-icons right">arrow_drop_down</i></a></li>
      <li><a href="<?php echo base_url();?>Home/gallery">Gallery</a></li>
      <li><a href="<?php echo base_url();?>Home/news">News</a></li>
       <li><a href="<?php echo base_url();?>Home/pengajar">Pengajar</a></li>
       
      <?php 
	  if($this->session->userdata('sesi_calon_login') !=TRUE){ ?>    
       <li><a href="<?php echo base_url();?>Psb">PSB</a></li>
      <?php } ?>
      
      <?php 
	  if($this->session->userdata('sesi_calon_login') ==TRUE){ ?>
	   <li>
       <a class="dropdown-button" href="#!" data-activates="dropdown4">
       	 <?php  
		 $sesi=$this->session->userdata('sesi_calon_login');
		 echo isset($sesi)?$this->session->userdata('nm_calon_sesi'):'';
		 ?>
       <i class="material-icons right">arrow_drop_down</i>
       </a>
       </li>
       <?php } ?>
      </ul>
      
<!--      
 UNTUK MENU MOBILE-->
                     <!-- Dropdown Structure -->
                    <ul id="dropdown3" class="dropdown-content">
                    <?php echo $this->dynamic_menu->sub_menu_profil(); ?>
                      
                    </ul>
                    <!-- Dropdown Structure -->
                    <!-- Dropdown Structure 2-->
                    <ul id="dropdown4" class="dropdown-content">
                      <li><a href="<?php echo base_url();?>Psb/my_profile">Profil</a></li>
                      <li><a href="<?php echo base_url();?>Psb/logout">logout</a></li>
                    </ul>
                     <!-- Dropdown Structure 2-->
 
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
  </div>
</nav>