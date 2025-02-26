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
                        <label class="col-sm-2 col-form-label">Saran & Keluhan : </label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <input type="text" id="txtDeskripsi" name="txtDeskripsi" class="form-control" placeholder="Masukan keluhan anda">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger btn-link" type="button" class="close" data-dismiss="modal" aria-label="Close">Close</button>
                    <button type="submit" class="btn btn-success btn-link" >Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
