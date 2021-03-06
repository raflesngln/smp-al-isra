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
                "url": "<?php echo site_url('Admin/listdata_calon_siswa')?>",
                "type": "POST",
            },
            "columns": [
            { "data": "no","orderable":false,"visible":true },
			{ "data": "id_calon"},
            { "data": "nm_calon"},
			{ "data": "email"},
			{ "data": "action","orderable":false,"visible":true}
            ]
          });  
  
$('#my_table tbody').on('dblclick', 'tr', function () {
            var tr = $(this).closest('tr');
            var row = my_table.row(tr);
		   var id=row.data().id_calon;
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


<h3> DATA PENDAFTAR</h3>
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

 
<button   onclick="new_status()" class="md-btn md-btn-success md-btn-wave-light uk-float-right">
 <i class="material-icons md-color-brown-50 ">control_point</i>
  <span>New Data</span>                                        
</button>
<table id="my_table" class="uk-table uk-table-hover my_table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                              <th width="2%" height="23">No</th>
                                <th width="8%">ID</th>
                                <th width="9%">Nama Kelas</th>
                                <th width="9%">J.Tampung</th>
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
                         </tr>
                         
                        </tbody>
                         <tfoot>
                        </tfoot>


                    </table>
                
                    
              




                            
                            
                            
                            
     
<form method="post" action="javascript:void(0);" onsubmit="save_calon()" id="form_inputan" enctype="multipart/form-data" data-parsley-validate="">
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
                            <label>Kode calon</label>
                            <input name="id_calon" type="text" class="md-input label-fixed" id="id_calon" required="required" />
            <span class="uk-width-medium-1-3">
                            <input type="hidden" name="id_calon2" id="id_calon2" />
          </span></div>
                        
         
                        
 </div>
 
<div class="uk-grid" data-uk-grid-margin>
          <div class="uk-width-medium-1-1">
                            <label>Nama calon</label>
                            <input name="nm_calon" type="text" class="md-input label-fixed" id="nm_calon" value="" />
                        </div>
                        
                        
 </div>
<div class="uk-grid" data-uk-grid-margin>
          <div class="uk-width-medium-1-1">
            <label>email</label>
                            <input name="email" type="text" class="md-input label-fixed" id="email" required="required" />
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
	load_guru('0-Select Guru');
	$("#form_inputan").attr('onsubmit','save_calon()');
	$(".title_status").html('<i class="material-icons">note_add</i>New Data');
	
}
function edit_data(mydata){
	$('.btn-save').html('<i class="material-icons md-color-grey-50">refresh</i> Update');
	var id=mydata;
	       $.ajax({
		   type: "POST",
           url : "<?php echo site_url('Admin/load_edit_calon')?>",
		    data: "id="+id,
           dataType: "json",
           success: function(data){
			   swal.close();
			   	modal=UIkit.modal("#modal_inputan",{bgclose:false,modal:false});
				modal.show();
				$("#form_inputan").attr('onsubmit','update_calon()');
                for (var i =0; i<data.length; i++){
                   $("#id_calon").val(data[i].id_calon);
				   $("#nm_calon").val(data[i].nm_calon);
				   $("#email").val(data[i].email);
				   $("#id_calon2").val(data[i].id_calon);
				   
				   $(".title_status").html('<i class="material-icons">edit</i>Edit Data');
                 }
  
               }
       });
	
}
function update_calon(){
   		var formData = new FormData($("#form_inputan")[0]);
          //swal_process();
          url = '<?php echo base_url();?>admin/update_calon';
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
function save_calon(){	
		
		var formData = new FormData($("#form_inputan")[0]);
       // ajax adding data to database
          $.ajax({
            url : "<?php echo site_url('Admin/save_calon')?>",
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
           url : "<?php echo site_url('admin/hapus_calon')?>",
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
		my_table.ajax.url('<?php echo site_url()?>Admin/listdata_calon_siswa').load();
		return false;
	} else {
		if(txt_search !=''){	
				my_table.ajax.url('<?php echo site_url()?>Admin/listdata_calon_siswa/'+txt_search).load();
		} else {
				my_table.ajax.url('<?php echo site_url()?>Admin/listdata_calon_siswa').load();		
		}
	}

}

 

</script>
