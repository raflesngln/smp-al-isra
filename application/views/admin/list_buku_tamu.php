<script src="<?php echo base_url();?>asset_admin/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<!-- datatables colVis-->
<script src="<?php echo base_url();?>asset_admin/bower_components/datatables-colvis/js/dataTables.colVis.js"></script>
<!-- datatables tableTools-->
<script src="<?php echo base_url();?>asset_admin/bower_components/datatables-tabletools/js/dataTables.tableTools.js"></script>
<!-- datatables custom integration -->
<script src="<?php echo base_url();?>asset_admin/assets/js/custom/datatables.uikit.min.js"></script>
  
<style>
.uk-table tr td:hover{
	cursor:pointer;
}
.uk-tab > li.uk-active > a {
  color:#0277bd;
}

</style>
 
  <script type="text/javascript">
    var my_table;
 $(document).ready(function() {    
    
          my_table = $('#my_table').DataTable({ 
            "processing": true, //Feature control the processing indicator.
			"bInfo": true,
			"bFilter":false,
			//"order":[[4,"desc"],[3,"desc"],[1,"asc"]],
 "lengthMenu": [[10, 60, 100, -1], [10, 60, 100, "All"]],
            "serverSide": true, //Feature control DataTables' server-side processing mode
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('Admin/listdata_buku_tamu')?>",
                "type": "POST",
            },
            "columns": [
            { "data": "no","orderable":false,"visible":true },
			{ "data": "id_buku_tamu"},
            { "data": "tgl_kirim"},
			 { "data": "email_pengirim"},
			  { "data": "nm_pengirim"},
			   { "data": "isi_buku_tamu"},
			{ "data": "action","orderable":false,"visible":true}
            ]
          });  
  
$('#my_table tbody').on('dblclick', 'tr', function () {
            var tr = $(this).closest('tr');
            var row = my_table.row(tr);
		   var id=row.data().id_buku_tamu;
		   edit_data(id);
    //Redirect if click
    //window.location.href = "<?php echo base_url();?>hawb/Awb/awb_detail/"+row.data().Hawb;
	//sidebarNonAktif();
     });
});

//reload/refresh table list
function reload_tabel()
    {
      my_table.ajax.reload(null,false); //reload datatable ajax 
    }

  </script>


<h3> DATA BUKU TAMU</h3>
<!-- SORTING ---->

        <div class="uk-grid" >
            <div class="uk-width-medium-1-3 uk-width-large-1-3">
               <!-- GRID 1 -->
             </div>
             
             <div class="uk-width-medium-1-3 uk-width-large-1-3">
            <!-- GRID 2 -->
             </div>
             
          <div class="uk-width-medium-1-3 uk-width-large-1-3">
            <label>Type Your Search</label>
            <input type="text" class="md-input" name="txt_search" id="txt_search" onkeyup="cari()"/>
            </div>
        </div>

 
 
<!--============================================== --->

<table id="my_table" class="uk-table uk-table-hover my_table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                              <th width="2%" height="23">No</th>
                                <th width="8%">subjek</th>
                                <th width="9%">tgl_kirim</th>
                                <th width="5%">email_pengirim</th>
                                <th width="5%">nm_pengirim</th>
                                <th width="5%">isi_buku_tamu</th>
                                <th width="5%">#</th>
                            </tr>
                        </thead>
                       <tbody>
                        <tr>
                          <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                         </tr>
                         
                        </tbody>
                         <tfoot>
                        </tfoot>


                    </table>
                
                    
              




                            
                            
                            
                            
     
<form method="post" action="javascript:void(0);" onsubmit="save_buku_tamu()" id="form_inputan" enctype="multipart/form-data" data-parsley-validate="">
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
                            <label>Id</label>
                            <input name="id_buku_tamu" type="text" class="md-input label-fixed" id="id_buku_tamu" required="required" />
            <span class="uk-width-medium-1-3">
                            <input type="hidden" name="id_buku_tamu2" id="id_buku_tamu2" />
          </span></div>
                        
         
                        
 </div>
 
