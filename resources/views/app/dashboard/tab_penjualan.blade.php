<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon card-header-rose">
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
