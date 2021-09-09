<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $judul = "Data Supplier";
        $data = Supplier::get();

        return view('admin.supplier', ['data' => $data, 'judul' => $judul]);
    }

    public function create(Request $req)
    {
        Supplier::create([
            'nama_supplier' => $req->nama_supplier
        ]);
        Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
        return redirect('/supplier');
    }

    public function hapus($id)
    {
        $datasupplier = Supplier::find($id);
        $datasupplier->delete();

        Alert::success('Berhasil', 'Data Berhasil Dihapus');
        return redirect('/supplier');
    }

    public function getupdate()
    {
        $datasupplier = Supplier::find($_POST['id']);
        echo json_encode($datasupplier);
    }

    public function update(Request $req)
    {
        $datasupplier = Supplier::find($req->id);
        $datasupplier->nama_supplier = $req->nama_supplier;
        $datasupplier->save();

        Alert::success('Berhasil', 'Data Berhasil Diperbarui');
        return redirect('/home');
    }
}
