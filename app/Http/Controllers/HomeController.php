<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use App\Models\Supplier;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $judul = "Dashboard Admin";
        $data = DataBarang::get();
        $supplier = Supplier::get();

        return view('admin.home', ['data' => $data, 'judul' => $judul, 'supplier' => $supplier]);
    }

    public function submit(Request $req)
    {
        DataBarang::create([
            'nama_barang' => $req->nama_barang,
            'id_supplier' => $req->id_supplier,
            'stok' => $req->stok
        ]);

        return redirect('/home')->with('sukses', "Data Berhasil Ditambahkan");
    }

    public function hapus($id)
    {
        $databarang = DataBarang::find($id);
        $databarang->delete();

        return redirect('/home')->with('hapus', "Data Berhasil Dihapus");
    }

    public function getupdate()
    {
        $databarang = DataBarang::find($_POST['id']);
        echo json_encode($databarang);
    }

    public function update(Request $req)
    {
        $databarang = DataBarang::find($req->id);
        $databarang->nama_barang = $req->nama_barang;
        $databarang->stok = $req->stok;
        $databarang->save();

        return redirect('/home')->with('update', "Data Berhasil Diperbarui");
    }
}
