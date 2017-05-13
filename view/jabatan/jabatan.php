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
$jabatan = new jabatan();
$user_id = $_SESSION['user_id'];
if (!$user->get_sesi())
{
header("location:index.html");
}
#close akses tanpa login
?>
<body>
<div class="row">
  <div class="col-xs-12 col-md-8">
    
      <div class="row">
        <div class="col-md-4">
        <button type="button" class="btn btn-success btn-sm add-jabatan">TAMBAH DATA</button>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4" align="right"><font color="5cb85c"><h4><strong>MASTER JABATAN</strong></h4></font></div>
      </div>
<hr>
<div class="table-responsive">
 <table id="example" class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>Kode Jabatan</th>
        <th>Nama Jabatan</th>
        <th>Keterangan</th>
        <th>AKSI</th>
      </tr>
    </thead>
    <tbody>
     <?php
          $arrayjabatan=$jabatan->tampilJabatan();
          if (count($arrayjabatan)) {
          foreach($arrayjabatan as $d) {
        ?>
      <tr>
        <td></td>
        <td><?php echo $d['nm_jabatan']; ?></td>
        <td><?php echo $d['ket']; ?></td>
        <td></td>
        <td><a href="" class="ubah-jabatan" data-id="<?php echo $d['id_jabatan']; ?>"><span style="margin-left: 10px; color:#a3ce5a" class="glyphicon glyphicon-edit"         
            aria-hidden="true"></span></a></td>
      </tr>
      <?php 
}
}
      ?>
    </tbody>
  </table>
  </div>
  </div>
  <div class="col-xs-6 col-md-4"></div>
</div>
  


  <!--    -->
   <div class="modal fade" id="modal-jabatan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                        <input type="submit" name="simpanjabatan" value="Simpan Data" class="btn btn-success">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                    </div>
                   </form>
                    
                </div>
            </div>
        </div>
        <!--- SIMPAN DATA TRAINING -->
          <?php
                if ($_POST['simpanjabatan'])
                {
                  $jabatan->tambahJabatan(
                  $_POST['nm_jabatan'],
                  $_POST['ket']);
                   echo"<meta http-equiv='refresh' content='0;url=?r=jabatan&pg=jabatan'>";  
                  }
          ?>

   <div class="modal fade" id="modal-ubah-jabatan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                        <input type="submit" name="updatejabatan" value="Update Data" class="btn btn-success">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                    </div>
                   </form>
                </div>
            </div>
        </div>
        <!--- SIMPAN DATA TRAINING -->
         <?php
                if ($_POST['updatejabatan'])
                {
                  $jabatan->updatejabatan(
                  $_POST['id_jabatan'],
                  $_POST['nm_jabatan'],
                  $_POST['ket']);
                    echo"<meta http-equiv='refresh' content='0;url=?r=jabatan&pg=jabatan'>";
                  }
          ?>
        <!--- END SIMPAN DATA TRAINING -->
        
