@extends('app.include.master')

@section('title','Home')

@section('content')

<div class="content">
{{--    <div class="container-fluid">--}}
        <div class="">
{{--            <div class="page-header">--}}
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="card card-pricing">
                                <h6 class="card-category"> DAFTAR REKENING</h6>
                                <div class="card-body">
                                    <div class="card-icon icon-primary ">
                                        <i class="fas fa-money-check-alt fa-lg"></i>
                                    </div>
                                </div>
                                <div class="card-footer justify-content-center ">
                                    <a href="{{route('viewDashboard')}}" class="btn btn-round btn-primary-red">Lihat</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="card card-pricing">
                                <h6 class="card-category"> Pengajuan Kredit</h6>
                                <div class="card-body">
                                    <div class="card-icon icon-primary ">
                                        <i class="fas fa-file-invoice-dollar fa-lg"></i>
                                    </div>
                                </div>
                                <div class="card-footer justify-content-center ">
                                    <a href="{{route("viewMasterPengajuanKredit")}}" class="btn btn-round btn-primary-red">Lihat</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="card card-pricing">
                                <h6 class="card-category"> Virtual Account</h6>
                                <div class="card-body">
                                    <div class="card-icon icon-primary ">
                                        <i class="fas fa-receipt fa-lg"></i>
                                    </div>
                                </div>
                                <div class="card-footer justify-content-center ">
                                    <a href="{{route('viewMasterVA')}}" class="btn btn-round btn-primary-red">Lihat</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="card card-pricing">
                                <h6 class="card-category"> Saran & Keluhan</h6>
                                <div class="card-body">
                                    <div class="card-icon icon-primary ">
                                        <i class="fa-solid fa-comments fa-2xl"></i>
                                    </div>
                                </div>
                                <div class="card-footer justify-content-center ">
                                    <a href="{{route('viewMasterFeedback')}}" class="btn btn-round btn-primary-red">Lihat</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="card card-pricing">
                                <h6 class="card-category"> Ganti PIN</h6>
                                <div class="card-body">
                                    <div class="card-icon icon-primary ">
                                        <i class="fa-solid fa-user-lock fa-2xl"></i>
                                    </div>
                                </div>
                                <div class="card-footer justify-content-center ">
                                    <a href="{{route('viewUpdatePin')}}" class="btn btn-round btn-primary-red">Lihat</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="card card-pricing">
                                <h6 class="card-category"> Exit</h6>
                                <div class="card-body">
                                    <div class="card-icon icon-primary ">
                                        <i class="material-icons">power_settings_new</i>
                                    </div>
                                </div>
                                <div class="card-footer justify-content-center ">
                                    <a href="#" data-toggle="modal" data-target="#myModal10" class="btn btn-round btn-primary-red">Exit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
{{--            </div>--}}
        </div>
{{--    </div>--}}
</div>

@endsection
@section('additionalCSS')
    <style type="text/css">
        h6 {
            font-size: medium;
        }
    </style>
@endsection
@section('additionalJS')
    <script type="text/javascript">
    </script>
@endsection
