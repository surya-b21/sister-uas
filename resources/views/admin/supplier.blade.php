@extends('admin.template')
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
                            <th>#</th>
                            <th>Nama</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->nama_supplier }}</td>
                                <td>
                                    <div class="text-center">
                                        <a class="btn btn-warning" id="editData" data-toggle="modal" data-target="#tambahData"
                                        data-id="{{ $row->id }}">Edit</a>
                                        <a class="btn btn-danger" href="{{url("/supplier/hapus/$row->id")}}" onclick="return confirm('Apakah anda yakin ingin menghapus data ?')">Hapus</a>
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
                    <form action="{{ route('supplier.create') }}" method="POST" onsubmit="return confirm('Apakah anda yakin data sudah benar ?')">
                        @csrf
                        <div class="form-group">
                            <label>Nama :</label>
                            <input type="text" class="form-control tambah" name="nama_supplier" id="nama_supplier">
                        </div>
                        <div class="pesan-nama-brg"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="submit-btn">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function() {
            $('#editData').on('click', function() {
                $('#tambahDataLabel').html('Edit Data Supplier');
                $('.modal-footer button[type=submit]').html('Ubah Data');
                $('.modal-footer button[type=submit]').attr('id','edit-btn');
                $('.modal-body form').attr('action', 'update');
                $('.modal-body form').attr('id', 'formEdit');
                $('.tambah').attr('class','form-control edit');

                const id = $(this).data('id');
                $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: 'supplier/getupdate',
                    data: { id: id },
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        $('#nama_barang').val(data.nama_supplier);
                    }
                });
            });
        });
    </script>
@endsection
