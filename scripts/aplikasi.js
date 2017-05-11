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
                $(document).on('click','.baca-laporan-private',function(e){
                e.preventDefault();
                $("#modal-baca-private").modal('show');
                 $(".modal-title").html('NOTULEN MUSYAWARAH');
                $.get("view/detail/detail_private.php",
                {id_lap:$(this).attr('data-id')},
                 function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
                $(document).on('click','.baca-laporan',function(e){
                e.preventDefault();
                $("#modal-baca-notulen").modal('show');
                 $(".modal-title").html('NOTULEN MUSYAWARAH');
                $.get("view/detail/detail_desa.php",
                {id_lap:$(this).attr('data-id')},
                 function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
                $(document).on('click','.add-harga',function(e){
                e.preventDefault();
                $("#modal-harga").modal('show');
                 $(".modal-title").html('TAMBAH HARGA');
                $.get("view/harga/harga_form.php",
                {id_mat:$(this).attr('data-id')},
                 function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
                $(document).on('click','.detail-harga',function(e){
                e.preventDefault();
                $("#modal-detail-harga").modal('show');
                 $(".modal-title").html('DETAIL HARGA');
                $.get("view/harga/harga_lihat.php",
                {id_mat:$(this).attr('data-id')},
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