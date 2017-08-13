 <style>

.img-detail{
	height:200px;
	width:55%;
	margin-right:7px;
	float:left;
}

 </style> 
<div class="row">
                <div class="col-md-12">
      <?php
	foreach($list as $row){
	 ?>
     <p class="header"> <i class="material-icons">keyboard_arrow_right</i> <b><?php echo $row->judul_berita;?></b></p>
  <img src="<?php echo base_url();?>assets/images/news/<?php echo $row->gambar;?>" class="responsive-img img-detail">
  <p><?php echo $row->isi_berita;?></p>
     
      
  
  <?php } ?>
      </div>

    </div>
   