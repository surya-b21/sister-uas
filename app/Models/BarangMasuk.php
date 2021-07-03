<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;

    protected $table = "tbl_barangmasuk";

    protected $fillable = ['id_barang', 'tgl_masuk', 'jumlah_masuk', 'catatan'];

    public function DataBarang()
    {
        return $this->belongsTo(DataBarang::class, 'id_barang');
    }
}
