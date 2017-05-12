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
$user_id = $_SESSION['user_id'];
if (!$user->get_sesi())
{
header("location:index.html");
}
#close akses tanpa login
?>
<body>

  <button type="button" class="btn btn-success btn-sm add-karyawan" data-id="<?php echo $_SESSION['user_id'];?>">TAMBAH DATA</button>
<a class="btn btn-warning btn-sm" href="view/generus/cetak.php" target="_blank">CETAK DATA KARYAWAN</a>
  <hr>
  <div class="table-responsive">
 <table id="example" class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>Nik</th>
        <th>Nama</th>
        <th>Tgl Masuk</th>
        <th>Tgl Efektif</th>
        <th>Jabatan</th>
        <th>Status Kerja</th>
        <th>Tgl Pensiun</th>
        <th>Date Input</th>
        <th>Date Update</th>
        <th>AKSI</th>
        <th>AKSI</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $arraykaryawan=$karyawan->tampilKaryawan();
      if (count($arraykaryawan)) {
      foreach($arraykaryawan as $d) {
    ?>
      <tr>
       <td><?php echo $d['nik']; ?></td>
        <td>
           <button type="button" class="btn btn-success btn-xs detail-karyawan" data-id="<?php echo $d['nik'];?>">Detail</button>
        <?php echo $d['nama']; ?></td>
        <td><?php echo $d['tgl_masuk']; ?></td>
        <td><?php echo $d['tgl_efektif']; ?></td>
        <td><?php echo $d['nm_jabatan']; ?></td>
        <td><?php echo $d['status_kerja']; ?></td>
        <td><?php echo $d['tgl_pensiun']; ?></td>
        <td><small><?php echo $d['date_input']; ?></small></td>
        <td><small><?php echo $d['date_update']; ?></small></td>
        <td>
          <div class="btn-group">
        <button type="button" class="btn btn-success btn-xs">Lampiran</button>
        <button type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="caret"></span>
          <span class="sr-only">Toggle Dropdown</span>
        </button>
        <ul class="dropdown-menu">
          <li><a href="#" class="tambah-lampiran" data-id="<?php echo $d['nik']; ?>">Tambah Lampiran</a></li>
          <li><a href="#" class="lihat-lampiran" data-id="<?php echo $d['nik']; ?>">Lihat Lampiran</a></li>
        </ul>
</div>
     <!-- Split button -->
<td>
<div class="btn-group">
        <button type="button" class="btn btn-success btn-xs">Action</button>
        <button type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="caret"></span>
          <span class="sr-only">Toggle Dropdown</span>
        </button>
        <ul class="dropdown-menu">
          <li><a href="#"></a></li>
          <li><a href="#">Dokumen Peringatan</a></li>
          <li><a href="#">Dokumen Penilayan</a></li>
          <li><a href="#">Dokumen Training</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="#">Dokumen Lembur</a></li>
        </ul>
</div>


</td>
      </tr>
      <?php 
}
}

      ?>
    </tbody>
  </table>
  </div>
   <div class="modal fade" id="modal-karyawan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                        <input type="submit" name="simpankaryawan" value="Simpan Data" class="btn btn-success">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                    </div>
                   </form>
                    
                </div>
            </div>
        </div>

  <?php
if ($_POST['simpankaryawan']){
  $tgl_lahir=$_POST['thn'].'-'.$_POST['bln'].'-'.$_POST['tgl'];
  $nik_foto=$_POST['nik'];
  $karyawan->tambahKaryawan(
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
  $_POST['tgl_keluar'],
  $_POST['id_jabatan'],
  $_POST['status_kerja'],
  $_POST['tgl_pensiun'],
  $_POST['catatan'],
  $foto=$nik_foto."_".$_FILES['foto']['name'],
  $_POST['date_input'],
  $_POST['date_update']);
   echo"<meta http-equiv='refresh' content='0;url=?r=karyawan&pg=karyawan'>";  
  }
  ?>
   <div class="modal fade" id="modal-detail-karyawan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                   </form>
                    
                </div>
            </div>
        </div>
           <div class="modal fade" id="modal-lampiran" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">    
                <div class="modal-content">
                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel"></h4>
                    </div>
                   
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Close Data</button>
                    </div>
                   </form>
                    
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-tambah-lampiran" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">    
                <div class="modal-content">
                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel"></h4>
                    </div>
                   
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <input type="submit" name="SimpanLampiran" value="Simpan Data" class="btn btn-success">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Close Data</button>
                    </div>
                   </form>
                    
                </div>
            </div>
        </div>
        <?php
        if($_POST['SimpanLampiran'])
        {
            $nik=$_POST['nik'];
            $nama_file=$_POST['nama_file'];
            $gambar=$nik."_".$_FILES['gambar']['name'];
            $datafile->tambahDatafile($nik,$nama_file,$gambar);
             echo"<meta http-equiv='refresh' content='0;url=?r=karyawan&pg=karyawan'>";  
        }
?>