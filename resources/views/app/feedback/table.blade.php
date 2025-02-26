<div class="material-datatables">
    <table id="dataList" class="table dataTables table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
        <thead class="bold">
            <th class="text-center">Tanggal</th>
            <th class="text-center">Produk</th>
            <th class="text-center">Status</th>
        </thead>
        <!-- {{$no = 1}} -->
        <tbody>
        @foreach($data as $tmp)
            <tr class="table">
                <td class="text-center">{{date("Y-m-d",strtotime($tmp->waktu))}}</td>
                <td class="text-right">{{$tmp->isi}}</td>
                <td class="td-actions text-center">
                    @if($tmp->flag == 0)
                    <a href="javascript:void(0)">
                        <button type="button" class="btn btn-warning">
                            Belum direspon
                        </button>
                    </a>
                    @elseif($tmp->flag == 1)
                    <a href="javascript:void(0)">
                        <button type="button" class="btn btn-info">
                            Sudah direspon
                        </button>
                    </a>
                    @elseif($tmp->flag == 2)
                    <a href="javascript:void(0)">
                        <button type="button" class="btn btn-success">
                            Jawaban
                        </button>
                    </a>
                    @endif
                </td>
            </tr
        @endforeach
        </tbody>
    </table>
</div>


