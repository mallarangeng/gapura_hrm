<?php
//error_reporting(0);
session_start();
include'class/class_gapura.php';
include'class/function.php';
$db = new Database();
// koneksi ke MySQL via method
$db->connectMySQL();
// script untuk user taruh sisi bos hahha semangat untuk kodingya
$user = new User();
#$laporan = new laporan();
$menu = new menu();
#session nama lengkap
//$nm_lengkap = $_SESSION['fullname'];
if (!$user->get_sesi())
{
header("location:login.php");
}
if ($_GET['r'] == 'logout')
{
$user->user_logout();
header("location:login.php");
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2.0">
	<!--<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">-->
	<title>HRM Gapura Angkasa</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/dataTables.bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/dataTables.tableTools.css">
	
	<script type="text/javascript" language="javascript" src="bootstrap/js/jquery-1.11.3.js"></script>
	<script type="text/javascript" language="javascript" src="bootstrap/js/jquery.dataTables.js"></script>
	<script type="text/javascript" language="javascript" src="bootstrap/js/dataTables.bootstrap.js"></script>
	<script type="text/javascript" language="javascript" src="bootstrap/js/dataTables.tableTools.js"></script>
	<!--<script type="text/javascript" language="javascript" src="../resources/syntax/shCore.js"></script>
	<script type="text/javascript" language="javascript" src="../resources/demo.js"></script>-->
  <!--
  <link href="bootstrap/source-sans-pro/source-sans-pro.css" rel="stylesheet" type="text/css" />
  -->
  <link href="bootstrap/css/custom.css" rel="stylesheet" type="text/css" />

    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript"></script>
    <link href="jquery/jquery-ui.css" rel="stylesheet" type="text/css" />  
  <script src="jquery/jquery-ui.js"></script>
  <script src="scripts/aplikasi.js"></script>
   <link href="images/icon.png" rel="shortcut icon" />

<!--  datepicker -->
  <link rel="stylesheet" href="datepicker/jquery-ui.css">
 
  <script src="datepicker/jquery-ui.js"></script>
  <link rel="stylesheet" href="resources/demos/style.css">
  <script>
  $(function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: "yy-mm-dd"
    });
  });
  </script>
  <!-- close   datepicker -->

<script src="ckeditor/ckeditor.js"></script>

</head>
<style type="text/css">
div.dataTables_length{
	float:left !important;
}
</style>

<body>
<script type="text/javascript" language="javascript" class="init">
$(document).ready(function() {
	$('#example').dataTable( {
		 "lengthMenu": [[10,15, 25, 50, -1], [10,15, 25, 50, "All"]],
        "dom": 'T<"clear">lfrtip',
        "tableTools": {
            "sSwfPath": "img/copy_csv_xls_pdf.swf"
        }
    } );
} );
</script>
<style type="text/css" class="init"></style>

<div class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <a href="index.php" class="navbar-brand"><font color="#ffffff"><span class="glyphicon glyphicon-link" aria-hidden="true"></span>&nbsp;<strong>HRM SYSTEM</strong></font></a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        
         <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav">
          <?php
        $arrayMenu = $menu->menuNavigasi();
          if(isset($arrayMenu) && $arrayMenu !=NULL){
            foreach($arrayMenu as $data){
      ?>
              <li class="dropdown">
   
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon <?php echo $data['icon']?>" aria-hidden="true"></span>&nbsp;<?php echo $data['title']?><span class="caret"></span></a>
          <ul class="dropdown-menu">
              <?php
            $arraysMenu = $menu->subMenuNavigasi($data['id_menu']);
            if(isset($arraysMenu) && $arraysMenu !=NULL){
              foreach($arraysMenu as $data2){
          ?>
            <li><a href="?r=<?php echo $data2['folder']?>&pg=<?php echo $data2['link']?>"><span class="glyphicon <?php echo $data2['icon']?>" aria-hidden="true"></span>&nbsp;<?php echo $data2['title']?></a></li>
            <?php
              }
            }
          ?>
          </ul>

        </li>
                  <?php
              }
            }
          ?> 
          </ul>

          <ul class="nav navbar-nav navbar-right">
                       <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="download"><span class="glyphicon glyphicon-user " aria-hidden="true"></span>&nbsp;<?php echo $_SESSION['level'];?> &nbsp;<?php echo $_SESSION['nm_lengkap'];?> </strong><span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="download">
                <li><a href="">About</a></li>
                <li><a href="?r=logout">Logout</a></li>
                </ul>
            </li>
          </ul>

        

        </div>
      
      </div>
    </div>
      <!--BODY
      !-->
<div class="container-fluid">
    <br>
<p>
<br>
<p>
<img src="images/logo-header.jpg" class="img-responsive">

<hr>
		 <?php
                                if (!isset($_GET['r'])){
                                    include('view/home/dashboard.php');
                                }else{
                                    $r  = $_GET['r'];
                                    $pg = $_GET['pg'];
                                        include "view/".$r.'/'.$pg.".php";
                                }
                            ?>
                            <p><p>
</div>
      <div class="well well-sm"><small> Copy Right © <a href="http://www.gapura.id/"><font color="#6ebf70">Gapura.id</font></a>&nbsp;<?php echo date('Y'); ?></small></div>
      </body>
</html>

<style type="text/css">
  .navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus {
color: #000;  /*Sets the text hover color on navbar*/
}

.navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active >   
 a:hover, .navbar-default .navbar-nav > .active > a:focus {
color: white; /*BACKGROUND color for active*/
background-color: #030033;
}

  .navbar-default {
    background-color: #a9d157;
    border-color: #dde0e1;
}

  .dropdown-menu > li > a:hover,
   .dropdown-menu > li > a:focus {
    color: #262626;
   text-decoration: none;
  background-color: #87c767;  /*change color of links in drop down here*/
   }
 .nav > li > a:hover,
 .nav > li > a:focus {
    text-decoration: none;
    background-color: silver; /*Change rollover cell color here*/
  }
  .navbar-default .navbar-nav > li > a {
   color: white; /*Change active text color here*/
    }
    hr {
    display: block;
    height: 1px;
    border: 0;
    border-top: 1px solid #ccc;
    margin: 1em 0;
    padding: 0; 
}
</style>


