<script>
  $(document).ready(function(){
    $('.materialboxed').materialbox();
  });
</script>
<style>
.materialboxed{
	width:98%;
}
.card{
	padding-left:5px;
}
.box-gallery .card{
	height:300px;
}
.box-gallery .responsive-img{
	height:200px;
}
</style>
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

    <div class="col-md-12"><hr style="border:1px #F3F3F3 dashed; margin:40px 0 20px 0" /></div>
    
      <!--  gallery top  -->
      <h3> Gallery Baru</h3>
      <div class="row">
                <div class="col-md-12">
                
<hr />
     <?php
	foreach($gallery as $row){
	 ?>
                 <div class="col s12 m4 box-gallery">
                 <div class="card" style="overflow: hidden;">
                <img class="materialboxed responsive-img" src="<?php echo base_url();?>assets/images/gallery/<?php echo $row->gambar;?>">
                <span class="small-text"><em><?php echo date('d M Y',strtotime($row->tgl_upload));?></em></span>
                 <p class="small-text"><?php echo $row->nm_gallery;?></p>
                </div>
                </div>

 		 <?php } ?>
        </div>
        </div>
      <!--  gallery top  -->
      
    <!--  NEWS top  -->
    <div class="col-md-12"><hr style="border:1px #F3F3F3 dashed; margin:40px 0 20px 0" /></div>
    <h3>Berita Baru</h3>
<div class="row">
                <div class="col-md-12">
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
      

    </div>
  