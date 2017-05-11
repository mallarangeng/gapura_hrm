<?php
include'../../class/class_gapura.php';
include'../../class/function.php';
$db = new Database();
$db->connectMySQL();
$user = new User();
$sp = new sp();
$d= $sp->bacaSp($id_peringatan);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Lampiran Form</title>
</head>
<body>
<div class="row">
                                <div class="col-md-8 col-md-offset-1">  
                                   <label>Nomor Surat Peringatan</label>
                                      <div class="form-group">
                                        <div class="col-sm-6">
                                          <input type="text" class="form-control" name="id_peringatan" value="<?php echo $d['id_peringatan']; ?>" readonly>
                                        </div>
                                      </div>  
                                  <label>Nik & Nama</label>
                                      <!-- Text input-->
                                      <div class="form-group">
                                        <div class="col-sm-6">
                                         
                                          <input type="text" name="nik" value="<?php echo $d['nik']; ?>" class="form-control" readonly>
                                        </div>

                                        <div class="col-sm-6"> 
                                        <input type="text" value="<?php echo $d['nama']; ?>" class="form-control" readonly>
                                        </div>
                                      </div>   
                                      <label>Tanggal Surat Peringatan</label>
                                      <div class="form-group">
                                        <div class="col-sm-6">
                                          <input type="text" name="tanggal" value="<?php echo $d['tanggal']; ?>" class="form-control" required>
                                        </div>
                                      </div>   
                                         <label>Peringatan Ke :</label>
                                      <div class="form-group">
                                        <div class="col-sm-4">
                                          <select name="ke" class="form-control">
                                          <option value="<?php echo $d['ke']; ?>"><?php echo $d['ke']; ?></option>
                                          <option value="1">1</option>
                                          <option value="2">2</option>
                                          <option value="3">3</option>
                                          </select>
                                        </div>
                                      </div>       
                            <!-- Parent/Guadian Contact Section -->
                               <label>Deskripsi Surat Peringatan</label>
                                      <div class="form-group">
                                        <div class="col-sm-10">
                                          <textarea name="keterangan" rows="4" class="form-control" id="text-ckeditor"><?php echo $d['keterangan']; ?></textarea>
                                        </div>
                                      </div>
                                      </div>
                            <!-- Emergency Contact Section -->
                                      <!-- Form Name -->
                                </div>
                            </body>
                            </html>
