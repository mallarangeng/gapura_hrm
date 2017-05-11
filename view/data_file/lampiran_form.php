<!DOCTYPE html>
<html>
<head>
	<title>Lampiran Form</title>
</head>
<body>
<div class="row">

                                <div class="col-md-8 col-md-offset-1">             
                                      <label>Nik</label>
                                      <div class="form-group">
                                        <div class="col-sm-6">
                                          <input type="text" name="nik" value="<?php echo $_GET['nik']; ?>" class="form-control" required>
                                        </div>
                                      </div>      
                            <!-- Parent/Guadian Contact Section -->
                                      <!-- Form Name -->
                                      <label>Nama File Lampiran</label>
                                      <!-- Text input-->
                                      <div class="form-group">
                                        <div class="col-sm-12">
                                          <input type="text" name="nama_file" class="form-control" required>
                                        </div>
                              
                                      </div>
                                 <label>File Lampiran</label>
                                        <div class="form-group">
                                        <div class="col-sm-8">        
                                        <label class="btn btn-success btn-file">
                                        	<span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span>
                                            Cari file lampiran <input type="file" name="gambar" hidden>
                                        </label>                                                
                                        </div>
                                      </div>
                                         
                                      </div>
                            <!-- Emergency Contact Section -->
                                      <!-- Form Name -->
                              
                                </div>

</body>
</html>

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