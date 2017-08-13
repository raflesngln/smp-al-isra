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
                "url": "<?php echo site_url('Admin/listdata_kelas')?>",
                "type": "POST",
            },
            "columns": [
            { "data": "no","orderable":false,"visible":true },
			{ "data": "id_kelas"},
            { "data": "nm_kelas"},
			{ "data": "wali_kelas"},
			{ "data": "jumlah_tampung"},
			{ "data": "action","orderable":false,"visible":true}
            ]
          });  
  
$('#my_table tbody').on('dblclick', 'tr', function () {
            var tr = $(this).closest('tr');
            var row = my_table.row(tr);
		   var id=row.data().id_kelas;
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


<h3> DATA KELAS</h3>
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
                                <th width="9%">Wali Kelas</th>
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
                         </tr>
                         
                        </tbody>
                         <tfoot>
                        </tfoot>


                    </table>
                
                    
              




                            
                            
                            
                            
     
<form method="post" action="javascript:void(0);" onsubmit="save_kelas()" id="form_inputan" enctype="multipart/form-data" data-parsley-validate="">
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
                            <label>Kode Kelas</label>
                            <input name="id_kelas" type="text" class="md-input label-fixed" id="id_kelas" required="required" />
            <span class="uk-width-medium-1-3">
                            <input type="hidden" name="id_kelas2" id="id_kelas2" />
          </span></div>
                        
         
                        
 </div>
 
<div class="uk-grid" data-uk-grid-margin>
          <div class="uk-width-medium-1-1">
                            <label>Nama Kelas</label>
                            <input name="nm_kelas" type="text" class="md-input label-fixed" id="nm_kelas" value="" />
                        </div>
                        
                        
 </div>
<div class="uk-grid" data-uk-grid-margin>
          <div class="uk-width-medium-1-1">
            <label>jumlah_tampung</label>
                            <input name="jumlah_tampung" type="text" class="md-input label-fixed" id="jumlah_tampung" required="required" />
          </div>
                        
         
                        
 </div>
 <div class="uk-grid" data-uk-grid-margin>
          <div class="uk-width-medium-1-1">
            <label>Wali Kelas</label>
                            <select name="wali_kelas" class="md-input label-fixed" id="wali_kelas" required>
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
	load_guru('0-Select Guru');
	$("#form_inputan").attr('onsubmit','save_kelas()');
	$(".title_status").html('<i class="material-icons">note_add</i>New Data');
	
}
function edit_data(mydata){
	$('.btn-save').html('<i class="material-icons md-color-grey-50">refresh</i> Update');
	var id=mydata;
	       $.ajax({
		   type: "POST",
           url : "<?php echo site_url('Admin/load_edit_kelas')?>",
		    data: "id="+id,
           dataType: "json",
           success: function(data){
			   swal.close();
			   	modal=UIkit.modal("#modal_inputan",{bgclose:false,modal:false});
				modal.show();
				$("#form_inputan").attr('onsubmit','update_kelas()');
                for (var i =0; i<data.length; i++){
                   $("#id_kelas").val(data[i].id_kelas);
				   $("#nm_kelas").val(data[i].nm_kelas);
				   $("#jumlah_tampung").val(data[i].jumlah_tampung);
				   $("#id_kelas2").val(data[i].id_kelas);
				   
				   load_guru(data[i].wali_kelas);
				   $(".title_status").html('<i class="material-icons">edit</i>Edit Data');
                 }
  
               }
       });
	
}
function update_kelas(){
   		var formData = new FormData($("#form_inputan")[0]);
          //swal_process();
          url = '<?php echo base_url();?>admin/update_kelas';
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
function save_kelas(){	
		
		var formData = new FormData($("#form_inputan")[0]);
       // ajax adding data to database
          $.ajax({
            url : "<?php echo site_url('Admin/save_kelas')?>",
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
           url : "<?php echo site_url('admin/hapus_kelas')?>",
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
		my_table.ajax.url('<?php echo site_url()?>Admin/listdata_kelas').load();
		return false;
	} else {
		if(txt_search !=''){	
				my_table.ajax.url('<?php echo site_url()?>Admin/listdata_kelas/'+txt_search).load();
		} else {
				my_table.ajax.url('<?php echo site_url()?>Admin/listdata_kelas').load();		
		}
	}

}
<!-- FOR PICTUTER-->
 
function load_guru(myid){
	var id='open';
	var myid=myid;
		var input = myid.split('-');
		var nip=input[0];
		var nm_guru=input[1];
		
       $.ajax({
		   type: "POST",
           url : "<?php echo site_url('Admin/load_guru')?>",
		    data: "id="+id,
           dataType: "json",
           success: function(data){
                    $("#wali_kelas").empty();
                   $("#wali_kelas").append("<option value='"+nip+"'>"+nm_guru+"</option>");
                     for (var i =0; i<data.length; i++){
                   var option = "<option value='"+data[i].nip+"'>"+data[i].nm_guru+"</option>";
                          $("#wali_kelas").append(option);
                       }
               }
       }); 
 }
</script>
