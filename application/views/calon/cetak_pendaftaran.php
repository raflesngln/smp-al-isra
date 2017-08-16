
<style>

#mytable tr td{
	border:1px #FFF solid;
	height:27px;
	width:45%;
	padding-left:4px;
}

.input{
	border:1px #FFF solid;
	padding:24px !important;
	height:35px;
}
</style>

<body>
<h1 align="center">Formulir Daftar</h1>
  <?php  
  $no=0;
  foreach($list as $row){
	$no++;
  ?>
<table width="800" border="1" id="mytable">
  <tr>
    <td colspan="2"><p>&nbsp;</p>
      <p><strong>A.	KETERANGAN CALON PESERTA DIDIK</strong></p>
    <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td>Nomor Daftar</td>
    <td width="324">Status Pendaftaran</td>
  </tr>
  <tr>
    <td><label for="textfield"></label>
    <input type="text" name="textfield" id="textfield" value="<?php echo $row->nomor_daftar;?>" class="input" ></td>
    <td><input type="text" name="textfield2" id="textfield2" value="<?php echo $row->status_proses;?>" class="input" ></td>
  </tr>
  <tr>
    <td colspan="2">Nama Lengkap</td>
  </tr>
  <tr>
    <td colspan="2"><input type="text" name="textfield3" id="textfield3" value="<?php echo $row->nama_lengkap;?>" class="input" ></td>
  </tr>
  <tr>
    <td>Jenis Kelamin</td>
    <td>Golongan Darah</td>
  </tr>
  <tr>
    <td><input type="text" name="textfield4" id="textfield4" value="<?php echo $row->jenis_kelamin;?>" class="input" ></td>
    <td><input type="text" name="textfield7" id="textfield7" value="<?php echo $row->golongan_darah;?>" class="input" ></td>
  </tr>
  <tr>
    <td>Berat Badan</td>
    <td>Tinggi badan</td>
  </tr>
  <tr>
    <td><input type="text" name="textfield9" id="textfield9" value="<?php echo $row->berat;?>" class="input" ></td>
    <td><input type="text" name="textfield8" id="textfield8" value="<?php echo $row->tinggi;?>" class="input" ></td>
  </tr>
  <tr>
    <td>NIK</td>
    <td>Agama</td>
  </tr>
  <tr>
    <td><input type="text" name="textfield5" id="textfield5" value="<?php echo $row->nik;?>" class="input" ></td>
    <td><input type="text" name="textfield6" id="textfield6" value="<?php echo $row->agama;?>" class="input" ></td>
  </tr>
  <tr>
    <td>Temat Lahir</td>
    <td>tgl Lahir</td>
  </tr>
  <tr>
    <td><input type="text" name="textfield10" id="textfield10" value="<?php echo $row->tempat_lahir;?>" class="input" ></td>
    <td><input type="text" name="textfield12" id="textfield12" value="<?php echo date('d-m-Y',strtotime($row->tgl_lahir));?>" class="input" ></td>
  </tr>
  <tr>
    <td>Anak Ke -</td>
    <td>Jumlah bersaudara</td>
  </tr>
  <tr>
    <td><input type="text" name="textfield14" id="textfield14" value="<?php echo $row->anak_ke;?>" class="input" ></td>
    <td><input type="text" name="textfield15" id="textfield15" value="<?php echo $row->jumlah_bersaudara;?>" class="input" ></td>
  </tr>
  <tr>
    <td>Alamat Tempat Tinggal</td>
    <td>Nama Asal Sekolah</td>
  </tr>
  <tr>
    <td height="49"><input type="text" name="textfield17" id="textfield17" value="<?php echo $row->tempat_tinggal;?>" class="input" ></td>
    <td><input type="text" name="textfield18" id="textfield18" value="<?php echo $row->asal_sekolah;?>" class="input" ></td>
  </tr>
  <tr>
    <td height="36" colspan="2"><p>&nbsp;</p>
      <p><strong>B.	KETERANGAN ORANG TUA</strong></p>
    <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td colspan="2">a.	Nama</td>
  </tr>
  <tr>
    <td>Ayah</td>
    <td>Ibu</td>
  </tr>
  <tr>
    <td><input type="text" name="textfield16" id="textfield16" value="<?php echo $row->nik;?>" class="input" ></td>
    <td><input type="text" name="textfield19" id="textfield19" value="<?php echo $row->nik;?>" class="input" ></td>
  </tr>
  <tr>
    <td colspan="2">b.	Tahun Lahir</td>
  </tr>
  <tr>
    <td>Ayah</td>
    <td>Ibu</td>
  </tr>
  <tr>
    <td><input type="text" name="textfield16" id="textfield16" value="<?php echo $row->nik;?>" class="input" ></td>
    <td><input type="text" name="textfield19" id="textfield19" value="<?php echo $row->nik;?>" class="input" ></td>
  </tr>
  <tr>
    <td colspan="2">c.	Pendidikan Terakhir</td>
  </tr>
  <tr>
    <td>Ayah</td>
    <td>Ibu</td>
  </tr>
  <tr>
    <td><input type="text" name="textfield16" id="textfield16" value="<?php echo $row->nik;?>" class="input" ></td>
    <td><input type="text" name="textfield19" id="textfield19" value="<?php echo $row->nik;?>" class="input" ></td>
  </tr>
  <tr>
    <td colspan="2">d.	Pekerjaan</td>
  </tr>
  <tr>
    <td>Ayah</td>
    <td>Ibu</td>
  </tr>
  <tr>
    <td><input type="text" name="textfield16" id="textfield16" value="<?php echo $row->nik;?>" class="input" ></td>
    <td><input type="text" name="textfield19" id="textfield19" value="<?php echo $row->nik;?>" class="input" ></td>
  </tr>
  <tr>
    <td colspan="2">e.	Penghasilan Perbulan</td>
  </tr>
  <tr>
    <td>Ayah</td>
    <td>Ibu</td>
  </tr>
  <tr>
    <td><input type="text" name="textfield16" id="textfield16" value="<?php echo $row->nik;?>" class="input" ></td>
    <td><input type="text" name="textfield19" id="textfield19" value="<?php echo $row->nik;?>" class="input" ></td>
  </tr>
  <tr>
    <td colspan="2">f.	Tempat Tinggal</td>
  </tr>
  <tr>
    <td>Ayah</td>
    <td>Ibu</td>
  </tr>
  <tr>
    <td><input type="text" name="textfield16" id="textfield16" value="<?php echo $row->nik;?>" class="input" ></td>
    <td><input type="text" name="textfield19" id="textfield19" value="<?php echo $row->nik;?>" class="input" ></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center">
      <p>Panitia Penerima Siswa Baru</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p align="center">(..................................................................)</p>
      <p align="center">&nbsp;</p>
    </div></td>
    <td><div align="center">
      <p>Wali Murid</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p align="center">(..................................................................)</p>
      <p align="center">&nbsp;</p>
    </div></td>
  </tr>
</table>
<?php } ?>
</body>