<div class="uk-grid" data-uk-grid-margin>
          <div class="uk-width-medium-1-1">
                            <label>Nama Pengirim</label>
                            <input name="nm_pengirim" type="text" class="md-input label-fixed" id="nm_pengirim" value="" />
                        </div>
                        
                        
 </div>
 <div class="uk-grid" data-uk-grid-margin>
          <div class="uk-width-medium-1-1">
            <label>email_pengirim</label>
                            <input name="email_pengirim" type="text" class="md-input label-fixed" id="email_pengirim" value="" />
                        </div>
                        
                        
 </div>
 <div class="uk-grid" data-uk-grid-margin>
          <div class="uk-width-medium-1-1">
            <label>subjek</label>
                            <input name="subjek" type="text" class="md-input label-fixed" id="subjek" value="" />
                        </div>
                        
                        
 </div>
<div class="uk-grid" data-uk-grid-margin>
          <div class="uk-width-medium-1-1">
            <label>Isi Pesan</label>
                            <textarea name="isi_buku_tamu" class="md-input label-fixed" id="isi_buku_tamu"></textarea>
                        </div>
                        
                        
 </div>
  
<div class="uk-grid" data-uk-grid-margin>
          <div class="uk-width-medium-1-1">
            <label>Status</label>
            <label for="status"></label>
                            <select name="status" id="status" class="md-input">
              <option value="1">Tampilkan</option>
              <option value="0">Tidak Tampil</option>
                            </select>
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

function new_status(){
		action_method == 'new'
	$('#form_inputan')[0].reset();
	$('.btn-save').html('<i class="material-icons md-color-grey-50">save</i> Save');
	modal=UIkit.modal("#modal_inputan",{bgclose:false,modal:false});
	modal.show();
	$("#form_inputan").attr('onsubmit','save_buku_tamu()');
	$(".title_status").html('<i class="material-icons">note_add</i>New Data');
	
}
function edit_data(mydata){
	$('.btn-save').html('<i class="material-icons md-color-grey-50">refresh</i> Update');
	var id=mydata;
	       $.ajax({
		   type: "POST",
           url : "<?php echo site_url('Admin/load_edit_buku_tamu')?>",
		    data: "id="+id,
           dataType: "json",
           success: function(data){
			   swal.close();
			   	modal=UIkit.modal("#modal_inputan",{bgclose:false,modal:false});
				modal.show();
				$("#form_inputan").attr('onsubmit','update_buku_tamu()');
                for (var i =0; i<data.length; i++){
                   $("#id_buku_tamu").val(data[i].id_buku_tamu);
				   $("#nm_pengirim").val(data[i].nm_pengirim);
				   $("#isi_buku_tamu").val(data[i].isi_buku_tamu);
				   $("#subjek").val(data[i].subjek);
				   $("#email_pengirim").val(data[i].email_pengirim);
				   $("#id_buku_tamu2").val(data[i].id_buku_tamu);
				   $(".title_status").html('<i class="material-icons">edit</i>Edit Data');
                 }
  
               }
       });
	
}
function update_buku_tamu(){
   		var formData = new FormData($("#form_inputan")[0]);
          swal_process();
          url = '<?php echo base_url();?>admin/update_buku_tamu';
          $.ajax({
            url : url,
            type: "POST",
             data:formData,
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
				reload_tabel();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                swal("Oops... Something went wrong!", "Proses Invalid!", "error");
            }
        });    
}
function save_buku_tamu(){	
		swal_process();
		var formData = new FormData($("#form_inputan")[0]);
       // ajax adding data to database
          $.ajax({
            url : "<?php echo site_url('Admin/save_buku_tamu')?>",
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
               	   reload_tabel();
				   /* reset input and tabel */
				   $('#form_inputan')[0].reset();				    
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data.May be duplicate or others');
            }
        });
    }
function hapus_data(mydata){
	var id=mydata;
	var conf = confirm("Sure to Non active data ?");
	if (conf) {
    //Logic to delete the item
	       $.ajax({
		   type: "POST",
           url : "<?php echo site_url('admin/hapus_buku_tamu')?>",
		    data: "id="+id,
           dataType: "json",
           success: function(data){
			    UIkit.modal.alert('<i class="fa fa-check"></i>  Data deleted !');
				var modal = UIkit.modal("#modal_inputan");
   	   			modal.hide();
                reload_tabel();
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
		my_table.ajax.url('<?php echo site_url()?>Admin/listdata_buku_tamu').load();
		return false;
	} else {
		if(txt_search !=''){	
				my_table.ajax.url('<?php echo site_url()?>Admin/listdata_buku_tamu/'+txt_search).load();
		} else {
				my_table.ajax.url('<?php echo site_url()?>Admin/listdata_buku_tamu').load();		
		}
	}

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
