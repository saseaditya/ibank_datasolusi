<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/logo/logobank.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/logo/logobank.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <title>Halaman Update PIN</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-b from-white to-blue-900 flex items-center justify-center min-h-screen">

<div class="row">
    <div class="w-50 max-w-md p-6 bg-white rounded-2xl shadow-lg" style="margin-left:10px;margin-right: 10px;">
        <div class="flex justify-center mb-6">
            <h1 class="text-3xl font-bold text-indigo-700"><img class="img-logo" src="{{ asset('assets/logo/logobank.png') }}"></h1>
        </div>
        <h2 class="text-center text-lg font-semibold mb-4">Update PIN</h2>
        <form id="LoginValidation" action="" method="">
            <label class="block mb-2 text-sm font-medium text-gray-700">PIN Lama *</label>
            <input type="password" placeholder="Masukan PIN Lama..." class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-indigo-400 outline-none mb-4" id="txtOldPin"  name="txtOldPin" maxlength="6" required>

            <label class="block mb-2 text-sm font-medium text-gray-700">PIN Baru *</label>
            <input type="password" placeholder="Masukkan PIN Baru..." class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-indigo-400 outline-none mb-4" id="txtNewPin"  name="txtNewPin" maxlength="6" required>

            <label class="block mb-2 text-sm font-medium text-gray-700">Konfimasi PIN *</label>
            <input type="password" placeholder="Konfirmasi PIN..." class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-indigo-400 outline-none mb-2" id="txtNewPin2"  name="txtNewPin2" maxlength="6" required>

            <p id="errorMessage" style="color: red; display: none;"></p>

            <button type="submit" class="w-full p-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 mt-5">Update PIN</button>

        </form>
        <a href="{{ route('prosesLogout') }}">
            <button class="w-full p-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 mt-2">Batal / Exit </button>
        </a>
{{--        <p class="text-center text-xs text-gray-500 mt-4">Belum Punya PIN ? <a href="#" class="text-indigo-600 hover:underline" onclick="RequestPIN()">Minta PIN</a></p>--}}
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
            tryLogin();
            if (isValid) {
            } else {

            }
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
