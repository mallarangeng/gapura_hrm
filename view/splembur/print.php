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
$splembur = new splembur();
$dk= $splembur->bacasplembur($id_spl);
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
<title>Print Surat Perintah Lembur</title>
<body>
<link href="../../bootstrap/css/bootstrap.css" rel="stylesheet">
<div class="container-fluid">

<div class="row">
  <div class="col-md-8">
  
   <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="3"><img src="../../images/logo-header.jpg"></td>
  </tr>
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

    <p></td>
  </tr>
</table>
  <div class="col-md-4"></div>
</div>
</div>
<div class="row">
  <div class="col-md-8">
  <div class="table-responsive">
 <table class="table table-striped table-bordered" border="" cellspacing="0" cellpadding="0">
    <thead>
      <tr>
        <th>No</th>
        <th>Nik</th>
        <th>Nama Lengkap</th>
        <th>Jabatan</th>
        <th>Keterangan</th>
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
    <td width="34%" align="center">Tangerang, <?php echo dateToindo($dk['tanggal']); ?><br>
    HRD</td>
  </tr>
  <tr>
    <td><button onClick="myFunction()">Print</button></td>
    <td>&nbsp;</td>
    <td align="center"><strong><?php echo $dk['pemberi_tugas']; ?></strong></td>
  </tr>
  </table>

  </div>
  <div class="col-md-4"></div>
</div>
</div>
</div>
       
       <script>
function myFunction() {
    window.print();
}
</script> <!--- SIMPAN DATA TRAINING -->



        <!--- SIMPAN DATA SPL -->

        <!--- END SIMPAN DATA SPL -->
        
