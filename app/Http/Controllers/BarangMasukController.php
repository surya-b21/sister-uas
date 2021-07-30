<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    public function index()
    {
        $judul = "Barang Masuk";
        $barangmasuk = BarangMasuk::get();
        return view('admin.barangmasuk', ["judul" => $judul, "barangmasuk" => $barangmasuk]);
    }
}
