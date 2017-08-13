 <style>
 .card{
	height:280px;
}
.card .card-image{
	height:200px;
}
.card .card-action a:not(.btn):not(.btn-large):not(.btn-floating){
	color:#8000FF;
}
.badge{
	padding:7px;
	width:55%;
	margin:0px auto;
	background:#b1dcfb !important;
}
 </style> 
<div class="row">
                <div class="col-md-12">
<div class="col s3">&nbsp;</div>
      <!--   Icon Section   -->
      <div class="row">
      
 <form class="col s6" method="post" action="<?php echo base_url();?>Psb/cek_login_user">
 
 			<h4>Login User</h4>
  
 <p><?php echo isset($notif)?'<h6 class="badge" align="center"><i class="fa fa-info"></i> '.$notif.'</h6>':'';?></p>      
      
      <div class="row">
        <div class="input-field col s12">
          <input name="email" type="text" class="validate" id="password">
          <label for="password">Username/Email</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input name="password" type="password" class="validate" id="password">
          <label for="password">Passwrd</label>
        </div>
      </div>
      
      <button type="submit" class="waves-effect waves-light btn">Login</button>
       <h6>Belum punya akun ? Silahkan <a href="<?php echo base_url();?>Psb/daftar">daftar</a></h6>
    </form>
      </div>

    </div>
  </div>   