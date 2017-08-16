 <style>
h1{
	font-size:26pt !important;
}
#form-box label{
	font-size:12px;
}
.input {
    border: 1px #dadada solid !important;
    padding: 4px 4px 4px 8px !important;
    background-color: #ffffff !important;
    color: #202020;
}

#form-box {
	margin-top:0px;
    border: 1px #f5f5f5 solid;
    padding-bottom: 70px;
    box-shadow: 1px 5px 13px #ddd;
    padding: 20px;
}
 </style> 

<div class="row" >

           
<div class="col s1">&nbsp;</div>
      <!--   Icon Section   -->
      <div class="row">
      
 <form class="col s9" method="post" action="<?php echo base_url();?>Psb/update_my_profile" id="form-box">
   <?php
 foreach($my_profile as $row){
 ?>
 
 			<h1 align="center">Profil Ku</h1>
      
      <?php 
if(isset($notif)){
	echo '
<div class="alert warning-dark" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                      <i class="fa fa-info"></i>'.$notif.'
                  </div>
	';
}
	?> 
      <div class="row">
        <div class="col s12">
        <label for="email">Nama Lengkap</label>
          <input name="nama" value="<?php echo $row->nm_calon;?>" type="text" class=" input" id="password" required="required">
          
        </div>
      </div>
      <div class="row">
        <div class=" col s12">
        <label for="email">Email</label>
          <input name="email" type="email" class=" input" id="email" required="required" readonly="readonly" value="<?php echo $row->email;?>">
          
        </div>
      </div>
  
      <div class="col s12 amber accent-1">Kosongkan Password dibawah jika tidak ingin ubah password</div>


 <div class="row">
        <div class=" col s12">
        <label for="email">Password Lama</label>
          <input name="lama" type="password" class=" input" id="lama" >
          
        </div>
      </div>    
<div class="row">
        <div class=" col s12">
        <label for="email">Password baru</label>
          <input name="baru" type="password" class=" input" id="baru" >
          
        </div>
      </div>
      
<div class="row">
        <div class=" col s12">
        <label for="email">Ulangi password bar</label>
          <input name="ulang" type="password" class=" input" id="ulang" >
          
        </div>
      </div>
      
      <button type="submit" class="waves-effect waves-light btn">Ubah Profile</button>
      <br />
      
       
       <?php } ?>  
    </form>
      </div>

    
  </div>   