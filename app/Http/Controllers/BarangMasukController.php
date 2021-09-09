<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BarangMasukController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $judul = "Barang Masuk";
        $barangmasuk = BarangMasuk::get();
        return view('admin.barangmasuk', ["judul" => $judul, "barangmasuk" => $barangmasuk]);
    }

    public function create(Request $req)
    {
        BarangMasuk::create([
            'nama_supplier' => $req->nama_supplier
        ]);
        Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
        return redirect('/supplier');
    }

    public function hapus($id)
    {
        $datasupplier = BarangMasuk::find($id);
        $datasupplier->delete();

        Alert::success('Berhasil', 'Data Berhasil Dihapus');
        return redirect('/supplier');
    }

    public function getupdate()
    {
        $datasupplier = BarangMasuk::find($_POST['id']);
        echo json_encode($datasupplier);
    }

    public function update(Request $req)
    {
        $datasupplier = BarangMasuk::find($req->id);
        $datasupplier->nama_supplier = $req->nama_supplier;
        $datasupplier->save();

        Alert::success('Berhasil', 'Data Berhasil Diperbarui');
        return redirect('/home');
    }
}
