@extends('layouts.main')

@section('container')
<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, Selamat Datang!</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Transanksi</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header justify-content-between d-flex d-inline">
                        <h4 class="card-title">Daftar Transanksi</h4>
                        @if($errors->any())
                        <div class="alert alert-danger">
                            <p><strong>Opps Something went wrong</strong></p>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if (auth()->user()->can('add transactions'))
                        <button type="button" data-target="#modalTambah" data-toggle="modal" class="btn"><i class="btn btn-sm btn-primary shadow-sm">+ Tambah Baru</i></a>
                        @endif
                        
                      </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display dataTable table-striped table-bordered table-hover table-responsive-sm" style="font-size: 11px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Tgl Penjualan</th>
                                        <th>SKU</th>
                                        <th>Item</th>
                                        <th>Qty</th>
                                        <th>Total Harga</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($invoices as $item)
                                    <tr class="selected">
                                        <td>{{ $i }}</td>
                                        <td>{{ $item->kode }}</td>
                                        <td>{{ date('d-M-Y', strtotime($item->tgl)) }}</td>
                                        <td>{{ $item->SKU }}</td>
                                        <td>{{ $item->item }}</td>
                                        <td>{{ $item->qty}}&nbsp;&nbsp;{{ $item->mou }}</td>
                                        <td>{{ $item->hargaSesudah }}</td>
                                        <td>
                                            <div class="btn-group mb-2 btn-group-sm">
                                                @if (auth()->user()->can('edit transactions'))
                                                <button id="ubahStatus" class="btn btn-info cek" type="button" data-id="{{ $item->id }}"><i class="fa fa-pencil"
                                                    aria-hidden="true"></i>Tandai Sudah Bayar</button>
                                                @endif
                                                @if (auth()->user()->can('delete transactions'))
                                                <button class="btn btn-danger" type="button" data-target="#delete"
                                                data-toggle="modal" data-id="{{ $item->id }}"><i class="fa fa-trash"
                                                    aria-hidden="true"></i></button>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    @php
                                        $i++
                                    @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalTambah">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="basic-form">
                                    <form class="form-valide-with-icon-update" id="tambahForm"
                                        action="{{ route('transactions.tambah') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group col-6">
                                                <label class="text-label">Kode</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"> <i
                                                                class="fa fa-code"></i> </span>
                                                    </div>
                                                    <input type="text" class="form-control disabled"
                                                        id="kode" name="kode"
                                                        placeholder="Enter a kode.." readonly>
                                                    @error('kode')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group col-6">
                                                <label class="text-label">Tanggal Pmabayaran</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"> <i class="fa fa-code"></i> </span>
                                                    </div>
                                                    @php
                                                    $now = \Carbon\Carbon::now('Asia/Jakarta')->format('Y-m-d');
                                                    @endphp
                                                    <input type="date" class="form-control disabled" id="tgl" name="tgl"
                                                        placeholder="Enter a kode.." disabled value="{{ $now }}">
                                                    @error('tgl')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-4">
                                                <label class="text-label">Kuantiti</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"> <i
                                                                class="fa fa-code"></i> </span>
                                                    </div>
                                                    <input type="number" class="form-control"
                                                        id="qty" name="qty"
                                                        placeholder="Enter Name Of  Quantity.." required>
                                                    @error('qty')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group col-8">
                                                <label class="text-label" for="val-skill">Pilih
                                                    Item
                                                </label>
                                                    <select required class="select-control jquery-selector" id="id_item" name="id_item">
                                                        <option value="" selected disabled>Please select</option>
                                                        @foreach($items as $item)
                                                        <option value="{{ $item->id }}" data-harga="{{ $item->harga }}" data-kuantiti="{{ $item->qty }}">
                                                            {{ $item->item }} || @currency($item->harga)/{{ $item->mous->mou }} || Qty : {{ $item->qty }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    @error('id_item')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-4">
                                                <label class="text-label" for="val-skill">Pilih Metode Pembayaran
                                                </label>
                                                    <select required class="select-control jquery-selector" id="id_method" name="id_method">
                                                        <option value="" selected disabled>Please select</option>
                                                        @foreach($methods as $item)
                                                        <option value="{{ $item->id }}">
                                                            {{ $item->method }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    @error('id_method')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                    @enderror
                                            </div>
                                            <div class="form-group col-4">
                                                <label class="text-label">Harga Sebelum Pajak</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"> <i
                                                                class="fa fa-code"></i> </span>
                                                    </div>
                                                    <span style="font-size: 100%" id="hargaTotalAwal" class="badge badge-info"></span>
                                                    <input type="number" class="form-control hargaSebelum" val=""
                                                        id="hargaSebelum" name="hargaSebelum" hidden>
                                                    @error('hargaSebelum')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group col-4">
                                                <label class="text-label text-primary">Total Harga Setelah pajak (11%)</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"> <i
                                                                class="fa fa-code"></i> </span>
                                                    </div>
                                                    <span style="font-size: 110%" id="hargaTotalAkhir" class="badge badge-primary text-bold"></span>
                                                    <input type="number" class="form-control hargaSesudah" val=""
                                                        id="hargaSesudah" name="hargaSesudah" hidden>
                                                    @error('hargaSesudah')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit"
                                            class="btn btn-primary tambahBaru">Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary"
                    data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('transactions.hapus') }}" method="POST">
                @csrf
                @method('delete')
                <input type="hidden" name="id">
                <div class="modal-header">
                    <h5 class="modal-title"><span>Hapus</span> UoM</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus Data UoM ini ? Jika dihapus maka data transaksi yang pernah
                    dilakukan juga akan terhapus!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--**********************************
            Content body end
        ***********************************-->
