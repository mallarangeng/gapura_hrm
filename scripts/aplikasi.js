        $(function(){
               $(document).on('click','.add-karyawan',function(e){
                e.preventDefault();
                $("#modal-karyawan").modal('show');
                $(".modal-title").html('FORM DATA KARYAWAN');
                $.get("view/karyawan/karyawan_form.php",
                    {id_pelamar:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });


                $(document).on('click','.m-nilai',function(e){
                e.preventDefault();
                $("#modal-nilai").modal('show');
                $.get("view/ujian/nilai_ujian.php",
                {id_app:$(this).attr('data-id')},
                 function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });