<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon card-header-info">
                <div class="card-icon">
                    <i class="material-icons">assignment</i>
                </div>
                <h4 class="card-title "> Rekening Pinjaman</h4>
            </div>
            <div class="card-body  table-hover">
                <hr>
                <div class="table-responsive">
                    <table class="table table-striped table-no-bordered table-hover">
                        <thead class="bold">
                            <th class="text-center">ID</th>
                            <th class="text-center">No Rekening</th>
                            <th class="text-center">Plafond</th>
                            <th class="text-center">Bakidebet</th>
                            <th class="text-center">Tunggakan</th>
{{--                            <th>Status</th>--}}
                            <th class="text-center">Actions</th>
                        </thead>
                        <!-- {{$no = 1}} -->
                        <tbody>
                        @if(count($dataPinjaman) == 0)
                            <tr class="table">
                                <td colspan="6" class="text-center"> Tidak ada Data </td>
                            </tr>
                        @endif
                        @foreach($dataPinjaman as $tmp)
                            <tr class="table">
                                <td class="text-center">{{$no++}}</td>
                                <td class="text-center">{{$tmp->norekening}}</td>
                                <td class="text-right">Rp. {{$tmp->Plafond}}</td>
                                <td class="text-right">Rp. {{$tmp->Bakidebet}}</td>
                                <td class="text-right">Rp. {{$tmp->Tunggakan}}</td>
                                <td class="text-center">
                                    <a href="javascript:void(0)">
                                        <button type="button" class="btn btn-info btn-link view" data-id="" data-toggle="tooltips" data-placement="top" title="Edit">
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
                    <i class="material-icons">assignment</i>
                </div>
                <h4 class="card-title "> Rekening Tabungan</h4>
            </div>
            <div class="card-body  table-hover">
                <hr>
                <div class="table-responsive">
                    <table class="table table-striped table-no-bordered table-hover">
                        <thead class="bold">
                        <th class="text-center">ID</th>
                        <th class="text-center">No Rekening</th>
                        <th class="text-center">Jenis Tabungan</th>
                        <th class="text-center">Saldo</th>
                        <th class="text-center">Actions</th>
                        </thead>
                        <!-- {{$no = 1}} -->
                        <tbody>
                        @if(count($dataTabungan) == 0)
                            <tr class="table">
                                <td colspan="6" class="text-center"> Tidak ada Data </td>
                            </tr>
                        @endif
                        @foreach($dataTabungan as $tmp)
                            <tr class="table">
                                <td class="text-center">{{$no++}}</td>
                                <td class="text-center">{{$tmp->norekening}}</td>
                                <td class="text-center">{{$tmp->jenis_tabungan}}</td>
                                <td class="text-right">Rp. {{number_format($tmp->saldo,0,",",".")}}</td>
                                <td class="text-center">
                                    <a href="javascript:void(0)">
                                        <button type="button" class="btn btn-info btn-link view" data-id="" data-toggle="tooltips" data-placement="top" title="Edit">
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
                    <i class="material-icons">assignment</i>
                </div>
                <h4 class="card-title "> Rekening Deposito</h4>
            </div>
            <div class="card-body  table-hover">
                <hr>
                <div class="table-responsive">
                    <table class="table table-striped table-no-bordered table-hover">
                        <thead class="bold">
                        <th class="text-center">ID</th>
                        <th class="text-center">No Rekening</th>
                        <th class="text-center">Tgl Buka</th>
                        <th class="text-center">Tgl Valuta</th>
                        <th class="text-center">Tgl JT</th>
                        <th class="text-center">Nominal</th>
                        <th class="text-center">Actions</th>
                        </thead>
                        <!-- {{$no = 1}} -->
                        <tbody>
                        @if(count($dataDeposito) == 0)
                            <tr class="table">
                                <td colspan="7" class="text-center"> Tidak ada Data </td>
                            </tr>
                        @endif
                        @foreach($dataDeposito as $tmp)
                            <tr class="table">
                                <td class="text-center">{{$no++}}</td>
                                <td class="text-center">{{$tmp->norekening}}</td>
                                <td class="text-center">{{$tmp->tgl_buka}}</td>
                                <td class="text-center">{{$tmp->tgl_valuta}}</td>
                                <td class="text-center">{{$tmp->tgl_jth_tempo}}</td>
                                <td class="text-right">{{number_format($tmp->nominal,0,",",".")}}</td>
                                <td class="text-center">
                                    <a href="javascript:void(0)">
                                        <button type="button" class="btn btn-info btn-link view" data-id="" data-toggle="tooltips" data-placement="top" title="Edit">
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
