<div class="modal fade" id="modalKeluhan" role="dialog" style="overflow-y: scroll;">
    <div class="modal-dialog modal-lg margin-top-30" role="document" style="max-width: 876px;">
        <form  id="formKeluhan" action="" enctype="multipart/form-data" method="POST">
            <input type="hidden" name="_token" value="{{ Session::token() }}" />
            <input type="hidden" name="txtIdROP" id="txtIdROP"/>
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="my-modal-history"><b> Form Saran & Keluhan </b></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <label class="form-label-simple">Saran & Keluhan : </label>
                            <div class="form-group">
                                <textarea type="text" id="txtDeskripsi" name="txtDeskripsi" class="form-control-simple" placeholder="Masukan keluhan anda"></textarea>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success" id="btnSubmit" style="width: 100%">
                                <i class="fa-solid fa-pen"></i>     KIRIM
                            </button>
                        </div>
                    </div>
                </div>
{{--                <div class="modal-footer">--}}
{{--                    <button class="btn btn-danger btn-link" type="button" class="close" data-dismiss="modal" aria-label="Close">Close</button>--}}
{{--                    <button type="submit" class="btn btn-success btn-link" >Submit</button>--}}
{{--                </div>--}}
            </div>
        </form>
    </div>
</div>
