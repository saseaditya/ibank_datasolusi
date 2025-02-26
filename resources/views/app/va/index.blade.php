@extends('app.include.master')

@section('title','List Virtual Account')

@section('content')

<div class="content">
  <div class="container-fluid">
  	<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon card-header-danger">
                    <div class="card-icon">
                        <i class="material-icons">list</i>
                    </div>
                    <h4 class="card-title">Virtual Account</h4>
                </div>
                <div class="card-body">
                    <hr>
                    <table class="va">
                        <tr>
                            <th>No.Rek.Tabungan : {{$data->norekening}}  {{$data->produk}}</th>
                        </tr>
                        <tr>
                            <td class="bank-logo"><img src="{{ asset('assets/logo/bca.bmp') }}" alt="BCA"> {{$data->va_bca}}</td>
                        </tr>
                        <tr>
                            <td class="bank-logo"><img src="{{ asset('assets/logo/mandiri.bmp') }}" alt="Mandiri"> {{$data->va_mandiri}}</td>
                        </tr>
                        <tr>
                            <td class="bank-logo"><img src="{{ asset('assets/logo/bsi.bmp') }}" alt="BSI"> </td>
                        </tr>
                        <tr>
                            <td class="bank-logo"><img src="{{ asset('assets/logo/bri.bmp') }}" alt="BRI"> {{$data->va_bri}}</td>
                        </tr>
                        <tr>
                            <td class="bank-logo"><img src="{{ asset('assets/logo/cimb.bmp') }}" alt="CIMB"> {{$data->va_cimb}}</td>
                        </tr>
                        <tr>
                            <td class="bank-logo"><img src="{{ asset('assets/logo/permata.bmp') }}" alt="Permata"> {{$data->va_permata}}</td>
                        </tr>
                        <tr>
                            <td class="bank-logo"><img src="{{ asset('assets/logo/bni.bmp') }}" alt="BNI"> {{$data->va_bni}}</td>
                        </tr>
                    </table>
                    <hr>
{{--                    <br>--}}
                    <h4 class="card-title">Note :</h4>
                    <p class="card-category">Dengan Virtual Account Bank Anda dapat melakukan penyetoran Tabungan dari gerai
                        bank-bank terkait atau melalui aplikasi mobile banking.
                        Apabila Anda belum memiliki nomor Virtual Account silakan hubungi kami.
                    </p>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
@endsection
@section('additionalCSS')
<style type="text/css">
    .va {
        width: 100%;
        border-collapse: collapse;
        text-align: left;
    }
    th, td {
        border: 1px solid #ddd;
        padding: 10px;
    }
    th {
        background-color: #f4f4f4;
    }
    td img {
        height: 30px;
        vertical-align: middle;
        margin-right: 10px;
    }
    .bank-logo {
        display: flex;
        align-items: center;
    }
</style>
@endsection
@section('additionalJS')
<script type="text/javascript">
    $(document).ready(function() {


    })
</script>
@endsection
