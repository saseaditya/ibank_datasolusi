<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/admin/img/tcp.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/admin/img/tcp.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> Halaman Update PIN </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/font-awesome.min.css') }}">
    <!-- CSS Files -->
    <link href="{{ asset('assets/admin/css/material-dashboard.css?v=2.1.0') }}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('assets/admin/demo/demo.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/admin/css/grid.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/admin/css/custom-template.css') }}" rel="stylesheet" />
    <style>
        .navbar p {
            display: inline-block;
            margin: 0;
            line-height: 21px;
            font-weight: inherit;
            font-size: inherit;
        }

        .card-profile .card-avatar {
            border: 2px solid #a51d1e;
            max-width: 100px !important;
            max-height: 100px !important;
            margin-top: -60px !important;
        }
    </style>
</head>
<body class="off-canvas-sidebar">
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top text-white">
    <div class="container">
        <div class="navbar-translate" onLoad="waktu()" style="width: 100%">
            <b> TIME : <p id="jam"></p> : <p id="menit"></p> : <p id="detik"></p>
            </b>
            <b style="float:right;">
                <p id="hari"></p> , <p id="tgl"></p>
                <p id="bulan"></p>
                <p id="taun"></p>
            </b>
        </div>
    </div>
</nav>
<!-- End Navbar -->
<div class="wrapper wrapper-full-page">
    <div class="page-header lock-page header-filter" style="background-image: url('../../assets/admin/img/backGroundImgURL.jpg')">
        <!--   you can change the color of the filter page using: data-color="blue | green | orange | red | purple" -->
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
                    <form id="LoginValidation" action="" method="POST">
                        <div class="card card-profile text-center card-hidden full-width">
                            <input type="hidden" id="cif" name="cif" value="{{session('cif')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            {{--                            <div class="card-header ">--}}
                            {{--                                <div class="card-avatar background-white padding-20">--}}
                            {{--                                    <a href="#pablo">--}}
                            {{--                                        <img class="img" src="{{ asset('assets/admin/img/tcp.png') }}">--}}
                            {{--                                    </a>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            <div class="card-body ">
                                <h4>
                                    <p class="card-title text-center bold">Update PIN</p>
                                </h4>
                                <div class="row">
                                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 no-padding-right xs-hide">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text">
                                            <i class="material-icons margin-top-15">person</i>
                                          </span>
                                        </div>
                                    </div>
                                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                        <div class="form-group">
                                            <label for="exampleText" class="bmd-label-floating"> PIN Lama *</label>
                                            <input type="text" class="form-control" id="txtOldPin" required="true" name="txtOldPin" maxlength="6">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 no-padding-right xs-hide">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text">
                                            <i class="material-icons margin-top-15">lock_outline</i>
                                          </span>
                                        </div>
                                    </div>
                                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                        <div class="form-group">
                                            <label for="examplePassword" class="bmd-label-floating"> PIN Baru *</label>
                                            <input type="password" class="form-control" id="txtNewPin" required="true" name="txtNewPin" maxlength="6">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 no-padding-right xs-hide">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text">
                                            <i class="material-icons margin-top-15">lock_outline</i>
                                          </span>
                                        </div>
                                    </div>
                                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                        <div class="form-group">
                                            <label for="examplePassword" class="bmd-label-floating"> Konfimasi PIN *</label>
                                            <input type="password" class="form-control" id="txtNewPin2" required="true" name="txtNewPin2" maxlength="6">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p id="errorMessage" style="color: red; display: none;"></p>
                            <div class="card-footer justify-content-center no-padding-top">
                                <a href="{{ route('prosesLogout') }}" class="btn btn-info">Batal / Exit</a>
                                <button type="submit" class="btn btn-primary-red">Update PIN</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container">
                <div class="copyright float-right"> &copy; <script>
                        document.write(new Date().getFullYear())
                    </script>, Designed by <a href="https://www.instagram.com/sase_aditya/">Sase Aditya.</a>
                </div>
            </div>
        </footer>
    </div>
</div>
<!--   Core JS Files   -->
<script src="{{ asset('assets/admin/js/core/jquery.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/core/popper.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/core/bootstrap-material-design.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
<!-- Plugin for the momentJs  -->
<script src="{{ asset('assets/admin/js/plugins/moment.min.js') }}"></script>
<!--  Plugin for Sweet Alert -->
<script src="{{ asset('assets/admin/js/plugins/sweetalert2.js') }}"></script>
<!-- Forms Validations Plugin -->
<script src="{{ asset('assets/admin/js/plugins/jquery.validate.min.js') }}"></script>
<!-- Chartist JS -->
<script src="{{ asset('assets/admin/js/plugins/chartist.min.js') }}"></script>
<!--  Notifications Plugin    -->
<script src="{{ asset('assets/admin/js/plugins/bootstrap-notify.js') }}"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('assets/admin/js/material-dashboard.js?v=2.1.0') }}" type="text/javascript"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="{{ asset('assets/admin/demo/demo.js') }}"></script>
<script>
    window.setTimeout("waktu()", 1000);

    function waktu() {
        var tanggal = new Date();
        setTimeout("waktu()", 1000);
        document.getElementById("jam").innerHTML = tanggal.getHours();
        document.getElementById("menit").innerHTML = tanggal.getMinutes();
        document.getElementById("detik").innerHTML = tanggal.getSeconds();
        var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        var myDays = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
        var date = new Date();
        var day = date.getDate();
        var month = date.getMonth();
        var thisDay = date.getDay(),
            thisDay = myDays[thisDay];
        var yy = date.getYear();
        var year = (yy < 1000) ? yy + 1900 : yy;
        document.getElementById("tgl").innerHTML = date.getDate();
        document.getElementById("bulan").innerHTML = months[month];
        document.getElementById("hari").innerHTML = thisDay;
        document.getElementById("taun").innerHTML = year;
    }
