<style>
.img{
	height:220px !important;
	max-height:220px;
	min-height:220px;
	width:99%
}
</style>


<h3> DATA GALLERY</h3>
<div id="page_content_inner">
<div class="uk-grid" style="margin-bottom:20px">
<h3><button   onclick="new_data()" class="md-btn md-btn-success md-btn-wave-light uk-float-right">
 <i class="material-icons md-color-brown-50 ">control_point</i>
  <span>New Data</span>                                        
</button></h3>
</div>


        <div class="gallery_grid uk-grid-width-medium-1-4 uk-grid-width-large-1-5" data-uk-grid="{gutter: 16}">
<?php 
	foreach($list as $row){
	?>
                            <div>
                    <div class="md-card md-card-hover">
                        <div class="gallery_grid_item md-card-content">
                            <a href="<?php echo base_url();?>assets/images/gallery/<?=$row->gambar;?>" data-uk-lightbox="{group:'gallery'}">
                              <img src="<?php echo base_url();?>assets/images/gallery/<?=$row->gambar;?>" alt="" class="img">
                            </a>
                            <div class="gallery_grid_image_caption">
                                <div class="gallery_grid_image_menu" data-uk-dropdown="{pos:'top-right'}">
                                    <i class="md-icon material-icons">&#xE5D4;</i>
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a href="#" onclick="edit_data(<?=$row->id_gallery;?>)"><i class="material-icons uk-margin-small-right">edit</i> Edit</a></li>
                                            <li><a href="#" onclick="hapus_data(<?=$row->id_gallery;?>)"><i class="material-icons uk-margin-small-right"></i> Remove</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <p><?php echo $row->ket_gallery;?></p>
                                <span class="gallery_image_title uk-text-truncate"><?php echo $row->nm_gallery;?></span>
                                
                                <span class="uk-text-muted uk-text-small"><?php echo $row->tgl_upload;?></span>
                            </div>
                        </div>
                    </div>
                </div>
                            
<?php } ?>       
                           
                           
                            
                    </div>
                    
                    <div align="right"><?php echo $paginator;?></div>
    </div>
    
    
    
    
    
      
<form method="post" action="javascript:void(0);" onsubmit="save_gallery()" id="form_inputan" enctype="multipart/form-data" data-parsley-validate="">
 <div id="modal_inputan" class="uk-modal">
         <div class="uk-modal-dialog uk-modal-dialog-medium">
   <button type="button" class="uk-modal-close uk-close"></button>
    <div class="uk-modal-header">
   <h3 class="uk-modal-title title_status">Title status</h3>
    </div>                                  
 
 <!-- header title -->
<div class="md-card-content">
 <div class="uk-grid" data-uk-grid-margin>
          <div class="uk-width-medium-1-1">
            <label>nm_gallery</label>
                            <input name="nm_gallery" type="text" class="md-input label-fixed" id="nm_gallery" required="required" />
          </div>
                        
         
                        
 </div>
 <div class="uk-grid" data-uk-grid-margin>
          <div class="uk-width-medium-1-1">
            <label>ket_gallery</label>
                            <textarea name="ket_gallery" class="md-input label-fixed" id="ket_gallery"></textarea>
          </div>
                        
                        
 </div>

 
 
 
                        
<div class="uk-grid" data-uk-grid-margin>
          <div class="uk-width-medium-1-3">
                            <label>Picture</label>
            <input type="file" name="picture" id="picture" />
            <input type="hidden" name="id_gallery2" id="id_gallery2" />
            <input type="hidden" name="oldPict" id="oldPict" />
          </div>                     
                        
 </div>
 <div class="uk-grid" data-uk-grid-margin>
          <div class="uk-width-medium-1-3">
    <img src="<?php echo base_url();?>asset/images/user.png" name="view_gbr" width="150px" height="70px" class="view_gbr"  id="view_gbr" data-uk-modal="{target:'#modal_lightbox',modal:false}"  />
	<span>    <i class="material-icons md-24" id="delbutton" title="remove picture">close</i></span>
                        </div>
                        
                        
 </div>                                      
                    
                    
           </div>
 <!-- end ofheader title -->
<!-- FOOTER -->
<div class="uk-grid">
  <div class="uk-width-medium-1-1">


<div class="uk-modal-footer uk-text-right">
<button type="button" class="md-btn md-btn-flat uk-modal-close md-btn-danger"><i class="material-icons">close</i> Close</button>
<button type="submit" class="md-btn md-btn-primary md-btn-wave-light">
  <span class="btn-save">Save </span>                                        
</button>
                                  </div>
</div>
</div>
<!-- END OF FOOTER -->

                                                                        
                                </div>
                            </div>
</form>
                            

<script type="text/javascript">
var action_method; 

