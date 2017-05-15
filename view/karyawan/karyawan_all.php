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
<div class="row">
  <div class="col-md-4">
  </div>
  <div class="col-md-4"></div>
  <div class="col-md-4" align="right"><font color="5cb85c"><h4><strong>DATA KARYAWAN</strong></h4></font></div>
</div>
  
  <hr>
  <div class="table-responsive">
 <table id="example" class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>Nik</th>
        <th>Nama</th>
        <th>Tgl Efektif</th>
        <th>Jabatan</th>
        <th>Status Kerja</th>
        <th>Aktif</th>
        <th>Tgl Pensiun</th>
        <th>Date Input</th>
        <th>Date Update</th>
        <th>Lampiran</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $arraykaryawan=$karyawan->tampilKaryawan();
      if (count($arraykaryawan)) {
      foreach($arraykaryawan as $d) {
        if($d['stat_karyawan']=='Aktif'){
                  $aa='success';
                  }
                  else if($d['stat_karyawan']=='Pensiun'){  
                  $aa='info';
                } else {
                  $aa='danger';
                }

                
    ?>
      <tr>
       <td><?php echo $d['nik']; ?></td>
        <td>
           <button type="button" class="btn btn-success btn-xs detail-karyawan" data-id="<?php echo $d['nik'];?>">Detail</button>
        <?php echo $d['nama']; ?></td>
        <td><?php echo dateToindo($d['tgl_efektif']); ?></td>
        <td><?php echo $d['nm_jabatan']; ?></td>
        <td><?php echo $d['stat_kerja']; ?></td>
        <td>
        <button type="button" class="btn btn-<?php echo $aa; ?> btn-xs"><?php echo $d['stat_karyawan']; ?></button>
        </td>
        <td><?php echo dateToindo($d['tgl_pensiun']); ?></td>
        <td><small><?php echo $d['date_input']; ?></small></td>
        <td><small><?php echo $d['date_update']; ?></small></td>
        <td>
          <div class="btn-group">
        <button type="button" class="btn btn-success btn-xs lihat-lampiran" data-id="<?php echo $d['nik']; ?>">Lampiran</button>
        <button type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="caret"></span>
          <span class="sr-only">Toggle Dropdown</span>
        </button>
</div>
     <!-- Split button -->
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
  $_POST['stat_kerja'],
  $_POST['id_jabatan'],
  $_POST['tgl_pensiun'],
  $_POST['stat_karyawan'],
  $_POST['tgl_nonaktif'],
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