</script>
<script>
    $(document).ready(function() {
        md.checkFullPageBackgroundImage();
        setTimeout(function() {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#LoginValidation").submit(function(event) {
            event.preventDefault();
            var isValid = true;
            var user = $('#txtOldPin').val();
            var pass = $('#txtNewPin').val();
            if (user == "" || pass == "") {
                isValid = false;
            }
            console.log(isValid)
            if (isValid) {
                tryLogin();
            } else {}
        });

        function validatePin() {
            let newPin = $("#txtNewPin").val();
            let confirmPin = $("#txtNewPin2").val();
            let errorMessage = $("#errorMessage");
            let submitButton = $("#LoginValidation button[type='submit']");

            // Validasi panjang PIN
            if (newPin.length != 6) {
                errorMessage.text("PIN harus terdiri dari 6 digit.").show();
                submitButton.prop("disabled", true);
                return;
            }

            if (confirmPin !== "" && newPin !== confirmPin) {
                errorMessage.text("PIN dan Konfirmasi PIN tidak cocok.").show();
                submitButton.prop("disabled", true);
            } else {
                errorMessage.hide();
                submitButton.prop("disabled", false);
            }
            // Validasi kesesuaian PIN dan Konfirmasi PIN
        }

        // Event untuk validasi saat mengetik di input "Konfirmasi PIN"
        $("#txtNewPin2").on("input", function () {
            validatePin();
        });

        // Event untuk validasi saat mengetik di input "PIN Baru"
        $("#txtNewPin").on("input", function () {
            validatePin();
        });
    });
</script>
<script>



    function tryLogin() {
        var oldPin = $('#txtOldPin').val();
        var newPin = $('#txtNewPin').val();
        var confirmPin = $('#txtNewPin2').val();
        var cif = $('#cif').val();


        $.ajax({
            type: "POST",
            url: "{{ route('UpdatePinNasabah') }}",
            data: {
                'txtOldPin': oldPin,
                'txtNewPin': confirmPin
            },
            success: function(response) {
                if (response != "Failed") {
                    swal({
                        title: "Update PIN Berhasil",
                        text: "Have a nice day!",
                        buttonsStyling: false,
                        confirmButtonClass: "btn btn-success",
                        type: "success"
                    }).catch(swal.noop).then((value) => {
                        window.location = ('./home');
                    });
                } else {
                    swal({
                        title: "Oops!",
                        text: "Gagal Update PIN!",
                        buttonsStyling: false,
                        confirmButtonClass: "btn btn-success",
                        type: "error"
                    }).catch(swal.noop);
                }
            }
        });
    }

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
    $(document).ready(function() {
        setFormValidation('#LoginValidation');
    });
</script>
</body>
</html>
