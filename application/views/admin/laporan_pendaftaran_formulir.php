<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style>
#mytable tr td{
	border:1px #CCC solid;
	height:20px;
	padding-left:4px;
}
#mytable th{
	border:1px #EFEFEF; solid;
	background:#EFEFEF;
	height:40px;
}
</style>
</head>

<body>
<h4><?php echo $judul;?></h4>
<h5><?php echo $status;?></h5>
<table width="200" border="0" style="width:100%" id="mytable">
  
  <thead>
  <tr bgcolor="#CCCCCC"  style="height:35px">
    <th>No</th>
    <th>No Daftar</th>
    <th>Nama Siswa</th>
    <th>tgl_daftar</th>
    <th>jenis_kelamin</th>
    <th>agama</th>
    <th>tempat_tinggal</th>
    <th>tgl_lahir</th>
    <th>nik</th>
    <th>status_proses</th>
    <th>Pembayaran</th>
  </tr>
  </thead>
  <?php  
  $no=0;
  foreach($list as $row){
	$no++;
  ?>
  <tr>
    <td><?php echo $no;?></td>
    <td><?php echo $row->nomor_daftar;?></td>
    <td><?php echo $row->nama_lengkap;?></td>
    <td><?php echo date('d-m-Y',strtotime($row->tgl_daftar));?></td>
    <td><?php echo $row->jenis_kelamin;?></td>
    <td><?php echo $row->agama;?></td>
    <td><?php echo $row->tempat_tinggal;?></td>
    <td><?php echo date('d-m-Y',strtotime($row->tgl_lahir));?></td>
    <td><?php echo $row->nik;?></td>
    <td><?php echo $row->status_proses;?></td>
    <td><?php echo $row->status_pembayaran;?></td>
  </tr>
 <?php } ?> 
</table>

</body>
</html>