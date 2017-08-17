 <style>
 .blog_list_teaser_image{
	 height:150px;
	 max-height:150px;
	 min-height:150px;
	 width:99%;
 }
 </style>
    <!-- page specific plugins -->
    <!-- ckeditor -->
    <script src="<?php echo base_url();?>asset_admin/bower_components/ckeditor/ckeditor.js"></script>
    <script src="<?php echo base_url();?>asset_admin/bower_components/ckeditor/adapters/jquery.js"></script>

    <!--  wysiwyg editors functions -->
    <script src="<?php echo base_url();?>asset_admin/assets/js/pages/forms_wysiwyg.min.js"></script>
 
   <h2>DATA PROFIL </h2>
   <div class="uk-grid "><h3><button   onclick="new_data()" class="md-btn md-btn-success md-btn-wave-light uk-float-right">
 <i class="material-icons md-color-brown-50 ">control_point</i>
  <span>New Data</span>                                        
</button></h3>
</div>

<div class="uk-grid uk-grid-width-medium-1-2" data-uk-grid-margin="">
   
 <?php 
	foreach($list as $row){
	?>        
                <div>
                    <div class="md-card">
                        <div class="md-card-toolbar">
                            <div class="md-card-toolbar-actions">
                              
                                <i class="md-icon material-icons md-color-light-blue-500" onclick="edit_data(<?=$row->id_profil;?>)">edit</i>
                                <i class="md-icon material-icons md-color-red-500" onclick="hapus_data(<?=$row->id_profil;?>)"></i>
                            </div>
                            <h3 class="md-card-toolbar-heading-text">
                               <?=$row->nm_profil;?>
                            </h3>
                        </div>
                        <div class="md-card-content">
                        <img src="<?php echo base_url();?>assets/images/profile/<?=$row->gambar;?>" alt="" class="blog_list_teaser_image">
                        
  <p><?=$row->ket_profil;?></p>
                         </div>
                    </div>
                </div>
      <?php } ?>          
                
                
            </div>
            
            

    
<form method="post" action="javascript:void(0);" onsubmit="save_profil()" id="form_inputan" enctype="multipart/form-data" data-parsley-validate="">
 <div id="modal_inputan" class="uk-modal">
         <div class="uk-modal-dialog uk-modal-dialog-large">
   <button type="button" class="uk-modal-close uk-close"></button>
    <div class="uk-modal-header">
   <h3 class="uk-modal-title title_status">Title status</h3>
    </div>                                  
 
 <!-- header title -->
<div class="md-card-content">
 <div class="uk-grid" data-uk-grid-margin>
          <div class="uk-width-medium-1-1">
            <label>nm_profil</label>
                            <input name="nm_profil" type="text" class="md-input label-fixed" id="nm_profil" required="required" />
          </div>
                        
         
                        
 </div>
 

 <div class="uk-grid" data-uk-grid-margin>
          <div class="uk-width-medium-1-1">
<textarea name="ket_profil" cols="30" rows="6" id="wysiwyg_ckeditor">
write here
            </textarea>
          </div>
                        
                        
 </div>
 
 
                        
<div class="uk-grid" data-uk-grid-margin>
          <div class="uk-width-medium-1-3">
                 <label>Picture</label>
            <input type="file" name="picture" id="picture" />
            <input type="hidden" name="id_profil2" id="id_profil2" />
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
	$('#wysiwyg_ckeditor').val('');
	$('#view_gbr').attr('src','');
	
	$('.btn-save').html('<i class="material-icons md-color-grey-50">save</i> Save');
	modal=UIkit.modal("#modal_inputan",{bgclose:false,modal:false});
	modal.show();
	load_jabatan('0-Select Jabatan');
	$("#form_inputan").attr('onsubmit','save_profil()');
	$(".title_status").html('<i class="material-icons">note_add</i>New Data');
	
}
function edit_data(mydata){
	action_method == 'edit'
	var pathPhoto="<?php echo base_url();?>assets/images/profile/";
	$('.btn-save').html('<i class="material-icons md-color-grey-50">refresh</i> Update');
	var id=mydata;
	       $.ajax({
		   type: "POST",
           url : "<?php echo site_url('Admin/load_edit_profil')?>",
		    data: "id="+id,
           dataType: "json",
           success: function(data){
			   swal.close();
			   	modal=UIkit.modal("#modal_inputan",{bgclose:false,modal:false});
				modal.show();
				$("#form_inputan").attr('onsubmit','update_profil()');
                for (var i =0; i<data.length; i++){
				   $("#nm_profil").val(data[i].nm_profil);
				   $("#wysiwyg_ckeditor").val(data[i].ket_profil);
				   $("#id_profil2").val(data[i].id_profil);
				   
					   //for gambar
					$("#view_gbr").attr('src',pathPhoto+data[i].gambar);
					$("#light-img").attr('src',pathPhoto+data[i].gambar);
					$("#oldPict").val(data[i].gambar);

				   $(".title_status").html('<i class="material-icons">edit</i>Edit Data');
                 }
  
               }
       });
	
}
function update_profil(){
	swal_process();
   		var formData = new FormData($("#form_inputan")[0]);
          swal_process();
          url = '<?php echo base_url();?>admin/update_profil';
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
				window.location.href="<?php echo site_url()?>Admin/list_profil";
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                swal("Oops... Something went wrong!", "Proses Invalid!", "error");
            }
        });    
}
function save_profil(){	
		swal_process();
		var formData = new FormData($("#form_inputan")[0]);
       // ajax adding data to database
          $.ajax({
            url : "<?php echo site_url('Admin/save_profil')?>",
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
				   window.location.href="<?php echo site_url()?>Admin/list_profil";
				  				    
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
           url : "<?php echo site_url('admin/hapus_profil')?>",
		    data: "id="+id,
           dataType: "json",
           success: function(data){
			   swal.close();
			    UIkit.modal.alert('<i class="fa fa-check"></i>  Data deleted !');
				var modal = UIkit.modal("#modal_inputan");
   	   			modal.hide();
                window.location.href="<?php echo site_url()?>Admin/list_profil";
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