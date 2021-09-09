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

    <div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="tambahDataLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahDataLabel">Tambah Data Supplier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('barangkeluar.create') }}" method="POST" onsubmit="return confirm('Apakah anda yakin data sudah benar ?')">
                        @csrf
                        <div class="form-group">
                            <label>Nama :</label>
                            <input type="text" class="form-control tambah" name="nama_supplier" id="nama_supplier">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Keluar :</label>
                            <input type="date" class="form-control tambah" name="nama_supplier" id="nama_supplier">
                        </div>
                        <div class="form-group">
                            <label>Jumlah :</label>
                            <input type="number" class="form-control tambah" name="nama_supplier" id="nama_supplier">
                        </div>
                        <div class="form-group">
                            <label>Catatan :</label>
                            <textarea class="form-control tambah" name="nama_supplier" id="nama_supplier"></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="submit-btn">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
