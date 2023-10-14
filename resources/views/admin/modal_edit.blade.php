<div class="col-md-6 col-lg-3">
    <!-- sample modal content -->
    <div class="modal fade modaleditdata" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Modal Heading</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mt-0 header-title">Basic Form</h4>
                                <p class="text-muted mb-4">Basic example to demonstrate Bootstrap’s form styles.</p>
                                <form action="#">
                                    <div id="error_message"></div>
                                    <div class="form-group">
                                        <label for="nama_barang">Nama Barang</label>
                                        <input type="hidden" name="id" id="id">
                                        <input type="text" class="form-control" id="nama_barang" name="nama_barang"
                                            value="{{ old('nama_barang') }}">
                                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                                    </div>
                                    <div class="form-group">
                                        <label for="category">Category</label>
                                        <input type="text" class="form-control" id="category" name="category"
                                            value="{{ old('category') }}">
                                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                                    </div>
                                    <div class="form-group">
                                        <label for="harga">Harga</label>
                                        <input type="number" class="form-control" id="harga" name="harga"
                                            value="{{ old('harga') }}">
                                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                                    </div>
                                    <div class="form-group">
                                        <label for="satuan">Satuan</label>
                                        <input type="text" class="form-control" id="satuan" name="satuan"
                                            value="{{ old('satuan') }}">
                                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                                    </div>
                                    <div class="form-group">
                                        <label for="isi">Isi</label>
                                        <input type="text" class="form-control" id="isi" name="isi"
                                            value="{{ old('isi') }}">
                                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="Status">Status</label>
                                        <select name="status_barang" id="status_barang" class="form-control">
                                            <option value="habis">Habis</option>
                                            <option value="ready">Ready</option>
                                        </select>
                                    </div> --}}
                                </form>
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
                    <button id="update" class="btn btn-primary waves-effect waves-light">Ubah data</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

</div>