@extends('admin.template')
@section('judul', 'Data Barang Keluar')
@section('konten')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Supplier</h6>
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
                            <th>Tanggal Keluar</th>
                            <th>Jumlah</th>
                            <th>Catatan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barangkeluar as $row)
                            <tr>
                                <td>{{ $row->databarang->nama_barang }}</td>
                                <td>{{ date('d-m-Y', strtotime($row->tgl_keluar)) }}</td>
                                <td>{{ $row->jumlah_keluar }}</td>
                                <td>{{ $row->catatan }}</td>
                                <td>
                                    <div class="text-center">
                                        <a class="btn btn-warning" href="">Edit</a> <a class="btn btn-danger"
                                            href="">Hapus</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
