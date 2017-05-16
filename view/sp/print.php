<?php
include'../../class/class_gapura.php';
include'../../class/function.php';
$db = new Database();
$db->connectMySQL();
$user = new User();
$sp = new sp();
$d= $sp->bacaSp($id_peringatan);
?>

<html>
<head>
<title>Cetak SP</title>
<style type="text/css">
  body {
    font-family: arial;
    
  }

</style>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="3"><img src="../../images/logo-header.jpg"></td>
  </tr>
  <tr>
    <td width="29%">&nbsp;</td>
    <td width="36%">&nbsp;</td>
    <td width="35%">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="center"><strong><u>SURAT PERINGATAN KE : <?php echo $d['ke']; ?></u></strong><br><?php echo $d['id_peringatan']; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">Surat peringatan ini diberikan kepada : </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Nama</td>
    <td>: <strong><?php echo $d['nama']; ?></strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Nik</td>
    <td>: <?php echo $d['nik']; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="24">Jabatan</td>
    <td>: <?php echo $d['nm_jabatan']; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="19" colspan="3" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td height="18" colspan="3" valign="top" align="justify"><?php echo $d['keterangan']; ?></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="justify">Demikian surat peringatan ini diberikan agar dapat dijadikan sebagai bahan perhatian dan koreksi diri.</td>
  </tr>
  <tr>
    <td height="81">&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center">Tangerang, <?php echo dateToIndo($d['tanggal']); ?></td>
  </tr>
  <tr>
    <td height="119">&nbsp;<button onclick="myFunction()">Print</button></td>
    <td>&nbsp;</td>
    <td align="center"><strong>Achmad Bustomi</strong><br>
    Hrd</td>
  </tr>
</table>
<script>
function myFunction() {
    window.print();
}
</script>

</body>
</html>
