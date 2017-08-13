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
<div class="container">
<h4>Gallery Sekolah</h4>
     <?php
	foreach($list as $row){
	 ?>
                 <div class="col s12 m4 box-gallery">
                 <div class="card" style="overflow: hidden;">
                <img class="materialboxed responsive-img" src="<?php echo base_url();?>assets/images/guru/<?php echo $row->gambar;?>">
                <span class="small-text"><em><?php echo date('d M Y',strtotime($row->tgl_upload));?></em></span>
                 <p class="small-text"><?php echo $row->nm_guru;?></p>
                 <p class="small-text"><?php echo $row->nm_jabatan;?></p>
                 <p class="small-text"><?php echo $row->almt_guru;?></p>
                 <p class="small-text"><?php echo $row->telpon;?></p>
                </div>
                </div>

 		 <?php } ?>
        </div>