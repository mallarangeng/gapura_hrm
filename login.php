<?php  
error_reporting(0);
session_start();
include_once'class/class_gapura.php';
// instance objek db dan user
$user = new User();
$db = new Database();
// koneksi ke MySQL via method
$db->connectMySQL();
// cek apakah user login atau tidak via method
if($user->get_sesi()) {
  header("location:index.php");
}
if($_SERVER["REQUEST_METHOD"] == "POST") {
  $login=$user->cek_login($_POST['user_id'], $_POST['password']);
  if($login) {
     // login sukses, arahkan ke file index.php
    header("location:index.php");
  }
  else {
  // login gagal, beri peringatan dan kembali ke file index.php
 header("location:login.php?r=error");
  }
}
?>
<title>HRM Gapura Angkasa</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="bootstrap/css/login.css" rel="stylesheet" type="text/css" />
 <script src="bootstrap/js/jquery-1.10.2.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
<style type="text/css">
    body {
        background-image: url("images/bg.jpg");
    }
</style>

<link href="images/icon.png" rel="shortcut icon" />
        <body >
            <div class="container">
                <div class="row vertical-offset-100">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">                                
                                <div class="row-fluid user-row">
                                    <img src="images/logo-front.png" width="300" class="img-responsive" alt="Conxole Admin"/>
                                </div>
                            </div>
                            <br>
                            <center><strong>HUMAN RESOURCE MANAGEMENT INFORMATION SISTEM</strong></center>
                            <div class="panel-body">
                                  <form accept-charset="UTF-8" action="?op=in" method="post" role="form" class="form-signin">
                                    <fieldset>
                                        <label class="panel-login">
                                            <div class="login_result"></div>
                                        </label>
                                        <input class="form-control" placeholder="USER ID" id="username" name="user_id" type="text" required>
                                        <input class="form-control" placeholder="PASSWORD" id="password" name="password" type="password" required>
                                        
                                        <input class="btn btn-lg btn-success btn-block" type="submit" id="login" value="Login System">
                                    </fieldset>
                                </form>
                                <center><small> Copy Right © <a href="http://www.gapura.id/"><font color="#6ebf70">hendrimamang@gmail.com</font></a>&nbsp;<?php echo date('Y'); ?></small></center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </body>
            </div>
<script type="text/javascript">
$(document).ready(function() {
    $(document).mousemove(function(event) {
        TweenLite.to($("body"), 
        .5, {
            css: {
                backgroundPosition: "" + parseInt(event.pageX / 8) + "px " + parseInt(event.pageY / '12') + "px, " + parseInt(event.pageX / '15') + "px " + parseInt(event.pageY / '15') + "px, " + parseInt(event.pageX / '30') + "px " + parseInt(event.pageY / '30') + "px",
                "background-position": parseInt(event.pageX / 8) + "px " + parseInt(event.pageY / 12) + "px, " + parseInt(event.pageX / 15) + "px " + parseInt(event.pageY / 15) + "px, " + parseInt(event.pageX / 30) + "px " + parseInt(event.pageY / 30) + "px"
            }
        })
    })
})
            </script>