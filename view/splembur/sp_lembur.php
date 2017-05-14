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
$splembur = new splembur();
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
    <button type="button" class="btn btn-success btn-sm add-spl" data-id="<?php echo $_SESSION['user_id'];?>">TAMBAH DATA</button>
  </div>
  <div class="col-md-4"></div>
  <div class="col-md-4" align="right"><font color="5cb85c"><h4><strong>SURAT PERINTAH LEMBUR</strong></h4></font></div>
</div>
<hr>
  <div class="table-responsive">
 <table id="example" class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>No Surat</th>
        <th>Tanggal</th>
        <th>Jam Awal</th>
        <th>Jam Akhir</th>
        <th>Tujuan</th>
        <th>Pemberi Tugas</th>
        <th>Jabatan</th>
        <th>Status SPL</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
     <?php
          $arraysplembur=$splembur->tampilSpl();
          if (count($arraysplembur)) {
          foreach($arraysplembur as $d) {
        ?>
      <tr>
       <td><?php echo $d['id_spl']; ?></td>
       <td><?php echo $d['tanggal']; ?></td>
        <td><?php echo $d['jam_awal']; ?></td>
        <td><?php echo $d['jam_akhir']; ?></td>
        <td><?php echo $d['tujuan']; ?></td>
        <td><?php echo $d['pemberi_tugas']; ?></td>
        <td><?php echo $d['jabatan']; ?></td>
        <td><?php echo $d['status_spl']; ?></td>
        <td>
          <a href="?r=splembur&pg=lembur_data&id_spl=<?php echo $d['id_spl']; ?>"><span style="margin-left: 10px; color:#b7d551" class="glyphicon glyphicon-user"         
            aria-hidden="true"></span></a>
            <a href="" class="ubah-spl" data-id="<?php echo $d['id_spl']; ?>" ><span style="margin-left: 10px; color:#87c968" class="glyphicon glyphicon-edit" aria-hidden="true" title="Edit Data"></span></a>
            <a href="view/sp/print.php?id_peringatan=<?php echo $d['id_peringatan']; ?>" target="_blank"><span style="margin-left: 10px; color:#46b87a" class="glyphicon glyphicon-print" aria-hidden="true"></span></a>
        </td>
      </tr>
      <?php 
}
}
      ?>
    </tbody>
  </table>
  </div>
  <!--    -->
   <div class="modal fade" id="modal-spl" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                        <input type="submit" name="simpanspl" value="Simpan Data" class="btn btn-success">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                    </div>
                   </form>
                </div>
            </div>
        </div>
        <!--- SIMPAN DATA TRAINING -->
          <?php
                if ($_POST['simpanspl'])
                {
                  $splembur->addSpl(
                  $_POST['id_spl'],
                  $_POST['tanggal'],
                  $_POST['jam_awal'],
                  $_POST['jam_akhir'],
                  $_POST['tujuan'],
                  $_POST['pemberi_tugas'],
                  $_POST['jabatan'],
                  $_POST['status_spl']);
                   echo"<meta http-equiv='refresh' content='0;url=?r=splembur&pg=sp_lembur'>";  
                  }
          ?>

   <div class="modal fade" id="modal-ubah-spl" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                        <input type="submit" name="updatespl" value="Update Data" class="btn btn-success">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                    </div>
                   </form>
                </div>
            </div>
        </div>
        <!--- SIMPAN DATA SPL -->
 <?php
                if ($_POST['updatespl'])
                {
                  $splembur->updateSpl(
                  $_POST['id_spl'],
                  $_POST['tanggal'],
                  $_POST['jam_awal'],
                  $_POST['jam_akhir'],
                  $_POST['tujuan'],
                  $_POST['pemberi_tugas'],
                  $_POST['jabatan'],
                  $_POST['status_spl']);
                   echo"<meta http-equiv='refresh' content='0;url=?r=splembur&pg=sp_lembur'>";  
                  }
          ?>
        <!--- END SIMPAN DATA SPL -->
        
