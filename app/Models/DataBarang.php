<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataBarang extends Model
{
    protected $table = "tbl_databarang";

    protected $fillable = ['nama_barang', 'id_supplier', 'stok'];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'id_supplier');
    }

    public function BarangKeluar()
    {
        return $this->hasOne(BarangKeluar::class);
    }

    public function BarangMasuk()
    {
        return $this->hasOne(BarangMasuk::class);
    }
}
