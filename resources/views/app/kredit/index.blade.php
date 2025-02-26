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
                        <div class="col-md-10 col-sm-10 col-10">
                            <div class="card-icon">
                                <i class="material-icons">assignment</i>
                            </div>
                            <h4 class="card-title">Daftar Pengajuan Kredit</h4>
                        </div>
                        <div class="col-md-2 col-sm-2 col-2">
                            <button type="button" class="btn btn-info padding-5 margin-top-15" data-toggle="modal" data-target="#modalKredit" id="btnAddNew" style="float: right;">
                              <i class="material-icons">add</i>
{{--                              Tambah--}}
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('app.kredit.table')
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
@endsection
@section('additionalCSS')
<style type="text/css">
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
