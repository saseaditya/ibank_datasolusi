<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon card-header-info">
                <div class="card-icon">
                    <img src="{{asset("assets/icon/rekening/kredit-removebg-preview.png")}}" >
{{--                    <i class="fas fa-hand-holding-usd fa-lg"></i>--}}
                </div>
                <h4 class="card-title "> Rekening Pinjaman</h4>
            </div>
            <div class="card-body  table-hover">
                <hr>
                <div class="material-datatables">
                    <table id="dataList" class="table dataTables table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead class="bold">
{{--                            <th class="text-center ">ID</th>--}}
                            <th class="text-center">No Rekening</th>
                            <th class="text-center">Plafond</th>
                            <th class="text-center">Saldo Pokok</th>
                            <th class="text-center">Tunggakan</th>
                            <th class="text-center">Lihat</th>
                        </thead>
                        <!-- {{$no = 1}} -->
                        <tbody>
                        @foreach($dataPinjaman as $tmp)
                            <tr class="table">
{{--                                <td class="text-center">{{$no++}}</td>--}}
                                <td class="text-center">{{$tmp->norekening}}</td>
                                <td class="text-right">Rp. {{$tmp->Plafond}}</td>
                                <td class="text-right">Rp. {{$tmp->Bakidebet}}</td>
                                <td class="text-right">Rp. {{$tmp->Tunggakan}}</td>
                                <td class="td-actions text-center">
                                    <a href="javascript:void(0)">
                                        <button type="button" class="btn btn-info btn-link btnPinjaman" data-id="{{$tmp->norekening}}" data-toggle="tooltips" data-placement="top" title="Edit">
                                            <i class="material-icons">remove_red_eye</i>
                                        </button>
                                    </a>
                                </td>
                            </tr
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon card-header-info">
                <div class="card-icon">
                    <img src="{{asset("assets/icon/rekening/tabungan-removebg-preview.png")}}" >
                </div>
                <h4 class="card-title "> Rekening Tabungan</h4>
            </div>
            <div class="card-body  table-hover">
                <hr>
                <div class="material-datatables">
                    <table id="dataList" class="table dataTables table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead class="bold">
{{--                        <th class="text-center">ID</th>--}}
                        <th class="text-center">No Rekening</th>
                        <th class="text-center">Jenis Tabungan</th>
                        <th class="text-center">Saldo</th>
                        <th class="text-center">Lihat</th>
                        </thead>
                        <!-- {{$no = 1}} -->
                        <tbody>
                        @foreach($dataTabungan as $tmp)
                            <tr class="table">
{{--                                <td class="text-center">{{$no++}}</td>--}}
                                <td class="text-center">{{$tmp->norekening}}</td>
                                <td class="text-center">{{$tmp->jenis_tabungan}}</td>
                                <td class="text-right">Rp. {{number_format($tmp->saldo,0,",",".")}}</td>
                                <td class="td-actions text-center">
                                    <a href="javascript:void(0)">
                                        <button type="button" class="btn btn-info btn-link btnTabungan" data-id="{{$tmp->norekening}}" data-toggle="tooltips" data-placement="top" title="Edit">
                                            <i class="material-icons">remove_red_eye</i>
                                        </button>
                                    </a>
                                </td>
                            </tr
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon card-header-info">
                <div class="card-icon">
                    <img src="{{asset("assets/icon/rekening/deposito-removebg-preview.png")}}" >
                </div>
                <h4 class="card-title "> Rekening Deposito</h4>
            </div>
            <div class="card-body">
{{--                <hr>--}}
                <div class="material-datatables">
                    <table id="dataList" class="table dataTables table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead class="bold">
{{--                            <th class="text-center">ID</th>--}}
                            <th class="text-center">No Rekening</th>
                            <th class="text-center">Tgl Buka</th>
                            <th class="text-center">Tgl Valuta</th>
                            <th class="text-center">Tgl JT</th>
                            <th class="text-center">Nominal</th>
                            <th class="text-center">Lihat</th>
                        </thead>
                        <!-- {{$no = 1}} -->
                        <tbody>
                        @foreach($dataDeposito as $tmp)
                            <tr >
{{--                                <td class="text-center">{{$no++}}</td>--}}
                                <td class="text-center">{{$tmp->norekening}}</td>
                                <td class="text-center">{{$tmp->tgl_buka}}</td>
                                <td class="text-center">{{$tmp->tgl_valuta}}</td>
                                <td class="text-center">{{$tmp->tgl_jth_tempo}}</td>
                                <td class="text-right">Rp. {{number_format($tmp->nominal,0,",",".")}}</td>
                                <td class="td-actions text-center">
                                    <a href="javascript:void(0)">
                                        <button type="button" class="btn btn-info btn-link btnDeposito" data-id="{{$tmp->norekening}}" data-toggle="tooltips" data-placement="top" title="Edit">
                                            <i class="material-icons">remove_red_eye</i>
                                        </button>
                                    </a>
                                </td>
                            </tr
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