@endsection

@push('script')

<script>
    $(document).ready(function() {
            toastr.options.timeOut = 5e3;
            toastr.options.positionClass= "toast-top-right";
            toastr.options.closeButton= !0;
            toastr.options.debug= !1;
            toastr.options.newestOnTop= !0;
            toastr.options.progressBar= !0;
            toastr.options.onclick= null;
            toastr.options.showDuration = "300";
            toastr.options.hideDuration= "1000";
            toastr.options.extendedTimeOut= "1000";
            @if (Session::has('error'))
                toastr.error('{{ Session::get('error') }}');
            @elseif(Session::has('success'))
                toastr.info('{{ Session::get('success') }}');
            @endif
    });
    $('.tambahBaru').on('click', function (e) {
        e.preventDefault();
        $('#id_item option').each(function() {
            if(!$(this).not(':selected')) {
                toastr.error('Harap pilih dahaulu item yang akan dibeli');
                return false;
            }
        });
        $('#id_method option').each(function() {
            if(!$(this).not(':selected')    ) {
                toastr.error('Harap pilih dahaulu jenis pembayaran yang akan digunakan');
                return false;
            }
        });
        var formData = {
            "_token": "{{ csrf_token() }}",
            id_item: $("#id_item").val(),
            id_method: $("#id_method").val(),
            kode: $("#kode").val(),
            tgl: $("#tgl").val(),
            qty: $("#qty").val(),
            hargaSebelum: $("#hargaSebelum").val(),
            hargaSesudah: $("#hargaSesudah").val(),
        };
        $.ajax({
            type : 'POST',
            url : '{{ route('transactions.tambah') }}',
            dataType: 'json',
            data : formData,
            success: function (message) {
                toastr.success('Berhasil Ditambahkan!');
                location.reload(true);
            },
            error: function (message) {
                toastr.error('Terjadi Kesalahan!');
                return false;
            }
        });
    });
    $('#modalTambah').on('show.bs.modal', (e) => {

        $.ajax({
            type: 'GET',
            url: '{{ route('transactions.getItemsMethods') }}',
            dataType: 'json',
            success: function (data) {
                if (data.data == '') {
                    toastr.warning('Data tidak tersedia');
                    return false;
                } else {
                    $('#modalTambah').find('input[name="kode"]').val(data.formatKode);
                }
            },
            error: function (data) {
                toastr.error('Terjadi Kesalahan!');
                return false;
            }
        });
        
        $("#id_item").change(function () {
            $(qty).val('');
            var harga = $("#id_item :selected").data('harga');
            var hargaPajak = harga + ((harga*11)/100);
            $("#hargaTotalAwal").text(formatRupiah(Math.round(harga), 'Rp. '));
            $("#hargaSebelum").val(Math.round(harga));
            $("#hargaTotalAkhir").text(formatRupiah(Math.round(hargaPajak), 'Rp. '));
            $("#hargaSesudah").val(Math.round(hargaPajak));
            console.log($('#tgl').val());
        });

        $('.reset').on('click', function () {
            $('#tambahForm').reset();
        });

        $("#qty").change(function () {
            var harga = $("#id_item :selected").data('harga');
            var hargaPajak = harga + ((harga*11)/100);
            if (!harga) {
                $("#hargaTotalAwal").text(formatRupiah(0, 'Rp. '));
                $("#hargaSebelum").val(0);
                $("#hargaTotalAkhir").text(formatRupiah(0, 'Rp. '));
                $("#hargaSesudah").val(0);
            } else if ($("#qty").val() != '') {
                hitung();
            } else {
                $("#hargaTotalAwal").text(formatRupiah(Math.round(harga), 'Rp. '));
                $("#hargaTotalAkhir").text(formatRupiah(Math.round(hargaPajak), 'Rp. '));
                
                $(".hargaSebelum").val(Math.round(harga));

                $(".hargaSesudah").val(Math.round(hargaPajak));
            }
        });

        const qty = document.getElementById('qty');
        [qty].map(element => element.addEventListener('input', function () {
            let kuantiti = $("#id_item :selected").data('kuantiti');
            let price = $("#id_item :selected").data('harga');
            var hargaPajak = price + ((price*11)/100);
            if ($(qty).val() > kuantiti) {
                toastr.warning('Jumlah item yang dipesan melebihi Jumalh Item yang tersedia!');
                $(qty).val('');
            }
            if ($(qty).val() < 0) {
                toastr.warning('Masukkan jumlah dengan benar!');
                $(qty).val('');
            }
            if (!price) {
                $("#hargaTotalAwal").text(formatRupiah(0, 'Rp. '));
                $("#hargaSebelum").val(0);
                $("#hargaTotalAkhir").text(formatRupiah(0, 'Rp. '));
                $("#hargaSesudah").val(0);
            } else if ($(qty).val() != '') {
                hitung();
            } 
            else {
                $("#hargaTotalAwal").text(formatRupiah(Math.round(price), 'Rp. '));
                $("#hargaTotalAkhir").text(formatRupiah(Math.round(hargaPajak), 'Rp. '));
                $("#hargaSebelum").val(Math.round(price));
                $("#hargaSesudah").val(Math.round(hargaPajak));
            }
        }))
    });
    $('#delete').on('show.bs.modal', (e) => {
        var id = $(e.relatedTarget).data('id');
        $('#delete').find('input[name="id"]').val(id);
    });
    function hitung() {
            var totalPrice = $("#id_item :selected").data('harga') * $("#qty").val();
            var totalPricePajak = totalPrice + (totalPrice*11)/100;

            $("#hargaTotalAwal").text(formatRupiah(Math.round(totalPrice), 'Rp. '));
            $("#hargaSebelum").val(Math.round(totalPrice));

            $("#hargaTotalAkhir").text(formatRupiah(Math.round(totalPricePajak), 'Rp. '));
            $("#hargaSesudah").val(Math.round(totalPricePajak));
    
    };
    function formatRupiah(angka, prefix) {
        var number_string = angka.toString().replace(/[^,\d]/g, ''),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
    $('.cek').click(function (e) { 
        toastr.warning('Mohon Maaf untuk Fitur Ini saya Belum Selesai');
    });
</script>

@endpush