<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/logo/logodrb.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/logo/logodrb.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title> Halaman Login </title>
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
            border: 1px solid #a51d1e;
            max-width: 260px !important;
            max-height: 100px !important;
            margin-top: -60px !important;
        }

        .container-img {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .img-logo {
            max-width: 100%;
            height: auto;
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
                    <form id="LoginValidation" action="" method="">
                        <div class="card card-profile text-center card-hidden full-width">
                            <div class="card-header">
                                <div class="card-avatar background-white card-header-lgrey padding-20">
                                    <div class="container-img">
                                        <img class="img-logo" src="{{ asset('assets/logo/logodrb.png') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body ">
{{--                                <div class="container-img">--}}
{{--                                    <img class="img-logo" src="{{ asset('assets/logo/logodrb.png') }}">--}}
{{--                                </div>--}}
                                <h4>
                                    <p class="card-title text-center bold">Login Page</p>
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
                                            <label for="exampleText" class="bmd-label-floating"> No. KTP *</label>
                                            <input type="text" class="form-control" id="username" required="true" name="username" maxlength="16">
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
                                            <label for="examplePassword" class="bmd-label-floating"> PIN *</label>
                                            <input type="password" class="form-control" id="password" required="true" name="password" maxlength="6">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer justify-content-center no-padding-top">
                                <button type="submit" class="btn btn-primary-red">Login</button>
                            </div>
                            <div class="row">
                                <div class="col-md-12 justify-content-center mb-1">
                                    <div class="form-check">
                                        <label class="">
                                            Belum punya PIN ?
                                            <a href="#" onclick="RequestPIN()">Minta PIN</a>.
                                        </label>
                                    </div>
                                </div>
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
                    </script>, Designed by <a href="https://www.instagram.com/sase_aditya/">PT. Datasolusi Cipta Piranti</a>
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
    // function requestLocation() {
    //     if (!("geolocation" in navigator)) {
    //         alert("Browser Anda tidak mendukung Geolocation.");
    //         return;
    //     }
    //
    //     navigator.geolocation.getCurrentPosition(
    //         (position) => {
    //             console.log("Latitude:", position.coords.latitude);
    //             console.log("Longitude:", position.coords.longitude);
    //             alert("Lokasi berhasil diaktifkan!");
    //         },
    //         (error) => {
    //             if (error.code === error.PERMISSION_DENIED) {
    //                 alert("Akses lokasi ditolak! Harap aktifkan lokasi untuk melanjutkan.");
    //
    //                 // Coba minta izin ulang setelah 3 detik
    //                 setTimeout(requestLocation, 3000);
    //             } else {
    //                 alert("Gagal mendapatkan lokasi: " + error.message);
    //
    //                 // Coba lagi setelah 3 detik jika bukan karena ditolak
    //                 setTimeout(requestLocation, 3000);
    //             }
    //         }
    //     );
    // }
    //
    // // Jalankan saat halaman dimuat atau tombol diklik
    // requestLocation();

    // async function requestLocationPermission() {
    //     if (!("geolocation" in navigator)) {
    //         alert("Browser Anda tidak mendukung Geolocation.");
    //         return;
    //     }
    //
    //     try {
    //         let permission = await navigator.permissions.query({ name: "geolocation" });
    //
    //         if (permission.state === "granted") {
    //             // Jika izin sudah diberikan sebelumnya, langsung ambil lokasi
    //             getLocation();
    //         } else if (permission.state === "prompt") {
    //             // Jika izin masih belum ditentukan, minta izin lokasi
    //             navigator.geolocation.getCurrentPosition(
    //                 (position) => {
    //                     console.log("Latitude:", position.coords.latitude);
    //                     console.log("Longitude:", position.coords.longitude);
    //                     alert("Lokasi berhasil diaktifkan!");
    //                 },
    //                 (error) => {
    //                     alert("Gagal mendapatkan lokasi: " + error.message);
    //                 }
    //             );
    //         } else if (permission.state === "denied") {
    //             // Jika izin ditolak, berikan instruksi untuk mengaktifkannya
    //             alert("Anda telah menolak akses lokasi. Silakan aktifkan secara manual di pengaturan browser.");
    //         }
    //     } catch (error) {
    //         console.error("Error saat meminta izin lokasi:", error);
    //     }
    // }
    //
    // // Fungsi untuk mengambil lokasi
    // function getLocation() {
    //     navigator.geolocation.getCurrentPosition(
    //         (position) => {
    //             console.log("Latitude:", position.coords.latitude);
    //             console.log("Longitude:", position.coords.longitude);
    //         },
    //         (error) => {
    //             alert("Gagal mendapatkan lokasi: " + error.message);
    //         }
    //     );
    // }
    //
    // // Panggil fungsi saat tombol diklik atau halaman dimuat
    // requestLocationPermission();

    // function requestLocation() {
    //     if ("geolocation" in navigator) {
    //         navigator.geolocation.getCurrentPosition(
    //             function (position) {
    //                 let latitude = position.coords.latitude;
    //                 let longitude = position.coords.longitude;
    //                 console.log("Lokasi ditemukan: ", latitude, longitude);
    //                 alert("Lokasi berhasil diaktifkan!"); // Opsional: Beri tahu pengguna
    //             },
    //             function (error) {
    //                 if (error.code === error.PERMISSION_DENIED) {
    //                     alert("Lokasi dibutuhkan! Silakan aktifkan lokasi di pengaturan perangkat atau browser.");
    //
    //                     // Coba lagi setelah 3 detik
    //                     // setTimeout(requestLocation, 3000);
    //                 } else {
    //                     alert("Gagal mendapatkan lokasi: " + error.message);
    //
    //                     // Coba lagi setelah 3 detik
    //                     // setTimeout(requestLocation, 3000);
    //                 }
    //             }
    //         );
    //     } else {
    //         alert("Geolocation tidak didukung di browser ini.");
    //     }
    // }
    //
    // // Jalankan pertama kali saat halaman dimuat
    // requestLocation();

    $(document).ready(function() {
        md.checkFullPageBackgroundImage();
        setTimeout(function() {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700);
        $("#LoginValidation").submit(function(event) {
            event.preventDefault();
            var isValid = true;
            var user = $('#username').val();
            var pass = $('#password').val();
            if (user == "" || pass == "") {
                isValid = false;
            }
            if (isValid) {
                tryLogin();
            } else {}
        });
    });
</script>
<script>
    function tryLogin() {
        var user = $('#username').val();
        var pass = $('#password').val();
        $.ajax({
            type: "GET",
            url: "{{ route('prosesLogin') }}",
            data: {
                'ktp': user,
                'pin': pass
            },
            success: function(response) {
                if (response != "Failed") {
                    swal({
                        title: "Hello " + response.fullname,
                        text: "Have a nice day!",
                        buttonsStyling: false,
                        confirmButtonClass: "btn btn-success",
                        type: "success"
                    }).catch(swal.noop).then((value) => {
                        if (response.pin_ganti != 0) {
                            window.location = ('./dashboard');
                        }else{
                            window.location = ('./update_pin');
                        }
                    });
                } else {
                    swal({
                        title: "Oops!",
                        text: "No KTP / PIN Salah!",
                        buttonsStyling: false,
                        confirmButtonClass: "btn btn-success",
                        type: "error"
                    }).catch(swal.noop);
                }
            }
        });
    }

    function RequestPIN() {
        var user = $('#username').val();
        if (user == "" ) {
            swal({
                title: "Oops!",
                text: "Mohon masukan No KTP terlebih dahulu.",
                buttonsStyling: false,
                confirmButtonClass: "btn btn-success",
                type: "error"
            });
        }else {
            $.ajax({
                type: "GET",
                url: "{{ route('CheckUser') }}",
                data: {
                    'ktp': user,
                },
                success: function (response) {
                    if (response == "user not found") {
                        swal({
                            title: "Oops!",
                            text: "Data tidak di temukan! Mohon hubungi cusomer service. Terimakasih",
                            buttonsStyling: false,
                            confirmButtonClass: "btn btn-success",
                            type: "error"
                        });
                    } else {
                        var noHp = maskPhoneNumber(response.hp);
                        swal({
                            title: "PIN akan dikirim melalui whatsapp ke nomor :" + noHp,
                            text: "Apabila nomor tersebut bukan no HP anda, batalkan dan segera hubungi Customer Service Officer kami.",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: '#ea3729',
                            confirmButtonText: 'Lanjut',
                            cancelButtonText: 'Batal!',
                            reverseButtons: true
                        }).then((willConfirm) => {
                            if (willConfirm.value) {
                                $.ajax({
                                    type: "GET",
                                    url: "{{ route('RequestPINByWhatsApp') }}",
                                    data: {
                                        'ktp': user,
                                    },
                                    success: function (response) {
                                        swal("Berhasil!", "PIN telah di kirim ke Whatsapp.", "success");
                                        // if(response.status_code != 200) {
                                        // }else{
                                        //     swal("Gagal Kirim PIN!", "Whatsapp sedang bermasalah, coba lagi nanti!", "error");
                                        // }
                                    }
                                });
                            } else {
                                swal("Dibatalkan", "PIN Batal di kirim.", "error");
                            }
                        });
                    }
                }
            });
        }
    }

    function maskPhoneNumber(phoneNumber) {
        // return phoneNumber.slice(0, -4).replace(/\d/g, '*') + phoneNumber.slice(-4);
        return phoneNumber.replace(/\d(?=\d{4})/g, "*");
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
