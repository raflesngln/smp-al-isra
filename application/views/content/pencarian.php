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
.list-cari{
	border-bottom:1px red solid;
	margin-bottom:10px;
}
 </style> 
<div class="row" >
               
      <!--   Icon Section   -->
      <div class="row">
      
 <form class="col s12" method="post" action="<?php echo base_url();?>home/simpan_buku_tamu" id="form-login">
 
 			<h1 align="center">Pencarian</h1>
  

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
    
    <?php
	foreach($news as $row){
		echo '<div class="list-cari">';
	echo '
	<p>'.$row->judul_berita.'   </p>';
	'<p>'.substr($row->isi_berita,0,900).'   </p>';
	
	;	
	
	?>
    </div>
      <?php } ?>
        </div>
        
        
        
      </div>
      <br />
 </form>
      </div>

    
  </div>   