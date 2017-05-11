<?php 
  error_reporting(0);
  class Database {
  private $dbHost="localhost";
  private $dbUser="hendri";
  private $dbPass="900973";
  private $dbName="gapura_hrm";
  #private $dbUser="ppgtangb_5unsur";
  #private $dbPass="karnaalloh#354";
  #private $dbName="ppgtangb_limaunsur";
  function connectMySQL() {
  mysql_connect($this->dbHost, $this->dbUser, $this->dbPass);
  mysql_select_db($this->dbName) or die ("Database Tidak Ditemukan di Server"); 
  }
  }

  class User
  {
    
    function cek_login($user_id, $password) 
      {
        #untuk memastikan user id yang di input adalah tipe data integer karena id_kelomok terdiri dari angka
        #untuk salah satu pencegahan sql injection
        $user_id = (int)$_POST['user_id'];
        $password = md5($password);
        $result = mysql_query("SELECT * FROM user WHERE user_id='$user_id' AND password='$password'");
        $user_data = mysql_fetch_array($result);
        $no_rows = mysql_num_rows($result);
        if ($no_rows == 1) 
        {
          $_SESSION['login'] = TRUE;
          $_SESSION['user_id'] = $user_data['user_id'];
          $_SESSION['nm_lengkap'] = $user_data['nm_lengkap'];
          $_SESSION['level'] = $user_data['level'];
          return TRUE;
        }
          else 
            {
              return FALSE;
            }
      }
    // Ambil Sesi 
    function get_sesi() 
      {
        return $_SESSION['login'];
      }
  
    // Logout 
    function user_logout()
      {
        $_SESSION['login'] = FALSE;
        session_destroy();
      }
    }
 /**
 * 
 */

class Jabatan {
  // Tampilkan data data kelompok
  function tampilJabatan() {
          $query = mysql_query("SELECT * FROM jabatan ORDER BY id_jabatan");
          while($row=mysql_fetch_array($query))
          $data[]=$row;
          return $data;
  }
    function profile() {
      $query = mysql_query("SELECT * FROM kelompok WHERE id_kelompok='$_SESSION[id_kelompok]'");
      while($row=mysql_fetch_array($query))
      $data[]=$row;
      return $data;
  }
    function tampilKelompokdesa() {
      $query = mysql_query("SELECT * FROM kelompok WHERE parent='$_SESSION[id_kelompok]'");
      while($row=mysql_fetch_array($query))
      $data[]=$row;
      return $data;
  }
  function tampilDesa() {
      $query = mysql_query("SELECT * FROM kelompok WHERE parent='0' AND aktif='0' ");
      while($row=mysql_fetch_array($query))
      $data[]=$row;
      return $data;
  }
  function bacaKelompok($id_kelompok)
          {
        $query=mysql_query("SELECT * FROM kelompok WHERE id_kelompok='$_GET[id_kelompok]'");
        $data=mysql_fetch_array($query);
        $data[]=$row;
        if(isset($data)){
          return $data;
        }
      }

   function tambahKelompok($id_kelompok,$nm_kelompok,$parent,$alamat,$nohp,$penjab,$password,$level)
    {
      $query="INSERT INTO kelompok (id_kelompok,nm_kelompok,parent,alamat,nohp,penjab,password,level)
      VALUES('$id_kelompok','$nm_kelompok','$parent','$alamat','$nohp','$penjab','$password','$level')";
      $hasil= mysql_query($query);
    }

