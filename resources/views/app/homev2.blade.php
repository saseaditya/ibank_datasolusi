@extends('app.include.master')

@section('title','Home')

@section('content')

<div class="content">
    <body class="bg-blue-900 text-white font-sans">
    <div class="max-w-md mx-auto">
        <!-- Header -->
        <h2 class="text-lg font-semibold">HALO, <span class="font-bold">{{strtoupper(session('fullname'))}}</span></h2>

        <!-- Saldo Card -->
        <div class="bg-gradient-to-r from-teal-500 to-blue-400 p-4 rounded-xl ">
            <div class="flex justify-between items-center">
                <p class="text-sm">CIF Number: <span class="font-semibold">{{session('cif')}}</span></p>
{{--                <button class="bg-white text-blue-500 px-2 py-1 text-xs rounded">Lihat BCA ID</button>--}}
            </div>
            <div class="mt-2">
                <p class="text-sm">Total Rekening :</p>
                <p class="text-2xl font-bold">{{$totalRek}} Rekening</p>
            </div>
            <br>
            <div class="swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="{{asset("assets/logo/gambar1.png")}}" alt="Image 1"></div>
                    <div class="swiper-slide"><img src="{{asset("assets/logo/gambar2.png")}}" alt="Image 2"></div>
                    <div class="swiper-slide"><img src="{{asset("assets/logo/gambar3.png")}}" alt="Image 3"></div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
{{--            <a href="{{route('viewDashboard')}}">--}}
{{--                <button class="mt-4 w-full bg-blue-700 text-white py-2 rounded">Daftar Rekening</button>--}}
{{--            </a>--}}

        </div>

        <!-- Menu Icons -->
        <div class="bg-white text-black rounded-xl mt-4 p-4" >
            <h3 class="text-blue-500 font-semibold text-sm">Home</h3>
            <div class="grid grid-cols-3 gap-4 mt-4">
                <a href="{{route('viewDashboard')}}">
                    <div class="flex flex-col items-center text-center">
                        <img src="{{asset("assets/icon/menu/daftar_rekening-removebg-preview.png")}}" >
                        {{--                    <p class="text-xs mt-2">Transfer</p>--}}
                    </div>
                </a>
                <a href="{{route("viewMasterPengajuanKredit")}}">
                    <div class="flex flex-col items-center text-center">
                        <img src="{{asset("assets/icon/menu/pengajuan_kredit-removebg-preview.png")}}" >
    {{--                    <p class="text-xs mt-2">Bayar & Isi Ulang</p>--}}
                    </div>
                </a>
                <a href="{{route('viewMasterVA')}}">
                    <div class="flex flex-col items-center text-center">
                        <img src="{{asset("assets/icon/menu/virtual_accoun-removebg-preview.png")}}" >
    {{--                    <p class="text-xs mt-2">Welma</p>--}}
                    </div>
                </a>
                <a href="{{route('viewMasterFeedback')}}">
                    <div class="flex flex-col items-center text-center">
                        <img src="{{asset("assets/icon/menu/saran-removebg-preview.png")}}" >
    {{--                    <p class="text-xs mt-2">Lifestyle</p>--}}
                    </div>
                </a>
                <a href="{{route('viewUpdatePin')}}">
                    <div class="flex flex-col items-center text-center">
                        <img src="{{asset("assets/icon/menu/pin-removebg-preview.png")}}" >
    {{--                    <p class="text-xs mt-2">Flazz</p>--}}
                    </div>
                </a>
                <a href="#" data-toggle="modal" data-target="#myModal10">
                    <div class="flex flex-col items-center text-center">
                        <img src="{{asset("assets/icon/menu/exit-removebg-preview.png")}}" >
    {{--                    <p class="text-xs mt-2">Cardless</p>--}}
                    </div>
                </a>
            </div>
        </div>
    </div>
    </body>
{{--    <div class="container-fluid">--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-12" style="padding-right: 0px!important;padding-left: 0px!important;">--}}
{{--                <div class="card">--}}
{{--                    <div class="body-menu">--}}
{{--                        <div class="container-menu">--}}
{{--                            <div class="profile">--}}
{{--                                <img src="profile.jpg" alt="Profile">--}}
{{--                                <div>--}}
{{--                                    <h3>Aditya Putra Anugerah</h3>--}}
{{--                                    <p>Web Programmer</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="clock">--}}
{{--                                <div>--}}
{{--                                    <p>Clock In</p>--}}
{{--                                    <p>-</p>--}}
{{--                                </div>--}}
{{--                                <div>--}}
{{--                                    <p>Clock Out</p>--}}
{{--                                    <p>-</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="menu-image row">--}}
{{--                                <div class="col-3">--}}
{{--                                    <img src="{{asset("assets/icon/menu/daftar_rekening-removebg-preview.png")}}" >--}}
{{--                                    <div>Daftar Rekening</div>--}}
{{--                                </div>--}}
{{--                                <div class="col-3">--}}
{{--                                    <img src="{{asset("assets/icon/menu/pengajuan_kredit-removebg-preview.png")}}" >--}}
{{--                                </div>--}}
{{--                                <div class="col-3">--}}
{{--                                    <img src="{{asset("assets/icon/menu/virtual_accoun-removebg-preview.png")}}" >--}}
{{--                                </div>--}}
{{--                                <div class="col-3">--}}
{{--                                    <img src="{{asset("assets/icon/menu/saran-removebg-preview.png")}}" >--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="menu-image row">--}}
{{--                                <div class="col-3">--}}
{{--                                    <img src="{{asset("assets/icon/menu/pin-removebg-preview.png")}}" >--}}
{{--                                    --}}{{--                                    <div>Daftar Rekening</div>--}}
{{--                                </div>--}}
{{--                                <div class="col-3">--}}
{{--                                    <img src="{{asset("assets/icon/menu/exit-removebg-preview.png")}}" >--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
</div>

@endsection
@section('additionalCSS')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <style type="text/css">
        .swiper {
            /*margin-left: -15px;*/
            margin-bottom: -15px;
            width: 100%;
            height: 150px;
            border-radius: 10px;
            overflow: hidden;
            border-radius: 10px;
            overflow: hidden;
        }
        .swiper-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
        }

        .body-menu {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container-menu {
            /*background: rgb(255,255,255);*/
            /*background: linear-gradient(0deg, rgba(255,255,255,1) 50%, rgba(66,66,245,1) 56%, rgba(0,212,255,1) 73%);*/
            background: white;
            width: 100%;
            border-radius: 15px;
            padding: 20px;
            text-align: center;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .profile img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }
        .clock {
            display: flex;
            justify-content: space-between;
            padding: 15px 0;
            background: #eee;
            border-radius: 10px;
            margin: 20px 0;
        }
        .clock div {
            flex: 1;
            text-align: center;
        }
        .menu {
            /*display: grid;*/
            /*grid-template-columns: repeat(3, 1fr);*/
            /*gap: 10px;*/
        }
        .menu div {
            /*background: #eef;*/
            /*padding: 15px;*/
            /*border-radius: 10px;*/
            /*font-size: 14px;*/
            /*display: flex;*/
            /*justify-content: center;*/
            /*align-items: center;*/
            /*font-size: 8px;*/
        }
        .menu-image img {
            width: 80px;
            height:80px;
            margin-bottom: 15px;
            margin-left: -13px;
        }
    </style>
@endsection
@section('additionalJS')
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script type="text/javascript">
        const swiper = new Swiper('.swiper', {
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            autoplay: {
                delay: 3000,
            },
        });
    </script>
@endsection
