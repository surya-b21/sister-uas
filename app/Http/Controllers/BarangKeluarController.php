<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BarangKeluarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $judul = "Barang Keluar";
        $barangkeluar = BarangKeluar::get();
        return view('admin.barangkeluar', ["judul" => $judul, "barangkeluar" => $barangkeluar]);
    }

    public function create(Request $req)
    {
        BarangKeluar::create([
            'nama_supplier' => $req->nama_supplier
        ]);
        Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
        return redirect('/supplier');
    }

    public function hapus($id)
    {
        $datasupplier = BarangKeluar::find($id);
        $datasupplier->delete();

        Alert::success('Berhasil', 'Data Berhasil Dihapus');
        return redirect('/supplier');
    }

    public function getupdate()
    {
        $datasupplier = BarangKeluar::find($_POST['id']);
        echo json_encode($datasupplier);
    }

    public function update(Request $req)
    {
        $datasupplier = BarangKeluar::find($req->id);
        $datasupplier->nama_supplier = $req->nama_supplier;
        $datasupplier->save();

        Alert::success('Berhasil', 'Data Berhasil Diperbarui');
        return redirect('/home');
    }
}
