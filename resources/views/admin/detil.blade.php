@extends('layout.main')

@section('container')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                               @if ($inven->gambar == null || $inven->gambar == '0')
                                <img src="/assets/images/products/2.jpg" alt="" class=" mx-auto  d-block" height="400">
                               @else
                                 <img src="/Gambar_upload/barang/{{ $inven->gambar }}" alt="" class=" mx-auto d-block" height="400" width="400">
                               @endif
                                <div class="row">
                                    <div class="col-sm-4">
                                    </div>
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-4"></div>
                                </div>
                        </div>
                        <!--end col-->
                        <div class="col-lg-6 align-self-center">
                            <div class="single-pro-detail">
                                <p class="mb-1">Detil barang</p>
                                <div class="custom-border"></div>
                                <h3 class="pro-title">{{ $inven->nama_barang }}</h3>
                                <p class="text-muted mb-2">{{ $inven->category }}</p>
                                <h2 class="pro-price">{{ $inven->harga }}

                                    <div class="quantity mt-3">
                                        <form action="/admin/tambah_gambar/{{ $inven->id }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <h5>Tambah Gambar</h5>
                                        <input type="file" class="form-control" name="gambar"> <br />
                                        
                                        <button type="submit" class="btn btn-success text-white px-4 d-inline-block"><i class="mdi mdi-cart mr-2"></i>Simpan</button>
                                        </form>
                                    </div>
                            </div>
                        
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->

        </div>
        <!--end col-->
    </div>
    <!--end row-->
@endsection
