<div class="row">
                <div class="col-md-12">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">face</i></h2>
            <h5 class="center">Kata Sambutan</h5>
            <p class="light">
	Perkembangan dan perubahan dunia pendidikan di Indonesia tidak terlepas dari pengaruh perubahan global, perkembangan ilmu pengetahuan dan teknologi, serta seni dan budaya. Perkembangan dan perubahan tersebut menuntut perubahan dan peningkatan di bidang pendidikan dalam menyiapkan peserta didik untuk mewujudkan Sumber Daya Manusia yang beraklaq mulia, cakap, tangguh, dan mandiri.
            </p>
          </div>
        </div>
        
      <!--  berita top  -->
      <div class="row">
      <?php
	foreach($news as $row){
	 ?>
         <div class="col s12 m6">
    <p class="header"> <i class="material-icons">keyboard_arrow_right</i> <b><?php echo $row->judul_berita;?></b></p>
    <div class="card horizontal">
      <div class="card-image">
        <img src="<?php echo base_url();?>assets/images/news/<?php echo $row->gambar;?>">
      </div>
      <div class="card-stacked">
        <div class="card-content">
          <p><?php echo substr($row->isi_berita,0,170).'...';?></p>
        </div>
        <div class="card-action">
          <a href="<?php echo base_url();?>Home/detail_news/<?php echo $row->id_berita;?>">Selengkapnya &raquo;</a>
        </div>
      </div>
    </div>
  </div>
  
  <?php } ?>
      </div>
      <!--  berita top  -->
      

    </div>
  