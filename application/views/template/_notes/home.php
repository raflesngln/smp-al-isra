<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.ico">
  <title>Sistem Akademik-Penerimaan siswa baru</title>

  <!-- CSS  -->
  
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
    
    <link rel="stylesheet" href="<?php echo base_url();?>assets/font-awesome-4.7/css/font-awesome.min.css">
<style>
nav{
	
    position: fixed;
    z-index: 999;
}
body {
    margin: 0;
}
#navigasi{
	    padding: 2px 0px 5px 0px;
    /* box-shadow: 1px 1px 5px rgba(0,0,0,0.4); */
    margin-bottom: 70px;
    background:rgba(245, 245, 245, 0.32);
}

.navigasi li{
	float:left;
	list-style:none;
	margin-left:10px;
}
/*.navigasi li:after{
	content: "  > ";
}*/
#box-content{
	margin-top:99px !important;
}
 .card{
	height:280px;
}
</style>
</head>
<body>
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
  <script src="<?php echo base_url();?>assets/materialize/js/init.js"></script>

<?php echo $this->load->view('template/navbar');?>
  
<div class="row">
	<?php 
	$slide=isset($corousel);
	if(strlen($slide) >=1){
	echo $this->load->view('template/corousel');	
	}
	;?>
    
</div>

<!--CONTEN BOX-->
<!--Scrumb box-->

	<?php 
	$slide=isset($corousel);
	if(strlen($slide) <=0)
	{ ?>
<div class="row" id="box-content">
    <div class="container" style="margin-bottom:60px" >
  <div class="col s12 l12 m12" id="navigasi">
      <ul class="navigasi">
      <li><a href="<?php echo base_url();?>"> Home &raquo; </a></li>
      <li><?php echo $title=($navigasi)?$navigasi:'';?> </li>
      </ul>
  </div>
  </div>
  <?php } ?>
  <!--Scrumb box-->
  
<?php echo $this->load->view($content);?>
     

            
</div>

		<!--CONTEN BOX-->

<?php echo $this->load->view('template/footer');?>
  <script type="text/javascript">

      $(document).ready(function(){
	$('.dropdown-button').dropdown({
      inDuration: 300,
      outDuration: 225,
      constrain_width: false, // Does not change width of dropdown to that of the activator
      hover: true, // Activate on hover
      gutter: 50, // Spacing from edge
      belowOrigin: false, // Displays dropdown below the button
      alignment: 'left' // Displays dropdown with edge aligned to the left of button
  	  }
  		);
  
		  //$(".dropdown-button").dropdown({ hover: false });
    //$('.carousel').carousel();
	$('.carousel.carousel-slider').carousel({full_width: true});
	
	//$('.carousel-slider').slider({full_width: true});//slider init
	//$('.slider').slider({full_width: true});//slider init
					$('.carousel').carousel({
					padding: 50    
				});
				autoplay()   
				function autoplay() {
					$('.carousel').carousel('next');
					setTimeout(autoplay, 4500);
				}
       });
  </script>

  </body>
</html>