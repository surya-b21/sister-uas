<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;

    protected $table = "tbl_barangkeluar";

    protected $fillable = ['id_barang', 'tgl_keluar', 'jumlah_keluar', 'catatan'];

    public function DataBarang()
    {
        return $this->belongsTo(DataBarang::class, 'id_barang');
    }
}
