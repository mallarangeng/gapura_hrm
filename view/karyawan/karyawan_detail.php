<?php
include'../../class/class_gapura.php';
include'../../class/function.php';
$db = new Database();
$db->connectMySQL();
#cegah akses tanpa melalui login
$karyawan = new karyawan();
$d= $karyawan->bacaKaryawan($nik);
?>
<div class="row">
  <div class="col-md-8">
<table class="table">
    <thead>
      <tr>
        <th>BIODATA</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr class="success">
        <td>Nik</td>
        <td>: <?php echo $d['nik']; ?></td>
      </tr>
      <tr>
        <td>Nama</td>
        <td>: <strong><?php echo $d['nama']; ?></strong></td>
      <tr class="success">
        <td>Tempat, Tgl Lahir</td>
        <td>: <?php echo $d['tempat_lahir']; ?>, <?php echo dateToindo($d['tgl_lahir']) ; ?>, Usia : <?php echo umur($d['tgl_lahir']); ?> Tahun</td>
      </tr>
         <tr>
        <td>Jenis Kelamin</td>
        <td>: <?php echo $d['jekel']; ?></td>
      </tr>
       <tr class="success">
        <td>Alamat</td>
        <td>: <?php echo $d['alamat']; ?></td>
      </tr>
         <tr>
        <td>Agama</td>
        <td>: <?php echo $d['agama']; ?></td>
      </tr>
       <tr class="success">
        <td>Nomor HP</td>
        <td>: <?php echo $d['no_hp']; ?></td>
      </tr>
         <tr>
        <td>Tanggal Masuk</td>
        <td>: <?php echo dateToindo($d['tgl_masuk']); ?> Efektif : <?php echo dateToindo($d['tgl_efektif']); ?></td>
      </tr>
         <tr class="success">
        <td >Jabatan</td>
        <td>: <?php echo $d['nm_jabatan']; ?> /  Status Kerja : <?php echo $d['stat_kerja']; ?></td>
      </tr>
         <tr >
        <td >Tanggal Pensiun</td>
        <td>: <?php echo dateToindo($d['tgl_pensiun']); ?></td>
      </tr>
        <tr class="success">
        <td >Status Aktif</td>
        <td>: <button type="button" class="btn btn-success btn-xs"><?php echo $d['stat_karyawan']; ?></button> Non Aktif : <?php echo dateToindo($d['tgl_nonaktif']); ?> </td>
      </tr>
       <tr >
        <td>Catatan</td>
        <td>: <?php echo $d['catatan']; ?></td>
      </tr>
        <tr class="success">
        <td>Date Input </td>
        <td>: <small><?php echo $d['date_input']; ?></small> Last Update : <small><?php echo $d['date_update']; ?></small></td>
      </tr>

    </tbody>
  </table>
  
  </div>
  <div class="col-md-4">
  <p>
  <br>
  <p>
  	<img src="file_foto/<?php echo $d['foto']; ?>" class="img-responsive" alt="Cinque Terre">


  </div>
</div>