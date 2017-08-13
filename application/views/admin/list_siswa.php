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
.badge-yes{
	background:#7cb342;
	padding:4px;
	color:#FFF;	
}
.badge-no{
	background:red;
	padding:4px;
	color:#FFF;	
}
.md-input-wrapper>label {
    color: #aaa !important;
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
                "url": "<?php echo site_url('Admin/listdata_siswa')?>",
                "type": "POST",
            },			
            "columns": [
            { "data": "no","orderable":false,"visible":true },
			{ "data": "NIS"},
            { "data": "nama_lengkap"},
			{ "data": "jenis_kelamin"},
            { "data": "agama"},
            { "data": "kelas"},
			{ "data": "action","orderable":false,"visible":true}
            ]
          });  
  
$('#my_table tbody').on('dblclick', 'tr', function () {
            var tr = $(this).closest('tr');
            var row = my_table.row(tr);
		   var id=row.data().NIS;
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


<h3>  DATA SISWA</h3>
<!-- SORTING ---->
<div class="uk-grid" >
  
    <div class="uk-width-medium-2-10">
      <label>Status_validasi</label>
   <select name="kelas_combo" class="md-input label-fixed" id="kelas_combo" required>
	
    <option value="">Pilih kelas</option>
    <?php
	foreach($kelas as $row){ 
	?>
    <option value="<?php echo $row->id_kelas;?>"><?php echo $row->nm_kelas;?></option>
   <?php } ?>

                    
     </select>
  </div>                      
 <div class="uk-width-medium-2-10" >
         <button   onclick="cetak_siswa()" class="md-btn md-btn-success md-btn-wave-light uk-float-right">
     <i class="material-icons md-color-brown-50 ">print</i>
      <span>Cetak</span>                                        
    </button>&nbsp;..
    
    <span><button   onclick="sort_siswa()" class="md-btn md-btn-success md-btn-wave-light uk-float-right">
     <i class="material-icons md-color-brown-50 ">search</i>
      <span>Sort</span>                                        
    </button> </span>&nbsp;..
          </div>  
<div class="uk-width-medium-6-10">&nbsp;</div>       
                        
 </div>
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

 
<!--<button   onclick="new_status()" class="md-btn md-btn-success md-btn-wave-light uk-float-right">
 <i class="material-icons md-color-brown-50 ">control_point</i>
  <span>New Data</span>                                        
</button>-->

<br />
<div class="uk-width-medium-1-1">&nbsp;</div>



<table id="my_table" class="uk-table uk-table-hover my_table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                              <th width="2%">No</th>
                                <th width="8%">NIS </th>
                                <th width="9%">Nama Lengkap</th>
                                <th width="30%">Jenis Kelamin</th>
                                <th width="5%">Agama</th>
                                <th width="5%">Kelas</th>
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
                
                    
              




                            
                            
                            
                            
     
<form method="post" action="javascript:void(0);" onsubmit="save_pendaftaran()" id="form_inputan" enctype="multipart/form-data" data-parsley-validate="">
 <div id="modal_inputan" class="uk-modal">
         <div class="uk-modal-dialog uk-modal-dialog-large">
   <button type="button" class="uk-modal-close uk-close"></button>
    <div class="uk-modal-header">
   <h3 class="uk-modal-title title_status">Title status</h3>
    </div>                                  
 
 <!-- header title -->
<div class="md-card-content">
<h5 class="uk-badge">A.	KETERANGAN CALON PESERTA DIDIK</h5>
<div class="uk-grid" data-uk-grid-margin>
<div class="uk-width-medium-6-10">
                            <label>nama_lengkap</label>
                            <input name="nama_lengkap" type="text" class="md-input label-fixed" id="nama_lengkap" required="required" />
<input type="hidden" name="NIS2" id="NIS2" />
</div>

<div class="uk-width-medium-2-10">
            <label>nis</label>
                            <input name="NIS" type="text" class="md-input label-fixed" id="NIS" required="required" />
 </div>

<div class="uk-width-medium-2-10">
                            <label>nomor_daftar</label>
                            <input name="nomor_daftar" type="text" class="md-input label-fixed" id="nomor_daftar" required="required" disabled="disabled"/>
            
          </div>
</div>

 <div class="uk-grid" data-uk-grid-margin>
          
<div class="uk-width-medium-2-10">
                            <label>tgl_daftar</label>
                            <input name="tgl_daftar" type="text" class="md-input label-fixed" id="tgl_daftar" required="required" />
</div>                      
 <div class="uk-width-medium-2-10">
            <label>Jenis Kelamin</label>
          <select name="jenis_kelamin" class="md-input label-fixed" id="jenis_kelamin" required>
          <option value="">pilih</option>
          </select>
</div>      
 <div class="uk-width-medium-2-10">
                            <label>berat</label>
                            <input name="berat" type="text" class="md-input label-fixed" id="berat" required="required" />
            
          </div>  
<div class="uk-width-medium-2-10">
                            <label>tinggi</label>
                            <input name="tinggi" type="text" class="md-input label-fixed" id="tinggi" required="required" />
</div>  
<div class="uk-width-medium-2-10">
            <label>golongan_darah</label>
            <input name="golongan_darah" type="text" class="md-input label-fixed" id="golongan_darah" required="required" />
 </div>                   
 </div>
 
 
<div class="uk-grid" data-uk-grid-margin>
 
 <div class="uk-width-medium-2-10">
                            <label>agama</label>
                            <input name="agama" type="text" class="md-input label-fixed" id="agama" required="required" />
 </div>
          <div class="uk-width-medium-2-10">
                            <label>tempat_lahir</label>
                            <input name="tempat_lahir" type="text" class="md-input label-fixed" id="tempat_lahir" required="required" />
            
          </div>
<div class="uk-width-medium-2-10">
                            <label>tgl_lahir</label>
                            <input name="tgl_lahir" type="text" class="md-input label-fixed" id="tgl_lahir" required="required" />
</div>                      
 <div class="uk-width-medium-2-10">
            <label>anak_ke</label>
            <input name="anak_ke" type="text" class="md-input label-fixed" id="anak_ke" required="required" />
 </div>  
<div class="uk-width-medium-2-10">
            <label>jumlah_bersaudara</label>
            <input name="jumlah_bersaudara" type="text" class="md-input label-fixed" id="jumlah_bersaudara" required="required" />
 </div>    
                        
 </div>

<div class="uk-grid" data-uk-grid-margin>
 
 <div class="uk-width-medium-4-10">
            <label>tempat_tinggal</label>
                            <input name="tempat_tinggal" type="text" class="md-input label-fixed" id="tempat_tinggal" required="required" />
 </div>
          <div class="uk-width-medium-4-10">
                            <label>asal_sekolah</label>
                            <input name="asal_sekolah" type="text" class="md-input label-fixed" id="asal_sekolah" required="required" />
            
          </div>
    
                        
 </div>
 
 <h5 class="uk-badge">B.	KETERANGAN ORANG TUA</h5>
<div class="uk-grid" data-uk-grid-margin>
 
<div class="uk-width-medium-2-10">
                            <label>nama_ayah</label>
                            <input name="nama_ayah" type="text" class="md-input label-fixed" id="nama_ayah" required="required" />
</div>                      
 <div class="uk-width-medium-2-10">
            <label>nama_ibu</label>
            <input name="nama_ibu" type="text" class="md-input label-fixed" id="nama_ibu" required="required" />
 </div>  
          <div class="uk-width-medium-2-10">
                            <label>tgl_lahir_ayah</label>
                            <input name="tgl_lahir_ayah" type="text" class="md-input label-fixed" id="tgl_lahir_ayah" required="required" />
            
          </div>
<div class="uk-width-medium-2-10">
                            <label>tgl_lahir_ibu</label>
                            <input name="tgl_lahir_ibu" type="text" class="md-input label-fixed" id="tgl_lahir_ibu" required="required" />
</div>                      
       
                        
 </div>
 
<div class="uk-grid" data-uk-grid-margin>
 
<div class="uk-width-medium-2-10">
                            <label>pendidikan_ayah</label>
                            <input name="pendidikan_ayah" type="text" class="md-input label-fixed" id="pendidikan_ayah" required="required" />
</div>                      
 <div class="uk-width-medium-2-10">
            <label>pendidikan_ibu</label>
            <input name="pendidikan_ibu" type="text" class="md-input label-fixed" id="pendidikan_ibu" required="required" />
 </div>  
          <div class="uk-width-medium-2-10">
                            <label>pekerjaan_ayah</label>
                            <input name="pekerjaan_ayah" type="text" class="md-input label-fixed" id="pekerjaan_ayah" required="required" />
            
          </div>
<div class="uk-width-medium-2-10">
                            <label>pekerjaan_ibu</label>
                            <input name="pekerjaan_ibu" type="text" class="md-input label-fixed" id="pekerjaan_ibu" required="required" />
</div>                      
       
                        
 </div>
 
 <div class="uk-grid" data-uk-grid-margin>
 
<div class="uk-width-medium-2-10">
                            <label>penghasilan_ayah</label>
                            <input name="penghasilan_ayah" type="text" class="md-input label-fixed" id="penghasilan_ayah" required="required" />
</div>                      
 <div class="uk-width-medium-2-10">
            <label>penghasilan_ibu</label>
            <input name="penghasilan_ibu" type="text" class="md-input label-fixed" id="penghasilan_ibu" required="required" />
 </div>  
          <div class="uk-width-medium-2-10">
                            <label>alamat_ayah</label>
                            <input name="alamat_ayah" type="text" class="md-input label-fixed" id="alamat_ayah" required="required" />
            
          </div>
<div class="uk-width-medium-2-10">
                            <label>alamat_ibu</label>
                            <input name="alamat_ibu" type="text" class="md-input label-fixed" id="alamat_ibu" required="required" />
</div>                      
       
                        
 </div>
 
 <h5 class="uk-badge">C.	LAMPIRAN-LAMPIRAN</h5>
<div class="uk-grid" data-uk-grid-margin>
<div class="uk-width-medium-2-10">
                            <label>pass_photo</label>
                            
                  <p>
      <a href="" class="md-btn md-btn-success" name="pass_photo" id="pass_photo" target="new">lihat</a>
                  </p>
                
</div>                      
 <div class="uk-width-medium-2-10">
            <label>ijasah</label>
                                        
                  <p>
      <a href="" class="md-btn md-btn-success" name="ijasah" id="ijasah" target="new">lihat</a>
                  </p>
 </div>  
          <div class="uk-width-medium-2-10">
                            <label>Kartu Keluarga (KK)</label>
                                     
                  <p>
      <a href="" class="md-btn md-btn-success" name="kk" id="kk" target="new">lihat</a>
                  </p>
            
          </div>
<div class="uk-width-medium-2-10">
                            <label>traskrip_nilai</label>
                                
                  <p>
      <a href="" class="md-btn md-btn-success" name="traskrip_nilai" id="traskrip_nilai" target="new">lihat</a>
                  </p>
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
	$("#form_inputan").attr('onsubmit','save_pendaftaran()');
	$(".title_status").html('<i class="material-icons">note_add</i>New Data');
	
}
function edit_data(mydata){
	$('.btn-save').html('<i class="material-icons md-color-grey-50">refresh</i> Update');
	var id=mydata;

	       $.ajax({
		   type: "POST",
           url : "<?php echo site_url('Admin/load_edit_siswa')?>",
		    data: "id="+id,
           dataType: "json",
           success: function(data){
			   swal.close();
			   	modal=UIkit.modal("#modal_inputan",{bgclose:false,modal:false});
				modal.show();
				$("#form_inputan").attr('onsubmit','update_siswa()');
                for (var i =0; i<data.length; i++){

				$("#nomor_daftar").val(data[i].nomor_daftar);
				$("#nomor_daftar2").val(data[i].nomor_daftar);
				$("#NIS").val(data[i].NIS);
				$("#tgl_verifikasi").val(data[i].tgl_verifikasi);
				$("#nomor_daftar").val(data[i].nomor_daftar);
				$("#nama_lengkap").val(data[i].nama_lengkap);
				
 $("#jenis_kelamin").empty();
 $("#jenis_kelamin").append("<option value='"+data[i].jenis_kelamin+"'>"+data[i].jenis_kelamin+"</option>");
 $("#jenis_kelamin").append("<option value='pria'>pria</option>");
 $("#jenis_kelamin").append("<option value='wanita'>wanita</option>");   
				   
				$("#berat").val(data[i].berat);
				$("#tinggi").val(data[i].tinggi);
				$("#golongan_darah").val(data[i].golongan_darah);
				$("#NIS").val(data[i].NIS);
				$("#NIS").val(data[i].NIS);
				$("#agama").val(data[i].agama);
				$("#tempat_lahir").val(data[i].tempat_lahir);
				$("#tgl_lahir").val(data[i].tgl_lahir);
				$("#anak_ke").val(data[i].anak_ke);
				$("#anak_ke").val(data[i].anak_ke);
				$("#jumlah_bersaudara").val(data[i].jumlah_bersaudara);
				$("#tempat_tinggal").val(data[i].tempat_tinggal);
				$("#asal_sekolah").val(data[i].asal_sekolah);
				$("#nama_ayah").val(data[i].nama_ayah);
				$("#nama_ibu").val(data[i].nama_ibu);
				$("#tgl_lahir_ayah").val(data[i].tgl_lahir_ayah);
				$("#tgl_lahir_ibu").val(data[i].tgl_lahir_ibu);
				$("#pendidikan_ayah").val(data[i].pendidikan_ayah);
				$("#pendidikan_ibu").val(data[i].pendidikan_ibu);
				$("#pekerjaan_ayah").val(data[i].pekerjaan_ayah);
				$("#pekerjaan_ibu").val(data[i].pekerjaan_ibu);
				$("#penghasilan_ayah").val(data[i].penghasilan_ayah);
				$("#penghasilan_ibu").val(data[i].penghasilan_ibu);
				$("#alamat_ayah").val(data[i].alamat_ayah);
				$("#alamat_ibu").val(data[i].alamat_ibu);
				
				var path='../assets/images/calon/'+data[i].nomor_daftar+'/';
				
				$("#pass_photo").attr("href",path+data[i].pass_photo);
				$("#ijasah").attr("href",path+data[i].ijasah);
				$("#kk").attr("href",path+data[i].kk);
				$("#traskrip_nilai").attr("href",path+data[i].traskrip_nilai);
 
 $("#status_proses").empty();
 $("#status_proses").append("<option value='"+data[i].status_proses+"'>"+data[i].status_proses+"</option>");
 $("#status_proses").append("<option value='pending'>pending</option>");
 $("#status_proses").append("<option value='proses'>proses</option>"); 
 $("#status_proses").append("<option value='diterima'>diterima</option>");
 $("#status_proses").append("<option value='ditolak'>ditolak</option>"); 
 
 $("#status_pembayaran").empty();
 $("#status_pembayaran").append("<option value='"+data[i].status_pembayaran+"'>"+data[i].status_pembayaran+"</option>");
 $("#status_pembayaran").append("<option value='belum_lunas'>belum_lunas</option>");
 $("#status_pembayaran").append("<option value='lunas'>lunas</option>"); 



				$("#status_pembayaran").val(data[i].status_pembayaran);

				   $(".title_status").html('<i class="material-icons">edit</i>View/Edit Data Siswa');
                 }
  
               }
       });
	
}
function update_siswa(){
   		var formData = new FormData($("#form_inputan")[0]);
          //swal_process();
          url = '<?php echo base_url();?>admin/update_siswa';
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
		my_table.ajax.url('<?php echo site_url()?>Admin/listdata_formulir_pendaftaran').load();
		return false;
	} else {
		if(txt_search !=''){	
				my_table.ajax.url('<?php echo site_url()?>Admin/listdata_formulir_pendaftaran/'+txt_search).load();
		} else {
				my_table.ajax.url('<?php echo site_url()?>Admin/listdata_formulir_pendaftaran').load();		
		}
	}

}
 function sort_siswa(){
	var kelas=$("#kelas_combo").val();
	
	if(kelas==''){
		my_table.ajax.url('<?php echo site_url()?>Admin/listdata_siswa').load();
		return false;
	} else {
		if(kelas !=''){	
				my_table.ajax.url('<?php echo site_url()?>Admin/sort_siswa/'+kelas).load();
		} else {
				my_table.ajax.url('<?php echo site_url()?>Admin/listdata_siswa').load();		
		}
	}

}
 <!-- FOR laporan-->
 function cetak_siswa(){
	var kelas=$("#kelas_combo").val();
	
window.location.href="<?php echo site_url()?>Admin/cetak_laporan_siswa/"+kelas,"target='new'";

 }

</script>
