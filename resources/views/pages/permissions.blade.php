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
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Permissions</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header justify-content-between d-flex d-inline">
                        <h4 class="card-title">Daftar Permissions</h4>
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
                        @if (auth()->user()->can('add permissions'))
                        <button type="button" data-target="#modalTambah" data-toggle="modal" class="btn"><i class="btn btn-sm btn-primary shadow-sm">+ Permission Baru</i></a>
                        @endif
                        </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display dataTable table-striped table-bordered table-hover table-responsive-sm" style="font-size: 11px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Permissions Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($permissions as $item)
                                    <tr class="selected">
                                        <td>{{ $i }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <div class="btn-group mb-2 btn-group-sm">
                                                @if (auth()->user()->can('edit permissions'))
                                                <button readonly class="btn btn-info cek" type="button" data-target=""
                                                data-toggle="modal" data-name="{{ $item->name }}"><i class="fa fa-pencil"
                                                        aria-hidden="true"></i></button>
                                                @endif
                                                @if (auth()->user()->can('delete permissions'))
                                                <button class="btn btn-danger" type="button" data-target="#delete"
                                                data-toggle="modal" data-name="{{ $item->name }}"><i class="fa fa-trash"
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
    <div class="modal-dialog modal-md" role="document">
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
                                    <form class="form-valide-with-icon-update"
                                        action="{{ route('permissions.tambah') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label class="text-label">Nama Privilage</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i
                                                            class="fa fa-code"></i> </span>
                                                </div>
                                                <input type="text" class="form-control"
                                                    id="name" name="name"
                                                    placeholder="Enter Name Of Privilage..">
                                                @error('name')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <button type="submit"
                                            class="btn btn-primary">Simpan</button>
                                            <button type="reset" class="btn btn-light">Reset</button>
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

<div class="modal fade" id="modalUpdate">
    <div class="modal-dialog modal-md" role="document">
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
                                    <form class="form-valide-with-icon-update"
                                        action="{{ route('roles.edit') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label class="text-label">Nama Role</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i
                                                            class="fa fa-code"></i> </span>
                                                </div>
                                                <input type="text" class="form-control"
                                                    id="name" name="name"
                                                    placeholder="Enter Name Of Role..">
                                                @error('name')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <button type="submit"
                                            class="btn btn-primary">Simpan</button>
                                            <button type="reset" class="btn btn-light">Reset</button>
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
            <form action="{{ route('permissions.hapus') }}" method="POST">
                @csrf
                @method('delete')
                <input type="hidden" name="name">
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
@endsection

@push('script')

<script>
    $('.cek').click(function (e) { 
        toastr.warning('Mohon Maaf untuk Fitur Ini saya Belum Selesai');
    });
    $('#modalUpdate').on('show.bs.modal', (e) => {
        $('#modalUpdate').find('input[name="id"]').val($(e.relatedTarget).data('id'));
        $('#modalUpdate').find('input[name="name"]').val($(e.relatedTarget).data('name'));

        $('.reset').on('click', function () {
            $('#modalUpdate').find('input[name="id"]').val($(e.relatedTarget).data('id'));
            $('#modalUpdate').find('input[name="name"]').val($(e.relatedTarget).data('name'));
        });
    });
    $('#delete').on('show.bs.modal', (e) => {
        var name = $(e.relatedTarget).data('name');
        $('#delete').find('input[name="name"]').val(name);
    });
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
</script>

@endpush