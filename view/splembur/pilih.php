<?php
include'../../class/class_gapura.php';
include'../../class/function.php';
$db = new Database();
$db->connectMySQL();
#cegah akses tanpa melalui login
$user = new User();
$menu = new menu();
$karyawan = new karyawan();
#close akses tanpa login
?>


<div class="form-group">
    <div class="col-sm-6">
    <label>Pilih Nama Karyawan</label>
      <input type="hidden" name="id_spl" value="<?php echo $_GET['id_spl']; ?>" class="form-control">
      <select name="nik" class="selectpicker" data-show-subtext="true" data-live-search="true">
      <?php
      $arraykaryawan=$karyawan->tampilKaryawan();
      if (count($arraykaryawan)) {
      foreach($arraykaryawan as $d) {
    ?>
     <option data-subtext="<?php echo $d['nik']; ?>" value="<?php echo $d['nik']; ?>"><?php echo $d['nama']; ?> / <?php echo $d['nm_jabatan']; ?></option>
    <?php
}
}
    ?>
      </select>
      </div>
      <label>&nbsp;&nbsp;&nbsp;&nbsp;Keterangan Tambahan</label>
      <div class="col-sm-6">
      <input type="text" name="ket" class="form-control">
      <!--
      <span class="help-inline">With <code>data-show-subtext="true" data-live-search="true"</code>. Try searching for california</span>
      -->
    </div>
    </div>
  <script type="text/javascript">
    $('.selectpicker').selectpicker({
  style: 'btn-default',
  size: 10
});
  </script>