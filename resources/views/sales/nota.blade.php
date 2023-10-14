@extends('layout.salesMain')
@section('container')
<div class="row">
    @foreach ($order as $item)
    <div class="col-lg-3">
        <div class="card profile-card">
            <div class="card-body bg-primary p-0">
                <div class="media p-3  align-items-center">
                    <img src="assets/images/users/user-4.jpg" alt="user" class="rounded-circle thumb-lg">
                    <div class="media-body ml-3 align-self-center">
                        <h5 class="mb-1 text-white">{{ $item->nama_custs }}</h5>
                        <p class="mb-0 font-12 text-white">{{ date('d/m/Y', strtotime($item->created_at)) }}
                    </div>
                    <a href="{{ url('sales/print') }}/{{ $item->id }}" target="_blank" class="btn btn-light btn-sm"><i class="fas fa-print bg-soft-info"></i></a>
                </div>
            </div>
            <!--end card-body-->
            <div class="card-body pb-0">
                <h6 class="text-center">Keterangan Nota : Cash / Tempo </h6>
                <ul class="list-inline list-unstyled profile-socials text-center mb-0">
                    <li class="list-inline-item">
                        <button class="detail-data btn btn-success" data-id="{{ $item->id }}">Lihat Data</button>
                    </li>
                </ul>
            </div>
            <!--end card-body-->
            <div class="card-body socials-data pb-0 px-0">
                <div class="row text-center border-top m-0">
                    <div class="col-6 border-right py-3">
                        <h3 class="mt-0 mb-1">{{ $item->jumlah_item }}</h4>
                            <span class="font-14 text-muted">Jumlah Barang</span>
                    </div>
                    <!--end col-->
                    <div class="col-6 border-right py-3">
                        <h3 class="mt-0 mb-1">Rp. {{ number_format($item->total,0,',','.') }}</h3>
                        <span class="font-14 text-muted">Total Tagihan</span>
                    </div>
                    <!--end col-->
                    {{-- <div class="col-4 py-3">
                <h3 class="mt-0 mb-1">250</h3>
                <span class="font-14 text-muted">Following</span>
            </div><!--end col-->  --}}
                </div>
                <!--end row-->
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div>
    @endforeach
</div>
<!--end row-->
{{-- ------------------------------- --}}

<div class="modal fade modalDetail" tabindex="-1" role="dialog"
    aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="exampleModalLabel">Data order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="mt-0 header-title">Nama Customer</h4>
                            <p class="text-muted mb-4">
                                Tanggal : 04 / agust / 2023.
                            </p>

                            <div class="table-responsive">
                                <table class="table table-striped mb-0" id="detail-table">
                                    <thead>
                                        <tr>
                                            <th>Jumlah</th>
                                            <th>Nama Barang</th>
                                            <th>Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                                <!--end /table-->
                            </div>
                            <!--end /tableresponsive-->
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div> <!-- end col -->
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection
@push('js')
    <script>
        const rupiah = (number) => {
            return new Intl.NumberFormat("id-ID", {
            style: "decimal",
            currency: "IDR"
            }).format(number);
        }

        $(document).on('click', '.detail-data', function(e){
            e.preventDefault()
            var id = $(this).data('id')
            $.ajax({
                url: "{{ url('getDetail') }}/"+id,
                method: "GET",
                success: function(response) {
                    $('table tbody').empty();
                    if (response.status == 401) {
                        alert(response.errors)
                    } else {
                        $('.modalDetail').modal('show')
                        var data = response.data
                        let record = '';
                        data.forEach((params) => {
                            let body = `
                            <tr >
                                <td>`+params.jumlah+` `+params.satuan+`</td>
                                <td>`+params.nama_barang+`</td>
                                <td style="text-align: end">`+rupiah(params.total)+`</td>
                            </tr>`
                            record += body
                        })
                        $('table tbody').append(record);
                    }
                }
            })
        })
    </script>
@endpush