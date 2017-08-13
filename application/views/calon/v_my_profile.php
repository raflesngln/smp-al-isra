<style>
#box-form{
    border: 1px #e0e0e0 solid;
    padding: 6px 6px 30px 6px;
    border-radius: 4px;
}
.badge{
	padding:7px;
	width:35%;
	margin:0px auto;
	background:#b1dcfb !important;
}
</style>
    <div class="row" id="box-form">
<h4>PROFILE KU</h4>
      <!--   Icon Section   -->
<p><?php echo isset($notif)?'<h6 class="badge" align="center"><i class="fa fa-info"></i> '.$notif.'</h6>':'';?></p> 
     
 <form class="col s12" method="post" action="<?php echo base_url();?>Psb/update_my_profile">
  <?php
 foreach($my_profile as $row){
 ?>
      <div class="row">
        <div class="input-field col s6">
          <input name="nama" type="text" class="validate" id="first_name" placeholder="nama" value="<?php echo $row->nm_calon;?>">
          <label for="first_name">Nama lengkap</label>
        </div>
        <div class="input-field col s6">
          <input name="email" type="text" class="validate" id="first_name" placeholder="nama" value="<?php echo $row->email;?>" readonly="readonly">
          <label for="first_name">Email</label>
        </div>
      </div>
      
      <div class="col s12 amber accent-1">Kosongkan Password dibawah jika tidak ingin ubah password</div>
      
    <div class="row">
        <div class="input-field col s6">
          <input name="lama" type="password" class="validate" id="first_name" value="">
          <label for="first_name">Password Lama</label>
        </div>
        
      </div>
<div class="row">
        <div class="input-field col s6">
          <input name="baru" type="password" class="validate" id="first_name">
          <label for="first_name">Password baru</label>
        </div>
        <div class="input-field col s6">
          <input name="ulang" type="password" class="validate" id="first_name" >
          <label for="first_name">Ulangi password baru</label>
        </div>
      </div>
      
      <button type="submit" class="waves-effect waves-light btn">Ubah Profile</button>
      
   <?php } ?>   
    </form>
      

    </div>
    
    <script>
$(document).ready(function(e) {
    $('select').material_select();
 
            
});
	
	
	</script>
