@extends('app.include.master')

@section('title','Kredit')

@section('content')
    @include('app.kredit.modal')

<div class="content">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container-fluid">
  	<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon card-header-danger">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-12">
                            <div class="card-icon">
                                <i class="material-icons">assignment</i>
                            </div>
                            <h4 class="card-title">Daftar Pengajuan Kredit</h4>
                        </div>
{{--                        <div class="col-md-2 col-sm-2 col-2">--}}
{{--                            <button type="button" class="btn btn-info padding-5 margin-top-15" data-toggle="modal" data-target="#modalKredit" id="btnAddNew" style="float: right;">--}}
{{--                              <i class="material-icons">add</i>--}}
{{--                              Tambah--}}
{{--                            </button>--}}
{{--                        </div>--}}
                    </div>
                </div>
                <div class="card-body" data-toggle="modal" data-target="#modalKredit" id="btnAddNew">
                    @include('app.kredit.table')
                </div>
            </div>
        </div>
    </div>
  </div>
    <button type="button" class="floating-btn" data-toggle="modal" data-target="#modalKredit" id="btnAddNew" >
        <i class="fa-solid fa-plus"></i>
    </button>
</div>
@endsection
@section('additionalCSS')
<style type="text/css">
    .input-group-simple {
        display: flex;
        align-items: center;
        border: 1px solid #ced4da;
        border-radius: 5px;
        overflow: hidden;
        width: 100%;
        /*max-width: 400px; !* Atur lebar maksimal *!*/
        /*box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);*/
        /*border: 1px solid #ced4da; !* Warna border default *!*/
        /*border-radius: 5px; !* Sudut membulat *!*/
        box-shadow: none;
    }

    .input-group-simple input {
        border: none;
        padding: 10px 15@endsection;
        font-size: 16px;
        outline: none;
        flex: 1;
        color: #6c757d;
    }

    /* Styling untuk input */
    .input-group-simple .form-control-simple {
        border: 1px solid #ced4da;
        padding: 10px;
        font-size: 16px;
        transition: all 0.3s ease-in-out;
        box-shadow: none;
    }

    /* Efek saat input aktif */
    .input-group-simple .form-control-simple:focus {
        border-color: #80bdff;
        box-shadow: 0 0 4px rgba(128, 189, 255, 0.6);
    }

    /* Styling untuk input group prepend & append */
    .input-group-text-simple {
        background-color: #f1f3f5;
        padding: 8px 12px;
        border-right: 1px solid #ced4da;
        font-size: 16px;
        color: #6c757d;
        display: flex;
        align-items: center;
    }

    /* Efek hover pada icon atau button dalam input group */
    .input-group-text-simple:hover {
        background-color: #e9ecef;
    }

    .input-group-text-simple .input-group-text-simple:last-child {
        border-left: 1px solid #ced4da;
        border-right: none;
    }

    /* Styling dasar untuk select */
    .form-select {
        border: 1px solid #ced4da; /* Warna border default */
        border-radius: 5px; /* Sudut membulat */
        padding: 10px;
        width: 100%;
        display: block;
        font-size: 16px;
        transition: all 0.3s ease-in-out;
        box-shadow: none;
    }

    /* Efek saat select diklik (fokus) */
    .form-select:focus {
        border-color: #80bdff;
        outline: 0;
        box-shadow: 0 0 4px rgba(128, 189, 255, 0.6);
    }

    /* Styling dasar untuk input */
    .form-control-simple {
        border: 1px solid #ced4da; /* Warna border default */
        border-radius: 5px; /* Sudut membulat */
        padding: 10px 15px;
        width: 100%;
        display: block;
        font-size: 16px;
        transition: all 0.3s ease-in-out;
        box-shadow: none;
    }

    /* Efek saat input diklik (fokus) */
    .form-control-simple:focus {
        border-color: #80bdff;
        outline: 0;
        box-shadow: 0 0 4px rgba(128, 189, 255, 0.6);
    }

    /* Placeholder style */
    .form-control-simple::placeholder {
        color: #aaa;
        font-style: normal;
    }

    /* Styling untuk label */
    .form-label-simple {
        font-weight: bold;
        color: #333;
        font-size: 14px;
    }

    /* Styling tambahan untuk keterangan kecil */
    .form-text-simple {
        font-size: 12px;
        color: #6c757d;
    }
    /*body {*/
    /*    font-family: Arial, sans-serif;*/
    /*    margin: 0;*/
    /*    padding: 0;*/
    /*    height: 100vh;*/
    /*    display: flex;*/
    /*    justify-content: center;*/
    /*    align-items: center;*/
    /*    background-color: #f5f5f5;*/
    /*}*/

    .floating-btn {
        position: fixed;
        bottom: 20px;
        right: 20px;
        background: rgb(2,0,36);
        background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(66,66,245,1) 0%, rgba(62,67,214,1) 20%, rgba(0,212,255,1) 100%);
        color: white;
        border: none;
        border-radius: 50%;
        width: 65px;
        height: 65px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 28px;
        box-shadow: rgb(0 0 0 / 51%) 0px 7px 29px 0px;
        cursor: pointer;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .floating-btn:hover {
        transform: scale(1.15);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

    .floating-btn:active {
        transform: scale(1);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .floating-btn i {
        animation: pulse 1.5s infinite;
    }

    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.2); }
        100% { transform: scale(1); }
    }

    table.dataTables thead th {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    table.dataTables tbody td {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .dataTables_wrapper {
        width: 100%;
        overflow-x: auto;
    }
</style>
@endsection
@section('additionalJS')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">

    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        function setFormValidation(id) {
            $(id).validate({
                highlight: function(element) {
                    $(element).closest('.form-group').removeClass('has-success').addClass('has-danger');
                    $(element).closest('.form-check').removeClass('has-success').addClass('has-danger');
                },
                success: function(element) {
                    $(element).closest('.form-group').removeClass('has-danger').addClass('has-success');
                    $(element).closest('.form-check').removeClass('has-danger').addClass('has-success');
                },
                errorPlacement: function(error, element) {
                    $(element).closest('.form-group').append(error);
                },
            });
        }
        setFormValidation('#formKredit');

        $("#formKredit").submit(function(event) {
            event.preventDefault();
            let formData = $("#formKredit").serializeArray();
            var isValid = true;
            $.each(formData, function (i, field) {
                // console.log(field.value)
                if(field.value == ""){
                    isValid = false
                }
            });
            console.log(isValid);
            if (isValid) {
                Swal.fire({
                    title: "Masukkan PIN",
                    input: "password",
                    inputAttributes: {
                        maxlength: "6",
                        autocapitalize: "off",
                        autocorrect: "off"
                    },
                    showCancelButton: true,
                    confirmButtonText: "Submit",
                    preConfirm: (pin) => {
                        if(pin != {{session('pin')}}){
                            Swal.showValidationMessage('PIN Salah!');
                        }

                        if (!pin) {
                            Swal.showValidationMessage("PIN tidak boleh kosong!");
                        }
                        return pin; // Mengembalikan nilai PIN
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        let pin = result.value; // Ambil PIN yang dimasukkan

                        // Kirim data ke server dengan AJAX
                        $.ajax({
                            url: "{{route('CreatePengajuanKredit')}}",
                            type: "POST",
                            data: formData, // Tambahkan PIN ke data
                            headers: {
                                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                            },
                            success: function (response) {
                                Swal.fire({
                                    title: "Berhasil!",
                                    text: "Data berhasil dikirim.",
                                    icon: "success",
                                    confirmButtonText: "OK"
                                }).then(() => {
                                    location.reload(); // Refresh halaman setelah klik OK
                                });
                            },
                            error: function () {
                                Swal.fire("Oops!", "Terjadi kesalahan.", "error");
                            }
                        });
                    }
                });
            } else {}
        });

    })

    function checkPin() {
        Swal.fire({
            title: 'Masukkan PIN Anda',
            input: 'password',
            inputPlaceholder: 'Masukan PIN...',
            confirmButtonText: 'Submit',
            showCancelButton: true,
            preConfirm: (value) => {
                if(value != {{session('pin')}}){
                    Swal.showValidationMessage('PIN Salah!');
                }

                {{--if(value){--}}
                {{--    $.ajax({--}}
                {{--        type: "POST",--}}
                {{--        url: "{{ route('CheckPIN') }}",--}}
                {{--        data: {--}}
                {{--            'pin': value--}}
                {{--        },--}}
                {{--        headers: {--}}
                {{--            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")--}}
                {{--        },--}}
                {{--        success: function(response) {--}}
                {{--            console.log(response)--}}
                {{--            if (response == "false") {--}}
                {{--                Swal.showValidationMessage('PIN salah!');--}}
                {{--            }else{--}}
                {{--                return value;--}}
                {{--            }--}}
                {{--        },--}}
                {{--        error: function () {--}}
                {{--            Swal.showValidationMessage('Server Error!');--}}
                {{--        }--}}
                {{--    });--}}
                {{--}--}}


                if (!value) {
                    Swal.showValidationMessage('PIN Tidak boleh kosong!');
                }


                return value;



            }
        }).then((result) => {
            if (result.isConfirmed) {
                console.log('PIN Benar!');
                $("#formKredit").submit(function (event) {
                    event.preventDefault(); // Mencegah reload halaman
                    let formData = $(this).serialize(); // Mengambil semua data form

                    console.log("Data Form:", formData); // Debugging
                });
            }
        });
    }
</script>
@endsection
