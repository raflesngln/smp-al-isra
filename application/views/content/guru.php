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
.box-gallery p{
	margin-top:-30px;
}
</style>
<div class="row">
                <div class="col-md-12">
<h4>Guru-guru dan Staff</h4>
     <?php
	foreach($list as $row){
	 ?>
                 <div class="col s12 m3 box-gallery">
                 <div class="card" style="overflow: hidden;">
                <img class="materialboxed responsive-img" src="<?php echo base_url();?>assets/images/guru/<?php echo $row->gambar;?>">
               
                 <p class="small-text">Nama			:<?php echo $row->nm_guru;?></p>
                 <p class="small-text">Jabatan		:<?php echo $row->nm_jabatan;?></p>
                 <p class="small-text">Alamat		:<?php echo $row->almt_guru;?></p>
                 <p class="small-text">Telpon		:<?php echo $row->telpon;?></p>
                </div>
                </div>

 		 <?php } ?>
        </div>
        </div>