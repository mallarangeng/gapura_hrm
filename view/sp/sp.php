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
$sp = new sp();
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
  <div class="col-md-4" align="right"><font color="5cb85c"><h4><strong>DOKUMEN KARYAWAN</strong></h4></font></div>
</div>
  <div class="table-responsive">
 <table id="example" class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>No Sp</th>
        <th>Tanggal Surat</th>
        <th>Nik</th>
        <th>Nama</th>
        <th>Jabatan</th>
        <th>Status Kerja</th>
        <th>Tgl Masuk</th>
        <th>SP Ke</th>
        <th>AKSI</th>
      </tr>
    </thead>
    <tbody>
     <?php
          $arraysp=$sp->tampilSp();
          if (count($arraysp)) {
          foreach($arraysp as $d) {
        ?>
      <tr>
       <td><?php echo $d['id_peringatan']; ?></td>
       <td><?php echo dateToIndo($d['tanggal']); ?></td>
       <td><?php echo $d['nik']; ?></td>
        <td>
        <button type="button" class="btn btn-success btn-xs detail-karyawan" data-id="<?php echo $d['nik'];?>">Detail</button>
        <?php echo $d['nama']; ?></td>
        <td><?php echo $d['nm_jabatan']; ?></td>
        <td><?php echo $d['stat_kerja']; ?></td>
        <td><?php echo dateToIndo($d['tgl_masuk']); ?></td>
        <td><?php echo $d['ke']; ?></td>
        <td><a href="" class="edit-sp" data-id="<?php echo $d['id_peringatan']; ?>"><span style="margin-left: 10px; color:#a3ce5a" class="glyphicon glyphicon-edit"         
            aria-hidden="true"></span></a>
            <a href="view/sp/print.php?id_peringatan=<?php echo $d['id_peringatan']; ?>" target="_blank"><span style="margin-left: 10px; color:#4ab978" class="glyphicon glyphicon-print" aria-hidden="true"></span></a>
        </td>
      </tr>
      <?php 
}
}
      ?>
    </tbody>
  </table>
  </div>
        

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
<div class="modal fade" id="modal-edit-sp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                        <input type="submit" name="updatesp" value="Simpan Data" class="btn btn-success">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                    </div>
                   </form>
                </div>
            </div>
        </div>
        <!--- SIMPAN DATA TRAINING -->
          <?php
                if ($_POST['updatesp'])
                {
                  $sp->updateSp(
                  $_POST['id_peringatan'],
                  $_POST['nik'],
                  $_POST['tanggal'],
                  $_POST['ke'],
                  $_POST['keterangan']);
                   echo"<meta http-equiv='refresh' content='0;url=?r=sp&pg=sp'>";  
                  }
                ?>
