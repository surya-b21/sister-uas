<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $judul = "Data Supplier";
        $data = Supplier::get();

        return view('admin.supplier', ['data' => $data, 'judul' => $judul]);
    }
}
