@extends('layout.main')

@section('container')
<div class="row">
    <div class="col-lg-7 col-md-7 col-sm-12 mb-4">
    <div class="card">
        <div class="card-body">
                    <h1 class="header-title mt-0">List Order</h1>
                    <h4 class="header-title mt-0">Karanganyar - Kedungwuni</h4>
                    <p class="mb-4 text-muted">22 Oktober 2022</p>
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>Customer</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order as $item)
                                    <tr>
                                        <td class="font-weight-bold"> {{ $item->nama_custs }}</td>
                                        <td>
                                            @if ($item->status_order == '0')
                                                <span class="badge badge-danger">Belum proses</span>
                                        </td>
                                    @else
                                        <span class="badge badge-warning">Proses</span></td>
                                @endif
                                <td>
                                    <button type="button" class="btn btn-sm btn-success">
                                        <a href="/admin/detail_order/{{ $item->id }}">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </button>
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!--end /table-->
                    </div>
                </div>
                </div>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                    <h2 class="header-title mt-0">Laporan Order</h2>
                    <h4 class="header-title mt-0">Karanganyar - Kedungwuni</h4>
                    <p class="mb-4 text-muted">22 Oktober 2022</p>
                    <div class="table-responsive">

                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order_all as $o)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $o->nama_custs }}</td>

                                            <td>
                                                <button type="button" class="btn btn-sm btn-success lihat" data-id="{{ $o->id }}">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <a href="admin/print/{{ $o->id }}" class="btn btn-sm btn-dark"><i
                                                        class="fas fa-print"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!--end /table-->
                        </div>
                        <!--end /tableresponsive-->
                        </table>
                        <!--end /table-->
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--end /tableresponsive-->
@endsection
