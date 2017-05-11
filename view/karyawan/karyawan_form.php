<?php
include'../../class/class_gapura.php';
include'../../class/function.php';
$db = new Database();
$db->connectMySQL();
$user = new user;
$jabatan = new jabatan;
$karyawan = new karyawan;
#cegah akses tanpa melalui login
#close akses tanpa login
?>

            
                <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1default" data-toggle="tab">Data Karyawan</a></li>
                            <li><a href="#tab2default" data-toggle="tab">Kelengkapan 1</a></li>
                            <li><a href="#tab3default" data-toggle="tab">Kelengkapan 2</a></li>
                        </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1default">
                            <!-- Name Section -->
                              <div class="row">
                                <div class="col-md-8 col-md-offset-1">
                                      <label>Nama Lengkap :</label>
                                      <div class="form-group">

                                        <div class="col-sm-6">
                                          <input type="hidden" name="nik" value="<?php echo kdauto("karyawan","2017"); ?>">
                                          <input type="hidden" name="user_id" value="<?php echo $_GET['user_id']; ?>">
                                          <input type="text" name="nama" placeholder="Nama Lengkap" class="form-control" required>
                                        </div>
                                      </div>
                                      <label>Tempat Lahir :</label>
                                      <div class="form-group">
                                        <div class="col-sm-6">
                                          <input type="text" name="tempat_lahir" placeholder="Tempat Lahir" class="form-control" required>
                                        </div>
                                      </div>

                                      <label>Tanggal Lahir :</label>
                                      <div class="form-group">
                                        <div class="col-sm-4">
                                          <select name="tgl" class="form-control" required>
                                            <option value="">Tanggal</option>
                                             <?PHP for ($hari=1; $hari<=31; $hari++){ ?>
                                              <option value="<?php echo $hari; ?>"><?php echo $hari; ?></option>
                                              <?php } ?>
                                              </select>
                                        </div>
                                        <div class="col-sm-4">
                                          <select name="bln" class="form-control" required>
                                            <option value="">Bulan</option>
                                            <?php $nmbln = array("01","02","03","04","05","06","07","08","09","10","11","12"); ?>
                                            <?PHP for ($bln=1; $bln<=12; $bln++){ ?>
                                            <option value="<?php echo $bln; ?>"><?php echo $nmbln[$bln-1]; ?></option>
                                            <?php } ?>
                                          </select>
                                        </div>
                                        <div class="col-sm-4">
                                          <select name="thn" class="form-control" required>
                                            <option value="">Tahun</option>
                                            <?PHP for ($thn=1980; $thn<=2017; $thn++){ ?>
                                            <option value="<?php echo $thn; ?>"><?php echo $thn; ?></option>
                                            <?php } ?>
                                          </select>
                                        </div>
                                      </div>
                                      <!-- Text input-->
                                      <!-- Text input-->
                                      <label>Jenis Kelamin :</label>
                                      <div class="form-group">
                                        <div class="col-sm-4">
                                          <select name="jekel" class="form-control" required>
                                            <option value=""> Pilih Jenis Kelamin</option>
                                            <option value="Laki Laki">Laki Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                          </select>
                                        </div>
                                      </div>
                                          <label>Alamat Lengkap</label>
                                        <div class="form-group">
                                        <div class="col-sm-10">
                                          <input type="text" name="alamat" placeholder="ALamat" class="form-control" required>
                                        </div>
                                      </div>
                            <!-- Emergency Contact Section -->
                                      <!-- Form Name -->
                                
                                </div><!-- /.col-lg-12 -->
                            </div><!-- /.row -->
                            <!-- Payment Modal -->
                        </div>
                        <div class="tab-pane fade" id="tab2default">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-1">
                                 
                                      <label>Agama</label>
                                          <div class="form-group">
                                        <div class="col-sm-4">
                                          <select name="agama" class="form-control" required>
                                            <option value="">Pilih Agama</option>
                                            <option value="islam">Islam</option>
                                            <option value="Kristen">Kristen</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Budha">Budha</option>
                                            <option value="Kongucu">Kongucu</option>
                                          </select>
                                        </div>
                                      </div>
                                      <label>Nomor HP</label>
                                      <div class="form-group">
                                        <div class="col-sm-6">
                                          <input type="text" name="no_hp" placeholder="Nomor HP" class="form-control" required>
                                        </div>
                                      </div>      
                            <!-- Parent/Guadian Contact Section -->
                                      <!-- Form Name -->
                                      <label>Tanggal Masuk</label>
                                      <!-- Text input-->
                                      <div class="form-group">
                                        <div class="col-sm-6">
                                          <input type="text" name="tgl_masuk" value="<?php echo date('Y-m-d') ?>" class="form-control" required>
                                        </div>
                              
                                      </div>
                                       <label>Tanggal Efektif</label>
                                      <div class="form-group">
                                        <div class="col-sm-4">
                                          <input type="text" name="tgl_efektif" value="<?php echo date('Y-m-d') ?>" class="form-control" required>
                                        </div>
                                      </div>
                                      <label>Tanggal Keluar</label>
                                      <div class="form-group">
                                        <div class="col-sm-4">
                                          <input type="text" name="tgl_keluar" value="<?php echo date('Y-m-d') ?>" class="form-control" required>
                                        </div>
                                      </div>
                                         
                                      </div>
                            <!-- Emergency Contact Section -->
                                      <!-- Form Name -->
                                  
                                </div><!-- /.col-lg-12 -->
                            </div>
                      
                         
                        <div class="tab-pane fade" id="tab3default">
                        <div class="row">
                                <div class="col-md-8 col-md-offset-1">
                                    <label>Jabatan</label>
                                      <div class="form-group">
                                           <div class="col-sm-4">
                                          <select name="id_jabatan" class="form-control" required>
                                            <option value="">Pilih Jabatan</option>
                                            <?php
                                            $arrayjabatan=$jabatan->tampilJabatan();
                                            if (count($arrayjabatan)) {
                                            foreach($arrayjabatan as $d) {
                                          ?>
                                            <option value="<?php echo $d['id_jabatan']; ?>"><?php echo $d['nm_jabatan']; ?></option>
                                          <?php
                                          }
                                          } ?>
                                            <option value="Karyawan">Karyawan</option>
                                            
                                          </select>
                                        </div>
                                      </div>
                                     <label>Status Kerja</label>
                                      <div class="form-group">
                                           <div class="col-sm-4">
                                          <select name="status_kerja" class="form-control" required>
                                            <option value="">Status Kerja</option>
                                            <option value="OutSourching">OutSourching</option>
                                            <option value="Karyawan">Karyawan</option>
                                            
                                          </select>
                                        </div>
                                      </div>
                                      <label>Tanggal Pensiun</label>
                                      <div class="form-group">
                                        <div class="col-sm-6">
                                          <input type="text" name="tgl_pensiun" value="<?php echo date('Y-m-d') ?>" class="form-control" required>
                                        </div>
                                      </div>
                                      <label>Catatan Mengenai Karyawan</label>
                                      <div class="form-group">
                                        <div class="col-sm-10">
                                          <textarea name="catatan" rows="6" class="form-control"></textarea>
                                        </div>
                                      </div>
                                      <label>Satus Kerja</label>
                                      <label>Foto</label>
                                        <div class="form-group">
                                        <div class="col-sm-4">        
                                        <label class="btn btn-info btn-file">
                                            Cari File Foto <input type="file" name="foto" hidden>
                                        </label>
                                                   <input type="hidden" name="date_input" value="<?php echo tglSkrg(); ?>">
                                                  <input type="hidden" name="date_update" value="">
                                                  
                                     
                                        </div>
                                      </div>
                        </div>
                        </div>
                        </div>
                      
                  

<style type="text/css">
  .btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}


</style>