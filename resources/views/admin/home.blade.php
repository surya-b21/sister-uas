@extends('admin.template')
{{-- @section('judul', 'Tabel Barang') --}}
@section('konten')
    @if ($pesan = Session::get('sukses'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $pesan }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if ($pesan = Session::get('hapus'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $pesan }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if ($pesan = Session::get('update'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ $pesan }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Tabel Barang</h6>
        </div>
        <div class="card-body">
            <div class="container-fluid text-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahData">
                    Tambah Data
                </button>
            </div>
            <br>
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Supplier</th>
                            <th>Stok</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $row)
                            <tr>
                                <td>{{ $row->nama_barang }}</td>
                                <td>{{ $row->supplier->nama_supplier }}</td>
                                <td>{{ $row->stok }}</td>
                                <td>
                                    <div class="text-center">
                                        <a class="btn btn-warning editData" data-toggle="modal" data-target="#tambahData"
                                            data-id="{{ $row->id }}">Edit</a>
                                        <a class="btn btn-danger" href="{{ url("/hapus/$row->id") }}"
                                            onclick="return confirm('Apakah anda yakin akan menghapus data ?')">Hapus</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="tambahDataLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahDataLabel">Tambah Data Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('create') }}" method="POST" id="formTambah">
                        @csrf
                        <div class="form-group">
                            <label>Nama :</label>
                            <input type="text" class="form-control" name="nama_barang" id="nama_barang">
                        </div>
                        <div class="pesan-nama-brg"></div>
                        <div class="form-group">
                            <label>Supplier :</label>
                            <select class="form-control" name="id_supplier" id="id_supplier">
                                @foreach ($supplier as $row)
                                    <option value="{{ $row->id }}">{{ $row->nama_supplier }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Stok : </label>
                            <input type="number" class="form-control" name="stok" id="stok">
                            <input type="hidden" name="id" id="id">
                        </div>
                        <div class="pesan-stok-brg"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary allowed-submit" id="submit-btn"
                        disabled="disabled">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
