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
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header justify-content-between d-flex d-inline">
                        <h4 class="card-title">Daftar Transanksi Selesai</h4>
                      </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display dataTable table-striped table-bordered table-hover table-responsive-sm" style="font-size: 11px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tgl Penjualan</th>
                                        <th>SKU</th>
                                        <th>Item</th>
                                        <th>Qty</th>
                                        <th>UoM</th>
                                        <th>Harga Sebelum Pajak</th>
                                        <th>Harga Setelah Pajak</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($invoices as $item)
                                    <tr class="selected">
                                        <td>{{ $i }}</td>
                                        <td>{{ date('d-M-Y', strtotime($item->tgl)) }}</td>
                                        <td>{{ $item->SKU }}</td>
                                        <td>{{ $item->item }}</td>
                                        <td>{{ $item->qty }}</td>
                                        <td>{{ $item->mou }}</td>
                                        <td>@currency($item->hargaSebelum)</td>
                                        <td>@currency($item->hargaSesudah)</td>
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
<!--**********************************
            Content body end
        ***********************************-->
@endsection