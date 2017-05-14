<?php
include'../../class/class_gapura.php';
include'../../class/function.php';
$db = new Database();
$db->connectMySQL();
$user = new User();
$splembur = new splembur();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Lampiran Form</title>
</head>
<body>
<div class="row">
                                <div class="col-md-8 col-md-offset-1">   
                                  <label>Nomor Surat Perintah Lembur</label>
                                      <!-- Text input-->
                                      <div class="form-group">
                                        <div class="col-sm-6">
                                         <input type="text" name="id_spl" class="form-control" value="<?php echo kdauto("sp_lembur","SPL"); ?>" readonly>
                                        </div>
                                      </div>          
                              
                            <!-- Parent/Guadian Contact Section -->
                               <label>Tanggal</label>
                                      <div class="form-group">
                                              <div class="col-sm-6">
                                        <div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input1" data-link-format="yyyy-mm-dd">
                                        <input class="form-control" id="dtp_input1" name="tanggal" type="text" value="<?php echo date('Y-m-d'); ?>" readonly>           
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                        </div>
                                      
                                    </div>
                                      </div>
                                      <!-- Form Name -->
                                      <label>Jam Mulai</label>
                                      <div class="form-group">
                                           <div class="col-sm-4">
                                          <div class="input-group date form_time" data-date="" data-date-format="hh:ii" data-link-field="dtp_input3" data-link-format="hh:ii">
                                              <input name="jam_awal" class="form-control" type="text">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                          </div>
                                      </div>
                                      </div>
                                  <label>Jam Selesai</label>
                                      <div class="form-group">
                                           <div class="col-sm-4">
                                          <div class="input-group date form_time" data-date="" data-date-format="hh:ii" data-link-field="dtp_input3" data-link-format="hh:ii">
                                              <input name="jam_akhir" class="form-control" type="text">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                          </div>
                                      </div>
                                      </div>
                                         <label>Tujuan Untuk</label>
                                      <div class="form-group">
                                        <div class="col-sm-10">
                                          <textarea name="tujuan" rows="4" class="form-control" id="text-ckeditor"></textarea>
                                        </div>
                                      </div>
                                         <label>Pemberi Tugas - Jabatan - Status</label>
                                      <!-- Text input-->
                                      <div class="form-group">
                                        <div class="col-sm-4">
                                         <input type="text" name="pemberi_tugas" placeholder="Pemberi Tugas" class="form-control" >
                                        </div>
                                       <div class="form-group">
                                        <div class="col-sm-4">
                                         <input type="text" name="jabatan" placeholder="Jabatan" class="form-control" >
                                      </div>  
                                       <div class="form-group">
                                        <div class="col-sm-4">
                                        <input type="text" name="status_spl" placeholder="Status" class="form-control" >
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