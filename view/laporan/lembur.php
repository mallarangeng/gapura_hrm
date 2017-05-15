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
<form action="" method="post">
  <div class="col-md-6">
  <label>Pilih Periode</label>
<div class="form-group">
    <div class="col-sm-4">
      <input type="text" name="tgl_awal" id="datepicker" placeholder="Tanggal Awal" class="form-control" required>
    </div>
    <div class="col-sm-4">
      <input type="text" name="tgl_akhir" id="datepicker2" placeholder="Tanggal Akhir" class="form-control" required>
    </div>
     <div class="col-sm-4">
      <input type="submit" name="submit" value="Tampilkan Data" class="btn btn-success">
    </div>
  </div>
  </div>
</form>
  <div class="col-md-4"></div>
  <div class="col-md-4" align="right"><font color="5cb85c"><h4><strong>LAPORAN LEMBUR</strong></h4></font></div>
</div>
<hr>
  <div class="table-responsive">
 <table id="example" class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>No Surat</th>
        <th>Tanggal</th>
        <th>Jam Lembur</th>
        <th>Total</th>
        <th>Nik</th>
        <th>Nama</th>
        <th>Jabatan</th>
        <th>Pemberi Tugas</th>
        <th>Status SPL</th>
   
      </tr>
    </thead>
    <tbody>
     <?php
          $arraysplembur=$splembur->tampillaplembur();
          if (count($arraysplembur)) {
          foreach($arraysplembur as $d) {
            $awal  = strtotime($d['jam_awal']);
            $akhir = strtotime($d['jam_akhir']);
            $diff  = $akhir - $awal;
            $jam   = floor($diff / (60 * 60));
            $menit = $diff - $jam * (60 * 60);  
            # untuk membuat menit  echo floor( $menit / 60 )
            #menghitung total jam
            $totaljam+=$jam;
        ?>
      <tr>
       <td><?php echo $d['id_spl']; ?></td>
       <td><?php echo dateToIndo($d['tanggal']); ?></td>
        <td><?php echo $d['jam_awal']; ?> s/d <?php echo $d['jam_akhir']; ?></td>
        <td>
          <?php
            echo $jam;
            ?> Jam
        </td>
        <td><?php echo $d['nik']; ?></td>
        <td><?php echo $d['nama']; ?></td>
        <td><?php echo $d['jabatan']; ?></td>
        <td><?php echo $d['pemberi_tugas']; ?></td>
        <td><?php echo $d['status_spl']; ?></td>

      </tr>
      <?php 
}
}
      ?>
    </tbody>
        
      <tr>
        <th></th>
        <th></th>
        <th></th>
        <th>Total <?php echo $totaljam; ?></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
      </tr>
    
  </table>
  <?php include('../../scripts/date_bootsrap_script.php'); ?>
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
        
<?php
$awal  = strtotime('10:05:25');
$akhir = strtotime('11:07:33');
$diff  = $akhir - $awal;
$jam   = floor($diff / (60 * 60));
$menit = $diff - $jam * (60 * 60);
echo 'Waktu tinggal: ' . $jam .  ' jam, ' . floor( $menit / 60 ) . ' menit';
?>