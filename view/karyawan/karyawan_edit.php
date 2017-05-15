<?php
include'../../class/class_gapura.php';
include'../../class/function.php';
$db = new Database();
$db->connectMySQL();
#cegah akses tanpa melalui login
$karyawan = new karyawan();
$d= $karyawan->bacaKaryawan($nik);
?>

  <button type="button" class="btn btn-success ubah-generus btn-sm edit-karyawan" data-id="<?php echo $d['nik']; ?>">
<span class="glyphicon glyphicon-edit"></span>  UBAH DATA</button>
    <a  class="btn btn-warning btn-sm " href="?r=karyawan&pg=karyawan"><span class="glyphicon glyphicon-arrow-left"></span>   KEMBALI</a></td>
    <hr>
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
         <tr>
        <td>Jabatan</td>
        <td>: <?php echo $d['nm_jabatan']; ?> /  Status Kerja : <?php echo $d['stat_kerja']; ?></td>
      </tr>
         <tr class="success">
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

<div class="modal fade" id="modal-edit-karyawan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">    
                <div class="modal-content">
                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel"></h4>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <input type="submit" name="simpankaryawan" value="Update Data" class="btn btn-success">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                    </div>
                   </form>
                    
                </div>
            </div>
        </div>

  <?php
if ($_POST['simpankaryawan']){
  $tgl_lahir=$_POST['thn'].'-'.$_POST['bln'].'-'.$_POST['tgl'];
  $karyawan->updateKaryawan(
  $_POST['nik'],
  $_POST['user_id'],
  $_POST['nama'],
  $_POST['tempat_lahir'],
  $tgl_lahir,
  $_POST['jekel'],
  $_POST['alamat'],
  $_POST['agama'],
  $_POST['no_hp'],
  $_POST['tgl_masuk'],
  $_POST['tgl_efektif'],
  $_POST['stat_kerja'],
  $_POST['id_jabatan'],
  $_POST['tgl_pensiun'],
  $_POST['stat_karyawan'],
  $_POST['tgl_nonaktif'],
  $_POST['catatan'],
  #$_POST['foto'],
  $_POST['date_input'],
  $_POST['date_update']);
   echo"<meta http-equiv='refresh' content='0;url=?r=karyawan&pg=karyawan_edit&nik=$_GET[nik]'>";  
  }
  ?>