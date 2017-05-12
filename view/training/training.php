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
        <th>Kode Training</th>
        <th>Nik</th>
        <th>Nama</th>
        <th>Jenis Training</th>
        <th>Tgl Awal</th>
        <th>Tgl Akhir</th>
        <th>Nilai</th>
        <th>AKSI</th>
      </tr>
    </thead>
    <tbody>
     <?php
          $arraytraining=$training->tampilTraining();
          if (count($arraytraining)) {
          foreach($arraytraining as $d) {
        ?>
      <tr>
       <td><?php echo $d['id_training']; ?></td>
       <td><?php echo $d['nik']; ?></td>
        <td><?php echo $d['nama']; ?></td>
        <td><?php echo $d['keterangan']; ?></td>
        <td><?php echo $d['tgl_awal']; ?></td>
        <td><?php echo $d['tgl_akhir']; ?></td>
        <td><?php echo $d['nilai']; ?></td>
        <td><a href="" class="btn btn-warning btn-xs ubah-training" data-id="<?php echo $d['id_training']; ?>">Edit</a></td>
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
                   echo"<meta http-equiv='refresh' content='0;url=?r=karyawan&pg=karyawan_dokumen'>";  
                  }
          ?>

   <div class="modal fade" id="modal-ubah-training" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                        <input type="submit" name="updatetraining" value="Update Data" class="btn btn-success">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                    </div>
                   </form>
                </div>
            </div>
        </div>
        <!--- SIMPAN DATA TRAINING -->
          <?php
                if ($_POST['updatetraining'])
                {
                  $training->updateTraining(
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
        <!--- END SIMPAN DATA TRAINING -->
        
