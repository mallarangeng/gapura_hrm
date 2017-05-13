<?php
include'../../class/class_gapura.php';
include'../../class/function.php';
$db = new Database();
$db->connectMySQL();
$user = new User();
$jabatan = new jabatan();
$d= $jabatan->bacajabatan($id_jabatan);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Lampiran Form</title>
</head>
<body>
<div class="row">
                                <div class="col-md-8 col-md-offset-1">   
                                  <label>Nama Jabatan & Keterangan Jabatan</label>
                                      <!-- Text input-->
                                      <div class="form-group">
                                        <div class="col-sm-6">
                                        <input type="hidden" name="id_jabatan" value="<?php echo $d['id_jabatan']; ?>" >
                                          <input type="text" name="nm_jabatan" value="<?php echo $d['nm_jabatan']; ?>" placeholder="Nama Jabatan" class="form-control">
                                        </div>

                                        <div class="col-sm-6"> 
                                        <input type="text" name="ket" value="<?php echo $d['ket']; ?>" placeholder="Keterangan Jabatan" class="form-control">
                          
                                        </div>
                                      </div> 
</body>
</html>