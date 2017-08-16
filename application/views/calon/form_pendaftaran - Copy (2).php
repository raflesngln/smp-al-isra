<style>
.dropdown-content{
	top:30px !important;
}
#box-form{
    border: 1px #e0e0e0 solid;
    padding: 6px 6px 30px 6px;
    border-radius: 4px;
}
.status{
    background: #eee !important;
    margin-top: 5px !important;
    padding-left: 9px !important;
    color: #1267d4 !important;
}
.label{
	color:#f44336 !important
}
.badge{
	padding:7px;
	width:35%;
	margin:0px auto;
	background:#b1dcfb !important;
}
</style>


    <div class="row" id="box-form">
<h4><b><i class="fa fa-file-text-o"></i> FORM PENDAFTARAN SISWA BARU</b></h4>
 <p><?php echo isset($notif)?'<h6 class="badge" align="center"><i class="fa fa-info"></i> '.$notif.'</h6>':'';?></p>
<br />

      <!--   Icon Section   -->
      
 <form class="col s12" method="post" action="<?php echo base_url();?>Psb/submit_pendaftaran" enctype="multipart/form-data">
  <?php
 if($detail_isi !==''){
	 foreach($detail_isi as $row){
		 
		 $nomor=$row->nomor_daftar;
		 $id_calon=$row->id_calon;
		 $nama_lengkap=$row->nama_lengkap;
		 $jenis_kelamin=$row->jenis_kelamin;
		 $berat=$row->berat;
		 $tinggi=$row->tinggi;
		 $golongan_darah=$row->golongan_darah;
		 $nik=$row->nik;
		 $agama=$row->agama;
		 $nomor=$row->nomor_daftar;
		 $tempat_lahir=$row->tempat_lahir;
		 $tgl_lahir=$row->tgl_lahir;
		 $anak_ke=$row->anak_ke;
		 $jumlah_bersaudara=$row->jumlah_bersaudara;
		 $tempat_tinggal=$row->tempat_tinggal;
		 $asal_sekolah=$row->asal_sekolah;
		 $nama_ayah=$row->nama_ayah;
		 $nama_ibu=$row->nama_ibu;
		 $tgl_lahir_ayah=$row->tgl_lahir_ayah;
		 $tgl_lahir_ibu=$row->tgl_lahir_ibu;
		 $pendidikan_ayah=$row->pendidikan_ayah;
		 $pendidikan_ibu=$row->pendidikan_ibu;
		 $pekerjaan_ayah=$row->pekerjaan_ayah;
		 $pekerjaan_ibu=$row->pekerjaan_ibu;
		 $penghasilan_ayah=$row->penghasilan_ayah;
		 $penghasilan_ibu=$row->penghasilan_ibu;
		 $alamat_ayah=$row->alamat_ayah;
		 $alamat_ibu=$row->alamat_ibu;
		 $pass_photo=$row->pass_photo;
		 $ijasah=$row->ijasah;
		 $kk=$row->kk;
		 $traskrip_nilai=$row->traskrip_nilai;
		 
		 $status_proses=$row->status_proses;

	 }
 }
 ?>

<?php 
 if(isset($nomor))
 {
?>
 <div class="row">    
        <div class="input-field col s4">
          <input name="nomor_daftar" type="text" class="status" id="first_name" placeholder="di generate oleh system" readonly="readonly" value="<?php echo isset($nomor)?$nomor:'';?>">
          <label for="status_proses" class="label">Nomor Daftar Anda</label>
      </div>


<div class="input-field col s4">
          <input name="status_proses" type="text" class="status" id="first_name" readonly="readonly" value="<?php echo isset($status_proses)?$status_proses:'';?>">
          <label for="status_proses" class="label">Status Pendaftaran Anda</label>
      </div>
 

       
    </div>
 <?php } ?>        
      
    <div class="row">
      <h6><i class="fa fa-user fa-2x"></i>&nbsp; <b><u> A.	KETERANGAN CALON PESERTA DIDIK</u></b></h6>
        <div class="input-field col s6">
          <input name="nm_lengkap" type="text" class="validate" id="first_name" placeholder="&nbsp;" value="<?php echo isset($nama_lengkap)?$nama_lengkap:'';?>" required="required">
          <label for="first_name">Nama lengkap</label>
        </div>
        <div class="input-field col s6">
                    <select name="jenis_kelamin" id="jenis_kelamin" required="required">
                      <option value="<?php echo isset($jenis_kelamin)?$jenis_kelamin:'';?>"><?php echo isset($jenis_kelamin)?$jenis_kelamin:'';?></option>>
                      <option value="Pria">Pria</option>
                      <option value="Wanita">Wanita</option>
                    </select>
                    <label>Jenis kelamin</label>
              
        </div>
      </div>
      
 <div class="row">
        <div class="input-field col s4">
          <input name="berat" type="text" class="validate" id="first_name" placeholder="kg" value="<?php echo isset($berat)?$berat:'';?>" required="required">
          <label for="first_name">Berat Badan</label>
        </div>
        
