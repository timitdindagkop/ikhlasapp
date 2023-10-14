@extends('layout.main')

@section('container')
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
                            @foreach ($order as $o)
                           <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $o->nama_custs }}</td>
                              
                                <td>
                                    <button type="button" class="btn btn-sm btn-success">
                                        <a href="/admin/detail_order/">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-dark"><i class="fas fa-print"></i></button>
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
@endsection
