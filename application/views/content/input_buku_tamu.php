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
               
      <!--   Icon Section   -->
      <div class="row">
      
 <form class="col s12" method="post" action="<?php echo base_url();?>home/simpan_buku_tamu" id="form-login">
 
 			<h1 align="center">Buku Tamu</h1>
  

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
        <div class="col s8">
        <label for="email_pengirim">Nama Lengkap</label>
          <input name="nm_pengirim" type="text" class=" input" id="password" required="required">
          
        </div>
      </div>
      <div class="row">
        <div class=" col s8">
        <label for="email_pengirim">Email</label>
          <input name="email_pengirim" type="email" class=" input" id="email_pengirim" required="required">
          
        </div>
      </div>
      <div class="row">
        <div class=" col s8">
        <label for="email_pengirim">Subjek</label>
          <input name="subjek" type="text" class=" input" id="subjek" required="required">
          
        </div>
      </div>   
<div class="row">
        <div class=" col s12">
        <label for="email_pengirim">Pesan</label>
          
          <label for="isi_buku_tamu"></label>
          <textarea name="isi_buku_tamu" id="isi_buku_tamu" cols="45" rows="8" style="height:150px" required="required"></textarea>
          
        </div>
      </div>      
      <button type="submit" class="waves-effect waves-light btn">Kirim Pesan</button>
      <br />
 </form>
      </div>

    
  </div>   