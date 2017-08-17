 <style>
h1{
	font-size:26pt !important;
}
#form-box label{
	font-size:12px;
}
.input {
    border: 1px #dadada solid !important;
    padding: 4px 4px 4px 8px !important;
    background-color: #ffffff !important;
    color: #202020;
}

#form-box {
	margin-top:0px;
    border: 1px #f5f5f5 solid;
    padding-bottom: 70px;
    box-shadow: 1px 5px 13px #ddd;
    padding: 20px ;
}
select {
     display:block; 
	     background-color: rgba(255,255,255,0.9);
    width: 100%;
    padding: 5px;
    border: 1px solid #f2f2f2;
    border-radius: 2px;
    height: 4rem;
}
.fa-4x{
	height:40px;
	width:40px;
}
 </style> 

<div class="row" >

           

      <div class="row">
  <?php
 if($detail_isi !=''){
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
 <form class="col s12" method="post" action="<?php echo base_url();?>Psb/submit_pendaftaran" id="form-box"  enctype="multipart/form-data">

  
    
 <?php 
 if(isset($nomor))
 {
?>   
<div class="row">

<a href="<?php echo base_url();?>Psb/cetak_pendaftaran/<?php echo isset($nomor)?$nomor:'';?>"  style="float:right" type="button" class="waves-effect waves-light btn orange" target="new"> <i class="fa fa-print fa-2x"></i> Print</a>
</div>

<div class="row">
        <div class="col s6">
        <label for="email">Nomor Daftar Anda</label>
          <input name="nama" value="<?php echo isset($nomor)?$nomor:'';?>" type="text" class=" input" id="password" readonly="readonly">
          
        </div>
<div class="col s6">
        <label for="email">Status Pendaftaran Anda</label>
          <input name="nama" value="<?php echo isset($status_proses)?$status_proses:'';?>" type="text" class=" input" id="password" readonly="readonly">
          
        </div>
      </div>
  <?php } ?>       
      
      
  <h6><i class="fa fa-user fa-2x"></i>&nbsp; <b><u> A.	KETERANGAN CALON PESERTA DIDIK</u></b></h6>
      <div class="row">
        <div class="col s6">
        <label for="email">Nama Lengkap</label>
          <input name="nm_lengkap" type="text" class="input" id="first_name" placeholder="&nbsp;" value="<?php echo isset($nama_lengkap)?$nama_lengkap:'';?>" required="required">
          
        </div>
<div class="col s6">
        <label for="email">Jenis Kelamin</label>
       <select name="jenis_kelamin" id="jenis_kelamin" required="required">
                      <option value="<?php echo isset($jenis_kelamin)?$jenis_kelamin:'';?>"><?php echo isset($jenis_kelamin)?$jenis_kelamin:'';?></option>>
                      <option value="Pria">Pria</option>
                      <option value="Wanita">Wanita</option>
                    </select>
          
        </div>
      </div>
 
 <div class="row">
        <div class="col s4">
         <label for="first_name">Berat Badan</label>
         <input name="berat" type="text" class="input" id="first_name" placeholder="kg" value="<?php echo isset($berat)?$berat:'';?>" required="required">
         
        </div>
<div class="col s4">
 <label for="first_name">Tinggi Badan Badan</label>
       <input name="tinggi" type="text" class="input" id="first_name" placeholder="cm" value="<?php echo isset($tinggi)?$tinggi:'';?>" required="required">
         
          
        </div>
<div class="col s4">
<label for="first_name">Golongan Darah</label>
         <input name="golongan_darah" type="text" class="input" id="first_name" placeholder="&nbsp;" value="<?php echo isset($golongan_darah)?$golongan_darah:'';?>" required="required">
          
          
        </div>
      </div>

<div class="row">
        <div class="col s6">
        <label for="first_name">NIK (Nomor Induk Kependidikan)</label>
        <input name="nik" type="text" class="input" id="first_name" placeholder="&nbsp;" value="<?php echo isset($nik)?$nik:'';?>" required="required">
          
          
        </div>
<div class="col s6">
 <label>Agama</label>
        <select name="agama" id="agama" required="required">
<option value="<?php echo isset($agama)?$agama:'';?>"><?php echo isset($agama)?$agama:'Pilih';?></option>
                      <option value="islam">islam</option>
                      <option value="protestan">protestan</option>
                      <option value="khatolik">khatolik</option>
                      <option value="budha">budha</option>
                      <option value="hindu">hindu</option>
                    </select>
                   
        </div>
      </div>
      
<div class="row">
        <div class="col s3">
         <label for="first_name">Tempat Lahir</label>
          <input name="tempat_lahir" type="text" class="input" id="first_name" placeholder="&nbsp;" value="<?php echo isset($tempat_lahir)?$tempat_lahir:'';?>" required="required">
         
          
        </div>
<div class="col s3">
 <label>TGL</label>
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
                   
          
        </div>
<div class="col s3">
<label>BLN</label>
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
                    
        </div>
<div class="col s3">
<label>THN</label>
           <select name="thn_calon" id="thn_calon" required="required">
<option value="<?php echo isset($tgl_lahir)?substr($tgl_lahir,0,4):'';?>"><?php echo isset($tgl_lahir)?substr($tgl_lahir,0,4):'Pilih';?></option>
                        <?php
				   for($i=2000;$i<=2050;$i++){
				   ?>
                     <option value="<?=$i;?>"><?=$i;?></option>
                      <?php } ?>
                    </select>
                    
        </div>
      </div>

<div class="row">
        <div class="col s6">
        <label for="first_name">Anak Ke -</label>
         <input name="anak_ke" type="text" class="input" id="first_name" placeholder="&nbsp;" value="<?php echo isset($anak_ke)?$anak_ke:'';?>" required="required">
          
          
        </div>
<div class="col s6">
<label for="first_name">Jumlah bersaudara</label>
        <input name="jumlah_bersaudara" type="text" class="input" id="first_name" placeholder="&nbsp;" value="<?php echo isset($jumlah_bersaudara)?$jumlah_bersaudara:'';?>" required="required">
          
          
        </div>
      </div>

<div class="row">
        <div class="col s6">
        <label for="first_name">Alamat Tempat Tinggal</label>
          <input name="tempat_tinggal" type="text" class="input" id="first_name" placeholder="&nbsp;" value="<?php echo isset($tempat_tinggal)?$tempat_tinggal:'';?>" required="required">
          
          
        </div>
<div class="col s6">
 <label for="first_name">Nama Asal Sekolah</label>
        <input name="asal_sekolah" type="text" class="input" id="first_name" placeholder="&nbsp;" value="<?php echo isset($asal_sekolah)?$asal_sekolah:'';?>" required="required">
         
          
        </div>
      </div>
      
  <h6><i class="fa fa-users fa-2x"></i>&nbsp; <b><u> B.	KETERANGAN ORANG TUA</u></b></h6>
<div class="row">
	<p>a.	Nama</p>
        <div class="col s6">
        <label for="first_name">Ayah</label>
        <input name="nama_ayah" type="text" class="input" id="first_name" placeholder="&nbsp;" value="<?php echo isset($nama_ayah)?$nama_ayah:'';?>" required="required">
          
          
        </div>
<div class="col s6">
 <label for="first_name">Ibu</label>
        <input name="nama_ibu" type="text" class="input" id="first_name" placeholder="&nbsp;" value="<?php echo isset($nama_ibu)?$nama_ibu:'';?>" required="required">
         
          
        </div>
      </div>
<p>b.	Tahun Lahir</p>
<div class="row">
        <div class="col s6">
        <label>Ayah</label>
        <select name="tgl_lahir_ayah" id="nama_ayah">
   <option value="<?php echo isset($tgl_lahir_ayah)?$tgl_lahir_ayah:'';?>"><?php echo isset($tgl_lahir_ayah)?$tgl_lahir_ayah:'Pilih';?></option>
                        <?php
				   for($i=1945;$i<=2010;$i++){
				   ?>
                     <option value="<?=$i;?>"><?=$i;?></option>
                      <?php } ?>
          </select>
          
          
        </div>
<div class="col s6">
<label>Ibu</label>
       <select name="tgl_lahir_ibu" id="thn_ibu">
   <option value="<?php echo isset($tgl_lahir_ibu)?$tgl_lahir_ibu:'';?>"><?php echo isset($tgl_lahir_ibu)?$tgl_lahir_ibu:'Pilih';?></option>
                        <?php
				   for($i=1945;$i<=2010;$i++){
				   ?>
                     <option value="<?=$i;?>"><?=$i;?></option>
                      <?php } ?>
        </select>
                    
          
        </div>
      </div>
      <p>c.	Pendidikan Terakhir</p>
<div class="row">
        <div class="col s6">
         <label for="first_name">Ayah</label>
         <input name="pendidikan_ayah" type="text" class="input" id="first_name" placeholder="&nbsp;" value="<?php echo isset($pendidikan_ayah)?$pendidikan_ayah:'';?>">
         
          
        </div>
<div class="col s6">
<label for="first_name">Ibu</label>
        <input name="pendidikan_ibu" type="text" class="input" id="first_name" placeholder="&nbsp;" value="<?php echo isset($pendidikan_ibu)?$pendidikan_ibu:'';?>">
        
          
        </div>
      </div>
<p>d.	Pekerjaan</p>
<div class="row">
        <div class="col s6">
        <label for="first_name">Ayah</label>
        <input name="pekerjaan_ayah" type="text" class="input" id="first_name" placeholder="&nbsp;" value="<?php echo isset($pekerjaan_ayah)?$pekerjaan_ayah:'';?>">
          
          
        </div>
<div class="col s6">
 <label for="first_name">Ibu</label>
      <input name="pekerjaan_ibu" type="text" class="input" id="first_name" placeholder="&nbsp;" value="<?php echo isset($pekerjaan_ibu)?$pekerjaan_ibu:'';?>">
         
          
        </div>
      </div>
      <p>e.	Penghasilan Perbulan</p>
<div class="row">
        <div class="col s6">
        <label for="first_name">Ayah</label>
       <input name="penghasilan_ayah" type="text" class="input" id="first_name" placeholder="&nbsp;" value="<?php echo isset($penghasilan_ayah)?$penghasilan_ayah:'';?>">
          
          
        </div>
<div class="col s6">
 <label for="first_name">Ibu</label>
        <input name="penghasilan_ibu" type="text" class="input" id="first_name" placeholder="&nbsp;" value="<?php echo isset($penghasilan_ibu)?$penghasilan_ibu:'';?>">
         
          
        </div>
      </div>
       <p>f.	Tempat Tinggal</p>   
<div class="row">
        <div class="col s6">
        <label for="textarea1">Ayah </label>
        <textarea name="alamat_ayah" class="materialize-textarea" id="textarea1" placeholder="&nbsp;" required="required"><?php echo isset($alamat_ayah)?$alamat_ayah:'';?></textarea>
          
          
        </div>
<div class="col s6">
<label for="textarea1">Ibu</label>
       <textarea name="alamat_ibu" class="materialize-textarea" id="textarea1" placeholder="&nbsp;" required="required"><?php echo isset($alamat_ibu)?$alamat_ibu:'';?></textarea>
          
          
        </div>
      </div>

 <h6><i class="fa fa-file-archive-o fa-2x"></i> &nbsp; <b><u> C.	LAMPIRAN-LAMPIRAN</u></b></h6>
 <p>a.	Pass Photo 3x4</p>
<div class="row">
        <div class="col s6">
       <input name="picture" type="file" id="picture" />
         
          <input type="hidden" name="oldPict" id="oldPict" value="<?php echo isset($pass_photo)?$pass_photo:'';?>" />
        
          
        </div>
<div class="col s6">
     <img src="<?php echo base_url();?>assets/images/calon/<?php echo isset($nomor)?$nomor.'/':'';?><?php echo isset($pass_photo)?$pass_photo:'noimage.png';?>" name="view_gbr" width="120px" height="150px" class="view_gbr"  id="view_gbr" data-uk-modal="{target:'#modal_lightbox',modal:false}"  />
	<span>    <i class="material-icons md-24" id="delbutton" title="remove picture">close</i></span>
          
        </div>
      </div> 
 
 <p>b.	Lampiran</p>     
<div class="row">
        <div class="col s4">
        <label for="email">Upload Ijasah</label>
          <input name="ijasah" type="file" />
          
        </div>
<div class="col s4">
        <label for="email">Upload Kartu Keluarga</label>
          <input name="kk" type="file" id="kk" />
          
        </div>
<div class="col s4">
        <label for="email">Nama LengkapUpload Transkrip Nilai</label>
          <input name="nilai" type="file" id="nilai" />
          
        </div>
      </div>
<!--=============================================-->      
    
    
    <br />        
  <button type="submit" class="waves-effect waves-light btn"> <i class="fa fa-save"></i> Submit Pendaftaran</button>
      <br />
      
       
      
    </form>
      </div>

    
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