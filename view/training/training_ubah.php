<?php
include'../../class/class_gapura.php';
include'../../class/function.php';
$db = new Database();
$db->connectMySQL();
$user = new User();
$menu = new menu();
$karyawan = new karyawan();
$training = new training();
$dk= $training->bacaTraining($id_training);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Lampiran Form</title>
</head>
<body>
<div class="row">
                                <div class="col-md-8 col-md-offset-1">   
                                  <label>Nik & Nama</label>
                                      <!-- Text input-->
                                      <div class="form-group">
                                        <div class="col-sm-6">
                                         <input type="hidden" name="id_training" value="<?php echo $dk['id_training']; ?>">
                                          <input type="text" name="nik" value="<?php echo $dk['nik']; ?>" class="form-control" readonly>
                                        </div>

                                        <div class="col-sm-6"> 
                                        <input type="text" value="<?php echo $dk['nama']; ?>" class="form-control" readonly>
                          
                                        </div>
                                      </div>          
                              
                            <!-- Parent/Guadian Contact Section -->
                               <label>Deskripsi Training</label>
                                      <div class="form-group">
                                        <div class="col-sm-10">
                                          <textarea name="keterangan" rows="4" class="form-control"><?php echo $dk['keterangan']; ?></textarea>
                                        </div>
                                      </div>
                                      <!-- Form Name -->
                                      <label>Kategori Training</label>
                                      <div class="form-group">
                                           <div class="col-sm-4">
                                          <select name="id_kat" class="form-control" required>
                                            <option value="<?php echo $dk['id_kat']; ?>"><?php echo $dk['nm_kat']; ?></option>
                                            <?php
                                            $arraytraining=$training->tampilKategoriT();
                                            if (count($arraytraining)) {
                                            foreach($arraytraining as $d) {
                                          ?>
                                            <option value="<?php echo $d['id_kat']; ?>"><?php echo $d['nm_kat']; ?></option>
                                          <?php
                                          }
                                          } ?>
                                          </select>
                                        </div>
                                      </div>
                                 <label>Tanggal Training</label>
                                      <!-- Text input-->
                                      <div class="form-group">
                                        <div class="col-sm-6">
                                        <div class="input-group date form_date">
                                        <input class="form-control" type="text" name="tgl_awal" value="<?php echo $dk['tgl_awal']; ?>">           
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                        </div>
                                      
                                    </div>

                                            <div class="col-sm-6">
                                        <div class="input-group date form_date">
                                        <input class="form-control" size="" name="tgl_akhir" type="text" value="<?php echo $dk['tgl_akhir']; ?>">           
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                        </div>
                                   
                                    </div>
                                      </div>
                                         <label>Nilai - Hasil Training</label>
                                      <div class="form-group">
                                        <div class="col-sm-6">
                                          <input type="text" name="nilai"  value="<?php echo $dk['nilai']; ?>" class="form-control" required>
                                        </div>
                                      </div> 
                                      </div>
                            <!-- Emergency Contact Section -->
                                      <!-- Form Name -->
                                </div>
</body>
</html>
<?php include('../../scripts/date_bootsrap_script.php'); ?>