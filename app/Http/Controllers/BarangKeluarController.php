<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    public function index()
    {
        $judul = "Barang Keluar";
        $barangkeluar = BarangKeluar::get();
        return view('admin.barangkeluar', ["judul" => $judul, "barangkeluar" => $barangkeluar]);
    }
}
