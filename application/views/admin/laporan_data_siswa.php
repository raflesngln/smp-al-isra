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
<h5><?php echo $kelas;?></h5>
<table width="200" border="0" style="width:100%" id="mytable">
  
  <thead>
  <tr bgcolor="#CCCCCC"  style="height:35px">
    <th>No</th>
    <th>NIS</th>
    <th>Nama Lengkap</th>
    <th>jenis_kelamin</th>
    <th>agama</th>
    <th>tempat_tinggal</th>
    <th>tgl_lahir</th>
    </tr>
  </thead>
  <?php  
  $no=0;
  foreach($list as $row){
	$no++;
  ?>
  <tr>
    <td><?php echo $no;?></td>
    <td><?php echo $row->NIS;?></td>
    <td><?php echo $row->nama_lengkap;?></td>
    <td><?php echo $row->jenis_kelamin;?></td>
    <td><?php echo $row->agama;?></td>
    <td><?php echo $row->tempat_tinggal;?></td>
    <td><?php echo date('d-m-Y',strtotime($row->tgl_lahir));?></td>
  </tr>
 <?php } ?> 
</table>

</body>
</html>