<?php
include'../../class/class_gapura.php';
include'../../class/function.php';
$db = new Database();
$db->connectMySQL();
#cegah akses tanpa melalui login
$user = new User();
$menu = new menu();
$karyawan = new karyawan();
$splembur = new splembur();
$user_id = $_SESSION['user_id'];
$splembur = new splembur();
$dk= $splembur->bacasplembur($id_spl);
if (!$user->get_sesi())
{
header("location:index.html");
}
#close akses tanpa login
if (isset($_GET['aksi']))
{
  if ($_GET['aksi'] == 'hapus')
  {
    // baca ID dari parameter ID lama pinjaman yang akan dihapus
    $id = $_GET['id'];
    // proses hapus data lama pinjaman berdasarkan ID via method
    $splembur->hapusklembur($id);  
  }
  }
?>
<body>
<div class="row">
  <div class="col-md-8">
   <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="3" align="center"> <h4><strong>SURAT PERINTAH LEMBUR<br>Nomor : <?php echo $dk['id_spl']; ?></strong></h4></td>
  </tr>
  <tr>
    <td colspan="3">Yang bertanda tangan di bawah ini :</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Nama</td>
    <td>: <?php echo $dk['pemberi_tugas']; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Jabatan</td>
    <td>: <?php echo $dk['jabatan']; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="center"><strong>MEMERINTAHKAN</strong></td>
  </tr>
  <tr>
    <td colspan="3">Kepada : 
    <button type="button" data-id="<?php echo $dk['id_spl']; ?>" class="btn btn-success btn-xs add-karyawan-spl">
  <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Tambah Karyawan
</button>

    <p></td>
  </tr>
</table>
  <div class="col-md-4"></div>
</div>
</div>
<div class="row">
  <div class="col-md-8">
  <div class="table-responsive">
 <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>Nik</th>
        <th>Nama Lengkap</th>
        <th>Jabatan</th>
        <th>Keterangan</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
     <?php
          $arraysplembur=$splembur->tampilklembur();
          if (count($arraysplembur)) {
          foreach($arraysplembur as $d) {
        ?>
      <tr>
      <td><?php echo $c=$c+1;?></td>
      <td><?php echo $d['nik']; ?></td>
      <td><?php echo $d['nama']; ?></td>
      <td><?php echo $d['nm_jabatan']; ?></td>
      <td><?php echo $d['ket']; ?></td>
        <td>
            <a href="" class="ubah-karyawan-spl" data-id="<?php echo $d['id']; ?>" ><span style="margin-left: 10px; color:#87c968" class="glyphicon glyphicon-edit" aria-hidden="true" title="Edit Data"></span></a>
            <a href="?r=splembur&pg=lembur_data&aksi=hapus&id=<?php echo $d['id'];?>&id_spl=<?php echo $_GET['id_spl'];?>" ><span style="margin-left: 10px; color:#d9534f" class="glyphicon glyphicon-trash" aria-hidden="true" title="Hapus Data"></span></a>
            </td>
            
      </tr>
      <?php 
}
}
      ?>
    </tbody>
  </table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="30" valign="top"><strong>Untuk</strong> </td>
    <td colspan="2">: <?php echo $dk['tujuan']; ?> pada tanggal <strong><?php echo $dk['tanggal']; ?> </strong>Mulai dari pukul : <strong><?php echo $dk['jam_awal']; ?> </strong> sampai dengan Pukul <strong> <?php echo $dk['jam_akhir']; ?> </strong></td>
  </tr>
  <tr>
    <td height="83" colspan="3"><p>Demikian surat  perintah lembur ini dibuat, untuk dipergunakan sebagaimana mestinya dan  dilaksanakan dengan penuh tanggung jawab. </p></td>
  </tr>
  <tr>
    <td width="8%" height="83">&nbsp;</td>
    <td width="58%">&nbsp;</td>
    <td width="34%" align="center">Tangerang, 20 Mei 2017<br>
    HRD</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center">Hendri Yulianto</td>
  </tr>
  </table>

  </div>
  <div class="col-md-4"></div>
</div>
</div>
  <!--    -->
   <div class="modal fade" id="modal-add-spl" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                        <input type="submit" name="simpandatal" value="Simpan Data" class="btn btn-success">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                    </div>
                   </form>
                </div>
            </div>
        </div>
        <!--- SIMPAN DATA TRAINING -->
          <?php
                if ($_POST['simpandatal'])
                {
                  $splembur->adddatal(
                  $_POST['id_spl'],
                  $_POST['nik'],
                  $_POST['ket']);
                   echo"<meta http-equiv='refresh' content='0;url=?r=splembur&pg=lembur_data&id_spl=$_GET[id_spl]'>";  
                  }
          ?>

   <div class="modal fade" id="modal-ubah-k-spl" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog " role="document">    
                <div class="modal-content">
                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel"></h4>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <input type="submit" name="updatesplk" value="Update Data" class="btn btn-success">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                    </div>
                   </form>
                </div>
            </div>
        </div>
        <!--- SIMPAN DATA SPL -->
  <?php
                if ($_POST['updatesplk'])
                {
                  $splembur->updateklembur(
                  $_POST['id'],
                  $_POST['id_spl'],
                  $_POST['nik'],
                  $_POST['ket']);
                   echo"<meta http-equiv='refresh' content='0;url=?r=splembur&pg=lembur_data&id_spl=$_GET[id_spl]'>";  
                  }
          ?>
        <!--- END SIMPAN DATA SPL -->
        
