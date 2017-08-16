 <style>
h1{
	font-size:26pt !important;
}
#form-login label{
	font-size:12px;
}
.input {
    border: 1px #dadada solid !important;
    padding: 4px 4px 4px 8px !important;
    background-color: #ffffff !important;
    color: #202020;
}

#form-login {
	margin-top:80px;
    border: 1px #f5f5f5 solid;
    padding-bottom: 70px;
    box-shadow: 1px 5px 13px #ddd;
    padding: 20px;
}
 </style> 
<div class="row" >
               
<div class="col s3">&nbsp;</div>
      <!--   Icon Section   -->
      <div class="row">
      
 <form class="col s6" method="post" action="<?php echo base_url();?>Psb/simpan_daftar" id="form-login">
 
 			<h1 align="center">DAFTAR USER BARU</h1>
  
 <p>
 
 <?php echo isset($notif)?'<h6 class="badge" align="center"><i class="fa fa-info"></i> '.$notif.'</h6>':'';?></p>      
      
      <div class="row">
        <div class="col s12">
        <label for="email">Nama Lengkap</label>
          <input name="nama" type="text" class=" input" id="password" required="required">
          
        </div>
      </div>
      <div class="row">
        <div class=" col s12">
        <label for="email">Email</label>
          <input name="email" type="email" class=" input" id="email" required="required">
          
        </div>
      </div>
  
 <div class="row">
        <div class=" col s12">
        <label for="email">Password</label>
          <input name="password" type="password" class=" input" id="password" required="required">
          
        </div>
      </div>    
      
      <button type="submit" class="waves-effect waves-light btn">Daftar</button>
      <br />
       <p>Sudah punya akun ? Silahkan <a href="<?php echo base_url();?>Psb/login">Login</a></p>
    </form>
      </div>

    
  </div>   