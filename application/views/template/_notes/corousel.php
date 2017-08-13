<script>
  $(document).ready(function(){
      $('.slider').slider();
    });
        
</script>
<style>
.slider .indicators .indicator-item{
	position:static;
}
.slides{
	height:500px !important;
	bottom:0px;
}
.indicators{
	z-index:999;
	margin-bottom:-30px !important;
}
.slider .slides li .caption {
    color: rgba(0,0,0,0.87);
    position: absolute;
    top: 64%;
	width:45%;
	left:30%;
    background: rgba(221, 221, 221, 0.54);
}
.slider .slides li .caption p{
	color:#333;	
}

</style>
  <div class="slider">
    <ul class="slides">
     <?php
	foreach($list as $row){
	 ?>
      <li>   
        <img src="<?php echo base_url();?>assets/images/corousel/<?php echo $row->gambar;?>"> <!-- random image -->
        <div class="caption center-align">
          <h4><?php echo $row->judul_slide;?></h4>
          <p class="small"><?php echo substr($row->ket_slide,0,150);?></p>
        </div>
      </li>
     <?php } ?>
      
    </ul>
  </div>