<div class="input-field col s4">
          <input name="tinggi" type="text" class="validate" id="first_name" placeholder="cm" value="<?php echo isset($tinggi)?$tinggi:'';?>" required="required">
          <label for="first_name">Tinggi Badan Badan</label>
        </div>
<div class="input-field col s4">
          <input name="golongan_darah" type="text" class="validate" id="first_name" placeholder="&nbsp;" value="<?php echo isset($golongan_darah)?$golongan_darah:'';?>" required="required">
          <label for="first_name">Golongan Darah</label>
        </div>
    </div>    
<div class="row">
        <div class="input-field col s6">
          <input name="nik" type="text" class="validate" id="first_name" placeholder="&nbsp;" value="<?php echo isset($nik)?$nik:'';?>" required="required">
          <label for="first_name">NIK (Nomor Induk Kependidikan)</label>
      </div>
        
<div class="input-field col s6">
                    <select name="agama" id="agama" required="required">
<option value="<?php echo isset($agama)?$agama:'';?>"><?php echo isset($agama)?$agama:'Pilih';?></option>
                      <option value="islam">islam</option>
                      <option value="protestan">protestan</option>
                      <option value="khatolik">khatolik</option>
                      <option value="budha">budha</option>
                      <option value="hindu">hindu</option>
                    </select>
                    <label>Agama</label>
              
      </div>
    </div>
      
 
 <div class="row">
     
      <div class="input-field col s6">
          <input name="tempat_lahir" type="text" class="validate" id="first_name" placeholder="&nbsp;" value="<?php echo isset($tempat_lahir)?$tempat_lahir:'';?>" required="required">
          <label for="first_name">Tempat Lahir</label>
        </div>
      <div class="input-field col s2">
                    <select name="tgl_calon" id="tgl_calon" required="required">
<option value="<?php echo isset($tgl_lahir)?substr($tgl_lahir,8,2):'';?>"><?php echo isset($tgl_lahir)?substr($tgl_lahir,8,2):'Pilih';?></option>
                        <?php
				   for($i=1;$i<=31;$i++){
					if($i<10){
						$i='0'.$i;	
					}
				   ?>
                     <option value="<?=$i;?>"><?=$i;?></option>
                      <?php } ?>
                    </select>
                    <label>TGL</label>
              
        </div>
<div class="input-field col s2">
                    <select name="bln_calon" id="bln_calon" required="required">
<option value="<?php echo isset($tgl_lahir)?substr($tgl_lahir,5,2):'';?>"><?php echo isset($tgl_lahir)?substr($tgl_lahir,5,2):'Pilih';?></option>
                        <?php
				   for($i=1;$i<=12;$i++){
					if($i<10){
						$i='0'.$i;	
					}
				   ?>
                     <option value="<?=$i;?>"><?=$i;?></option>
                      <?php } ?>
                    </select>
                    <label>BLN</label>
              
        </div>
<div class="input-field col s2">
                    <select name="thn_calon" id="thn_calon" required="required">
<option value="<?php echo isset($tgl_lahir)?substr($tgl_lahir,0,4):'';?>"><?php echo isset($tgl_lahir)?substr($tgl_lahir,0,4):'Pilih';?></option>
                        <?php
				   for($i=2000;$i<=2050;$i++){
				   ?>
                     <option value="<?=$i;?>"><?=$i;?></option>
                      <?php } ?>
                    </select>
                    <label>THN</label>
              
        </div>
    </div>     
      
 <div class="row">