function new_data(){

		action_method == 'new'
	$('#form_inputan')[0].reset();
	$('.btn-save').html('<i class="material-icons md-color-grey-50">save</i> Save');
	modal=UIkit.modal("#modal_inputan",{bgclose:false,modal:false});
	modal.show();
	load_jabatan('0-Select Jabatan');
	$("#form_inputan").attr('onsubmit','save_gallery()');
	$(".title_status").html('<i class="material-icons">note_add</i>New Data');
	
}
function edit_data(mydata){
	action_method == 'edit'
	var pathPhoto="<?php echo base_url();?>assets/images/gallery/";
	$('.btn-save').html('<i class="material-icons md-color-grey-50">refresh</i> Update');
	var id=mydata;
	       $.ajax({
		   type: "POST",
           url : "<?php echo site_url('Admin/load_edit_gallery')?>",
		    data: "id="+id,
           dataType: "json",
           success: function(data){
			   swal.close();
			   	modal=UIkit.modal("#modal_inputan",{bgclose:false,modal:false});
				modal.show();
				$("#form_inputan").attr('onsubmit','update_gallery()');
                for (var i =0; i<data.length; i++){
                   $("#id_gallery").val(data[i].id_gallery);
				   $("#nm_gallery").val(data[i].nm_gallery);
				   $("#ket_gallery").val(data[i].ket_gallery);
				   $("#id_gallery2").val(data[i].id_gallery);
				   
					   //for gambar
					$("#view_gbr").attr('src',pathPhoto+data[i].gambar);
					$("#light-img").attr('src',pathPhoto+data[i].gambar);
					$("#oldPict").val(data[i].gambar);

				   $(".title_status").html('<i class="material-icons">edit</i>Edit Data');
                 }
  
               }
       });
	
}
function update_gallery(){
	swal_process();
   		var formData = new FormData($("#form_inputan")[0]);
          swal_process();
          url = '<?php echo base_url();?>admin/update_gallery';
          $.ajax({
            url : url,
            type: "POST",
             data:formData,// $('#form_add_vendor').serialize(),
            dataType: "JSON",
			//for iput file
			cache: false,
			processData: false,
      		contentType: false,
            success: function(data)
            {
				swal.close();
			   	var modal = UIkit.modal("#modal_inputan");
   	   			modal.hide();
				$('#form_inputan')[0].reset();
				UIkit.modal.alert('<i class="fa fa-check"></i>  Success Updated !');
				window.location.href="<?php echo site_url()?>Admin/list_gallery";
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                swal("Oops... Something went wrong!", "Proses Invalid!", "error");
            }
        });    
}
function save_gallery(){	
		swal_process();
		var formData = new FormData($("#form_inputan")[0]);
       // ajax adding data to database
          $.ajax({
            url : "<?php echo site_url('Admin/save_gallery')?>",
            type: "POST",
            data:formData,// $('#form_add_vendor').serialize(),
            dataType: "JSON",
			//for iput file
			cache: false,
			processData: false,
      		contentType: false,
            success: function(data)
            {		
				   swal.close();
			   	   var modal = UIkit.modal("#modal_inputan");
   	   			   modal.hide();
				   UIkit.modal.alert('<i class="fa fa-check"></i>  Success Saved !');
               	   //reload_tabel();
				    $('#form_inputan')[0].reset();
				   window.location.href="<?php echo site_url()?>Admin/list_gallery";
				  				    
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data.May be duplicate or others');
            }
        });
    }
function hapus_data(mydata){
	swal_process();
	var id=mydata;
	var conf = confirm("Sure to delete data ?");
	if (conf) {
    //Logic to delete the item
	       $.ajax({
		   type: "POST",
           url : "<?php echo site_url('admin/hapus_gallery')?>",
		    data: "id="+id,
           dataType: "json",
           success: function(data){
			   swal.close();
			    UIkit.modal.alert('<i class="fa fa-check"></i>  Data deleted !');
				var modal = UIkit.modal("#modal_inputan");
   	   			modal.hide();
                window.location.href="<?php echo site_url()?>Admin/list_gallery";
             }
       });
	} else {
		var modal = UIkit.modal("#modal_inputan");
   	   	modal.hide();
	//return false;	
	}   
}
function cari(){
	var txt_search=$("#txt_search").val();
	
	if(txt_search==''){
		my_table.ajax.url('<?php echo base_url()?>Admin/listdata_guru').load();
		return false;
	} else {
		if(txt_search !=''){	
				my_table.ajax.url('<?php echo base_url()?>Admin/listdata_guru/'+txt_search).load();
		} else {
				my_table.ajax.url('<?php echo base_url()?>Admin/listdata_guru').load();		
		}
	}

}
function load_jabatan(myid){
	swal_process();
	var id='open';
	var myid=myid;
		var input = myid.split('-');
		var id_jabat=input[0];
		var nm_jabat=input[1];
		
       $.ajax({
		   type: "POST",
           url : "<?php echo site_url('Admin/load_jabatan')?>",
		    data: "id="+id,
           dataType: "json",
           success: function(data){
			   swal.close();
                    $("#nm_jabatan").empty();
                   $("#nm_jabatan").append("<option value='"+id_jabat+"'>"+nm_jabat+"</option>");
                     for (var i =0; i<data.length; i++){
                   var option = "<option value='"+data[i].id_jabatan+"'>"+data[i].nm_jabatan+"</option>";
                          $("#nm_jabatan").append(option);
                       }
               }
       }); 
 }
<!-- FOR PICTUTER-->
 
  <!--- picture -->\
$("#picture").change(function(e) {
    load_gbr(this);
});
$("#gbr2").change(function(e) {
    load_gbr(this);
});

function load_gbr(input){
	if(action_method == 'new') {
		var boxPicture='view_gbr';
	} else {
		var boxPicture='view_gbr';
	}
	if(input.files && input.files[0]){
	var reader=new FileReader();
	reader.onload=function(e){
		$("#"+boxPicture).attr('src',e.target.result);
		$("#light-img").attr('src',e.target.result);
		$("#oldPict").attr('val',e.target.result);
		}
		reader.readAsDataURL(input.files[0]);
		
	}
	
}
$('#delbutton').on('click', function(e){
        $('#gbr').val('');
		$('#view_gbr').attr('src','');
		$('#picture').val('');
});
$('#picture').on('change', function(e){
        $('#delbutton').css("visibility","visible");
});
 <!-- PICTURE END -->
 
function swal_process(){
	swal({
		title:'<div class="md-preloader"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" height="96" width="96" viewBox="0 0 75 75"><circle cx="37.5" cy="37.5" r="33.5" stroke-width="4"></circle></svg></div>',
		text:'<p>Loading Content.......</p>',
		showConfirmButton:false,
		//type:"success",
		html:true
		});
}
</script>