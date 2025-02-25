@extends('app.include.master')

@section('title','Kredit')

@section('content')
    @include('app.dashboard.modal')

<div class="content">
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
                            <button type="button" class="btn btn-info padding-5 margin-top-15" data-toggle="modal" data-target="#modalClient" id="btnAddNew" style="float: right;">
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

    #overlay-table {
        position: fixed;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.9); /* Warna background */
        /*display: flex;*/
        align-items: center;
        justify-content: center;
        top: 0;
        left: 0;
        z-index: 9999; /* Pastikan di atas elemen lain */
        display: none;
    }

    /* Animasi Spinner */
    .loader {
        width: 50px;
        height: 50px;
        border: 5px solid #ccc;
        border-top-color: #007bff; /* Warna utama */
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    /* Keyframes untuk animasi */
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>
@endsection
@section('additionalJS')
<script type="text/javascript">
    $(document).ready(function() {


    })
</script>
@endsection