<div class="input-field col s6">
          <input name="anak_ke" type="text" class="validate" id="first_name" placeholder="&nbsp;" value="<?php echo isset($anak_ke)?$anak_ke:'';?>" required="required">
          <label for="first_name">Anak Ke -</label>
        
      </div>
<div class="input-field col s6">
          <input name="jumlah_bersaudara" type="text" class="validate" id="first_name" placeholder="&nbsp;" value="<?php echo isset($jumlah_bersaudara)?$jumlah_bersaudara:'';?>" required="required">
          <label for="first_name">Jumlah bersaudara</label>
        
      </div>
    </div>    

<div class="row">
        
        
<div class="input-field col s6">
          <input name="tempat_tinggal" type="text" class="validate" id="first_name" placeholder="&nbsp;" value="<?php echo isset($tempat_tinggal)?$tempat_tinggal:'';?>" required="required">
          <label for="first_name">Alamat Tempat Tinggal</label>
        
        </div>
<div class="input-field col s6">
          <input name="asal_sekolah" type="text" class="validate" id="first_name" placeholder="&nbsp;" value="<?php echo isset($asal_sekolah)?$asal_sekolah:'';?>" required="required">
          <label for="first_name">Nama Asal Sekolah</label>
        
        </div>
      </div>


<!--orang tua field-->
      <div class="row">
      <h6><i class="fa fa-users fa-2x"></i>&nbsp; <b><u> B.	KETERANGAN ORANG TUA</u></b></h6>
      <p>a.	Nama</p>
        <div class="input-field col s6">
          <input name="nama_ayah" type="text" class="validate" id="first_name" placeholder="&nbsp;" value="<?php echo isset($nama_ayah)?$nama_ayah:'';?>" required="required">
          <label for="first_name">Ayah</label>
        </div>
        <div class="input-field col s6">
          <input name="nama_ibu" type="text" class="validate" id="first_name" placeholder="&nbsp;" value="<?php echo isset($nama_ibu)?$nama_ibu:'';?>" required="required">
          <label for="first_name">Ibu</label>
        </div>
      </div>
      
      
<div class="row">
		<p>b.	Tahun Lahir</p>
        <div class="input-field col s6">
   <select name="tgl_lahir_ayah" id="nama_ayah">
   <option value="<?php echo isset($tgl_lahir_ayah)?$tgl_lahir_ayah:'';?>"><?php echo isset($tgl_lahir_ayah)?$tgl_lahir_ayah:'Pilih';?></option>
                        <?php
				   for($i=1945;$i<=2010;$i++){
				   ?>
                     <option value="<?=$i;?>"><?=$i;?></option>
                      <?php } ?>
          </select>
          <label>Ayah</label>
      </div>
        
<div class="input-field col s6">
   <select name="tgl_lahir_ibu" id="thn_ibu">
   <option value="<?php echo isset($tgl_lahir_ibu)?$tgl_lahir_ibu:'';?>"><?php echo isset($tgl_lahir_ibu)?$tgl_lahir_ibu:'Pilih';?></option>
                        <?php
				   for($i=1945;$i<=2010;$i++){
				   ?>
                     <option value="<?=$i;?>"><?=$i;?></option>
                      <?php } ?>
        </select>
                    <label>Ibu</label>
              
      </div>
    </div>

<div class="row">
		<p>c.	Pendidikan Terakhir</p>
        <div class="input-field col s6">
          <input name="pendidikan_ayah" type="text" class="validate" id="first_name" placeholder="&nbsp;" value="<?php echo isset($pendidikan_ayah)?$pendidikan_ayah:'';?>">
          <label for="first_name">Ayah</label>
      </div>
        
<div class="input-field col s6">
          <input name="pendidikan_ibu" type="text" class="validate" id="first_name" placeholder="&nbsp;" value="<?php echo isset($pendidikan_ibu)?$pendidikan_ibu:'';?>">
        <label for="first_name">Ibu</label>
              
      </div>
    </div>      
 
 <div class="row">
		<p>d.	Pekerjaan</p>
        <div class="input-field col s6">
          <input name="pekerjaan_ayah" type="text" class="validate" id="first_name" placeholder="&nbsp;" value="<?php echo isset($pekerjaan_ayah)?$pekerjaan_ayah:'';?>">
          <label for="first_name">Ayah</label>
      </div>
        
