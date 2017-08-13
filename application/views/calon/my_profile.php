<style>
.card-title{
	color:#666;
}
.calon-menu{
	margin-bottom:10px;
}
.calon-menu li{
	margin-bottom:10px;
}
</style>
<style>
#profil-side{
	border:1px #e0e0e0 solid;
	padding:30px 0px 200px 6px;	
}
</style>


    <div class="container">

      <!--   Icon Section   -->
      <div class="row">
    <div class="col s12 m2 l2" id="profil-side">
              
              <h5>Halaman ku</h5>
              <ul class="calon-menu">
              <li><a href="<?php echo base_url();?>Psb/my_profile">Profil Ku</a></li>
              <li><a href="<?php echo base_url();?>Psb/form_daftar_siswa">Form Pendaftaran</a></li>
              </ul>
            
    </div>
    
    <div class="col s12 m9 l9" style="margin-left:10px">
              <?php echo $this->load->view($content_profile);?>
    </div>
    
    
    </div>
    
    </div>
    

