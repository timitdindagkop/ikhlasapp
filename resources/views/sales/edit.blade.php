@extends('layout.salesMain')
@push('css')
<link href="/assets/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />
@endpush
@section('container')

<div class="col-md-6 col-lg-3">
    <div class="card">
        <div class="card-body">
            <div class="text-center">
                <p class="text-muted">Large modal</p>
                <!-- Large modal -->
                <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-lg">Large modal</button>
            </div>
            <!--  Modal content for the above example -->
            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title mt-0" id="myLargeModalLabel">Large modal</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <p>Cras mattis consectetur purus sit amet fermentum.
                                Cras justo odio, dapibus ac facilisis in,
                                egestas eget quam. Morbi leo risus, porta ac
                                consectetur ac, vestibulum at eros.</p>
                            <p>Praesent commodo cursus magna, vel scelerisque
                                nisl consectetur et. Vivamus sagittis lacus vel
                                augue laoreet rutrum faucibus dolor auctor.</p>
                            <p>Aenean lacinia bibendum nulla sed consectetur.
                                Praesent commodo cursus magna, vel scelerisque
                                nisl consectetur et. Donec sed odio dui. Donec
                                ullamcorper nulla non metus auctor
                                fringilla.</p>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div><!--end card-body-->
    </div><!--end card-->
</div><!--end col-->




{{-- ----------- --}}
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">

                <h4 class="mt-0 header-title">Daftar Order Toko {{ $customer->nama_cust }}</h4>

                <p class="text-muted mb-4 font-13">Menampilkan daftar orderan dari pelanggan.</p>

                <form class="form-barang" action="/sales" method="POST">
                    @csrf
                    <input type="hidden" name="nama_customer" id="nama_customer" value="{{ $customer->nama_cust }}">
                    <input type="hidden" name="lokasi_cust" class="lokasi_cust" value="{{ $customer->lokasi_cust }}">
                    <div class="table-responsive">
                        <table class="table mb-0" id="my-table">
                            <thead>
                                <tr>
                                    <th><a type="button"><i class="mdi mdi-delete"></i></a></th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Keterangan</th>
                                    <th>Total</th>

                                </tr>
                            </thead>
                            <tbody></tbody>
                            <tfoot style="display: none">
                                <tr class="bg-light">
                                    <th colspan="5" style="text-align: right">Total Bayar</th>
                                    <th class="grand-total"></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <button type="submit" class="btn btn-outline-info waves-effect waves-light d-flex ml-auto mt-2"><i
                            class="mdi mdi-send mr-2"></i>Buat Orderan</button>
                </form>
                <!--end table-->
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div> <!-- end col -->
</div>
<!--end row-->


@endsection