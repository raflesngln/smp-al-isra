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
                
<h4>Gallery Sekolah</h4>
     <?php
	foreach($list as $row){
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