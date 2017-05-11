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
$training = new training();
$sp = new sp();
$user_id = $_SESSION['user_id'];
if (!$user->get_sesi())
{
header("location:index.html");
}
#close akses tanpa login
?>
<body>
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
        <button type="button" class="btn btn-success btn-xs">Action</button>
        <button type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="caret"></span>
          <span class="sr-only">Toggle Dropdown</span>
        </button>
        <ul class="dropdown-menu">
          <li><a href="#"></a></li>
          <li><a href="#" class="form-training" data-id="<?php echo $d['nik']; ?>">Dokumen Training</a></li>
          <li><a href="#" class="form-sp" data-id="<?php echo $d['nik']; ?>">Dokumen Peringatan</a></li>
          <li><a href="#">Dokumen Penilayan</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="#">Dokumen Lembur</a></li>
        </ul>
</div>
  </td>
      <td></td>
      </tr>
      <?php 
}
}

      ?>
    </tbody>
  </table>
  </div>


  <!--    -->
   <div class="modal fade" id="modal-training" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                        <input type="submit" name="simpantraining" value="Simpan Data" class="btn btn-success">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                    </div>
                   </form>
                    
                </div>
            </div>
        </div>
        <!--- SIMPAN DATA TRAINING -->
          <?php
                if ($_POST['simpantraining'])
                {
                  $training->addTraining(
                  $_POST['id_training'],
                  $_POST['id_kat'],
                  $_POST['nik'],
                  $_POST['keterangan'],
                  $_POST['tgl_awal'],
                  $_POST['tgl_akhir'],
                  $_POST['nilai']);
                   echo"<meta http-equiv='refresh' content='0;url=?r=training&pg=training'>";  
                  }
          ?>


        <!--- END SIMPAN DATA DOKUMEN SP -->
          <div class="modal fade" id="modal-sp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                        <input type="submit" name="simpansp" value="Simpan Data" class="btn btn-success">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                    </div>
                   </form>
                </div>
            </div>
        </div>
        <!--- SIMPAN DATA TRAINING -->
          <?php
                if ($_POST['simpansp'])
                {
                  $sp->addSp(
                  $_POST['id_peringatan'],
                  $_POST['nik'],
                  $_POST['tanggal'],
                  $_POST['ke'],
                  $_POST['keterangan']);
                   echo"<meta http-equiv='refresh' content='0;url=?r=karyawan&pg=karyawan_dokumen'>";  
                  }
                ?>


        <!--- END SIMPAN DATA TRAINING -->
       
  <!-- Modal -->

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
