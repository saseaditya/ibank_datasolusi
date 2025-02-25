<div class="modal fade" id="modalTrxPinjaman" role="dialog" style="overflow-y: scroll;">
    <div class="modal-dialog modal-lg margin-top-30" role="document" style="max-width: 1400px;">
        <form  id="formUser" action="" enctype="multipart/form-data" method="POST">
            <input type="hidden" name="_token" value="{{ Session::token() }}" />
            <input type="hidden" name="txtIdROP" id="txtIdROP"/>
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="my-modal-history"><b> History Transaksi Rekening Pinjaman / Kredit </b></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="material-datatables">
                        <table id="tableTrxPinjaman" class="table table-striped table-no-bordered table-hover dataTables" cellspacing="0" width="100%" style="width:100%">
                            <thead class="bold">
                            <tr>
{{--                                <th class="disabled-sorting">No</th>--}}
{{--                                <th class="">NoRekening</th>--}}
                                <th class="">Tanggal</th>
                                <th class="">Jadwal</th>
                                <th class="">Keterangan</th>
                                <th class="text-center">Realisasi</th>
                                <th class="text-center">Angsuran Pokok</th>
                                <th class="text-center">Saldo Pokok</th>
                                <th class="text-center">Bunga</th>
                                <th class="text-center">Denda</th>
                            </tr>
                            </thead>
                            <!-- {{$no = 1}} -->
                            <tbody id="tableBodyTrxPinjaman">

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger btn-link" type="button" class="close" data-dismiss="modal" aria-label="Close">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="modalTrxTabungan" role="dialog" style="overflow-y: scroll;">
    <div class="modal-dialog modal-lg margin-top-30" role="document" style="max-width: 1200px;">
        <form  id="formUser" action="" enctype="multipart/form-data" method="POST">
            <input type="hidden" name="_token" value="{{ Session::token() }}" />
            <input type="hidden" name="txtIdROP" id="txtIdROP"/>
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="my-modal-history"><b> History Transaksi Rekening Tabungan </b></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="material-datatables">
                        <table id="tableTrxTabungan" class="table table-striped table-no-bordered table-hover dataTables" cellspacing="0" width="100%" style="width:100%">
                            <thead class="bold">
                            <tr>
{{--                                <th class="disabled-sorting text-center">No</th>--}}
{{--                                <th class="text-center">No.Rekening</th>--}}
                                <th class="text-center">Tanggal</th>
                                <th class="text-center">Keterangan</th>
                                <th class="text-center">Sandi</th>
                                <th class="text-center" style="width:15%">Debet</th>
                                <th class="text-center" style="width:15%">Kredit</th>
                                <th class="text-center" style="width:15%">Saldo</th>
                            </tr>
                            </thead>
                            <!-- {{$no = 1}} -->
                            <tbody id="tableBodyTrxTabungan">

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger btn-link" type="button" class="close" data-dismiss="modal" aria-label="Close">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="modalTrxDeposito" role="dialog" style="overflow-y: scroll;">
    <div class="modal-dialog modal-lg margin-top-30" role="document" style="max-width: 1200px;">
        <form  id="formUser" action="" enctype="multipart/form-data" method="POST">
            <input type="hidden" name="_token" value="{{ Session::token() }}" />
            <input type="hidden" name="txtIdROP" id="txtIdROP"/>
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="my-modal-history"><b> History Transaksi Rekening Deposito </b></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="material-datatables">
                        <table id="tableTrxDeposito" class="table table-striped table-no-bordered table-hover dataTables" cellspacing="0" width="100%" style="width:100%">
                            <thead class="bold">
                            <tr>
{{--                                <th class="text-center">No</th>--}}
{{--                                <th class="text-center">No.Rekening</th>--}}
                                <th class="text-center">Tanggal</th>
                                <th class="text-center">Jadwal</th>
                                <th class="text-center">Keterangan</th>
                                <th class="text-center">Pokok</th>
                                <th class="text-center">Bunga</th>
                            </tr>
                            </thead>
                            <!-- {{$no = 1}} -->
                            <tbody id="tableBodyTrxDeposito">

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger btn-link" type="button" class="close" data-dismiss="modal" aria-label="Close">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>