     function updateKelompok ($id_kelompok,$nm_kelompok,$parent,$alamat,$nohp,$penjab,$password,$level)
    {
      if (empty($password)){
      $query=mysql_query("UPDATE kelompok SET nm_kelompok='$nm_kelompok', parent='$parent', alamat='$alamat',nohp='$nohp', penjab='$penjab',
      level='$level'  WHERE id_kelompok='$id_kelompok'");
    }
    else 
    {
      $query=mysql_query("UPDATE kelompok SET nm_kelompok='$nm_kelompok', parent='$parent', alamat='$alamat',nohp='$nohp', penjab='$penjab',
        password='$password',level='$level'  WHERE id_kelompok='$id_kelompok'");
    }
   }



  function desaShow() {
      $query = mysql_query("SELECT id_kelompok, nm_kelompok, penjab,nohp,
      (SELECT COUNT(parent) AS tot_klp FROM kelompok WHERE parent !='0' AND aktif='0')tot_klp,
      (SELECT COUNT(id_lap) AS tot_lap FROM laporan as l left join kelompok as k on l.id_kelompok=k.id_kelompok
       WHERE  tanggal LIKE'$_GET[periode]%' AND stat='1') tot_lap
       FROM kelompok WHERE parent='0' AND aktif='0'");
      while($row=mysql_fetch_array($query))
      $data[]=$row;
      return $data;
  }

  }
  /**
  * 
  */
  class UserActiv
  {
     function addActiv($id,$id_kelompok,$nama,$waktu,$link)
    {
      $query="INSERT INTO user_activ (id,id_kelompok,nama,waktu,link)
      VALUES('$id','$id_kelompok','$nama','$waktu','$link')";
      $hasil= mysql_query($query);
    }
    function tampilKall() {
      $query = mysql_query("SELECT * FROM conten");
      while($row=mysql_fetch_array($query))
      $data[]=$row;
      return $data;
    }
    function tampilKinfo() {
      $query = mysql_query("SELECT * FROM conten WHERE kategori='info'");
      while($row=mysql_fetch_array($query))
      $data[]=$row;
      return $data;
    }

    function tampilKartikel() {
      $query = mysql_query("SELECT * FROM conten WHERE kategori='Artikel'");
      while($row=mysql_fetch_array($query))
      $data[]=$row;
      return $data;
    }
    function bacaP($id)
          {
        $query=mysql_query("SELECT * FROM conten WHERE id='1' AND publish='Y'");
        $data=mysql_fetch_array($query);
        $data[]=$row;
        if(isset($data)){
          return $data;
        }
      }
       function bacaPe($id)
          {
        $query=mysql_query("SELECT * FROM conten WHERE id='1'");
        $data=mysql_fetch_array($query);
        $data[]=$row;
        if(isset($data)){
          return $data;
        }
      }
      function bacaK($id)
          {
        $query=mysql_query("SELECT * FROM conten WHERE id='$_GET[id]'");
        $data=mysql_fetch_array($query);
        $data[]=$row;
        if(isset($data)){
          return $data;
        }
      }
      function updateK ($id,$judul,$kategori,$conten,$tgl,$publish,$label)
    {
      $query=mysql_query("UPDATE conten SET judul='$judul', kategori='$kategori', conten='$conten',tgl='$tgl',publish='$publish', label='$label'  WHERE id='$id'");
    }
  }

  /**
  * class object laporan 
  */
  class Laporan
  {
    function hapuslaporan($id_lap)
        {
          $query = "DELETE FROM laporan WHERE id_lap='$id_lap'";
          mysql_query($query);
          echo"<meta http-equiv='refresh' content='0;url=?r=laporan&pg=laporan_admin'>";
        }
    function tambahLap($id_lap,$id_kelompok,$tanggal,$ket,$date_on,$stat,$turba,$nama)
    {
      if($_POST){
      # Cek nomor faktur di database
      $tanggal=$_POST['tanggal'];#ambil strin tanggal dari parameter 
      $periode=substr($tanggal,0,7);
      $cek_period=mysql_num_rows(mysql_query
      ("SELECT tanggal FROM laporan WHERE tanggal LIKE'$periode%' AND id_kelompok='$_SESSION[id_kelompok]' "));
      # Kalau nomor faktur sudah ada
      if ($cek_period > 0){
        echo "<script type='text/javascript'>window.alert('Laporan Musyawrah untuk periode ini sudah pernah dibuat !')</script>";
      }
      # Kalau nomor faktur belum ada silahkan di simpan
else{
      $query="INSERT INTO laporan (id_lap,id_kelompok,tanggal,ket,date_on,stat,turba,nama)
      VALUES('$id_lap','$id_kelompok','$tanggal','$ket','$date_on','$stat','$turba','$nama')";
      $hasil= mysql_query($query);
    }
     }
   }
    function tampilLapadmin() {
      $query = mysql_query("SELECT a.*,b.*,
      (SELECT COUNT(id_detail) AS tot_poin FROM detail WHERE a.id_lap=detail.id_lap)tot_poin
       FROM laporan a, kelompok b WHERE a.id_kelompok=b.id_kelompok ORDER BY tanggal DESC");
      while($row=mysql_fetch_array($query))
      $data[]=$row;
      return $data;
  }
   function timeline() {
      $query = mysql_query("SELECT a.*,b.*,
      (SELECT COUNT(id_detail) AS tot_poin FROM detail WHERE a.id_lap=detail.id_lap)tot_poin
       FROM laporan a, kelompok b WHERE a.id_kelompok=b.id_kelompok ORDER BY tanggal DESC LIMIT 50");
      while($row=mysql_fetch_array($query))
      $data[]=$row;
      return $data;
  }
      function timeline2() {
      $query = mysql_query("select * from laporan as l left join kelompok as k on l.id_kelompok=k.id_kelompok
       WHERE stat='1'");
      while($row=mysql_fetch_array($query))
      $data[]=$row;
      return $data;
  }
     function tampilLapdaerah($tanggal) {
      $query = mysql_query("select * from laporan as l left join kelompok as k on l.id_kelompok=k.id_kelompok
       WHERE parent='$_GET[desa]' AND stat='1' AND tanggal LIKE'$_GET[periode]%'");
      while($row=mysql_fetch_array($query))
      $data[]=$row;
      return $data;
  }
       function tampilLapdesa($tanggal) {
      $query = mysql_query("select * from laporan as l left join kelompok as k on l.id_kelompok=k.id_kelompok
       WHERE parent='$_SESSION[id_kelompok]' AND stat='1' AND tanggal LIKE'$_GET[periode]%'");
      while($row=mysql_fetch_array($query))
      $data[]=$row;
      return $data;
  }
      function tampilLHarian() {
      $query = mysql_query("select * from laporan as l left join kelompok as k on l.id_kelompok=k.id_kelompok
       WHERE stat='1'");
      while($row=mysql_fetch_array($query))
      $data[]=$row;
      return $data;
  }
    function laporanBulanan() {
      $query = mysql_query("SELECT CONCAT(YEAR(tanggal),'-',mid(tanggal,6,2)) AS tahun_bulan, COUNT(*) AS jumlah_bulanan
      FROM laporan as l left join kelompok as k on l.id_kelompok=k.id_kelompok
      WHERE parent='$_SESSION[id_kelompok]' AND stat='1' GROUP BY YEAR(tanggal),MONTH(tanggal) ORDER BY tanggal DESC");
      while($row=mysql_fetch_array($query))
      $data[]=$row;
      return $data;
  }
      function laporanDaerah() {
      $query = mysql_query("SELECT CONCAT(YEAR(tanggal),'-',mid(tanggal,6,2)) AS tahun_bulan, COUNT(*) AS jumlah_bulanan
      FROM laporan as l left join kelompok as k on l.id_kelompok=k.id_kelompok
      WHERE  stat='1' GROUP BY YEAR(tanggal),MONTH(tanggal)");
      while($row=mysql_fetch_array($query))
      $data[]=$row;
      return $data;
  }

  function tampilLap() {
      $query = mysql_query("SELECT id_lap, id_kelompok, tanggal,ket,date_on,stat,turba,nama,
      (SELECT COUNT(id_detail) AS tot_poin FROM detail WHERE laporan.id_lap=detail.id_lap)tot_poin
      FROM laporan WHERE id_kelompok='$_SESSION[id_kelompok]' ORDER BY tanggal DESC");
      while($row=mysql_fetch_array($query))
      $data[]=$row;
      return $data;
    }

    function bacaLap($id_lap)
          {
        $query=mysql_query("SELECT a.*,b.* FROM laporan a, kelompok b WHERE a.id_kelompok=b.id_kelompok AND a.id_lap='$_GET[id_lap]'");
        $data=mysql_fetch_array($query);
        $data[]=$row;
        if(isset($data)){
          return $data;
        }
      }
      #hitung laporan masuk dari kelompok kedesa
      function hitungindesa()
          {
        $query=mysql_query("SELECT count(*) AS inboxdesa FROM laporan as l left join kelompok as k on l.id_kelompok=k.id_kelompok
       WHERE parent='$_SESSION[id_kelompok]'");
        $data=mysql_fetch_array($query);
        $data[]=$row;
        if(isset($data)){
          return $data;
        }
      }
       function inboxtampilLapdesa() {
      $query = mysql_query("select * from laporan as l left join kelompok as k on l.id_kelompok=k.id_kelompok
       WHERE parent='$_SESSION[id_kelompok]'");
      while($row=mysql_fetch_array($query))
      $count = mysql_num_rows($query);
      $data[]=$row;
      return $data;
  }

    function updateLap ($id_lap,$id_kelompok,$tanggal,$ket,$date_on,$stat,$turba,$nama)
    {
      if($_POST){
      # Cek nomor faktur di database
      $tanggal=$_POST['tanggal'];#ambil strin tanggal dari parameter 
      $periode=substr($tanggal,0,7);
      $cek_period=mysql_num_rows(mysql_query
      ("SELECT tanggal FROM laporan WHERE tanggal LIKE '$periode%' AND id_kelompok='$_SESSION[id_kelompok]' "));
      # Kalau nomor faktur sudah ada
      if ($cek_period > 1){
        echo "<script type='text/javascript'>window.alert('Laporan Musyawrah untuk periode ini sudah pernah dibuat !')</script>";
      }
      # Kalau nomor faktur belum ada silahkan di simpan
else{
      $query=mysql_query("UPDATE laporan SET id_kelompok='$id_kelompok', tanggal='$tanggal',ket='$ket',date_on='$date_on',stat='$stat',turba='$turba',nama='$nama' WHERE id_lap='$id_lap'");
    }
  }
}
    
  }
  /**
  * kelola file file lampiran karyawan
  */
  /**
  * 
  */class Datafile  {
        function tambahDatafile($nik,$nama_file,$gambar)
          {
            $query="INSERT INTO datafile(nik,nama_file,gambar)
            VALUES('$nik','$nama_file','$gambar')";
            move_uploaded_file($_FILES['gambar']['tmp_name'],"file_karyawan/".$gambar);
            $hasil= mysql_query($query);
          }
  //menampilkan file 
        function tampilDatafile($nik) {
            $query = mysql_query("SELECT * FROM datafile WHERE nik='$_GET[nik]'");
              while($row=mysql_fetch_array($query))
              $data[]=$row;
            return $data;
        }
  //Baca data file
  function bacaDatafile ($field,$kode_file){
  $query=mysql_query("SELECT * FROM datafile WHERE kode_file='$kode_file'");
  $data=mysql_fetch_array($query);
  if ($field == 'kode_file') return $data['kode_file'];
  else if ($field == 'kontrak_id') return $data['kontrak_id'];
  else if ($field == 'nama_file') return $data['nama_file'];
  else if ($field == 'gambar') return $data['gambar'];
  }
  //update data file
  function updateDatafile ($kode_file,$kontrak_id,$nama_file,$gambar){
  if (empty($gambar)){
  $query=mysql_query("UPDATE datafile SET
  kontrak_id='$kontrak_id',nama_file='$nama_file'WHERE kode_file='$kode_file'");
  $hasil= mysql_query($query);
   echo"<meta http-equiv='refresh' content='0;url=?page=datafile/file_view&kontrak_id=".$_GET['kontrak_id']."'>";
  }
  else 
  {
  $query=mysql_query("UPDATE datafile SET
  kontrak_id='$kontrak_id',nama_file='$nama_file',gambar='$gambar' WHERE kode_file='$kode_file'");
  move_uploaded_file($_FILES['gambar']['tmp_name'],"file_gambar/".$gambar);
  $hasil= mysql_query($query);
   echo"<meta http-equiv='refresh' content='0;url=?page=datafile/file_view&kontrak_id=".$_GET['kontrak_id']."'>";
  }
  }
  }
  /**
  * 

  */

  /**
  * 
  */
  class Training 
  {
    
    function tampilKategoriT()
    {
       $query = mysql_query("SELECT * FROM kat_training");
      while($row=mysql_fetch_array($query))
      $data[]=$row;
      return $data;
    }
     function addTraining($id_training,$id_kat,$nik,$keterangan,$tgl_awal,$tgl_akhir,$nilai)
    {
      $query="INSERT INTO training (id_training,id_kat,nik,keterangan,tgl_awal,tgl_akhir,nilai)
      VALUES ('$id_training','$id_kat','$nik','$keterangan','$tgl_awal','$tgl_akhir','$nilai')";
      $hasil= mysql_query($query);  
    }
        function tampilTraining() {
      $query = mysql_query("SELECT a.*,b.*,c.* FROM training a, karyawan b, kat_training c WHERE a.nik=b.nik AND a.id_kat=c.id_kat");
      while($row=mysql_fetch_array($query))
      $data[]=$row;
      return $data;
    }
  }
    class Sp 
  {
    
    function tampilKategoriT()
    {
       $query = mysql_query("SELECT * FROM kat_training");
      while($row=mysql_fetch_array($query))
      $data[]=$row;
      return $data;
    }
     function addSp($id_peringatan,$nik,$tanggal,$ke,$keterangan)
    {
      $query="INSERT INTO peringatan (id_peringatan,nik,tanggal,ke,keterangan)
      VALUES ('$id_peringatan','$nik','$tanggal','$ke','$keterangan')";
      $hasil= mysql_query($query);  
    }
        function tampilSp() {
      $query = mysql_query("SELECT a.*,b.*,c.* FROM peringatan a, karyawan b, jabatan c WHERE a.nik=b.nik AND b.id_jabatan=c.id_jabatan");
      while($row=mysql_fetch_array($query))
      $data[]=$row;
      return $data;
    }
      function bacaSp($id_peringatan)
          {
        $query=mysql_query("SELECT a.*,b.*,c.* FROM peringatan a, karyawan b, jabatan c WHERE a.nik=b.nik AND b.id_jabatan=c.id_jabatan AND id_peringatan='$_GET[id_peringatan]'");
        $data=mysql_fetch_array($query);
        $data[]=$row;
        if(isset($data)){
          return $data;
        }
      }
     function updateSp ($id_peringatan,$nik,$tanggal,$ke,$keterangan)
    {
      $query=mysql_query("UPDATE peringatan SET nik='$nik', tanggal='$tanggal',ke='$ke',keterangan='$keterangan'WHERE id_peringatan='$id_peringatan'");
    }
  }
  class Karyawan
  {
    
    function tampilKategori() {
      $query = mysql_query("SELECT * FROM kategori ORDER BY id_kat");
      while($row=mysql_fetch_array($query))
      $data[]=$row;
      return $data;
    }
      function bacaKaryawan($nik)
          {
        $query=mysql_query("SELECT a.*,b.*,c.* FROM karyawan a, user b, jabatan c WHERE a.user_id=b.user_id AND a.id_jabatan=c.id_jabatan AND a.nik='$_GET[nik]'");
        $data=mysql_fetch_array($query);
        $data[]=$row;
        if(isset($data)){
          return $data;
        }
      }
    function tampilKaryawan() {
      $query = mysql_query("SELECT a.*,b.*,c.* FROM karyawan a, user b, jabatan c WHERE a.user_id=b.user_id AND a.id_jabatan=c.id_jabatan");
      while($row=mysql_fetch_array($query))
      $data[]=$row;
      return $data;
    }
    function tambahKaryawan($nik,$user_id,$nama,$tempat_lahir,$tgl_lahir,$jekel,$alamat,$agama,$no_hp,$tgl_masuk,$tgl_efektif,$tgl_keluar,$id_jabatan,$status_kerja,$tgl_pensiun,$catatan,$foto,$date_input,$date_update)
    {
      $query="INSERT INTO karyawan (nik,user_id,nama,tempat_lahir,tgl_lahir,jekel,alamat,agama,no_hp,tgl_masuk,tgl_efektif,tgl_keluar,id_jabatan,status_kerja,tgl_pensiun,catatan,foto,date_input,date_update)
      VALUES('$nik','$user_id','$nama','$tempat_lahir','$tgl_lahir','$jekel','$alamat','$agama','$no_hp','$tgl_masuk','$tgl_efektif','$tgl_keluar','$id_jabatan','$status_kerja','$tgl_pensiun','$catatan','$foto','$date_input','$date_update')";
      move_uploaded_file($_FILES['foto']['tmp_name'],"file_foto/".$foto);
      $hasil= mysql_query($query);
    }
      function updateGenerus ($nig,$id_kelompok,$nama,$tempat_lahir,$tgl_lahir,$jekel,$gol_darah,$alamat,$nohp,$nm_ayah,$nm_ibu,$id_kat,$foto,$date_input,$date_update)
    {
      if (empty($foto)){
      $query=mysql_query("UPDATE generus SET id_kelompok='$id_kelompok', nama='$nama', tempat_lahir='$tempat_lahir', tgl_lahir='$tgl_lahir', jekel='$jekel', gol_darah='$gol_darah', alamat='$alamat',nohp='$nohp', nm_ayah='$nm_ayah', nm_ibu='$nm_ibu', id_kat='$id_kat', date_input='$date_input', date_update='$date_update'  WHERE nig='$nig'");
    }
  else 
  {
       $query=mysql_query("UPDATE generus SET id_kelompok='$id_kelompok', nama='$nama', tempat_lahir='$tempat_lahir', tgl_lahir='$tgl_lahir', jekel='$jekel', gol_darah='$gol_darah', alamat='$alamat',nohp='$nohp', nm_ayah='$nm_ayah', nm_ibu='$nm_ibu', id_kat='$id_kat', foto='$foto', date_input='$date_input', date_update='$date_update' WHERE nig='$nig'");
         move_uploaded_file($_FILES['foto']['tmp_name'],"file_foto/".$foto);
         $hasil= mysql_query($query);
    }
  }
  }
  class Detail
  {
    function hapusdetail($id_detail)
  {
    $query = "DELETE FROM detail WHERE id_detail='$id_detail'";
    mysql_query($query);
    echo"<meta http-equiv='refresh' content='0;url=?r=detail&pg=detail_admin&id_lap=$_GET[id_lap]'>";
  }
    
    function tambahDetail($id_detail,$id_lap,$kendala,$solusi,$ket,$stat,$publis)
    {
      $query="INSERT INTO detail (id_detail,id_lap,kendala,solusi,ket,stat,publis)
      VALUES('$id_detail','$id_lap','$kendala','$solusi','$ket','$stat','$publis')";
      $hasil= mysql_query($query);
    }

      function tampilDetail() {
      $query = mysql_query("SELECT a.*,b.*,c.* FROM kelompok a,laporan b, detail c where a.id_kelompok=b.id_kelompok AND b.id_lap=c.id_lap AND c.id_lap='$_GET[id_lap]'");
      while($row=mysql_fetch_array($query))
      $data[]=$row;
      return $data;
  }
  function tampilNotulen() {
      $query = mysql_query("SELECT a.*,b.*,c.* FROM detail a,laporan b,kelompok c where a.id_lap=b.id_lap AND b.id_kelompok=c.id_kelompok ORDER BY tanggal DESC ");
      while($row=mysql_fetch_array($query))
      $data[]=$row;
      return $data;
  }

        function tampilDetailPrivate() {
      $query = mysql_query("SELECT a.*,b.*,c.* FROM kelompok a,laporan b, detail c where a.id_kelompok=b.id_kelompok AND b.id_lap=c.id_lap AND c.id_lap='$_GET[id_lap]'");
      while($row=mysql_fetch_array($query))
      $data[]=$row;
      return $data;
  }
        function tampilDetailPending() {
      $query = mysql_query("SELECT a.*,b.*,c.* FROM kelompok a,laporan b, detail c where a.id_kelompok=b.id_kelompok AND b.id_lap=c.id_lap AND c.stat='$_GET[stat]' AND a.id_kelompok='$_SESSION[id_kelompok]' ORDER BY tanggal DESC");
      while($row=mysql_fetch_array($query))
      $data[]=$row;
      return $data;
  }
    function timelineDetail() {
      $blnthn=$_GET['thn']."-".$_GET['bln'];
      $query = mysql_query("SELECT a.*,b.*,c.* FROM kelompok a,laporan b, detail c where a.id_kelompok=b.id_kelompok AND b.id_lap=c.id_lap AND c.publis='Bagikan' AND b.tanggal LIKE'$blnthn%'");
      while($row=mysql_fetch_array($query))
      $data[]=$row;
      return $data;
  }
     function pagetimeline() {
      $query = mysql_query("SELECT mid(tanggal,6,2) AS bulan, COUNT(*) AS jumlah_bulanan FROM laporan GROUP BY MONTH(tanggal);");
      while($row=mysql_fetch_array($query))
      $data[]=$row;
      return $data;
  }
  function bacaDetail($id_detail)
          {
        $query=mysql_query("SELECT a.*,b.*,c.* FROM kelompok a,laporan b, detail c where a.id_kelompok=b.id_kelompok AND b.id_lap=c.id_lap AND c.id_detail='$_GET[id_detail]'");
        $data=mysql_fetch_array($query);
        $data[]=$row;
        if(isset($data)){
          return $data;
        }
      }
       function updateDetail ($id_detail,$id_lap,$kendala,$solusi,$ket,$stat,$publis)
    {
      $query=mysql_query("UPDATE detail SET id_lap='$id_lap', kendala='$kendala',solusi='$solusi',ket='$ket',stat='$stat',
        publis='$publis'WHERE id_detail='$id_detail'");
    }
  }
  /**
  * 
  */
  class Menu
  {
      function tampilMenu(){
    $query = mysql_query("SELECT * FROM menu ORDER BY id_menu,parent");
    while($row=mysql_fetch_array($query))
      $data[]=$row;
    if(isset($data)){
      return $data;
    }
  }
    
      function tambahMenu($id_menu,$title, $folder,$link, $level,$parent, $icon, $urut) {
    $query = "INSERT INTO menu (id_menu,title, folder, link,level, parent, icon, urut)
              VALUES ('$id_menu','$title', '$folder', '$link', '$level', '$parent', '$icon', '$urut')";
    $hasil = mysql_query($query);
  }

    function comboParent(){
    $query =  mysql_query("select id_menu,title from menu where parent='0'");
    while($row=mysql_fetch_array($query))
      $data[]=$row;
    if(isset($data)){
      return $data;
    }
  }
    function bacaMenu($id_menu)
      {
      $query=mysql_query("SELECT * FROM menu WHERE id_menu='$_GET[id_menu]'");
      $data=mysql_fetch_array($query);
      $data[]=$row;
      if(isset($data)){
        return $data;
      }
    }
     function updateMenu ($id_menu,$title, $folder,$link, $level,$parent, $icon, $urut)
    {
      $query=mysql_query("UPDATE menu SET title='$title', folder='$folder',link='$link',level='$level',parent='$parent',
        icon='$icon',urut='$urut'  WHERE id_menu='$id_menu'");
    }
  function menuNavigasi($user){
    $menu = mysql_query("select * from menu where parent='0'");
    #$menu = mysql_query("SELECT a.username,b.id_menu,b.baca,b.tulis,c.* FROM ms_user a, ms_menu_user b, ms_menu c WHERE a.username=b.username AND b.id_menu=c.id_menu AND a.username ='$user' AND b.baca='Y' AND c.parent='0' AND a.blokir='N' ORDER BY urut ASC");
    while($row=mysql_fetch_array($menu))
      $data[]=$row;
    if (isset($data)){
      return($data);
    }
  }
  function subMenuNavigasi($menu,$user){
    //$smenu = mysql_query("select * from ms_menu where parent='$menu' order by urut asc");
    $smenu = mysql_query("select * from menu where parent='$menu'");
    $ada    = mysql_num_rows($smenu);
    if($ada==0){
      $data[]=$ada;
      if (isset($data)){
        return false;
      } 
    }else{
      while($row=mysql_fetch_array($smenu))
        $data[]=$row;
      if (isset($data)){
        return($data);
      }
    }
  }
  }

function rupiah($nilai, $pecahan = 0) {
    return number_format($nilai, $pecahan, ',', '.');
}
  

?>
