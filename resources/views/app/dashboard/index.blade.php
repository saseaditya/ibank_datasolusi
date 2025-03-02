@extends('app.include.master')

@section('title','Dasbor')

@section('content')
    @include('app.dashboard.modal')

<div class="content">
  <div class="container-fluid">
  	<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon card-header-danger">
                    <div class="card-icon">
                        @if(session('kelamin') == "Pria")
                            <img src="{{asset("assets/icon/rekening/wanita-removebg-preview.png")}}" >
{{--                            <i class="fa-solid fa-person fa-2xl"></i>--}}
                        @else
                            <img src="{{asset("assets/icon/rekening/laki-removebg-preview.png")}}" >
{{--                            <i class="fa-solid fa-person-dress fa-2xl"></i>--}}
                        @endif
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
      @include('app.dashboard.table')

  </div>
</div>
@endsection
@section('additionalCSS')
<style type="text/css">
    .card-icon img{
        width: 50px;
        height: auto;
    }

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

        // $('#myTable').DataTable({
        //     "scrollX": true  // Mengaktifkan scroll horizontal
        // });

        $("table.dataTables thead th").addClass("disabled-sorting");

        $(document).ajaxStart(function() {
            $("#overlay-table").fadeIn(); // Tampilkan loader saat AJAX dimulai
            $("#overlay-table").css("display", "flex"); // Tampilkan loader saat AJAX dimulai
        });

        $(document).ajaxStop(function() {
            $("#overlay-table").fadeOut(); // Sembunyikan loader setelah AJAX selesai
        });

        $('body').on('click', '.btnTabungan', function () {
            var id = $(this).data("id");

            $.ajax({
                url : "{{ route('GetTrxTabunganByRekening') }}",
                type : "GET",
                data : { norek : id },
                success : function(data){
                    var output = '';
                    var no = 0;

                    $('table#tableTrxTabungan').DataTable().clear().draw();
                    for(var count = 0; count < data.length; count++)
                    {
                        var d = data[count];
                        no = no + 1;
                        var dt = $('table#tableTrxTabungan').DataTable().row.add([d.tanggal,d.keterangan,d.sandi,d.debet,d.kredit,d.saldo]);
                        dt.draw().nodes().to$().find('td').filter((index) => [3, 4, 5].includes(index)).addClass( 'text-right' );
                        // dt.draw().nodes().to$().find('td').eq(1).addClass('text-center').css('width', '12%' );
                        dt.draw().nodes().to$().find('td').eq(0).addClass('text-center').css('width', '5%' );
                    }
                    $('#modalTrxTabungan').modal('show');
                    // $('#overlay').hide();

                }
            });
        });

        $('body').on('click', '.btnPinjaman', function () {
            var id = $(this).data("id");
            $('#modalTrxPinjaman').modal('show');
            $.ajax({
                url : "{{ route('GetTrxPinjamanByRekening') }}",
                type : "GET",
                data : { norek : id },
                success : function(data){
                    var output = '';
                    var no = 0;

                    $('table#tableTrxPinjaman').DataTable().clear().draw();
                    for(var count = 0; count < data.length; count++)
                    {
                        var d = data[count];
                        no = no + 1;
                        var dt = $('table#tableTrxPinjaman').DataTable().row.add([d.tanggal,d.jadwal,d.keterangan,d.realisasi,d.ang_pokok,d.sld_pokok,d.bunga,d.denda]);
                        dt.draw().nodes().to$().find('td').filter((index) => [3, 4, 5, 6, 7].includes(index)).addClass( 'text-right' );
                        dt.draw().nodes().to$().find('td').filter((index) => [1, 2].includes(index)).css('width', '10%' );
                        dt.draw().nodes().to$().find('td').eq(0).addClass('text-center').css('width', '5%' );
                    }
                }
            });
        });

        $('body').on('click', '.btnDeposito', function () {
            var id = $(this).data("id");
            $('#modalTrxDeposito').modal('show');
            $.ajax({
                url : "{{ route('GetTrxDepositoByRekening') }}",
                type : "GET",
                data : { norek : id },
                success : function(data){
                    var output = '';
                    var no = 0;

                    $('table#tableTrxDeposito').DataTable().clear().draw();
                    for(var count = 0; count < data.length; count++)
                    {
                        var d = data[count];
                        no = no + 1;
                        var dt = $('table#tableTrxDeposito').DataTable().row.add([d.tanggal,d.jadwal,d.keterangan,d.pokok,d.bunga]);
                        dt.draw().nodes().to$().find('td').filter((index) => [3,4].includes(index)).addClass( 'text-right' ).css('width', '15%' );
                        dt.draw().nodes().to$().find('td').filter((index) => [1,2].includes(index)).addClass( 'text-center' ).css('width', '12%' );
                        dt.draw().nodes().to$().find('td').eq(0).addClass('text-center').css('width', '5%' );
                    }
                }
            });
        });
    })
</script>
@endsection
