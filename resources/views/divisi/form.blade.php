<div class="modal fade" id="modal-form" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <form  id="form-item" method="post" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data" >
                {{ csrf_field() }} {{ method_field('POST') }}

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title"></h3>
                </div>

                <div class="modal-body">
                    <input type="hidden" id="id" name="id">                    

                    <div class="box-body">
                        <div class="form-group">
                            <label >KODE DIVISI</label>
                            <input type="text" class="form-control" id="kode_divisi" name="kode_divisi"  autofocus required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="form-group">
                            <label >NAMA DIVISI</label>
                            <input type="text" class="form-control" id="nama_divisi" name="nama_divisi"  autofocus required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="form-group">
                            <label >KETERANGAN</label>
                            <textarea class="form-control" name="keterangan" id="keterangan" cols="30" rows="10"></textarea>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
