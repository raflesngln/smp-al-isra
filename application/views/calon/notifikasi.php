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
<div class="container">
    <div class="section">
<div class="col s1">&nbsp;</div>
      <!--   Icon Section   -->
      <div class="row">
  <div class="col s6">    
      <?php 
if(isset($message)){
	echo '
<div class="alert warning-dark" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                      <i class="fa fa-info"></i>'.$message.'
                  </div>
	';
}
	?>
    </div>
      </div>

    </div>
  </div>   