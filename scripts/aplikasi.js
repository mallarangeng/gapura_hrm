 $(function(){
             $(document).on('click','.add-karyawan',function(e){
                e.preventDefault();
                $("#modal-karyawan").modal('show');
                $(".modal-title").html('FORM KARYAWAN');
                $.get("view/karyawan/karyawan_form.php",
                    {user_id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
     
               $(document).on('click','.detail-karyawan',function(e){
                e.preventDefault();
                $("#modal-detail-karyawan").modal('show');
                $(".modal-title").html('DETAIL KARYAWAN');
                $.get("view/karyawan/karyawan_detail.php",
                    {nik:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
                $(document).on('click','.tambah-lampiran',function(e){
                e.preventDefault();
                $("#modal-tambah-lampiran").modal('show');
                $(".modal-title").html('MASTER FILE LAMPIRAN');
                $.get("view/data_file/lampiran_form.php",
                    {nik:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
               $(document).on('click','.lihat-lampiran',function(e){
                e.preventDefault();
                $("#modal-lampiran").modal('show');
                $(".modal-title").html('MASTER FILE LAMPIRAN');
                $.get("view/data_file/lampiran.php",
                    {nik:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
                $(document).on('click','.form-training',function(e){
                e.preventDefault();
                $("#modal-training").modal('show');
                $(".modal-title").html('FORM TRAINING');
                $.get("view/training/training_form.php",
                    {nik:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
                $(document).on('click','.ubah-training',function(e){
                e.preventDefault();
                $("#modal-ubah-training").modal('show');
                $(".modal-title").html('FORM TRAINING');
                $.get("view/training/training_ubah.php",
                    {id_training:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
                $(document).on('click','.form-sp',function(e){
                e.preventDefault();
                $("#modal-sp").modal('show');
                 $(".modal-title").html('FORM SURAT PERINGATAN');
                $.get("view/sp/sp_form.php",
                {nik:$(this).attr('data-id')},
                 function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });

                $(document).on('click','.edit-sp',function(e){
                e.preventDefault();
                $("#modal-edit-sp").modal('show');
                 $(".modal-title").html('UBAH SURAT PERINGATAN');
                $.get("view/sp/sp_ubah.php",
                {id_peringatan:$(this).attr('data-id')},
                 function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
                $(document).on('click','.add-jabatan',function(e){
                e.preventDefault();
                $("#modal-jabatan").modal('show');
                 $(".modal-title").html('TAMBAH JABATAN');
                $.get("view/jabatan/jabatan_form.php",
                {user_id:$(this).attr('data-id')},
                 function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
                $(document).on('click','.ubah-jabatan',function(e){
                e.preventDefault();
                $("#modal-ubah-jabatan").modal('show');
                 $(".modal-title").html('UBAH JABATAN');
                $.get("view/jabatan/jabatan_ubah.php",
                {id_jabatan:$(this).attr('data-id')},
                 function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
                $(document).on('click','.add-spl',function(e){
                e.preventDefault();
                $("#modal-spl").modal('show');
                 $(".modal-title").html('TAMBAH SURAT PERINTAH LEMBUR');
                $.get("view/splembur/sp_lembur_form.php",
                {id_mat:$(this).attr('data-id')},
                 function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
                $(document).on('click','.ubah-spl',function(e){
                e.preventDefault();
                $("#modal-ubah-spl").modal('show');
                 $(".modal-title").html('UBAH SURAT PERINTAH LEMBUR');
                $.get("view/splembur/sp_lembur_ubah.php",
                {id_spl:$(this).attr('data-id')},
                 function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
            $(document).on('click','.add-karyawan-spl',function(e){
                e.preventDefault();
                $("#modal-add-spl").modal('show');
                 $(".modal-title").html('TAMBAH KARYAWAN LEMBUR');
                $.get("view/splembur/pilih.php",
                {id_spl:$(this).attr('data-id')},
                 function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
                $(document).on('click','.ubah-karyawan-spl',function(e){
                e.preventDefault();
                $("#modal-ubah-k-spl").modal('show');
                 $(".modal-title").html('UBAH KARYAWAN LEMBUR');
                $.get("view/splembur/pilih_ubah.php",
                {id:$(this).attr('data-id')},
                 function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
                $(document).on('click','.upload-gambar',function(e){
                e.preventDefault();
                $("#modal-upload-gambar").modal('show');
                 $(".modal-title").html('UPLOAD GAMBAR');
                $.get("view/gambar/gambar_form.php",
                {id_mat:$(this).attr('data-id')},
                 function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
                 $(document).on('click','.lihat-gambar',function(e){
                e.preventDefault();
                $("#modal-lihat-gambar").modal('show');
                 $(".modal-title").html('LIHAT GAMBAR');
                $.get("view/gambar/gambar_lihat.php",
                {id_mat:$(this).attr('data-id')},
                 function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });

                $(document).on('click','.add-generus',function(e){
                e.preventDefault();
                $("#modal-generus").modal('show');
                 $(".modal-title").html('FORM DATA GENERUS');
                $.get("view/generus/generus_form.php",
                {id_kelompok:$(this).attr('data-id')},
                 function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
                $(document).on('click','.ubah-generus',function(e){
                e.preventDefault();
                $("#modal-ubah-generus").modal('show');
                 $(".modal-title").html('UBAH DATA GENERUS');
                $.get("view/generus/generus_ubah.php",
                {nig:$(this).attr('data-id')},
                 function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
                 $(document).on('click','.detail-generus',function(e){
                e.preventDefault();
                $("#detail-generus").modal('show');
                 $(".modal-title").html('INFORMASI GENERUS');
                $.get("view/generus/generus_detile.php",
                {nig:$(this).attr('data-id')},
                 function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });  
         
        });