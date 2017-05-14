<?php
include'../../class/class_gapura.php';
include'../../class/function.php';
$db = new Database();
$db->connectMySQL();
$user = new User();
$splembur = new splembur();
$dk= $splembur->bacasplembur($id_spl);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Lampiran Form</title>
</head>
<div class="row">
                                <div class="col-md-8 col-md-offset-1">   
                                  <label>Nomor Surat Perintah Lembur</label>
                                      <!-- Text input-->
                                      <div class="form-group">
                                        <div class="col-sm-6">
                                         <input type="text" name="id_spl" class="form-control" value="<?php echo $dk['id_spl']; ?>" readonly>
                                        </div>
                                      </div>          
                              
                            <!-- Parent/Guadian Contact Section -->
                               <label>Tanggal</label>
                                      <div class="form-group">
                                              <div class="col-sm-6">
                                        <div class="input-group date form_date" data-link-field="dtp_input1" data-link-format="yyyy-mm-dd">
                                        <input class="form-control" id="dtp_input1" name="tanggal" type="text" value="<?php echo $dk['tanggal']; ?>">           
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                        </div>
                                      
                                    </div>
                                      </div>
                                      <!-- Form Name -->
                                      <label>Jam Mulai</label>
                                      <div class="form-group">
                                           <div class="col-sm-4">
                                          <div class="input-group date form_time" data-date="" data-date-format="hh:ii" data-link-field="dtp_input3" data-link-format="hh:ii">
                                              <input name="jam_awal" id="dtp_input3" value="<?php echo $dk['jam_awal']; ?>" class="form-control" type="text">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                          </div>
                                      </div>
                                      </div>
                                  <label>Jam Selesai</label>
                                      <div class="form-group">
                                           <div class="col-sm-4">
                                          <div class="input-group date form_time" data-date="" data-date-format="hh:ii" data-link-field="dtp_input3" data-link-format="hh:ii">
                                              <input  id="dtp_input3" name="jam_akhir" value="<?php echo $dk['jam_akhir']; ?>" class="form-control" type="text">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                          </div>
                                      </div>
                                      </div>
                                         <label>Tujuan Untuk</label>
                                      <div class="form-group">
                                        <div class="col-sm-10">
                                          <textarea name="tujuan" rows="4" class="form-control" id="text-ckeditor"><?php echo $dk['tujuan']; ?>
                                          </textarea>
                                        </div>
                                      </div>
                                         <label>Pemberi Tugas - Jabatan - Status</label>
                                      <!-- Text input-->
                                      <div class="form-group">
                                        <div class="col-sm-4">
                                         <input type="text" name="pemberi_tugas" placeholder="Pemberi Tugas" class="form-control" value="<?php echo $dk['pemberi_tugas']; ?>" >
                                        </div>
                                       <div class="form-group">
                                        <div class="col-sm-4">
                                         <input type="text" name="jabatan" value="<?php echo $dk['jabatan']; ?>" placeholder="Jabatan" class="form-control" >
                                      </div>  
                                       <div class="form-group">
                                        <div class="col-sm-4">
                                        <input type="text" name="status_spl" value="<?php echo $dk['status_spl']; ?>" placeholder="Status" class="form-control" >
                                      </div>  
                                      </div>
                                      </div>
                                      </div>
                                      </div>
                            <!-- Emergency Contact Section -->
                                      <!-- Form Name -->  
</body>
</html>
<?php include('../../scripts/date_bootsrap_script.php'); ?>