@extends('layout.salesMain')
@push('css')
    <link href="/assets/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />
@endpush
@section('container')
    <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Form Order Baru</h4>
                    {{-- <p class="text-muted mb-4">Menambahkan daftar orderan baru dengan pencarian lewat form ini.</p> --}}
                        <div class="form-group">
                            <label for="nambar">Nama Barang</label>
                            <select class="select2 form-control mb-3 custom-select" id="barang"
                                style="width: 100%; height:36px;">
                                <option>Select</option>
                                @foreach ($inventory as $iven)
                                    <option value="{{ $iven->id }}">{{ $iven->nama_barang }} ( {{ number_format($iven->harga, 0, ',', '.') }} / {{ $iven->satuan }} )</option>
                                @endforeach
                            </select>
                            {{-- <small id="emailHelp" class="form-text text-muted">Ketikkan kata kunci untuk memudahkan
                                pencarian
                                barang.</small> --}}
                        </div>
                        <div class="form-group row has-success">
                            <div class="row mx-1">
                                <div class="col-sm-6 mt-1">
                                    <input type="number" class="form-control form-control-success bijian" min="0" id="bijian" name="bijian"
                                        placeholder="Untuk jumlah bijian">
                                </div>
                                <div class="col-sm-6 mt-1">
                                    <input type="number" class="form-control form-control-success tertentu" min="0" id="tertentu" name="tertentu"
                                        placeholder="untuk satuan tertentu">
                                    <div class="kodi badge badge-purple d-flex justify-content-center mt-1"></div> {{-- menampilan nama satuan --}}
                                </div>
                                <div class="col-sm-12 mt-2">
                                    <select name="keterangan" id="keterangan" class="form-control">
                                        <option value="&nbsp;">Pilih keterangan</option>
                                        <option value="Sudah dibawa">Sudah dibawa</option>
                                        <option value="Jangan tulis nota">Jangan tulis nota</option>
                                        <option value="Harga spesial">Harga spesial</option>
                                    </select>
                                </div>
                            </div>
                            
                            {{-- data yang diambil dari database dan ditampung kedalam inputan --}}
                            <input type="hidden" name="nama" class="nama">
                            <input type="hidden" name="satuan" class="satuan">
                            <input type="hidden" name="harga" class="harga">
                            <input type="hidden" name="harga_satuan" class="harga_satuan">
                        </div>
                        <button type="submit" class="btn btn-primary" id="tambah" name="tambah">Submit</button>
                        <button type="button" class="btn btn-danger">Cancel</button>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-sm-8">
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
                        <button type="submit" class="btn btn-outline-info waves-effect waves-light d-flex ml-auto mt-2"><i class="mdi mdi-send mr-2"></i>Buat Orderan</button>
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

