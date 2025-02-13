@extends('app.include.master')

@section('title','Dasbor')

@section('content')
<div class="content">
  <div class="container-fluid">
  	<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon card-header-danger">
                    <div class="card-icon">
                        <i class="material-icons">perm_identity</i>
                    </div>
                    <h4 class="card-title">Profile</h4>
                </div>
                <div class="card-body">
                    <hr>

                    <div class="row">
                        <div class="col-3 col-sm-2 col-md-2 col-lg-2">
                            <h4 class="card-title"><b>CIF</b></h4>
                        </div>
                        <div class="col-1 col-sm-1 col-md-1 col-lg-1">
                            <h4 class="card-title">:</h4>
                        </div>
                        <div class="col-7 col-sm-7 col-md-8 col-lg-9">
                            <h4 class="card-title">{{$data->cif}}</h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3 col-sm-2 col-md-2 col-lg-2">
                            <h4 class="card-title"><b>Nama</b></h4>
                        </div>
                        <div class="col-1 col-sm-1 col-md-1 col-lg-1">
                            <h4 class="card-title">:</h4>
                        </div>
                        <div class="col-7 col-sm-7 col-md-8 col-lg-9">
                            <h4 class="card-title">{{ucwords(strtolower($data->nama))}}</h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3 col-sm-2 col-md-2 col-lg-2">
                            <h4 class="card-title"><b>Alamat</b></h4>
                        </div>
                        <div class="col-1 col-sm-1 col-md-1 col-lg-1">
                            <h4 class="card-title">:</h4>
                        </div>
                        <div class="col-7 col-sm-7 col-md-8 col-lg-9">
                            <h4 class="card-title">{{ucwords(strtolower($data->alamat))}}</h4>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
      @include('app.dashboard.tab_penjualan')
  </div>
</div>
@endsection
@section('additionalCSS')
<style type="text/css">

</style>
@endsection
@section('additionalJS')
<script type="text/javascript">
</script>
@endsection
