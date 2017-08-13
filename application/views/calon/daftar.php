  <!-- CSS  -->
  
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
    <link href="<?php echo base_url();?>assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/font-awesome-4.7/css/font-awesome.min.css">
<div class="row">

			<div class="col s12 m6 offset-m3">
			
			
		<div class="card-panel z-depth-5">
		<h4 class="center"> Daftar Akun</h4>	 
<div class="row">
  <form class="col s12 m12" action="<?php echo base_url();?>">
 
    <div class="row">
      <div class="input-field col s12 m12">
        <i class="mdi-action-account-circle prefix"></i>
        <input id="icon_prefix" type="text" class="validate">
        <label for="icon_prefix">Username</label>
      </div>
      
      <div class="input-field col s12 m12">
        <i class="mdi-communication-email prefix"></i>
        <input id="icon_email" type="email" class="validate">
        <label for="icon_email">Your Email</label>
      </div>
      
        <div class="input-field col s12 m12">
        <i class="fa fa-unlock-alt prefix"></i>
        <input id="icon_password" type="password" class="validate">
        <label for="icon_password">Password</label>
      </div>
    
        
    </div>
  </form>
   
</div>
 <button class="btn waves-effect waves-light center" type="submit" name="action">Daftar
    <i class="fa fa-sign-in right"></i>
  </button>
  <h6>Sudah punya akun ? Silahkan <a href="<?php echo base_url();?>Psb">Login</a></h6>
</div>


</div>


  </div>