@push('js')
    <script src="/assets/plugins/repeater/jquery.repeater.min.js"></script>
    <script src="/assets/pages/jquery.form-repeater.js"></script>
    <script src="/assets/plugins/select2/select2.min.js"></script>

    {{--  --}}
    <script src="/assets/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="/assets/plugins/timepicker/tempusdominus-bootstrap-4.js"></script>
    <script src="/assets/plugins/timepicker/bootstrap-material-datetimepicker.js"></script>
    <script src="/assets/plugins/clockpicker/jquery-clockpicker.min.js"></script>
    <script src="/assets/plugins/colorpicker/jquery-asColor.js"></script>
    <script src="/assets/plugins/colorpicker/jquery-asGradient.js"></script>
    <script src="/assets/plugins/colorpicker/jquery-asColorPicker.min.js"></script>
    <script src="/assets/plugins/select2/select2.min.js"></script>

    <script src="/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <script src="/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="/assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
    <script src="/assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js"></script>

    <script src="/assets/pages/jquery.forms-advanced.js"></script>

    <script>
        
        $(document).on('change', '#barang', function(e) {
            var id = $(this).val();
            $.ajax({
                type: "GET",
                url: "{{ url('/ab') }}/" + id,
                success: function(response) {
                    console.log(response)
                    if (response.status == "401") {
                        $('.kodi').html("Satuan tidak ada")
                    } else {
                        $('.kodi').html(response.data.satuan)
                    }
                }
            })
        })
        
        let arraybarang = [];
        $(document).on('click', '#tambah', function(e) {
            e.preventDefault()

            // data yang diambil dari database
            var id = $('#barang').val()
            var data = {
                'bijian': $('#bijian').val(),
                'tertentu': $('#tertentu').val(),
                'keterangan': $('#keterangan').val(),
                '_token': '{{ csrf_token() }}'
            };
            $.ajax({
                type: "PUT",
                url: "/ab_data/"+id,
                data: data,
                dataType: 'json',
                success: function(response){
                    console.log(response.barang);
                    if (response.status == 200) {
                        // merubah rupiah total
                        var number_string2 = response.barang[0].total.toString(),
                        sisa2 = number_string2.length % 3,
                        rupiah2 = number_string2.substr(0, sisa2),
                        ribuan2 = number_string2.substr(sisa2).match(/\d{3}/g);
                        if (ribuan2) {
                            separator = sisa2 ? '.' : '';
                            rupiah2 += separator + ribuan2.join('.');
                        }
                        // mengubah rupiah harga
                        var number_string3 = response.barang[0].harga.toString(),
                        sisa3 = number_string3.length % 3,
                        rupiah3 = number_string3.substr(0, sisa3),
                        ribuan3 = number_string3.substr(sisa3).match(/\d{3}/g);
                        if (ribuan3) {
                            separator = sisa3 ? '.' : '';
                            rupiah3 += separator + ribuan3.join('.');
                        }

                        let html =
                        '<tr id="'+response.barang[0].id+'">\
                            <td><a data-id="'+response.barang[0].id+'" type="button" class="action-icon remove-item"> <i class="mdi mdi-delete"></i></a></td>\
                            <td>'+response.barang[0].nama_barang+'<input type="hidden" name="nm_barang[]" value="'+response.barang[0].nama_barang+'"></td>\
                            <td>'+response.barang[0].jumlah+' '+response.barang[0].satuan+'<input type="hidden" name="jumlah[]" value="'+response.barang[0].jumlah+'"> <input type="hidden" name="satuan_list[]" id="satuan_list" value="'+response.barang[0].satuan+'"></td>\
                            <td>'+rupiah3+'<input type="hidden" name="harga[]" value="'+response.barang[0].harga+'"></td>\
                            <td>'+response.barang[0].keterangan+'<input type="hidden" name="keterangan[]" value="'+response.barang[0].keterangan+'"></td>\
                            <td>Rp. '+rupiah2+'</td>\
                        </tr>';
                        arraybarang.push({
                            id: response.barang[0].id,
                            harga: response.barang[0].harga,
                            satuan: response.barang[0].satuan,
                            jumlah: response.barang[0].jumlah,
                            total: response.barang[0].total
                        });
                        let grand_total = 0;
                        arraybarang.forEach(val => grand_total = grand_total + parseInt(val.total));
                        $('.form-barang table tbody').append(html);
                        $('tfoot').show();

                        var number_string = grand_total.toString(),
                        sisa = number_string.length % 3,
                        rupiah = number_string.substr(0, sisa),
                        ribuan = number_string.substr(sisa).match(/\d{3}/g);
                        if (ribuan) {
                            separator = sisa ? '.' : '';
                            rupiah += separator + ribuan.join('.');
                        }
                        $('.grand-total').html('<h4>Rp. '+rupiah+'</h4> <input type="hidden" name="grand_total" value="'+grand_total+'">');
                        $('.form-barang #barangtid').val(JSON.stringify(arraybarang));
                        $('#bijian').val(null)
                        $('#tertentu').val(null)
                    } else {
                        alert('data tidak ditemukan')
                    }   
                }  
            });
        });

        $('.form-barang table').on('click', '.btn-remove', function() {
                if (arraybarang.length == 0) return $('#databarangnotselect').modal('show');
                arraybarang = [];
                $('.form-barang table tbody').html('');
                $('.form-barang #data_barang').html('');
                $('.grand-total').html('');
                $('.form-barang table tfoot').hide();
                countGrandTotal();
            });

            $('.form-barang table').on('click', '.remove-item', function() {
                if (arraybarang.length == 0) return alert('Belum ada item barang dipilih!');
                $(this).parent().parent().remove();
                let id = $(this).data('id');
                arraybarang = arraybarang.filter(e => e.id != id);
                $('.form-barang #data_barang').val(JSON.stringify(arraybarang));
                countGrandTotal();
            });

            function countGrandTotal() {
                let grand_total = 0;
                arraybarang.forEach(val => grand_total = grand_total + parseInt(val.total));
                if (grand_total <= 0) {
                    $('.form-barang table tfoot').hide();
                }

                var number_string4 = grand_total.toString(),
                sisa4 = number_string4.length % 3,
                rupiah4 = number_string4.substr(0, sisa4),
                ribuan4 = number_string4.substr(sisa4).match(/\d{3}/g);
                if (ribuan4) {
                    separator = sisa4 ? '.' : '';
                    rupiah4 += separator + ribuan4.join('.');
                }
                $('.grand-total').html('<h4>Rp.'+rupiah4+'</h4><input type="hidden" name="grand_total" value="'+grand_total+'">')
            }
    </script>
@endpush