<div class="input-field col s6">
          <input name="pekerjaan_ibu" type="text" class="validate" id="first_name" placeholder="&nbsp;" value="<?php echo isset($pekerjaan_ibu)?$pekerjaan_ibu:'';?>">
          <label for="first_name">Ibu</label>
              
      </div>
    </div>
    
    
<div class="row">
		<p>e.	Penghasilan Perbulan</p>
        <div class="input-field col s6">
          <input name="penghasilan_ayah" type="text" class="validate" id="first_name" placeholder="&nbsp;" value="<?php echo isset($penghasilan_ayah)?$penghasilan_ayah:'';?>">
          <label for="first_name">Ayah</label>
      </div>
        
<div class="input-field col s6">
          <input name="penghasilan_ibu" type="text" class="validate" id="first_name" placeholder="&nbsp;" value="<?php echo isset($penghasilan_ibu)?$penghasilan_ibu:'';?>">
          <label for="first_name">Ibu</label>
              
      </div>
    </div>     
      
      

<div class="row">
     <p>f.	Tempat Tinggal</p>   
        <div class="input-field col s6">
          <textarea name="alamat_ayah" class="materialize-textarea" id="textarea1" placeholder="&nbsp;" required="required"><?php echo isset($alamat_ayah)?$alamat_ayah:'';?></textarea>
          <label for="textarea1">Ayah </label>
        
      </div>
<div class="input-field col s6">
        <textarea name="alamat_ibu" class="materialize-textarea" id="textarea1" placeholder="&nbsp;" required="required"><?php echo isset($alamat_ibu)?$alamat_ibu:'';?></textarea>
          <label for="textarea1">Ibu</label>
        
      </div>
    </div>
 
<!--orang tua field-->
      <div class="row">
      <h6><i class="fa fa-file-archive-o fa-2x"></i> &nbsp; <b><u> C.	LAMPIRAN-LAMPIRAN</u></b></h6>
      <p>a.	Pass Photo 3x4</p>
        <div class="input-field col s6">
        
          <input name="picture" type="file" id="picture" />
          <span class="uk-width-medium-1-3">
          <input type="hidden" name="oldPict" id="oldPict" value="<?php echo isset($pass_photo)?$pass_photo:'';?>" />
        </span></div>
        
        <div class="input-field col s6">
    <img src="<?php echo base_url();?>assets/images/calon/<?php echo isset($nomor)?$nomor.'/':'';?><?php echo isset($pass_photo)?$pass_photo:'noimage.png';?>" name="view_gbr" width="120px" height="150px" class="view_gbr"  id="view_gbr" data-uk-modal="{target:'#modal_lightbox',modal:false}"  />
	<span>    <i class="material-icons md-24" id="delbutton" title="remove picture">close</i></span>
        </div>
      </div>
      
      
<div class="row">

 <p>b.	Lampiran</p>
        <div class="input-field col s4">
        <p for="picture">Upload Ijasah</p>
          <input name="ijasah" type="file" />
        </div>
<div class="input-field col s4">
        <p for="picture">Upload Kartu Keluarga</p>
          <input name="kk" type="file" id="kk" />
        </div>
      <div class="input-field col s4">
        <p for="picture">Upload Transkrip Nilai</p>
          <input name="nilai" type="file" id="nilai" />
          
        </div>
    </div>  


<div class="uk-grid" style="margin-bottom:40px">&nbsp;</div>           
    <button type="submit" class="waves-effect light-blue darken-3 waves-light btn-large btn">
      <i class="fa fa-save"></i> Submit Pendaftaran
      </button>
      
      
    </form>
      

    </div>
    
    <script>
$(document).ready(function(e) {
    $('select').material_select();        
	});

<!-- FOR PICTUTER-->
 
  <!--- picture -->\
$("#picture").change(function(e) {
    load_gbr(this);
});
$("#gbr2").change(function(e) {
    load_gbr(this);
});

function load_gbr(input){
		var boxPicture='view_gbr';

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
	
	</script>
