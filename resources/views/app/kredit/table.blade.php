<div class="material-datatables">
    <table id="dataList" class="table dataTables table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
        <thead class="bold">
            <th class="text-center ">Tanggal</th>
            <th class="text-center">Produk</th>
            <th class="text-center">Pengajuan</th>
            <th class="text-center">Disetujui</th>
            <th class="text-center">Status</th>
        </thead>
        <!-- {{$no = 1}} -->
        <tbody>
        @foreach($data as $tmp)
            <tr class="table">
                <td class="text-center">{{date("Y-m-d",strtotime($tmp->waktu))}}</td>
                <td class="text-right">{{$tmp->nama_produk}}</td>
                <td class="text-right">{{number_format($tmp->plafond,0,",",".")}}</td>
                <td class="text-right">{{number_format($tmp->plafond_setuju,0,",",".")}}</td>
                <td class="td-actions text-center">
                    @if($tmp->flag == 0)
                    <a href="javascript:void(0)">
                        <button type="button" class="btn btn-info btn-warning">
{{--                                            <i class="material-icons">remove_red_eye</i>--}}
                            Belum di Proses
                        </button>
                    </a>
                    @elseif($tmp->flag == 6)
                    <a href="javascript:void(0)">
                        <button type="button" class="btn btn-info btn-success">
                            Disetujui
                        </button>
                    </a>
                    @elseif($tmp->flag == 7)
                    <a href="javascript:void(0)">
                        <button type="button" class="btn btn-info btn-danger">
                            Ditolak
                        </button>
                    </a>
                    @elseif($tmp->flag == 9)
                    <a href="javascript:void(0)">
                        <button type="button" class="btn btn-info btn-success">
                            Telah dicairkan
                        </button>
                    </a>
                    @else
                    <a href="javascript:void(0)">
                        <button type="button" class="btn btn-info btn-info">
                            Sedang diproses
                        </button>
                    </a>
                    @endif
                </td>
            </tr
        @endforeach
        </tbody>
    </table>
</div>


