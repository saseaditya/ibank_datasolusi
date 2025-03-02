<div class="modal fade" id="modalKredit" role="dialog" style="overflow-y: scroll;">
    <div class="modal-dialog modal-lg margin-top-30" role="document" style="max-width: 768px;">
        <form  id="formKredit" action="" enctype="multipart/form-data" method="POST">
            <input type="hidden" name="_token" value="{{ Session::token() }}" />
            <input type="hidden" name="txtIdROP" id="txtIdROP" value="0"/>
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="my-modal-history"><b> Form Pengajuan Kredit </b></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <hr>

{{--                    <div class="row">--}}
{{--                        <div class="col-md-12">--}}
{{--                            <div class="form-group">--}}
{{--                                <label class="form-label-simple">Email address</label>--}}
{{--                                <input type="email" class="form-control-simple" id="email" placeholder="Enter email">--}}
{{--                                <div class="form-text">We'll never share your email with anyone else.</div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label-simple">Produk Pinjaman :</label>
                                <select class="form-control-simple" id="txtProduct" name="txtProduct" data-size="7" data-style="select-with-transition" required="true" >
                                    <option selected="" disabled="" value="0">Product</option>
                                    @foreach($produk as $tmp)
                                    <option value="{{$tmp->id}},{{$tmp->nama}}">{{$tmp->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-12">
                            <label class="form-label-simple">Jenis Kredit : </label>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="txtJK" value="1" required="true"> Flat
                                    <span class="circle">
                                      <span class="check"></span>
                                    </span>
                                </label>
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="txtJK" value="2" required="true"> Sliding
                                    <span class="circle">
                                      <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-12">
                            <label class="form-label-simple">Tujuan Penggunaan : </label>
                            <div class="form-group">
                                <textarea type="text" id="txtTP" name="txtTP" class="form-control-simple" required="true"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-12">
                            <label class="form-label-simple">Jenis Jaminan : </label>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="txtJJ" value="1" required="true"> 1. BPKB
                                    <span class="circle">
                                      <span class="check"></span>
                                    </span>
                                </label>
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="txtJJ" value="2" required="true"> 2. SHM
                                    <span class="circle">
                                      <span class="check"></span>
                                    </span>
                                </label>
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="txtJJ" value="3" required="true"> 3. Lainnya
                                    <span class="circle">
                                      <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
{{--                        <label class="col-md-3 col-sm-6 col-6 col-form-label">Pengajuan Kredit : </label>--}}
{{--                        <div class="col-md-9 col-sm-6 col-6">--}}
{{--                            <div class="input">--}}
{{--                                <input type="number" id="txtPlafond" name="txtPlafond" class="form-control" required="true">--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="col-md-12">
                            <label for="username" class="form-label-simple">Pengajuan Kredit :</label>
                            <div class="input-group-simple">
                                <span class="input-group-text-simple">Rp. </span>
                                <input type="text" class="" id="txtPlafond" name="txtPlafond" placeholder="Masukan Jumlah..." required="true">
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="latitude" id="latitude" value="0" />
                    <input type="hidden" name="longitude" id="longitude" value="0"/>

                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success" style="width: 100%">
                                <i class="fa-solid fa-pen"></i>     BUAT PENGAJUAN
                            </button>
                        </div>
                    </div>
                </div>

{{--                <div class="modal-footer">--}}
{{--                    <button class="btn btn-danger btn-link" type="button" class="close" data-dismiss="modal" aria-label="Close">Close</button>--}}

{{--                </div>--}}
            </div>
        </form>
    </div>
</div>
