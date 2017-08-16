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
 </style> 
<div class="row">
                <div class="col-md-12">
      <?php
	foreach($list as $row){
	 ?>
         <div class="col s12 m6">
    <p class="header"> <i class="material-icons">keyboard_arrow_right</i> <b><?php echo $row->judul_berita;?></b></p>
    <div class="card horizontal">
      <div class="card-image">
        <img src="<?php echo base_url();?>assets/images/news/<?php echo $row->gambar;?>">
      </div>
      <div class="card-stacked">
        <div class="card-content">
          <p><?php echo substr($row->isi_berita,0,100).'...';?></p>
        </div>
        <div class="card-action">
          <a href="<?php echo base_url();?>Home/detail_news/<?php echo $row->id_berita;?>" class="waves-effect waves-orange btn-flat orange-text">More &raquo;</a>
        </div>
      </div>
    </div>
  </div>
  
  <?php } ?>
      </div>

    </div>
