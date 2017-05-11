<?php
include'../../class/class_gapura.php';
include'../../class/function.php';
$db = new Database();
$db->connectMySQL();
#cegah akses tanpa melalui login
$user = new User();
$menu = new menu();
$karyawan = new karyawan();
$datafile = new datafile();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Lampiran File Karyawan</title>
</head>
<body>
<table id="example" class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama lAMPIRAN</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
     <?php
      $arraydatafile=$datafile->tampilDatafile();
      if (count($arraydatafile)) {
      foreach($arraydatafile as $d) {
    ?>
      <tr>
       <td><?php echo $c=$c+1;?></td>
       <td><?php echo $d['nama_file']; ?></td>
    	<td><a href="file_karyawan/<?php echo $d['gambar']; ?>" target="_blank" class="btn btn-success btn-xs">Download Lampiran</a></td>
      </tr>
      <?php
  }
}

else {{
  echo '<div class="alert alert-success" role="alert">
  <span class="glyphicon glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  Lampiran Belum di upload
</div>';
}}
      ?>
    </tbody>
  </table>
</body>
</html>