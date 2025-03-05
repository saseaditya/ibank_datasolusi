<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/logo/logobank.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/logo/logobank.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <title>Halaman Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-b from-white to-blue-900 flex items-center justify-center min-h-screen">
{{--<div class="absolute top-5 right-5 flex items-center space-x-2">--}}
{{--    <div class="w-4 h-4 bg-red-600 rounded-full"></div>--}}
{{--    <span class="text-gray-700 font-medium">Indonesia</span>--}}
{{--</div>--}}
<div class="row">
    <div class="w-50 max-w-md p-6 bg-white rounded-2xl shadow-lg" style="margin-left:10px;margin-right: 10px;">
        <div class="flex justify-center mb-6">
            <h1 class="text-3xl font-bold text-indigo-700"><img class="img-logo" src="{{ asset('assets/logo/logobank.png') }}"></h1>
        </div>
        <h2 class="text-center text-lg font-semibold mb-4">Masuk Akun</h2>
        <form id="LoginValidation" action="" method="">
            <label class="block mb-2 text-sm font-medium text-gray-700">No. KTP *</label>
            <input type="text" placeholder="Masukkan no. KTP Anda" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-indigo-400 outline-none mb-4" id="username" name="username" maxlength="16" required>

            <label class="block mb-2 text-sm font-medium text-gray-700">PIN *</label>
            <input type="password" placeholder="Masukkan PIN" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-indigo-400 outline-none mb-2" id="password" name="password" maxlength="6" required>

{{--            <hr>--}}
{{--            <a href="#" class="text-sm text-indigo-600 hover:underline float-right mb-4"> </a>--}}

            <button type="submit" class="w-full p-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 mt-5">Masuk</button>
        </form>
        <p class="text-center text-xs text-gray-500 mt-4">Lupa / Belum Punya PIN ? <a href="#" class="text-indigo-600 hover:underline" onclick="RequestPIN()">Minta PIN</a></p>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                        // buttonsStyling: false,
                        // confirmButtonClass: "btn btn-success",
                        type: "success"
                    }).catch(swal.noop).then((value) => {
                        if (response.pin_ganti != 0) {
                            window.location = ('./home');
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
                                Swal.fire({
                                    title: 'Loading...',
                                    text: 'Mohon tunggu sebentar',
                                    allowOutsideClick: false,
                                    didOpen: () => {
                                        Swal.showLoading(); // Menampilkan loader
                                    }
                                });

                                $.ajax({
                                    type: "GET",
                                    url: "{{ route('RequestPINByWhatsApp') }}",
                                    data: {
                                        'ktp': user,
                                    },
                                    success: function (response) {
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Berhasil!',
                                            text: 'PIN telah di kirim ke Whatsapp'
                                        });
                                        // swal("Berhasil!", "PIN telah di kirim ke Whatsapp.", "success");
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
